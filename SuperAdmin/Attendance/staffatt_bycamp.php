

<?php 
   $check=$con->query("SELECT * FROM  campus,campus_sub where campus.id='".$_GET['id']."'
   AND campus.id=campus_sub.campus_id  ") 
   or die(mysqli_error($con));
   while($rows=$check->fetch_assoc()){
    ?>
    <a href="?campus_checkin&camp_id=<?php echo base64_encode($rows['campus_id']); ?>&sub_camp=<?php echo base64_encode($rows['id']);?>">
<div class="row">
        <div class="col-sm-5">
          <div class="well">
          <?php echo $rows['camp_name'] ?> -  <?php echo $rows['name'] ?> 
            </div>
   </div>
   </div>
   </a>
            <?php } ?>
           