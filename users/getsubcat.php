<?php
include('includes/config.php');
if(!empty($_POST["catid"])) 
{
 $id=intval($_POST['catid']);
 if(!is_numeric($id)){
 
 	echo htmlentities("invalid industryid");exit;
 }
 else{
 $stmt = mysqli_query($bd, "SELECT course FROM course WHERE departmentid ='$id'");
 ?><option selected="selected">Select Course </option><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['course']); ?>"><?php echo htmlentities($row['course']); ?></option>
  <?php
 }
}

}
?>