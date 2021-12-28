function validarDocente(){

  var txtNombre = document.getElementById('nombre').value;
  var txtCorreo = document.getElementById('correo').value;
  var txtDominio = document.getElementById('dominio').selectedIndex;
  var txtEdad = document.getElementById('edad').value;
  var txtSexo = document.getElementById('sexo').selectedIndex;
  var txtTelefono = document.getElementById('telefono').value;
  
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
  }else if(txtCorreo == null || txtCorreo.length == 0){
    alert('[ERROR]: El campo CORREO no debe ir vacío.');
    correo.focus();
    return false;
  }else if (txtCorreo.length > 20) {
    alert('[ERROR]: El campo CORREO es muy largo.') ;
    correo.focus();
    return false;
   }else if (txtDominio == null || txtDominio == 0){
    alert('[ERROR]: Debes seleccionar un dominio.');
    dominio.focus();
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
  }else if(txtTelefono == null || txtTelefono.length == 0){
    alert('[ERROR]: El campo TELEFONO no debe ir vacío.');
    telefono.focus();
    return false;
  }else if (isNaN(txtTelefono)){
    alert('[ERROR]: El campo TELEFONO debe ser númerico.');
    telefono.focus();
    return false;
  }else if (!/^\d{10}$/.test(txtTelefono)) {
    alert('[ERROR]: El campo TELEFONO debe tener 10 cáracteres númericos.');
    telefono.focus();
    return false;

  }else if (txtSexo == null || txtSexo == 0){
    alert('[ERROR]: Debes seleccionar un sexo.');
    sexo.focus();
    return false;
  
  }
  return true;
}
function limpiarDocente(){
  nombre.focus();
  alert('Campos limpios.');
  document.getElementById('form_NDocente').reset();
}