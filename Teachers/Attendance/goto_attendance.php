<?php
if(isset($_POST['save'])){
 $course_id=$_POST['course'];
 $date=$_POST['date'];
 $starts=$_POST['time'];
 $ends=$_POST['ends'];
 $campus_id=$_POST['campus_id'];

 $check=$con->query("SELECT * FROM  courses,campus,users,programs,levels,prog_courses,teacher_courses 
 WHERE  teacher_courses.course_id='".$course_id."' AND campus.id=teacher_courses.campus_id
 AND teacher_courses.course_id=prog_courses.id AND teacher_courses.campus_id='$campus_id'
 AND prog_courses.level_id=levels.id AND users.id=teacher_courses.teacher_id AND prog_courses.prog_id=programs.id AND 
 prog_courses.course_id=courses.id") 
        or die(mysqli_error($con));
       
        while($rows=$check->fetch_assoc()){
         
   
?>
<a href="?taking_att&campus_id=<?php echo $rows['campus_id']; ?>&courseid=<?php echo $course_id; ?>&date=<?php echo $date; ?>&starts=<?php echo $starts; ?>&ends=<?php echo $ends; ?> &gdgddh">
<div class="row" style="font-size:18px; font-weight:bold">
        <div class="col-sm-11">
          <div class="well">
          
Proceed to Attendance for  <?php echo $rows['course_title'];  ?>  in  <?php echo $rows['camp_name'];  ?> Campus on <?php echo date('l d-m-Y', strtotime($date));  ?> for <?php echo $cur_ayear;  ?> Academic Year 
 <br> that starts from <?php echo $starts; ?> till <?php echo $ends; ?>     
          </div>
        </div>
</div>
</a>
<?php }  } ?>