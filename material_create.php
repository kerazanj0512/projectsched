<!DOCTYPE html>
<?php
session_start();
include ('includes/db.php');
include ('header.php');
include ('modal.php');
if(!isset($_SESSION['username'])){
  header("location: ../index.php");
  

}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Resources</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
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


    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>

    <!-- daypilot libraries -->
    <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>

</head>
<body  class="hold-transition 
skin-blue-light layout-top-nav" >

<div class="wrapper">
<header class="main-header">
   <nav class="navbar navbar-static-top">
          <div class="container-fluid">
          <div class="navbar-header">
            <a href="../dashboard.php" class="navbar-brand"><b>Project</b> Scheduler</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Materials <span class="sr-only">(current)</span></a></li>
          </ul>
            
            <ul class="nav navbar-nav navbar-right">
              <li><a href="dashboard.php">Back to Dashboard</a></li>
             
              </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
  </header>
</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Materials  Resources Details
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Add Project Materials </a></li>
              <li><a href="#timeline" data-toggle="tab">Material List</a></li>
              
            </ul>
            <div class="tab-content">


              <div class="active tab-pane" id="activity">
               


        <div class="row">
                <div class="col-md-6">



                <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
      
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
                  	<label for="parent_id" class="col-sm-3 control-label">Select Task</label>

                  	<div class="col-sm-9">
                    <select class="mdb-select md-form" name="parent_task" >
                    <option value="">Choose Task</option>
                    <?php
		
    $query3=mysqli_query($con,"select * from task where parent_id > 0 order by name")or die(mysqli_error($con));
       while($row3=mysqli_fetch_array($query3)){
 ?>
     <option value="<?php echo $row3['id'];?>"><?php echo $row3['name'];?></option>
   <?php }?>
                    </select>
                    </div>
                  </div>


                  <div class="form-group">
                  	<label for="project_name" class="col-sm-3 control-label">Item Description:</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="" name="item_desc" required>
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="project_name" class="col-sm-3 control-label">Qty:</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="" name="qty" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="project_name" class="col-sm-3 control-label">Unit Cost:</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="" name="unit_cost" required>
                  	</div>
                </div>

      <button type="submit" class="btn btn-primary btn-flat pull-right" name="add"><i class="fa fa-save"></i> Add</button>
       
           
      </form>




                </div>

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


            
              
              <!-- /.tab-pane -->






              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
   

     


  <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

      <form class="form-horizontal" method="POST" action="emp_fileadd.php" enctype="multipart/form-data">
     
          		  <div class="form-group">
                  	<label class="col-sm-3 control-label">Qty.</label>

                  	<div class="col-sm-9">
                    	<input type="number" class="form-control" id="filename" name="filename" required>
                  	</div>
                </div>

                <div class="form-group">
                  	<label class="col-sm-3 control-label">Unit Cost</label>

                  	<div class="col-sm-9">
                    	<input type="number" class="form-control" id="filename" name="filename" required>
                  	</div>
                </div>

                <div class="form-group">
                  	<label class="col-sm-3 control-label">Total Cost</label>

                  	<div class="col-sm-9">
                    	<input type="number" class="form-control" id="filename" name="filename" required>
                  	</div>
                </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-flat" name="update"><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             </div>

    </div>
  </div>
</div>



  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy;2019 <a href="#">Project Scheduler</a>.</strong> All rights
    reserved.
  </footer>





 
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="bower_components/Flot/jquery.flot.categories.js"></script>


</body>
</html>

<?php

if(ISSET($_POST['add'])){
    $project_id = $_POST['project'];
    $item_desc = $_POST['item_desc'];
    $utilize = $_POST['qty'];
    $rent = $_POST['unit_cost'];
    $total= $rent * $utilize;

    
    mysqli_query($con, "INSERT INTO project_material (item_desc, qty, unit_cost, total_cost, project_id) VALUES ('$item_desc', '$utilize', '$rent', '$total', '$project_id')");
    echo '<script>alert("Added Succesfully") </script>' ;
    header("location: index.php");


}



?>

