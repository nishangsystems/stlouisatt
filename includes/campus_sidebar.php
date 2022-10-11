
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active">
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Courses Zone  </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

						
							
						<li class="">
								<a href="?all_courses">
									<i class="menu-icon fa fa-caret-right"></i>
									All Courses
								</a>

								<b class="arrow"></b>
							</li>

							
						<li class="">
								<a href="?course_type">
									<i class="menu-icon fa fa-caret-right"></i>
									 Course Types
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="?course_per_level">
									<i class="menu-icon fa fa-caret-right"></i>
									 Courses per Level
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
								<a href="?allocate_course">
									<i class="menu-icon fa fa-home"></i>
									Allocate  Course
								</a>

								<b class="arrow"></b>
							</li>


							
							<li class="">
								<a href="?all_allocations">
									<i class="menu-icon fa fa-caret-right"></i>
									View Allocations
								</a>

								<b class="arrow"></b>
							</li>


							

							<li class="">
								<a href="?course_prog">
									<i class="menu-icon fa fa-caret-right"></i>
									 Program's Courses
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="?topics">
									<i class="menu-icon fa fa-caret-right"></i>
									 Topics 
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="?sub_topics">
									<i class="menu-icon fa fa-caret-right"></i>
									Sub Topics 
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="?course_coverage">
									<i class="menu-icon fa fa-caret-right"></i>
									 Log Books 
								</a>

								<b class="arrow"></b>
							</li>


						


						</ul>
					</li>

				




					<li class="active open">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Attendance
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Record Attendance
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<?php
										
										$select =$con->query("SELECT * FROM   campus  ") or die(mysqli_error($con));

										while($rows=$select->fetch_assoc()){
										  
										?>
								<li class="">
								<a href="?att_bycamp&id=<?php echo $camp_name=$rows['id']; ?>&ggsgsg ">
									<i class="menu-icon fa fa-caret-right"></i>
									<?php echo $camp_name=$rows['camp_name']; ?>
								</a>

								<b class="arrow"></b>
							</li>
							<?PHP  } ?>


								
								</ul>
							</li>




								
							</li>
						</ul>
					</li>




					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>

							<span class="menu-text">
							Lecturers Zone

								
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							

							<li class="">
								<a href="?add_teacher&link=Create Teacher Accounts">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Lecturer
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="?all_teachers&link=All our Lecturers">
									<i class="menu-icon fa fa-caret-right"></i>
									All Lecturers
								</a>

								<b class="arrow"></b>
							</li>

							

						

							
						</ul>
					</li>




					


					

					<li class="active open">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								 Reports
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Teachers Reports
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
								<li class="">
								<a href="?teachers_bymonth">
									<i class="menu-icon fa fa-caret-right"></i>
									By Month
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="?individual&link=Individual Reports">
									<i class="menu-icon fa fa-caret-right"></i>
									Individual Reports
								</a>

								<b class="arrow"></b>
							</li>


								
								</ul>
							</li>

						</ul>


						<ul class="submenu">
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									 Students Reports
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
								<li class="">
								<a href="?stuatt_bycourse">
									<i class="menu-icon fa fa-caret-right"></i>
									By Course
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="?by_month">
									<i class="menu-icon fa fa-caret-right"></i>
									By Month
								</a>

								<b class="arrow"></b>
							</li>


								
								</ul>
							</li>

						</ul>
					</li>


					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>

							<span class="menu-text">
							Course Coverage

								
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							

							<li class="">
								<a href="?coourse_coverage&link=Course Coverage per Semester or Sequence">
									<i class="menu-icon fa fa-caret-right"></i>
									Termal Reports
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="?course_reports&link=View Logbooks and what was taught">
									<i class="menu-icon fa fa-caret-right"></i>
									View Logbooks
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="?course_content&link=Course Content Reports">
									<i class="menu-icon fa fa-caret-right"></i>
									Course Content
								</a>

								<b class="arrow"></b>
							</li>

							

						

							
						</ul>
					</li>


                    

                    


       

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>

							<span class="menu-text">
								Accounts & Users

								
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="?create_users&link=Create Users Accounts">
									<i class="menu-icon fa fa-caret-right"></i>
									Create Users
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="?add_teacher&link=Create Users Accounts">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Teacher
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="?change_password">
									<i class="menu-icon fa fa-caret-right"></i>
									Change Password
								</a>

								<b class="arrow"></b>
							</li>

						

							<li class="">
								<a href="../logout.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Log Out
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>
					</li>
				</ul><!-- /.nav-list -->
              

			

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>