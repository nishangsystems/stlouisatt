
        <div class="row">
        <div class="col-sm-12">  
 
 <h2><?PHP
  $campus_id=$_GET['camp_id'];
  $year_id=$_GET['year_id'];
  $prog_id=$_GET['prog_id'];
  $level_id=$_GET['level_id'];
  $sem_id=$_GET['sem'];
  $select =$con->query("SELECT * FROM   levels where id='".$level_id."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $level_name=$rows['level_name'];   
    
}

$select =$con->query("SELECT * FROM   campus where id='".$campus_id."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $camp_name=$rows['camp_name'];   
    
}

$select =$con->query("SELECT * FROM   settings_subtype where id='".$sem_id."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $sem_name=$rows['sub_name'];   
    
}

$select =$con->query("SELECT * FROM   ayear where id='".$year_id."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $ayear_name=$rows['cur_ayear'];   
    
}


$select =$con->query("SELECT * FROM   programs where id='".$prog_id."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $prog_name=$rows['prog_name'];   
    
}
 ?> 
 <?php echo $prog_name;  ?> <?php echo $level_name; ?> <?php echo $sem_name; ?> Courses for <?php echo $ayear_name; ?>
 for <?php echo $camp_name; ?> Campus
 <?php 


 $check_exits=$con->query("SELECT * FROM courses,prog_courses WHERE courses.id=prog_courses.course_id
 and prog_courses.sem_id='$sem_id' AND prog_courses.level_id='$level_id' AND prog_courses.prog_id='$prog_id' 
  ") 
        or die(mysqli_error($con));
        $i=1;
         $nums=$check_exits->num_rows;
 
 ?> Logbook Records </h2>     
   
 <table class="table .table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Course</th>
        <th>Status</th>
        <th>Credit Value</th>
        <th>Lecture Hours</th>
        <th># of Lessons</th>
        <th># of Lessons<br>
    Taught So far</th>
    <th>% Course Coverage</th>
    <th>Hours Used</th>
    <th>% Hours </th>    
    <th>Go to Logbook  </th>
        
        
      </tr>
    </thead>
    <tbody>
    <?php
   

			while($rows=$check_exits->fetch_assoc()){
	?>
  
      <tr>
        <td><?php echo $i++; ?></td>
        
         <td>
<?php echo $rows['course_title']; ?> / <?php echo $rows['course_code']; ?> </td>
         <td><?php echo $rows['status']; ?>   </td>
         <td><?php echo $rows['cv']; ?> </td>

         <td><?php echo $rows['lecture']; ?>   </td>
       
         <td><?php 
         $select =$con->query("SELECT * FROM   prog_courses,topics,sub_topics  where 
         prog_courses.id=topics.course_id AND topics.id=sub_topics.topic_id 
        
         AND topics.course_id='".$rows['id']."'
          ") or die(mysqli_error($con));
          $total_lessons= $select->num_rows;

          echo $total_lessons;
         ?> </td>

<td><?php 
    
        $select =$con->query("SELECT * FROM   prog_courses,topics,sub_topics_taught,sub_topics  
        where 
         prog_courses.id=topics.course_id AND topics.id=sub_topics.topic_id AND sub_topics_taught.year_id='$year_id'
         and sub_topics_taught.subtopic_id=sub_topics.id AND  prog_courses.id='".$rows['id']."'
          ") or die(mysqli_error($con));
          $lessons_taught=$select->num_rows;
          echo $lessons_taught;
         ?> </td>
         <td><?php
         if($total_lessons==0){
             echo "0 %";
         }
         else {
         $per_coverage=($lessons_taught/$total_lessons)*100;
          $per_coverage_val=number_format($per_coverage,2);

        

         ?> 
         <?php
            if($per_coverage_val<50){
                echo "<span style='color:#f00; font-weight:bold'>".$per_coverage_val."</span>";

            }
            else {
                echo "<span style='color:#000; font-weight:bold'>".$per_coverage_val."</span>";
            }

          ?> %
         
        <?php } ?></td>
        <td>

        <?php 
       
        $check_all=$con->query("SELECT SUM(TIMESTAMPDIFF(HOUR,  arrival,departure)) AS tim
         FROM prog_courses,teacher_att WHERE prog_courses.id=teacher_att.course_id AND 
             teacher_att.year_id='$year_id' 
AND departure IS NOT NULL AND prog_courses.id='".$rows['id']."'")  or die(mysqli_error($con));
               while($ro=$check_all->fetch_assoc()){
                   $total_hrs_used= $ro['tim'];
               }  
               
               if($total_hrs_used>$rows['lecture']){
                echo "<span style='color:#fff;padding:10px 20px;background:#F00;font-weight:bold'>".$total_hrs_used."</span>";
            }
            else {
              echo  $total_hrs_used;
            }
        
        
        ; ?> 
        </td>
        <td><?php
        if(empty($rows['lecture'])){
           $lecture_hours=1;
        }
        else {
           $lecture_hours=$rows['lecture'];
        }
        $per_hrs= ($total_hrs_used/$lecture_hours)*100;
        if($per_hrs==0){
            echo 0;
        }
        else if($per_hrs<50){
            echo "<span style='color:#f00; font-weight:bold'>".number_format($per_hrs,2)."</span>";
        }
        else {
            echo "<span style='color:#000; font-weight:bold'>".number_format($per_hrs,2)."</span>";
        }
        ?> %</td>
        <td><a href="?view_thiscourse&year_id=<?php echo $year_id; ?>&course_id=<?php echo $rows['id']; ?>&link=Viewing <?php echo $rows['course_title']; ?> / <?php echo $rows['course_code']; ?>  Logbook Records" class="btn btn-primary btn-xs">View Logbook </a></td>
        
        
      </tr>
      <?php }  ?>
      

      
      
    </tbody>
  </table>
  
          </div>
        </div>
        
        