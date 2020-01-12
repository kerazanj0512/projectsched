<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Project Scheduler| Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Project </b>Scheduler</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="name" class="form-control" placeholder="Full name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="mobile" class="form-control" placeholder="Mobile No." required>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="user-email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="user-name"class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="user-pass" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
     
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="register" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <a href="_client_dashboard/index.php" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
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

require_once 'includes/db.php';

if(isset($_POST['register'])) {


      $name = $_POST['name'];
      $mobile = $_POST['mobile'];
      $email = $_POST['user-email'];
      $username = $_POST['user-name'];
      $password = $_POST['user-pass'];
     


      $password = md5($password);

    try {
      $check_email = "select * from users where email='$email' OR name='$name' OR username='$username' ";
      $run_email = mysqli_query($con, $check_email);
      $check = mysqli_num_rows($run_email);
      if($check == 1){
        echo "<script>alert('User already exist')</script>";
        echo "<script>window.open('register.php', '_self')</script>";
        exit();
      }
      $sql = "INSERT INTO users (name, phone, email, username, password, state, to_date ,login_priv) VALUES ('$name', '$mobile', '$email','$username', '$password','Pending', NOW(),'client')";
		if($con->query($sql)){

      echo "<script>alert('Well Done $name, you are good to go.')</script>";
			echo "<script>window.open('_client_dashboard/index.php', '_self')</script>";
    }
    else{
			echo "<script>alert('Registration failed, please try again!')</script>";
			echo "<script>window.open('register.php', '_self')</script>";
		}
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>
 