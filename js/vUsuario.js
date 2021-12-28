function validarBusqueda(){
	var txtBusqueda = document.getElementById('busqueda').value;

	if (txtBusqueda == null || txtBusqueda.length == 0 || /^\s+$/.test(txtBusqueda)){
  		alert('[ERROR]: El campo BUSQUEDA no debe ir vacío.');
  		busqueda.focus();
  		return false;
  	}
  	return true;
}