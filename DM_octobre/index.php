<?php
session_start();
if(isset($_SESSION['nom']))
    {
      $connec ='Deconnexion';
      $linkCon ='vue/deconnexion.php';
      $sign = '';
      $signe = '';
      $event = 'vue/evenement.php';
      $objet = 'Mes objets';
    }
    else
    {
      $linkCon ='vue/connexion.php';
      $connec ='Connexion';
      $sign = 'vue/inscription.php';
      $signe = 'Inscription';
      $event = 'vue/connexion.php';
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/heroic-features.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap-theme.css" media="screen" >
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css">


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
            <a class="nav-link" href="index.php">Accueil
              <span class="sr-only"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vue/troc.php">Troc</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vue/boutique.php">Boutique</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="vue/objet.php">Les objets</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="vue/selfobjet"><?php echo $objet; ?></a>
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
    <header class="jumbotron my-4"><center><img width=" 500"src="image/ecolematernelle.jpg"></center>
    </header>
    <section id="hotels" class="section-with-bg wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Lieu</h2>
          <p>Lieu disponible pour les événements</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="img/hotels/1.jpg" alt="Hotel 1" class="img-fluid" width="500px">
              </div>
              <h3><a href="vue/expo.php">Parc des expositions</a></h3>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="img/hotels/2.jpg" alt="Hotel 2" class="img-fluid">
              </div>
              <h3><a href="vue/vilette.php">La Villette</a></h3>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-full"></i>
              </div>
              <p></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="img/hotels/3.jpg" alt="Hotel 3" class="img-fluid" width="500px" height="300px" >
              </div>
              <h3><a href="vue/pompidou.php">Pompidou</a></h3>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </section>
  <footer class="foot">
    <div class="container">
      <p class="m-0 text-center text-white footer1">Copyright &copy;TD 2019</p>
    </div>
  </footer>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/headroom.min.js"></script>
  <script src="js/jQuery.headroom.min.js"></script>
  <script src="js/template.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
