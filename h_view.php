<?php
include 'connection.php';
ob_start();
$hid=$_GET['hid'];
$sel_aut=mysql_query("select * from org_data where unme='$hid'");
$r_aut=mysql_fetch_row($sel_aut);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from jollythemes.com/html/jollymedic/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Nov 2016 11:13:49 GMT -->
<head>
                                                            
  
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 

  <title>Medical E CARD</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!-- Bootstrap Styles -->
  <link href="web_style/css/bootstrap.css" rel="stylesheet">
  <!-- Awesome Icons -->
  <link rel="stylesheet" href="web_style/css/font-awesome.css">
  <!-- Carousel -->
  <link href="web_style/css/owl-carousel.css" rel="stylesheet">
  <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
  <link rel="stylesheet" type="text/css" href="web_style/rs-plugin/css/settings.css" media="screen" />
  <!-- Styles -->
  <link href="web_style/style.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic,900' rel='stylesheet' type='text/css'>
  
  <!-- Support for HTML5 -->
  <!--[if lt IE 9]>
    <script src="web_style/js/html5shiv.js"></script>
  <![endif]-->

  <!-- Enable media queries on older bgeneral_rowsers -->
  <!--[if lt IE 9]>
    <script src="web_style/js/respond.min.js"></script>  <![endif]-->

</head>
<body>

<div class="animationload">
<div class="loader">Loading...</div>
</div>

    <div class="topbar">
    	<div class="container">
        	<div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="callout">
                        <span class="topbar-email"><i class="fa fa-globe"></i> <a href="index.php">Medical E CARD :: A Govt. Project</a></span>
                        <span class="topbar-phone"><i class="fa fa-graduation-cap"></i> Done as Academic Project</span>
                    </div><!-- end callout -->
                </div><!-- end col -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="topbar_social pull-right">Welcome User</div><!-- end social icons -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end topbar -->
    
	<header class="header">
		<div class="container">
			<nav class="navbar yamm navbar-default">
				<div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                                    <a href="index.php" class="navbar-brand"><img src="logo/ekg1.gif" alt="" class="img img-responsive" style="height: 70px;"></a>
        		</div><!-- end navbar-header -->
                
				<div id="navbar-collapse-1" class="navbar-collapse collapse navbar-right">
					<ul class="nav navbar-nav">
                                            <li><a href="index.php">Home</a></li>
                                            <li class="active"><a href="search.php">Authorized Search</a></li>
                                            <li><a href="diseases.php">Diseases</a></li>
                                            <li><a href="Medicine1.php">Medicine Information</a></li>
                                            <li><a href="report.php">Your Report</a></li>                                            
                                            <li><a href="Login/index.php">Login</a></li>
                        </ul><!-- end navbar-nav -->
				</div><!-- #navbar-collapse-1 -->
			</nav><!-- end navbar yamm navbar-default -->
		</div><!-- end container -->
    </header><!-- end header -->
	<div class="shadow"></div>

   
        
	<div class="white-wrapper nopadding">
    	<div class="container">
        	<div class="general-row">
                <div class="custom-services">
                    <div class="col-lg-12 col-md-12"><br />
                        <h3><?php echo $r_aut[1] ?></h3>
                         <?php
                            $sel_abt=mysql_query("select * from abt_hospital where h_id='$hid'");
                            if(mysql_num_rows($sel_abt)>0)
                            {
                                $r_abt=mysql_fetch_row($sel_abt);
                                echo "<div><img src='hospital/pic/$r_abt[3]' width='500px;' class='img img-thumbnail' style='float:left; margin:5px;' /><p style='text-align:justify'>$r_abt[4]</p></div>";
                            }
                            ?>
                        <h3>Our Departments</h3>
                        <div class="custom_tab_2 row">
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-stacked" id="another_tab">
                            <?php
                            $sel_dep=mysql_query("select * from department_data,hos_dep where department_data.id=hos_dep.dep_id and hos_dep.h_id='$hid'");
                            $i=0;
                            while($r_dep=mysql_fetch_row($sel_dep))
                            {
                                if($i==0)
                                {
                                    $cls="active";
                                }
                                else
                                {
                                    $cls="";
                                }
                                ?>
                              
                                <li class="<?php echo $cls ?>"><a href="#tabbed_<?php echo $i ?>"><?php echo $r_dep[1] ?></a></li>
                            <?php
                            $i++;
                            }                                    
                            ?>
                           
                        </ul>
                    </div>
                    
                    <div class="col-md-9">
                        <div class="tab-content">
                            <?php
                            $sel_dep=mysql_query("select * from department_data,hos_dep where department_data.id=hos_dep.dep_id and hos_dep.h_id='$hid'");
                            $i=0;
                            while($r_dep=mysql_fetch_row($sel_dep))
                            {
                                if($i==0)
                                {
                                    $cls="active";
                                }
                                else
                                {
                                    $cls="";
                                }
                                ?>
                            <div class="tab-pane <?php echo $cls ?>" id="tabbed_<?php echo $i ?>">                            	
                                <p align="justify"><?php echo $r_dep[2] ?></p>
                                <div id="xpert<?php echo $i ?>">
                                <h4>Our Experts</h4>
                                <?php
                                $sel_doc=mysql_query("select * from doc_data where h_id='$hid' and dep='$r_dep[0]'");
                                if(mysql_num_rows($sel_doc)>0)
                                {
                                    while($r_doc=mysql_fetch_row($sel_doc))
                                    {
                                    ?>
                                <div class="col-lg-3"><center>
                                    <img src="hospital/doctor/<?php echo $r_doc[8] ?>" class="img img-responsive" style="height: 175px;" />   
                                    <?php echo strtoupper($r_doc[2]) ?><br /><?php echo substr($r_doc[7],0,20) ?>
                                    <span class="label label-primary" style="cursor: pointer" onclick="loadxpert1('<?php echo $r_doc[3] ?>','<?php echo $i ?>')">BOOK AN APPOINTMENT</span>
                                    </center>
                                </div>
                                <?php
                                }
                                }
                                ?>
                                </div>
                                
                                <div id="xpert1<?php echo $i ?>" style="display: none;"></div>
                            </div>
                            <?php
                            $i++;
                            }                                    
                            ?>
                            
                        </div>
                    </div>
				</div>
                    </div>
                    <script type="text/javascript">
                                function loadxpert1(x,i)
                                {                                  
                                    $("#xpert"+i).slideUp(1000);
                                    $("#xpert1"+i).load("loadxpert.php?hid="+x+"&i="+i);
                                    $("#xpert1"+i).slideDown(1000);
                                }
                                function loadxpert(i)
                                {
                                    $("#xpert"+i).slideDown(1000);
                                    $("#xpert1"+i).slideUp(1000);
                                }
                                function chk_bc(x,i)
                                {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                            if(xmlhttp.responseText=="1")
                                            {
                                                $("#yb"+i).show();
                                                $("#nb"+i).hide();
                                            }
                                            else
                                            {
                                                $("#yb"+i).hide();
                                                $("#nb"+i).show();
                                            }
                                        }
                                    };
                                    xmlhttp.open("GET", "check_bc.php?cod=" + x, true);
                                    xmlhttp.send();
                                }
                                function chk_date(x,h,i)
                                {
                                    var cdate=document.getElementById("dt1"+i).value;
                                    if(x<cdate)
                                    {
                                        $("#yb"+i).hide();
                                        $("#nb1"+i).show();
                                    }
                                    else
                                    {
                                        $("#yb"+i).show();
                                        $("#nb1"+i).hide();
                                    }
                                }
                                function chk_appointment(doc)
                                {
                                    var bc=document.getElementById("bc").value;
                                    var dt=document.getElementById("dt").value;
                                    
                                    
                                }
                                function add_appointment(doc,i)
                                {
                                    var bc=document.getElementById("bc"+i).value;
                                    var dt=document.getElementById("dt"+i).value;
                                    if(bc=="" || bc==null || dt=="" || dt==null)
                                    {
                                        if(bc=="" || bc==null)
                                        document.getElementById("bc"+i).style.borderColor="red";
                                        else
                                        document.getElementById("bc"+i).style.borderColor="green";    
                                    
                                        if(dt=="" || dt==null)
                                        document.getElementById("dt"+i).style.borderColor="red";
                                        else
                                        document.getElementById("dt"+i).style.borderColor="green";
                                    }
                                    else
                                    {
                                        document.getElementById("bc"+i).style.borderColor="green";
                                        document.getElementById("dt"+i).style.borderColor="green";
                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function() {
                                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                                document.getElementById("msg"+i).innerHTML = xmlhttp.responseText;
                                            }
                                        };
                                        xmlhttp.open("GET", "add_appointment.php?doc=" + doc+"&bc="+bc+"&dt="+dt, true);
                                        xmlhttp.send();
                                        }
                                    
                                }
                                </script>
                    
                
				

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end white-wrapper -->
    
	<div class="grey-wrapper">
    	
    </div><!-- end grey-wrapper -->
    
	
    
	
    
	
    
    
    
    <div class="copyright">
    	<div class="container">
        	<div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="copyright-text">
                        <p>Copyright © 2016 - mEDICAL E cAED Designed by<br /> Trinity Technologies</p>
                    </div><!-- end copyright-text -->
                </div><!-- end widget -->
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="footer-menu">
                        
                    </div>
                </div><!-- end large-7 --> 
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end copyrights -->
    
	<div class="dmtop">Scroll to Top</div>
    
	<!-- Main Scripts-->
	<script src="web_style/js/jquery.js"></script>
	<script src="web_style/js/bootstrap.min.js"></script>
    <script src="web_style/js/bootstrap-datetimepicker.js"></script>
	<script src="web_style/js/menu.js"></script>
	<script src="web_style/js/retina-1.1.0.js"></script>
	<script src="web_style/js/custom.js"></script>

	<!-- CALENDAR WIDGET  -->
	<script type="text/javascript">
		(function($) {
		  "use strict";
			$('.form_datetime').datetimepicker({
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				forceParse: 0,
				showMeridian: 1
			});
		})(jQuery);
	</script>

	<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
	<script type="text/javascript" src="web_style/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
	<script type="text/javascript" src="web_style/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript">
		(function($) {
		  "use strict";
			var revapi;
			jQuery(document).ready(function() {
				revapi = jQuery('.tp-banner').revolution(
				{
					delay:9000,
					startwidth:1170,
					startheight:560,
					hideThumbs:10,
					fullWidth:"on",
					forceFullWidth:"on"
				});
			});	//ready
		})(jQuery);
	</script>

	<!-- CAROUSEL WIDGET -->
	<script src="web_style/js/owl.carousel.min.js"></script>
	<script>
		(function($) {
		  "use strict";
			// OWL Carousel
			$("#owl-blog").owlCarousel({
				items : 3,
				lazyLoad : true,
				navigation : true,
				pagination : false,
				autoPlay: false
			});
		})(jQuery);
	</script>
    
</body>

<!-- Mirrored from jollythemes.com/html/jollymedic/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Nov 2016 11:13:49 GMT -->
</html>