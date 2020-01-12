<?php
if(isset($_POST['submit']))
  {
    $act_start=$_POST['start_act'];
    $act_end=$_POST['end_act'];
    $comment=$_POST['comment'];
    $id=$_GET['editid'];
    $query=mysqli_query($con, "update task set actual_start_date='$act_start', actual_end_date='$act_end', comment='$comment' where id = '$id'");
    if ($query) {
        echo '<script>alert("Update Progress Successfully") </script>' ;
  }
  else
    {
        echo '<script>alert("Update Failed") </script>' ;
    }

  
}
?>