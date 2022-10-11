
						<?PHP 
                        
						SaveCourse();
                        UpdateCourse();
                        $course_title="";
                        $course_code="";
                        $cv="";
                        $status="";

                        if(isset($_GET['add_id']))
						$select =$con->query("SELECT * FROM   course_types WHERE id='".$_GET['add_id']."' ") or die(mysqli_error($con));
							
							while($rows=$select->fetch_assoc()){
                            $course_name=$rows['ctype_name'];
							
                            }
                      

                        if(isset($_GET['edit_id']))
						
                        $select =$con->query("SELECT * FROM   courses WHERE id='".$_GET['edit_id']."' ") or die(mysqli_error($con));
                        
                        while($rows=$select->fetch_assoc()){
                            $course_title=$rows['course_title'];
                            $course_code=$rows['course_code'];;
                            $cv=$rows['cv'];;
                            $status=$rows['status'];;
                        
                        }
						
						
						?>
                        <h3>Adding Courses Under <strong><?php echo $course_name; ?></strong></H3>
                    
                        



				<form method="POST" action="" enctype="multipart/form-data">
                                                              
                    <div class="form-row">
                        <div class="form-group col-md-5">
                        <label for="inputEmail4">Course Title </label>
                        <input type="text"  required="required" value="<?php echo $course_title; ?>" name="title" class="form-control" style="color:#00F"  >
                        </div>
                        <div class="form-group col-md-2">
                        <label for="inputPassword4"> Course Code :
                            </label>
                            <input type="text"  required="required" value="<?php echo $course_code; ?>" name="code" class="form-control" style="color:#00F"  >
                        </div>

                        <div class="form-group col-md-2">
                        <label for="inputPassword4"> Credit Value :
                            </label>
                            <input type="number" value="<?php echo $cv; ?>" required="required" name="cv" class="form-control"   >
                        </div>

                        <div class="form-group col-md-2">
                        <label for="inputPassword4"> Status :
                            </label>
                            <select  name="status" onBlur="doCalc(this.form)" required class="form-control">
                                <option value="<?php echo $status; ?>"  onBlur="doCalc(this.form)"><?php echo $status; ?></option>
                                <?php
                                $select =$con->query("SELECT * FROM   status") or die(mysqli_error($con));
							
                                while($rows=$select->fetch_assoc()){
                                    ?>
                                <option value="<?php echo $rows['abs'] ?>"  onBlur="doCalc(this.form)"><?php echo $rows['abs'] ?></option>
                                <?php } ?>
                                   
                                </select>
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
                               <th>Course Title</th>                                 
                               <th>Course Code</th> 
                               <th>CV</th> 
                               <th>Status</th> 
                                 <th></th>

                              </tr>
                            </thead>
                            <tbody>
                            <?php
							$select =$con->query("SELECT * FROM  courses WHERE course_type_id='".$_GET['add_id']."' ORDER BY id DESC") or die(mysqli_error($con));
							$a=1;	
							while($row=$select->fetch_assoc()){
							?>
                              <tr>
                                <td><?php echo $a++; ?></td>
                                 <td><?php echo $row['course_title']; ?></td>
                                 <td><?php echo $row['course_code']; ?></td>
                                 <td><?php echo $row['cv']; ?></td>
                                 <td><?php echo $row['status']; ?></td>
                                 <td><a href="?add_course&add_id=<?php echo $_GET['add_id']; ?>&edit_id=<?php echo $row['id']; ?>&ediiting" class="btn btn-primary btn-xs">Edit</a>
                                
                                </td>
                                  
                                
                              </tr>
                             <?php } ?>
                            </tbody>
                      </table>
                     