function validarEditCategoria(){
  var txtCodigo = document.getElementById('codigo').value;
  var txtCategoria = document.getElementById('nombre').value;
  var sololetras = /^[A-Za-z ñÑ]+$/;

if( txtCodigo == null || txtCodigo.length == 0) {
    alert('[ERROR]: El campo CODIGO DE LA CATEGORIA no debe ir vacío y debe ser númerico.');
    codigo.focus();
    return false;
  }else if (isNaN(txtCodigo)) {
    alert('[ERROR]: El campo CODIGO DE LA CATEGORIA debe ser numerico.');
    codigo.focus();
    return false;
  }else if (!/^\d{8}$/.test(txtCodigo)) {
    alert('[ERROR]: El campo CODIGO DE LA CATEGORIA debe tener 8 caracteres númericos.');
    codigo.focus();
    return false;
  }else if (txtCategoria == null || txtCategoria.length == 0) {
    alert('[ERROR]: El campo NOMBRE DE LA CATEGORIA no debe ir vacío .');
    nombre.focus();
    return false;
  }else if (!sololetras.test(txtCategoria)) {
  alert('[ERROR]: El campo NOMBRE DE LA CATEGORIA no es valido.')
  nombre.focus();
  return false;
  }else if (txtCategoria.length > 30) {
    alert('[ERROR]: El campo NOMBRE DE LA CATEGORIA es muy largo');
    nombre.focus();
    return false;
  }
  return true;
}
function limpiarFormulario(){
  alert('Campos limpios.');
  document.getElementById('form_EditCategoria').reset();
}