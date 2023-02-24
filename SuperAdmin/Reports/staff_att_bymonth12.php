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
    $campus_id=$_POST['campus'];
    
     
          
    $check_exits=$con->query("SELECT * FROM  campus where id='$campus_id' ") 
        or die(mysqli_error($con));
       while($rows=$check_exits->fetch_assoc()){
        $campus=$rows['camp_name'];
       }
   

       $check_exits=$con->query("SELECT * FROM  users,staff_att  where staff_att.campus_id='$campus_id'
       AND users.id=staff_att.teacher_id  AND DATE_FORMAT(staff_att.arrival, '%m')='$month' AND 
       DATE_FORMAT(staff_att.arrival, '%Y')='$year' GROUP BY staff_att.teacher_id ORDER BY users.full_name") 
       or die(mysqli_error($con));
       $i=1;
      
       ?>



<h3>Attendance Sheet for : <?php echo $campus; ?> for <?php echo $month; ?> / <?php echo $year; ?>
    
</h3>

    <table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Name</th>
       <?php
       
       $no_of_days = date("t",strtotime($year.'-'.$month));
    
       $dates = array();
       
       for($d=1;$d<=$no_of_days;$d++)
       {
           $day = (strlen($d)==1) ? '0'.$d : $d; // To add leading zero to the date
           $month = (strlen($month)==1) ? '0'.$month : $month; // To add leading zero to the month
        ?>
        <th><?php  $dates = $year.'-'.$month.'-'.$day;
                                                         
        echo date('d-m-Y', strtotime($dates));;  ?></th>
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
       /////date loading  
       $no_of_days = date("t",strtotime($year.'-'.$month));    
       $dates = array();       
       for($d=1;$d<=$no_of_days;$d++)
       {
           $day = (strlen($d)==1) ? '0'.$d : $d; // To add leading zero to the date
           $month = (strlen($month)==1) ? '0'.$month : $month; // To add leading zero to the month
       ?>
       <td><?php  
       /////compute date from function 
       $dates = $year.'-'.$month.'-'.$day;                                                         
       $today= date('d-m-Y', strtotime($dates));;
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
       <?php } ?>
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  
