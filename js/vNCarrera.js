function validarCarrera(){
  var txtCodigo = document.getElementById('codigo').value;
  var txtCarrera = document.getElementById('nombre').value;
  var sololetras = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;

if( txtCodigo == null || txtCodigo.length == 0) {
    alert('[ERROR]: El campo CODIGO DE LA CARRERA no debe ir vacío y debe ser númerico.');
    codigo.focus();
    return false;
  }else if (isNaN(txtCodigo)) {
    alert('[ERROR]: El campo CODIGO DE LA CARRERA debe ser numerico.');
    codigo.focus();
    return false;
  }else if (!/^\d{8}$/.test(txtCodigo)) {
    alert('[ERROR]: El campo CODIGO DE LA CARRERA debe tener 8 caracteres númericos.');
    codigo.focus();
    return false;
  }else if (txtCarrera == null || txtCarrera.length == 0) {
    alert('[ERROR]: El campo NOMBRE DE LA CARRERA no debe ir vacío .');
    nombre.focus();
    return false;
  }else if (!sololetras.test(txtCarrera)) {
  alert('[ERROR]: El campo NOMBRE DE LA CARRERA no es valido.')
  nombre.focus();
  return false;
  }else if (txtCarrera.length > 50) {
  alert('[ERROR]: El campo NOMBRE DE LA CARRERA es muy largo');
  nombre.focus();
  return false;
  }
  return true;
}
function limpiarCategoria(){
  alert('Campos limpios.');
  document.getElementById('form_carrera').reset();
}