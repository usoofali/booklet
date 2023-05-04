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
	$id=$_POST['id'];

	$admissionnumber=$_POST['admissionnumber'];
	
	$status=$_POST['status'];
	$query="SELECT * FROM tblcomplaints where status = '$status'";
	if ($total!==0) {
		$sql=mysqli_query($con,"UPDATE tblcomplaints SET status='$status' WHERE id=".$_GET['id']);
		echo "";;
		if ($sql==true) {

			header("location: registered-complaint.php");
	}else{
		
		$msg="Update Fail".mysql_error();
		echo "$msg";
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
			
				<td>Admission Number</td>
				<td><input type="text" value="<?php echo "$ad" ?>" id="gazee" name="admissionnumber" disabled></td>
			</tr>
			
				<td>Status</td>
				<td><input type="text" value="<?php echo "$st" ?>" name="status" required></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" id="style" name="submit" value="Update Status"></td>
			</tr>
		</table>
	</form>

</body>
</html>
<?php } ?>