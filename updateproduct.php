<?php
include('constant.php');
$con = mysqli_connect("localhost","root","","php_test");

if(isset($_POST['Submit']))
{
    $category_name = $_POST['category_name'];
    $subcategory_name = $_POST['subcategory_name'];
    $title = $_POST['title'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $editor1 = $_POST['editor1'];
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
       
      if($current_file!="")
      {
        $remove_path = "images/uploads/pdf/".$current_file;
        $remove = unlink($remove_path);             
      }
    }  
  }     
}
$image_name2 = implode(',',$image_name2);  

foreach($name as $index => $names)
{
  //echo $names." - ".$phone[$index]." - ".$title[$index];
  $s_title = $title[$index];
  $s_name = $names;
  $s_phone = $phone[$index];
  $s_otherfiled = $empid[$index];

    $sql = "UPDATE tbl_product SET
          category_name = '$category_name',
          subcategory_name = '$subcategory_name',
          Heading = '$s_name',
          description = '$s_phone',
          title = '$s_title',
          image_name = '$image_name',
          image_name2 = '$image_name2',
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
