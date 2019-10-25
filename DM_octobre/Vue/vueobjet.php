<!-- Custom styles for this template -->
<link href="../css/shop-homepage.css" rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php
//$lesObjet = $unControleur->selectObjet();
//$lesEnfants = $unControleur->selectEnfant();
?>
<?php


$result = $unControleur->selectObjet();
//$resultSelf= $unControleur->calculeSelfObjet($id);
require_once("affichageObjet2.php");

 
?>
