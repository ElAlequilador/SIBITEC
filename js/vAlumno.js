function validarAlumno(){

  var txtNombre = document.getElementById('nombre').value;
  var txtControl = document.getElementById('control').value;
  var txtCarrera = document.getElementById('carrera').selectedIndex;
  var txtEdad = document.getElementById('edad').value;
  var txtSexo = document.getElementById('sexo').selectedIndex;
  var txtTelefono = document.getElementById('telefono').value;
  var txtCorreo = document.getElementById('correo').value;
  var txtDominio = document.getElementById('dominio').selectedIndex;
  

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
  }else if(txtControl == null || txtControl.length == 0 ){
    alert('[ERROR]: El campo NÚMERO DE CONTROL no debe ir vacío.');
    control.focus();
    return false;
  }else if (isNaN(txtControl)) {
    alert('[ERROR]: El campo NÚMERO DE CONTROL debe ser numerico.');
    control.focus();
    return false;
  }else if(!/^\d{8}$/.test(txtControl)){
    alert('[ERROR]: El campo NÚMERO DE CONTROL debe tener 8 cáracteres númericos.');
    control.focus();
    return false;
  }else if (txtCarrera == null || txtCarrera == 0){
    alert('[ERROR]: Debes seleccionar una carrea.');
    carrera.focus();
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
  }else if (txtSexo == null || txtSexo == 0){
    alert('[ERROR]: Debes seleccionar un sexo.');
    sexo.focus();
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
  }
    return true;
}

function limpiarAlumno(){
  alert('Campos limpios.');
  document.getElementById('form_NAlumno').reset();
}