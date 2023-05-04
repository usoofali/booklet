<?php
 session_start();
 include("config.php");
  if(strlen($_SESSION['AdminLoginId'])==0)
  { 
    header('location:index.php');
}
else{ ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Status</title>
	<style type="text/css">
		table{
			background-color: blue;
			color: white;
            border-radius:40px;
		}
		}
		#style{
			background-color: white;
			color: white;
			height: 32px;
			width: 125px;
			border-radius: 22px;
			font-size: 17px;

		}
		#gazee{
			color: white;
		}


		body{
			background: url('admincss/logo.png');
			background-repeat: no-repeat;
			background-size: cover;
		
		}
		form{
			margin-top: 200px;
		}
	</style>
</head>
<body>

<?php
include("config.php");
error_reporting(0);
$id = $_GET['id'];
$role = "";
$username = $_SESSION['AdminLoginId'];
$query = "SELECT role, department FROM admin WHERE username = '$username'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
	// Check if any rows were returned
	if (mysqli_num_rows($result) > 0) {
	// Fetch the row
	$row = mysqli_fetch_assoc($result);
	// Extract the role
	$role = $row['role'];
	}
}

$query="SELECT * FROM tblcomplaints where id = $id";
$data = mysqli_query($con,$query);
$total = mysqli_num_rows($data);

if ($total!==0) 
{
  while ($result=mysqli_fetch_assoc($data)) {
  	$id = $result['id'];
  	$ad = $result['admissionnumber'];
  	$st = $result['status'];
  }
}
?>
<?php
include('config.php');
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$admissionnumber = $_POST['admissionnumber'];
	$status = $_POST['status'];
	$remark = $_POST['remark'];
	$username = $_SESSION['AdminLoginId'];
	$query = "SELECT role, department FROM admin WHERE username = '$username'";

	// Execute the query
	$result = mysqli_query($conn, $query);

	// Check if the query was successful
	if ($result) {
	    // Check if any rows were returned
	    if (mysqli_num_rows($result) > 0) {
		// Fetch the row
		$row = mysqli_fetch_assoc($result);
		// Extract the role
		$role = $row['role'];
		if ($role = "Exam Officer") {
			if ($total!==0) {
			$sql=mysqli_query($con,"UPDATE tblcomplaints SET exam_officer_remark='$remark' WHERE id=".$_GET['id']);
			if ($sql==true) {
				header("location: registered-complaint.php");
			}else{
				$msg="Update Fail".mysql_error();
			echo "$msg";
			}
		} elseif ($role = "H.O.D") {
			if ($total!==0) {
			$sql=mysqli_query($con,"UPDATE tblcomplaints SET hod_remark='$remark' WHERE id=".$_GET['id']);
			if ($sql==true) {
				header("location: registered-complaint.php");
			}else{
				$msg="Update Fail".mysql_error();
			echo "$msg";
			}
		} elseif ($role = "Dean") {
			if ($total!==0) {
			$sql=mysqli_query($con,"UPDATE tblcomplaints SET dean_remark&='$remark' WHERE id=".$_GET['id']);
			if ($sql==true) {
				header("location: registered-complaint.php");
			}else{
				$msg="Update Fail".mysql_error();
			echo "$msg";
			}
		} elseif ($role = "VC") {
			if ($total!==0) {
			$sql=mysqli_query($con,"UPDATE tblcomplaints SET vc_remark='$remark' WHERE id=".$_GET['id']);
			if ($sql==true) {
				header("location: registered-complaint.php");
			}else{
				$msg="Update Fail".mysql_error();
			echo "$msg";
			}
		} elseif ($role = "Assesor") {
			if ($total!==0) {
			$sql=mysqli_query($con,"UPDATE tblcomplaints SET assesor='$remark' WHERE id=".$_GET['id']);
			if ($sql==true) {
				header("location: registered-complaint.php");
			}else{
				$msg="Update Fail".mysql_error();
			echo "$msg";
			}
		} elseif ($role = "Registry") {
			if ($total!==0) {
			$sql=mysqli_query($con,"UPDATE tblcomplaints SET registry='$remark' WHERE id=".$_GET['id']);
			if ($sql==true) {
				header("location: registered-complaint.php");
			}else{
				$msg="Update Fail".mysql_error();
			echo "$msg";
			}
		} else {
		}
		
	    } else {
		echo "No user found with the given username.";
	    }
	} else {
	    echo "Query error: " . mysqli_error($conn);
}
	
}
}
?>


	<form action="" method="POST">
		<table border="0" bgcolor="blue" align="center" cellspacing="30">
			<tr>
				<td>Complaint Number</td>
				<td><input type="text" value="<?php echo "$id" ?>" id="gazee" name="id" disabled></td>
			</tr>
			<tr>
				<td>Admission Number</td>
				<td><input type="text" value="<?php echo "$ad" ?>" id="gazee" name="admissionnumber" disabled></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><input type="text" value="<?php echo "$st" ?>" name="status" required></td>
			</tr>
			<tr>
				<td>Remark/Comment</td>
				<td><textarea type="text" value="<?php echo "$st" ?>" name="remark" required>Enter your remark here...</textarea></td>
			</tr>
			<?php
			if($role = "VC"){
				echo <tr> td>Assesor Name</td><td><input type="text" name="assesor" required></td></tr>
			}elseif(){
			}else{
			}
				
			?>
			<tr>
				<td colspan="2" align="center"><input type="submit" id="style" name="submit" value="Remark/Comment"></td>
			</tr>
		</table>
	</form>

</body>
</html>
<?php } ?>
