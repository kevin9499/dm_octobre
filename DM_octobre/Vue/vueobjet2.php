<!-- Custom styles for this template -->
<link href="../css/shop-homepage.css" rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php
//$lesObjet = $unControleur->selectObjet();
//$lesEnfants = $unControleur->selectEnfant();
?>

<?php
require_once("formObjet.php");
if(isset($_POST['vendre']))
{
    $envoi = array ("libelle"=>$_POST['libelle'], 
    "point"=>$_POST['point'],
    "type"=>$_POST['type'],
    "id_enfant"=>$_SESSION['id_enfant']
   );
    $unControleur->insert("objet",$envoi);
}
 if(isset($_POST['Supprimer']))
 {
  $id_objet = $_POST['hidden'];
  $envoi = array ( "id_objet"=>$id_objet);
  $unControleur->delete("objet",$envoi);
 }
 if(isset($_POST['Modifier']))
 {
     $id_objet = $_GET['id_objet'];    
     $unControleur->updateO($_POST,$id_objet);
 }



$result = $unControleur->selectObjet();
//$resultSelf= $unControleur->calculeSelfObjet($id);
require_once("affichageObjet.php");

 
?>
