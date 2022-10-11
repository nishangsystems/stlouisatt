<div class="row">
        <div class="col-sm-5">
          <div class="well">
           <form role="form" method="post" action="">
            
              <div class="form-group">
              

            <div class="form-group">
                <label for="pwd">Scan Card:</label>
                <input type="text" name="matric" required="required"  
                 class="form-control" autocomplete="off" id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
              </div>

					
            </div>
            <!--
              <?php
              if(isset($_GET['edit'])){
              ?>
              
              <div class="checkbox">
				<button type="submit" class="btn btn-success" name="save_updates">Save Update</button>

              </div>
              <?php } else { ?>

                
              <div class="checkbox">
				<button type="submit" class="btn btn-primary" name="save">Submit</button>

              </div>

                <?php } ?>
              ------>
        </form>
          </div>
        </div>
        <div class="row">
        <div class="col-sm-6">  
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
   <h2><?php echo $full_name; ?>'s  <?php echo $cur_ayear; ?> Courses</h2>   
          
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>course Title</th>
        <th>Course Code</th>
        <th>Campus</th>
        <th>Action</th>
       
      </tr>
    </thead>
    <tbody>
    <?php
    $campus_id=$_GET['id'];
   $cur_year_id;
 	$check=$con->query("SELECT * FROM  courses,programs,levels,campus,prog_courses,teacher_courses 
     WHERE teacher_courses.teacher_id='$user_id' AND teacher_courses.year_id='$cur_year_id'
     AND  teacher_courses.course_id=prog_courses.id 
     AND prog_courses.level_id=levels.id AND teacher_courses.campus_id='$campus_id' and prog_courses.prog_id=programs.id AND 
     prog_courses.course_id=courses.id  AND campus.id=teacher_courses.campus_id ") 
			or die(mysqli_error($con));
     $count=$check->num_rows;
			$i=1;
			while($rows=$check->fetch_assoc()){
	?>
  
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $rows['course_title']; ?>
        <span style="color:#00f">/ <?php echo $rows['prog_name']; ?></span>
        <span style="color:#f00">/ <?php echo $rows['level_name']; ?></span>
      </td>
        <td><?php echo $rows['course_code']; ?></td>
        <td><?php echo $rows['camp_name']; ?></td>

        
         <td>
         <a class="btn btn-primary btn-xs" href="?teacher_att&userid=<?php echo $rows['teacher_id']; ?>&course=<?php echo $rows['id']; ?>&year=<?php echo $year_id;  ?>&camp_id=<?php echo $rows['campus_id']; ?>&gdgddh">
        Record Attendance</a>
            </td>
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  <?php }  }   ?>
  
          </div>
        </div>
      </div>
     
