<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  
<script>tinymce.init({selector:'textarea'});</script>

        <div class="row">
        <div class="col-sm-12">  
 
 <h2 style="color:#00F">MAIN TOPIC : <span style='color:#f00; '><u> <?php 
 $id=$_GET['topic'];
 $att_id=$_GET['time'];
 $course_id=$_GET['course_id'];
 $check=$con->query("SELECT * FROM  topics where id='$id' ") 
       or die(mysqli_error($con));
      
       while($rows=$check->fetch_assoc()){
         echo  $topic=$rows['topic'];
       }


 $check_exits=$con->query(" SELECT * FROM  courses,campus,users,programs,levels,prog_courses,teacher_courses,topics ,teacher_att
WHERE   topics.id='$id'  AND teacher_att.year_id='$year_id' AND teacher_att.id='$att_id'
and  courses.id=prog_courses.course_id AND teacher_att.course_id=teacher_courses.course_id
AND teacher_att.course_id=prog_courses.id  AND topics.course_id=prog_courses.id 
AND teacher_courses.course_id=prog_courses.id  
AND prog_courses.level_id=levels.id AND users.id=teacher_courses.teacher_id AND prog_courses.prog_id=programs.id AND 
prog_courses.course_id=courses.id
 ORDER BY teacher_att.id DESC ") 
        or die(mysqli_error($con));
        $i=1;
         $nums=$check_exits->num_rows;
 
 ?></u></span> </h2>     
  
  
    <?php
   

			while($rows=$check_exits->fetch_assoc()){
	?>
     
     



<h3>

 <div class="row">
     <h4>
     <?php echo $rows['course_title']; ?>/ 
        <span style="color:#00f"> <?php echo $rows['prog_name']; ?>/</span> 
        <span style="color:#f00"> <?php echo $rows['level_name']; ?></span> Taught by  <?php echo $rows['full_name']; ?>
        on <?php 
        echo (new DateTime($rows['arrival']))->format("d-m-Y");
        ?>  from
         <span style="color:#00f;font-weight:bold"> <?php 
         echo (new DateTime($rows['arrival']))->format("H:i");
         ?></span>

     </h4>
        <div class="col-sm-5">
          <div class="well">
           <form role="form" method="post" action="">
            
            <div class="form-group">
                <label for="pwd">What was Taught :</label>
               

                <textarea class="form-control" name="content" rows="10" id="form-field-8" placeholder="Default Text"  ></textarea>
              </div>


                
              <div class="checkbox">
				<button type="submit" class="btn btn-primary" name="save">Save</button>

              </div>

                
              
        </form>
          </div>
        </div>
        <div class="row">
        <div class="col-sm-6">  
 
 <h2>Topics Taught  <?php 


 $check_exits=$con->query("SELECT *  FROM `teacher_att` WHERE id='".$_GET['time']."'
 ") 
        or die(mysqli_error($con));
        $i=1;
         $nums=$check_exits->num_rows;
 
 ?> </h2>     
          
 <table class="table .table-bordered" style="font-size:14px">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Content</th>
        <th>Arrival</th>
        
        
        
      </tr>
    </thead>
    <tbody>
    <?php
   

			while($rows=$check_exits->fetch_assoc()){
	?>
      <tr>
        <td><?php echo $i++; ?></td>
         <td><?php echo $rows['content']; ?>
      </td>
        <td><?php 
        echo (new DateTime($rows['arrival']))->format("d-m-Y");
        ?><br>
         <span style="color:#00f;font-weight:bold"> <?php 
         echo (new DateTime($rows['arrival']))->format("H:i");
         ?></span>
      
      </td>
       
         
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  
          </div>
        </div>
        
         <?php } ?>
         <?php SaveLogBook($course_id,$att_id,$id); ?>







    