function validarFormulario(){
 
  var txtNombre = document.getElementById('nombre').value;
  var txtCorreo = document.getElementById('correo').value;
  var txtDominio = document.getElementById('dominio').selectedIndex;
  var txtEdad = document.getElementById('edad').value;
  var txtControl = document.getElementById('control').value;
  var txtTelefono = document.getElementById('telefono').value;
  var txtContraseña = document.getElementById('contraseña').value;
  var txtRContraseña = document.getElementById('rcontraseña').value;
  var txtSexo = document.getElementById('sexo').selectedIndex;
  var txtUsuario = document.getElementById('usuario').value;
  var txtRol = document.getElementById('rol').selectedIndex;
  var sololetras = /^[A-Za-z ñÑ]+$/;
        
  if( txtNombre == null || txtNombre.length == 0 ) {
    alert('[ERROR]: El campo NOMBRE no debe ir vacío.');
    nombre.focus();
    return false;
  }else if (txtNombre.length > 40) {
    alert('[ERROR]: El campo NOMBRE es muy largo.') ;
    nombre.focus();
    return false;
  }else if (!sololetras.test(txtNombre)) {
    alert('[ERROR]: El campo NOMBRE no es valido.') ;
    nombre.focus();
    return false;
  }else if(txtCorreo == null || txtCorreo.length == 0){
    alert('[ERROR]: El campo CORREO INSTITUCIONAL no debe ir vacío.');
    correo.focus();
    return false;
  }else if (txtDominio == null || txtDominio == 0) {
    alert('[ERROR]: Debes seleccionar un DOMINIO.');
    dominio.focus();
    return false;
  }else if (txtEdad == null || txtEdad.length == 0){
    alert('[ERROR]: El campo EDAD no debe ir vacío');
    edad.focus();
    return false;
  }else if(isNaN(txtEdad)){
    alert('[ERROR]: El campo EDAD debe ser númerico.');
    edad.focus();
    return false;
  }else if (!/^\d{2}$/.test(txtEdad)) {
    alert('[ERROR]: El campo EDAD debe tener 2 cáracteres númericos.');
    edad.focus();
    return false;
  }else if(txtControl == null || txtControl.length == 0 ){
    alert('[ERROR]: El campo N° CONTROL / CLAVE no debe ir vacío.');
    control.focus();
    return false;
  }else if (isNaN(txtControl)) {
    alert('[ERROR]: El campo N° CONTROL / CLAVE debe ser numerico.');
    control.focus();
    return false;
  }else if(!/^\d{8}$/.test(txtControl)){
    alert('[ERROR]: El campo N° CONTROL / CLAVE debe tener 8 cáracteres númericos.');
    control.focus();
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
  }else if(txtContraseña == null || txtContraseña == 0){
    alert('[ERROR]: El campo CONTRASEÑA no debe ir vacío');
    contraseña.focus();
    return false;
  }else if(!(/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(txtContraseña))){
    alert('[ERROR]: La contraseña debe tener entre 8 y 16 caracteres, al menos un número, al menos una minúscula y al menos una mayúscula.');
    contraseña.focus();
    return false;
  }else if(txtRContraseña == null || txtRContraseña == 0){
    alert('[ERROR]: El campo REPITE CONTRASEÑA no debe ir vacío');
    rcontraseña.focus();
    return false;
  }else if(!(/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(txtRContraseña))){
    alert('[ERROR]: La contraseña debe tener entre 8 y 16 caracteres, al menos un número, al menos una minúscula y al menos una mayúscula.');
    rcontraseña.focus();
    return false;
  }else if (txtSexo == null || txtSexo == 0){
    alert('[ERROR]: Debes seleccionar un SEXO.');
    sexo.focus();
    return false;
  }else if (txtRol == null || txtRol == 0){
    alert('[ERROR]: Debes seleccionar un ROL.');
    rol.focus();
    return false;
  }
    return true;
}
function limpiarFormulario(){
  nombre.focus();
  alert('Campos limpios.');
  document.getElementById('contact_form').reset();
}
