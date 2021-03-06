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
    <header class="jumbotron my-4"><center>
    <?php
    if($_SESSION['id_enfant'] == 1)
    {
    echo "<img width=' 500' src='../image/enfant1.jpg'>";
    }
    ?>
    <?php
        if($_SESSION['id_enfant'] == 2)
        {
    echo "<img width=' 500' src='../image/enfant2.jpg'>";
        }
    ?>
    <?php
        if($_SESSION['id_enfant'] == 3)
        {
    echo "<img width=' 500' src='../image/enfant3.jpg'>";
        }
    ?>
    <?php
        if($_SESSION['id_enfant'] == 7)
        {
    echo "<img width=' 500' src='../image/enfant4.jpg'>";
        }
    ?>
    <?php
        if($_SESSION['id_enfant'] == 8)
        {
    echo "<img width=' 500' src='../image/enfant5.jpg'>";
        }
        if($_SESSION['id_enfant'] == 9)
        {
    echo "<img width=' 500' src='../image/enfant6.jpg'>";
        }
    ?>
    </center>
    </header>
    <header class="jumbotron my-4"><center><h1>Ajouter objet</h1></center>
    </header>
    <center>

   
   <div class="col-sm-12">
  <?php require_once("vueobjet2.php");?>
   </div>


   </center>


  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/headroom.min.js"></script>
  <script src="js/jQuery.headroom.min.js"></script>
  <script src="js/template.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
