function validarEditLibro(){

  var txtFolio = document.getElementById('folio').value;
  var txtCodigo = document.getElementById('codigo').value;
  var txtTitulo = document.getElementById('titulo').value;
  var txtAutores = document.getElementById('autor').value;
  var txtEditorial = document.getElementById('editorial').value;
  var txtCategoria = document.getElementById('categoria').selectedIndex;
  var txtSeccion = document.getElementById('seccion').selectedIndex;

      
  if( txtFolio == null || txtFolio.length == 0 || /^\s+$/.test(txtFolio) ) {
    alert('[ERROR]: El campo FOLIO no debe ir vacío.');
    folio.focus();
    return false;
  }else if (txtCodigo == null || txtCodigo.length == 0 || isNaN(txtCodigo)){
    alert('[ERROR]: El campo CODIGO no debe ir vacío, y debe ser numerico.');
    codigo.focus();
    return false;
  }else if (txtTitulo == null || txtTitulo.length == 0 || /^\s+$/.test(txtTitulo)){
    alert('[ERROR]: El campo TITULO no debe ir vacío.');
    titulo.focus();
    return false;
  }else if (txtAutores == null || txtAutores.length == 0 || /^\s+$/.test(txtAutores)){
    alert('[ERROR]: El campo AUTORES no debe ir vacío, y debe ser texto.');
    autores.focus();
    return false;
  }else if (txtEditorial == null || txtEditorial.length == 0 || /^\s+$/.test(txtEditorial)){
    alert('[ERROR]: El campo EDITORIAL no debe ir vacío.');
    editorial.focus();
    return false;
  }else if (txtCategoria == null || txtCategoria == 0){
    alert('[ERROR]: Debes seleccionar una categoria.');
    categoria.focus();
    return false;
  }else if (txtSeccion == null || txtSeccion == 0){
    alert('[ERROR]: Debes seleccionar una seccion.');
    seccion.focus();
    return false;
  }
  
  return true;
}
function limpiarFormulario(){
  alert('Campos limpios.');
  document.getElementById('form_NLibro').reset();
  folio.focus();
}
