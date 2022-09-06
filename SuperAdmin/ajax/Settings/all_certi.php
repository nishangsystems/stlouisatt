
                        
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

                          $select =$con->query("SELECT * FROM  campus  WHERE id='".$_GET['id']."' ") or die(mysqli_error($con));
                        				
                          while($rows=$select->fetch_assoc()){
                            $camp_name=$rows['camp_name'];
                          }
                          $select =$con->query("SELECT * FROM  degrees  ") or die(mysqli_error($con));
                          $a=1;	
                          while($rows=$select->fetch_assoc()){
                          ?>
                              <tr>
                                <td><?php echo $a++; ?></td>
                                <td><?php echo $rows['deg_name']; ?></td>
                                <td><a href="?create_prog&id=<?php echo $rows['id']; ?>&camp_id=<?php echo $_GET['id']; ?>&ggdgdg" class="btn btn-primary btn-xs">Create <?php echo $rows['deg_name']; ?> Programs for 
                              <?php echo $camp_name; ?> Campus</button></td>
                              </tr>
                             <?php } ?>
                            </tbody>
                      </table>