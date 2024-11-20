<!DOCTYPE html>
<html lang="en">
<head>
<title>Lugares turisticos</title>
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
  background-color: #333;
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
  width: 70%;
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
  width: 100%;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.boton-personalizado-3 {
text-decoration:none;
font-weight: 600;
font-size: 15px;
color: black;
padding-top:5px;
padding-bottom:5px;
padding-left:20px;
padding-right:20px;
background-color:  #f1c40f
 ;
border-color: black;
border-width: 2px;
border-style: solid;
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
</head>
<body background="fondopeten.jpg">

<div class="header">
  
</div>

<div class="topnav">
  <a href="index.php">INICIO</a>
  <a href="departamentos.php">DEPARTAMENTOS</a>
  <a href="guia.php">GUÍA DE VIAJE</a>
  <a href="eventos.php">EVENTOS</a>
  <a href="contactos.php">CONTACTOS</a>

</div>
<div class="row">
  <div class="column middle">

    <div class="column side">
      <ul>
        <li><center><a class="active" >Petén</a></center></li>
        <li><a href="peten.php">Información sobre el departamento</a></li>
        <li><a href="petenturistico.php">Lugares turísticos</a></li>
        <li><a href="petenhotel.php">Hoteles</a></li>
        <li><a href="petenmapa.php">Mapa</a></li>
        <li><a href="petengalerias.php">Galeria de fotos</a></li>
      </ul>
    </div>

    <center><h1>TURISMO</h1></center>
    <font face="fantasy"><p>Petén es un lugar que sobresale por su gran valor arqueológico, lleno de historia, fauna y mucha flora. Es considerado como la ciudad del Mundo Maya por todas las esculturas que quedaron de la civilización que lo habitó. Sin duda alguna, Petén es un lugar mágico que te hace vivir experiencias inolvidables al contemplar la bella naturaleza de Guatemala. Conoce estos lugares que debes visitar si viajas a Petén. Agarra tus zapatos más cómodos y explora todas las maravillas que este lugar tiene. ¡Vamos Pues!.</p></font>

    <h1>Cuevas de Actún Kan</h1>

    <center><img src="turismopetencueva.jpg" style="width: 600px; height: 300px;"  > <img src="turismopetencueva1.jpg" style="width: 600px; height: 300px;"> <iframe width="560" height="315" src="https://www.youtube.com/embed/yodW7MHQG1I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>

    <font face="fantasy"><p>El nombre de estas cuevas significa "cueva de las serpientes" y cuenta con un sistema de cuevas con baja dificultad de exploración. Estas hermosas cuevas poseen una importancia mística y religiosa para los mayas, quienes durante ciertas épocas del año acuden a realizar ritos o celebraciones. Es un lugar que debes explorar y es tan cerca de Flores que puedes regresar en bicicleta. Cuenta también con 70 hectáreas de bosque con senderos.</p>
      <p>Muy cerca de Flores |Parque natural |Tour de cuevas</p></font>

    <h2>Teléfono:</h2>
    <font face="fantasy"><p>78675296</p></font>
    <h2>Ubicación:</h2>
    <font face="fantasy"><p>Santa Rosa, Petén</p></font>


    <p align="left"><a class="boton-personalizado-3" href="petenturistico.php">ATRAS</a></p><p align="right"><a class="boton-personalizado-3" href="petenturistico3.php">SIGUIENTE</a></p>

     

  </div>
</div>

<div class="footer">
  
</div>
  
</body>
</html>