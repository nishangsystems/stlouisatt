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
    
 echo  $month=$_POST['month'];
    $year=$_POST['year'];
    $campus_id=$_POST['campus'];
    
          
    $check_exits=$con->query("SELECT * FROM  campus where id='$campus_id' ") 
        or die(mysqli_error($con));
       while($rows=$check_exits->fetch_assoc()){
        $campus=$rows['camp_name'];
       }
       $check_exits=$con->query("SELECT * FROM months where num='$month' ") 
        or die(mysqli_error($con));
       while($rows=$check_exits->fetch_assoc()){
        $month_name=$rows['month'];
       }
   
   

       $check_exits=$con->query("SELECT * FROM  users,staff_att  where staff_att.campus_id='$campus_id'
       AND users.id=staff_att.teacher_id  AND DATE_FORMAT(staff_att.arrival, '%m')='$month' AND 
       DATE_FORMAT(staff_att.arrival, '%Y')='$year' GROUP BY staff_att.teacher_id ORDER BY users.full_name") 
       or die(mysqli_error($con));
       $i=1;
      
       ?>



<h3>Attendance Sheet for : <?php echo $campus; ?> for <?php echo $month_name; ?>   <?php echo $year; ?>
    
</h3>

    <table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Name</th>
       <?php
       
       $check=$con->query("SELECT * FROM  users,staff_att  where staff_att.campus_id='$campus_id'
       AND users.id=staff_att.teacher_id  AND DATE_FORMAT(staff_att.arrival, '%m')='$month' AND 
       DATE_FORMAT(staff_att.arrival, '%Y')='$year' GROUP BY staff_att.date  ORDER BY staff_att.date ") 
       or die(mysqli_error($con));
       while($row=$check->fetch_assoc()){
        ?>
        <th><?php  
         $dates=$row['arrival'] ;                                              
        echo date('d', strtotime($dates));;  ?><br>
       <?php  echo date('D', strtotime($dates));;  ?></th>
        <?php } ?>
        
        
      </tr>
    </thead>
    <tbody>
    <?php
   

			while($rows=$check_exits->fetch_assoc()){
	?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $matric=$rows['full_name']; ?>
      </td>
       

      <?php
       
       $check=$con->query("SELECT * FROM  users,staff_att  where staff_att.campus_id='$campus_id'
       AND users.id=staff_att.teacher_id  AND DATE_FORMAT(staff_att.arrival, '%m')='$month' AND 
       DATE_FORMAT(staff_att.arrival, '%Y')='$year' GROUP BY staff_att.date  ORDER BY staff_att.date ") 
       or die(mysqli_error($con));
       while($row=$check->fetch_assoc()){
       
         $dates=$row['arrival'] ;                                              
        $today=date('Y-m-d', strtotime($dates));;  ?>
       
       <td><?php  
      
   

        $check_att=$con->query("SELECT  * FROM staff_att WHERE date='".$today."'  AND teacher_id='".$rows['teacher_id']."' ") 
               or die(mysqli_error($con));
               $counted=$check_att->num_rows;
               if($counted>0){
                   echo "<span style='color:#00F;font-weight:bold'>✓</span>";
               }
               else {
                   echo "<span style='color:#f00;font-weight:bold'>❌</span>";
               }
       
       ?></td>
       <?php } } ?>
      </tr>
     
      
    </tbody>
  </table>
  
