function validarLogin(){
  document.getElementById('form_visitante').reset();
  var txtUsuario = document.getElementById("usuario").value; 
  var txtContarseña = document.getElementById("contraseña").value; 

    //var expEdad = /[0-9]{2}/;
  //^[A-Z]+$
  //^[A-Za-z]+$
  ///[A-Za-z ñ]+/
  //var correo = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/;
  var sololetras = /^[A-Za-z ñÑ]+$/;
  //var control = /^\d{8}$/;
  //var numeroTelefono = /^\d{10}$/;
  //no acepta la ñ
  //var password = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

  if(txtUsuario == null || txtUsuario.length == 0){
    alert('[ERROR]: El campo USUARIO no debe ir vacío.');
    usuario.focus();
    return false;
  }else if (txtUsuario.length > 40) {
    alert('[ERROR]: El campo USUARIO es muy largo.') ;
    usuario.focus();
    return false;
  }else if (!sololetras.test(txtUsuario)) {
    alert('[ERROR]: El campo USUARIO no es valido.') ;
    usuario.focus();
    return false;
  }if(txtContraseña == null || txtContraseña == 0){
    alert('[ERROR]: El campo CONTRASEÑA no debe ir vacío');
    contraseña.focus();
    return false;
  }else if(!(/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(txtContraseña))){
    alert('[ERROR]: La contraseña debe tener entre 8 y 16 caracteres, al menos un número, al menos una minúscula y al menos una mayúscula.');
    contraseña.focus();
    return false;
  }

  return true;

function visitante(){
  location = "visitante.php";
}
