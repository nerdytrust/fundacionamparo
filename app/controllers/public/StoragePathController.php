<?php

class StoragePathController extends BaseController {

	private $storage_path;
	private $path = "";
    private $stream = "";
    private $buffer = 102400;
    private $start  = -1;
    private $end    = -1;
    private $size   = 0;

	/**
	 * Método para obtener una imagen de contenido subida en el CMS
	 * @param  string $hash MD5 file
	 * @param  string $size Tamaño de la imagen que requerimos
	 * @return string       Recorte de la imagen solicitada
	 */
 	public function imgStorage( $hash = null, $size = '' ){
 		$this->storage_path = storage_path() . '/uploads/' . $hash;
 		$img = Image::cache( function( $image ) use ( $hash, $size ) {
 			if ( $size ){
 				$array_size = explode( 'x', $size );
 				if ( !isset( $array_size[1] ) )
 					$array_size[1] = $array_size[0];

 				return $image->make( $this->storage_path )->resize( $array_size[0], $array_size[1] );
 			} else {
 				list( $width, $height ) = getimagesize( $this->storage_path );
 				if ( $width > 1600 ){
 					return $image->make( $this->storage_path )->resize(1600, null, function( $constraint ){
 						$constraint->aspectRatio();
 						$constraint->upsize();
 					});
 				} else
 					return $image->make( $this->storage_path );
 			}
 		}, 10000, true );

 		return $img->response('jpg', 95 );
 	}

 	/**
 	 * Método para devolver el video tipo stream a la vista
 	 * @param  string $hash Nombre del video hasheado
 	 * @return string       Respuesta stream mp4
 	 */
 	public function videoStorage( $hash ){
 		$this->storage_path = storage_path();
 		$content = $this->storage_path . '/uploads/' . $hash;
 		$this->path = $this->storage_path . '/uploads/' . $hash;

 		/*$headers = [
 			'Content-Type'	=> 'video/mp4'
 		];
 		return Response::stream( function() use ($content ) {
 			$stream = fopen( $content, 'r' );
 			fpassthru( $stream );
 		}, 200, $headers );*/
 		$this->start();
 	}

 	private function open()
    {
        if (!($this->stream = fopen($this->path, 'rb'))) {
            die('Could not open stream for reading');
        }

    }

    /**
     *      * Set proper header to serve the video content
     *           */
    private function setHeader()
    {
        ob_get_clean();
        header("Content-Type: video/mp4");
        header("Cache-Control: max-age=2592000, public");
        header("Expires: ".gmdate('D, d M Y H:i:s', time()+2592000) . ' GMT');
        header("Last-Modified: ".gmdate('D, d M Y H:i:s', @filemtime($this->path)) . ' GMT' );
        $this->start = 0;
        $this->size  = filesize($this->path);
        $this->end   = $this->size - 1;
        header("Accept-Ranges: 0-".$this->end);

        if (isset($_SERVER['HTTP_RANGE'])) {

            $c_start = $this->start;
            $c_end = $this->end;

            list(, $range) = explode('=', $_SERVER['HTTP_RANGE'], 2);
            if (strpos($range, ',') !== false) {
                header('HTTP/1.1 416 Requested Range Not Satisfiable');
                header("Content-Range: bytes $this->start-$this->end/$this->size");
                exit;
            }
            if ($range == '-') {
                $c_start = $this->size - substr($range, 1);
            }else{
                $range = explode('-', $range);
                $c_start = $range[0];

                $c_end = (isset($range[1]) && is_numeric($range[1])) ? $range[1] : $c_end;
            }
            $c_end = ($c_end > $this->end) ? $this->end : $c_end;
            if ($c_start > $c_end || $c_start > $this->size - 1 || $c_end >= $this->size) {
                header('HTTP/1.1 416 Requested Range Not Satisfiable');
                header("Content-Range: bytes $this->start-$this->end/$this->size");
                exit;
            }
            $this->start = $c_start;
            $this->end = $c_end;
            $length = $this->end - $this->start + 1;
            fseek($this->stream, $this->start);
            header('HTTP/1.1 206 Partial Content');
            header("Content-Length: ".$length);
            header("Content-Range: bytes $this->start-$this->end/".$this->size);
        }
        else
        {
            header("Content-Length: ".$this->size);
        }  

    }

    /**
     *      * close curretly opened stream
     *           */
    private function end()
    {
        fclose($this->stream);
        exit;
    }

    /**
     *      * perform the streaming of calculated range
     *           */
    private function stream()
    {
        $i = $this->start;
        set_time_limit(0);
        while(!feof($this->stream) && $i <= $this->end) {
            $bytesToRead = $this->buffer;
            if(($i+$bytesToRead) > $this->end) {
                $bytesToRead = $this->end - $i + 1;
            }
            $data = fread($this->stream, $bytesToRead);
            echo $data;
            flush();
            $i += $bytesToRead;
        }
    }

    /**
     *      * Start streaming video content
     *           */
    function start()
    {
        $this->open();
        $this->setHeader();
        $this->stream();
        $this->end();
    }
}

/* End of file StoragePathController.php */
/* Location: ./app/controllers/public/StoragePathController.php */