
        <div class="row">
        <div class="col-sm-12">  
        
          
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>course Title</th>
        <th>Course Code</th>
       
        <th>Lecture name</th>
        <th>Lecture<br>Hours</th>
        <th>Tutorials<br>Hours</th>
        <th>Practical<br>Hours</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
    $year_id=$_GET['yearid'];
    $course_id=$_GET['course_id'];
    $campus_id=$_GET['campusid'];
 	$check=$con->query("SELECT * FROM  courses,users,programs,levels,prog_courses,teacher_courses 
     WHERE  teacher_courses.year_id='$year_id' AND teacher_courses.course_id='$course_id'
     AND teacher_courses.campus_id='$campus_id' AND teacher_courses.course_id=prog_courses.id
     AND prog_courses.level_id=levels.id AND users.id=teacher_courses.teacher_id AND prog_courses.prog_id=programs.id AND 
     prog_courses.course_id=courses.id  ") 
			or die(mysqli_error($con));
            echo $check->num_rows;
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
        <td><?php echo $rows['full_name']; ?></td>

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
       
            </td>
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  
          </div>
        </div>
      </div>
     

      