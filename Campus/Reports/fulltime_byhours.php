<h3>Full Time Reports by Hour Per Day </h3>
                       


				<form method="POST" action="../SuperAdmin/Reports/staff_att_byhour.php" target="_new" enctype="multipart/form-data">
                                                              
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
                                $select =$con->query("SELECT * FROM   campus where id='$my_campus_id' ") or die(mysqli_error($con));
															                            
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
                        
                    