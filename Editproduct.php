<?php 
  include('constant.php'); 

  if(isset($_GET['id']))
  {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_product WHERE id=$id";
    $res = mysqli_query($con, $sql);

    if($res==true)
    {
      $row = mysqli_fetch_assoc($res);
      $category_name = $row['category_name'];
      $subcategory_name = $row['subcategory_name'];
      $current_image = $row['image_name'];
      $title = $row['title'];
      $heading = $row['Heading'];
      $description = $row['description'];
      $current_file = $row['image_name2'];
      $editor1 = $row['editor1'];
      $pdfheading = $row['pdfheading'];
      $Active = $row['Active'];
    }
  }
?>

<!DOCTYPE html>
<php xmlns="http://www.w3.org/1999/xphp">
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

<body>
<header>
  <div id="wrap">
    <div class="logo"><img src="images/logo.png" border="0"></div>
    <div class="topmenu">
      <ul>
        <li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
        <li><a href="change-password.php">Change Password</a> |</li>
        <li><a href="index.php"><img src="images/logout.png" width="16" height="16" border="0" align="absmiddle">&nbsp;&nbsp;Logout</a></li>
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</header>
<nav>
  <ul id="qm0" class="qmmc">
    <li><a href="admin.php">Dashboard</a></li>
      
<li><a href="#" class="qmactive">Product</a>
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
    <h1>Add Product</h1>
    <br>
    
    <form method="POST" action="" enctype="multipart/form-data">
    <div class="form-raw">
      <div class="form-name">Select Category</div>
      <div class="form-txtfld">

      <select name="category_name" id="category-dropdown" >  
    <option value="">Select Category</option>

<?php          
        $sql = "SELECT * FROM tbl_category2 WHERE id = '$category_name'";
        $results = mysqli_query($con, $sql);
        $rows = mysqli_fetch_array($results);
        $catid = $rows['id'];
        
        $sql = "SELECT * FROM tbl_category2";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($result))
        {
          ?>
           <option <?php if($catid==$row['id']){echo "selected='selected'";} ?> value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
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

      <?php          
        $sql = "SELECT * FROM tbl_product WHERE id = '$id'";
        $ress = mysqli_query($con, $sql);
        $rows = mysqli_fetch_array($ress);
        $subcatid = $rows['subcategory_name'];
        $subcatid = explode(',',$subcatid);

        $sql = "SELECT * FROM tbl_subcategory WHERE parent_id = '$category_name'";
        $result = mysqli_query($con, $sql);
        $i=0;
        while($row = mysqli_fetch_array($result))
        {
          ?>
           <option <?php if(@$subcatid[$i]==$row['id']){echo "selected='selected'";} ?> value="<?php echo $row['id']; ?>"><?php echo $row['subcategory_name']; ?></option>
          <?php
          $i=$i+1;
        }
      ?>
    </select>
    <?php print_r(@$subcatid); ?>
      </div>
    </div>
      <div class="clear"></div>
    
    
    
    <div class="form-raw">
      <div class="form-name">Product Name</div>
      <div class="form-txtfld">
      <input type="text" name="product_name"value="">
      </div>
    </div>
    
    <div class="form-name">Current Image</div>
    <div class="form-txtfld">
    <?php
        if($current_image == "")
        {
            echo "<div class='error'>Image not Available.</div>";
        }
        else
        {
          ?>
          <img src="images/category/<?php echo $current_image; ?>" width="100px">                           
          <?php
        }
    ?>
    </div>
  </div>
  <tr>
    <td>New Image: </td>
    <td>
        <input type="file" name="image">
    </td>
  </tr>

  <div class="form-raw" style="width:100%;">
    <div class="form-name">Short Description</div>
    <div class="form-txtfld">
    <textarea name="short_description">

    </textarea>
    </div>
  </div>
  
 <!--*****************************************************************************************--> 
 <div class="clear"></div>
  <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 20px 0 0px 0;">Description</h1>
    <br> 

      <div class="form-raw">
      <div class="form-name">Title 1</div>
      <div class="form-txtfld">
        <input type="text" name="title[]" multiple="" value="<?php echo $title; ?>">
      </div>
    </div>
  <div class="form-raw">
      <div class="form-name">&nbsp;</div>
      <div class="form-txtfld txtfld50"><input type="text" multiple="" placeholder="Heading" name="name[]" value="<?php echo $heading; ?>"></div>
      <div class="form-txtfld txtfld50"><input type="text" multiple="" placeholder="Desciption" name="phone[]" value="<?php echo $description; ?>"></div>
  </div>
      <div class="form-name">&nbsp;</div>
      <div class="form-txtfld" style="width: 320px; text-align: right;">
        <a href="javascript:void(0)" class="add-more-form">Add More +</a></div>
        <div class="paste-new-forms"></div>
  
 <!--*****************************************************************************************-->

 <div class="clear"></div>
  <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 0px 0 0px 0;">Features</h1>
    <br>  
  <div class="form-raw" style="width:100%;">
    <div class="form-name">Content</div>
    <div class="form-txtfld" style="width:780px;">
      <textarea style="width:100%; height:500px;" name="editor1" id="editor1" rows="10" cols="80"><?php echo $editor1; ?></textarea>
    </div>
  </div>
  <div class="clear"></div> 
  
<!--*****************************************************************************************-->
 
  <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 0px 0 0px 0;">Upload PDF</h1>
    <br>  

  <div class="form-raw">
        <div class="form-name">&nbsp;</div>
        <div class="form-txtfld txtfld50">
        <?php
        if($current_file == "")
        {
          echo "<div class='error'>Pdf Not Added.</div>";
        }
        else
        {
          ?>
            <a href="images/uploads/pdf/<?php echo $current_file; ?>">Attachment</a>                           
          <?php
        }
    ?>
    <div class="form-txtfld txtfld50"><input type="text" placeholder="PDF heading" name="pdfheading[]" multiple="" value="<?php echo $pdfheading; ?>" ></div>
</div>
  <div class="form-txtfld txtfld50"><input type="file" placeholder="description" name="image2[]" multiple=""  value="<?php echo $image_name; ?>" accept="application/pdf"></div>
  </div>
  <div class="form-raw">
      <div class="form-name">&nbsp;</div>
      <div class="form-txtfld" style="width: 320px; text-align: right;"><a href="javascript:void(0)" class="add-more-form2">Add More +</a></div>
  </div>
  <div class="paste-new-forms2"></div>

<!--*****************************************************************************************-->

  <div class="clear"></div>
  <div class="form-raw">
    <div class="form-name">Active</div>
    <div class="form-txtfld">
    <input <?php if($Active=="Active"){echo "Checked";} ?> type="checkbox" name="Active" value="Active"> Active
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld">
    <input type="submit" class="btn" name="Submit" value="Submit">
    </div>
  </div>
</div>

</form>
<div class="clear">&nbsp;</div>
</div>

<!--*****************************************************************************************-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  
<!--*****************************************************************************************-->
  
    <script>
        $(document).ready(function(){
            $('#category-dropdown').on('change',function(){
                var category_id = this.value;
                //alert(category_id);
                $.ajax({
                    url: "get-subcat2.php",
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
<!--*****************************************************************************************-->

  <script>
      CKEDITOR.replace( 'editor1' );
</script>

  <script>
    $(document).ready(function(){

    $(document).on('click','.remove', function(){
        $(this).closest('#more-form').remove();
    });

        $(document).on('click', '.add-more-form', function(){
            $('.paste-new-forms').append('<div id="more-form"><div class="form-raw">\
      <div class="form-name">Title 1</div>\
      <div class="form-txtfld">\
        <input type="text" name="title[] multiple=""">\
      </div>\
    </div>\
  <div class="form-raw">\
      <div class="form-name">&nbsp;</div>\
      <div class="form-txtfld txtfld50"><input type="text" placeholder="Heading" name="name[]" multiple=""></div>\
      <div class="form-txtfld txtfld50"><input type="text" placeholder="Desciption" name="phone[]" multiple=""></div>\
      <a href="javascript:void(0)" class="remove"><img src="images/delete.gif" alt=""></a>\
  </div>\
        </div></div>');
        });
    });
</script>
<!--*****************************************************************************************-->

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
<!--*****************************************************************************************-->

<div class="clear"></div>
<footer>
  <footer class="whitefoter">
    <div class="whitefooter-cont">
      <div style="float:left;">Copyright © Brilliance GPS Tracking. All Rights Reserved.</div>
      <a href="https://www.akswebsoft.com/" target="_blank" style="float:right;"> <img src="images/akslogo.png" alt="AKS Websoft Consulting Pvt. Ltd." title="AKS Websoft Consulting Pvt. Ltd."></a>
      <div class="clear"></div>
    </div>
  </footer>
</body>

</head>
</html>
<!--*****************************************************************************************-->


<?php
$con = mysqli_connect("localhost","root","","php_test");

if(isset($_POST['Submit']))
{
    $category_name = $_POST['category_name'];
    $subcategory_name = $_POST['subcategory_name'];
    $title = $_POST['title'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $editor1 = $_POST['editor1'];
    $pdfheading = $_POST['pdfheading'];
    $image_name2 = $_POST['image_name2'];
    $Active = $_POST['Active'];
    $subcategory_name = implode(',',$subcategory_name);

if(isset($_FILES['image']['name']))
{
    $image_name = $_FILES['image']['name'];

    if($image_name != "")
    {
      $ext = end(explode('.', $image_name));
      $image_name = "Product_".rand(000, 999).'.'.$ext;
      $source_path = $_FILES['image']['tmp_name'];
      $destination_path = "images/category/".$image_name;
      $upload = move_uploaded_file($source_path, $destination_path);

      if($current_image!="")
      {
        $remove_path = "images/category/".$current_image;
        $remove = unlink($remove_path);           
      }
    }       
    else
    {
      $image_name = $current_image; 
    }   

if(isset($_FILES['image2']['name']))
{
    $image_name2 = $_FILES['image2']['name'];

    if($image_name2 != "")
    {     
    foreach($pdfheading as $key=>$val)
    {       
      $image_name2[] = $_FILES['image2']['name'][$key];
      $ext = end(explode('.',$image_name2));
      $source_path = $_FILES['image2']['tmp_name'][$key];
      $destination_path = "images/uploads/pdf/".$image_name2;
      $upload = move_uploaded_file($source_path, $destination_path);

      $subcategoryname[] = $subcategory_name[$index];
      $s_title = $title[$index];
      $s_name = $names;
      $s_phone = $phone[$index];
      $s_title = implode(',',$title);
      $s_name = implode(',',$name);
      $s_phone = implode(',',$phone); 
      

      if($current_file!="")
      {
        $remove_path = "images/uploads/pdf/".$current_file;
        $remove = unlink($remove_path);             
      }
    }  
    $image_name2 = implode(',',$image_name2);  
    $pdfheading = implode(',',$pdfheading);
  }     
}
echo print_r($pdfheading);
echo print_r($image_name2); die();

 //echo $names." - ".$phone[$index]." - ".$title[$index];

    $sql = "UPDATE tbl_product SET
        category_name = '$category_name',
        subcategory_name = '$subcategory_name',
        Heading = '$s_name',
        description = '$s_phone',
        title = '$s_title',
        image_name = '$image_name',
        image_name2 = '$image_name2',
        pdfheading = '$pdfheading',
        editor1 = '$editor1',
        Active = '$Active'
        WHERE id = $id
      ";
        
    $query_run = mysqli_query($con, $sql);

    if($query_run==true)
    {
      header("Location: product.php");
    }
    else
    {
      header("Location: product.php");
    }
  }
 }
?>
