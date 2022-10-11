<?php
CourseUpdate();

   
?>

    <?php
     $course_title= "";
     $tutorials="";
     $lecture_hours="";
     $practicals_hours="";
            $check=$con->query("SELECT * FROM  courses  WHERE  id='".$_GET['id']."'     ") or die(mysqli_error($con));
			$i=1;
			while($rows=$check->fetch_assoc()){
              $course_title= $rows['course_title'];
              $tutorials=$rows['tutorials'];
              $lecture_hours=$rows['lecture'];
              $practicals_hours=$rows['practical'];
            }
       

    ?>
    <a href="?all_courses" class="btn btn-primary btn-xs" >Back</a>
  <div class="row">
        <div class="col-sm-5">
          <div class="well">
           <form role="form" method="post" action="">
            
              <div class="form-group">
                <label for="pwd">COURSE:</label>
                <select  name="course" class="chosen-select form-control" 
                id="form-field-select-4" data-placeholder="Choose a course...">
                
                <option value="<?php echo $_GET['id']; ?>"><?php echo $course_title; ?></option>
                								
															</select>


            </div>


            <div class="form-group">
                <label for="pwd">Lecture hours :</label>
                <input type="text" name="lecture" required="required"  value="<?php echo $lecture_hours; ?>" 
                 class="form-control" id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
              </div>

              <div class="form-group">
                <label for="pwd">Tutorial hours:</label>
                <input type="text" name="tutorials" required="required" value="<?php echo $tutorials; ?>" 
                 class="form-control" id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
              </div>

              <div class="form-group">
                <label for="pwd">Practical hours:</label>
                <input type="text" name="practicals" required="required" value="<?php echo $practicals_hours; ?>"  
                 class="form-control" id="pwd" onBlur="doCalc(this.form)"  style="color:#00F">
              </div>
						
                
              <div class="checkbox">
				<button type="submit" class="btn btn-primary" name="save">Submit</button>

              </div>

               
              
        </form>
          </div>
        </div>
        <div class="row">
        <div class="col-sm-6">  
        
          
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>course Title</th>
        <th>Course Code</th>
        <th>CV</th>
        <th>Status</th>

        <th>Lecture<br>Hours</th>
        <th>Tutorils<br>Hours</th>
        <th>Practical<br>Hours</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
 	$check=$con->query("SELECT * FROM  courses  WHERE  id='".$_GET['id']."' ") 
			or die(mysqli_error($con));
			$i=1;
			while($rows=$check->fetch_assoc()){
	?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $rows['course_title']; ?></td>
        <td><?php echo $rows['course_code']; ?></td>
          <td><?php echo $rows['cv']; ?></td>
          <td><?php echo $rows['status']; ?></td>

          <td><?php echo $rows['lecture']; ?></td>
          <td><?php echo $rows['tutorials']; ?></td>
          <td><?php echo $rows['practical']; ?></td>
          
      </tr>
      <?php }  ?>
      
    </tbody>
  </table>
  
          </div>
        </div>
      </div>
     

      