<center>
<form class="form-group" action="" method="post">
<table>
<tr>
    
        <input type="hidden" name="point" value=" <?php echo $point['point'];?>">        
       <input type="hidden" name="cout" value=" <?php echo $cout['point'];?>">

        <?php echo $point['point'];?>
        <?php echo $cout['point'];?>
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