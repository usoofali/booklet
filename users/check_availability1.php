<?php 
require_once("includes/config.php");
if(!empty($_POST["admissionnumber"])) {
	$admissionnumber= $_POST["admissionnumber"];
	
		$result =mysqli_query($bd, "SELECT admissionnumber FROM users WHERE admissionnumber='$admissionnumber'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> The Admission Number is already registered .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Admission Number is available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
