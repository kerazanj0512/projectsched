<?php

require_once '_db_mysql.php';

if(isset($_POST['add'])) {

    $now = (new DateTime("now"))->format('Y-m-d H:i:s');
    $ordinal = db_get_max_ordinal(null) + 1;
      $name = $_POST['name'];
      $start = $_POST['start'];
      $end = $_POST['end'];
     
      $assignee = $_POST['assignee'];
      $project= $_POST['project'];


    
    try {
     
      $sql = "INSERT INTO task (name, start,end, ordinal, ordinal_priority,  assignee, status, project_id) VALUES ('$name','$start','$end','$ordinal' ,'$now','$assignee','4','$project' )";
		if($db->query($sql)){

         


      echo "<script>alert('Well Done, $name task successfully added.')</script>";
			
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