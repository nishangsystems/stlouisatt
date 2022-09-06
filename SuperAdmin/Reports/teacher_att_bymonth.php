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

   $month=$_POST['month'];
    $year=$_POST['year'];
    
    $check=$con->query("SELECT * FROM  months WHERE num='".$month."' ") 
           or die(mysqli_error($con));
          
           while($rows=$check->fetch_assoc()){
               $month_name=$rows['month'];
               
               
           }
    $check_exits=$con->query("SELECT * FROM  users,teacher_att,prog_courses,courses WHERE 
    users.id=teacher_att.teacher_id AND prog_courses.course_id=courses.id 
    AND teacher_att.course_id=prog_courses.id AND DATE_FORMAT(teacher_att.arrival, '%m')='$month' and
							  DATE_FORMAT(teacher_att.arrival, '%Y')='$year' GROUP BY teacher_att.teacher_id") 
        or die(mysqli_error($con));
        $i=1;
     echo    $nums=$check_exits->num_rows; ?>




<h3>Lecturers Attendance Sheet for : <?php echo $month_name; ?>  <?php echo $year; ?><br>
    
</h3>

    <table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Name</th>
       
        <th># of Courses</th>
        
        <th>Total number<br> of Hours Taught</th>
   
        
        
      </tr>
    </thead>
    <tbody>
    <?php
   

			while($rows=$check_exits->fetch_assoc()){
	?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $rows['full_name']; ?>
      </td>
        <td><?php 
        $checks=$con->query("SELECT * FROM  users,teacher_att,prog_courses,courses WHERE 
        users.id=teacher_att.teacher_id AND prog_courses.course_id=courses.id AND teacher_att.teacher_id='".$rows['teacher_id']."' 
        AND teacher_att.course_id=prog_courses.id AND DATE_FORMAT(teacher_att.arrival, '%m')='$month' and
                                  DATE_FORMAT(teacher_att.arrival, '%Y')='$year' GROUP BY teacher_att.course_id ") 
        or die(mysqli_error($con));
        echo $checks->num_rows;
       
        
        ; ?></td>

<td style="color:#00f"><?php 
       
        $check_all=$con->query("SELECT SUM(TIMESTAMPDIFF(HOUR,  arrival,departure)) AS tim
         FROM teacher_att WHERE  teacher_att.teacher_id='".$rows['teacher_id']."' 
        AND  DATE_FORMAT(teacher_att.arrival, '%m')='$month' and
                                  DATE_FORMAT(teacher_att.arrival, '%Y')='$year' ")  or die(mysqli_error($con));
               while($ro=$check_all->fetch_assoc()){
                 echo   $ro['tim'];
               }        
        
        
        ; ?></td>
       
      </tr>
      <?php }  ?>


      <tr>
        <td></td>
        <td>GRAND TOTAL
      </td>
        <td><?php 
        $checks=$con->query("SELECT * FROM  users,teacher_att,prog_courses,courses WHERE 
        users.id=teacher_att.teacher_id AND prog_courses.course_id=courses.id 
        AND teacher_att.course_id=prog_courses.id AND DATE_FORMAT(teacher_att.arrival, '%m')='$month' and
        DATE_FORMAT(teacher_att.arrival, '%Y')='$year'
        AND departure IS NOT NULL GROUP BY teacher_att.course_id ") 
        or die(mysqli_error($con));
        echo $checks->num_rows;
       
        
        ; ?></td>

<td style="color:#f00"><?php 
       
        $check_all=$con->query("SELECT SUM(TIMESTAMPDIFF(HOUR,  arrival,departure)) AS tim
         FROM teacher_att WHERE   DATE_FORMAT(teacher_att.arrival, '%m')='$month' and
                                  DATE_FORMAT(teacher_att.arrival, '%Y')='$year' 
                                  AND departure IS NOT NULL")  or die(mysqli_error($con));
               while($ro=$check_all->fetch_assoc()){
                 echo   $ro['tim'];
               }        
        
        
        ; ?></td>
       
      </tr>
      
    </tbody>
  </table>
  
