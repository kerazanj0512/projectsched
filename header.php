<?php

include ('includes/db.php'); 
$username = $_SESSION["username"];

$get_user = "select * from users where username='$username'"; 
			$run_user = mysqli_query($con,$get_user);
			$row=mysqli_fetch_array($run_user);
            $user_id = $row['id']; 
			$user_name = $row['name'];
			$email = $row['email'];
			$uname = $row['username'];
			$position = $row['position']

?>


