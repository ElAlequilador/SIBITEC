function validarEditAlumno(){

  var txtNombre = document.getElementById('nombre').value;
  var txtCorreo = document.getElementById('correo').value;
  var txtEdad = document.getElementById('edad').value;
  var txtControl = document.getElementById('control').value;
  var txtTelefono = document.getElementById('telefono').value;
  var txtCarrera = document.getElementById('carrera').value;
  var txtSexo = document.getElementById('sexo').value;
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
  }else if (!(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(txtCorreo))){
    alert('[ERROR]: El campo CORREO INSTITUCIONAL debe contener 3 subdominios(@cdvictoria.tecnm.mx/@itvictoria.edu.mx).');
    correo.focus();
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
  }if( txtCarrera == null || txtCarrera.length == 0 ) {
    alert('[ERROR]: El campo CARRERA no debe ir vacío.');
    carrera.focus();
    return false;
  }else if (txtNombre.length > 40) {
    alert('[ERROR]: El campo CARRERA es muy largo.') ;
    carrera.focus();
    return false;
  }if( txtSexo == null || txtSexo.length == 0 ) {
    alert('[ERROR]: El campo SEXO no debe ir vacío.');
    sexo.focus();
    return false;
  }else if (txtSexo.length > 40) {
    alert('[ERROR]: El campo SEXO es muy largo.') ;
    sexo.focus();
    return false;
  }else if (!sololetras.test(txtSexo)) {
    alert('[ERROR]: El campo SEXO no es valido.') ;
    sexo.focus();
    return false;
  }
    return true;
}
function limpiarFormulario(){
  alert('Campos limpios.');
  document.getElementById('form_EditAlumno').reset();
}