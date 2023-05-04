<?php
session_start();
error_reporting(0);
include('includes/config.php');
$fullname=$_GET['fullname'];
if(strlen($_SESSION['login'])==0)
  { 
    header('location:index.php');
}
else{ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>EBRS | Complaint Status</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

      <section style="background-color: lightgreen; color: black;" id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Your Complaint Status</h3>
            <br><br><br>
		  		<form action="search.php" method="POST" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
          
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" >
                  <thead style="background-color: green; color: white">
                    <tr>
                     
                      <th>Course </th>
                      <th>Complaint Details </th>
                      <th>Status</th>
                     
                    </tr>
                  </thead>
                
<tbody>
<?php 
include("includes/config.php");

$fullname=$_GET['fullName'];

$query="select course,complaintDetails,status from tblcomplaints where fname='".$_SESSION['fullName']."'";
$data = mysqli_query($bd,$query);
$total = mysqli_num_rows($data);

if ($total!==0) 
{
  while ($result=mysqli_fetch_assoc($data)) {
    echo "
    <tr>
    
    <td>".$result['course']."</td>
    <td>".$result['complaintDetails']."</td>
    <td>".$result['status']."</td>
    </tr>";

  }

}else{
    echo "No Records Found";
  }
?>        
                    </tbody>
                </table>
              </div>
            </div>            

            
            
          </div><!--/.content-->
        </div><!--/.span9-->
      </div>
    </div><!--/.container-->
  </div><!--/.wrapper-->


            
    </section>
      </section>
    
            
      </form>
              
            </form>
            <br><br><br><br><br><br><br><br><br><br><br><br>
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
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
    

  </body>
</html>
<?php } ?>
