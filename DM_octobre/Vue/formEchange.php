<center>
<form class="form-group" action="" method="post">
<table>
<tr>
            <td>Votre objet</td>
            <td><select class="form-control" name="id_objet">
            <?php
                    foreach($result as $unObjet)
                    {
                        echo "<option value='".$unObjet['id_objet']."'>"
                        .$unObjet['libelle']."</option>";
                    }
            ?>
            </select></td>
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
            <td class="td1"><input class="button8 btn btn-primary" type="submit" name="echanger" value="Echanger"></td>
</tr>
</table>
</form>
</center>