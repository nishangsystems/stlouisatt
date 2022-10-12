
						<?PHP 
                       
                       
						
                       ?>
                      


               <form method="POST" action="" enctype="multipart/form-data">
                                                             
                   <div class="form-row">
                      

                       <div class="form-group col-md-3">
                       <label for="inputPassword4"> Month :
                           </label>
                           <select  name="month" onBlur="doCalc(this.form)" class="form-control">
                                           <option></option>
                                           <?php
                                           $select =$con->query("SELECT * FROM  months  order by months.id   ") or die(mysqli_error($con));
                                           $a=1;	
                                           while($rows=$select->fetch_assoc()){
                                           ?>
                                          <option value="<?php echo $rows['num']; ?>"  onBlur="doCalc(this.form)"><?php echo $rows['month']; ?></option>
                                               <?php } ?>						
                           </select>
                       </div>

                       <div class="form-group col-md-2">
                       <label for="inputPassword4"> Year :
                           </label>
                           <select  name="year" onBlur="doCalc(this.form)" class="form-control" required>
                                           <option></option>
                                           <?php
                                           for($x=2021;$x<=2025;$x++){
                                           ?>
                                          <option value="<?php echo $x; ?>"  onBlur="doCalc(this.form)"><?php echo $x; ?></option>
                                               <?php } ?>						
                        </select>
                       </div>


                       <div class="form-group col-md-3">
                       <label for="inputPassword4"> Campus :
                           </label>
                           <select  name="campus" onBlur="doCalc(this.form)" required class="form-control" required>
                               <option    onBlur="doCalc(this.form)"></option>
                               <?php
                               $select =$con->query("SELECT * FROM   campus") or die(mysqli_error($con));
                           
                               while($rows=$select->fetch_assoc()){
                                   ?>
                               <option value="<?php echo $rows['id'] ?>"  onBlur="doCalc(this.form)"><?php echo $rows['camp_name'] ?></option>
                               <?php } ?>
                               
                               </select>
                       </div>


                      

                       
                         
                   </div>
                           

                                   
                                   <div class="clearfix form-actions">
                                       <div class="col-md-offset-3 col-md-9">
                                           
                                          
                                           <button class="btn btn-info" type="submit" name="save">
                                               <i class="ace-icon fa fa-check bigger-110"></i>
                                               Next
                                           </button>
                                               
                                           
                                       </div>
                                   </div>
                       </form>



   
    <?php  
if(isset($_POST['save'])){
   $month=$_POST['month'];
    $year=$_POST['year'];
    $campus_id=$_POST['campus'];
    
    $check=$con->query("SELECT * FROM  months WHERE num='".$month."' ") 
           or die(mysqli_error($con));
          
           while($rows=$check->fetch_assoc()){
               $month_name=$rows['month'];
               
               
           }
           $check=$con->query("SELECT * FROM  campus WHERE id='".$campus_id."' ") 
           or die(mysqli_error($con));
          
           while($rows=$check->fetch_assoc()){
               $camp_name=$rows['camp_name'];
               
               
           }
    $check_exits=$con->query("SELECT * FROM  users,teacher_att,prog_courses,courses WHERE 
    users.id=teacher_att.teacher_id AND prog_courses.course_id=courses.id  AND teacher_att.teacher_id='$user_id'
    AND teacher_att.course_id=prog_courses.id AND DATE_FORMAT(teacher_att.arrival, '%m')='$month' and
							  DATE_FORMAT(teacher_att.arrival, '%Y')='$year' AND teacher_att.campus_id='$campus_id'  GROUP BY teacher_att.teacher_id") 
        or die(mysqli_error($con));
        $i=1;
      $nums=$check_exits->num_rows; ?>




<h3>Lecturers Attendance Sheet for : <?php echo $month_name; ?>  <?php echo $year; ?> 

<h3>Campus : <?php echo $camp_name; ?>  
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
                                  DATE_FORMAT(teacher_att.arrival, '%Y')='$year' AND teacher_att.campus_id='$campus_id'
                                  AND teacher_att.teacher_id='$user_id'  GROUP BY teacher_att.course_id ") 
        or die(mysqli_error($con));
        echo $checks->num_rows;
       
        
        ; ?></td>

<td style="color:#00f"><?php 
       
        $check_all=$con->query("SELECT SUM(TIMESTAMPDIFF(HOUR,  arrival,departure)) AS tim
         FROM teacher_att WHERE  teacher_att.teacher_id='".$rows['teacher_id']."' 
        AND  DATE_FORMAT(teacher_att.arrival, '%m')='$month' and
                                  DATE_FORMAT(teacher_att.arrival, '%Y')='$year' AND teacher_att.campus_id='$campus_id'
                                  AND teacher_att.teacher_id='$user_id' ")  or die(mysqli_error($con));
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
        DATE_FORMAT(teacher_att.arrival, '%Y')='$year' AND  teacher_att.campus_id='$campus_id'
        AND teacher_att.teacher_id='$user_id'
        AND departure IS NOT NULL GROUP BY teacher_att.course_id ") 
        or die(mysqli_error($con));
        echo $checks->num_rows;
       
        
        ; ?></td>

<td style="color:#f00"><?php 
       
        $check_all=$con->query("SELECT SUM(TIMESTAMPDIFF(HOUR,  arrival,departure)) AS tim
         FROM teacher_att WHERE   DATE_FORMAT(teacher_att.arrival, '%m')='$month' and
                                  DATE_FORMAT(teacher_att.arrival, '%Y')='$year' 
                                  AND teacher_att.teacher_id='$user_id'
                                  AND departure IS NOT NULL AND  teacher_att.campus_id='$campus_id'")  or die(mysqli_error($con));
               while($ro=$check_all->fetch_assoc()){
                 echo   $ro['tim'];
               }        
        
        
        ; ?></td>
       
      </tr>
      
    </tbody>
  </table>
  <?php } ?>
  

                       
                   