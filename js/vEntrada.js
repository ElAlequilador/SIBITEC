function validarVisita(){
  var correo = document.getElementById("correo").value; 
  var password = document.getElementById("contraseña").value; 

  if (correo == "L16380624@cdvictoria.tecnm.mx" && password == "1234") {
    alert('Bienvenido');
  }else{
    alert('Error');
  }
}
function regresar(){
  location = "index.html";
}
function registro(){
  location = "registro.html";
}