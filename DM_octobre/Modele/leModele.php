<?php 
class leModele
{
    private $unPdo;
    public function __construct ($serveur, $bdd, $user, $mdp)
    {
        $this->unPdo = null;
   try
    { 
        //connexion base de donnée            
        $this->unPdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd,$user,$mdp);
    }
    catch(PDOException $exp)
    {
        echo "Erreur de connexion à la base de données";
        //afficher le message
        echo $exp->getMessage();
    }
}

public function verifConnexion($login, $mdp)
{
    if($this->unPdo!=null)
    {
        $requete ="select * from enfant where nom = :nom and prenom = :prenom;";
        $donnees = array(":nom"=>$login,":prenom"=>$mdp);
        $select = $this->unPdo->prepare($requete);
        $select->execute($donnees);
        $resultat = $select->fetch();
        return $resultat;
    }
}




public function selectUser ()
{
    if($this->unPdo != null)
    {
        $requete = "select * from utilisateur ;";
        $select = $this->unPdo->prepare($requete);
        $select->execute ();
        $resultats = $select->fetchAll();
        return $resultats;
    }
}
public function insertUser ($tab)
    {
        if($this->unPdo != null)
            {
                $requete = "insert into utilisateur values (null, :login, :mdp, :nom, :prenom);";
                $donnees = array(":login"=>$tab['login'],
                                 ":mdp"=>$tab['mdp'],
                                 ":nom"=>$tab['nom'],
                                 ":prenom"=>$tab['prenom']);
                $insert = $this->unPdo->prepare ($requete);
                $insert->execute($donnees);
            }
    }
public function deleteUser ($id_user)
{
    if ($this->unPdo != null)
    {
            $requete = "delete from utilisateur where iduser= :iduser;"; 
            $donnees = array(":iduser"=>$id_user);
            $delete = $this->unPdo->prepare($requete);
            $delete->execute($donnees);
    }
}


/*


                               MESSAGE


*/
public function selectMessage()
{
    if($this->unPdo != null)
    {
        //requete
        $requete = "select * from message;";
        //preparation  de la requete avant exec
        $select = $this->unPdo->prepare ($requete);
        //execution requete
        $select->execute();
        //extraction donnée
        $resultats = $select->fetchAll();
        return $resultats;
    }
}
public function insertMessage($tab)
{
    if($this->unPdo!=null)
    {
        $requete ="insert into message values(null, :text, :date_mess)";
        $donnees = array(":text"=>$tab['text'],":date_mess"=>$tab['date_mess']);
        $insert = $this->unPdo->prepare($requete);
        $insert->execute($donnees);
    }
}

public function deleteMessage($id_mess)
{
    if($this->unPdo!=null)
    {
        $requete ="delete from message where id_mess = :id_mess;";
        $donnees = array(":id_mess"=>$id_mess);
        $delete = $this->unPdo->prepare($requete);
        $delete->execute($donnees);
    }
}
/*


                             COMMENTAIRE


*/
public function selectCommentaire()
{
    if($this->unPdo != null)
    {
        //requete
        $requete = "select * from commentaire;";
        //preparation  de la requete avant exec
        $select = $this->unPdo->prepare ($requete);
        //execution requete
        $select->execute();
        //extraction donnée
        $resultats = $select->fetchAll();
        return $resultats;
    }
}
public function insertCommentaire($tab)
{
    if($this->unPdo!=null)
    {
        $requete ="insert into commentaire values(null, :text, :note)";
        $donnees = array(":text"=>$tab['text'],":note"=>$tab['note']);
        $insert = $this->unPdo->prepare($requete);
        $insert->execute($donnees);
    }
}
public function deleteCommentaire($id_com)
{
    if($this->unPdo!=null)
    {
        $requete ="delete from commentaire where id_com = :id_com;";
        $donnees = array(":id_com"=>$id_com);
        $delete = $this->unPdo->prepare($requete);
        $delete->execute($donnees);
    }
}
/*


                              PRODUIT


*/
public function selectProduit()
{
    if($this->unPdo != null)
    {
        //requete
        $requete = "select * from produit;";
        //preparation  de la requete avant exec
        $select = $this->unPdo->prepare ($requete);
        //execution requete
        $select->execute();
        //extraction donnée
        $resultats = $select->fetchAll();
        return $resultats;
    }
}
public function insertProduit($tab)
{
    if($this->unPdo!=null)
    {
        $requete ="insert into produit values(null, :designation, :caracteristique, :prix)";
        $donnees = array(":designation"=>$tab['designation'],":caracteristque"=>$tab['carateristique'],":prix"=>$tab['prix']);
        $insert = $this->unPdo->prepare($requete);
        $insert->execute($donnees);
    }
}

public function deleteProduit($id_produit)
{
    if($this->unPdo!=null)
    {
        $requete ="delete from produit where id_produit = :id_produit;";
        $donnees = array(":id_produit"=>$id_produit);
        $delete = $this->unPdo->prepare($requete);
        $delete->execute($donnees);
    }
}
/*


                             EVENT


*/
public function selectEvent()
{
    if($this->unPdo != null)
    {
        //requete
        $requete = "select * from event;";
        //preparation  de la requete avant exec
        $select = $this->unPdo->prepare ($requete);
        //execution requete
        $select->execute();
        //extraction donnée
        $resultats = $select->fetchAll();
        return $resultats;
    }
}
public function insertEvent($tab)
{
    if($this->unPdo!=null)
    {
        $requete ="insert into event values(null, :designation, :date_creation, :date_debut, :description)";
        $donnees = array(":designation"=>$tab['designation'],":date_creation"=>$tab['date_creation'],":date_debut"=>$tab['date_debut'],":description"=>$tab['description']);
        $insert = $this->unPdo->prepare($requete);
        $insert->execute($donnees);
    }
}

public function deleteEvent($id_event)
{
    if($this->unPdo!=null)
    {
        $requete ="delete from event where id_event = :id_event;";
        $donnees = array(":id_event"=>$id_event);
        $delete = $this->unPdo->prepare($requete);
        $delete->execute($donnees);
    }
}
}
?>
