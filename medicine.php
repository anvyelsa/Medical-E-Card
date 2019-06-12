<?php
include 'connection.php';
$sid=$_GET['sid'];
$pid=$_GET['pid'];
$sel_data=mysql_query("select * from purchase_medicine where id='$sid'");
$r_data=mysql_fetch_row($sel_data);
$msoreid=$r_data[1];
$barcode=$r_data[2];
$opid=$r_data[3];
$dat=$r_data[4];
$sel_store=mysql_query("select * from org_data where unme='$msoreid'");
$r_store=  mysql_fetch_row($sel_store);
$sel_usr=mysql_query("select * from cit_data where bar_code='$barcode'");
$r_usr=mysql_fetch_row($sel_usr);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <script src="js/jquery1111.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="authority/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="authority/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="authority/assets/css/fonts.googleapis.com.css" />
    </head>
    <body>
       <?php
       $sel_m=mysql_query("select * from purchase_medicine_data where pid='$sid'");
       if(mysql_num_rows($sel_m)>0)
       {
           ?>
        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
            <tr>
                <td colspan="3">
            <center><h4><?php echo $r_store[1] ?></h4></center>
                    <span style="float: right">Date : <?php echo $dat ?></span></td>
            </tr>
            <tr>
                <td colspan="3">
                    Customer Name :<b> <?php echo $r_usr[1] ?></b>
                </td>
            </tr>
            <tr>
                <td>#</td>
                <td>Medicine Name</td>
                <td>Qty.</td>                
            </tr>
            <?php
            $i=1;
            while($r_m=mysql_fetch_row($sel_m))
            {
                ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php
                $sel_mn=mysql_query("select * from medicin_data where id='$r_m[4]'");
                $r_mn=mysql_fetch_row($sel_mn);
                echo $r_mn[2];
                ?></td>
                <td>
                    <?php echo $r_m[5] ?>
                </td>
            </tr>
            <?php
            $i++;
            }
            ?>
            <tr>
                <td colspan="3" style="text-align: justify;">
                    <?php                    
                    if($pid=="0")
                    {
                        echo "<b>NB :</b>This sale doesnt have any Doctor Prescription...";
                    }
                    else{
                        $sel_op=mysql_query("select * from op_entry where id='$pid'");
                        $r_op=mysql_fetch_row($sel_op);
                        echo "<b>NB :</b>".$r_op[6];
                    }
                    ?>
                </td>
            </tr>
        </table>
        <?php
       }
       else
       {
           ?>
        <div class="alert alert-danger">No Medicine Purchased</div>
        <?php
       }
       ?>
    </body>
</html>
