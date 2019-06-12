<?php
include './connection.php';
$aid=$_GET['aid'];
$sel_data=mysql_query("select * from new_patient where id='$aid'");
$r_data=mysql_fetch_row($sel_data);
$sel_cit=mysql_query("select * from cit_data where bar_code='$r_data[2]'");
$r_cit=mysql_fetch_row($sel_cit);
$sel_doc=mysql_query("select * from doc_data where em='$r_data[10]'");
$r_doc=mysql_fetch_row($sel_doc);
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
         <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <script src="js/jquery1111.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="authority/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="authority/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="authority/assets/css/fonts.googleapis.com.css" />
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="col-lg-12">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <center> <h3>MEDICAL CERTIFICATE</h3></center>
                    <p align="justify">Name of the Applicant …………<u><?php echo strtoupper($r_cit[1]) ?></u>………………….<br /><br />
 I, Dr. …………<?php echo strtoupper($r_doc[2]) ?>……………. after careful personal examination of the 
 case hereby certify that ……<?php echo strtoupper($r_cit[1]) ?>…………..
  whose signature is given above, is suffering from
  ….....<b><?php echo $r_data[4] ?></b>......….. that I consider that a period of absence from duty 
  <?php
  if($r_data[12]=="0000-00-00")
  {
     ?>
  on ........<?php echo $r_data[11] ?>...................
  <?php
  }
  else
  {
      ?>
  from ……<?php echo $r_data[11] ?>……… to………<?php echo $r_data[12] ?>………… 
  <?php
  }
  ?>
  is absolutely necessary for the restoration of his/her health.
</p>
MEDICAL OFFICER<br />
Station:<br />
Date :<br />
<center><h3>CERTIFICATE OF MEDICAL FITNESS</h3></center>
<p align="justify">Signature of Applicant : …………………<u><?php echo strtoupper($r_cit[1]) ?></u>…………………….<br /><br />
 I, Dr. ……………<?php echo strtoupper($r_doc[2]) ?>………………… do hereby certify that I
have carefully examined Sri./Smt. …………<?php echo strtoupper($r_cit[1]) ?>……………… 
whose signature is given above, and find that he/she has
recovered form his/her illness and is now fir to resume duties in Government
service. I also certify that before arriving at this decision I have examined the
original medical certificate(s) and statement(s) of the case (or certified copies
thereof) on which leave was granted or extending, and have taken these in
consideration in arriving at my decision.</p>
MEDICAL OFFICER<br />
Station:<br />
Date : <br />
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
        
    </body>
</html>
<script>
    window.print();
</script>
