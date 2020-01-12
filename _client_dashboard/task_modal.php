<!DOCTYPE html>
<?php
session_start();
include ('../includes/db.php');
include ('../header.php');

$range_to = date('m/d/Y');
  $range_from = date('m/d/Y', strtotime('-30 day', strtotime($range_to)));
if(!isset($_SESSION['username'])){
  header("location: ../index.php");
  

}


    


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard - Overview</title>
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
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">




  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition 
skin-blue-light layout-top-nav">
<div class="wrapper">
 <header class="main-header">
   <nav class="navbar navbar-static-top">
          <div class="container-fluid">
          <div class="navbar-header">
            <a href="../../index2.html" class="navbar-brand"><b>Project</b> Scheduler</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
              <li class="active"><a href="#">My Task <span class="sr-only">(current)</span></a></li>
              
            
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
              <li><a href="dashboard.php">Back to Dasboard</a></li>
             </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
  </header>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php
$pdid=$_GET['editid'];
$ret=mysqli_query($con,"select * from task where id='$pdid'");
$cnt=1;
$row=mysqli_fetch_array($ret);
$status = $row['status'];
$id = $row['id'];
$act_start= $row['actual_start_date'];
?>

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
            <h3 class="profile-username text-mute text-left">Task Details</h3>
            <img class="profile-user-img img-responsive img-circle" src="../img/me.jpg" alt="User profile picture">
              <h3 class="text text-center"><?php echo $row['name'];?></h3>
              <p class="text text-center">(Task Name)</p>

              <h4 class="text text-left">Task Dates:</h4>
              <h4 class="text text-left">From: <?php echo $row['start'];?> - To: <?php echo $row['end'];?> </h4>
              
              
              
              <p class="text text-right">
                Status: 
              <i class="fa fa-circle-o text-red"></i> 
              <?php
              $sql=mysqli_query($con,"select * from legend where id='$status'");
              $row=mysqli_fetch_array($sql); 
              $legend=$row['desc']; 
              ?>
              <?php echo $legend; ?>

              </p>
           
            </div>
            
          </div>

          <div class="box box-primary">
          <?php
$pdid=$_GET['editid'];
$ret=mysqli_query($con,"select * from task where id='$pdid'");
$cnt=1;
$row=mysqli_fetch_array($ret);
$status = $row['status'];
$id = $row['id'];
$act_start= $row['actual_start_date'];
$act_end= $row['actual_end_date'];
$complete = $row['complete'];
$project_id = $row['project_id'];
?>
            <div class="box-header with-border">
              <h3 class="box-title">Actual / Estimated Date</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-calendar-o"></i> From:  <?php echo $act_start;?></strong>
              <hr>

              <strong><i class="fa fa-calendar-o"></i> To: <?php echo $act_end;?></strong>

          
              <hr>

              <strong><i class="fa fa-line-chart"></i> Progress</strong>
              <div class="progress">
  <div class="progress-bar"  style="width: <?php echo $complete.'%'?>"> <p><?php echo $complete.'%'?></p><</div>
</div>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Comments</strong>

              <p><?php echo $row['comment'];?></p>
            </div>
            <!-- /.box-body -->
          </div>
          </div>

     
        <div class="col-md-9">
           <div class="box">
             <div class="box-body">
              <div class="row">
             
               </div>
               <div class="row">
              <div class="col-md-12" >

              <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Task</a></li>
              <li><a href="#timeline" data-toggle="tab">Resource List</a></li>
              <li><a href="#edit" data-toggle="tab">Attachments</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
           
           <div class="row">
             <div class="col-md-12">
             <form role="form" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="Actual_date_start">Actual Date Start</label>
                  <input type="text" class="form-control" name="start_act" id="startdatepicker" data-date-format="yyyy-mm-dd" placeholder="Select Date ">
                </div>
                <div class="form-group">
                <label for="Actual_date_end">Actual Date End</label>
                  <input type="text" class="form-control" name="end_act" id="datepicker" data-date-format="yyyy-mm-dd" placeholder="Select Date ">
                </div>
               
                <div class="form-group">
                  <label>Comments</label>
                  <textarea class="form-control" rows="3" name="comment" placeholder="Enter ..."></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit"  name = "submit" class="btn btn-primary">Submit</button>
              </div>
            </form>

             </div>
           </div>
           <?php
           include ('task_update.php');
           
           ?>
           <div class="row">
             <div class="col-md-12">
             <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="Actual_date_start">Activity log:</label>
              
                </div>
              
              </div>
              
            </form>


             
             </div>
           </div>

















           
           
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
              <div class="col-md-12">
          <a href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        
          <button type="button" class="btn btn-primary" style="margin-left: 8px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>

                <!-- The timeline -->
               <div class="row">
                <div class="col-md-6">
                <div><h3>Material <small>(Estimate)</small></h3></div>
                <div class="table-responsive">
                   <table id="example2" class="table table-bordered">
                 <thead>
                  <th>Item Desciption</th>
                  <th>Qty</th>
                  <th>Unit Cost</th>
                  <th>Total Cost </th>
                
                </thead>

                <tbody>
                <?php
                 
                    $sql = "SELECT * FROM project_material";
                    $query = $con->query($sql);
                    while($row = $query->fetch_assoc()){
$path = $row['id'];

                      ?>
                        <tr>
                          <td><?php echo $row['item_desc']; ?></td>
                          <td><?php echo $row['qty']; ?></td>
                          <td><?php echo $row['unit_cost']; ?></td>
                          <td><?php echo $row['total_cost']; ?></td>
                          
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
                 </table>
                 </div>

                 

                 </div>
                 <div class="col-md-5">
                 <div><h3>Material <small>(Actual)</small></h3></div>
                 <div class="table-responsive">
                   <table id="example2" class="table table-bordered">
                 <thead>
                
                  <th>Qty</th>
                  <th>Unit Cost</th>
                  <th>Total Cost </th>
                  <th>Tools</th>
                </thead>

                <tbody>
                <?php
                 
                    $sql = "SELECT * FROM project_material";
                    $query = $con->query($sql);
                    while($row = $query->fetch_assoc()){
$path = $row['id'];

                      ?>
                        <tr>
                          
                          <td><?php echo $row['act_qty']; ?></td>
                          <td><?php echo $row['act_unitcost']; ?></td>
                          <td><?php echo $row['act_totalcost']; ?></td>
                          <td>
                     
                          <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i> Update</button>
                     
                    </td>
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
                </tbody>
                 </table>
                 </div>
                 </div>
                 
                 </div>
<!-- sa Equipment Naman -->


<div class="row">
                <div class="col-md-6">
                <div><h3>Equipment <small>(Estimate)</small></h3></div>
                <div class="table-responsive">
                   <table id="example2" class="table table-bordered">
                 <thead>
                  <th>Unit</th>
                  <th>Utilize Hours</th>
                  <th>Rent per Hour</th>
                  <th>Total Cost </th>
                
                </thead>

                <tbody>
                <?php
                 
                    $sql = "SELECT * FROM project_equipment where project_id='$project_id'";
                    $query = $con->query($sql);
                    while($row = $query->fetch_assoc()){
$path = $row['id'];

                      ?>
                        <tr>
                          <td><?php echo $row['unit']; ?></td>
                          <td><?php echo $row['utilize_hours']; ?></td>
                          <td><?php echo $row['rent']; ?></td>
                          <td><?php echo $row['total_cost']; ?></td>
                          
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
                 </table>
                 </div>

                 

                 </div>
                 <div class="col-md-5">
                 <div><h3>Equipment <small>(Actual)</small></h3></div>
                 <div class="table-responsive">
                   <table id="example2" class="table table-bordered">
                 <thead>
                
                  <th>Utilize Hours</th>
                  <th>Rent per Hour</th>
                  <th>Total Cost </th>
                  <th>Tools</th>
                </thead>

                <tbody>
                <?php
                 
                 $sql = "SELECT * FROM project_equipment where project_id='$project_id'";
                    $query = $con->query($sql);
                    while($row = $query->fetch_assoc()){
$path = $row['id'];

                      ?>
                        <tr>
                          
                          <td><?php echo $row['act_utilize_hours']; ?></td>
                          <td><?php echo $row['act_rent']; ?></td>
                          <td><?php echo $row['act_total_cost']; ?></td>
                          <td>
                     
                          <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#myModal_equipment"><i class="fa fa-pencil"></i> Update</button>
                     
                    </td>
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
                </tbody>
                 </table>
                 </div>
                 </div>
                 
                 </div>

<!-- end san Equipment-->

<!-- sa Man Power -->


<div class="row">
                <div class="col-md-6">
                <div><h3>Manpower <small>(Estimate)</small></h3></div>
                <div class="table-responsive">
                   <table id="example2" class="table table-bordered">
                 <thead>
                  <th>Designation</th>
                  <th># of Workers</th>
                  <th>Rate per Day</th>
                  <th>Total Cost </th>
                
                </thead>

                <tbody>
                <?php
                 
                    $sql = "SELECT * FROM project_manpower";
                    $query = $con->query($sql);
                    while($row = $query->fetch_assoc()){
$path = $row['id'];

                      ?>
                        <tr>
                          <td><?php echo $row['designation']; ?></td>
                          <td><?php echo $row['no_of_workers']; ?></td>
                          <td><?php echo $row['rate_per_day']; ?></td>
                          <td><?php echo $row['total_cost']; ?></td>
                          
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
                 </table>
                 </div>

                 

                 </div>
                 <div class="col-md-5">
                 <div><h3>Manpower <small>(Actual)</small></h3></div>
                 <div class="table-responsive">
                   <table id="example2" class="table table-bordered">
                 <thead>
                
                  <th># of Workers</th>
                  <th>Rate per Day</th>
                  <th>Total Cost </th>
                  <th>Tools</th>
                </thead>

                <tbody>
                <?php
                 
                    $sql = "SELECT * FROM project_manpower";
                    $query = $con->query($sql);
                    while($row = $query->fetch_assoc()){
$path = $row['id'];

                      ?>
                        <tr>
                          
                          <td><?php echo $row['act_no_of_workers']; ?></td>
                          <td><?php echo $row['act_rate_per_day']; ?></td>
                          <td><?php echo $row['act_total_cost']; ?></td>
                          <td>
                     
                          <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#myModal_equipment"><i class="fa fa-pencil"></i> Update</button>
                     
                    </td>
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
                </tbody>
                 </table>
                 </div>
                 </div>
                 
                 
                 </div>

                 <!--end man san Man Power -->


              </div>
              
              <!-- /.tab-pane -->


              <div class="tab-pane" id="edit">
              <div class="col-md-12">
        
        </div>

                <!-- The timeline -->
               



<div class="row">
               
                 <div class="col-md-12">
                 <form role="form">
                 <div class="form-group" >
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Upload File/Image</p>
                </div>
                 </form>
                 <div><h3>List of Attachments</h3></div>
                 <div class="table-responsive">
                   <table id="example2" class="table table-bordered">
                 <thead>
                
                  <th>File Name</th>
                  <th>Description</th>
                  <th>Date Upload</th>
                  <th>Tools</th>
                </thead>

                <tbody>
                <?php
                 
                    $sql = "SELECT * FROM attachment";
                    $query = $con->query($sql);
                    while($row = $query->fetch_assoc()){
$path = $row['id'];

                      ?>
                        <tr>
                          
                          <td><?php echo $row['file_name']; ?></td>
                          <td><?php echo $row['description']; ?></td>
                          <td><?php echo $row['date_upload']; ?></td>
                          <td>
                     
                          <button type="button" class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#myModal_equipment"><i class="fa fa-pencil"></i> Update</button>
                          <button type="button" class="btn btn-success btn-sm btn-flat" data-toggle="modal" data-target="#myModal_equipment"><i class="fa fa-download"></i> Download </button>
                     
                    </td>
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
                </tbody>
                 </table>
                 </div>
                 </div>
                 
                 </div>


              </div>
              
              <!-- /.tab-pane -->






              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
                  </div>




              </div>
               </div>


          
             </div>
           </div>
        </div>
     
      </div>

      d<iv class="modal" id="myModal_equipment">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create Task</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
       <div class="form-group">
                  	<label for="project_name" class="col-sm-3 control-label">Actual Utilize Hour</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="" name="utilize" required>
                  	</div>
                </div>
               
                <div class="form-group">
                <label for="date-start" class="col-sm-3 control-label">Rent per Hour</label>

                <div class="col-sm-9">
                    	<input type="text" class="form-control" id="" name="rent" required>
                  	</div>
                <!-- /.input group -->
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















 
    </section>   
    <!-- /.content -->
    

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     
    </div>
    <strong>Copyright &copy; 2019-2020 <a href="#"> Project Sched</a>.</strong> All rights
    reserved.
  </footer>

 
  <div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 3 -->


<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- ChartJS -->
<script src="../bower_components/chart.js/Chart.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../bower_components/Flot/jquery.flot.pie.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../bower_components/Flot/jquery.flot.categories.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../bower_components/Flot/jquery.flot.resize.js"></script>
<script>

  //Date picker
  $('#datepicker').datepicker({
 
      autoclose: true
    })

    $('#startdatepicker').datepicker({
 
 autoclose: true
})
</script>


</body>
</html>





