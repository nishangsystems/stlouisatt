
						<?PHP 
                       
                       
						
						?>
                       


				<form method="POST" action="?confirm_ptype" enctype="multipart/form-data">
                                                              
                    <div class="form-row">
                       

                        <div class="form-group col-md-3">
                        <label for="inputPassword4"> Levels :
                            </label>
                            <select  name="level" onBlur="doCalc(this.form)" required class="form-control">
                                <option   onBlur="doCalc(this.form)"></option>
                                <?php
                                $select =$con->query("SELECT * FROM   levels") or die(mysqli_error($con));
							
                                while($rows=$select->fetch_assoc()){
                                    ?>
                                <option value="<?php echo $rows['id'] ?>"  onBlur="doCalc(this.form)"><?php echo $rows['level_name'] ?></option>
                                <?php } ?>
                                   
                                </select>
                        </div>

                        <div class="form-group col-md-2">
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


                        <div class="form-group col-md-4">
                        <label for="inputPassword4"> Program :
                            </label>
                            <select  name="prog_id" onBlur="doCalc(this.form)" required class="form-control">
                                <option    onBlur="doCalc(this.form)"></option>
                                <?php
                                $select =$con->query("SELECT * FROM   programs ORDER BY prog_name") or die(mysqli_error($con));
							
                                while($rows=$select->fetch_assoc()){
                                    ?>
                                <option value="<?php echo $rows['id'] ?>"  onBlur="doCalc(this.form)"><?php echo $rows['prog_name'] ?></option>
                                <?php } ?>
                                   
                                </select>
                        </div>

                        

                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Lecturer Name</label>
                            
                    <select name="user_id" id="countries-list" class="form-control">
                    
                            <?php
                            $country_result = $con->query("select * from users where id='".$_GET['xxc']."' ");
                            if ($country_result->num_rows > 0) {
                        // output data of each row
                        while($ro = $country_result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $ro["id"]; ?>"><?php echo $ro["full_name"]; ?></option>
                            <?php
                        }
                    }
                    ?>
                            </select>
                            
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Academic Year</label>
                            
                    <select name="year" id="countries-list" class="form-control">
                        <option></option>
                    
                            <?php
                            $country_result = $con->query("select * from ayear  ");
                            if ($country_result->num_rows > 0) {
                        // output data of each row
                        while($ro = $country_result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $ro["id"]; ?>"><?php echo $ro["cur_ayear"]; ?></option>
                            <?php
                        }
                    }
                    ?>
                            </select>
                            
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
                        
                    