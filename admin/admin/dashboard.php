<?php
require("config.php");
  session_start();
  if(strlen($_SESSION['AdminLoginId'])==0)
  { 
    header('location:index.php');
}
else{ ?>
<!DOCTYPE html>
<html lang="en">

  <head>
  <!-- Le styles -->
   <link href="NAMCOSS/css/bootstrap.css" rel="stylesheet">
    
    <link href="NAMCOSS/css/bootstrap-responsive.css" rel="stylesheet">
<style>
      body {
		  
        background-color: white;
      }

      .form-signin {
        max-width: 590px;
        padding: 0px 29px 29px;
        margin: 0 auto 20px;
		align: center;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 25px;
        padding: 9px 15px;
      }
	  fieldset{
		  boder: thin solid #ccc;
		  border-radius: 4px;
		  padding: 20px;
		  padding-left: 60px;
		  background: #fbfbfb;
	  }
	  legend{
		  color: #678;
	  }

    </style>
  
<!-- fitting any device-->
    <meta charset="utf-8"><!-- utf unit code transfer format-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap core CSS-->
    <link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="admin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="admin/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css1/sb-admin.css" rel="stylesheet">

  </head>

  <body style="background-color: lightgreen" id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="#">A D M I N - D A SH...</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
     <?php $query=mysqli_query($con, "select fullname from admin where username='".$_SESSION['AdminLoginId']."'");
 while($result=mysqli_fetch_array($query)) 
 {
 ?> 
                  <h5 style="color: white" class="centered">WELCOME TO COMPUTER SCIENCE ADMIN-<?php echo htmlentities($result['fullname']);?></h5>
                  <?php } ?>
      

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Logout</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="logout.php">logout</a>
       
        <li class="nav-item">
          <a class="nav-link" href="registered-complaint.php">
            <i class="fas fa-fw fa-eye"></i>
            <span>View All Complaints</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="viewstudent.php">
            <i class="fas fa-fw fa-eye"></i>
            <span>View All Students</span>
          </a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="dashboard.php">ADMIN DASHBOARD </a>
            </li>
           
          </ol>

          <!-- Page Content -->
         
          
		   

 		    

	   <fieldset>
       <form name="form" action="" method="POST" enctype="multipart/form-data">
       <h4 style="color: green">Activities taken care by admin</h4>
       <ul style="color: green">
         <li>View students</li>
         <li>View all complaints from only computer science students</li>
         <li>Update complaint status</li>
       </ul>

		  </form>
	
    
	  
	  
        </div>

        <!-- /.container-fluid -->
		 

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span> <button class="btn btn-sml btn-success" type="submit">UDUS EBRS</button></span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.htm">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/jquery/jquery.min.js"></script>
    <script src="admin/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js1/sb-admin.min.js"></script>
	</body>
	</html>
<?php } ?>