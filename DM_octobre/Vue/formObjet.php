<center>
<form class="form-group" action="" method="post">
<table>
<tr><td class="td1">libelle</td><td><input class="form-control" type="text" name="libelle"></td></tr>
<tr><td>Type</td>
<td class="td1">
    <select class="form-control" name="type" id="">
        <option value="troc">troc
        </option>
        <option  value="vente">vente
            </option>
    </select>

</td></tr>
<tr><td class="td1">point</td><td><input class="form-control" type="text" name="point"></td></tr>
<tr>
            <td class="td1"><input class="button8 btn btn-primary" type="submit" name="vendre" value="vendre"></td></tr>
            <?php if(isset($_GET['id_objet'])){
            echo "<td class='td1'><input class='button8 btn btn-primary' type='submit' name='Modifier' value='modifier'></td>";} ?>

</table>
</form>
</center>