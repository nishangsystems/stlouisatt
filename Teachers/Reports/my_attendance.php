
        <div class="row">
        <div class="col-sm-12">  
 
 <h2>Your attendance History <?php 

$course_id=$_GET['course'];
 $check_exits=$con->query(" SELECT * FROM  campus,teacher_att 
WHERE   teacher_att.teacher_id='$user_id' AND campus.id=teacher_att.campus_id  AND teacher_att.year_id='$year_id' AND teacher_att.course_id='$course_id'
AND departure IS NOT NULL

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
       
        <th># of Hours</th>
        <th>Campus</th>
        
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
         <td><?php echo $rows['camp_name']; ?></td>
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  
          </div>
        </div>
        
        