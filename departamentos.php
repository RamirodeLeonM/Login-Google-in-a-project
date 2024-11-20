<?php
session_start();
error_reporting(0);
$varsession = $_SESSION['id'];

if($varsession == null || $varsession = '') {
  echo 'USTED NO TIENE AUTORIZACIÓN';
  die();
}
?>


<?php 
session_start();
$id = '';
$nombre = '';
$imagen = '';
if (filter_input(INPUT_POST,"cerrarsesion")){
    session_destroy();
}else{
    if(isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $nombre = $_SESSION['nombre'];
        $imagen = $_SESSION['imagen'];
    }else{
        if(filter_input(INPUT_POST,"id") != ""){
            $id = $_SESSION['id'] = filter_input(INPUT_POST,"id");
            $nombre = $_SESSION['nombre'] = filter_input(INPUT_POST,"nombre");
            $imagen = $_SESSION['imagen'] = filter_input(INPUT_POST,"imagen");
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
<title>Departamentos</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}
.otroestilo { 
   
  font-size:10px ; 
  color:  #66FF33 ;
   }

body {
  margin: 0;
}

/* Style the header */
.header {

  background: url(portadaguate1.png);
  height: 300px;
  padding: 20px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #547674;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 60%;
  background-color: #f1f1f1;
  
  height: auto;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color:  #5dade2;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
  text-align: justify;
}

.column.side {
  width: 30%;

}

/* Middle column */
.column.middle {
  width: 70%;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}

/* Style the footer */
.footer {
  background: url(piemundomaya3.png);
  height: 90px;
  padding: 10px;
  text-align: center;
}
</style>
 <meta name="google-signin-client_id" content="261031048473-iidu7s71n3bia0r7n1vhdpub64q7ea4r.apps.googleusercontent.com">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
        <script>
            $(document).ready(function(){
                //boton para cerrar la sesión
                $('#btncerrarsesion').click(function(){
                    signOut();
                });
            });
            
            
            function onLoad() {
                gapi.load('auth2', function() {
                    var auth2 = gapi.auth2.init();
                    auth2.then(function(){
                        var isSignedIn = auth2.isSignedIn.get();
                        //Mostraremos el boton de iniciar sesión de google unicamente si el usuario no está conectado
                        if (!isSignedIn) {
                            gapi.signin2.render('google-signin-button', {
                              'onsuccess': 'onSignIn'  
                            });
                        }else{
                            //mostramos el boton de cerrar la sesión
                            $('#btncerrarsesion').show();
                        }
                    });
                });
            }
            
            //funcion automatica que llama sign-in
            function onSignIn(googleUser) {
                var profile = googleUser.getBasicProfile();
                
                $('#id').val(profile.getId());
                $('#nombre').val(profile.getName());
                $('#imagen').val(profile.getImageUrl());
                $('#email').val(profile.getEmail());
                $('#formlogin').submit();
            }
            
            //funcion para cerrar la sision en google sign-in
            function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();

                var isSignedIn = auth2.isSignedIn.get();

                if(isSignedIn){
                    auth2.disconnect().then(function () {
                        logout();
                    });
                }else{
                    logout();
                }
            }
            
            //hacemos el post para finalizar la sesión en nuestro servidor
            function logout() {
                $('#formlogout').submit();
            }
        </script>
</head>
<body background="fondo.jpg">

<div class="header">
  
</div>

<div class="topnav">

  <script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script>
        <!-- MOSTRAMOS INFO DEL USUARIO SI ESTA CONECTADO-->
        <?php if($id != ""){ ?>
        <h4>Usuario conectado: <br/><img src="<?php echo $imagen; ?>" width="55"/> <?php echo $nombre; ?></h4>
        <?php }else{ ?>
        <h4>Ningun usuario conectado</h4>
        <?php } ?>
        
        <!-- FORMULARIO PARA INICIAR LA SESIÓN-->
        <form method="POST" id="formlogin">
            <input type="hidden" id="id" name="id" />
            <input type="hidden" id="imagen" name="imagen" />
            <input type="hidden" id="email" name="email" />
            <input type="hidden" id="nombre" name="nombre" />
        </form>
        <!-- FORMULARIO PARA CERRAR LA SESION-->
        <form method="POST" id="formlogout">
            <input type="hidden" name="cerrarsesion" value="1"/>
        </form>


  <a href="inicio.php">INICIO</a>
  <a href="departamentos.php">DEPARTAMENTOS</a>
  <a href="guia.php">GUÍA DE VIAJE</a>
  <a href="eventos.php">EVENTOS</a>
  <a href="contactos.php">CONTACTOS</a>
  <!-- BOTON PARA CERRAR LA SESION-->
<button type="button" id="btncerrarsesion" style="display: none;">Desconectar</button>
<a href="index.php" onclick="signOut();">Sign out</a>

</div>
<div class="row">
<div class="column side">
  <ul>
  <li><a class="active" > Escoge un departamento</a></li>
  <li><a href="sanmarcos.php"><span class="otroestilo">Disp.</span> San Marcos</a></li>
  <li><a href="peten.php"><span class="otroestilo">Disp.</span>Petén</a></li>
  <li><a href="izabal.php"><span class="otroestilo">Disp.</span>Izabal</a></li>
  <li><a>Solola</a></li>
  <li><a>Escuintla</a></li>
</ul>

</div>




  <div class="column middle">
    <center><h2>DEPARTAMENTOS DISPONIBLES</h2></center>
  

    <center><img src="mapa2.png" alt="Mapa de Guatemala" style="width: 400px;height: 400px;"></center></h2>
   

      
  </div>
</div>

<div class="footer">
  
</div>
  
</body>
</html>