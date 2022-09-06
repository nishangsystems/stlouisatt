
 <?php
$course_id=$_GET['course'];

$check=$con->query("SELECT * FROM  courses,prog_courses WHERE courses.id=prog_courses.course_id 
AND prog_courses.id='$course_id' ") 
       or die(mysqli_error($con));
      
       while($rows=$check->fetch_assoc()){
      
        
       
?>


<h3>
Attendance History for   <?php echo $rows['course_title'];  ?> (<?php echo $rows['course_code'];  ?>) for <?php echo $cur_ayear;  ?> Academic Year 
       </h3> 
<?php } ?>


        <div class="row">
        <div class="col-sm-12">  
  
 >  <?php 
 $check_exits=$con->query("SELECT * FROM  student_att WHERE course_id='$course_id' 
 AND teacher_id='$user_id' AND year_id='$year_id'  GROUP BY date,starts
 ORDER BY id DESC") 
        or die(mysqli_error($con));
        $i=1;
         $nums=$check_exits->num_rows;
 
 ?>     
          
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Day/Date</th>
        <th>Period</th>   
       
        <th>Action</th>
        
        
      </tr>
    </thead>
    <tbody>
    <?php
   

			while($rows=$check_exits->fetch_assoc()){
	?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo date('l d-m-Y', strtotime($rows['date'])); ?></td>
        <td><?php echo $rows['starts']; ?>-<?php echo $rows['ends']; ?></td>

         
         </td>
         <td>
         <a href="../Teachers/Reports/mystud_att.php?courseid=<?php echo $course_id;  ?>&ends=<?php echo $rows['ends']; ?>&starts=<?php echo $rows['starts']; ?>&date=<?php echo $rows['date']; ?>&id=<?php echo $user_id; ?>&gdgddh" target="_new" class="btn btn-primary btn-xs">Print Attendance Sheet</a>
            </td>
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  
          </div>
        </div>
      </div>
     
