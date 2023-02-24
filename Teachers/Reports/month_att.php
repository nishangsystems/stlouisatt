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
  $course_id=$_POST['course'];
   $month=$_POST['month'];
    $year=$_POST['year'];
    
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
    GROUP BY student_id ORDER BY id DESC") 
        or die(mysqli_error($con));
        $i=1;
     echo    $nums=$check_exits->num_rows; ?>




<h3>Attendance Sheet for : <?php echo $course_title; ?> (<?php echo $course_code; ?>)<br>
    Lecturer:<?php echo $lecturer; ?><br>
    
</h3>

    <table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Matricule</th>
        <th>Name</th>
       <?php
       
        $check_dates=$con->query("SELECT  * 
        FROM student_att Where month(date)='$month' && YEAR(date)='$year' GROUP BY date,starts") 
               or die(mysqli_error($con));
                $check_dates->num_rows;
              
               while($ro=$check_dates->fetch_assoc()){
        ?>
        <th><?php  echo date('d-m-Y', strtotime($ro['date']));  ?><br>
        <?php  echo $ro['starts'];  ?> - <?php  echo $ro['ends'];  ?></th>
        <?php } ?>
        
        
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
        $check=$dbcon->query("SELECT * FROM  students WHERE matric like '%$matric%' order by id DESC LIMIT 1  ") 
        or die(mysqli_error($dbcon));
              
               while($row=$check->fetch_assoc()){
                   echo $name=$row['name'];
               }        
        
        
        ; ?></td>
       
       <?php $check_dates=$con->query("SELECT  * 
        FROM student_att Where month(date)='$month' && YEAR(date)='$year' GROUP BY date,starts") 
               or die(mysqli_error($con));
               
              
               while($ro=$check_dates->fetch_assoc()){
       ?>
       <td><?php  
        $check_att=$con->query("SELECT  * FROM student_att WHERE date='".$ro['date']."'  AND starts='".$ro['starts']."'
        AND ends='".$ro['ends']."' AND student_id='".$rows['student_id']."' ") 
               or die(mysqli_error($con));
               $counted=$check_att->num_rows;
               if($counted>0){
                   echo "<span style='color:#00F;font-weight:bold'>✓</span>";
               }
               else {
                   echo "<span style='color:#f00;font-weight:bold'>❌</span>";
               }
       
       ?></td>
       <?php } ?>
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  
