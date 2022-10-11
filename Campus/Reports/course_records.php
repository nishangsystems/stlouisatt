
        <div class="row">
        <div class="col-sm-12">  
 
 <h2><?PHP echo $_GET['name'];
  $user_id=$_GET['tid'];
  $year_id=$_GET['year_id'];
  $sem_id=$_GET['sem_id'];
  $a = $con->query("SELECT  * from settings_subtype WHERE id='".$sem_id."'")   or die(mysqli_error($con));
              
  while($rows = $a->fetch_assoc()) {
      $sem_name=$rows['sub_name'];
  }
  $a = $con->query("SELECT  * from ayear WHERE id='".$sem_id."'")   or die(mysqli_error($con));
              
  while($rows = $a->fetch_assoc()) {
      $year_name=$rows['cur_ayear'];
  }
 ?> attendance History for <?php echo $sem_name; ?> <?php echo $year_name; ?> academic year
 <a href="../SuperAdmin/Reports/print_att.php?tid=<?php echo $user_id; ?>&name=<?php echo $_GET['name']; ?>&year_id=<?php echo $year_id; ?>&sem_id=<?php echo $sem_id; ?>&hdhdh" target="_new" class="btn btn-primary btn-xs">Print a Copy</a>
 <?php
 
 $check_exits=$con->query("SELECT * FROM  prog_courses,teacher_att 
 WHERE   teacher_att.teacher_id='$user_id'  AND teacher_att.year_id='$year_id' 
 AND departure IS NOT NULL AND prog_courses.id=teacher_att.course_id AND  prog_courses.sem_id='$sem_id'
  ORDER BY teacher_att.id DESC")    or die(mysqli_error($con));


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
       
        <th># of Hours</th>
        
        
      </tr>
    </thead>
    <tbody>
    <?php
   

			while($rows=$check_exits->fetch_assoc()){
	?>
      <tr>
        <td><?php echo $i++; ?></td>
        <?php
        $check_all=$con->query("SELECT * from courses,prog_courses,programs,levels 
        where courses.id=prog_courses.course_id AND prog_courses.level_id=levels.id AND 
        prog_courses.prog_id=programs.id AND prog_courses.id='".$rows['course_id']."'
        ")  or die(mysqli_error($con));
              while($row=$check_all->fetch_assoc()){
            ?>    
         <td><?php echo $row['course_title']; ?>/<br>
        <span style="color:#00f"> <?php echo $row['prog_name']; ?>/</span><br>
        <span style="color:#f00"> <?php echo $row['level_name']; ?></span>
      </td>
      <?php } ?>

        <td><?php 
        echo (new DateTime($rows['arrival']))->format("l d-m-Y");
        ?><br>
         <span style="color:#00f;font-weight:bold"> <?php 
         echo (new DateTime($rows['arrival']))->format("H:i");
         ?></span>
      
      </td>
         <td><?php 
         if(empty($rows['departure'])){

         }
         else {
        echo (new DateTime($rows['departure']))->format("l d-m-Y");
        
        ?><br>
        <span style="color:#00f;font-weight:bold"> <?php 
         echo (new DateTime($rows['departure']))->format("H:i");
         ?></span>
         <?php  } ?>
      </td>
         <td><?php
         $now = new DateTime($rows['arrival']);
         $future_date = new DateTime($rows['departure']);
         
         $interval = $future_date->diff($now);
         
         echo  $interval->format("%h") ;
         
         ?></td>
      </tr>
      <?php }  ?>


      <tr style="background:#0840B0; color:#fff; font-weight:bold">
        <td></td>
        <td>NUMBER OF COURSES
      </td>
        <td><?php 
        $checks=$con->query("SELECT * FROM  users,teacher_att,prog_courses,courses WHERE 
        users.id=teacher_att.teacher_id AND prog_courses.course_id=courses.id 
        AND teacher_att.teacher_id='$user_id'  AND teacher_att.year_id='$year_id' 
AND departure IS NOT NULL AND prog_courses.sem_id='$sem_id' group by teacher_att.course_id ") 
        or die(mysqli_error($con));
        echo $checks->num_rows;
       
        
        ; ?></td>
        <td>Total Numbers of Hours</td>

<td style="color:#fff"><?php 
       
        $check_all=$con->query("SELECT SUM(TIMESTAMPDIFF(HOUR,  arrival,departure)) AS tim
         FROM prog_courses,teacher_att WHERE prog_courses.id=teacher_att.course_id AND 
            teacher_att.teacher_id='$user_id'  AND teacher_att.year_id='$year_id' 
AND departure IS NOT NULL AND prog_courses.sem_id='$sem_id'")  or die(mysqli_error($con));
               while($ro=$check_all->fetch_assoc()){
                 echo   $ro['tim'];
               }        
        
        
        ; ?> Hours</td>
       
      </tr>
      
      
    </tbody>
  </table>
  
          </div>
        </div>
        
        