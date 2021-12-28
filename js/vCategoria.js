function validarCategoria(){
  var txtCategoria = document.getElementById('nombre_categoria').value;
  var sololetras = /^[A-Za-z ñÑ]+$/;

if (txtCategoria == null || txtCategoria.length == 0) {
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
  document.getElementById('form_categoria').reset();
  nombre_categoria.focus();
}