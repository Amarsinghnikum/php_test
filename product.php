<?php
    include('constant.php');
?>

<!DOCTYPE html>
<php xmlns="http://www.w.org/1999/xphp">
<head>
<meta http-equiv="content-type" content="text/php; charset=UTF-8">
<title>Brilliance GPS Tracking</title>
<!-- slider start -->
<!-- slider end -->
<link rel="stylesheet" href="css/style.css">

<!-- Menu start --------------->
<link href="menu/quickmenu0.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="menu/quickmenu0.js"></script>
<!-- Menu End --------------->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

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
  <div id="wrap">
    <h1>Add Product</h1>
    <br>

  <form  action="code2.php" method="POST" enctype="multipart/form-data"> 
  <table> 
    
  <div class="form-raw">
    <div class="form-name">Select Category</div>
    <div class="form-txtfld">
    <select name="category_name" id="category-dropdown" >  
    <option value="">Select Category</option>
      <?php          
        
        $sql = "SELECT * FROM tbl_category2";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($result))
        {
          ?>
           <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name'] ?></option>
          <?php
        }
      ?>
    </select>

  </div>
</div>
<div class="clear"></div>

<div class="form-raw">
      <div class="form-name">Select Sub Category</div>
      <div class="form-txtfld">
        <select name="subcategory_name[]" multiple="select" id="sub-category-dropdown" class="form-control" style="height: 100px;" >
           
      </select>
    </div>
</div>
    <div class="clear"></div>

    <div class="form-raw">
      <div class="form-name">Product Name</div>
      <div class="form-txtfld">
        <input type="text" name="product_name">
      </div>
    </div>
    
    <div class="form-name">Product Image1</div>
    <div class="form-txtfld">
      <input type="file" name="image" >
      <div class="form-name"> Image Size ( Width=560px, Height=90px ) (Product page)</div>
    </div>
  </div>
  <div class="form-raw" style="width:100%;">
    <div class="form-name">Short Description</div>
    <div class="form-txtfld">
      <textarea name="short_description" ></textarea>
    </div>
  </div>

<!--***********************************************************************************************************-->

      <div class="clear"></div>
  <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 20px 0 0px 0;">Description</h1>
    <br> 
      <div class="form-raw">
      <div class="form-name">Title 1</div>
      <div class="form-txtfld">
        <input type="text" name="title[]" multiple="">
      </div>
    </div>
  <div class="form-raw">
      <div class="form-name">&nbsp;</div>
      <div class="form-txtfld txtfld50"><input type="text" placeholder="Heading" name="name[]" multiple=""></div>
      <div class="form-txtfld txtfld50"><input type="text" placeholder="Desciption" name="phone[]" multiple=""></div>
  </div>
      <div class="form-name">&nbsp;</div>
      <div class="form-txtfld" style="width: 320px; text-align: right;">
        <a href="javascript:void(0)" class="add-more-form">Add More +</a></div>
        <div class="paste-new-forms"></div>
  
  <!--***********************************************************************************************************-->

  <div class="clear"></div>
  <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 0px 0 0px 0;">Features</h1>
    <br>  
  <div class="form-raw" style="width:100%;">
    <div class="form-name">Content</div>
    <div class="form-txtfld" style="width:780px;">
      <textarea style="width:100%; height:500px;" name="editor1" id="editor1" rows="10" cols="80"></textarea>
    </div>
  </div>
  <div class="clear"></div>

  <!--***********************************************************************************************************-->

  <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 0px 0 0px 0;">Upload PDF</h1>
    <br>  

  <div class="form-raw">
        <div class="form-name">&nbsp;</div>
        <div class="form-txtfld txtfld50"><input type="text" placeholder="PDF heading" name="pdfheading[]" multiple=""></div>
        <div class="form-txtfld txtfld50"><input type="file" placeholder="desciption" name="image2[]" multiple="" accept="application/pdf"></div>
  </div>
  <div class="form-raw">
      <div class="form-name">&nbsp;</div>
      <div class="form-txtfld" style="width: 320px; text-align: right;"><a href="javascript:void(0)" class="add-more-form2">Add More +</a></div>
  </div>
  <div class="paste-new-forms2"></div>

  <!--***********************************************************************************************************-->

   
  <div class="clear"></div>
  <div class="form-raw">
    <div class="form-name">Active</div>
    <div class="form-txtfld">
      <input type="checkbox" name="Active" value="Active">
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld">
      <input type="submit" class="btn" name="Submit" value="Submit">
    </div>
    </table>

</form>
  </div>
</div> 
<div class="clear">&nbsp;</div>
</div>

<div id="wrap2">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="admintable">
    <tr>
      <th width="30" align="left" valign="middle">Sr.No.</th>
      <th width="71" align="left" valign="middle">Select Category</th>
      <th width="100" align="left" valign="middle"> Select Sub Category</th>
     <th width="71" align="left" valign="middle"> Title</th>
     <th width="71" align="left" valign="middle"> Heading</th>
      <th width="71" align="left" valign="middle">Description</th>
      <th width="30" align="left" valign="middle">Features</th>
      <th width="49" align="left" valign="middle">Status</th>
      <th width="49" align="left" valign="middle">Edit</th>
      <th width="49" align="left" valign="middle">Remove</th>
    </tr>
    <tr>
    <?php
      // $sql = "SELECT * FROM tbl_product";
      $sql = "SELECT * tbl_product,tbl_category2.category_name as categoryname
      FROM tbl_product
      RIGHT JOIN tbl_category2  JOIN tbl_subcategory
      ON tbl_product.category_name = tbl_category2.id";

      $sql = "SELECT * FROM tbl_product";
      
      $res = mysqli_query($con, $sql);
      if($res==true)
      {
        $count_rows = mysqli_num_rows($res);
        $sn = 1;
        if($count_rows>0)
        {   
          while($row=mysqli_fetch_assoc($res))
          {  
            $id = $row['id'];
            $category_name = $row['category_name'];
            $subcategory_name = $row['subcategory_name'];
            $title = $row['title'];
            $heading = $row['Heading'];
            $description = $row['description'];
            $editor1 = $row['editor1'];
            $Active = $row['Active'];
            
            $sql = "SELECT * FROM tbl_category2 where id='$category_name'";
            $result = mysqli_query($con, $sql);
            $rowcat =mysqli_fetch_assoc($result);            
           
            ?>
              <tr>
                <td><?php echo $sn++; ?>.</td>
                <td><?php echo $rowcat['category_name']; ?></td>
                <td>
                  <?php $subcategory_name = explode(',',$subcategory_name);
                    foreach($subcategory_name as $val){
                    $aa = $val;
                    $sql = "SELECT * FROM tbl_subcategory where id='$aa'";
                    $query_run = mysqli_query($con, $sql);
                    $rowcats = mysqli_fetch_assoc($query_run);
                    $subcategory_name = $rowcats['subcategory_name'];
                  ?>
                <?php echo $subcategory_name; ?>
                  <?php 
                 } 
                ?>
                </td>
                <td><?php echo $title; ?></td>
                <td><?php echo $heading; ?></td>
                <td><?php echo $description; ?></td>
                <td><?php echo $editor1; ?></td>
                <td><?php echo $Active; ?></td>
              <td align="left" valign="top"><a href="Editproduct.php?id=<?php echo $id; ?>">Edit</a></td>
              <td align="center" valign="top"><a href="Removeproduct.php?id=<?php echo $id; ?>"><img src="images/icon-bin.jpg" alt="" width="25" height="25" border="1" align="absmiddle" /></a></td>
            </tr>
                     <?php
                    }
                }
                else
                { 
                    ?>
                      <tr>
                          <td colspan="11">No Product Added yet.</td>
                      </tr>
                    <?php
                }
            }
          ?>
  </table>

<!--***********************************************************************************************************-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  
    <script>
        $(document).ready(function(){
            $('#category-dropdown').on('change',function(){
                var category_id = this.value;
                //alert(category_id);
                $.ajax({
                    url: "get-subcat.php",
                    type: "POST",
                    data: {
                        category_id: category_id
                    },
                    cache: false,
                    success: function(data){
                      console.log(data);
                        $("#sub-category-dropdown").html(data);
                    }
                });
            });
        });
    </script>
   
<!--*************************************************************************************************************************--> 
    <script>
      CKEDITOR.replace( 'editor1' );
    </script>

<!--*************************************************************************************************************************-->
<script>
    $(document).ready(function(){

    $(document).on('click','.remove', function(){
        $(this).closest('#more-form').remove();
    });

        $(document).on('click', '.add-more-form', function(){
            $('.paste-new-forms').append('<div id="more-form"><div class="form-raw">\
      <div class="form-name">Title</div>\
      <div class="form-txtfld">\
        <input type="text" name="title[]" multiple="">\
      </div>\
    </div>\
  <div class="form-raw">\
      <div class="form-name">&nbsp;</div>\
      <div class="form-txtfld txtfld50"><input type="text" placeholder="heading" name="name[]" multiple=""></div>\
      <div class="form-txtfld txtfld50"><input type="text" placeholder="description" name="phone[]" multiple=""></div>\
      <a href="javascript:void(0)" class="remove"><img src="images/delete.gif" alt=""></a>\
  </div>\
        </div></div>');
        });
    });
</script>
<!--*************************************************************************************************************************-->

<script>
    $(document).ready(function(){

    $(document).on('click','.remove', function(){
        $(this).closest('#more-form2').remove();
    });

        $(document).on('click', '.add-more-form2', function(){
            $('.paste-new-forms2').append('<div id="more-form2"><div class="form-raw">\
        <div class="form-name">&nbsp;</div>\
        <div class="form-txtfld txtfld50"><input type="text" placeholder="PDF heading" name="pdfheading[]" multiple=""></div>\
        <div class="form-txtfld txtfld50"><input type="file" placeholder="desciption" name="image2[]" multiple="" accept="application/pdf"></div>\
        <a href="javascript:void(0)" class="remove"><img src="images/delete.gif" alt=""></a>\
  </div></div>');
        });
    });
</script>
<!--*************************************************************************************************************************-->


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


<?php     

    if(isset($_POST['Submit']))
    {
      $category_name = $_POST['category_name'];
      $subcategory_name = $_POST['subcategory_name'];
      $product_name = $_POST['product_name'];
      $title = $_POST['title'];
      $heading = $_POST['heading'];
      $description = $_POST['description']; 
      $short_description = $_POST['short_description'];
      $editor1 = $_POST['editor1'];

    if(isset($_POST['Submit']))
       {
         $brands = $_POST['subcategory_name'];

         foreach($brands as $item)
         {
           // echo $item;
             
    if(isset($_POST['Submit']))
    {
        $title = $_POST['title'];
        $heading = $_POST['heading'];
        $description = $_POST['description'];
           
        foreach($heading as $index => $headings)
        {
            echo $headings." - ".$description[$index]." - ".$title[$index];
    


    if(isset($_POST['Active']))
      {
          $Active = $_POST['Active'];
      }
      else
      {
        $Active = "";
      }
      

      if(isset($_FILES['image']['name']))
      {
        $image_name = $_FILES['image']['name'];
        
        $ext = end(explode('.',$image_name));
        $image_name = "Product_".rand(000, 999).'.'.$ext;
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "images/category/".$image_name;
        $upload = move_uploaded_file($source_path, $destination_path);
        
        if($upload==false)
        {
          $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
         // header('location:product.php');

          die();
        }
        }
      else
      {
        $image_name="";
      }

      if(isset($_FILES['image2']['name']))
      {
        $image_name2 = $_FILES['image2']['name'];
        $ext = end(explode('.',$image_name2));
        $source_path = $_FILES['image2']['tmp_name'];
        $destination_path = "images/uploads/pdf/".$image_name2;
        $upload = move_uploaded_file($source_path, $destination_path);
        if($upload==false)
        {
          header('location:product.php');
        }
        }
      else
      {
        $image_name2="";
      }

      $sql = "INSERT INTO tbl_product SET 
          category_name = '$category_name',
          subcategory_name = '$item',
          product_name = '$product_name',
          short_description = '$short_description',
          title = '$s_title',
          Heading = '$s_heading',
          description = '$s_description',

          image_name = '$image_name',
          image_name2 = '$image_name2',
          editor1 = '$editor1'
          Active = '$Active'
      ";
      $res = mysqli_query($con, $sql);
    }
   }
  }
 }
}

?>