<?php
if(isset($_POST['save'])){
 $level=$_POST['level'];
$campus=$_POST['campus'];
$seqtype=$_POST['country'];
$sem=$_POST['state'];

$prog_id=$_POST['prog_id'];


$select =$con->query("SELECT * FROM   levels where id='".$level."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $level_name=$rows['level_name'];   
    
}

$select =$con->query("SELECT * FROM   campus where id='".$campus."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $camp_name=$rows['camp_name'];   
    
}

$select =$con->query("SELECT * FROM   settings_subtype where id='".$sem."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $sem_name=$rows['sub_name'];   
    
}


$select =$con->query("SELECT * FROM   programs where id='".$prog_id."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $prog_name=$rows['prog_name'];   
    
}
   
?>
<a href="?saving_subj&sem=<?php echo $sem; ?>&sem_type=<?php echo $seqtype; ?>&prog_id=<?php echo $prog_id;  ?>&level_id=<?php echo $level; ?>&camp_id=<?php echo $campus; ?>&gdgddh">
<div class="row" style="font-size:18px; font-weight:bold">
        <div class="col-sm-11">
          <div class="well">
 
Setting up <?php echo $prog_name;  ?> <?php echo $sem_name;  ?> Subjects for <?php echo $level_name;  ?> Programs in <?php echo $camp_name;  ?> Campus 
          </div>
        </div>
</div>
</a>
<?php } ?>