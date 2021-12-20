<?php 
    include('constant.php'); 

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_subcategory WHERE id=$id";
        $res = mysqli_query($con, $sql);

        if($res==true)
        {
            $row = mysqli_fetch_assoc($res);

            $category_name = $row['category_name'];
            $subcategory_name = $row['subcategory_name'];
            $Active = $row['Active'];
        }
        
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Brilliance GPS Tracking</title>
<!-- slider start -->
<!-- slider end -->
<link rel="stylesheet" href="css/style.css">

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

    </ul>
  </nav>
  
<div id="wrap">
  <div class="clear" style="height:5px;"></div>
  <div id="wrap2">
    <h1>Add Sub Category</h1>
    <br>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-raw">
    <div class="form-name">Select Category</div>
    <div class="form-txtfld">
    <select name="category_name">
          <option>Select Option</option>
          <?php           
          $sql = "SELECT * FROM tbl_category2";         
          $res = mysqli_query($con, $sql);
          
          if($res==true)
          {
          $count_rows = mysqli_num_rows($res);             
          if($count_rows>0)
          {
          while($row=mysqli_fetch_assoc($res))
          {
              $id_db = $row['id'];
              $category_name = $row['category_name'];
              ?>
              <option <?php if($id_db==$id){echo "selected='selected'";} ?> value="<?php echo $category_name; ?>"><?php echo $category_name; ?></option>
          <?php
          }
          }
          else
          {
          ?>
          <option <?php if($category_name=0){echo "selected='selected'";} ?> value="0">None</option>
          <?php
          }            
      }
      ?>                 
      </select>

  </div>
</div>
      <div class="clear"></div>

    <div class="form-raw">
      <div class="form-name">Add Sub Category</div>
      <div class="form-txtfld">
      <input type="text" name="subcategory_name" value="<?php echo $subcategory_name; ?>">
      </div>
    </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>    
    <div class="form-raw">
      <div class="form-name">Active</div>
      <div class="form-txtfld">
      <input <?php if($Active=="Active"){echo "Checked";} ?> type="checkbox" name="Active" value="Active"> Active
      </div>      
      <div class="clear"></div>
    </div>
        
    <div class="form-raw">
      <div class="form-name">&nbsp;</div>
      <div class="form-txtfld" style="width:290px;">
        <input type="submit" name="Submit" class="btn" value="Submit">
      </div>
    </div>
  </div>
  </form>
  

  <div class="clear">&nbsp;</div>
</div>

<div class="form-raw">
      <div class="form-name">&nbsp;</div>
      <div class="form-txtfld" style="width:290px;">
      </div>
    </div>
  </div>
  <div class="clear">&nbsp;</div>
</div>


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
</php>

<?php
    
    if(isset($_POST['Submit']))
    {
        $id = $_GET['id'];
        $category_name = $_POST['category_name'];
        $subcategory_name = $_POST['subcategory_name'];
        if(isset($_POST['Active']))
      {
          $Active = $_POST['Active'];
      }
      else
        {
          $Active = "";
        }
        
        $sql = "UPDATE tbl_subcategory SET
            category_name = '$category_name',
            subcategory_name = '$subcategory_name',
            Active = '$Active'
            WHERE id = $id
            ";

        $res = mysqli_query($con, $sql);
        if($res==true)
        {
          header('location:add-sub-category.php');
        }
        else
        {
          header('location:add-sub-category.php');
        }
      }

?>