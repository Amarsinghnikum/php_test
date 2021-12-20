<?php
    include('constant.php');   
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];    
        $sql = "DELETE FROM tbl_product WHERE id=$id";
        $res = mysqli_query($con, $sql);
       
        if($res==true)
        {         
            header('location:product.php');
        }
        else
        {
            header('location:product.php');
        }
    }

?>