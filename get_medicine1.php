<?php
include './connection.php';
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
       
            $sel_med=mysql_query("select * from medicin_data where medicin_nme like '%".$_GET['nm']."%'");
            if(mysql_num_rows($sel_med)>0)
            {
                ?>
            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                <tr>
                    <td>#</td>
                    <td>Medicine Name</td>
                    <td>Price</td>
                    <td>Description</td>
                    
                </tr>
                <?php
                $i=1;
                while($r_med=mysql_fetch_row($sel_med))
                {
                    ?>
                <tr>
                    <td><?php echo $i ?>                                                                                   
                    </td>
                    <td><b><?php echo $r_med[2] ?></b><br />(<?php echo $r_med[4] ?>)
                    <br />
                    <div style="float: right;">
                    <?php
                        if($r_med[6]==1)
                        {
                          ?>
                        <span class="glyphicon glyphicon-circle-arrow-up" style="color:green" title="Active Item"></span>
                        <?php
                        }
                        else
                        {
                         ?>
                        <span class="glyphicon glyphicon-circle-arrow-down" style="color:red" title="Blocked Item"></span>
                        <?php
                        }
                        ?>
                </div>
                    </td>
                    <td><?php echo $r_med[3] ?></td>
                    <td><?php echo $r_med[5] ?></td>
                    
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
                echo"No Data Found";
            }
            ?>
       
    </body>
</html>
