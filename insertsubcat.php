<?php
include('constant.php');
?>

<?php     

    if(isset($_POST['Submit']))
    {
      $parent_id = $_POST['category_name'];
      $subcategory_name = $_POST['subcategory_name'];

    if(isset($_POST['Active']))
      {
          $Active = $_POST['Active'];
      }
      else
        {
          $Active = "";
        }

      $sql = "INSERT INTO tbl_subcategory SET 
          parent_id = '$parent_id',
          subcategory_name = '$subcategory_name',
          Active = '$Active'
      ";
      $res = mysqli_query($con, $sql);
    }
    if($res==true)
    {
      header('Location:add-sub-category.php');
    }
?>
