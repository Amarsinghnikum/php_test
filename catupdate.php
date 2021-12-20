<?php  
    include('constant.php');
    $category_name=$_POST['category_name'];
    $Active=$_POST['Active'];

    if($Active==on)
    {
        $Active="Active";
    }else
    {
        $Active="";
    }
    
    $id=$_POST['id'];

    $query="UPDATE tbl_category2 SET category_name='$category_name',Active='$Active' where id='$id'";

    $ress=mysqli_query($con,$query);
    if ($ress==1) {
        
        echo "<script type='text/javascript'>alert('Updated successfully!')</script>";
    }
    else{
        
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }
    header("Location:add-category.php");

?>