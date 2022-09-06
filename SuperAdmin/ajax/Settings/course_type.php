
						<?PHP 
                        $course_name="";
						SaveCourseType();
                        UpdateCourseType();
                        if(isset($_GET['edit_id']))
						$select =$con->query("SELECT * FROM   course_types WHERE id='".$_GET['edit_id']."' ") or die(mysqli_error($con));
							
							while($rows=$select->fetch_assoc()){
                              $course_name=$rows['ctype_name'];
							
                            }
						
						
						?>
						<form method="POST" action="" class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Program : </label>

										<div class="col-sm-9">
											<input type="text" name="name"   id="form-field-1"   class="col-xs-10 col-sm-5" value="<?php echo   $course_name; ?>" />
										</div>
									</div>
                                    
                                  
                                    
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											
                                            <?php if(isset($_GET['edit_id'])){ ?>
                                            <input type="hidden" name="id"  value="<?php echo $_GET['edit_id']; ?>" />
                                            <button class="btn btn-info" type="submit" name="save_update">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Save Updates
											</button>
                                            <?php  } else { ?>
                                            <button class="btn btn-info" type="submit" name="save">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>
												<?php } ?>

											
										</div>
									</div>
                        </form>
                        
                        
                         <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>S/N</th>
                                <th>Course Type</th>                                
                               
                                 <th></th>

                              </tr>
                            </thead>
                            <tbody>
                            <?php
							$select =$con->query("SELECT * FROM  course_types ") or die(mysqli_error($con));
							$a=1;	
							while($row=$select->fetch_assoc()){
							?>
                              <tr>
                                <td><?php echo $a++; ?></td>
                                 <td><?php echo $row['ctype_name']; ?></td>
                                 
                                 <td><a href="?course_type&edit_id=<?php echo $row['id']; ?>&ediiting" class="btn btn-primary btn-xs">Edit</a>
                                
                                 <a href="?add_course&add_id=<?php echo $row['id']; ?>&Adding" class="btn btn-success btn-xs">Add a Course</a>
                                </td>
                                  
                                
                              </tr>
                             <?php } ?>
                            </tbody>
                      </table>
                     