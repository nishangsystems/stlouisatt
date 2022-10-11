
													<div class="space"></div>

													<div>
														<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="center">#</th>
																	<th>Campus Name</th>
																
																	<th>Action</th>
																</tr>
															</thead>

															<tbody>
                                                           	
                                                                
                                                                <?php
                                                                $select =$con->query("SELECT * FROM  campus  ") or die(mysqli_error($con));
                                                                $a=1;						
                                                                 while($rows=$select->fetch_assoc()){
                                                                
                                                            ?>
																<tr>
																	<td class="center"><?php echo $a++; ?></td>

																	<td>
																		<?php echo $rows['camp_name'];  ?>
																	</td>
																	
																	
																	<td><a href="?camp_prog&id=<?php echo $rows['id']; ?>&&ndndbdb" class="btn btn-primary btn-xs">Create Programs for this Campus </a></td>
																</tr>

																<?php } ?>
															</tbody>
														</table>
													
									</div>
								</div>