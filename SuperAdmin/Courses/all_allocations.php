                                                          <form method="POST" action="" enctype="multipart/form-data">
                                                             
                                                             <div class="form-row">
                                                                
                                          
                                          
                                                                 <div class="form-group col-md-3">
                                                                 <label for="inputPassword4"> Campus :
                                                                     </label>
                                                                     <select  name="campus" onBlur="doCalc(this.form)" required class="form-control">
                                                                         <option    onBlur="doCalc(this.form)"></option>
                                                                         <?php
                                                                         $select =$con->query("SELECT * FROM   campus") or die(mysqli_error($con));
                                                                     
                                                                         while($rows=$select->fetch_assoc()){
                                                                             ?>
                                                                         <option value="<?php echo $rows['id'] ?>"  onBlur="doCalc(this.form)"><?php echo $rows['camp_name'] ?></option>
                                                                         <?php } ?>
                                                                            
                                                                         </select>
                                                                 </div>
                                          
                                          
                                                                
                                                                 
                                                                 
                                                                 <div class="form-group col-md-3">
                                                                     <label for="inputPassword4">Academic Year</label>
                                                                     
                                                             <select name="year" id="countries-list" class="form-control">
                                                                 <option></option>
                                                             
                                                                     <?php
                                                                     $country_result = $con->query("select * from ayear  ");
                                                                     if ($country_result->num_rows > 0) {
                                                                 // output data of each row
                                                                 while($ro = $country_result->fetch_assoc()) {
                                                                     ?>
                                                                     <option value="<?php echo $ro["id"]; ?>"><?php echo $ro["cur_ayear"]; ?></option>
                                                                     <?php
                                                                 }
                                                             }
                                                             ?>
                                                                     </select>
                                                                     
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
                                        
                                        <?php
                                        if(isset($_POST['save'])){
                                            $campus_id=$_POST['campus'];
                                            $year_id=$_POST['year'];
                                     
                                        ?>
                                        
                                        <div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
										Course Allocation of   <?php 
										
										$select =$con->query("SELECT * FROM   campus where id='".$campus_id."' ") or die(mysqli_error($con));

										while($rows=$select->fetch_assoc()){
										echo $camp_name=$rows['camp_name'];   
											
										}	
										?>
										Campus for 
										
										<?php
										
										$select =$con->query("SELECT * FROM   ayear where id='".$year_id."' ") or die(mysqli_error($con));
										
										while($rows=$select->fetch_assoc()){
										echo $year_name=$rows['cur_ayear'];   
											
										}
										   
										
										?>
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th>Course</th>
														<th>Program</th>
														<th >Level</th>
                                                        <th >Total Hours</th>
                                                        <th >Hrs Allocated</th>
                                                        <th ># of lecturers</th>

														 

														<th></th>
													</tr>
												</thead>

												<tbody>
                                                 <?php
												if($level==2){

													$a = $con->query("SELECT courses.course_title as course_title,
                                                programs.prog_name as prog_name, levels.level as level,
                                                SUM(prog_courses.practical) as practical, 
                                                SUM(prog_courses.lecture) as lecture ,
                                                SUM(prog_courses.tutorials) as tutorials,
                                                SUM(teacher_courses.practicals) as practicals, 
                                                SUM(teacher_courses.lectures) as lectures ,
                                                SUM(teacher_courses.tutorial) as tutorial,
                                                COUNT(teacher_id) as tot_teachers,teacher_courses.id as id,
												teacher_courses.course_id as courseid FROM  
												courses,departments,department_programs,departmen_heads,programs,levels,prog_courses,teacher_courses 
                                                WHERE  teacher_courses.year_id='$year_id' AND 
												departmen_heads.user_id='".$user_id."' AND departmen_heads.dept_id=departments.id
                                                AND department_programs.dept_id=departments.id AND department_programs.prog_id=programs.id
                                                AND teacher_courses.campus_id='$campus_id' AND teacher_courses.course_id=prog_courses.id
                                                AND prog_courses.level_id=levels.id AND prog_courses.prog_id=programs.id AND 
                                                prog_courses.course_id=courses.id GROUP BY prog_courses.course_id,prog_courses.level_id") or die(mysqli_error($con));

												}
												else {

												
												$a = $con->query("SELECT courses.course_title as course_title,
                                                programs.prog_name as prog_name, levels.level as level,
                                                SUM(prog_courses.practical) as practical, 
                                                SUM(prog_courses.lecture) as lecture ,
                                                SUM(prog_courses.tutorials) as tutorials,
                                                SUM(teacher_courses.practicals) as practicals, 
                                                SUM(teacher_courses.lectures) as lectures ,
                                                SUM(teacher_courses.tutorial) as tutorial,
                                                COUNT(teacher_id) as tot_teachers,teacher_courses.id as id,
												teacher_courses.course_id as courseid FROM  courses,programs,levels,prog_courses,teacher_courses 
                                                WHERE  teacher_courses.year_id='$year_id'
                                                AND teacher_courses.campus_id='$campus_id' AND teacher_courses.course_id=prog_courses.id
                                                AND prog_courses.level_id=levels.id AND prog_courses.prog_id=programs.id AND 
                                                prog_courses.course_id=courses.id GROUP BY prog_courses.course_id,prog_courses.level_id") or die(mysqli_error($con));
												}
			
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
														<?php echo $rows['course_title']; ?>
														</td>
														<td><?php echo $rows['prog_name']; ?></td>
														<td> <?php echo $rows['level']; ?></td> 
                                                        <td> <?php echo $rows['practical']+$rows['lecture']+$rows['tutorials']; ?></td> 
                                                        <td> <?php echo $rows['practicals']+$rows['lectures']+$rows['tutorial']; ?></td> 
                                                        <td> <?php echo $rows['tot_teachers']; ?></td> 
                                                        <td>
                                                        
                                                         <a href="?view_details&course_id=<?php echo $rows['courseid']; ?>&yearid=<?php echo $year_id; ?>&campusid=<?php echo $campus_id; ?>&gdhdhd " class=" btn-primary btn-sm">View More  </a>
                                                        	
                                                           
															
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

			
		
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="../assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="../assets/js/jquery.dataTables.min.js"></script>
		<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../assets/js/dataTables.buttons.min.js"></script>
		<script src="../assets/js/buttons.flash.min.js"></script>
		<script src="../assets/js/buttons.html5.min.js"></script>
		<script src="../assets/js/buttons.print.min.js"></script>
		<script src="../assets/js/buttons.colVis.min.js"></script>
		<script src="../assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null,null, null,null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
			
			})
		</script>
	</body>
</html>
<?php } ?>