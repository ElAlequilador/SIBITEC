function validarECategoria(){
  var txtCodigo = document.getElementById('id_categoria').value;
  var txtCategoria = document.getElementById('nombre').value;
  var sololetras = /^[A-Za-z ñÑ]+$/;

if( txtCodigo == null || txtCodigo.length == 0) {
    alert('[ERROR]: El campo CODIGO DE LA CATEGORIA no debe ir vacío y debe ser númerico.');
    cod_categoria.focus();
    return false;
  }else if (isNaN(txtCodigo)) {
    alert('[ERROR]: El campo CODIGO DE LA CATEGORIA debe ser numerico.');
    cod_categoria.focus();
    return false;
  }else if (!/^\d{3}$/.test(txtCodigo)) {
    alert('[ERROR]: El campo CODIGO DE LA CATEGORIA debe tener 3 caracteres númericos.');
    cod_categoria.focus();
    return false;
  }else if (txtCategoria == null || txtCategoria.length == 0) {
    alert('[ERROR]: El campo NOMBRE DE LA CATEGORIA no debe ir vacío .');
    nombre_categoria.focus();
    return false;
  }else if (!sololetras.test(txtCategoria)) {
  alert('[ERROR]: El campo NOMBRE DE LA CATEGORIA no es valido.')
  nombre_categoria.focus();
  return false;
  }else if (txtCategoria.length > 50) {
    alert('[ERROR]: El campo NOMBRE DE LA CATEGORIA es muy largo');
    nombre_categoria.focus();
    return false;
  }
  return true;
}
function limpiarCategoria(){
  alert('Campos limpios.');
  document.getElementById('form_ECategoria').reset();
}