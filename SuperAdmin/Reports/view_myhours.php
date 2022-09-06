<?php
$staff_id=$_POST['staff_id'];
$year_id=$_POST['ayear'];
$sem_id=$_POST['sem'];
?>
                                    
                                    
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
                                                        <th>Teachers Name</th>
														<th>Semester</th>
                                                        <th>Academic Year</th>
														
														<th></th>
													</tr>
												</thead>

												<tbody>
                                                 <?php
												
                                                $a = $con->query("SELECT  * from teacher_att,ayear,users,settings_type,settings_subtype,prog_courses where 
                                                teacher_att.teacher_id='".$staff_id."' AND  prog_courses.sem_id='$sem_id' 
                                                AND  teacher_att.year_id='$year_id'  AND teacher_att.course_id=prog_courses.id 
                                                AND settings_type.id=settings_subtype.setting_type_id AND teacher_att.year_id=ayear.id
                                                AND prog_courses.sem_id=settings_subtype.id AND users.id=teacher_att.teacher_id
                                                GROUP BY prog_courses.sem_id
                                                 ") or die(mysqli_error($con));
															
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

														<td>
														<?php echo $rows['sub_name']; ?>
														</td>
                                                        <td>
														<?php echo $rows['cur_ayear']; ?>
														</td>
														
                                                     
                                                        <td>
                                                        
                                                         <a href="?my_attendance&year_id=<?php echo $year_id; ?>&sem_id=<?php echo $rows['sem_id']; ?>&tid=<?php echo $rows['teacher_id']; ?>&name=<?php echo $rows['full_name']; ?>&link=View <?php echo $rows['full_name']; ?> <?php echo $rows['sub_name']; ?> Hours Records " class=" btn-primary btn-sm">View <?php echo $rows['sub_name']; ?> Hours Records </a>
                                                         
                                                       
															
														</td>
													</tr>
                                                    <?PHP } ?>

												</tbody>
											</table>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			