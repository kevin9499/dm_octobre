<?php
    foreach ($result as $unResultat)
    {
        if($_SESSION['id_enfant'] == $unResultat['id_enfant'])
        {
        echo"<table class=' table table-bordered'>";
    echo" <tr><th width='40%'>".$unResultat['libelle']." de ".$unResultat['nom']."</th><th width='20%'>Objet</th><th width='20%'>type</th><th width='20%'>cout</th>
    " ;     
        echo "<th width='10%'>Supprimer objet</th>";
    echo"</tr>";
    echo "<tr>
    <td></td>
         <td width='40%' height='100px'>".$unResultat['libelle']."</td>
         <td width='20%' height='100px'>".$unResultat['type']."</td>
         <td width='20%' >".$unResultat['point']."</td> ";
         if($_SESSION['id_enfant'] == $unResultat['id_enfant'])
         {
         echo"<td> <form class='form-group' action='selfobjet.php?id_objet=".$unResultat['id_objet']."' method='post'>
         <table>       
         <input type='hidden' name='hidden' value='".$unResultat['id_objet']."'>
         <input class ='buttonCom btn btn-primary'type='submit' name='Supprimer' value='Supprimer'>
         <input class ='buttonCom btn btn-primary'type='submit' name='modifier' value=Modifier>";
         echo"</table>
         </form> </td>         
         </tr>";
         }}
    }
    echo "</table>"; 

?>