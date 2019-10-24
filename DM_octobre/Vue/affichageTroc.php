<?php
    foreach ($result as $unResultat)
    {

        echo"<table class=' table table-bordered'>";
    echo" <tr><th width='60%'>".$unResultat['libelle']." de ".$unResultat['nom']."</th><th width='20%'>Objet</th><th width='20%'>cout</th>
    " ;     
        echo "<th width='10%'>Supprimer objet</th>";
    echo"</tr>";
    echo "<tr>
    <td></td>
         <td width='70%' height='100px'>".$unResultat['libelle']."</td>
         <td>".$unResultat['point']."</td> ";
         if($_SESSION['id_enfant'] == $unResultat['id_enfant'])
         {
         echo"<td> <form class='form-group' action='objet.php?id_objet=".$unResultat['id_objet']."' method='post'>
         <table>       
         <input type='hidden' name='hidden' value='".$unResultat['id_objet']."'>
         <input class ='buttonCom btn btn-primary'type='submit' name='Supprimer' value='Supprimer'>
         "//<input class ='buttonCom btn btn-primary'type='submit' name='modifier' value='Echanger'>
        ;
         echo"</table>
         </form> </td>         
         </tr>";
         }
        
        if($_SESSION['id_enfant'] != $unResultat['id_enfant'])
         {
            echo"<td> <form class='form-group' action='echange.php?id_objet=".$unResultat['id_objet']."&id_enfant=".$unResultat['id_enfant']."' method='post'>
            <table>       
            <input type='hidden' name='hidden' value='".$unResultat['id_objet']."'>
         <input class ='buttonCom btn btn-primary'type='submit' name='Sechanger' value='Echanger'>"

           ;
            echo"</table>
            </form> </td>         
            </tr>";
         }
        
    }
    echo "</table>"; 

?>