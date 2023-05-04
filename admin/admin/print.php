
<!DOCTYPE html>
<html lang="en">

  <head>
  

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>APPLICANT</title>

    <!-- Bootstrap core CSS-->
    <link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="admin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="admin/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css1/sb-admin.css" rel="stylesheet">

  </head>
  <body>
<center><h5 style="color:green">A P P L I C A N T &copy;</h5></center>
		 <p></p>
		 <p></p>
		 <table class="table table-bordered table-hover table-striped  table-sm" width='200px'  align='center'>
        <thead>

        <tr>

            <th style="color:black">USERID</th>
			<th style="color:black">STUDENT NAME</th>
			<th style="color:black">REGNO</th>
            <th style="color:black">GENDER</th>
			 <th style="color:black">PHONE</th>
			 <th style="color:black">EMAIL</th>
			 <th style="color:black">INSTITUTION</th>
			 <th style="color:black">COURSE </th>
			 <th style="color:black"> I.T DURATION</th>
			 <th style="color:black">PPT</th>
			 <th style="color:black">DATE_STARTED</th>
			  <th style="color:black">DATE_OF_COMPLETION</th> 
        </tr>
        </thead>

        <?php
        require_once("dbconnect.php");
        $view_users_query="select * FROM applicants";//select query for viewing users.
        $run=mysqli_query($connection,$view_users_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
			$id=$row[0];
            $fn=$row[1];
			$rg=$row[2];
            $gn=$row[3];
			$phn=$row[4];
            $em=$row[5];
            $inst=$row[6];
			$cos=$row[7];
			$drt=$row[8];
			$passport=$row[9];
			$ds=$row[10];
			$dc=$row[11];
        ?>

        <tr>
<!--here showing results in the table -->
             <td><?php echo $id;  ?></td>
            <td><?php echo $fn;  ?></td>
			 <td><?php echo $rg;  ?></td>
            <td><?php echo $gn;  ?></td>
			<td><?php echo $phn;  ?></td>
            <td><?php echo $em;  ?></td>
            <td><?php echo $inst;  ?></td>
			<td><?php echo $cos;  ?></td>
			<td><?php echo $drt;  ?></td>
			<td><?php echo $passport;  ?></td>
			<td><?php echo $ds;  ?></td>
			<td><?php echo $dc;  ?></td>
        </tr>

        <?php } ?>
        <?php
          mysqli_close($connection);
        ?>
    </table>
	 <a href='javascript:;' onClick='history.go(-1)'>back</a> |
		<a href='javascript:;' onClick='window.print()'>Print</a> |
		  
        </div>
		</body>
		</html>