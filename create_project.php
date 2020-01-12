<?php

require_once 'includes/db.php';

if(isset($_POST['add'])) {
    

      $Project_name = $_POST['name'];
     
    
    try {
    
      $sql = "INSERT INTO project(project_name, status) VALUES ('$Project_name','active')";
		if($con->query($sql)){

      echo "<script>alert('Well Done, $Project_name successfully added.')</script>";
		
    }
    else{
			echo "<script>alert('Failed!')</script>";
		
		}
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}
?>