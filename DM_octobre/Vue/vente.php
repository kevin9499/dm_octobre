<link href="../css/shop-homepage.css" rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php
session_start();
require_once("../controleur/leControleur.php");
$unControleur = new leControleur("localhost","dm_octobre","root","");
if(isset($_SESSION['nom']))
{
  $connec ='Deconnexion';
  $linkCon ='deconnexion.php';
  $sign = '';
  $signe = '';
  $event = 'vue/evenement.php';
  $objet = 'Mes objets';
}
else
{
  $linkCon ='connexion.php';
  $connec ='Connexion';
  $sign = 'inscription.php';
  $signe = 'Inscription';
  $event = 'connexion.php';
  $objet = '';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>DM</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/heroic-features.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/bootstrap-theme.css" media="screen" >
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/main.css">


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">DM maternelle</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">Accueil
              <span class="sr-only"></span>
            </a>
          </li>
      <?php    if(isset($_SESSION['nom']))
    {
          echo"<li class='nav-item'>
            <a class='nav-link' href='troc.php'>Troc</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='boutique.php'>Boutique</a>
            </li>

            <li class='nav-item'>
            <a class='nav-link' href='selfobjet'>"; echo $objet."</a>
            </li>";
    }?>
                <li class='nav-item'>
            <a class='nav-link' href='objet.php'>Les objets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $linkCon; ?>"><?php echo $connec; ?></a>
            </li>

          <li class="nav-item" ><a class="nav-link" href="<?php echo $sign; ?>"><?php echo $signe; ?></a></li>

          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <header class="jumbotron my-4"><center><img width=" 500"src="../image/objet.jpg"></center>
    </header>

    <?php

  $id_objet = $_GET['id_objet'];
  $id_enfant = $_GET['id_enfant'];
  $result = $unControleur->selectSelfObjet();
  $cout = $unControleur->selectCout($id_objet);
  $point = $unControleur->selectPoint($id_enfant);
  $id = $_SESSION['id_enfant'];
  $point2 = $unControleur->selectPoint($id);

  require_once('formVente.php');
  if(isset($_POST['confirmer']))
  {
      if($point2 >= $cout)
      {
      $unControleur->updateObjet2($_POST,$id_objet);
      $unControleur->updateObjet2($_POST,$id_enfant);
      echo '<div class="modal fade show" style="display : block;" id="ignismyModal" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick = "closeModal()"><span>×</span></button>
              </div>
              <div class="modal-body">
                  <div class="thank-you-pop">
                      <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                      <h1>Merci!</h1>
                      <p>Votre achat à bien été pris en compte!</p>
                  </div> 
              </div>
          </div>
      </div>
  </div>
';

?>

<script>
function closeModal()
{
var modal = document.getElementById("ignismyModal");
modal.style.display = "none";
document.location.href="../index.php";
}
</script>
<style> 
/*--thank you pop starts here--*/
.thank-you-pop{
width:100%;
padding:20px;
text-align:center;
}
.thank-you-pop img{
width:76px;
height:auto;
margin:0 auto;
display:block;
margin-bottom:25px;
}

.thank-you-pop h1{
font-size: 42px;
margin-bottom: 25px;
color:#5C5C5C;
}
.thank-you-pop p{
font-size: 20px;
margin-bottom: 27px;
color:#5C5C5C;
}
.thank-you-pop h3.cupon-pop{
font-size: 25px;
margin-bottom: 40px;
color:#222;
display:inline-block;
text-align:center;
padding:10px 20px;
border:2px dashed #222;
clear:both;
font-weight:normal;
}
.thank-you-pop h3.cupon-pop span{
color:#03A9F4;
}
.thank-you-pop a{
display: inline-block;
margin: 0 auto;
padding: 9px 20px;
color: #fff;
text-transform: uppercase;
font-size: 14px;
background-color: #8BC34A;
border-radius: 17px;
}
.thank-you-pop a i{
margin-right:5px;
color:#fff;
}
#ignismyModal .modal-header{
border:0px;
}
/*--thank you pop ends here--*/
</style>

   <?php   }
      else
      {
        echo "<script> alert('Echange impossible vous ne possedez pas d objet');</script>";
      }
  }
?>


 

    

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/headroom.min.js"></script>
  <script src="js/jQuery.headroom.min.js"></script>
  <script src="js/template.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


