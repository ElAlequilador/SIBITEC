function validarLogin(){
	var txtUsuario = document.getElementById('usuario').value;
	var txtContraseña = document.getElementById('contraseña').value;
	var password = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

	if(txtUsuario == null || txtUsuario.length == 0){
    alert('[ERROR]: El campo USUARIO no debe ir vacío.');
    usuario.focus();
    return false;
  }else if(txtContraseña == null || txtContraseña.length == 0){
    alert('[ERROR]: El campo CONTRASEÑA no debe ir vacío.');
    contraseña.focus();
    return false;
  }else if(!password.test(txtContraseña)){
    alert('[ERROR]: La contraseña debe tener entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.');
    contraseña.focus();
    return false;
  }
	return true;
}

