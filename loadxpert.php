<?php
include './connection.php';
$hid=$_GET['hid'];
$i=$_GET['i'];
$sel_doc=mysql_query("select * from doc_data where em='$hid'");
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
        <div class="col-lg-12"><span class="label label-danger" style="float: right; cursor: pointer" onclick="loadxpert('<?php echo $i ?>')">BACK</span>
            <h3>BOOK AN APPOINTMENT</h3>
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                    <tr>
                        <td style="width: 50%"><center>
                            <img src="hospital/doctor/<?php echo $r_doc[8] ?>" class="img img-responsive" style="height: 170px;"  />
                            <?php echo $r_doc[2] ?>
                        </center>
                        </td>
                        <td><br />
                            <?php echo"Designation : $r_doc[7]"; ?><hr />
                            <?php echo $r_doc[9] ?>
                            <hr />
                            Available : <?php echo $r_doc[10] ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="msg<?php echo $i ?>">
                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                <tr>
                                    <td>Bar-Code</td>
                                    <td><input type="text" name="bc" onkeyup="chk_bc(this.value,'<?php echo $i ?>')" id="bc<?php echo $i ?>" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td><input type="date" name="dt" id="dt<?php echo $i ?>" class="form-control" onchange="chk_date(this.value,'<?php echo $hid ?>','<?php echo $i ?>');" />
                                        <input type="hidden" id="dt1<?php echo $i ?>" value="<?php echo date('Y-m-d') ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><center><div id="yb<?php echo $i ?>" class="btn btn-success" onclick="add_appointment('<?php echo $hid ?>','<?php echo $i ?>')">BOOK NOW</div>
                                        <div id="nb<?php echo $i ?>" class="btn btn-danger" style="display: none;">INVALID ID</div>
                                        <div id="nb1<?php echo $i ?>" class="btn btn-danger" style="display: none;">DATE ERROR</div>
                                </center></td>
                                </tr>
                            </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-6"></div>
        </div>
    </body>
</html>
