
						<?PHP 
						CreatePayOption();
						
						if(isset($_GET['id'])){
							$select =$con->query("SELECT * FROM  campus where id='".$_GET['id']."'  ") or die(mysqli_error($con));
							
							while($rows=$select->fetch_assoc()){
							
						
						?>
						<form method="POST" action="" class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Define Mode: </label>

										<div class="col-sm-9">
											<input type="text" name="mode"   id="form-field-1"   class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  autocomplete="off" for="form-field-1"> Campus: </label>

										<div class="col-sm-9">
											
															<input type="text" readonly="readonly" name="deg" value="<?php echo $rows['camp_name']; ?>" id="form-field-1" placeholder="ROOM NUMBER:" class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    
                                               
                                    
                                    
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											
                                            <?php if(isset($_GET['edit'])){ ?>
                                            <input type="hidden" name="id"  value="<?php echo $_GET['edit']; ?>" />
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
                              
                              </tr>
                            </thead>
                            <tbody>
                            <?php
							$select =$con->query("SELECT * FROM  payment_options WHERE campus_id='".$_GET['id']."' order by id DESC  ") or die(mysqli_error($con));
							$a=1;	
							while($rows=$select->fetch_assoc()){
							?>
                              <tr>
                                <td><?php echo $a++; ?></td>
                                 <td><?php echo $rows['option_name']; ?></td>
                                  
                              </tr>
                             <?php } ?>
                            </tbody>
                      </table>
                      <?php 	}
						}
                        ?>