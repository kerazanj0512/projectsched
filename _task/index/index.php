<!DOCTYPE html>
<?php
session_start();
include ('../includes/db.php');
include ('../header.php');
if(!isset($_SESSION['username'])){
  header("location: ../index.php");
  

}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Task</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

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
skin-blue-light layout-top-nav">

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
              <li class="active"><a href="#">Task <span class="sr-only">(current)</span></a></li>
              <li><a href="#"></a></li>
            
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../dashboard.php">Back to Dashboard</a></li>
             
              </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
  </header>
</div>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="main">
          <div id="dp">

          </div>
       </div>
        </div>
        <!-- /.col -->
      </div>
   

     

















<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="../bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="../bower_components/Flot/jquery.flot.categories.js"></script>
<script>

  var dp = new DayPilot.Gantt("dp");
  dp.startDate = new DayPilot.Date ("2019-12-01");
  dp.days = 31;

  dp.linkBottomMargin = 5;

  dp.rowCreateHandling = 'Enabled';

  dp.columns = [
    { title: "Name", property: "text", width: 100},
    { title: "Duration", width: 100}
    
  ];

  dp.onBeforeRowHeaderRender = function(args) {
    args.row.columns[1].html = args.task.duration().toString("d") + " days";
    args.row.areas = [
      {
        right: 3,
        top: 3,
        width: 16,
        height: 16,
        style: "cursor: pointer; box-sizing: border-box; background: white; border: 1px solid #ccc; background-repeat: no-repeat; background-position: center center; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAABASURBVChTYxg4wAjE0kC8AoiFQAJYwFcgjocwGRiMgPgdEP9HwyBFDkCMAtAVY1UEAzDFeBXBAEgxQUWUAgYGAEurD5Y3/iOAAAAAAElFTkSuQmCC);",
        action: "ContextMenu",
        menu: taskMenu,
        v: "Hover"
      }
    ];
  };

  dp.contextMenuLink = new DayPilot.Menu([
    {
      text: "Delete",
      onclick: function() {
        var link = this.source;
        $.post("backend_link_delete.php", {
            id: link.id()
          },
          function(data) {
            loadLinks();
          });
      }
    }
  ]);

  dp.onRowCreate = function(args) {
    $.post("backend_create.php", {
        name: args.text,
        start: dp.startDate.toString(),
        end: dp.startDate.addDays(1).toString()
      },
      function(data) {
        loadTasks();
      });
  };

  dp.onTaskMove = function(args) {
    $.post("backend_move.php", {
        id: args.task.id(),
        start: args.newStart.toString(),
        end: args.newEnd.toString()
      },
      function(data) {
        dp.message("Updated");
      });
  };

  dp.onTaskResize = function(args) {
    $.post("backend_move.php", {
        id: args.task.id(),
        start: args.newStart.toString(),
        end: args.newEnd.toString()
      },
      function(data) {
        dp.message("Updated");
      });
  };


  dp.onRowMove = function(args) {
    $.post("backend_row_move.php", {
        source: args.source.id,
        target: args.target.id,
        position: args.position
      },
      function(data) {
        dp.message("Updated");
      });
  };

  dp.onLinkCreate = function(args) {
    $.post("backend_link_create.php", {
        from: args.from,
        to: args.to,
        type: args.type
      },
      function(data) {
        loadLinks();
      });
  };

  dp.onTaskClick = function(args) {
    var modal = new DayPilot.Modal();
    modal.closed = function() {
      loadTasks();
    };
    modal.showUrl("edit.php?id=" + args.task.id());
  };

  dp.init();

  loadTasks();
  loadLinks();

  function loadTasks() {
    $.post("backend_tasks.php", function(data) {
      dp.tasks.list = data;
      dp.update();
    });
  }

  function loadLinks() {
    $.post("backend_links.php", function(data) {
      dp.links.list = data;
      dp.update();
    });
  }

  var taskMenu = new DayPilot.Menu({
    items: [
      {
        text: "Delete",
        onclick: function() {
          var task = this.source;
          $.post("backend_task_delete.php", {
              id: task.id()
            },
            function(data) {
              loadTasks();
            });
        }
      }
    ]
  });
</script>

</body>
</html>

