<?php
    include('constant.php');
?>

<!DOCTYPE php>
<php xmlns="http://www.w3.org/1999/xphp">
<head>
<meta http-equiv="content-type" content="text/php; charset=UTF-8">
<title>Brilliance GPS Tracking</title>
<!-- slider start -->
<!-- slider end -->
<link rel="stylesheet" href="css/style.css">
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
  
<div id="wrap">
  <div class="clear" style="height:5px;"></div>
  <div id="wrap2">
    <h1>Add Sub Category</h1>
    <br>

    <?php
      if(isset($_SESSION['update']))
      {
          echo $_SESSION['update'];
          unset($_SESSION['update']);
      }
    ?>

  <form action="insertsubcat.php" method="POST">

  <table>
  <div class="form-raw">
    <div class="form-name">Select Category</div>
    <div class="form-txtfld">
    <select name="category_name" required>  
    <option value="">-- Select --</option>
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
              $id = $row['id'];
              $category_name = $row['category_name'];
              ?>
              
              <option value="<?php echo $id ?>"><?php echo $category_name; ?></option>
              <?php
            }
          }
          else
          {
          ?>
          <option value="0">None</option>p
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
        <input type="text" name="subcategory_name" >
      </div>
    </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>    
    <div class="form-raw">
      <div class="form-name">Active</div>
      <div class="form-txtfld">
      <input type="checkbox" name="Active" value="Active">
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
  </table>
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

<div id="wrap3">
  <table width="100%" border="1" cellspacing="1" cellpadding="1" class="admintable">
    <tr>
      <th width="59" align="left" valign="middle">Sr.No.</th>
      <th width="752" align="left" valign="middle">Category Name</th>
       <th width="752" align="left" valign="middle">Sub Category Name</th>
      <th width="77" align="left" valign="middle">Status</th>
      <th width="54" align="left" valign="middle">Edit</th>
      <th width="71" align="left" valign="middle">Remove</th>
    </tr>

    <?php
    
      $sql = "SELECT * , tbl_category2.category_name as categoryname
        FROM tbl_category2
        RIGHT JOIN tbl_subcategory
        ON  tbl_subcategory.parent_id = tbl_category2.id ";
        
      $res = mysqli_query($con, $sql);
      // if($res==true)
      // {
      //   $count_rows = mysqli_fetch_row($res);
      //   // print_r($count_rows);
      //   // die;
        $sn = 1;

      //   if($count_rows>0)
      //   {   
          while($row=mysqli_fetch_assoc($res))
          {  
            $id = $row['id'];
            $categoryname = $row['categoryname'];
            $subcategory_name = $row['subcategory_name'];
            $Active = $row['Active'];

              ?>

                <tr>
                    <td><?php echo $sn++; ?>.</td>
                    <td><?php echo $categoryname; ?></td>
                    <td><?php echo $subcategory_name; ?></td>
                    <td><?php echo $Active; ?></td>
                    <td>
                       <a href="Editsubcategory.php?id=<?php echo $id; ?>" >Edit</a>
                    </td>
                    
                    <td align="center" valign="top"><a href="Removesubcategory.php?id=<?php echo $id; ?>"><img src="images/icon-bin.jpg" alt="" width="25" height="25" border="1" align="absmiddle" /></a></td>
                    
                </tr>

              <?php
        //     }
        // }
        // else
        // { 
        //     ?>
        <!-- //       <tr>
        //           <td colspan="6">No sub Category Added yet.</td>
        //       </tr> -->
             <?php
        // }
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
</php>


