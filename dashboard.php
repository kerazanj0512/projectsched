<!DOCTYPE html>
<?php
session_start();
include ('includes/db.php');
include ('header.php');


if(!isset($_SESSION['username'])){
  header("location: index.php");
  

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <script src="_task/js/jquery-1.9.1.min.js" type="text/javascript"></script>

<!-- daypilot libraries -->
<script src="_task/js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
  <!-- Bootstrap 3.3.7 -->
  
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css">
 <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['name', 'complete'],
          <?php
 $get_task = "select * from task"; 
$run_task = mysqli_query($con,$get_task);
while ($row=mysqli_fetch_assoc($run_task)){
 echo "['".$row['name']."',".$row['complete']."]";
}
  
?>
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Project </b>Scheduler</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
        
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="img/me.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user_name; ?></span>
            </a>


            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="img/me.jpg" class="img-circle" alt="User Image">

                <p>
                
                  <small><?php echo $email; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/me.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user_name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
            <li class="active treeview menu-open">
          <a href="#">
          <i class="fa fa-map-marked-alt"></i>
            <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>


            <li class="header" style="font-size:20px">Designation</li>
          </a>
         
        </li>
        
       
        <li class="treeview">
          <a href="#">
          <i class="fa fa-building-o"></i>
            <span>Construction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="_task/_overview.php"><i class="fa fa-circle-o text-red"></i> Overview</a></li>
          <li data-toggle="modal" data-target="#myProject"><a href="#"><i class="fa fa-circle-o text-red"></i> Projects</a></li>
          
          
       <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Task
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="_task/"><i class="fa fa-circle-o text-yellow" ></i> Task List</a>
              <li data-toggle="modal" data-target="#myModal"><a href="#"><i class="fa fa-circle-o"></i> Create Task</a></li>
              <li data-toggle="modal" data-target="#mysubtask"><a href="#"><i class="fa fa-circle-o text-yellow" ></i> Create Subtask</a></li>
              </ul>
              </li>


              <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Resources
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <li ><a href="equipment_create.php"><i class="fa fa-circle-o"></i> Equipement</a></li>
              <li ><a href="material_create.php"><i class="fa fa-circle-o text-yellow" ></i> Material</a>
              <li ><a href="manpower.php"><i class="fa fa-circle-o text-yellow" ></i> Manpower</a>
              </ul>
              
        </li>

          <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> People</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a href="#">
          <i class="fa fa-bullseye"></i>
            <span>Operation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         
          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Plants & Quarries</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> </a></li>
          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> </a></li>
          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Maintenance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        
          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i>    </a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Logistic & Procurement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
       
          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> </a></li>
          </ul>
        </li>
       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Finance & Accounting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         
          <li><a href="dept/hradmin.php"><i class="fa fa-circle-o"></i> </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Technology</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        
          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Facility</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         
          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Human Resources</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
       
          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Audit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        
          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> </a></li>
          </ul>
        </li>

    
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Compliance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Overiew
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
    
    <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              

              <h3 class="profile-username text-mute text-left">Status</h3>
              <h2 class="text text-center">14</h2>
              <p class="text text-center">Days Remaining</p>

              
              <h2 class="text text-center">Jan 1 2022</h2>
              <p class="text text-center">Scheduled End Date</p>

              <h2 class="text text-center">50% <small>Completed</small></h2>
              <p class="text text-center">Expected Progress is 60%</p>

              <div class="row">
                <div class="col-md-8">
                <div id="piechart" style="width: 350px; height: 200px;"></div>
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          </div>

     
        <div class="col-md-9">
           <div class="box">
             <div class="box-body">
              <div class="row">
              <div class="col-md-12" >

             
                <div class="table-responsive">
                   <table id="example2" class="table table-bordered">
                 <thead>
                  <th>Parent Task Name</th>
                  <th>Progress</th>
                  <th>State</th>
                  <th>Asignee </th>
                  <th>Tools </th>
                
                </thead>

                <tbody>
                <?php
                 
                    $sql = "SELECT * FROM task";
                    $query = $con->query($sql);
                    while($row = $query->fetch_assoc()){
$path = $row['id'];

                      ?>
                        <tr>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['complete']; ?></td>
                          <td><?php echo $row['status']; ?></td>
                          <td><?php echo $row['assignee']; ?></td>
                          <td>
                     
                     <button type="button" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i> View</button>
                
               </td>
                          
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
                 </table>
                 </div>




              </div>
               </div>


          
             </div>
           </div>
        </div>
     
      </div>

      <!-- Main row -->
       <!-- Modal Add -->         
       <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create Task</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

      <form class="form-horizontal" method="POST" action="_task/create_task.php" enctype="multipart/form-data">
      <div class="form-group">
                  	<label for="parent_id" class="col-sm-3 control-label">Select Project</label>

                  	<div class="col-sm-9">
                    <select class="mdb-select md-form" name="project" >
                    <option value="">Choose Project</option>
                    <?php
		
    $query3=mysqli_query($con,"select * from project order by id")or die(mysqli_error($con));
       while($row3=mysqli_fetch_array($query3)){
 ?>
     <option value="<?php echo $row3['id'];?>"><?php echo $row3['project_name'];?></option>
   <?php }?>
                    </select>
                    </div>
                  </div>
      
          		  <div class="form-group">
                  	<label for="project_name" class="col-sm-3 control-label">Name of Task</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="name" name="name" required>
                  	</div>
                </div>
               
                <div class="form-group">
                <label for="date-start" class="col-sm-3 control-label">Start Date</label>

                <div class=" col-sm-9 ">
                
                  <input type="text" class="form-control" name="start" id="startdatepicker" data-date-format="yyyy-mm-dd">
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label for="date-end" class="col-sm-3 control-label">End Date</label>

                <div class=" col-sm-9 ">
               <input type="text" class="form-control" name="end" id="datepicker" data-date-format="yyyy-mm-dd">
                </div>
                <!-- /.input group -->
              </div>

              

                  <div class="form-group">
                  	<label for="" class="col-sm-3 control-label">Assignee</label>

                  	<div class="col-sm-9">
                    <select class="mdb-select md-form" name="assignee" >
                    <option value="" >Choose your Person</option>
                    <?php
		
    $query3=mysqli_query($con,"select * from users where login_priv ='client' order by id")or die(mysqli_error($con));
       while($row3=mysqli_fetch_array($query3)){
 ?>
     <option value="<?php echo $row3['id'];?>"><?php echo $row3['name'];?></option>
   <?php }?>
                    </select>
                    </div>
              
                </div>


      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Create Task</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             </div>
      </form>
      
    </div>
  </div>
</div>
       </div>










      <div class="modal" id="mysubtask">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create Task</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

      <form class="form-horizontal" method="POST" action="_task/create_subtask.php" enctype="multipart/form-data">
      <div class="form-group">
                  	<label for="parent_id" class="col-sm-3 control-label">Select Project</label>

                  	<div class="col-sm-9">
                    <select class="mdb-select md-form" name="project" >
                    <option value="">Choose Project</option>
                    <?php
		
    $query3=mysqli_query($con,"select * from project order by id")or die(mysqli_error($con));
       while($row3=mysqli_fetch_array($query3)){
 ?>
     <option value="<?php echo $row3['id'];?>"><?php echo $row3['project_name'];?></option>
   <?php }?>
                    </select>
                    </div>
                  </div>
      
          		  <div class="form-group">
                  	<label for="project_name" class="col-sm-3 control-label">Name of Task</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="name" name="name" required>
                  	</div>
                </div>
               
                <div class="form-group">
                <label for="date-start" class="col-sm-3 control-label">Start Date</label>

                <div class=" col-sm-9 ">
                
                  <input type="text" class="form-control" name="start" id="startdatepicker" data-date-format="yyyy-mm-dd">
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label for="date-end" class="col-sm-3 control-label">End Date</label>

                <div class=" col-sm-9 ">
               <input type="text" class="form-control" name="end" id="datepicker" data-date-format="yyyy-mm-dd">
                </div>
                <!-- /.input group -->
              </div>

                <div class="form-group">
                  	<label for="parent_id" class="col-sm-3 control-label">Select Parent Task</label>

                  	<div class="col-sm-9">
                    <select class="mdb-select md-form" name="parent_task" >
                    <option value="">Choose Task</option>
                    <?php
		
    $query3=mysqli_query($con,"select * from task order by name")or die(mysqli_error($con));
       while($row3=mysqli_fetch_array($query3)){
 ?>
     <option value="<?php echo $row3['id'];?>"><?php echo $row3['name'];?></option>
   <?php }?>
                    </select>
                    </div>
                  </div>

                  <div class="form-group">
                  	<label for="" class="col-sm-3 control-label">Assignee</label>

                  	<div class="col-sm-9">
                    <select class="mdb-select md-form" name="assignee" >
                    <option value="" >Choose your Person</option>
                    <?php
		
    $query3=mysqli_query($con,"select * from users where login_priv ='client' order by id")or die(mysqli_error($con));
       while($row3=mysqli_fetch_array($query3)){
 ?>
     <option value="<?php echo $row3['id'];?>"><?php echo $row3['name'];?></option>
   <?php }?>
                    </select>
                    </div>
              
                </div>


      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Create Task</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             </div>
      </form>
      
    </div>
  </div>
</div>
       </div>






















       <div class="modal" id="myProject">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create Project</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

      <form class="form-horizontal" method="POST" action="create_project.php" enctype="multipart/form-data">
      
          		  <div class="form-group">
                  	<label for="project_name" class="col-sm-3 control-label">Project Name:</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="name" name="name" required>
                  	</div>
                </div>
            

                


      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Create Project</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             </div>
      </form>
      
    </div>
  </div>
</div>
</div>








    </section>

    
  </div>
   <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Developed By:</b> Jette Kerz E. Castillo
    </div>
    <strong>Copyright &copy; 2019 <a href=""></a></strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<script>
  //Date picker
    $('#startdatepicker').datepicker({
      
      autoclose: true
    })
    $('#datepicker').datepicker({
      
      autoclose: true
    })
</script>
</body>

</html>
