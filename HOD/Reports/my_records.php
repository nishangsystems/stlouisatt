<?php
 $a = $con->query("SELECT  * from teacher_att,users,settings_type,ayear,settings_subtype,prog_courses where 
 teacher_att.teacher_id='".$_GET['id']."' AND teacher_att.course_id=prog_courses.id 
 AND settings_type.id=settings_subtype.setting_type_id AND ayear.id=teacher_att.year_id
 AND prog_courses.sem_id=settings_subtype.id AND users.id=teacher_att.teacher_id GROUP BY teacher_att.teacher_id 

  ") or die(mysqli_error($con));
             
 while($rows = $a->fetch_assoc()) {
     ?>

<form method="POST" action="?view_myhours" enctype="multipart/form-data">

                                    
        <div class="form-row">


        <div class="form-group col-md-3">
        <label for="inputPassword4"> Staff Name :
            </label>
            <select  name="staff_id" onBlur="doCalc(this.form)" required class="form-control">
                
                <option value="<?php echo $rows['teacher_id'] ?>"  onBlur="doCalc(this.form)"><?php echo $rows['full_name'] ?></option>
                
                    
                </select>
        </div>

        <div class="form-group col-md-2">
        <label for="inputPassword4"> Semester/ Sequence :
            </label>
            <select  name="sem" onBlur="doCalc(this.form)" required class="form-control">
                <option></option>
            <?php
            $abs=$con->query("SELECT  * from settings_subtype
            ") or die(mysqli_error($con));
            while($row= $abs->fetch_assoc()){ 
            ?>
            
            <option value="<?php echo $row['id'] ?>"  onBlur="doCalc(this.form)"><?php echo $row['sub_name'] ?></option>
        <?php } ?>
                </select>
        </div>


        <div class="form-group col-md-3">
        <label for="inputPassword4"> Academic Year :
            </label>
            <select  name="ayear" onBlur="doCalc(this.form)" required class="form-control">
                <option></option>
            <?php
            $abs=$con->query("SELECT  * from ayear
            ") or die(mysqli_error($con));
            while($row= $abs->fetch_assoc()){ 
            ?>
            
            <option value="<?php echo $row['id'] ?>"  onBlur="doCalc(this.form)"><?php echo $row['cur_ayear'] ?></option>
        <?php } ?>    
                    
                </select>
        </div>


        <div class="form-group col-md-3">
        <label for="inputPassword4"> Campus:
            </label>
            <select  name="campus" onBlur="doCalc(this.form)" required class="form-control">
          <?php $select =$con->query("SELECT * FROM   campus where id='$my_campus_id' ") or die(mysqli_error($con));
        
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
                       <?php } ?>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			