<?php
if(isset($_POST['save'])){
 $user_id=$_POST['user_id'];
$campus=$_POST['campus'];
$year=$_POST['year'];



$select =$con->query("SELECT * FROM   users where id='".$user_id."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $full_name=$rows['full_name'];   
    
}

$select =$con->query("SELECT * FROM   campus where id='".$campus."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $camp_name=$rows['camp_name'];   
    
}




$select =$con->query("SELECT * FROM   ayear where id='".$year."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $year_name=$rows['cur_ayear'];   
    
}
   
?>
<a href="?assign_to&userid=<?php echo $user_id; ?>&year=<?php echo $year; ?>&camp_id=<?php echo $campus; ?>&gdgddh">
<div class="row" style="font-size:18px; font-weight:bold">
        <div class="col-sm-11">
          <div class="well">
 
Assigning Course(s) to <?php echo $full_name;  ?>  in  <?php echo $camp_name;  ?> Campus for <?php echo $year_name;  ?> Academic Year 
          </div>
        </div>
</div>
</a>
<?php } ?>