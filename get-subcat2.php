<?php
  include "constant.php";
  $category_id = $_POST["category_id"];
  $result = mysqli_query($con, "SELECT * FROM tbl_subcategory WHERE parent_id = $category_id");
?>

<option value="">Select S</option>

<?php
while($row = mysqli_fetch_array($result)){
    ?>
    <option value="<?php echo $row["id"]; ?>"><?php echo $row["subcategory_name"]; ?></option>
    <?php
}
?>