<?php 
require 'admin/class/myclass.php';
connection_open();
session_start();
#check_login();

 
if($_POST)
{
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $conpass = $_POST['conpass'];
    $loginemail = $_POST['loginemail'];
    if($_SESSION['is_photo']=='yes')
    {
         $photographerid = $_SESSION['Photographer_id'];
         $oldpassquery = mysql_query("select Photographer_Pswd from photographer_register where Photographer_Register_ID='{$photographerid}'") or die(mysql_error());
         $oldpassdatafromdb = mysql_fetch_row($oldpassquery);
    
        if($oldpass==$oldpassdatafromdb[0])
        {
            if($newpass==$conpass)
            {
                if($oldpassdatafromdb[0]==$newpass)
                {
                        include 'admin/alertbox/oldnew.php';
                }
                else
                {
                    mysql_query("update photographer_register set Photographer_Pswd='{$newpass}' where Photographer_Register_ID='{$photographerid}'") or die(mysql_error());
                    include 'admin/alertbox/changepasswordbox.php';
                }   
            }  
            else 
            {
                include 'admin/alertbox/newcon.php';
            }
        }
        else
        {
                include 'admin/alertbox/oldpass.php';
        }
    }
    else
    {
         $oldpass = $_POST['oldpass'];
         $newpass = $_POST['newpass'];
         $conpass = $_POST['conpass'];
         $userid = $_SESSION['User_id'];
         $oldpassquery = mysql_query("select User_Pswd from user_register where User_Register_ID='{$userid}'") or die(mysql_error());
         $oldpassdatafromdb = mysql_fetch_row($oldpassquery);
    
            if($oldpass==$oldpassdatafromdb[0])
            {
                if($newpass==$conpass)
                {
                    if($oldpassdatafromdb[0]==$newpass)
                    {
                            include 'admin/alertbox/oldnew.php';
                    }
                    else
                    {
                        mysql_query("update user_register set User_Pswd='{$newpass}' where User_Register_ID='{$userid}'") or die(mysql_error());
                        include 'admin/alertbox/changepasswordbox.php';
                    }   
                }  
                else 
                {
                    include 'admin/alertbox/newcon.php';
                }
            }
            else
            {
                    include 'admin/alertbox/oldpass.php';
            }   
    }
}
?>

<!DOCTYPE html>
<html lang="en">
	

    <head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <meta name="robots" content="index, follow" />
		<title>WildPhy</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <!--Google Webfont-->
		<link href='../../fonts.googleapis.com/csse7ae.css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700' rel='stylesheet' type='text/css'>
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
	</head>
  <body>
    <?php 
    include './themepart/top-menu.php';
    ?><!--Header End-->
    <div class="google-maps">
        <img src="images/covers/3.jpg" style="width:100%;height:400px;">
    </div>
    <div id="page-contents">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-10 col-md-offset-1">
            <div class="contact-us">
            	<div class="row">
            		<div class="col-md-7 col-sm-7">
                            
                  <h2 align="center" class="grey">Change Password</h2>
                  <form class="contact-form" enctype="multipart/form-data" method="post">
                     
                       <div class="form-group">
                           Old Password:<input id="contact-name" type="password" name="oldpass" class="form-control" placeholder="Enter Old Password*" required="required"  >
                    </div>
                       <div class="form-group">
                           New Password:<input id="contact-name" type="password" name="newpass" class="form-control" placeholder="Enter New Password*" required="required"  >
                    </div>
                       <div class="form-group">
                           Confirm Password:<input id="contact-name" type="password" name="conpass" class="form-control" placeholder="Enter Confirm Password*" required="required"  >
                    </div>
                        
                      <input type="submit" value="Submit" class="btn-primary"> 
                
                  </form>
                </div>
       
<?php 


                    include './themepart/sidebar.php';
?></div>
            </div>
          </div>
    		</div>
    	</div>
    </div>

    <!-- Footer
    ================================================= -->
   
    <?php 
    
include './themepart/footer.php';
    
    ?>
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>
    
    <!-- Scripts
    ================================================= -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&amp;callback=initMap"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
  </body>

</html>
