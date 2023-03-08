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
        $checkin=$rows['checkin'];
        $checkout=$rows['checkout'];
       }

       $time1 = strtotime($checkin);
      $time2 = strtotime($checkout);
      $difference = round(abs($time2 - $time1) / 3600,2);


      $daily_hours_expected= $difference;
      $workingdays_in_the_month=countMyDays($year, $month, array(0, 6)); ///from functions
      $expected_hours_towork=$daily_hours_expected*$workingdays_in_the_month;


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



<h3>Late Comers Reports Sheet for : <?php echo $campus; ?> for <?php echo $month_name; ?>   <?php echo $year; ?>
    
</h3>

    <table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Name</th>
       <?php
       

      $days = cal_days_in_month(CAL_GREGORIAN, $month,$year);
  for($i = 1; $i<= $days; $i++){
     $day  = date('Y-m-'.$i);
     $result = date("l", strtotime($day));
     if($result=="Sunday" || $result=="Saturday"){
     }
     else {
    
        ?>
        <th><?php                                               
        echo date("d", strtotime($day));  ?><br>
       <?php  echo date('D', strtotime($day));;  ?></th>
        <?php  }   } ?>
        <td>Total <br> Hours (
      <?php echo $expected_hours_towork; // 23?>) 
      </td>
        
        
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
     
       
      $days = cal_days_in_month(CAL_GREGORIAN, $month,$year);
      for($i = 1; $i<= $days; $i++){
         $period= $year."-".$month ."-";
         $day  = date($period.$i);
         $result = date("l", strtotime($day));
         if($result=="Sunday" || $result=="Saturday"){
         }
         else {                                                
        $today=date('Y-m-d', strtotime($day)); ?>
       
       <td style="font-weight:bold;  color:#00f"><?php  

       /////Get the arrival time 

       $check_all=$con->query("SELECT arrival AS tim
                FROM staff_att WHERE  staff_att.teacher_id='".$rows['teacher_id']."' 
               AND date='$today'  ")  or die(mysqli_error($con));
               $count=$check_all->num_rows;
                      while($ro=$check_all->fetch_assoc()){
                       $staff_arrival=  $ro['tim'];
                       $staff_arrival_oncampus= date("H:i:s", strtotime($staff_arrival));
                      }
                     
                      
        if($count<1){
            echo "<span style='color:#f00;font-weight:bold'>&#10060;</span>";
        }
        else {
                
            $time1 = new DateTime($checkin);
            $time2 = new DateTime($staff_arrival_oncampus);
            $time_diff = $time1->diff($time2);
          $hours= $time_diff->h.' hours';
         $minutes=  $time_diff->i.' min';
         if($hours>0){
            echo $hours. " late ";
         }
         else if($minutes >0){
            echo $minutes . " Late";

         }
         else {
            "On time";
         }
            
        }
            
         
       
       ?></td>
      
       <?php 
       }
       /////Close else for days loading 
              }
       ?>
       <td style="font-weight:bold"><?php



       $check_all=$con->query("SELECT SUM(TIMESTAMPDIFF(HOUR,  arrival,departure)) AS tim
       FROM staff_att WHERE departure!='' AND staff_att.teacher_id='".$rows['teacher_id']."' 
      AND  DATE_FORMAT(staff_att.arrival, '%m')='$month' and
      DATE_FORMAT(staff_att.arrival, '%Y')='$year'    ")  or die(mysqli_error($con));
             while($ro=$check_all->fetch_assoc()){
              if(empty($ro['tim'])){
                echo 0;
              }
              else {
             echo  $hours=   $ro['tim'];
            }
             } 
       
       ?>/ <?php echo  $expected_hours_towork; ?></td>
       <?php } ?>
      </tr>
     
      
    </tbody>
  </table>