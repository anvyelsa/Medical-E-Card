<?php
include 'connection.php';
$s=$_GET['s'];
$d=$_GET['d'];
$t=$_GET['t'];
$sel_district=mysql_query("select * from vil_info where sid='$s' and did='$d' and tid='$t'");
if(mysql_num_rows($sel_district)>0)
{
    ?>
<select name="vilg" class="form-control" required="required" onchange="load_hosvilg(this.value,'<?php echo $s ?>','<?php echo $d ?>','<?php echo $t ?>')">
<option value="">Choose One</option>
<?php
while($r_district=mysql_fetch_row($sel_district))
{
    ?>
<option value="<?php echo $r_district[0] ?>"><?php echo $r_district[4] ?></option>
<?php
}
?>
</select>
<?php
}
else{
    ?>
<select name="vilg" class="form-control" required="required">
<option value="">Choose One</option>
  </select>
<?php
}
?>