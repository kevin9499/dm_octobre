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

    public function insert($table, $tab) {
        $this->unModele->insert($table, $tab);
      }
      public function delete($table, $tab) {
        $this->unModele->delete($table, $tab);
      }
      public function update($table, $tab) {
        $this->unModele->update($table, $tab);
      }

}
?>