<?php

class StoragePathController extends BaseController {

	private $storage_path;

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
 		$headers = [
 			'Content-Type'	=> 'video/mp4'
 		];
 		return Response::stream( function() use ($content ) {
 			$stream = fopen( $content, 'r' );
 			fpassthru( $stream );
 		}, 200, $headers );
 	}
}

/* End of file StoragePathController.php */
/* Location: ./app/controllers/public/StoragePathController.php */