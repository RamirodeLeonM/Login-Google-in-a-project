<?php
session_start();
error_reporting(0);
$varsession = $_SESSION['id'];

if($varsession == null || $varsession = '') {
  echo 'NO TIENE ACCESO, DEBE REGISTRARSE PREVIAMENTE CON SU CUENTA GOOGLE';
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

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
* {
  box-sizing: border-box;
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

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
  text-align: justify;
}

/* Left and right column */
.column.side {
  width: 65%;

}

/* Middle column */
.column.middle {
  width: 35%;
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

    <body background="fondoprincipal.jpg">

<div class="header" >
 
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
    <center><font face="Verdana, Arial, Helvetica, sans-serif"><h2> Guatemala</h2></font></center>

    <font face="fantasy"><p>Guatemala, es el Corazón del Mundo Maya. Viva, mágica, mística y ancestral. Su historia se remonta a cuatro mil años, cuando emergió la civilización maya, cuyo legado perdura hoy en día con las tradiciones y cultura de su gente.</p>
    <p>Guatemala es un país de extraordinaria riqueza cultural y natural y con una ubicación geográfica privilegiada. Las distancias de lugar a lugar son cortas, lo que permite visitar varias regiones en un mismo viaje.</p>
    <p>Es un país único, de aventura, inolvidable, entre su pasado y presente, además de la diversidad de actividades que ofrece al visitante. Conocido como el país de la eterna primavera, goza de un clima agradable que permite visitarlo en cualquier época del año. Además, ofrece varias posibilidades de acceso desde cualquier parte del mundo, contando con dos aeropuertos internacionales: La Aurora, situado en la ciudad capital; y Mundo Maya, ubicado en el departamento de Petén.</p>
    <p>El colorido de sus mercados de artesanías y de sus trajes regionales, la hospitalidad de su gente, la belleza de sus paisajes naturales que enmarcan volcanes, lagos, ríos y montañas, hacen que Guatemala quede grabada en el corazón de quienes la visitan. Su patrimonio natural, cultural e histórico puede descubrirse en cada rincón del país.</p>
    <p>Guatemala alberga la mayor cantidad de sitios arqueológicos de la cultura maya, rodeados de una impresionante flora y fauna, que los convierte en verdaderos pulmones de la humanidad. La magia y el misterio del Mundo Maya subsisten en ciudades milenarias como Tikal, Yaxhá, Aguateca, Mirador, Quiriguá y Q’uma’rkaj entre otras.</p>
    <p>Además, Guatemala ofrece ventajas en algunos segmentos específicos para los visitantes, como su ubicación estratégica, facilidades en sus terminales terrestres y marítimas, lo que la hacen un importante destino para los cruceros del Pacífico y el Atlántico. Sus recursos pesqueros en la Costa Pacífica le han dado reconocimiento como uno de los mejores lugares para la pesca del pez vela en el mundo. La variedad de más de 720 especies de aves, la convierte en un maravilloso e importante destino para observarlas. Así también, el país posee todas las características para propiciar actividades de negocios, además de ser un destino ideal para convenciones nacionales e internacionales.</p>
    <p>Guatemala con su riqueza y diversidad ofrece numerosas formas para gozar sus vacaciones o viajes de negocios, porque pueden encontrar en un solo lugar diferentes segmentos de turismo, en sus siete maravillosas regiones.</p></font>

    <center><font face="Verdana, Arial, Helvetica, sans-serif"><h3> MONEDA</h3></font></center>
    <p>La moneda oficial es el Quetzal (Q)/Q. 1.00 = 100 centavos.</p>
    <p>En Guatemala se aceptan diversidad de tarjetas de crédito, a excepción de la tarjeta Maestro. También se pueden utilizar cheques de viajero.</p>

    <center><font face="Verdana, Arial, Helvetica, sans-serif"><h3> INFORMACIÓN DE MIGRACIÓN</h3></font></center>
    <p>Requisitos Migratorios</p>
    <p>Los ciudadanos centroamericanos pueden ingresar a Guatemala con su Cédula de Vecindad, documento único de identidad o pasaporte vigente. Las personas de nacionalidad europea y estadounidense no necesitan visa.</p>
    <p>Todos los trámites ordinarios de migración y aduanas en las fronteras de Guatemala son gratuitos. En casos especiales, en los que se aplique algún cobro, las autoridades respectivas deberán entregar el comprobante del pago respectivo.</p>
    <p>Impuestos</p>
    <p>Todos los precios tienen incluido el Impuesto al Valor Agregado (IVA) del 12%, Este impuesto puede ya estar incluido en su boleto aéreo. Consulte con su agencia.</p>

  </div>
  
  <div class="column middle">
    
    <iframe width="460" height="315" src="https://www.youtube.com/embed/naBMug4u8_Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <img src="bandera.jpg" alt="Mapa" style="width: 460px; height: 250px;" align="center">
    <center><h4>Bandera Nacional de Guatemela.</h4></center>

    <img src="monjab.jpg" alt="Orquídea Monja Blanca" style="width: 460px; height: 450px;" align="center">
    <center><h4> Orquídea Monja Blanca, Flor nacional.</h4></center>
    
  </div>
  
  
</div>


<div class="footer">
  
</div>









































        


    </body>
</html>