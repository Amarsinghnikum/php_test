<?php
session_start();
$con = mysqli_connect("localhost","root","","php_test");

if(isset($_POST['Submit']))
{
    $category_name = $_POST['category_name'];
    $subcategory_name = $_POST['subcategory_name'];
    $product_name = $_POST['product_name'];
    $title = $_POST['title'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $editor1 = $_POST['editor1'];
    $pdfheading = $_POST['pdfheading'];
    $subcategory_name = implode(',',$subcategory_name);
    

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


if(isset($_FILES['image2']['name']))
{   
    $image_name2 = $_FILES['image2']['name'];

    foreach($image_name2 as $index=>$val)
    {        
      $image_name2[] = $_FILES['image2']['name'][$index];
      //$ext = end(explode('.',$image_name2));
      $source_path = $_FILES['image2']['tmp_name'][$index];
      $destination_path = "images/uploads/pdf/".$image_name2[$index];
      $upload = move_uploaded_file($source_path, $destination_path);

      $subcategoryname[] = $subcategory_name[$index];
      $s_title = $title[$index];
      $s_name = $names;
      $s_phone = $phone[$index];
      $s_title = implode(',',$title);
      $s_name = implode(',',$name);
      $s_phone = implode(',',$phone);

      $s_otherfiled = $empid[$index];
    }
    $image_name2 = implode(',',$image_name2);
    $pdfheading = implode(',',$pdfheading);   
    
                    
    $sql = "INSERT INTO tbl_product(category_name,subcategory_name,Heading,description,title,image_name,editor1,pdfheading,image_name2,Active) 
        VALUES('$category_name','$subcategory_name','$s_name','$s_phone','$s_title','$image_name','$editor1','$pdfheading','$image_name2','$Active')";
        
    $query_run = mysqli_query($con, $sql);

    if($query_run)
    {
        header("Location: product.php");
        exit(0);
    }
    else
    {
        header("Location: product.php");
        exit(0);
    }
   }
  }
}
?>