function validarEPrestamo(){
  
  var txtNFecha = document.getElementById('nuevaFecha').value;

  if (!isNaN(txtNFecha)){
      alert('[ERROR]: Debes ingresar la nueva fecha.');
      nuevaFecha.focus();
      return false;
    }

  alert('Prestamo editado exitosamente.');
  return true;
}

function validarBusqueda(){
  var txtControl = document.getElementById('control').value;

  if (txtControl == null || txtControl.length == 0){
    alert('[ERROR]: El campo N° CONTROL no debe ir vacío.');
    control.focus();
    return false;
  }else if(isNaN(txtControl)){
    alert('[ERROR]: El campo N° CONTROL debe ser numerico.');
    control.focus();
    return false;
  }else if (!/^\d{8}$/.test(txtControl)){
    alert('[ERROR]: El campo NÚMERO DE CONTROL debe tener 8 cáracteres númericos.');
    control.focus();
    return false;
  }
  return true;
}

function limpiarFormulario(){
  alert('Campos limpios.');
  document.getElementById('form_EPrestamo').reset();
}