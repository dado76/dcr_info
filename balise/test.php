<!DOCTYPE html>
<html>
<title>Gestion des balises de géolocalisation</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" charset="utf8" src="js.js"></script>
  <?php    include("../auth.php");  ?>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-blue w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"> Direction Collecte et Recyclage    <img src="https://3d.codah.fr/img/logos/logo_codah_big.jpg"  style="width:22px"></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
    <img src="https://3d.codah.fr/img/logos/logo_codah_big.jpg"  style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Bienvenu, <strong><?php echo $_SESSION["username"];  ?> </strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>

    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h4>Menu</h4>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="test.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-home fa-fw"></i> Accueil</a>
    <a href="test.php" class="w3-bar-item w3-button w3-padding w3-blue  "><i class="fa fa-map-marker fa-fw"></i> Géolocalisation </a>
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-file-video-o fa-fw"></i> Video-Protection</a>
    <a href="#" class="w3-bar-item w3-button w3-padding "><i class="fa fa-phone fa-fw"></i> Radio</a>

    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-truck fa-fw"></i>  Bom</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>  Profil</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-close fa-fw"></i>  Logout</a>

  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Tableau de bord</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom" style="				border:1px solid #ccc;
        margin:15px;	border-radius:5px; padding:15px;   margin-top:35px;">
    <?php include("../1.php")?>
<?php include("../2.php")?>
    <div class="w3-quarter" style="float:right">

      <div class="w3-container w3-blue w3-padding-16">

        <div class="w3-left"><i class="fa fa-map-marker w3-xxxlarge"></i></div>

        <div class="w3-right">
          <h3><?php echo $nb ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Nombre de Balise</h4>
      </div>
    </div>
  </div>


  <div class="w3-panel">


          <tr>
    <?php include("../balise/index.php")?>

  <!-- Footer -->

</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>
<script>
$(document).ready(function(){
   $('td').each(function(){
        if ($(this).text() == 'REFORME') {
            $(this).css('background-color','#F5A9A9');
        }
    });
});


$(document).ready(function(){
   $('td').each(function(){
        if ($(this).text() == 'EN SERVICE') {
            $(this).css('background-color','#CEF6CE');
        }
    });
});

$(document).ready(function(){
   $('td').each(function(){
        if ($(this).text() == 'EN STOCK') {
            $(this).css('background-color','#F6E3CE');
        }
    });
});

$(document).ready(function(){
   $('td').each(function(){
        if ($(this).text() == 'HS') {
            $(this).css('background-color','#F5A9A9');
        }
    });
});
</script>

</body>
</html>
