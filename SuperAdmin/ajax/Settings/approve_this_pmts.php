


<?php   SaveManualPayments() ; ?>



  <?php 
   $id=base64_decode($_GET['xxc']);
  $select_trans =$con->query("SELECT * FROM  users,transactions where transactions.user_id='".$id."' 
  AND users.id=transactions.user_id AND  transactions.year_id='$year_id' ") or die(mysqli_error($con));								
   $momo_paid=$select_trans->num_rows;
        if($momo_paid>0){
        ?>
         <div class="alert alert-danger">
            
            <strong>
                <i class="ace-icon fa fa-times"></i>
                ERROR.
            </strong>This applicant has already paid application Charges for <?php echo $cur_ayear; ?> 
            <br />
        </div>

        
        <?php
        }
        
        else {
				
		    $a = $con->query("SELECT * from users where id='".$id."' ") or die(mysqli_error($con));
			
		     while($row = $a->fetch_assoc()) {	
						
            
    ?>
     
      <form action="" method="post" name="regForm" class="form-horizontal" id="regForm" style="margin-top:30px">
          
              
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">User Email:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="text" placeholder="Username" value="<?php echo $row['user_name']; ?>" name="user_name" readonly="readonly">
                </div>
              </div>
          
          
              
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Full Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="text" placeholder="Username" value="<?php echo $row['full_name']; ?>" name="user_name" readonly="readonly">
                </div>
              </div>
                
                
              
                <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Degree Type:</label>
                <div class="col-sm-10">
                  <select class="form-control" id="form-field-select-1" name="dtype" required>
                  <option value=""></option>
                  <?php
              $select = $con->query("SELECT * FROM  degrees   ") or die(mysqli_error($con));

                while ($rows = $select->fetch_assoc()) {
                
              ?>
                  <option value="<?php echo $rows['id'];?>"><?php echo $rows['deg_name'];?></option>
                <?php } ?>
                  
              </select>
                </div>
              </div>   

              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Academic Year Concern:</label>
                <div class="col-sm-10">
                  <select class="form-control" id="form-field-select-1" name="year_id">
                  <option value="<?php echo $year_id; ?>"><?php echo $cur_ayear; ?></option>
                 
              </select>
                </div>
              </div>   
              
                <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Reason :</label>
                <div class="col-sm-10">
                  <select class="form-control" id="form-field-select-1" name="mode" required>
                  <option value=""></option>
                  <?php
              $select = $con->query("SELECT * FROM  pmt_modes   ") or die(mysqli_error($con));

                while ($rows = $select->fetch_assoc()) {
                
              ?>
                  <option value="<?php echo $rows['id'];?>"><?php echo $rows['mode_name'];?></option>
                <?php } ?>
                  
              </select>
                </div>
              </div>
              
            
                <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" name="submit">Save Payments Records</button>
                </div>
   
      </form>
     
	<?php }   } ?>

</div>
</div>

