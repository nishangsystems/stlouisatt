
						<?PHP 
						SaveSet();
						$select =$con->query("SELECT * FROM   ayear ") or die(mysqli_error($con));
							
							while($rows=$select->fetch_assoc()){
							
						
						
						
						?>
						<form method="POST" action="" class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Program : </label>

										<div class="col-sm-9">
											<input type="text" name="ayear"   id="form-field-1"   class="col-xs-10 col-sm-5" value="<?php echo $rows['cur_ayear']; ?>" />
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Degree Type: </label>

										<div class="col-sm-9">
											
															<input type="date" required="required" name="starts"  value="<?php echo $rows['start_date']; ?>" id="form-field-1"   class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    
                                       <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"    autocomplete="off" for="form-field-1"> End Dtae: </label>

										<div class="col-sm-9">
											
															<input type="date" required name="ends"  value="<?php echo $rows['end_date']; ?>"   class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    
                                    
                                    
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											
                                            <?php if(isset($_GET['edit'])){ ?>
                                            <input type="hidden" name="deg_id"  value="<?php echo $rows['degree_id']; ?>" />
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
                                <th>Academic Year</th>                                
                                <th>Application Starts</th>
                                 <th>Application Ends</th>

                              </tr>
                            </thead>
                            <tbody>
                            <?php
							$select =$con->query("SELECT * FROM  ayear ") or die(mysqli_error($con));
							$a=1;	
							while($row=$select->fetch_assoc()){
							?>
                              <tr>
                                <td><?php echo $a++; ?></td>
                                 <td><?php echo $row['cur_ayear']; ?></td>
                                 <td><?php echo  date('l d-m-Y', strtotime($row['start_date'])); ?></td>
                                 <td><?php echo  date('l d-m-Y', strtotime($row['end_date'])); ?></td>
                                  
                                
                              </tr>
                             <?php } ?>
                            </tbody>
                      </table>
                      <?php 
							}
                        ?>