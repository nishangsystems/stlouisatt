
						<?PHP 
						SaveProgUp();
						
						if(isset($_GET['edit'])){
							$select =$con->query("SELECT * FROM  degrees,programs  where programs.id='".$_GET['edit']."' 
							AND degrees.id=programs.degree_id ") or die(mysqli_error($con));
							
							while($rows=$select->fetch_assoc()){
							
						
						?>
						<form method="POST" action="" class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Program : </label>

										<div class="col-sm-9">
											<input type="text" name="program"   id="form-field-1"   class="col-xs-10 col-sm-5" value="<?php echo $rows['prog_name']; ?>" />
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Degree Type: </label>

										<div class="col-sm-9">
											
															<input type="text" readonly="readonly" name="deg"  value="<?php echo $rows['deg_name']; ?>" id="form-field-1" placeholder="ROOM NUMBER:" class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    
                                       <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"    autocomplete="off" for="form-field-1"> Duration: </label>

										<div class="col-sm-9">
											
															<input type="number" required name="duration"  value="<?php echo $rows['duration']; ?>"   class="col-xs-10 col-sm-5" />
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
                                <th>Name</th>
                                
                                <th>Edit</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
							$select =$con->query("SELECT * FROM  programs WHERE degree_id='".$rows['degree_id']."' order by id DESC  ") or die(mysqli_error($con));
							$a=1;	
							while($row=$select->fetch_assoc()){
							?>
                              <tr>
                                <td><?php echo $a++; ?></td>
                                 <td><?php echo $row['prog_name']; ?></td>
                                  
                                <td><a href="?edit_prog&edit=<?php echo $row['id']; ?>&888d8d8" class="btn btn-primary btn-xs">Edit</button></td>
                              </tr>
                             <?php } ?>
                            </tbody>
                      </table>
                      <?php 	}
						}
                        ?>