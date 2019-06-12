<?php
include 'connection.php';
$s=$_GET['s'];
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
    </head>
    <body>       
        <?php
       $sel=mysql_query("select * from org_data where stat='$s' and st=1");
       if(mysql_num_rows($sel)>0)
       {
           ?>
        <div class="col-lg-4">
            <img src="logo/hos.jpg" class="img img-responsive img-thumbnail" />
            <?php
            $sel_hos=mysql_query("select * from org_data where stat='$s' and org_typ='1' and st=1");
            if(mysql_num_rows($sel_hos)>0)
            {
                ?><br /><br />
            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                <tr>
                    <td>#</td>
                    <td>Hospital Name</td>
                    <td>Address</td>
                    
                </tr>
                <?php
                $i=1;
                while($r_hos=mysql_fetch_row($sel_hos))
                {
                    ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><strong><?php echo $r_hos[1] ?></strong><br />
                        <span class="glyphicon glyphicon-phone-alt"></span><?php echo $r_hos[5] ?><br />
                        <span class="glyphicon glyphicon-phone"></span><?php echo $r_hos[6] ?><br />
                        <span class="glyphicon glyphicon-globe"></span><?php echo $r_hos[3] ?>
                    </td>
                    <td><?php echo $r_hos[4] ?>
                    <?php
                    $chk_abt=mysql_query("select * from abt_hospital where h_id='$r_hos[2]'");
                    if(mysql_num_rows($chk_abt)>0)
                    {
                        ?><br />
                        <a href="h_view.php?hid=<?php echo $r_hos[2] ?>" style="float: right;"><span class="label label-danger">VIEW MORE</span></a>
                        <?php
                    }
                    ?>                   
                    </td>
                    
                </tr>
                <?php
                $i++;
                }
                ?>
            </table>
            <?php
            }
            else
            {
                ?><center>
            <img src="logo/no-record-found.gif" class="img img-responsive" /></center>
            <?php
            }
            ?>
        </div>
        <div class="col-lg-4">
            <img src="logo/lab.jpg" class="img img-responsive img-thumbnail" />
            <?php
            $sel_hos=mysql_query("select * from org_data where stat='$s' and org_typ='3' and st=1");
            if(mysql_num_rows($sel_hos)>0)
            {
                ?><br /><br />
            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                <tr>
                    <td>#</td>
                    <td>Laboratory Name</td>
                    <td>Address</td>
                   
                </tr>
                <?php
                $i=1;
                while($r_hos=mysql_fetch_row($sel_hos))
                {
                    ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><strong><?php echo $r_hos[1] ?></strong><br />
                        <span class="glyphicon glyphicon-phone-alt"></span><?php echo $r_hos[5] ?><br />
                        <span class="glyphicon glyphicon-phone"></span><?php echo $r_hos[6] ?><br />
                        <span class="glyphicon glyphicon-globe"></span><?php echo $r_hos[3] ?>
                    </td>
                    <td><?php echo $r_hos[4] ?></td>
                  
                </tr>
                <?php
                $i++;
                }
                ?>
            </table>
            <?php
            }
            else
            {
                ?><center>
            <img src="logo/no-record-found.gif" class="img img-responsive" /></center>
            <?php
            }
            ?>
        </div>
        <div class="col-lg-4">
            <img src="logo/medical.jpg" class="img img-responsive img-thumbnail" />
            <?php
            $sel_hos=mysql_query("select * from org_data where stat='$s' and org_typ='2' and st=1");
            if(mysql_num_rows($sel_hos)>0)
            {
                ?><br /><br />
            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                <tr>
                    <td>#</td>
                    <td>Medical Store</td>
                    <td>Address</td>
                   
                </tr>
                <?php
                $i=1;
                while($r_hos=mysql_fetch_row($sel_hos))
                {
                    ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><strong><?php echo $r_hos[1] ?></strong><br />
                        <span class="glyphicon glyphicon-phone-alt"></span><?php echo $r_hos[5] ?><br />
                        <span class="glyphicon glyphicon-phone"></span><?php echo $r_hos[6] ?><br />
                        <span class="glyphicon glyphicon-globe"></span><?php echo $r_hos[3] ?>
                    </td>
                    <td><?php echo $r_hos[4] ?></td>
                   
                </tr>
                <?php
                $i++;
                }
                ?>
            </table>
            <?php
            }
            else
            {
                ?><center>
            <img src="logo/no-record-found.gif" class="img img-responsive" /></center>
            <?php
            }
            ?>
        </div>
        <?php
       }
    else 
        {
        ?><center>
        <img src="logo/no-record-found.gif" class="img img-responsive" /></center>
        <?php
        }
        ?>
    </body>
</html>
