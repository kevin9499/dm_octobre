<center>
<form class="form-group" action="" method="post">
<table>
<tr>
            <td>cout
             <?php   foreach($cout as $unCout){

           echo'<input type="text" name="point" value="'.$unCout['point'].'"></td>';
        }?>
        </tr>
    <tr>
    <tr><td>Type de votre nouvelle objet</td>
<td class="td1">
    <select class="form-control" name="type" id="">
        <option value="troc">troc
        </option>
        <option  value="troc">vente
            </option>
    </select>

</td></tr>
<tr>
            <td class="td1"><input class="button8 btn btn-primary" type="submit" name="confirmer" value="Confirmer"></td>
</tr>
</table>
</form>
</center>