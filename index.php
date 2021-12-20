<?php
    include('constant.php');
?>

<!DOCTYPE php xmlns="http://www.w3.org/1999/xphp">
<head>
<meta http-equiv="content-type" content="text/php; charset=UTF-8">
<title>Admin - Indo Roots</title>
<link rel="stylesheet" href="css/style.css">

<!-- Menu start --------------->
<link href="menu/quickmenu0.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="menu/quickmenu0.js"></script>
<!-- Menu End --------------->
</head>
<form method="POST" action="">
<body>
<header>
  <div id="wrap">
    <div class="logo"><img src="images/logo.png" border="1"></div>
    
    <div class="admintxt">Admin panel</div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</header>
<div class="clear"></div>
<div class="bodycont">
  <div id="wrap2" style="min-height:530px;">
    <div class="login-cont">
      <h1 class="loginhd">Login Here</h1>
      <div class="login-row">
        <div class="loginname">Email</div>
        <div class="admintxtfld-box">
          <input type="text" name="Email">
        </div>        
        <div class="clear"></div>
      </div>
<!--       <div class="loginreq-field">* This Field Required </div> -->
      
      <div class="login-row">
        <div class="loginname">Password</div>
        <div class="admintxtfld-box">
          <input type="password" name="Password">
        </div>
        <div class="clear"></div>
      </div>
      
      <div class="clear"></div>
      <div class="contact-row" style="width:325px;">
        <div style="background:none; border:none; margin-top:15px;">
        <a href="admin.php" style="text-decoration:none;">
          <input type="submit" class="btn" name="submit" value="Login">
          </a><br>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<div class="clear"></div>
</form>
<footer>
  <footer class="whitefoter">
    <div class="whitefooter-cont">
      <div style="float:left;">Copyright © Brilliance GPS Tracking. All Rights Reserved.</div>      
           <a href="https://www.akswebsoft.com/" target="_blank" style="float:right;">
                <img src="images/akslogo.png" alt="AKS Websoft Consulting Pvt. Ltd." title="AKS Websoft Consulting Pvt. Ltd."></a>
      
      <div class="clear"></div>
    </div>
  </footer>
</footer>
</body>
</php>

<?php 
  
  $sql = "SELECT * FROM tbl_admin"; 
  $res = mysqli_query($con, $sql);
  if(isset($_POST['submit']))
  {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $sql = "INSERT INTO tbl_admin SET 
      Email='$Email',
      Password='$Password'
    ";

    $res = mysqli_query($con, $sql) or die(mysqli_error());

    if($res==TRUE)
    {
      $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
      header("location:admin.php");
    }
    else
    {
      $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
      header("location:admin.php");
    }
  }   
?>