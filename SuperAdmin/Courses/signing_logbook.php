
        <div class="row">
        <div class="col-sm-12">  
 
 <h2 style="color:#00F">MAIN TOPIC : <span style='color:#f00; '><u> <?php 
 $id=$_GET['id'];
 $check=$con->query("SELECT * FROM  topics where id='$id' ") 
       or die(mysqli_error($con));
      
       while($rows=$check->fetch_assoc()){
         echo  $topic=$rows['topic'];
       }

if($level==20){
 
  $check_exits=$con->query(" SELECT * FROM  teacher_att
  WHERE    teacher_att.year_id='$year_id' AND teacher_att.teacher_id='$user_id'
  AND teacher_att.course_id='".$_GET['course_id']."'
  ")  or die(mysqli_error($con));
}
else {
  
  /*$check_exits=$con->query(" SELECT * FROM  courses,users,programs,levels,prog_courses,teacher_courses,topics ,teacher_att
  WHERE   topics.id='$id'  AND teacher_att.year_id='$year_id' AND teacher_att.teacher_id='$user_id'
  and  courses.id=prog_courses.course_id AND teacher_att.course_id=teacher_courses.course_id
  AND teacher_att.course_id=prog_courses.id  AND topics.course_id=prog_courses.id 
  AND teacher_courses.course_id=prog_courses.id AND courses.id=prog_courses.course_id
  AND prog_courses.level_id=levels.id AND users.id=teacher_courses.teacher_id AND prog_courses.prog_id=programs.id AND 
  prog_courses.course_id=courses.id 
   ORDER BY teacher_att.id DESC ")  or die(mysqli_error($con));
*/
 
  $check_exits=$con->query(" SELECT * FROM  teacher_att
  WHERE    teacher_att.year_id='$year_id' AND teacher_att.teacher_id='$user_id'
  AND teacher_att.course_id='".$_GET['course_id']."'
  ")  or die(mysqli_error($con));
}
        $i=1;
         $nums=$check_exits->num_rows;
 
 ?></u></span> </h2>     
          
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
         <td><?php 
         $query=$con->query("SELECT * FROM   courses,prog_courses,programs,levels  where 
         courses.id=prog_courses.course_id AND prog_courses.prog_id=programs.id AND 
         prog_courses.level_id=levels.id AND prog_courses.id='".$rows['course_id']."' ") 
                 or die(mysqli_error($con));
                 
         
            while($results=$query->fetch_assoc()){
            
         
         
         echo $results['course_title']; ?>/<br>
        <span style="color:#00f"> <?php echo $results['prog_name']; ?>/</span><br>
        <span style="color:#f00"> <?php echo $results['level_name']; ?></span>
      </td>
      <?php } ?>
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
        
        <a class="btn btn-primary btn-xs"  href="?sign_mylogbook&course_id=<?php echo $_GET['course_id']; ?>&time=<?php echo $rows['id']; ?>&topic=<?php echo $_GET['id']; ?>&gdgdgh">
        Sign Logbook at this time</a>
     
            </td>
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  
          </div>
        </div>
     