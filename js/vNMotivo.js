function validarCarrera(){
  var txtCodigo = document.getElementById('codigo').value;
  var txtCarrera = document.getElementById('motivo').value;
  var sololetras = /^[A-Za-z ñÑ]+$/;

if( txtCodigo == null || txtCodigo.length == 0) {
    alert('[ERROR]: El campo CODIGO DEL MOTIVO no debe ir vacío y debe ser númerico.');
    codigo.focus();
    return false;
  }else if (isNaN(txtCodigo)) {
    alert('[ERROR]: El campo CODIGO DEL MOTIVO debe ser numerico.');
    codigo.focus();
    return false;
  }else if (!/^\d{8}$/.test(txtCodigo)) {
    alert('[ERROR]: El campo CODIGO DEL MOTIVO debe tener 8 caracteres númericos.');
    codigo.focus();
    return false;
  }else if (txtCarrera == null || txtCarrera.length == 0) {
    alert('[ERROR]: El campo NOMBRE DEL MOTIVO no debe ir vacío .');
    nombre.focus();
    return false;
  }else if (!sololetras.test(txtCarrera)) {
  alert('[ERROR]: El campo NOMBRE DEL MOTIVO no es valido.')
  nombre.focus();
  return false;
  }else if (txtCarrera.length > 50) {
  alert('[ERROR]: El campo NOMBRE DEL MOTIVO es muy largo');
  nombre.focus();
  return false;
  }
  return true;
}
function limpiarMotivo(){
  alert('Campos limpios.');
  document.getElementById('form_motivo').reset();
}