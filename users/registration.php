<?php
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
	$fullName=$_POST['fullName'];
	$userEmail=$_POST['userEmail'];
	$password=md5($_POST['password']);
	$contactNo=$_POST['contactNo'];
	$admissionnumber=$_POST['admissionnumber'];
	$department=$_POST['department'];
	$status=1;
	$query=mysqli_query($bd, "insert into users(fullName,userEmail,password,contactNo,admissionnumber,department,status) values('$fullName','$userEmail','$password','$contactNo','$admissionnumber','$department','$status')");
	$msg="Registration successfull. Now You can login !";

	// Wait for 2 seconds before redirecting to index.php
    sleep(4);

	// Redirect to login page after successful registration
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>EBRS | Student Registration</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    	
<script>
function userAvailability1() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability1.php",
data:'admissionnumber='+$("#admissionnumber").val(),
type: "POST",
success:function(data){
$("#user-availability-status2").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
  </head>

  <body>
	  <div id="login-page">
	  	<div class="container">
	  	<script type="text/javascript">
	function isInputNumber(evt) {
		var ch = String.fromCharCode(evt.which);
		if (!(/[0-9]/.test(ch))) {
			evt.preventDefault();
		}
	}
</script>
<script type="text/javascript">
	function isContactNumber(evt) {
		var ch = String.fromCharCode(evt.which);
		if (!(/[0-9]/.test(ch))) {
			evt.preventDefault();
		}
	}
</script>

		      <form class="form-login" method="post">
		        <h2 class="form-login-heading">User Registration</h2>
		        <p style="padding-left: 1%; color: green">
		        	<?php if($msg){
echo htmlentities($msg);
		        		}?>


		        </p>
		        <div class="login-wrap">
		         <input type="text" class="form-control" placeholder="Full Name" name="fullName" required="required" autofocus>
		            <br>
		            <input type="email" class="form-control" placeholder="Email" id="userEmail" name="userEmail" required="required">
		         
		            <br>
		            <input type="password" class="form-control" placeholder="Password" required="required" name="password"><br >

		             <input type="text" class="form-control" id="contactNo" onkeypress="isContactNumber(event)" minlength="10" maxlength="11" name="contactNo" placeholder="Contact no" required="required" autofocus ><br>

		              <input type="text" class="form-control" placeholder="Admissionnumber" required="required" onBlur="userAvailability1()" name="admissionnumber" id="admissionnumber" onkeypress="isInputNumber(event)" minlength="10" maxlength="10">
		              <span id="user-availability-status2" style="font-size:12px;"></span>
		            <br>
		             <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label"></label>
<div class="col-sm-100">
<select name="department" id="department" class="form-control" onChange="getCat(this.value);" required="">
<option value="">Select Department</option>
<?php $sql=mysqli_query($bd, "select id,departmentName from departments ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['departmentName']);?></option>
<?php
}
?>

</select>
</div>
		            <br>
		            
		            <button class="btn btn-theme btn-block"  type="submit" name="submit" id="submit"><i class="fa fa-user"></i> Register</button>
		            <hr>
		            
		            <div class="registration">
		                Already Registered<br/>
		                <a class="" href="index.php">
		                   Sign in
		                </a>
		            </div>
		
		        </div>
		
		      
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
