function validarPrestamo(){
	var txtFechaS = document.getElementById('fechaSalida').value;
	var txtFolio = document.getElementById('folio').value;
	var txtCodigo = document.getElementById('codigo').value;
	var txtTitulo = document.getElementById('titulo').value;
	var txtAutor = document.getElementById('autores').value;
	var txtEditorial = document.getElementById('editorial').value;
	var txtCategoria = document.getElementById('categoria').selectedIndex;
	var txtSeccion = document.getElementById('seccion').selectedIndex;

	if (!isNaN(txtFechaS)){
  		alert('[ERROR]: Debes ingresar la fecha del prestamo.');
  		fechaSalida.focus();
  		return false;
  	}else if (txtFolio == null || txtFolio.length == 0 || /^\s+$/.test(txtFolio)){
  		alert('[ERROR]: El campo FOLIO no debe ir vacío.');
  		folio.focus();
  		return false;
  	}else if (txtCodigo == null || txtCodigo.length == 0 || isNaN(txtCodigo)){
  		alert('[ERROR]: El campo CODIGO no debe ir vacío, y debe ser numerico.');
  		codigo.focus();
  		return false;
  	}else if (txtTitulo == null || txtTitulo.length == 0 || /^\s+$/.test(txtTitulo)){
  		alert('[ERROR]: El campo TITULO no debe ir vacío.');
  		titulo.focus();
  		return false;
  	}else if (txtAutor == null || txtAutor.length == 0 || /^\s+$/.test(txtAutor)){
  		alert('[ERROR]: El campo AUTOR(ES) no debe ir vacío.');
  		autores.focus();
  		return false;
  	}else if (txtEditorial == null || txtEditorial.length == 0 || /^\s+$/.test(txtEditorial)){
  		alert('[ERROR]: El campo EDITORIAL no debe ir vacío.');
  		editorial.focus();
  		return false;
  	}else if (txtCategoria == null || txtCategoria == 0){
  		alert('[ERROR]: Debes seleccionar una categoría.');
  		categoria.focus();
  		return false;
  	}else if (txtSeccion == null || txtSeccion == 0){
  		alert('[ERROR]: Debes seleccionar una sección.');
  		seccion.focus();
  		return false;
  	}
  	alert('Prestamo registrado exitosamente.');
  	return true;
}
function validarBusqueda(){
	var txtControl = document.getElementById('control').value;

	if (txtControl == null || txtControl.length == 0 || isNaN(txtControl)){
  		alert('[ERROR]: El campo N° CONTROL no debe ir vacío, y debe ser numerico.');
  		control.focus();
  		return false;
  	}
  	return true;
}
function limpiarFormulario(){
  alert('Campos limpios.');
  document.getElementById('form_NPrestamo').reset();
}