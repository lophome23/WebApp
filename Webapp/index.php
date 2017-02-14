<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="DIST/css/lol.css">
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script type="text/javascript" src="DIST/js/lol.js"></script>
</head>
<body>
<br>
<br>
<br>
<br>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>

           <center> <form action="#" method="post">
        <div class="form-group ">
            <input type="text" class="form-control" placeholder="Username " name="username" id="UserName">
            <i class="fa fa-user"></i>
        </div>
        <br>
        <div class="form-group log-status">
            <input type="password" class="form-control" placeholder="Password" name="password" id="Passwod">
            <i class="fa fa-lock"></i>
        </div>
        <br>
        <br>
        <button type="submit" name="submit" class="log-btn" >Log in</button>
        </center>

     	<?php
     		if (isset($_POST['submit'])) {
     			$conn = oci_connect('hr', 'hr', '//localhost/XE');
     			$username = $_POST['username'];
     			$password = $_POST['password'];
     			 do_query($conn,"SELECT EMPLOYEE_ID FROM EMPLOYEES WHERE EMPLOYEE_ID='".$username."' and email='".$password."'");


			}
			 function do_query($conn, $query) {
     			 	$stid = oci_parse($conn, $query);
     			 	$r =  oci_execute($stid, OCI_DEFAULT);
     			 	$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
     			 	$item = oci_num_rows($stid);
     			 	if ($item != 1) {
     			 	echo "<script> confirm('Error');</script>";
     			 	}
     			 	else {
     			 		header("Location: list.php");
     			 	}
     			 }
      	?>
     </form>
   </div>
</body>
</html>
