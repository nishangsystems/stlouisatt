<?php include 'includes/functions.php';

 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>ST LOUIS APPLICATION PORTAL</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
				
					
					
					<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container" style="text-align:center">
				
				<div class="navbar-header pull-left" >
					<a href="index.php" class="navbar-brand"  style="text-align:center">
						<small>
							
							ST LOUIS UNIVERSITY INSTITUTE APPLICATION SYSTEM
						</small>
					</a>
				</div>

				
			</div><!-- /.navbar-container -->
		</div>
					
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-book green"></i>
									
									<span class="white" id="id-text2"> APPLICATION PORTAL</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; POWERED BY NISHANG SYSTEMS PLC</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>
											<form method="POST" action="">
                                            <?php 
											CreateUsers($year_id);
											$msg="";	
											?>
												<fieldset>
													

													<label class="block clearfix">
                                                      <label for="inputEmail4">Full Name (As on Your Birth Certificate) </label>
														<span class="block input-icon input-icon-right">
															<input type="text" name="name" class="form-control" placeholder="Full Name (As on Your Birth Certificate" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
                                                    
                                                    <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                        <label for="inputEmail4">Your Email:  </label>
															<input type="email" name="email" class="form-control" placeholder="Email" required />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>
                                                    
                                                    <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                        <label for="inputEmail4">Your Phone Number:  </label>
															<input type="text" name="tel" max="9" class="form-control" placeholder="679135426" required />
															<i class="ace-icon fa fa-phone"></i>
														</span>
													</label>
													
													
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                          <label for="inputEmail4">Password:  </label>
															<input type="password" name="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>
												
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                         <label for="inputEmail4">Repeat Password:  </label>
															<input type="password" name="password1" class="form-control" placeholder="Repeat password" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</label>

													<input type="hidden" name="year_id" value="<?php echo $year_id; ?>" class="form-control" placeholder="Repeat password" />
													
											

													<div class="space-24"></div>

													<div class="clearfix">
														

														<button type="submit" name="btn-signup" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">Register</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="index.php" class="back-to-login-link" style="font-size:20px; color:#fff">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->
										<div class="toolbar center">
											
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
