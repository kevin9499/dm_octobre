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
  
    public function verifConnexion($login, $mdp)
    {
        // on peu controler les donnees 
        return $this->unModele->verifConnexion($login, $mdp);
    }
    public function selectObjet()
    {
      return $this->unModele->selectObjet();
    }
    public function selectVente()
    {
      return $this->unModele->selectVente();
    }

    public function selectSelfObjet()
    {
      return $this->unModele->selectSelfObjet();
    }
    public function selectCout($id_objet)
    {
      return $this->unModele->selectCout($id_objet);
    }

    public function updateobjet2($tab, $id)
    {
      $this->unModele->updateObjet2($tab, $id);
    }
    public function updateObjet($tab, $id)
    {
      $this->unModele->updateObjet($tab, $id);
    }
    public function selectTroc()
    {
      return $this->unModele->selectTroc();
    }

    public function insert($table, $tab) {
        $this->unModele->insert($table, $tab);
      }
      public function delete($table, $tab) {
        $this->unModele->delete($table, $tab);
      }
      public function update($table, $tab, $id) {
        $this->unModele->update($table, $tab, $id);
      }

}
?>