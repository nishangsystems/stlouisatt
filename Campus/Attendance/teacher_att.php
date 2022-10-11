
 <?php

$check=$con->query("SELECT * FROM  courses,campus,users,programs,levels,prog_courses,teacher_courses 
WHERE  teacher_courses.id='".$_GET['course']."'  AND teacher_courses.campus_id='".$_GET['camp_id']."'
AND teacher_courses.course_id=prog_courses.id  AND teacher_courses.teacher_id='".$_GET['userid']."'
AND teacher_courses.year_id='".$_GET['year']."' AND campus.id=teacher_courses.campus_id
AND prog_courses.level_id=levels.id AND users.id=teacher_courses.teacher_id AND prog_courses.prog_id=programs.id AND 
prog_courses.course_id=courses.id") 
       or die(mysqli_error($con));
       echo $check->num_rows;
      
       while($rows=$check->fetch_assoc()){
        $teacher_id=$rows['teacher_id'];
       
?>


<h3>
Recording <Span style="color:#f00"><?php echo $teacher=$rows['full_name']; ?></span> Attendance for  <?php echo $rows['course_title'];  ?>  in  <?php echo $rows['camp_name'];  ?> Campus for <?php echo $cur_ayear;  ?> Academic Year 
       </h3> 
 <?php SaveteacherStart($rows['teacher_id'],$rows['course_id'],$campus_id=$rows['campus_id'],$year_id=$rows['year_id'],$admin_id); ?>
 <?php    Departure($_GET['userid'],$_GET['course'],$_GET['year'],$_GET['camp_id']); ?>
      <?php    DeleteTime($_GET['userid'],$_GET['course'],$_GET['year'],$_GET['camp_id']); ?>


 <div class="row">
        <div class="col-sm-5">
          <div class="well">
           <form role="form" method="post" action="">
            
              <div class="form-group">
                <label for="pwd">COURSE:</label>
                <select  name="course" class="chosen-select form-control" 
                id="form-field-select-4" data-placeholder="Choose a course...">
                <option value="<?php echo $_GET['course']; ?>"><?php echo $rows['course_title']; ?></option>
              		
															</select>


            </div>

            
            <div class="form-group">
                <label for="pwd">Lecturer :</label>
                <input type="text" name="lecture" required="required"  value="<?php echo $rows['full_name']; ?>" 
                 class="form-control" id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
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

             
              <?php 
         if(isset($_GET['depart'])){

         ?>
         <div class="form-group">
                <label for="pwd">Class Ended At:</label>
                <input type="time" name="ends" required="required" value="<?php echo date('G:i:s'); ?>"  
                 class="form-control" id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
              </div>

         <?php } else { ?>

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
		<?php } ?>
					
         
              <?php
              if(isset($_GET['depart'])){
              ?>
              
              <div class="checkbox">
				<button type="submit" class="btn btn-success" name="save_updates">Submit Departure</button>

              </div>
              <?php } else { ?>

                
              <div class="checkbox">
				<button type="submit" class="btn btn-primary" name="save_record">Submit Arrival</button>

              </div>

                <?php } ?>
              
        </form>
          </div>
        </div>
        <div class="row">
        <div class="col-sm-6">  
 
 <h2>Your attendance History <?php 

$campus_id=$_GET['camp_id'];
 $check_exits=$con->query("SELECT * FROM  courses,users,programs,levels,prog_courses,teacher_courses,teacher_att 
WHERE   teacher_att.teacher_id='$teacher_id'  AND teacher_att.year_id='$year_id' 
and  courses.id=prog_courses.course_id  AND teacher_att.campus_id='$campus_id'
AND teacher_att.course_id=prog_courses.id 
AND teacher_courses.course_id=prog_courses.id  
AND prog_courses.level_id=levels.id AND users.id=teacher_courses.teacher_id AND prog_courses.prog_id=programs.id 
GROUP BY teacher_att.course_id,teacher_att.arrival
 ORDER BY teacher_att.id DESC") 
        or die(mysqli_error($con));
        $i=1;
         $nums=$check_exits->num_rows;
 
 ?> </h2>     
          
 <table class="table .table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Course</th>
        <th>Arrival</th>
        <th>Departure</th>
       
        <th>Action</th>
        
        
      </tr>
    </thead>
    <tbody>
    <?php
   

			while($rows=$check_exits->fetch_assoc()){
	?>
      <tr>
        <td><?php echo $i++; ?></td>
         <td><?php echo $rows['course_title']; ?>/<br>
        <span style="color:#00f"> <?php echo $rows['prog_name']; ?>/</span><br>
        <span style="color:#f00"> <?php echo $rows['level_name']; ?></span>
      </td>
        <td><?php 
        echo (new DateTime($rows['arrival']))->format("d-m-Y");
        ?><br>
         <span style="color:#00f;font-weight:bold"> <?php 
         echo (new DateTime($rows['arrival']))->format("H:i");
         ?></span>
      
      </td>
         <td><?php 
         if(empty($rows['departure'])){

         }
         else {
        echo (new DateTime($rows['departure']))->format("d-m-Y");
        
        ?><br>
        <span style="color:#00f;font-weight:bold"> <?php 
         echo (new DateTime($rows['departure']))->format("H:i");
         ?></span>
         <?php  } ?>
      </td>
       

         
         </td>
         <td>
         <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you wish to Delete <?php echo $teacher; ?> Hours for <?php echo $rows['course_title']; ?>  ')" 
         href="?teacher_att&del=<?php echo $rows['id']; ?>&course=<?php echo $_GET['course']; ?>&year=<?php echo $_GET['year']; ?>&userid=<?php echo $_GET['userid']; ?>&camp_id=<?php echo $_GET['camp_id']; ?>&gdgddh">
        Delete</a>
        <?php 
         if(empty($rows['departure'])){

         ?>
        <a class="btn btn-primary btn-xs"  href="?teacher_att&depart=<?php echo $rows['id']; ?>&course=<?php echo $_GET['course']; ?>&year=<?php echo $_GET['year']; ?>&userid=<?php echo $_GET['userid']; ?>&camp_id=<?php echo $_GET['camp_id']; ?>&gdgddh">
        Departure</a>
        <?php } else {} ?>
            </td>
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  
          </div>
        </div>
        
         <?php } ?>
     