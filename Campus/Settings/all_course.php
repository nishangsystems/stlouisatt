
						<?PHP 
                        
						$con = mysqli_connect('localhost','nishang','google1234','stlouis_att');
   //    $con = mysqli_connect('localhost','u174391244_attendance','Cpadmin@123','u174391244_attendance');
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

						
						
						?>
                        <h3>Adding Courses Under <strong><?php echo $course_name; ?></strong></H3>
                    
                        


                        
                        
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
							$select =$con->query("SELECT * FROM  courses ") or die(mysqli_error($con));
							$a=1;	
							while($row=$select->fetch_assoc()){
							?>
                              <tr>
                                <td><?php echo $a++; ?></td>
                                 <td><?php echo $row['course_title']; ?></td>
                                 <td><?php  $row['course_code'];
                                 
                                 $selects =$con->query("SELECT * FROM  aa WHERE code='".$row['course_code']."' ") or die(mysqli_error($con));
							
							while($rows=$selects->fetch_assoc()){
                                $lecture=$rows['l'];
                                $practical=$rows['p'];
                                $tutorial=$rows['t'];
                                $spw=$rows['spw'];
                                $update1 =$con->query("UPDATE  courses set lecture='$lecture',tutorials='$tutorial'
                                ,practical='$practical',spw='$spw' WHERE course_code='".$row['course_code']."' ") or die(mysqli_error($con));
							
                            }?></td>
                                 <td><?php echo $row['cv']; ?></td>
                                 <td><?php echo $row['status']; ?></td>
                                 <td><a href="?add_course&add_id=<?php echo $_GET['add_id']; ?>&edit_id=<?php echo $row['id']; ?>&ediiting" target="new" class="btn btn-primary btn-xs">Edit</a>
                                
                                </td>
                                  
                                
                              </tr>
                             <?php } ?>
                            </tbody>
                      </table>
                     