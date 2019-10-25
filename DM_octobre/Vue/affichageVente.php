<?php
    foreach ($result as $unResultat)
    {
        if($_SESSION['id_enfant'] != $unResultat['id_enfant'])
        {
        echo"<table class=' table table-bordered'>";
    echo" <tr><th width='40%'>".$unResultat['libelle']." de ".$unResultat['nom']."</th><th width='20%'>Objet</th><th width='20%'>cout</th>
    " ;     
    echo "<th width='20%'>Troc</th>";
    echo"</tr>";
    echo "<tr>
    <td></td>
         <td>".$unResultat['libelle']."</td>
         <td>".$unResultat['cout']."</td> ";
        
    
            echo"<td> <form class='form-group' action='vente.php?id_objet=".$unResultat['id_objet']."&id_enfant=".$unResultat['id_enfant']."' method='post'>
            <table>       
            <input type='hidden' name='hidden' value='".$unResultat['id_objet']."'>
         <input class ='buttonCom btn btn-primary'type='submit' name='acheter' value='Acheter'>"

           ;
            echo"</table>
            </form> </td>         
            </tr>";
         }
        
    }
    echo "</table>"; 

?>