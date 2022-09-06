 
        <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
        
                <strong>
                    <i class="ace-icon fa fa-times"></i>
                   SUSPENDING TEACHER'S ACCOUNT
                </strong>
        
                <br />
              </div>
        
       <form action="" method="post" id="register-form" class="form-horizontal" role="form"  >
       
               

        <?php 
            $id=$_GET['xxc'];
			
			  $d=$con->query("SELECT * from users where id='".$id."' ") or die(mysqli_error($con));
               while($rows=$d->fetch_assoc()){
        ?>

     
        <?php SuspendTeacher($id); ?>
          
          
           <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Full Name: </label>

										<div class="col-sm-9">
        <input type="text" class="form-control" value="<?php  echo $rows['full_name']; ?>" name="name" required autocomplete="off"  />
        </div>
        </div>


         
        <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Tel Number: </label>

										<div class="col-sm-9">
        <input type="text" class="form-control"  name="tel" required autocomplete="off"  value="<?php  echo $rows['tel']; ?>"  />
        </div>
        </div>
        
        
        
        
         
        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
                
                <button type="submit" class="btn btn-warning" name="submit">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Suspend Account
			</button> 
           

                
            </div>
        </div>
        
        
      </form>

    </div>
   
<?php } ?>