<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
{
$status="pending";
$department=$_POST['department'];
$course=$_POST['course'];
$admissionnumber=$_POST['admissionnumber'];
$fname=$_POST['fname'];
$complaintDetails=$_POST['complaintDetails'];

$query=mysqli_query($bd, "insert into tblcomplaints(department,course,admissionnumber,fname,complaintDetails,status) values('$department','$course','$admissionnumber','$fname','$complaintDetails','$status')");

echo '<script> alert("Your complaint has been submitted successfully, keep checking your complaint status!!")</script>';
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

    <title>EBRS | User Register Complaint</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
function getCat(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "getsubcat.php",
  data:'catid='+val,
  success: function(data){
    $("#course").html(data);
    
  }
  });
  }
  </script>
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section style="background-color: lightgreen" id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Register Complaint</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	

                      <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>

                      <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >
                        <?php 
                          $ret=mysqli_query($bd, "SELECT * FROM users WHERE id=".$_SESSION['id']);
$num=mysqli_fetch_array($ret);
                        ?>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Department</label>
<div class="col-sm-4">
<select name="department" id="department" class="form-control" onChange="getCat(this.value);" required="">
<option value="">Select Department</option>
<?php $sql=mysqli_query($bd, "select id,departmentName from departments WHERE id=".$_SESSION['department']);
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['departmentName']);?></option>
<?php
}
?>
</select>
 </div>
<label class="col-sm-2 col-sm-2 control-label">Course</label>
 <div class="col-sm-4">
<select name="course" id="course" class="form-control" >
<option value="">Select Course</option>
</select>
</div>
 </div>



<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Full Name</label>
<div class="col-sm-4">
<input type="text" name="fname" required="required" value="<?php echo $_SESSION['fullName']?>" required="" class="form-control">
</div>
<label class="col-sm-2 col-sm-2 control-label">Admission Number</label>
<div class="col-sm-4">
<input type="text" name="admissionnumber" required="required" value="<?php echo $_SESSION['admissionnumber']?>" required="" class="form-control">
</div>

</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Complaint Details (max 500 words) </label>
<div class="col-sm-6">
<textarea  name="complaintDetails" required="required" cols="10" rows="10" class="form-control" maxlength="500"></textarea>
</div>
</div>




                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>

                          </form>
                          </div>
                          </div>
                          </div>
                          
          	
          	
		</section>
      </section>
    <?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php }?>
