
<?php

$check=$con->query("SELECT * FROM  courses,campus,users,programs,levels,prog_courses,teacher_courses 
WHERE  teacher_courses.course_id='".$_GET['course']."'  AND teacher_courses.year_id='$year_id'
AND teacher_courses.course_id=prog_courses.id AND teacher_courses.teacher_id='$user_id' AND teacher_courses.campus_id='".$_GET['campus_id']."' 
AND campus.id=teacher_courses.campus_id
AND prog_courses.level_id=levels.id AND users.id=teacher_courses.teacher_id AND prog_courses.prog_id=programs.id AND 
prog_courses.course_id=courses.id") 
       or die(mysqli_error($con));
   
      
       while($rows=$check->fetch_assoc()){
        
       
?>


<h3>
Taking Attendance for  <?php echo $rows['course_title'];  ?>  in  <?php echo $rows['camp_name'];  ?> Campus for <?php echo $cur_ayear;  ?> Academic Year 
       </h3> 
 
 <div class="row">
        <div class="col-sm-5">
          <div class="well">
           <form role="form" method="post" action="?goto_attendance">
           <input type="hidden" name="campus_id"  value="<?php echo $rows['campus_id']; ?>" 
                 class="form-control" id="pwd" >
            
              <div class="form-group">
                <label for="pwd">COURSE:</label>
                <select  name="course" class="chosen-select form-control" 
                id="form-field-select-4" data-placeholder="Choose a course...">
                <option value="<?php echo $_GET['course']; ?>"><?php echo $rows['course_title']; ?></option>
              		
															</select>


            </div>

            <div class="form-group">
                <label for="pwd">Program Name :</label>
                <input type="text" name="lecture" required="required"  value="<?php echo $rows['prog_name']; ?>" 
                 class="form-control" id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
              </div>

              <div class="form-group">
                <label for="pwd">Level:</label>
                <input type="text" name="tutorials" required="required" value="<?php echo $rows['level_name']; ?>" 
                 class="form-control" id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
              </div>

              <div class="form-group">
                <label for="pwd">Date:</label>
                <input type="date" name="date" required="required" value="<?php echo date('Y-m-d'); ?>"  
                 class="form-control" id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
              </div>


              <div class="form-group">
                <label for="pwd">Class Starts At:</label>
                <input type="time" name="time" required="required" value="<?php echo date('G:i:s'); ?>"  
                 class="form-control" id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
              </div>


              <div class="form-group">
                <label for="pwd">Class Ends At:</label>
                <input type="time" name="ends" required="required" value="<?php echo date('G:i:s'); ?>"  
                 class="form-control" id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
              </div>
					
         
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
              
        </form>
          </div>
        </div>
        <div class="row">
        <div class="col-sm-6">  
        
         <?php } ?>