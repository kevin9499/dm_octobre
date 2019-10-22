<?php 
require_once("../Modele/leModele.php");
class leControleur
{
    private $unModele;
    public function __construct($serveur,$bdd,$user,$mdp)
    {
        //instanciation de la class modele
        $this->unModele = new leModele($serveur,$bdd,$user,$mdp);
    }
  
    public function selectProduit()
    {
        $resultats = $this->unModele->selectProduit();
        return $resultats;
    }
    public function insertProduit($tab)
    {
        $this->unModele->insertProduit($tab);
    }
    public function deleteProduit($id_produit)
    {
        // on peu controler l'id produit
        $this->unModele->deleteProduit($id_produit);
    }
    public function verifConnexion($login, $mdp)
    {
        // on peu controler les donnees 
        return $this->unModele->verifConnexion($login, $mdp);
    }
    public function selectCategorie()
    {
        $resultats = $this->unModele->selectCategorie();
        return $resultats;
    }
    public function insertCategorie($tab)
    {
        $this->unModele->insertCategorie($tab);
    }
    public function deleteCategorie($id_categorie)
    {
        // on peu controler l'id produit
        $this->unModele->deleteCategorie($id_categorie);
    }
    public function selectUser()
    {
        $resultats = $this->unModele->selectUser();
        return $resultats;
    }
    public function insertUser($tab)
    {
        $this->unModele->insertUser($tab);
    }
    public function deleteUser($id_user)
    {
        // on peu controler l'id produit
        $this->unModele->deleteUser($id_user);
    }
    public function selectMessage()
    {
        $resultats = $this->unModele->selectMessage();
        return $resultats;
    }
    public function insertMessage($tab)
    {
        $this->unModele->insertMessage($tab);
    }
    public function deleteMessage($id_mess)
    {
        // on peu controler l'id produit
        $this->unModele->deleteMessage($id_mess);
    }
    public function selectCommentaire()
    {
        $resultats = $this->unModele->selectCommentaire();
        return $resultats;
    }
    public function insertCommentaire($tab)
    {
        $this->unModele->insertCommentaire($tab);
    }
    public function deleteCommentaire($id_com)
    {
        // on peu controler l'id produit
        $this->unModele->deleteCommentaire($id_com);
    }
    public function selecEvent()
    {
        $resultats = $this->unModele->selectEvent();
        return $resultats;
    }
    public function insertEvent($tab)
    {
        $this->unModele->insertEvent($tab);
    }
    public function deleteEvent($id_event)
    {
        // on peu controler l'id produit
        $this->unModele->deleteEvent($id_event);
    }
}
?>