<?php
    include('constant.php');
?>

<!DOCTYPE php>
<php xmlns="http://www.w3.org/1999/xphp">
<head>
<meta http-equiv="content-type" content="text/php; charset=UTF-8">
<title>Admin - Indo Roots</title>
<link rel="stylesheet" href="CSS/style.css">
<!--[if lt IE 9]>
<script type="text/javascript" src="php5.js"></script>
<![endif]-->
<!--[if lt IE 7.]>
<script defer type="text/javascript" src="pngfix1.js"></script>
<![endif]-->

<!-- Menu start --------------->
<link href="menu/quickmenu0.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="menu/quickmenu0.js"></script>
<!-- Menu End --------------->
</head>
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
      <li><a href="admin.php">Dashboard</a></li>
      <li><a href="#">Product</a>
          <ul>
            <li><a href="add-category.php">Add Category</a></li>
            <li><a href="add-sub-category.php">Add  Sub Category</a></li>
            
            <li><a href="product.php">Add Product</a></li>
          </ul>
      </li>        
     <!--  <li><a href="#">CCTV</a>
          <ul>
          	<li><a href="product-brand.php">Add Brand</a></li>
          	<li><a href="cctv.php">Add Product</a></li>
          </ul>
      </li> -->
    </ul>
  </nav>

  <?php
      if(isset($_SESSION['user-not-found']))
      {
          echo $_SESSION['user-not-found'];
          unset($_SESSION['user-not-found']);
      }

      if(isset($_SESSION['pwd-not-match']))
      {
          echo $_SESSION['pwd-not-match'];
          unset($_SESSION['pwd-not-match']);
      }

    if(isset($_SESSION['change-pwd']))
    {
        echo $_SESSION['change-pwd'];
        unset($_SESSION['change-pwd']);
    }
?>
  
      <?php
            if(isset($_GET['id']))
            {
               $id=$_GET['id'];
            }
        ?>

<form action="" method="POST">
<table >
            
    <div id="wrap" >
  <section class="bodymain" style="min-height:580px;">
    <aside class="middle-container">
      <div class="admin-inr"><br>

    <div class="form-outer" style="margin-left:320px; width:500px;">
          <h1>Change Password</h1>
          <div class="contact-row">
            <div class="name">Current Password</div>
            <div class="txtfld-box">
              <input type="text" name="current_password">
            </div>
          <div class="req-field"> This Field Required </div>
        </div>
        <div class="clear"></div>
        <div class="contact-row">
          <div class="name">New Password</div>
          <div class="txtfld-box">
            <input type="text" name="new_password">
          </div>
        </div>
        <div class="clear"></div>
        <div class="contact-row">
          <div class="name">Confirm Password</div>
          <div class="txtfld-box">
            <input type="password" name="confirm_password">
          </div>
        </div>
        <div class="clear">&nbsp;</div>
        <div class="contact-row">
          <div class="name" style="float:right; width:1px;">&nbsp;</div>
          <div style="background:none; border:none; float:left;">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" class="btn" name="Submit" value="Change Password">
            <br>
        </div>
    </div>
		      

<?php

    $sql = "SELECT * from tbl_admin";
    $res = mysqli_query($con,$sql);
    if($res==TRUE)
    {
      $count = mysqli_num_rows($res); 
      $sn=1;
      if($count>0)
      {
        while($rows=mysqli_fetch_assoc($res))
        {
          $id=$rows['id'];
          $Email=$rows['Email'];
        ?>
          <tr>
            <td><?php echo $sn++; ?>.</td>
            <td><?php echo $Email; ?></td>
            <td>
              <a href="change-password.php?id=<?php echo $id; ?>" class="btn">Change Password</a>
            </td>
          </tr>
        <?php
          }
        }
        else
        {
           //We Do not have Data in Database
        }
    }
    ?>


<?php

    if(isset($_POST['Submit']))
    {
      $id=$_POST['id'];
      $current_password = $_POST['current_password'];
      $new_password = $_POST['new_password'];
      $confirm_password = $_POST['confirm_password'];

      $sql = "SELECT * FROM tbl_admin WHERE id=$id AND Password='$current_password'";

      $res = mysqli_query($con, $sql);

      if($res==true)
      {
        $count=mysqli_num_rows($res);

        if($count==1)
        {
          if($new_password==$confirm_password)
          {
            $sql = "UPDATE tbl_admin SET
            Password='$new_password'
            WHERE id=$id
            ";

            $res = mysqli_query($con, $sql);   
        }
    }
  }
}
?>
</table>
</form>

<div class="clear"></div>
        &nbsp;&nbsp;&nbsp;&nbsp;</section>
        </div>
        <div class="clear"></div>
    </div>
</div>
      
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