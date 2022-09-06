
        <div class="row">
        <div class="col-sm-12">  
 
 <h2 style="color:#00F"> <?php 
 $id=$_GET['id'];
 

  $check_exits=$con->query(" SELECT * FROM  courses,campus,users,programs,levels,prog_courses,teacher_courses,teacher_att
  WHERE   teacher_att.id='$id'  AND teacher_att.year_id='$year_id' AND teacher_att.teacher_id='$user_id'
  and   teacher_att.course_id=prog_courses.id  AND courses.id=prog_courses.course_id 
  AND teacher_att.course_id=prog_courses.id 
  AND teacher_courses.course_id=prog_courses.id 
  AND prog_courses.level_id=levels.id AND users.id=teacher_courses.teacher_id AND prog_courses.prog_id=programs.id AND 
  prog_courses.course_id=courses.id
   ORDER BY teacher_att.id DESC ")  or die(mysqli_error($con));


        $i=1;
         $nums=$check_exits->num_rows;
 
 ?></u></span> </h2>     
          
 <table class="table .table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Course</th>
        <th>Topic</th>
        <th>Sub Topic</th>
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
         <td><?php echo $rows['course_title']; ?>/<br>
        <span style="color:#00f"> <?php echo $rows['prog_name']; ?>/</span><br>
        <span style="color:#f00"> <?php echo $rows['level_name']; ?></span>
      </td>
      <td><?php $check=$con->query("SELECT * FROM  topics where id='".$rows['topic_id']."' ") 
       or die(mysqli_error($con));
      
       while($row=$check->fetch_assoc()){
         echo  $topic=$row['topic'];
       } ?></td>

<td><?php echo $rows['content']; ?>
      
      </td>

      
      <td><?php 
         if(empty($rows['arrival'])){

         }
         else {
        echo (new DateTime($rows['arrival']))->format("d-m-Y");
        
        ?><br>
        <span style="color:#00f;font-weight:bold"> <?php 
         echo (new DateTime($rows['arrival']))->format("H:i");
         ?></span>
         <?php  } ?>
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
         
         <td><?php
         $now = new DateTime($rows['arrival']);
         $future_date = new DateTime($rows['departure']);
         
         $interval = $future_date->diff($now);
         if(empty($rows['departure'])){
            echo NULL;
         }
         else {
         echo  $interval->format("%h") ;
         }
         ?></td>
     
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  
          </div>
        </div>
     