<?php

function connexion()
{
    $con = mysqli_connect ("db5000027538.hosting-data.io","3306","dbu41113","adminroot","dbs22722");
    if(!$con)
    {
        echo "erreur de connexion au serveur !";
        return null;
    }
    return $con;
}

function deconnexion($con)
{
    mysqli_close($con);
}
function affiche_ingenieurr()
 {
     $requete = "SELECT i.idinge, i.nom, i.prenom, i.diplome, i.email, i.mdp, i.date_nais, e.designation, p.libelle, c.entreprise FROM demande d, client c, ingenieur i, equipe e,projet p
                where i.idequipe = e.idequipe AND e.idequipe = p.idequipe and p.idprojet = d.idprojet and d.idclient = c.idclient;";
     $con = connexion ();
     if ($con != null)
     {
         $resultats = mysqli_query($con, $requete);
         echo"
         <div class='col-sm-7'><table class='table table-dark'>
         <tr class='bold'>
         <td>Nom</td>
         <td>Prenom</td>
         <td>Diplome</td>
         <td>Email</td>
         <td>Mot de passe</td>
         <td>Date de naissance</td>
         <td>Equipe</td>
         <td>Projet</td>
         <td>Client</td>
         <td>Modifier</td>
         <td>Supprimer</td>
         </tr>"         
         ;
         while ($ligne = mysqli_fetch_assoc($resultats))
         {
            echo "<tr>
                    <td>".$ligne['nom']."</td>
                    <td>".$ligne['prenom']."</td>
                    <td>".$ligne['diplome']."</td>
                    <td>".$ligne['email']."</td>
                    <td>".$ligne['mdp']."</td>
                    <td>".$ligne['date_nais']."</td>
                    <td>".$ligne['designation']."</td>
                    <td>".$ligne['libelle']."</td>
                    <td>".$ligne['entreprise']."</td>
                    <td>
                    <a href='index2.php?page=1&action=update&idinge=".$ligne['idinge']."'><img src ='images/modif.png' height='20' width='20'/></a></td>
                    <td>
                    <a href='index2.php?page=1&action=sup&idinge=".$ligne['idinge']."'><img src ='images/supr.png' height='20' width='20'/></a></td></tr>";
                 
        
    }
     echo "</table></div>";
    
     deconnexion ($con);
 
}}
function affiche_ingenieur()
 {
     $requete = "SELECT i.idinge, i.nom, i.prenom, i.diplome, i.email, i.mdp, i.date_nais, e.designation, p.libelle FROM ingenieur i, equipe e,projet p
                where i.idequipe = e.idequipe AND e.idequipe = p.idequipe;";
     $con = connexion ();
     if ($con != null)
     {
         $resultats = mysqli_query($con, $requete);
         echo"
         <div class='col-sm-offset- col-sm-6'><table class='table table-dark'>
         <tr class='bold'>
         <td>Nom</td>
         <td>Prenom</td>
         <td>Diplome</td>
         <td>Email</td>
         <td>Mot de passe</td>
         <td>Date de naissance</td>
         <td>Equipe</td>
         <td>Projet</td>
         <td>Modifier</td>
         <td>Supprimer</td>
         </tr>"         
         ;
         while ($ligne = mysqli_fetch_assoc($resultats))
         {
            echo "<tr>
                    <td>".$ligne['nom']."</td>
                    <td>".$ligne['prenom']."</td>
                    <td>".$ligne['diplome']."</td>
                    <td>".$ligne['email']."</td>
                    <td>".$ligne['mdp']."</td>
                    <td>".$ligne['date_nais']."</td>
                    <td>".$ligne['designation']."</td>
                    <td>".$ligne['libelle']."</td>
                    <td>
                    <a href='index2.php?page=1&action=update&idinge=".$ligne['idinge']."'><img src ='images/modif.png' height='20' width='20'/></a></td>
                    <td>
                    <a href='index2.php?page=1&action=sup&idinge=".$ligne['idinge']."'><img src ='images/supr.png' height='20' width='20'/></a></td></tr>";
                 
        
    }
     echo "</table></div>";
    
     deconnexion ($con);
 
}
}
function insert_ingenieur($tab)
{
    $requete = "INSERT INTO ingenieur VALUES (NULL,'".$tab['nom']."','".$tab['prenom']."','".$tab['diplome']."',
    '".$tab['email']."','".$tab['mdp']."','".$tab['date_nais']."',".$tab['idequipe'].");";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}


function update_ingenieur($tab)
{

    $nom     = $tab["nom"];
    $prenom = $tab["prenom"];
    $diplome = $tab["diplome"];
    $email      = $tab["email"];
    $mdp     = $tab["mdp"];
    $date_nais   = $tab["date_nais"];
    $idequipe   = $tab["idequipe"];
    $id = $tab["hidden"];

    $requete =" UPDATE ingenieur
                SET   nom     = '$nom',
                prenom  = '$prenom',
                diplome = '$diplome',
                email   = '$email',
                mdp     = '$mdp',
                date_nais = '$date_nais',
                idequipe = '$idequipe'         
                WHERE idinge = '$id';";
  


    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}



function delete_ingenieur($idinge)
{
    
    $requete = "DELETE FROM ingenieur WHERE idinge = ".$idinge.";";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}

function select_libelle_equipes()
{

    $requete = "SELECT * from equipe ;";
    $con = connexion ();
     if ($con != null)
     {
         $resultats = mysqli_query($con, $requete);
        
         while ($ligne = mysqli_fetch_assoc($resultats))
         {
            echo "<option value ='".$ligne['idequipe']."'>".$ligne['designation']."</option>";
         }
     
     deconnexion ($con);
  }
}
function affiche_lib()
{
    $id = $tab["hidden"];
    $requete = "SELECT libelle from projet where idprojet = $id;";
    $con = connexion ();
     if ($con != null)
     {
         $resultats = mysqli_query($con, $requete);
         echo "<div class='col-sm-offset-1 col-sm-10 col'><table class='table table-dark'>
         <tr class='bold'><td>Libelle</td>
         <td>Date de Début</td>"     
         ;
         //parcour
         while ($ligne = mysqli_fetch_assoc($resultats))
         {
            echo "<tr>
                    <td>".$ligne['libelle']."</td>

        ";
        }
     echo "</table></div>";
     deconnexion ($con);
  }
}
function affiche_projet()
 {
     $requete = "SELECT p.idprojet, p.libelle, p.date_debut, p.date_fin, e.designation, pr.demande, pr.codecouleur
     FROM projet p, equipe e, priorite pr
     WHERE p.idequipe = e.idequipe AND p.idpriorite = pr.idpriorite";

     $con = connexion ();
     if ($con != null)
     {
         $resultats = mysqli_query($con, $requete);
         echo "<div class='col-sm-offset-1 col-sm-10 col'><table class='table table-dark'>
         <tr class='bold'><td>Libelle</td>
         <td>Date de Début</td>
         <td>Date de Fin</td>
         <td>Equipe</td>
         <td>Priorité</td>
         <td>Couleurs</td>
         <td>Modifier</td>
         <td>Supprimer</td></tr>"         
         ;
         //parcour
         while ($ligne = mysqli_fetch_assoc($resultats))
         {
            echo "<tr><td>
            <a href='index2.php?page=5'>".$ligne['libelle']."</a></td>
                    <td>".$ligne['date_debut']."</td>
                    <td>".$ligne['date_fin']."</td>
                    <td>".$ligne['designation']."</td>
                    <td>".$ligne['demande']."</td>
                    <td>".$ligne['codecouleur']."</td>
                    <td>
                    <a href='index2.php?page=4&action=update&idprojet=".$ligne['idprojet']."'><img src ='images/modif.png' height='20' width='20'/></a></td>
                    <td>
                    <a href='index2.php?page=4&action=sup&idprojet=".$ligne['idprojet']."'><img src ='images/supr.png' height='20' width='20'/></a></td></tr>";
        }
     echo "</table></div>";
     deconnexion ($con);
  }
}

function insert_projet($tab)
{
    $requete = "INSERT INTO projet VALUES (NULL,'".$tab['libelle']."','".$tab['date_debut']."','".$tab['date_fin']."',
    ".$tab['idequipe'].",".$tab['idpriorite'].");";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}
function update_projet($tab)
{

    $libelle= $tab["libelle"];
    $date_debut = $tab["date_debut"];
    $date_fin = $tab["date_fin"];
    $idequipe = $tab["idequipe"];
    $idpriorite = $tab["idpriorite"];
    $id = $tab["hidden"];

    $requete =" UPDATE projet
                SET   libelle   = '$libelle',
                date_debut  = '$date_debut',
                date_fin  = '$date_fin',
                idequipe = '$idequipe',
                idpriorite = '$idpriorite'          
                WHERE idprojet = '$id';";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}
function delete_projet($idprojet)
{
    
    $requete = "DELETE FROM projet WHERE idprojet = ".$idprojet.";";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}

function affiche_equipe()
 {
     $requete = "select * from equipe";
     $con = connexion ();
     if ($con != null)
     {
         $resultats = mysqli_query($con, $requete);
         echo "<div class='col-sm-offset-1 col-sm-10 col'><table class='table'>
         <tr class='bold'><td>Designation</td>
         <td>Date Creation</td>
         <td>Modifier</td>
         <td>Supprimer</td></tr>"         
         ;
         //parcour
         while ($ligne = mysqli_fetch_assoc($resultats))
         {
            echo "<tr>
                    <td>".$ligne['designation']."</td>
                    <td>".$ligne['date_creation']."</td>
                    <td>
                    <a href='index2.php?page=3&action=update&idequipe=".$ligne['idequipe']."'><img src ='images/modif.png' height='20' width='20'/></a></td>
                    <td>
                    <a href='index2.php?page=3&action=sup&idequipe=".$ligne['idequipe']."'><img src ='images/supr.png' height='20' width='20'/></a></td></tr>";
        }
     echo "</table></div>";
     deconnexion ($con);
  }
}
function insert_equipe($tab)
{
    $requete = "INSERT INTO equipe VALUES (NULL,'".$tab['designation']."','".$tab['date_creation']."');";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}
function update_equipe($tab)
{

    $designation = $tab["designation"];
    $date_creation = $tab["date_creation"];
    $id = $tab["hidden"];

    $requete =" UPDATE equipe
                SET   designation   = '$designation',
                date_creation  = '$date_creation'
                WHERE idequipe = '$id';";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}
function delete_equipe($idequipe)
{
    
    $requete = "DELETE FROM equipe WHERE idequipe = ".$idequipe.";";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}

function affiche_client()
 {
     $requete = "SELECT * FROM client";
     $con = connexion ();
     if ($con != null)
     {
         $resultats = mysqli_query($con, $requete);
         echo "<div class='col-sm-offset-1 col-sm-10 col'><table class='table table-dark'>
         <tr class='bold'><td>Entreprise</td>
         <td>Nom</td>
         <td>Prenom</td>
         <td>Email</td>
         <td>Mdp</td>
         <td>Modifier</td>
         <td>Supprimer</td></tr>"         
         ;
         //parcour
         while ($ligne = mysqli_fetch_assoc($resultats))
         {
            echo "<tr>
                    <td>".$ligne['entreprise']."</td>
                    <td>".$ligne['nom']."</td>
                    <td>".$ligne['prenom']."</td>
                    <td>".$ligne['email']."</td>
                    <td>".$ligne['mdp']."</td>
                    <td>
                    <a href='index2.php?page=2&action=update&idclient=".$ligne['idclient']."'><img src ='images/modif.png' height='20' width='20'/></a></td>
                    <td>
                    <a href='index2.php?page=2&action=sup&idclient=".$ligne['idclient']."'><img src ='images/supr.png' height='20' width='20'/></a></td></tr>";
        }
     echo "</table></div>";
     deconnexion ($con);
  }
}
function insert_client($tab)
{
    $requete = "INSERT INTO client VALUES (NULL,'".$tab['entreprise']."','".$tab['nom']."','".$tab['prenom']."',
    '".$tab['email']."','".$tab['mdp']."');";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}
function update_client($tab)
{

    $entreprise  = $tab["entreprise"];
    $nom = $tab["nom"];
    $prenom = $tab["prenom"];
    $email      = $tab["email"];
    $mdp     = $tab["mdp"];
    $id = $tab["hidden"];

    $requete =" UPDATE client
                SET   entreprise   = '$entreprise',
                nom  = '$nom',
                prenom = '$prenom',
                email   = '$email',
                mdp     = '$mdp'  
                WHERE idclient = '$id';";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}
function delete_client($idclient)
{
    
    $requete = "DELETE FROM client WHERE idclient = ".$idclient.";";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}

function affiche_demande()
{
    $requete = "SELECT p.libelle, c.entreprise, d.date_demande, d.budget
    FROM projet p, client c, demande d
    WHERE p.idprojet = d.idprojet AND d.idclient = c.idclient;";
     $con = connexion ();
     if ($con != null)
     {
         $resultats = mysqli_query($con, $requete);
         echo "<div class='col-sm-offset-1 col-sm-10 col'><table class='table table-dark'>
         <tr class='bold'>
         <td>Nom du projet</td>
         <td>Nom du client</td>
         <td>Date de demande</td>
         <td>Budget</td></tr>";

         while ($ligne = mysqli_fetch_assoc($resultats))
         {
            echo "<tr>
                    <td>".$ligne['libelle']."</td>
                    <td>".$ligne['entreprise']."</td>
                    <td>".$ligne['date_demande']."</td>
                    <td>".$ligne['budget']."</td></tr>";
        }
     echo "</table></div>";
     deconnexion ($con);
}
}
function update_demande($tab)
{

    $libelle  = $tab["libelle"];
    $entreprise = $tab["entreprise"];
    $date_demande = $tab["date_demande"];
    $budget    = $tab["budget"];
    $id = $tab["hidden"];

    $requete =" UPDATE demande
                SET   libelle   = '$libelle',
                entreprise  = '$entreprise',
                date_demande = '$date_demande',
                budget  = '$budget'  
                WHERE idprojet = '$id';";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}
function insert_demande($tab)
{
    $requete = "INSERT INTO demande VALUES (".$tab['idprojet'].",".$tab['idclient'].",'".$tab['date_demande']."','".$tab['budget']."');";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}

function delete_demande($idprojet)
{  
    $requete = "DELETE FROM demande WHERE idprojet = ".$idprojet.";";
    $con = connexion();
    if ($con != null)
    {
    mysqli_query($con, $requete);
    deconnexion($con);
    }
}