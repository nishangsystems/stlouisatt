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
   
    <?php  
    $course_id=$_GET['courseid'];
    $date=$_GET['date'];
    $starts=$_GET['starts'];
    $ends=$_GET['ends'];
    $check=$con->query("SELECT * FROM  courses,campus,users,programs,levels,prog_courses,teacher_courses 
    WHERE  teacher_courses.course_id='".$course_id."' 
    AND teacher_courses.course_id=prog_courses.id 
    AND prog_courses.level_id=levels.id AND users.id=teacher_courses.teacher_id AND prog_courses.prog_id=programs.id AND 
    prog_courses.course_id=courses.id") 
           or die(mysqli_error($con));
          
           while($rows=$check->fetch_assoc()){
               $course_title=$rows['course_title'];
               $course_code=$rows['course_code'];
               $lecturer=$rows['full_name'];
               
           }
    $check_exits=$con->query("SELECT * FROM  student_att WHERE course_id='$course_id' 
 AND starts='$starts' AND ends='$ends' AND date='$date'
 ORDER BY id DESC") 
        or die(mysqli_error($con));
        $i=1;
     echo    $nums=$check_exits->num_rows; ?>




<h3>Attendance Sheet for : <?php echo $course_title; ?> (<?php echo $course_code; ?>)<br>
    Lecturer:<?php echo $lecturer; ?><br>
    Date: <?php echo (new DateTime($date))->format(" l d-m-Y");; ?>   <?php echo $starts;  ?> - <?php echo $ends; ?>
</h3>

    <table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Matricule</th>
        <th>Name</th>
       
        <th>Punch In Time</th>
        
        
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
        
         <td><?php echo $matric=$rows['time']; ?>
            </td>
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  
