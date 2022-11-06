   <!-- page specific plugin styles -->
   <?php include '../../includes/functions.php'; ?>
    <!-- text fonts -->
    <link rel="stylesheet" href="../../assets/css/fonts.googleapis.com.css"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="../../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet"/>
    <![endif]-->
    <link rel="stylesheet" href="../../assets/css/ace-skins.min.css"/>
    <link rel="stylesheet" href="../../assets/css/ace-rtl.min.css"/>
    <link rel="stylesheet" href="../../assets/css/jquery-ui.min.css"/>
    <style>
        table{
            width: 100%;
            border-collapse:collapse;
            padding:5px 5px;
        }
        tr,td,th{
            border-collapse:collapse;
            border:1px solid#000;
            padding: 5px 5px;
        }
    </style>
    <img src="../../img/header.png">
   
    <h2><?PHP echo $_GET['name'];
  $user_id=$_GET['tid'];
  $year_id=$_GET['year_id'];
  $sem_id=$_GET['sem_id'];
  $campus_id=$_GET['camp_id'];
  $a = $con->query("SELECT  * from settings_subtype WHERE id='".$sem_id."'")   or die(mysqli_error($con));
              
  while($rows = $a->fetch_assoc()) {
      $sem_name=$rows['sub_name'];
  }
  $a = $con->query("SELECT  * from ayear WHERE id='".$sem_id."'")   or die(mysqli_error($con));
              
  while($rows = $a->fetch_assoc()) {
      $year_name=$rows['cur_ayear'];
  }
 ?> attendance History for <?php echo $sem_name; ?> <?php echo $year_name; ?> academic year
 <?php 


 $check_exits=$con->query("SELECT * FROM  prog_courses,campus,teacher_att 
 WHERE   teacher_att.teacher_id='$user_id'  AND teacher_att.year_id='$year_id' AND teacher_att.campus_id='$campus_id'
 AND teacher_att.campus_id=campus.id
 AND departure IS NOT NULL AND prog_courses.id=teacher_att.course_id AND  prog_courses.sem_id='$sem_id'
  ORDER BY teacher_att.id DESC") 
        or die(mysqli_error($con));
        $i=1;
         $nums=$check_exits->num_rows;
 
 ?> </h2>     
   
 <table >
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

      
      <tr style="background:#0840B0; color:#fff; font-weight:bold">
        <td></td>
        <td>NUMBER OF COURSES
      </td>
        <td><?php 
        $checks=$con->query("SELECT * FROM  users,teacher_att,prog_courses,courses WHERE 
        users.id=teacher_att.teacher_id AND prog_courses.course_id=courses.id 
        AND teacher_att.teacher_id='$user_id'  AND teacher_att.year_id='$year_id' AND teacher_att.campus_id='$campus_id'
AND departure IS NOT NULL AND prog_courses.sem_id='$sem_id' group by teacher_att.course_id ") 
        or die(mysqli_error($con));
        echo $checks->num_rows;
       
        
        ; ?></td>
        <td>Total Numbers of Hours</td>

<td style="color:#fff"><?php 
       
        $check_all=$con->query("SELECT SUM(TIMESTAMPDIFF(HOUR,  arrival,departure)) AS tim
         FROM prog_courses,teacher_att WHERE prog_courses.id=teacher_att.course_id AND 
            teacher_att.teacher_id='$user_id'  AND teacher_att.year_id='$year_id' AND teacher_att.campus_id='$campus_id'
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
        
        