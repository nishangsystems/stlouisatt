
						<?PHP 
                       
                       
						
						?>
                       


				<form method="POST" action="../Teachers/Reports/month_att.php" target="_new" enctype="multipart/form-data">
                                                              
                    <div class="form-row">
                       

                        <div class="form-group col-md-3">
                        <label for="inputPassword4"> Month :
                            </label>
                            <select  name="month" onBlur="doCalc(this.form)" required class="form-control">
                                <option   onBlur="doCalc(this.form)"></option>
                                <?php
                                $select =$con->query("SELECT  MONTH(date) as month
                                FROM student_att
                                GROUP BY EXTRACT(YEAR_MONTH FROM date)") or die(mysqli_error($con));
							
                                while($rows=$select->fetch_assoc()){
                                    ?>
                                <option value="<?php echo $rows['month'] ?>"  onBlur="doCalc(this.form)"><?php echo $rows['month'] ?></option>
                                <?php } ?>
                                   
                                </select>
                        </div>

                        <div class="form-group col-md-2">
                        <label for="inputPassword4"> Year :
                            </label>
                            <select  name="year" onBlur="doCalc(this.form)" required class="form-control">
                                <option   onBlur="doCalc(this.form)"></option>
                                <?php
                                $select =$con->query("SELECT  YEAR(date) as month
                                FROM student_att
                                GROUP BY EXTRACT(YEAR FROM date)") or die(mysqli_error($con));
							
                                while($rows=$select->fetch_assoc()){
                                    ?>
                                <option value="<?php echo $rows['month'] ?>"  onBlur="doCalc(this.form)"><?php echo $rows['month'] ?></option>
                                <?php } ?>
                                   
                                </select>
                        </div>


                        <div class="form-group col-md-6">
                        <label for="inputPassword4"> Course:
                            </label>
                            <select  name="course" onBlur="doCalc(this.form)" required class="form-control">
                                <option></option>
                                
                                <?php
                                $select =$con->query("SELECT * FROM  courses,campus,users,programs,levels,prog_courses,teacher_courses 
                                WHERE   teacher_courses.teacher_id='$user_id'
                                AND teacher_courses.course_id=prog_courses.id 
                                AND prog_courses.level_id=levels.id AND users.id=teacher_courses.teacher_id AND prog_courses.prog_id=programs.id AND 
                                prog_courses.course_id=courses.id GROUP BY teacher_courses.course_id
                                
                                ") or die(mysqli_error($con));
							
                                while($rows=$select->fetch_assoc()){
                                    ?>
                                <option value="<?php echo $rows['course_id'] ?>"  onBlur="doCalc(this.form)"><?php echo $rows['course_title'] ?>
                                /<?php echo $rows['course_code'] ?> for <?php echo $rows['prog_name'] ?></option>
                                <?php } ?>
                                   
                                </select>
                        </div>


                        <div class="form-group col-md-3">
                        <label for="inputPassword4"> Campus :
                            </label>
                            <select  name="campus" onBlur="doCalc(this.form)" required class="form-control">
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
                        
                    