<?php
if(isset($_POST['save'])){
 $level=$_POST['level'];
$campus=$_POST['campus'];
$seqtype=$_POST['country'];
$sem=$_POST['state'];
$year_id=$_POST['ayear'];

$prog_id=$_POST['prog_id'];


$select =$con->query("SELECT * FROM   levels where id='".$level."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $level_name=$rows['level_name'];   
    
}

$select =$con->query("SELECT * FROM   campus where id='".$campus."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $camp_name=$rows['camp_name'];   
    
}

$select =$con->query("SELECT * FROM   settings_subtype where id='".$seqtype."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $sem_name=$rows['sub_name'];   
    
}

$select =$con->query("SELECT * FROM   ayear where id='".$year_id."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $ayear_name=$rows['cur_ayear'];   
    
}


$select =$con->query("SELECT * FROM   programs where id='".$prog_id."' ") or die(mysqli_error($con));

while($rows=$select->fetch_assoc()){
 $prog_name=$rows['prog_name'];   
    
}
   
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
                                                        <th>Program</th>
														<th>Semester</th>
                                                        <th>Academic Year</th>
                                                        <th>Level</th>
                                                        <th>Campus</th>
														<th></th>
													</tr>
												</thead>

												<tbody>
                                              
													<tr>
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>
                                                        <td>
														<?php echo $prog_name; ?>
														</td>

														<td>
														<?php echo $sem_name; ?>
														</td>
                                                        <td>
														<?php echo $ayear_name; ?>
														</td>
                                                        <td>
														<?php echo $level_name; ?>
														</td>
                                                        <td>
														<?php echo $camp_name; ?>
														</td>
														
                                                     
                                                        <td>
                                                        
                                                         <a href="?viewing_logbook&sem=<?php echo $sem; ?>&year_id=<?php echo $year_id; ?>&sem_type=<?php echo $seqtype; ?>&prog_id=<?php echo $prog_id;  ?>&level_id=<?php echo $level; ?>&camp_id=<?php echo $campus; ?>&gdgddh" class=" btn-primary btn-sm">View Log Book Records </a>
                                                         
                                                       
															
														</td>
													</tr>
                                               

												</tbody>
											</table>

</div>
</a>
<?php } ?>