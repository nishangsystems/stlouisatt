<div class="alert alert-info">
   All Your Subjects this <strong><?php echo $cur_ayear; ?></strong>
</div>


<table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>course Title</th>
        <th>Course Code</th>
       
        <th>Campus</th>
        <th>Period</th>
        <th>Lecture<br>Hours</th>
        <th>Tutorials<br>Hours</th>
        <th>Practical<br>Hours</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
    
 	$check=$con->query("SELECT * FROM  courses,campus,users,programs,levels,prog_courses,teacher_courses 
     WHERE  teacher_courses.year_id='$year_id' AND teacher_courses.teacher_id='$user_id'
     AND teacher_courses.course_id=prog_courses.id AND campus.id=teacher_courses.campus_id
     AND prog_courses.level_id=levels.id AND users.id=teacher_courses.teacher_id AND prog_courses.prog_id=programs.id AND 
     prog_courses.course_id=courses.id  ") 
			or die(mysqli_error($con));
           
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
        <td><?php
        
        $checks=$con->query("SELECT * FROM  settings_subtype,settings_type,prog_courses 
        WHERE  prog_courses.sem_id=settings_subtype.id AND prog_courses.type_id=settings_type.id  
        AND prog_courses.id='".$rows['course_id']."'    ") 
               or die(mysqli_error($con));
              
               while($row=$checks->fetch_assoc()){
               echo    $sem=$row['sub_name'];
               }
        
        ?></td>

          <td>
          <span style="color:#00f; font-weight:bold"> <?php
          if(empty($rows['lectures'])){
              echo 0;

          } 
          else {
              echo $rows['lectures'];
           } ?></span> in    
          <?php 
          echo $rows['lecture']; ?></td>

          <td>
          <span style="color:#00f; font-weight:bold"> <?php 
           if(empty($rows['tutorial'])){
            echo 0;

        } 
        else {
            echo $rows['tutorial'];
         } ?></span> in     
          <?php echo $rows['tutorials']; ?></td>

          <td>
          <span style="color:#00f; font-weight:bold"> <?php 
            if(empty($rows['practicals'])){
            echo 0;

           } 
           else {
          echo $rows['practicals']; 
           }?></span> in   
          <?php echo $rows['practical']; ?></td>
          <td>
              <a href="?stud_attendance&course=<?php echo $rows['course_id']; ?>&nsiahnsnsg" class="btn btn-success btn-xs">Students  Attendance</a>
                                                        
            </td>
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>