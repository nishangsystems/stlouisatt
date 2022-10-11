 
        <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
        
                <strong>
                    <i class="ace-icon fa fa-times"></i>
                    Oh snap!
                </strong>
        
                Password Must be at least 6 Characters Long and your email address must be valid
                <br />
              </div>
        
       <form action="" method="post" id="register-form" class="form-horizontal" role="form"  >
       
               

       

     
        <?php CreateUsersAdmin(); ?>
          
          
           <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Full Name: </label>

										<div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Full Names" name="name" required autocomplete="off"  />
        </div>
        </div>


         
        <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Tel Number: </label>

										<div class="col-sm-9">
        <input type="text" class="form-control"  name="tel" required autocomplete="off"  />
        </div>
        </div>
        
        
        
        
         
        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
                
                <button type="submit" class="btn btn-success" name="btn-signup">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
			</button> 
           

                
            </div>
        </div>
        
        
      </form>

    </div>
   




<table class="table table-bordered">
              
              <?php 
			$year=date('Y');
			  $d=$con->query("SELECT * from users where user_level='2' ORDER BY id DESC") or die(mysqli_error($con));
$i=1;
?>
 <thead>
                                        <tr>
                                            <th>#</th>
                                             <th>Name</th>
                                  <th>User Name</th>
                                    
                                
           
                               </tr>
                                    </thead>
                                    <tbody>
                                       <?php while($bu=$d->fetch_assoc()){ ?>

      <tr>
       
                                  <td><?php  echo $i++; ?></td>
                                  <td><?php  echo $bu['full_name']; ?></td>

                                  <td><?php  echo $bu['user_name']; ?></td>
                                  
                                  <td>  <a href="?add_teacher&link=Create Users&delete=<?php echo $bu['id'];  ?>"><button type="submit" class="btn btn-danger btn-xs" name="submit" onclick="return confirm('Are you sure')">Delete</button></a>| 
                                   <a href="?change_pwd&link=Change Password&xxc=<?php echo $bu['id'];  ?>" ><button type="submit" class="btn btn-success btn-xs" name="submit" onclick="return confirm('Are you sure')">Change Password</button></a> 
                                
                                            
                                        </tr>
                                     
                                       <?php } ?>
                                    </tbody>
                                    </table>
 
<?php

		  if(isset($_GET['delete'])){
	echo $delete=$_GET['delete'];
 
	 $fj=$con->query("DELETE FROM users where id='$delete'  ") or die(mysqli_error($con));
	 echo "<script>alert('Actiond successfully ')</script>";
	 echo '<meta http-equiv="Refresh" content="0; url=?add_teacher&link=Create%20Teachers%20Account">';
	 
		  }
; ?>