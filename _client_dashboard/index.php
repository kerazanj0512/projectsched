<!DOCTYPE html>
<?php
session_start();
 
 if(isset($_SESSION["username"]))  
 {  
      header("location:dashboard.php");  
 } 
 ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Project Scheduler | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Project </b>Scheduler</a>
    <a href="#"><b>Client</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        <a href="facebook_auth.php" class="btn btn-block btn-social btn-facebook">
                <i class="fa fa-facebook"></i> Sign in with Facebook
              </a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit"  name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    
  
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="../register.php" class="text-center">Register a new membership</a>
   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

<?php

include('../includes/db.php');


if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form 
   $pass_unsafe=$_POST['password'];

   $myusername = mysqli_real_escape_string($con,$_POST['username']);
  $pass1 = mysqli_real_escape_string($con,$pass_unsafe);
  $pass=md5($pass1);

   

   $sql = "select id from users where username='$myusername' AND password='$pass' AND login_priv='client'";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  // $active = $row['active'];
   
   $count = mysqli_num_rows($result);
   
   // If result matched $myusername and $mypassword, table row must be 1 row
 
   if($count == 1) {
      
      $_SESSION['username'] = $myusername;
      echo "<script>window.open('dashboard.php', '_self')</script>";
      
      
   }else {
      echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
   }
}
?>
  