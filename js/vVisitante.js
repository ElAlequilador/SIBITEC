function validarVisitante(){
	var txtCorreo = document.getElementById('correo').value;
  var txtDominio = document.getElementById('dominio').selectedIndex;
	var txtContraseña = document.getElementById('password').value;
	var txtMotivo = document.getElementById('motivo').selectedIndex;

	if(txtCorreo == null || txtCorreo.length == 0){
    alert('[ERROR]: El campo CORREO INSTITUCIONAL no debe ir vacío.');
    correo.focus();
    return false;
  }else if(txtDominio == null || txtDominio = 0){
    alert('[ERROR]: Debes seleccionar un DOMINIO.');
    dominio.focus();
    return false;
  }else if(txtContraseña == null || txtContraseña = 0){
    alert('[ERROR]: El campo CONTRASEÑA no debe ir vacío.');
    password.focus();
    return false;
  }else if(txtMotivo == null || txtMotivo = 0){
    alert('[ERROR]: Debes selecionar un MOTIVO DE ENTRADA.');
    motivo.focus();
    return false;
  }
	return true;
}