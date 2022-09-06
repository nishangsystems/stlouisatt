
 <?php
$course_id=$_GET['courseid'];
$date=$_GET['date'];
$starts=$_GET['starts'];
$ends=$_GET['ends'];
$campus_id=$_GET['campus_id'];

$check=$con->query("SELECT * FROM  courses,users,programs,levels,prog_courses,teacher_courses 
WHERE  teacher_courses.course_id='".$_GET['courseid']."'  AND teacher_courses.campus_id='".$_GET['campus_id']."' 
AND campus.id=teacher_courses.campus_id
AND teacher_courses.course_id=prog_courses.id AND teacher_courses.year_id='$year_id' 
AND prog_courses.level_id=levels.id AND users.id=teacher_courses.teacher_id AND prog_courses.prog_id=programs.id AND 
prog_courses.course_id=courses.id") 
       or die(mysqli_error($con));
      
       while($rows=$check->fetch_assoc()){
      
        
       
?>


<h3>
Taking Attendance for  <?php echo $rows['course_title'];  ?>  in  <?php echo $rows['camp_name'];  ?> Campus for <?php echo $cur_ayear;  ?> Academic Year 
       </h3> 
<?php } ?>

<div class="row">
        <div class="col-sm-5">
          <div class="well">
           <form role="form" method="post" action="">
            
              <div class="form-group">
              

            <div class="form-group">
                <label for="pwd">Scan Card:</label>
                <input type="text" name="matric" required="required"  
                 class="form-control" autofocus autocomplete="off" id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
              </div>

					
            </div>
         
            
        </form>
          </div>
        </div>
        <div class="row">
        <div class="col-sm-6">  
 <?php TakeAtt($course_id,$year_id,$campus_id,$user_id,$date,$starts,$ends);
       DeleteAtt($course_id,$year_id,$campus_id,$user_id,$date,$starts,$ends);
  ?>  
 <h2>Total Present today <?php echo date('l d-m-Y', strtotime($date)); 
 $check_exits=$con->query("SELECT * FROM  student_att WHERE course_id='$course_id' 
 AND teacher_id='$user_id' AND year_id='$year_id' AND campus_id='$campus_id' AND date='$date'
 ORDER BY id DESC") 
        or die(mysqli_error($con));
        $i=1;
         $nums=$check_exits->num_rows;
 
 ?> From <?php  echo $starts;  ?> to <?php echo $ends; ?> <span class="label label-primary"><?php echo $nums; ?></span></h2>     
   <a href="../Teachers/Attendance/print.php?courseid=<?php echo $course_id;  ?>&campus_id=<?php echo $campus_id; ?>&date=<?php echo $date; ?>&starts=<?php echo $starts; ?>&ends=<?php echo $ends; ?>&gdgddh" target="_new" class="btn btn-primary btn-xs">Print Attendance Sheet</a>       
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Matricule</th>
        <th>Name</th>
       
        <th>Action</th>
        
        
      </tr>
    </thead>
    <tbody>
    <?php
   

			while($rows=$check_exits->fetch_assoc()){
	?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $matric=$rows['matricule']; ?>
      </td>
        <td><?php 
        $check=$dbcon->query("SELECT * FROM  student_infos WHERE matricule='$matric' order by id DESC LIMIT 1  ") 
        or die(mysqli_error($dbcon));
              
               while($row=$check->fetch_assoc()){
                   echo $name=$row['firstname'];
               }        
        
        
        ; ?></td>
       

         
         </td>
         <td>
         <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you wish to Delete <?php echo $name; ?>')"
          href="?taking_att&courseid=<?php echo $_GET['courseid']; ?>&campus_id=<?php echo $campus_id; ?>&id=<?php echo $rows['id']; ?>&date=<?php echo $_GET['date']; ?>&starts=<?php echo $_GET['starts']; ?>&ends=<?php echo $_GET['ends']; ?>&gdgddh">
        Delete</a>
            </td>
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  
          </div>
        </div>
      </div>
     
