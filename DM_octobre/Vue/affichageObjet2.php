<?php


foreach ($result as $unResultat)
    {
        echo"<table class=' table table-bordered'>";
    echo" <tr><th width='40%'>".$unResultat['libelle']." de ".$unResultat['nom']."</th><th>Type</th><th width='20%'>Cout en point</th>
    " ;
    echo"</tr>";
    echo "<tr>
         <td width='60%' height='100px'>".$unResultat['libelle']."</td>
         <td>".$unResultat['type']."</td>
         <td>".$unResultat['point']."</td> ";
        
         echo"</table>
         </form> </td>         
         </tr>";
         
    }
    echo "</table>"; 

?>