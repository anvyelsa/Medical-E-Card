<?php
include 'connection.php';
$aid=$_GET['aid'];
$sel_admitentry=mysql_query("select * from admit_entry where enq_num='$aid'");
$r_admitentry=mysql_fetch_row($sel_admitentry);
$sel_dt=mysql_query("select * from new_patient where id='$aid'");
$r_dt=mysql_fetch_row($sel_dt);
$date_from=$r_dt[11];
$date_to=$r_dt[12];
if($date_to=="0000-00-00")
{
   $date_to=date('Y-m-d'); 
}
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
        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
            <?php         
        $date_from = strtotime($date_from); 
        $date_to = strtotime($date_to);        
        for ($i=$date_from; $i<=$date_to; $i+=86400) {  
            ?>
              <tr>
                  <td colspan="5"><strong><font color="red">
                    <?php 
                $c_date=date("Y-m-d", $i); 
                echo $c_date;
                ?></font></strong></td>
            </tr>
            <tr>
                <td><strong><i class="glyphicon glyphicon-pushpin"></i> Medicine Used </strong>
                <?php
                $sel_md=mysql_query("select * from admit_medicine where admit_id='$r_admitentry[0]' and dt='$c_date'");                
                if(mysql_num_rows($sel_md)>0)
                {
                    ?>
                    <table class="table table-bordered" style="margin-top: 10px;">
                        <?php
                        while($r_md=  mysql_fetch_row($sel_md))
                        {
                            ?>
                        <tr>
                            <td><?php
                            $sel_mc=mysql_query("select * from medicin_data where id='$r_md[5]'");
                            $r_mc=mysql_fetch_row($sel_mc);
                            echo $r_mc[2] 
                            ?></td>
                            <td><?php
                            echo $r_md[6]
                            ?></td>
                        </tr>
                        <?php
                        }
                        ?>       
                   </table>
                    <?php
                }
                else
                {
                    echo "<br /><br />No data Available";
                }
                
                ?>
                
                </td>
                <td><strong><i class="glyphicon glyphicon-check"></i> Test Done</strong>
                <?php
                $sel_tst=mysql_query("select * from admit_report where admit_id='$r_admitentry[0]' and dt='$c_date'");
                if(mysql_num_rows($sel_tst)>0)
                {
                    ?>
                    <table class="table table-bordered" style="margin-top: 10px;">
                        <?php
                        while($r_tst=mysql_fetch_row($sel_tst))
                        {
                            ?>
                        <tr>
                            <td>
                                <?php
                                $sel_l1=mysql_query("select * from labtest_data where id='$r_tst[5]'");
                                $r_l1=mysql_fetch_row($sel_l1);
                                echo $r_l1[1];
                                ?>
                            </td>
                            <td>
                                <?php
                                if($r_tst[7]==1)
                                {
                                    ?>
                                <a href="../aprm/<?php echo"$r_tst[7]/$r_tst[6]" ?>" target="_blank"><i class="glyphicon glyphicon-file"></i></a>
                                <?php
                                }
                                if($r_tst[7]==2)
                                {
                                    ?>
                                <a href="../aprm/<?php echo"$r_tst[7]/$r_tst[6]" ?>" target="_blank"><i class="glyphicon glyphicon-headphones"></i></a>
                                <?php
                                }
                                if($r_tst[7]==3)
                                {
                                    ?>
                                <a href="../aprm/<?php echo"$r_tst[7]/$r_tst[6]" ?>" target="_blank"><i class="glyphicon glyphicon-hd-video"></i></a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <?php
                }
                else
                {
                    echo"<br /><br />No data Available";
                }
                ?>
                </td>
                <td style="width: 40%"><strong><i class="glyphicon glyphicon-book"></i> Doctor Note</strong>
                <?php
                $sel_doc=mysql_query("select * from admit_doc_des where admit_id='$r_admitentry[0]' and dr='$c_date'");
                if(mysql_num_rows($sel_doc)>0)
                {
                    ?>               
                    <table class="table table-bordered" style="margin-top: 10px;">
                        <?php
                        while($r_doc=mysql_fetch_row($sel_doc))
                        {
                            ?>
                        <tr>
                            <td>
                                <?php                                
                                echo $r_doc[5];
                                ?>
                            </td>
                        </tr>
                        
                         <?php
                        }
                        ?>
                    </table>
                        <?php
                        
                }
                else
                {
                     echo"<br /><br />No data Available";
                }
                ?>
                </td>
            </tr>
            <?php           
        }  
      
       
        ?>          
        </table>
        
    </body>
</html>
