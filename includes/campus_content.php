<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li class="active">Campus Admin for : <span style="color:#f00; font-weight:bold"><?php echo $campus_name; ?></span></li>
							<li class="active"><?php echo $cur_ayear; ?> Academic Year</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
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
								<?php if (isset($_GET['link'])){
									echo $_GET['link'];
								}
								; ?>
							
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php
									if(isset($_GET['all_certi'])){
										include '../Campus/Settings/all_certi.php';
									}
									if(isset($_GET['camp_prog'])){
										include '../Campus/Settings/all_certi.php';
									}
									if(isset($_GET['create_prog'])){
										include '../Campus/Settings/create_prog.php';
									}

									if(isset($_GET['all_campus'])){
										include '../Campus/Settings/all_campus.php';
									}
									
									if(isset($_GET['camp_prog'])){
										include '../Campus/Settings/camp_prog.php';
									}
									if(isset($_GET['create_camp_prog'])){
										include '../Campus/Settings/camp_prog.php';
									}
									if(isset($_GET['course_type'])){
										include '../Campus/Settings/course_type.php';
									}

									if(isset($_GET['add_course'])){
										include '../Campus/Settings/add_course.php';
									}
									if(isset($_GET['course_prog'])){
										include '../Campus/Settings/course_prog.php';
									}

									if(isset($_GET['course_per_level'])){
										include '../Campus/Settings/course_per_level.php';
									}

									if(isset($_GET['confirm_ptype'])){
										include '../Campus/Settings/confirm_ptype.php';
									}
									if(isset($_GET['confirm_gtype'])){
										include '../Campus/Settings/confirm_gtype.php';
									}


									if(isset($_GET['saving_subj'])){
										include '../Campus/Settings/saving_subj.php';
									}
									if(isset($_GET['saving_gensubj'])){
										include '../Campus/Settings/saving_gensubj.php';
									}

									///////////course allocation

									if(isset($_GET['allocate_course'])){
										include '../Campus/Courses/index.php';
									}
									if(isset($_GET['all_courses'])){
										include '../Campus/Courses/all_courses.php';
									}
									if(isset($_GET['update_course'])){
										include '../Campus/Courses/update_course.php';
									}
									if(isset($_GET['assign_course'])){
										include '../Campus/Courses/assign_course.php';
									}

									if(isset($_GET['confirm_it'])){
										include '../Campus/Courses/confirm_it.php';
									}

									if(isset($_GET['assign_to'])){
										include '../Campus/Courses/assign_to.php';
									}
									if(isset($_GET['all_allocations'])){
										include '../Campus/Courses/all_allocations.php';
									}
									if(isset($_GET['view_details'])){
										include '../Campus/Courses/view_details.php';
									}
									if(isset($_GET['topics'])){
										include '../Campus/Courses/topics.php';
									}
									if(isset($_GET['define_topics'])){
										include '../Campus/Courses/define_topics.php';
									}
									if(isset($_GET['sub_topics'])){
										include '../Campus/Courses/sub_topics.php';
									}
									if(isset($_GET['define_subtopics'])){
										include '../Campus/Courses/define_subtopics.php';
									}
									if(isset($_GET['defining_subtopics'])){
										include '../Campus/Courses/defining_subtopics.php';
									}
									if(isset($_GET['course_coverage'])){
										include '../Campus/Courses/course_coverage.php';
									}
									if(isset($_GET['sign_logbook'])){
										include '../Campus/Courses/sign_logbook.php';
									}
									if(isset($_GET['signing_logbook'])){
										include '../Campus/Courses/signing_logbook.php';
									}
									if(isset($_GET['sign_mylogbook'])){
										include '../Campus/Courses/sign_mylogbook.php';
									}
									if(isset($_GET['all_teachers'])){
										include '../Campus/Users/all_teachers.php';
									}
									if(isset($_GET['edit_teacher'])){
										include '../Campus/Users/edit_teacher.php';
									}
									if(isset($_GET['suspend_thisacc'])){
										include '../Campus/Users/suspend_thisacc.php';
									}
									if(isset($_GET['unsuspend_thisacc'])){
										include '../Campus/Users/unsuspend_thisacc.php';
									}




                           ///////////course allocation

						               /***Start Attendance */
									   if(isset($_GET['att_bycamp'])){
										include '../Campus/Attendance/index.php';
									}
									if(isset($_GET['teacher_att'])){
										include '../Campus/Attendance/teacher_att.php';
									}
									
									if(isset($_GET['staffatt_bycamp'])){
										include '../SuperAdmin/Attendance/staffatt_bycamp.php';
									}
									if(isset($_GET['campus_checkin'])){
										include '../SuperAdmin/Attendance/campus_checkin.php';
									}
									if(isset($_GET['teacher_att'])){
										include '../SuperAdmin/Attendance/teacher_att.php';
									}
									


									 /***Start Attendance */
									if(isset($_GET['pmt_mode'])){
										include '../Campus/Settings/course_type.php';
									}
									
									if(isset($_GET['camp_pmt_mode'])){
										include '../Campus/Settings/camp_pmt_mode.php';
									}
									if(isset($_GET['edit_prog'])){
										include '../Campus/Settings/edit_prog.php';
									}
									if(isset($_GET['set_deadline'])){
										include '../Campus/Settings/set_deadline.php';
									}
									
									if(isset($_GET['to_applicants'])){
										include '../Campus/SMS/index.php';
									}
									
									
									
									
									if(isset($_GET['reset_password'])){
										include '../Campus/Settings/reset_password.php';
									}
									if(isset($_GET['approve_pmts'])){
										include '../Campus/Settings/approve_pmts.php';
									}

									if(isset($_GET['approve_this_pmts'])){
										include '../Campus/Settings/approve_this_pmts.php';
									}

									
									if(isset($_GET['edit_rooms'])){
										include '../Campus/Rooms/edit_rooms.php';
									}
								
									
									if(isset($_GET['teachers_bymonth'])){
										include '../Campus/Reports/index.php';
									}
									if(isset($_GET['individual'])){
										include '../Campus/Reports/individual.php';
									}
									if(isset($_GET['my_records'])){
										include '../Campus/Reports/my_records.php';
									}
									if(isset($_GET['my_attendance'])){
										include '../Campus/Reports/my_attendance.php';
									}
									if(isset($_GET['view_myhours'])){
										include '../Campus/Reports/view_myhours.php';
									}
									

									////Course Coverage
									if(isset($_GET['coourse_coverage'])){
										include '../Campus/CourseCoverage/index.php';
									}
									if(isset($_GET['view_coursecov'])){
										include '../Campus/CourseCoverage/view_coursecov.php';
									}
									if(isset($_GET['view_coverage'])){
										include '../Campus/CourseCoverage/view_coverage.php';
									}
									if(isset($_GET['this_course'])){
										include '../Campus/CourseCoverage/this_course.php';
									}
									if(isset($_GET['course_records'])){
										include '../Campus/CourseCoverage/course_records.php';
									}
									if(isset($_GET['course_reports'])){
										include '../Campus/CourseCoverage/course_report.php';
									}
									if(isset($_GET['view_logbook'])){
										include '../Campus/CourseCoverage/view_logbook.php';
									}
									if(isset($_GET['viewing_logbook'])){
										include '../Campus/CourseCoverage/viewing_logbook.php';
									}
									if(isset($_GET['view_thiscourse'])){
										include '../Campus/CourseCoverage/view_thiscourse.php';
									}
									if(isset($_GET['course_content'])){
										include '../Campus/CourseCoverage/course_content.php';
									}
									if(isset($_GET['view_content'])){
										include '../Campus/CourseCoverage/view_content.php';
									}

									if(isset($_GET['excel_upload'])){
										include '../Campus/Students/excel_upload.php';
									}
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									if(isset($_GET['change_password'])){
										include '../Campus/Users/change_password.php';
									}
								
								   if(isset($_GET['change_pwd'])){
										include '../Campus/Users/change_pwd.php';
									}
									
									if(isset($_GET['add_teacher'])){
										include '../Campus/Users/add_teacher.php';
									}
								
								
								   if(isset($_GET['access_others'])){
										include '../Campus/Users/access_others.php';
									}
									  if(isset($_GET['create_users'])){
										include '../Campus/Users/create_users.php';
									}

									if(isset($_GET['change_campus'])){
										include '../Campus/Users/change_campus.php';
									}

									if(isset($_GET['renew_account'])){
										include '../Campus/Users/renew_account.php';
									}
								
								?>
                                
                                
                                
                                
                                
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->