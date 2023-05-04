<?php

include("dbconnect.php");
mysqli_select_db($connection, "it_db");
$id= $_GET['del'];
$sql="DELETE FROM applicants WHERE id = '$id'";
$result = mysqli_query($connection, $sql);
if($result){
	echo "<h3 style='color:red' align='center'>APPLICANT Deleted Successfully</h3>";
	echo "<BR>";
	echo "<a href='users.php'> <h4 style='color:blue' align='center'>CLICK HERE TO CONTINUE</h4></a>";
  }else {
	echo "ERROR".mysqli_error($connection);
  }
?>
<?php
  mysqli_close($connection);
?>