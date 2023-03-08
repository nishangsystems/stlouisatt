<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
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
										include '../SuperAdmin/Settings/all_certi.php';
									}
									if(isset($_GET['camp_prog'])){
										include '../SuperAdmin/Settings/all_certi.php';
									}
									if(isset($_GET['create_prog'])){
										include '../SuperAdmin/Settings/create_prog.php';
									}
									if(isset($_GET['create_dept'])){
										include '../SuperAdmin/Settings/create_dept.php';
									}
									if(isset($_GET['all_campus'])){
										include '../SuperAdmin/Settings/all_campus.php';
									}

									if(isset($_GET['all_depts'])){
										include '../SuperAdmin/Settings/all_depts.php';
									}
									
									if(isset($_GET['camp_prog'])){
										include '../SuperAdmin/Settings/camp_prog.php';
									}
									if(isset($_GET['create_camp_prog'])){
										include '../SuperAdmin/Settings/camp_prog.php';
									}

									if(isset($_GET['create_dept_prog'])){
										include '../SuperAdmin/Settings/dept_prog.php';
									}
									if(isset($_GET['course_type'])){
										include '../SuperAdmin/Settings/course_type.php';
									}

									if(isset($_GET['add_course'])){
										include '../SuperAdmin/Settings/add_course.php';
									}
									if(isset($_GET['course_prog'])){
										include '../SuperAdmin/Settings/course_prog.php';
									}

									if(isset($_GET['course_per_level'])){
										include '../SuperAdmin/Settings/course_per_level.php';
									}

									if(isset($_GET['confirm_ptype'])){
										include '../SuperAdmin/Settings/confirm_ptype.php';
									}
									if(isset($_GET['confirm_gtype'])){
										include '../SuperAdmin/Settings/confirm_gtype.php';
									}


									if(isset($_GET['saving_subj'])){
										include '../SuperAdmin/Settings/saving_subj.php';
									}
									if(isset($_GET['saving_gensubj'])){
										include '../SuperAdmin/Settings/saving_gensubj.php';
									}

									///////////course allocation

									if(isset($_GET['allocate_course'])){
										include '../SuperAdmin/Courses/index.php';
									}
									if(isset($_GET['all_courses'])){
										include '../SuperAdmin/Courses/all_courses.php';
									}
									if(isset($_GET['update_course'])){
										include '../SuperAdmin/Courses/update_course.php';
									}
									if(isset($_GET['assign_course'])){
										include '../SuperAdmin/Courses/assign_course.php';
									}

									if(isset($_GET['confirm_it'])){
										include '../SuperAdmin/Courses/confirm_it.php';
									}

									if(isset($_GET['assign_to'])){
										include '../SuperAdmin/Courses/assign_to.php';
									}
									if(isset($_GET['all_allocations'])){
										include '../SuperAdmin/Courses/all_allocations.php';
									}
									if(isset($_GET['view_details'])){
										include '../SuperAdmin/Courses/view_details.php';
									}
									if(isset($_GET['topics'])){
										include '../SuperAdmin/Courses/topics.php';
									}
									if(isset($_GET['define_topics'])){
										include '../SuperAdmin/Courses/define_topics.php';
									}
									if(isset($_GET['sub_topics'])){
										include '../SuperAdmin/Courses/sub_topics.php';
									}
									if(isset($_GET['define_subtopics'])){
										include '../SuperAdmin/Courses/define_subtopics.php';
									}
									if(isset($_GET['defining_subtopics'])){
										include '../SuperAdmin/Courses/defining_subtopics.php';
									}
									if(isset($_GET['course_coverage'])){
										include '../SuperAdmin/Courses/course_coverage.php';
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
									if(isset($_GET['all_teachers'])){
										include '../SuperAdmin/Users/all_teachers.php';
									}
									if(isset($_GET['edit_teacher'])){
										include '../SuperAdmin/Users/edit_teacher.php';
									}
									if(isset($_GET['suspend_thisacc'])){
										include '../SuperAdmin/Users/suspend_thisacc.php';
									}
									if(isset($_GET['unsuspend_thisacc'])){
										include '../SuperAdmin/Users/unsuspend_thisacc.php';
									}

									if(isset($_GET['setashod'])){
										include '../SuperAdmin/Users/setashod.php';
									}




                           ///////////course allocation

						               /***Start Attendance */
									   if(isset($_GET['att_bycamp'])){
										include '../SuperAdmin/Attendance/index.php';
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
										include '../SuperAdmin/Settings/course_type.php';
									}
									
									if(isset($_GET['camp_pmt_mode'])){
										include '../SuperAdmin/Settings/camp_pmt_mode.php';
									}
									if(isset($_GET['edit_prog'])){
										include '../SuperAdmin/Settings/edit_prog.php';
									}
									if(isset($_GET['set_deadline'])){
										include '../SuperAdmin/Settings/set_deadline.php';
									}
									
									if(isset($_GET['to_applicants'])){
										include '../SuperAdmin/SMS/index.php';
									}
									
									
									
									
									if(isset($_GET['reset_password'])){
										include '../SuperAdmin/Settings/reset_password.php';
									}
									if(isset($_GET['approve_pmts'])){
										include '../SuperAdmin/Settings/approve_pmts.php';
									}

									if(isset($_GET['approve_this_pmts'])){
										include '../SuperAdmin/Settings/approve_this_pmts.php';
									}

									
									if(isset($_GET['edit_rooms'])){
										include '../SuperAdmin/Rooms/edit_rooms.php';
									}
								
									
									if(isset($_GET['teachers_bymonth'])){
										include '../SuperAdmin/Reports/index.php';
									}
									if(isset($_GET['individual'])){
										include '../SuperAdmin/Reports/individual.php';
									}
									if(isset($_GET['my_records'])){
										include '../SuperAdmin/Reports/my_records.php';
									}
									if(isset($_GET['my_attendance'])){
										include '../SuperAdmin/Reports/my_attendance.php';
									}
									if(isset($_GET['view_myhours'])){
										include '../SuperAdmin/Reports/view_myhours.php';
									}

									if(isset($_GET['fulltime_bymonth'])){
										include '../SuperAdmin/Reports/fulltime_bymonth.php';
									}
									if(isset($_GET['fulltime_byhour'])){
										include '../SuperAdmin/Reports/fulltime_byhours.php';
									}

									if(isset($_GET['fulltime_late'])){
										include '../SuperAdmin/Reports/fulltime_late.php';
									}
									

									////Course Coverage
									if(isset($_GET['coourse_coverage'])){
										include '../SuperAdmin/CourseCoverage/index.php';
									}
									if(isset($_GET['view_coursecov'])){
										include '../SuperAdmin/CourseCoverage/view_coursecov.php';
									}
									if(isset($_GET['view_coverage'])){
										include '../SuperAdmin/CourseCoverage/view_coverage.php';
									}
									if(isset($_GET['this_course'])){
										include '../SuperAdmin/CourseCoverage/this_course.php';
									}
									if(isset($_GET['course_records'])){
										include '../SuperAdmin/CourseCoverage/course_records.php';
									}
									if(isset($_GET['course_reports'])){
										include '../SuperAdmin/CourseCoverage/course_report.php';
									}
									if(isset($_GET['view_logbook'])){
										include '../SuperAdmin/CourseCoverage/view_logbook.php';
									}
									if(isset($_GET['viewing_logbook'])){
										include '../SuperAdmin/CourseCoverage/viewing_logbook.php';
									}
									if(isset($_GET['view_thiscourse'])){
										include '../SuperAdmin/CourseCoverage/view_thiscourse.php';
									}
									if(isset($_GET['course_content'])){
										include '../SuperAdmin/CourseCoverage/course_content.php';
									}
									if(isset($_GET['view_content'])){
										include '../SuperAdmin/CourseCoverage/view_content.php';
									}

									if(isset($_GET['excel_upload'])){
										include '../SuperAdmin/Students/excel_upload.php';
									}
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									if(isset($_GET['change_password'])){
										include '../SuperAdmin/Users/change_password.php';
									}
								
								   if(isset($_GET['change_pwd'])){
										include '../SuperAdmin/Users/change_pwd.php';
									}
									
									if(isset($_GET['add_teacher'])){
										include '../SuperAdmin/Users/add_teacher.php';
									}
								
								
								   if(isset($_GET['access_others'])){
										include '../SuperAdmin/Users/access_others.php';
									}
									  if(isset($_GET['create_users'])){
										include '../SuperAdmin/Users/create_users.php';
									}

									if(isset($_GET['change_campus'])){
										include '../SuperAdmin/Users/change_campus.php';
									}

									if(isset($_GET['renew_account'])){
										include '../SuperAdmin/Users/renew_account.php';
									}
								
								?>
                                
                                
                                
                                
                                
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->