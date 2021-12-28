function validarSeccion(){
  
  var txtCodigoS = document.getElementById('cod_seccion').value;
  var txtSeccion = document.getElementById('nombre_seccion').value;
  var txtCategoria = document.getElementById('categoria').selectedIndex;
  var sololetras = /^[A-Za-z ñÑ]+$/;

  if (txtCodigoS == null || txtCodigoS.length == 0 || isNaN(txtCodigoS)){
      alert('[ERROR]: El campo CÓDIGO DE SECCION no debe ir vacío, y debe ser numerico.');
      cod_seccion.focus();
      return false;

    }else if (!/^\d{8}$/.test(txtCodigoS)) {
      alert('[ERROR]: El campo CODIGO DE LA SECCION solo debe tener 8 carácteres. ');
      cod_seccion.focus();
      return false;

    }else if (txtSeccion == null || txtSeccion.length == 0 ){
      alert('[ERROR]: El campo NOMBRE DE SECCION no debe ir vacío, y debe ser texto.');
      nombre_seccion.focus();
      return false;

    }else if (!sololetras.test(txtSeccion)) {
      alert('[ERROR]: El campo NOMBRE DE LA SECCION no es válido. ');
      nombre_seccion.focus();
      return false;

    }else if (txtSeccion.length > 30) {
      alert('[ERROR]: El campo NOMBRE DE LA SECCION es muy largo. ');
      nombre_seccion.focus();
      return false;

    }else if(txtCategoria == null || txtCategoria == 0){
      alert('[ERROR]: Debes seleccionar una categoría para la seccion.');
      categoria.focus();
      return false;
    }
    return true;
}

function validarBusqueda(){
  var txtCodigoS = document.getElementById('cod_seccion').value;

  if (txtCodigoS == null || txtCodigoS.length == 0) {
    alert('[ERROR]: El campo CODIGO DE LA SECCION no debe ir vacio.');
    cod_seccion.focus();
    return false;
  }else if (isNaN(txtCodigoS)) {
    alert('[ERROR]: El campo CODIGO DE LA SECCION debe ser númerico.');
    cod_seccion.focus();
    return false;
  }else if (!/^\d{8}$/.test(txtCodigoS)) {
    alert('[ERROR]: El campo CODIGO DE LA SECCION debe tener 8 caracteres. ');
    cod_seccion.focus();
    return false;

  }

}

function limpiarSeccion(){
  alert('Campos limpios.');
  document.getElementById('form_seccion').reset();
}