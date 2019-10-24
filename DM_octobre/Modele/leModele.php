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

public function insert($table, array $tab)
 {
    if ($this->unPdo == null)
     {
        return;
     }
    //Template
    $insert_format = 'insert into %s (%s) values (%s)';
    //rendre ces variables en tableau
    $colonnes = $parametres = $valeurs = [];
    //Remplire les champs
    foreach ($tab as $colonne => $valeur)
    {
        $parametre = ':' . $colonne;
        //echo $colonne ;
        $colonnes[] = $colonne;
        $parametres[] = $parametre;
        $valeurs[$parametre] = $valeur;
    }
    //ordonner 
    $sql = sprintf(
            $insert_format,
            $table,
            implode($colonnes, ', '),
            implode($parametres, ', '));
            $statement = $this->unPdo->prepare($sql);
            $statement->execute($valeurs);
           // echo $sql;
           //var_dump( $valeurs);
}

/*
    Delete
*/

public function delete($table, array $tab)
{
    if ($this->unPdo == null)
    {
        return;
    }

    $delete_format = 'delete from %s where (%s) = (%s)';
    $colonnes = $parametres = $valeurs = [];
    foreach ($tab as $colonne => $valeur)
    {
        $parametre = ':' . $colonne;
        //echo $colonne ;
        $colonnes[] = $colonne;
        $parametres[] = $parametre;
        $valeurs[$parametre] = $valeur;
    }
    $sql = sprintf(
            $delete_format,
            $table,
            implode($colonnes, ', '),
            implode($parametres, ', '));
    //echo $sql;
    $statement = $this->unPdo->prepare($sql);
    $statement->execute($valeurs);
}

/*
    Updaute
*/
public function update($table, array $tab, array $id)
{
    if ($this->unPdo == null)
    {
        return;
    }

    $update_format = 'update %s set (%s) = (%s) where %s = %s';
    $colonnes = $parametres = $valeurs = [];
    foreach ($tab as $colonne => $valeur)
    {
        $parametre = ':' . $colonne;
        //echo $colonne ;
        $colonnes[] = $colonne;
        $parametres[] = $parametre;
        $valeurs[$parametre] = $valeur;
    }
    $sql = sprintf(
            $update_format,
            $table,
            implode($colonnes, ', '),
            implode($parametres, ', '),
            $id);
    //echo $sql;
    $statement = $this->unPdo->prepare($sql);
    $statement->execute($valeurs);
}
public function selectObjet()
{
    if($this->unPdo!=null)
    {
        $requete = "select * from AllObjet;";
        $select = $this->unPdo->prepare($requete);
        $select->execute();
        $result = $select->fetchAll();
        return $result;
    }
}
public function selectSelfObjet()
{
    if($this->unPdo!=null)
    {
        $requete = "select * from objet where  id_enfant = :id_enfant;";
        $donnees = array(":id_enfant"=>$_SESSION['id_enfant']);                    
        $select = $this->unPdo->prepare($requete);
        $select->execute($donnees);
        $result = $select->fetchAll();
        return $result;
    }
}
public function selectCout($id_objet)
{
    if($this->unPdo!=null)
    {
        $requete = "select point from objet where  id_objet = :id_objet;";
        $donnees = array(":id_objet"=>$id_objet);                    
        $select = $this->unPdo->prepare($requete);
        $select->execute($donnees);
        $result = $select->fetch();
        return $result;
    }
}
public function selectVente()
{
    if($this->unPdo!=null)
    {
        $requete = 'select * from vente where type = "vente"';
        $select = $this->unPdo->prepare($requete);
        $select->execute();
        $result = $select->fetchAll();
        return $result;
    }
}
public function selectTroc()
{
    if($this->unPdo!=null)
    {
        $requete = 'select * from vente where type = "troc"';
        $select = $this->unPdo->prepare($requete);
        $select->execute();
        $result = $select->fetchAll();
        return $result;
    }
}
public function updateObjet($tab, $id)
{
    if($this->unPdo!=null)
    {
            $requete ="update objet set type = :type ,id_enfant = :id_enfant where id_objet = :id_objet;";
            $donnees = array(":type"=>$tab['type'],":id_enfant"=>$_SESSION['id_enfant'],":id_objet"=>$id);
            $insert = $this->unPdo->prepare($requete);
            $insert->execute($donnees);
            $donnees = array(":id_objet"=>$tab['id_objet'],":type"=>$tab['type'],":id_enfant"=>$id);
            $insert2 = $this->unPdo->prepare($requete);
            $insert2->execute($donnees);

    }
}
public function updateObjet2($tab, $id)
{
    if($this->unPdo!=null)
    {
            $requete ="update objet set type = :type ,id_enfant = :id_enfant where id_objet = :id_objet;";
            $donnees = array(":type"=>$tab['type'],":id_enfant"=>$_SESSION['id_enfant'],":id_objet"=>$id);
            $insert = $this->unPdo->prepare($requete);
            $insert->execute($donnees);
            $donnees = array(":id_objet"=>$tab['id_objet'],":id_enfant"=>$id);
            $insert2 = $this->unPdo->prepare($requete);
            $insert2->execute($donnees);
            $requete ="update enfant set point = :point  where id_enfant = :id_enfant";
            $donnees = array(":point"=>-$tab['point'],":id_enfant"=>$_SESSION['id_enfant']);
            $insert3 = $this->unPdo->prepare($requete);
            $insert3->execute($donnees);
            $donnees = array(":point"=>+$tab['point'],":id_enfant"=>$id);
            $insert4 = $this->unPdo->prepare($requete);
            $insert4->execute($donnees);

    }
}

}
?>
