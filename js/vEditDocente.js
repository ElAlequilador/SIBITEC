function validarEditDocente(){

  var txtNombre = document.getElementById('nombre').value;
  var txtCorreo = document.getElementById('correo').value;
  var txtEdad = document.getElementById('edad').value;
  var txtControl = document.getElementById('clave').value;
  var txtSexo = document.getElementById('sexo').selectedIndex;
  
  var sololetras = /^[A-Za-z ñ]+$/;
      
  if( txtNombre == null || txtNombre.length == 0 ) {
    alert('[ERROR]: El campo NOMBRE no debe ir vacío.');
    nombre.focus();
    return false;
  }else if (txtNombre.length > 40) {
    alert('[ERROR]: El campo NOMBRE es muy largo.');
    nombre.focus();
    return false;
  }else if (!sololetras.test(txtNombre)) {
    alert('[ERROR]: El campo NOMBRE no es valido.') ;
    nombre.focus();
    return false;
  }else if (!(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(txtCorreo))){
    alert('[ERROR]: El campo CORREO INSTITUCIONAL debe contener 3 subdominios(@cdvictoria.tecnm.mx/@itvictoria.edu.mx).');
    correo.focus();
    return false;
  }else if (txtEdad == null || txtEdad.length == 0){
    alert('[ERROR]: El campo EDAD no debe ir vacío.');
    edad.focus();
    return false;
  }else if(isNaN(txtEdad)){
    alert('[ERROR]: El campo EDAD debe ser numerico.');
    edad.focus();
    return false;
  }else if (!/^\d{2}$/.test(txtEdad)) {
  alert('[ERROR]: El campo EDAD debe tener 2 cáracteres númericos.');
  edad.focus();
  return false;
  }else if (txtControl == null || txtControl.length == 0){
    alert('[ERROR]: El campo CLAVE no debe ir vacío.');
    clave.focus();
    return false;
  }else if(isNaN(txtControl)){
    alert('[ERROR]: El campo CLAVE debe ser numerico.');
    clave.focus();
    return false;
  }else if(!/^\d{8}$/.test(txtControl)){
    alert('[ERROR]: El campo CLAVE debe tener 8 cáracteres númericos.');
    clave.focus();
    return false;
  }else if (txtSexo == null || txtSexo == 0){
    alert('[ERROR]: Debes seleccionar un sexo.');
    sexo.focus();
    return false;
  }
  return true;
}
function limpiarDocente(){
  alert('Campos limpios.');
  document.getElementById('form_EditDocente').reset();
}