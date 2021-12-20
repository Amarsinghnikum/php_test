<?php 

include("constant.php");
if (isset($_POST['submit'])) {

		
    $category_name=$_POST['category_name'];
    $Active=$_POST['Active'];
    $query="INSERT into tbl_category2(category_name,Active)values('$category_name','$Active')";

    $ress=mysqli_query($con,$query);
    if ($ress==1) {
        
        header("location:add-category.php");
    }
    else{
        
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }

}
?>