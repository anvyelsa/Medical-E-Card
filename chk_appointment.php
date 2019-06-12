<?php
include './connection.php';
$doc=$_GET['doc'];
$bc=$_GET['bc'];
$dt=$_GET['dt'];
$sel_h=mysql_query("select * from doc_data where em='$doc'");
$r_h=mysql_fetch_row($sel_h);
$hos=$r_h[1];
$chk_token=mysql_query("select * from appointment where hid='$hos' and dt='$dt' and doc_id='$doc' and bar_code='$bc'");
if(mysql_num_rows($chk_token)>0)
{
    $r_tok=  mysql_fetch_row($chk_token);
    $sel_cit=mysql_query("select * from cit_data where bar_code='$bc'");
    $r_cit=mysql_fetch_row($sel_cit);
    ?>
Hi Mr./Mrs. <?php echo $r_cit[1] ?>, You are already fix an  Appointment with <?php echo $r_h[2] ?> on <?php echo $dt ?>.
Your TOKEN Number is <?php echo $r_tok[5] ?>. Thanks for Using this Service.
<?php
}
else
{
    echo"ok";
}
?>
    