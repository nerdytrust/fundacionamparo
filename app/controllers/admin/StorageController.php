<?php
namespace admin;

class StorageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /dashboard
	 *
	 * @return Response
	 */
 	public function index( $hash = null, $size = '' ){
 		$this->storage_path = storage_path() . '/uploads/' . $hash;
 		$img = \Image::cache( function( $image ) use ( $hash, $size ) {
 			if ( $size ){
 				$array_size = explode( 'x', $size );
 				if ( !isset( $array_size[1] ) )
 					$array_size[1] = $array_size[0];

 				return $image->make( $this->storage_path )->resize( $array_size[0], $array_size[1] );
 			} else {
 				list( $width, $height ) = getimagesize( $this->storage_path );
 				if ( $width > 1000 ){
 					return $image->make( $this->storage_path )->resize(1000, null, function( $constraint ){
 						$constraint->aspectRatio();
 						$constraint->upsize();
 					});
 				} else
 					return $image->make( $this->storage_path );
 			}
 		}, 10000, true );

 		return $img->response('jpg', 70 );
 	}


	public function upload()
	{

        $file = "file";

        $destinationPath = app_path().'/storage/uploads/'; // upload path
        
        if (\Input::file($file)->isValid()) {

          $fileName = md5(str_random(40)); // renameing image
          \Input::file($file)->move($destinationPath, $fileName); // uploading file to given path

        	return './image/' . $fileName;//change this URL
        }else
        	return 'Ooops!! try later :(';

	}

	

}