<?php  
include("constant.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Brilliance GPS Tracking</title>
<!-- slider start -->
<!-- slider end -->
<link rel="stylesheet" href="css/style.css">
<!--[if lt IE 9]>
<script type="text/javascript" src="html5.js"></script>
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
            <li><a href="add-category.php">Add category</a></li>
            <li><a href="add-sub-category.php">Add  Sub category</a></li>
            
            <li><a href="product.php">Add Product</a></li>
          </ul>
      </li>    
    </ul>
  </nav>
<?php  
 $id=$_GET['id'];
$query="SELECT * From tbl_category2 where id='$id'";
$res=mysqli_query($con,$query);
while ($row=mysqli_fetch_array($res)) {                           
?>
     
<form action="catupdate.php" method="post" enctype="multipart/form-data">
  <div id="wrap">
  <div class="clear" style="height:5px;"></div>
  <div id="wrap2">
    <h1>Add category</h1>
    <br>
    <div class="form-raw">
      <div class="form-name">category Name</div>
      <div class="form-txtfld">
         <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="category_name" active  value="<?php echo $row['category_name']; ?>">
      </div>
    </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>    
    <div class="form-raw">
      <div class="form-name">Active</div>
      <div class="form-txtfld">
        <input type="checkbox" name="Active" <?php if($row['Active']=="Active"){
          echo "checked='checked'";
        } ?> >
      </div>      
      <div class="clear"></div>
    </div>
        
    <div class="form-raw">
      <div class="form-name">&nbsp;</div>
      <div class="form-txtfld" style="width:290px;">
        <input type="submit" class="btn" name="submit">
      </div>
    </div>
  </div>
</form>
<?php  
}
?>
  <div class="clear">&nbsp;</div>
</div>
<div id="wrap3">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="admintable">
    <tr>
      <th width="59" align="left" valign="middle">Sr.No.</th>
      <th width="752" align="left" valign="middle">category_name Name</th>
      <th width="77" align="left" valign="middle">Status</th>
      <th width="54" align="left" valign="middle">Edit</th>
      <th width="71" align="left" valign="middle">Remove</th>
    </tr>
    <?php 
    $i=1;          
    $query="SELECT * From  tbl_category2 ";
    $res=mysqli_query($con,$query);
    while ($row=mysqli_fetch_array($res)) {                           
    ?>
   
    <tbody>
      <tr>
      <td align="left" valign="top"><?= $i++?></td>
      <td align="left" valign="top"><?php echo $row['category_name']; ?></td>
      <td align="left" valign="top"><strong><?php echo $row['Active']; ?></strong></td>
      <td align="left" valign="top"><a href="Edit.php?id=<?= $row['id'];?>">Edit</a></td>
      <td align="center" valign="top"><a href="Remove.php?id=<?= $row['id'];?>"><img src="images/icon-bin.jpg" alt="" width="25" height="25" border="0" align="absmiddle" /></a></td>
    </tr>
    </tbody>
<?php
}
?>
  </table>
  <div class="clear">&nbsp;</div>
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
</html>

