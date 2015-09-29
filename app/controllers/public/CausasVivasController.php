<?php

class CausasVivasController extends BaseController {

	public function index(){
		$causas = Causas::select(DB::raw('*,meta as metaTotal'))->orderBy( 'orden' )->orderBy( 'created_at','desc' )->where( 'id_tipo_causas', 1)->where( 'fecha', '>', date('Y-m-d') )->get();
		$causas = $this->getClass($causas);
		$videos = Videos::where('id_secciones', 3 )->get();
	
		$externas = Causas::select(DB::raw('*,meta as metaTotal'))->orderBy( 'orden' )->orderBy( 'created_at','desc' )->where( 'id_tipo_causas', 2 )->where( 'fecha', '>', date('Y-m-d') )->get();
		$externas = $this->getClass($externas);

		return View::make( 'public.causas.index' )->with( [
			'causas' => $causas,
			'externas' => $externas,
			'videos'	=> $videos
		] );
	}

	/**
	 * Método para determinar la clase de las causas 100%, 50%, 33%, y obtener lo recaudado de cada causa
	 * @param  array $causas  Información introducida por el usuario en el formulario de registro
	 * @return array          Devuelve el arreglo del registro guardado exitosamente o NULL en caso de que no
	 */
	private function getClass($causas){
		$coutnCausas = count($causas);
		$fmod        = fmod(count($causas),3);

		if($fmod == 1) 
			 $causas[$coutnCausas -1]['class'] = 100;
		else if($fmod == 2){
			 $causas[$coutnCausas -2]['class'] = 50; 
			 $causas[$coutnCausas -1]['class'] = 50;
		}

		foreach ($causas as $key => $causa) {
			 $recaudado = Donaciones::where( 'id_causas', $causa->id_causas)->where( 'status', 1)->sum( 'monto_donacion' );
			 $causas[$key]['recaudado'] = $recaudado;
			 if($causa->metaTotal > 0){
			 	$porcentaje = ($recaudado * 100)/$causa->metaTotal;
			 	if ($porcentaje > 100){ $porcentaje = 100;}
			 	$causas[$key]['porcentaje'] = $porcentaje;
			} else {
				$causas[$key]['porcentaje'] = 0;
			}

			//echo $causas[$key]['porcentaje'].'<br />';
		}
		//die;

		return  $causas;
	}

}


/* End of file CausasVivasController.php */
/* Location: ./app/controllers/public/CausasVivasController.php */