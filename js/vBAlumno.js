function validarBAlumno(){
  
	var txtControlE = document.getElementById('controlE').value;

	if (txtControlE == null || txtControlE.length == 0){
  	alert('[ERROR]: El campo N° CONTROL no debe ir vacío.');
  	controlE.focus();
  	return false;
  }else if(isNaN(txtControlE)){
    alert('[ERROR]: El campo N° CONTROL debe ser númerico.');
    controlE.focus();
    return false;
  }else if (!/^\d{8}$/.test(txtControlE)) {
    alert('[ERROR]: El campo N° CONTROL debe tener 8 carácteres. ');
    controlE.focus();
    return false;
  }
  return true;
}