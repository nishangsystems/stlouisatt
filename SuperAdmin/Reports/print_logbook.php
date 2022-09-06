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
        @page { size: portrait; }
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
   
    <?PHP
  $year_id=$_GET['year_id'];
  $course_id=$_GET['course_id'];
  $a = $con->query("SELECT  * from courses WHERE id='".$course_id."'")   or die(mysqli_error($con));
              
  while($rows = $a->fetch_assoc()) {
      $course_title=$rows['course_title'];
  }
  $a = $con->query("SELECT  * from ayear WHERE id='".$year_id."'")   or die(mysqli_error($con));
              
  while($rows = $a->fetch_assoc()) {
      $year_name=$rows['cur_ayear'];
  }
 ?>
 <h2> Log Book for <?php echo $course_title; ?> <?php echo $year_name; ?> academic year</h2>
 <?php 


 $check_exits=$con->query("SELECT * FROM  prog_courses,users,teacher_att 
 WHERE    teacher_att.year_id='$year_id' AND users.id=teacher_att.teacher_id
 AND departure IS NOT NULL AND prog_courses.id=teacher_att.course_id AND  teacher_att.course_id='".$_GET['course_id']."' 
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
        <th>Lecturer</th>
        <th>Arrival</th>
        <th>Departure</th>
       
        <th>Number<br> of Hours</th>
        <th>Lessons Taught</th>
        
        
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
      <td><?php echo $rows['full_name']; ?></td>

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
         <td><?php
          $check_all=$con->query("SELECT * from sub_topics_taught WHERE   time_id='".$rows['id']."'
          ")  or die(mysqli_error($con));
                while($row=$check_all->fetch_assoc()){
                    echo "<ul><li>".$row['contents']."</li></ul>";
                }
         
         
         ?>
      </tr>
      <?php }  ?>


      
    </tbody>
  </table>
          </div>
        </div>
        
        