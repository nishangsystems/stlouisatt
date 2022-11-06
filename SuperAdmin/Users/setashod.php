 
        <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
        
                <strong>
                    <i class="ace-icon fa fa-times"></i>
                   ASSIGNING LECTURER HOD ROLE
                </strong>
        
                <br />
              </div>
        
       <form action="" method="post" id="register-form" class="form-horizontal" role="form"  >
       
               

        <?php 
            $id=$_GET['xxc'];
			
			  $d=$con->query("SELECT * from users where id='".$id."' ") or die(mysqli_error($con));
               while($rows=$d->fetch_assoc()){
        ?>

     
        <?php hod($id); ?>
          
          
           <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Full Name: </label>

										<div class="col-sm-9">
        <input type="text" class="form-control" value="<?php  echo $rows['full_name']; ?>" name="name" required autocomplete="off"  />
        </div>
        </div>


         
        <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Campus: </label>

        <div class="col-sm-9">

        <select required class="form-control" id="sel1" name="campus">
        <?php
							
								$result = $con->query("SELECT * FROM campus") or die(mysqli_error($con));
				while($bu=$result->fetch_assoc()){
								?>
                       
        <option></option>          
        <option value="<?php echo $bu['id']; ?>"  ><?php echo $bu['camp_name']; ?> </option>
    <?php } ?> 
        
      </select>
            
        </div>
        </div>



         
        <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Department: </label>

        <div class="col-sm-9">

        <select required class="form-control" id="sel1" name="dept">
        <?php
							
								$result = $con->query("SELECT * FROM departments order by dept_name") or die(mysqli_error($con));
				while($bu=$result->fetch_assoc()){
								?>
                       
        <option></option>          
        <option value="<?php echo $bu['id']; ?>"  ><?php echo $bu['dept_name']; ?> </option>
    <?php } ?> 
        
      </select>
            
        </div>
        </div>
        
        
        
        
        
         
        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
                
                <button type="submit" class="btn btn-success" name="submit">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Save as HOD
			</button> 
           

                
            </div>
        </div>
        
        
      </form>

    </div>
   
<?php } ?>

<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th>Name</th>
														<th>Department</th>
														<th >Campus</th>
                                                        
														<th></th>
													</tr>
												</thead>

												<tbody>
                                                 <?php
												
                                                $a = $con->query("SELECT  * from users,campus,departments,departmen_heads
                                                 where users.id='".$_GET['xxc']."' AND users.id=departmen_heads.user_id
                                                 and campus.id=departmen_heads.campus_id AND departments.id=departmen_heads.dept_id ") or die(mysqli_error($con));
															
												while($rows = $a->fetch_assoc()) {
												?>
													<tr>
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
														<?php echo $rows['full_name']; ?>
														</td>
														<td><?php echo $rows['dept_name']; ?></td>
														<td> <?php echo $rows['camp_name']; ?></td> 
                                                      
                                                        <td>
                                                        
                                                         <a href="?setashod&xxc=<?php echo $_GET['xxc']; ?>&&delete=<?php echo $rows['id']; ?>&link=Update Teachers& gdgdhdh " class=" btn-danger btn-sm">Unassign </a>
                                                         
                                                         	
                                                          
															
														</td>
													</tr>
                                                    <?PHP } ?>

												</tbody>
											</table>

                                            <?php

		  if(isset($_GET['delete'])){
	echo $delete=$_GET['delete'];
 
	 $fj=$con->query("DELETE FROM departmen_heads where id='$delete'  ") or die(mysqli_error($con));
	 echo "<script>alert('Action successfully ')</script>";
	 echo '<meta http-equiv="Refresh" content="0; url=?setashod&xxc='.$_GET['xxc'].'&link=Create%20Teachers%20Account">';
	 
		  }
; ?>