$(function(){
	/**
	 * Método para mostrar los combos de ciudades o paises dependiendo el lugar de estudio
	 * @param  {[type]} e){		var place_id      [description]
	 * @return {[type]}           [description]
	 */
	$('#beca_lugar_estudiar').on('change', function(e){
		var place_id = e.target.value;
		switch( place_id ){
			case '1':
				$.get( 'ajax-beca-dropdown?place_id=' + place_id, function(data){
					$('#beca_lugar').empty();
					$('#beca_lugar').css( 'display', 'block' );
					$('#beca_lugar').append(data);
				});
				break;
			case '2':
				$.get( 'ajax-beca-dropdown?place_id=' + place_id, function(data){
					$('#beca_lugar').empty();
					$('#beca_lugar').css( 'display', 'block' );
					$('#beca_lugar').append(data);
				});
				break;
		}
		return false;
	});

	/**
	 * Método para obtener las opciones de estados en un combobox dependiendo el id del país
	 * @param  {[type]} e){		var country_id    [description]
	 * @return {[type]}           [description]
	 */
	$('#beca_pais').on('change', function(e){
		var country_id = e.target.value;
		$.get('ajax-state?country_id=' + country_id, function(data){
			$('#beca_estado').empty();
			$.each(data, function(index, statesObj){
				$('#beca_estado').append( '<option value="' + statesObj.id_estados + '">' + statesObj.name + '</option>');
			});
		});
		return false;
	});

	/**
	 * Método para obtener las ciudades en un combobox dependiendo el id del estado
	 * @param  {[type]} e){		var state_id      ID del estado
	 * @return {string}           HTML de las opciones de las ciudades
	 */
	$('#beca_estado').on('change', function(e){
		var state_id = e.target.value;
		$.get('ajax-city?state_id=' + state_id, function(data){
			$('#beca_ciudad').empty();
			$.each(data, function(index, statesObj){
				$('#beca_ciudad').append( '<option value="' + statesObj.id_ciudades + '">' + statesObj.name + '</option>');
			});
		});
		return false;
	});
});