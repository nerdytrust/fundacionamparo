$(function(){

	/**
	 * Método para obtener las ciudades en un combobox dependiendo el id del estado
	 * @param  {[type]} e){		var state_id      ID del estado
	 * @return {string}           HTML de las opciones de las ciudades
	 */
	$('#vol_estado').on('change', function(e){
		var state_id = e.target.value;
		$.get('ajax-city?state_id=' + state_id, function(data){
			$('#vol_ciudad').empty();
			$.each(data, function(index, statesObj){
				$('#vol_ciudad').append( '<option value="' + statesObj.id_ciudades + '">' + statesObj.name + '</option>');
			});
		});
		return false;
	});
});