<?php
    include('constant.php');
?>

<!DOCTYPE php>
<php xmlns="http://www.w3.org/1999/xphp">
<head>
<meta http-equiv="content-type" content="text/php; charset=UTF-8">
<title>Brilliance GPS Tracking</title>

<link rel="stylesheet" href="CSS/style.css">

<!-- Menu start --------------->
<link href="menu/quickmenu0.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="menu/quickmenu0.js"></script>
<!-- Menu End --------------->
</head>

<?php 
    if(isset($_SESSION['add'])) 
    {
      echo $_SESSION['add']; 
      unset($_SESSION['add']); 
    }
?>

<body>
<header>
  <div id="wrap">
       <div class="logo"><img src="images/logo.png" border="0"></div>
    <div class="topmenu">
      <ul>
        <li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
        <li><a href="change-password.php">Change Password</a>&nbsp;|</li>
        <li><a href="index.php"><img src="images/logout.png" width="16" height="16" border="0" align="absmiddle">&nbsp;&nbsp;Logout</a></li>
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</header>
  <nav>
    <ul id="qm0" class="qmmc" >
      <li><a href="admin.php" class="qmactive">Dashboard</a></li>            
      <li><a href="#">Product</a>
          <ul>
          	<li><a href="add-category.php">Add Category</a></li>
            <li><a href="add-sub-category.php">Add  Sub Category</a></li>
          	
          	<li><a href="product.php">Add Product</a></li>
          </ul>
      </li>           
    </ul>
  </nav>
  
<div id="wrap">
  <section class="bodymain" style="min-height:540px;">
    <aside class="middle-container"> 
     <div class="clear" style="height:5px;"></div>
      <h1 style="margin:50px 0 0 270px; font-size:35px; color:#e85116;">Welcome To Admin Panel</h1>
      
      </aside>
    <div class="clear"></div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </section>
</div>
<div class="clear"></div>
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
