<?php
include 'connection.php';
ob_start();
if(isset($_POST['sub']))
{
    $bc=$_POST['bc'];
    $pas=$_POST['pas'];
    $chk_user=mysql_query("select * from cit_data where bar_code='$bc' and password='$pas'");
    if(mysql_num_rows($chk_user)>0)
    {
        $expire=  time() + (86400 * 30);
        setcookie("bar", $bc, $expire);
        header("location:report.php?report=1");
    }
    else
    {
        header("location:report.php?error=1");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from jollythemes.com/html/jollymedic/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Nov 2016 11:13:49 GMT -->
<head>
                                                            <script src="js/jquery1111.min.js" type="text/javascript"></script>
                                                           
                                                            <link rel="stylesheet" href="colorbox/colorbox.css" />   
                                                            <script src="colorbox/jquery.colorbox.js"></script>
                                                            <script>
                                                            function shomed1(a,b)
                                                            {
                                                                $.colorbox({iframe:true, width:"30%", height:"470px", href: "medicine.php?sid="+a+"&pid="+b});
                                                              }
                                                            function shoopinfo(x)
                                                            {
                                                                $.colorbox({iframe:true, width:"30%", height:"470px", href: "showop.php?aid="+x});
                                                            }
                                                            function shoadmitinfo(x)
                                                            {
                                                                $.colorbox({iframe:true, width:"60%", height:"470px", href: "showadmit.php?aid="+x});
                                                            }
                                                            </script>
  
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
                                            <li><a href="search.php">Authorized Search</a></li>
                                            <li><a href="diseases.php">Diseases</a></li>
                                            <li class="active"><a href="Medicine1.php">Medicine Information</a></li>
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
                        <h3>Find Medicine Details</h3>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <table class="table table-bordered table-hover table-responsive table-striped">
                                <tr>
                                    <td>Department Name</td>
                                    <td>
                                        <select name="dn" class="form-control" required="required" onchange="get_desease(this.value)">
                                            <option value="">Choose</option>
                                            <?php
                                            $sel_dep1=mysql_query("select * from department_data");
                                            while($r_dep1=mysql_fetch_row($sel_dep1))
                                            {
                                                ?>
                                            <option value="<?php echo $r_dep1[0] ?>"><?php echo $r_dep1[1] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Medicine Name</td>
                                    <td><input type="text" name="mn" class="form-control" onkeyup="loadmd(this.value)" /></td>
                                </tr>
                            </table>
                            <script type="text/javascript">
                                function get_desease(x)
                                {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                            document.getElementById("ds").innerHTML = xmlhttp.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET", "get_medicine.php?depatment=" + x, true);
                                    xmlhttp.send();
                                }
                                function loadmd(x)
                                {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                            document.getElementById("ds").innerHTML = xmlhttp.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET", "get_medicine1.php?nm=" + x, true);
                                    xmlhttp.send();
                                }
                            </script>
                            <div id="ds">

                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                    
                
				

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