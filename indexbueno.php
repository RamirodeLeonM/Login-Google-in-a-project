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

    <body>

        <a href="index.php" onclick="signOut();">Sign out</a>
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
        <h4>Usuario conectado: <br/><img src="<?php echo $imagen; ?>" width="30"/> <?php echo $nombre; ?></h4>
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
        <!-- BOTON PARA CERRAR LA SESION-->
        <button type="button" id="btncerrarsesion" style="display: none;">Desconectar</button>
        <!-- DIV PARA EL BOTÓN DE GOOGLE-->
        <div id="google-signin-button"></div>
    </body>
</html>