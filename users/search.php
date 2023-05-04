<?php
   session_start();
   
   //connection page
 include('includes/config.php');
   
    //call the form data
	
	$admissionnumber = $_POST['admissionnumber'];
	
	$sql = mysqli_query($bd, "SELECT * FROM tblcomplaints WHERE admissionnumber LIKE '%$admissionnumber%'");
	if(mysqli_num_rows($sql) == 1){
		
		$row = mysqli_fetch_assoc($sql);
		echo "<h4 style='color:blue' align='center'>STUDENT COMPLAINT STATUS FROM FEDERAL UNIVERSITY GUSAU</h4>";
		echo "<table width='400px' border='2' align='center' id='bg' style='border-collapse: collapse'>";
	    echo "<tr><td width='40%' style='color:blue'>Full Name</td><td>".$row['fname']."</td></tr>"; 
		echo "<tr><td width='40%' style='color:red'>Admission Number</td><td>".$row['admissionnumber']."</td></tr>";
		echo "<tr><td width='40%' style='color:blue'>Faculty</td><td>".$row['faculty']."</td></tr>";
		echo "<tr><td width='40%' style='color:blue'>Department ID</td><td>".$row['department']."</td></tr>";
		echo "<tr><td width='40%' style='color:red'>Course</td><td>".$row['course']."</td></tr>";
		echo "<tr><td width='40%' style='color:blue'>Complaint Details</td><td>".$row['complaintDetails']."</td></tr>";
		echo "<tr><td width='40%' style='color:blue'>Status:</td><td>".$row['status']."</td></tr>";
        echo "</table>"; 
	    echo "<div align='center'>
		<a  href='javascript:;' onClick='history.go(-1)'>Back</a> |
		<a href='javascript:;' onClick='window.print()'>Print</a> | 
		
	</div>"; 
	}
	else{
		echo "no records found!";
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body{
			background: lightgreen;
		}
	</style>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

</body>
</html>