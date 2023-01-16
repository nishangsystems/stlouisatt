

<?php 


 $camp_id=base64_decode($_GET['camp_id']);
$sub_camp_id=base64_decode($_GET['sub_camp']);
   $check=$con->query("SELECT * FROM  campus,campus_sub where campus_sub.id='".$sub_camp_id."'
   AND campus.id=campus_sub.campus_id  ") 
   or die(mysqli_error($con));
   while($rows=$check->fetch_assoc()){
    ?>
    <h1>Checking a Staff into  <?php echo $rows['camp_name'] ?> -  <?php echo $rows['name'] ?>  today <?php echo date('l d-m-Y'); ?></h1>
    
    <?php if(isset($_GET['depart'])){ ?>

      <div class="row">
    <h1>Staff Check out </h1>
        <div class="col-sm-3">
          <div class="well">
           <form role="form" method="post" action="">
            
              <div class="form-group">
              

            <div class="form-group">
                <label for="pwd">Scan Card to Check out:</label>
                <input type="text" name="matric" required="required"  
                 class="form-control" autocomplete="off" autofocus id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
              </div>

					
            </div>
   
  

          



            </form>
          </div>
        </div>



  <?php }  else { ?>
    <div class="row">
    <h1>Staff Check in </h1>
        <div class="col-sm-3">
          <div class="well">
           <form role="form" method="post" action="">
            
              <div class="form-group">
              

            <div class="form-group">
                <label for="pwd">Scan Card:</label>
                <input type="text" name="matric" required="required"  
                 class="form-control" autocomplete="off" autofocus id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
              </div>

					
            </div>
   
  

          



            </form>
          </div>
        </div>

        <?php } } ?>
        <div class="row">
        <div class="col-sm-8">  
 <?php if(isset($_POST['matric'])) {
   $user_name=$_POST['matric'];
   $check=$con->query("SELECT * FROM  users where user_name='$user_name'  ") 
   or die(mysqli_error($con));
   $i=1;
   $count=$check->num_rows;
   if($count<1){
     echo "<script>alert('ERROR. $user_name does not Exist in the system')</script>";
   }
   else{
   while($rows=$check->fetch_assoc()){
     $user_id= $rows['id'];
     $full_name=$rows['full_name'];
     
   }
   ?>   
   <h2><?php echo $full_name; ?>'s  <?php echo $cur_ayear; ?> Attendance</h2>  
   
   
   <?php  StaffCheckin($user_id,$sub_camp_id,$camp_id,$year_id,$admin_id); ?>
   <?php    DeleteStaffCheckin(); ?>
   
  <?php }  }   ?>
          
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Name</th>
        <th>Checked in</th>
        <th>Campus</th>
        <th>Checked Out</th>
        <th>Campus</th>
        <th>Action</th>
       
      </tr>
    </thead>
    <tbody>
    <?php
 
 	$check=$con->query("SELECT * FROM  users,campus,campus_sub,staff_att WHERE users.id=staff_att.teacher_id 
   
  AND staff_att.campus_id='$camp_id'  AND campus.id=campus_sub.campus_id
  AND campus.id=staff_att.campus_id and campus_sub.id=staff_att.campus_id order by staff_att.id DESC  ") 
			or die(mysqli_error($con));
     $count=$check->num_rows;
			$i=1;
			while($rows=$check->fetch_assoc()){
	?>
  
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $teacher=$rows['full_name']; ?>
      
      </td>
        <td><?php 
        echo (new DateTime($rows['arrival']))->format("d-m-Y");
        ?><br>
         <span style="color:#00f;font-weight:bold"> <?php 
         echo (new DateTime($rows['arrival']))->format("H:i");
         ?></span></td>
        <td><?php echo $rows['name']; ?></td>
        <td><?php 
         if(empty($rows['departure'])){

         }
         else {
        echo (new DateTime($rows['departure']))->format("d-m-Y");
        
        ?><br>
        <span style="color:#00f;font-weight:bold"> <?php 
         echo (new DateTime($rows['departure']))->format("H:i");
         ?></span>
          <?php  } ?></td>

        <td><?php echo $rows['name']; ?></td>
         <td>
         <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you wish to Delete <?php echo $teacher; ?> Records Today   ')" 
         href="?campus_checkin&del=<?php echo $rows['id']; ?>&camp_id=<?php echo $_GET['camp_id'] ?>&sub_camp=<?php echo $_GET['sub_camp'] ?>&gdgddh&gdgddh">
        Delete</a>
        <?php 
         if(empty($rows['departure'])){

         ?>
        <a class="btn btn-primary btn-xs"  href="?campus_checkin&depart&camp_id=<?php echo $_GET['camp_id'] ?>&sub_camp=<?php echo $_GET['sub_camp'] ?>&gdgddh">
        Departure</a>
        <?php } else {} ?>
            </td>
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  
          </div>
        </div>
      </div>

      <?php

if(isset($_GET['del'])){
								
  $con= dbcon();
 $id=$_GET['del'];
  
    $check_exits=$con->query("DELETE FROM  staff_att   WHERE id='$id'
    ")  or die(mysqli_error($con));	
    echo "<script>alert('SUCCESSFULLY DELETED')</script>";
    echo '<meta http-equiv="Refresh" content="0; url=?campus_checkin&camp_id='.$_GET['camp_id'].'&sub_camp='.$_GET['sub_camp'].'&gdgddh">';


}

      ?>
     

           