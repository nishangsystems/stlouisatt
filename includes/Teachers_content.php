<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Welcome</a> <span style="color:#00F"><?php echo $full_name; ?> </span>
							</li>
							<li class="active">Teacher's Dashboard</li>
						    <li class="active">Academic Year : <span
                            style="color:#f00; font-weight:bold"><?php echo $cur_ayear; ?></span></li>
                        
                        </ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<div id="google_translate_element"></div>

	</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Number of Students on Permission: |||| Number of Sick Students: 
							
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php
									if(isset($_GET['all_subjects'])){
										include '../Teachers/Subjects/index.php';
									}
                                    if(isset($_GET['attendance'])){
										include '../Teachers/Attendance/index.php';
									}
                                    if(isset($_GET['goto_attendance'])){
										include '../Teachers/Attendance/goto_attendance.php';
									}
                                    if(isset($_GET['taking_att'])){
										include '../Teachers/Attendance/taking_att.php';
									}

									if(isset($_GET['sign_logbook'])){
										include '../SuperAdmin/Courses/sign_logbook.php';
									}
									if(isset($_GET['signing_logbook'])){
										include '../SuperAdmin/Courses/signing_logbook.php';
									}
									
									if(isset($_GET['sign_mylogbook'])){
										include '../SuperAdmin/Courses/sign_mylogbook.php';
									}
									if(isset($_GET['sign_it'])){
										include '../SuperAdmin/Courses/sign_it.php';
									}
//////Reports
//////Reports
									if(isset($_GET['by_course'])){
										include '../Teachers/Reports/index.php';
									}
									if(isset($_GET['my_attendance'])){
										include '../Teachers/Reports/my_attendance.php';
									}
									if(isset($_GET['my_logbook'])){
										include '../Teachers/Reports/my_logbook.php';
									}
									if(isset($_GET['stuatt_bycourse'])){
										include '../Teachers/Reports/stuatt_bycourse.php';
									}

									if(isset($_GET['stud_attendance'])){
										include '../Teachers/Reports/stud_attendance.php';
									}

									if(isset($_GET['by_month'])){
										include '../Teachers/Reports/by_month.php';
									}
									if(isset($_GET['course_content'])){
										include '../SuperAdmin/CourseCoverage/view_content.php';
									}
									

									
									
								
								?>
                                
                                
                                
                                
                                
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->