<?php
    include('constant.php');

    
    if(isset($_GET['id']))
    {

        $id = $_GET['id'];
     
        $sql = "DELETE FROM tbl_subcategory WHERE id=$id";

        $res = mysqli_query($con, $sql);

    }
    header("Location:add-sub-category.php");
?>