<?php
   

   $con = mysqli_connect('localhost','nishang','google1234','stlouis_att');
   //    $con = mysqli_connect('localhost','u174391244_attendance','Cpadmin@123','u174391244_attendance');
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

	function db () {
		$conns = mysqli_connect ("localhost", "u182156984_graciousys", "Letgracious1n!", "u182156984_graciousys");
		}


	// $dbcon =  mysqli_connect('localhost','u174391244_attendance','Cpadmin@123','u174391244_attendance'); 
	$dbcon = mysqli_connect('localhost','nishang','google1234','stlouis_att');    //// online sys    
       
	 // Check connection
	 if (mysqli_connect_errno())
	 {
	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 }
	 
	 /*
	 
   //$con = mysqli_connect('localhost','nishang','google1234','stlouis_att');
      $con = mysqli_connect('localhost','u174391244_attendance','Cpadmin@123','u174391244_attendance');
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

	function db () {
		$conns = mysqli_connect ("localhost", "u182156984_graciousys", "Letgracious1n!", "u182156984_graciousys");
		}


     $dbcon =  mysqli_connect('localhost','u174391244_attendance','Cpadmin@123','u174391244_attendance'); 
	//$dbcon = mysqli_connect('localhost','nishang','google1234','stlouis_att');    //// online sys    
       
	 // Check connection
	 if (mysqli_connect_errno())
	 {
	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 }
	 
    */
    
		  
    function dbcon(){
	  static $conn;
    if ($conn===NULL){ 
        $conn = mysqli_connect ('localhost','nishang','google1234','stlouis_att');
		//$conn = mysqli_connect ('localhost','u174391244_attendance','Cpadmin@123','u174391244_attendance');
    }
    return $conn;
    }
		  
    function unicon(){
		static $conn;
	  if ($conn===NULL){ 
		  $conn = mysqli_connect ('localhost','nishang','google1234','stlouis_att');
		//  $conn = mysqli_connect ('localhost','u174391244_attendance','Cpadmin@123','u174391244_attendance');   ;
	  }
	  return $conn;
	  }
	date_default_timezone_set('Africa/Douala');
	//	date_default_timezone_set('Africa/Douala');
	$query = $con->query("SELECT * FROM ayear WHERE status='1'  " ) or die(mysqli_error($con));

    while ($userRow = $query->fetch_array()) {

        $year_id = $userRow['id'];
        
    }
	function Login($year_id){
		$con= dbcon();
	
			if (isset($_POST['doLogin'])) {
				
				$email = strip_tags($_POST['usr_email']);
				$password = strip_tags($_POST['password']);
				
				$email = $con->real_escape_string($email);
				$password = $con->real_escape_string($password);
				
				$query = $con->query("SELECT * FROM users WHERE user_name='$email'
				AND approved='0' ") or die(mysqli_error($con));
				$row=$query->fetch_array();
				
				 $count = $query->num_rows; // if email/password are correct returns must be 1 row
				
				if (password_verify($password, $row['pwd']) && $count==1)
				 {
					 
					 
				echo $_SESSION['userSession'] = $row['id'];
					
				
				
				////get the email of the user using the session_id  
					
			$query =$con->query("SELECT * FROM users WHERE id=".$_SESSION['userSession']." ") or die(mysqli_error($con));
			
			 while($userRow=$query->fetch_array()){
			 
			 $email=$userRow['user_email'];
			 $status=$userRow['user_level'];
			 
			 }
			
			
			 
			 ////////////////
			 $query =$con->query("SELECT * FROM sectors WHERE area='$status'  ") or die(mysqli_error($con));
			 
			 while($userRow=$query->fetch_array()){
			 
			 $link=$userRow['link'];
			 
					echo '<meta http-equiv="Refresh" content="0; url='.$link.'">';
			  
			 
			 }
			 
			 /////////////////
			
				  
					echo '<meta http-equiv="Refresh" content="0; url='.$link.'">';
			  
			  
				} 
				else {
					echo $msg = "<div class='alert alert-danger'>
								<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
							</div>";
				}
				$con->close();
			}
	}
	
	
	
	function CreateUsers(){
		
			$con= dbcon();
			if(isset($_POST['btn-signup'])) {
				
				
				$uname = ucwords($_POST['name']);
				
				$email = strip_tags($_POST['email']);
				$upass = strip_tags($_POST['password']);
			    $upass2 = strip_tags($_POST['password2']);
				$uname = $con->real_escape_string($uname);
				$email = $con->real_escape_string($email);
				$upass = $con->real_escape_string($upass);
				
				$tel = $con->real_escape_string($tel);
				$ip=$_SERVER['REMOTE_ADDR'];	
				$words = explode(" ", $uname);
				$your_email=$_POST['email'];
				$firstname = $words[0];
				$lastname = strtolower($words[1]);
				$third_word = strtolower($words[2]);
				$name=gethostname();
				$email=$lastname.$third_word."@gracious.org";
				$user_level=$_POST['level'];
				$campus_id=$_POST['campus'];
				
			
			    $email_exists= $con->query("SELECT * FROM  users WHERE user_email='$your_email' ") or die(mysqli_error($con));
				
				//get OS
				$os= php_uname();
				if($upass!=$upass2){
					echo $msg = "<div class='alert alert-danger'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; ERROR.PASSWORD DOES NOT MATCH !
								</div>";
				}

				
				
				
				elseif ($email_exists->num_rows>0){
					echo $msg = "<div class='alert alert-danger'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; ERROR. ".$your_email." has been used already
								</div>";
				}
				elseif (strlen($upass)<6){
					echo $msg = "<div class='alert alert-danger'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; ERROR.Your Password must be at least 7 characters long!
								</div>";
				}
				else if($tel<9 && $tel>9){
					echo $msg = "<div class='alert alert-danger'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; ERROR.Telephone Number must be exactly 9 characters Long
								</div>";
				}
				
				
				else {
				
				$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
				
				$check_email = $con->query("SELECT user_name FROM users WHERE user_name='$your_email'");
				$count=$check_email->num_rows;
				
				if ($count==0) {
					
					$query = $con->query("INSERT INTO users set full_name='$uname',user_name='$your_email',user_email='$your_email',
					pwd='$hashed_password',user_level='$user_level',banned='$user_level',ctime='$upass',date=now(),users_ip='$ip'
					,md5_id='$os',year_id='$year',campus_id='$campus_id',tel='$tel' ,institutional_email='$email'") or die(mysqli_error($con));
			
						$msg = "<div class='alert alert-success'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
								</div>";
								echo "<script>alert('User Successfully Created')</script>";		
								
				 echo '<meta http-equiv="Refresh" content="0; url=index.php?create_users&link=Create%20Users%20Accounts">';
					
				}
				 else {
					
					
					echo $msg = "<div class='alert alert-danger'>
								<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry User Name already taken !
							</div>";
							echo '<meta http-equiv="Refresh" content="0; url=?create_users&link=Create%20Users%20Accounts">';
						
				}
					
				$con->close();
			}
			}
	       }


		   function CreateUsersAdmin(){
		
			$con= dbcon();
			if(isset($_POST['btn-signup'])) {
				
				
				$uname =$con->real_escape_string(ucwords($_POST['name']));
				$upass = 12345678;
			    $upass2 = 12345678;
				$words = explode(" ", $uname);
				
				$firstname = $words[0];
				$lastname = strtolower($words[1]);
				$third_word = strtolower($words[2]);
				
				$email=$lastname.$third_word."@gracious.org";
				$uname = $con->real_escape_string($uname);
				$email = $con->real_escape_string($email);
				$upass = $con->real_escape_string($upass);
				
				$ip=$_SERVER['REMOTE_ADDR'];	
				$tel=$_POST['tel'];
				$campus_id=$_POST['campus'];
				$name=gethostname();
				$user_level=2;
				$query= $con->query("SELECT * FROM  serial_num ") or die(mysqli_error($con));
				while($rows=$query->fetch_assoc()){
					$last_num=$rows['last'];
				}
				$counting=$last_num;
				if($counting<10){
					$num="00".$counting;

				}
				else if($counting<100){
					$num="0".$counting;

				}
				else {
					$num=$counting;

				}
				$code="SLUI".$num;
				
			    $email_exists= $con->query("SELECT * FROM  users WHERE user_email='$email' ") or die(mysqli_error($con));
				
			    $name_exists= $con->query("SELECT * FROM  users WHERE full_name='$uname' ") or die(mysqli_error($con));
				$matricule_exists= $con->query("SELECT * FROM  users WHERE user_name='$code' ") or die(mysqli_error($con));
				$yes_exitx=$matricule_exists->num_rows;
				//get OS
				$os= php_uname();
				if($upass!=$upass2){
					echo $msg = "<div class='alert alert-danger'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; ERROR.PASSWORD DOES NOT MATCH !
								</div>";
				}

				
				elseif ($email_exists->num_rows>0){
					echo $msg = "<div class='alert alert-danger'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; ERROR. ".$email." has been used already
								</div>";
				}
				elseif (strlen($upass)<6){
					echo $msg = "<div class='alert alert-danger'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; ERROR.Your Password must be at least 7 characters long!
								</div>";
				}
				else if($name_exists->num_rows>0){
					echo "<script>alert('ERROR. That name already Exists in the System')</script>";
				}
				else if($yes_exitx>0){
					echo "<script>alert('ERROR. Duplication of Code ".$code." ')</script>";
				}
				
				
				
				
				else {
				
				$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
				
				$check_email = $con->query("SELECT user_name FROM users WHERE user_name='$your_email'");
				$count=$check_email->num_rows;
				
				if ($count==0) {
					
					$query = $con->query("INSERT INTO users set full_name='$uname',user_name='$code',user_email='$email',
					pwd='$hashed_password',user_level='$user_level',banned='$user_level',ctime='$upass',date=now(),users_ip='$ip'
					,md5_id='$os',year_id='$year',tel='$tel' ,campus_id='$campus_id' ") or die(mysqli_error($con));
					
			        $query= $con->query("UPDATE serial_num SET last=last+1 ") or die(mysqli_error($con));
			
						$msg = "<div class='alert alert-success'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
								</div>";
								echo "<script>alert('User Successfully Created')</script>";		
								
				 echo '<meta http-equiv="Refresh" content="0; url=?add_teacher&link=Create Teachers Account">';
					
				}
				 else {
					
					
					echo $msg = "<div class='alert alert-danger'>
								<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry User Name already taken !
							</div>";
						
				 echo '<meta http-equiv="Refresh" content="0; url=?add_teacher&link=Create Teachers Account">';
					
						
				}
					
				$con->close();
			}
			}
	       }
		   
	 function UpdateTeacher($id){
				
			$con= dbcon();									 
			if(isset($_POST['submit'] ) )
			{ 
			
			$uname=$con->real_escape_string(ucwords($_POST['name']));
			$tel=$_POST['tel'];
			
			$query = $con->query("UPDATE users set full_name='$uname',tel='$tel' WHERE id='$id'  ") or die(mysqli_error($con));
	
		echo "<script>alert('Update Successfully . Thank You')</script>";		
						
		 echo '<meta http-equiv="Refresh" content="0; url=?all_teachers&link=All%20our%20Lecturers">';
			}
		}

		function SuspendTeacher($id){
				
			$con= dbcon();									 
			if(isset($_POST['submit'] ) )
			{ 
			
			
			$query = $con->query("UPDATE users set approved='1' WHERE id='$id'  ") or die(mysqli_error($con));
	
		echo "<script>alert(' Account Successfully Suspended . Thank You')</script>";		
						
		 echo '<meta http-equiv="Refresh" content="0; url=?all_teachers&link=All%20our%20Lecturers">';
			}
		}


		function hod($id){
				
			$con= dbcon();									 
			if(isset($_POST['submit'] ) )
			{ 
			$campus_id=$_POST['campus'];
			$dept_id=$_POST['dept'];
			$query1 = $con->query("SELECT * FROM departmen_heads where user_id='$id'
			  ") or die(mysqli_error($con));
			$count=$query1->num_rows;
			if($count>0){
				echo "<script>alert('Sorry a Teacher can be HOD for one Department Only')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?setashod&xxc='.$id.'&link=Change%20Password">';

			}
			else {
	
			$query = $con->query("INSERT INTO departmen_heads SET user_id='$id'
			,campus_id='$campus_id' , dept_id='$dept_id'  ") or die(mysqli_error($con));
	
						
		 echo '<meta http-equiv="Refresh" content="0; url=?setashod&xxc='.$id.'&link=Change%20Password">';
			}
		}
	}
		function UnSuspendTeacher($id){
				
			$con= dbcon();									 
			if(isset($_POST['submit'] ) )
			{ 
			
			
			$query = $con->query("UPDATE users set approved='0' WHERE id='$id'  ") or die(mysqli_error($con));
	
		echo "<script>alert(' Account Successfully Reactivated. Thank You')</script>";		
						
		 echo '<meta http-equiv="Refresh" content="0; url=?all_teachers&link=All%20our%20Lecturers">';
			}
		}

		  
		function ChangePwd(){
				
			$con= dbcon();									 
			if(isset($_POST['submit'] ) )
			{ 
			
			$pass1=$_POST['pwd'];
			$pass2=$_POST['pwd2'];
			$upass =$_POST['pwd'];
			if($pass1!=$pass2){
				echo "<script>alert('ERROR. Paaswords does not Match')</script>";
			}
			else {
			
			 $sha1pass = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
			
			
			
			if(empty($err)) {
			
			 $sql_insert =$con->query( "UPDATE users set  pwd='$sha1pass',address='$pass1' where id='".$_GET['xxc']."'") or die(mysqli_error($con));
			
			echo "<script>alert('Thank you very much')
							</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?reset_password&link=Change Password">';
			}
			
			}
			}
		}
		   
		function CreateProg(){
		
		$con= dbcon();
			if(isset($_POST['save'])){
				$prog=strtoupper($_POST['program']);
				$abb=strtoupper($_POST['abb']);
				$deg_id=$_GET['id'];
				$duration=$_POST['duration'];
				$camp_id=$_GET['camp_id'];
			$select =$con->query("SELECT * FROM  programs WHERE  prog_name='$prog' AND degree_id='$deg_id' AND campus_id='$camp_id' ") or die(mysqli_error($con));	
			echo $counts=$select->num_rows;	
			if($counts>0){
				echo "<script>alert('ERROR. Name already Exist in the System')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?create_prog&id='.$deg_id.'&camp_id='.$camp_id.'">';
			}
			else {
			$query =$con->query("INSERT INTO programs set prog_name='$prog',degree_id='$deg_id',duration='$duration',campus_id='$camp_id',serial='1',dept_code='$abb' ") or die(mysqli_error($con));
			echo '<meta http-equiv="Refresh" content="0; url=?create_prog&id='.$deg_id.'&camp_id='.$camp_id.'">';
			}
			}
	}

	function CreateDept(){
		
		$con= dbcon();
			if(isset($_POST['save'])){
				$prog=strtoupper($_POST['program']);
				
			$select =$con->query("SELECT * FROM  departments WHERE  dept_name='$prog'  ") or die(mysqli_error($con));	
			echo $counts=$select->num_rows;	
			if($counts>0){
				echo "<script>alert('ERROR. Name already Exist in the System')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?create_dept&id ">';
			}
			else {
			$query =$con->query("INSERT INTO departments set dept_name='$prog' ") or die(mysqli_error($con));
			echo '<meta http-equiv="Refresh" content="0; url=?create_dept&id ">';
		}
			}
	}


	       function CreatePayOption(){
		
		    $con= dbcon();
			if(isset($_POST['save'])){
				$option=strtoupper($_POST['mode']);
				$camp_id=$_GET['id'];
				
			$select =$con->query("SELECT * FROM  payment_options WHERE  option_name='$option' AND campus_id='$camp_id' ") or die(mysqli_error($con));	
			echo $counts=$select->num_rows;	
			if($counts>0){
				echo "<script>alert('ERROR. Name already Exist in the System')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?camp_pmt_mode&id='.$camp_id.'">';
			}
			else {
			$query =$con->query("INSERT INTO payment_options set option_name='$option' , campus_id='$camp_id'") or die(mysqli_error($con));
			echo '<meta http-equiv="Refresh" content="0; url=?camp_pmt_mode&id='.$camp_id.'">';
			}
			}
	        }
	
       function SaveCourseType(){
		
		$con= dbcon();
			if(isset($_POST['save'])){
				$name=$con->real_escape_string ($_POST['name']);
				$select =$con->query("SELECT * FROM  course_types WHERE  ctype_name='$name' ") or die(mysqli_error($con));	
			 $counts=$select->num_rows;	
			if($counts>0){
				echo "<script>alert('ERROR. Name already Exist in the System')</script>";
				echo '<meta http-equiv="Refresh" content="0; url=?course_type">';
			}
			else {
				
			$select =$con->query("INSERT INTO  course_types SET  ctype_name='$name' ") or die(mysqli_error($con));				
				echo "<script>alert('SAVING SUCCESSFUL')</script>";
			    echo '<meta http-equiv="Refresh" content="0; url=?course_type">';
			
			}
		}
          }

		  function CampusProg(){
			
		
			$con= dbcon();
				if(isset($_POST['save'])){
					
					$prog_id=$_POST['prog_id'];				
					$camp_id=$_GET['id'];
					
				$select =$con->query("SELECT * FROM campus_programs WHERE  prog_id='$prog_id' AND campus_id='$camp_id' ") or die(mysqli_error($con));	
				echo $counts=$select->num_rows;	
				if($counts>0){
					echo "<script>alert('ERROR. Program Already Exists')</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?camp_prog&id='.$camp_id.'">';
				}
				else {
				$query =$con->query("INSERT INTO campus_programs  set prog_id='$prog_id',campus_id='$camp_id' ") or die(mysqli_error($con));
				echo '<meta http-equiv="Refresh" content="0; url=?create_camp_prog&id='.$camp_id.'">';
				}
				}
		}

		function DeptProg(){
			
		
			$con= dbcon();
				if(isset($_POST['save'])){
					
					$prog_id=$_POST['prog_id'];				
					$dept_id=$_GET['id'];
					
				$select =$con->query("SELECT * FROM department_programs WHERE  prog_id='$prog_id' AND dept_id='$dept_id' ") or die(mysqli_error($con));	
				echo $counts=$select->num_rows;	
				if($counts>1){
					echo "<script>alert('ERROR. Program Already Exists under a department')</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?create_dept_prog&id='.$dept_id.'">';
				}
				else {
				$query =$con->query("INSERT INTO department_programs  set prog_id='$prog_id',dept_id='$dept_id' ") or die(mysqli_error($con));
				echo '<meta http-equiv="Refresh" content="0; url=?create_dept_prog&id='.$dept_id.'">';
				}
				}
		}

		  function UpdateCourseType(){
		
			$con= dbcon();
				if(isset($_POST['save_update'])){

					$name=$con->real_escape_string ($_POST['name']);
					$id=$_POST['id'];
					
					
				$select =$con->query("UPDATE  course_types SET  ctype_name='$name' WHERE id='$id' ") or die(mysqli_error($con));				
					echo "<script>alert('UPDATE SUCCESSFUL')</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?course_type">';
				
			
			}
			  }
		

			  
			  function SaveCourse(){
		
				$con= dbcon();
					if(isset($_POST['save'])){
						$title=$con->real_escape_string ($_POST['title']);
						$code=$con->real_escape_string ($_POST['code']);
						$cv=$con->real_escape_string ($_POST['cv']);
						$status=$con->real_escape_string ($_POST['status']);
						$select =$con->query("SELECT * FROM  courses WHERE  course_code='$code' ") or die(mysqli_error($con));	
					 $counts=$select->num_rows;	
					if($counts>0){
						echo "<script>alert('ERROR. Name already Exist in the System')</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?add_course&add_id='.$_GET['add_id'].'&Adding">';
					}
					else {
						
					$select =$con->query("INSERT INTO  courses SET  course_title='$title',
					course_code='$code', cv='$cv',status='$status',course_type_id='".$_GET['add_id']."' ") or die(mysqli_error($con));				
						echo "<script>alert('SAVING SUCCESSFUL')</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?add_course&add_id='.$_GET['add_id'].'&Adding">';
					
					}
				}
				  }

				function UpdateCourse(){
	
				$con= dbcon();
					if(isset($_POST['save_update'])){
						$title=$con->real_escape_string ($_POST['title']);
						$code=$con->real_escape_string ($_POST['code']);
						$cv=$con->real_escape_string ($_POST['cv']);
						$status=$con->real_escape_string ($_POST['status']);
					
					$select =$con->query("UPDATE  courses SET  course_title='$title',
					course_code='$code', cv='$cv',status='$status',course_type_id='".$_GET['add_id']."' WHERE id='".$_GET['edit_id']."' ") or die(mysqli_error($con));				
						echo "<script>alert('UPDATING SUCCESSFUL')</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?add_course&add_id='.$_GET['add_id'].'&Adding">';
					
					
				}
					}


			function ProgCourse(){

				$con= dbcon();
					if(isset($_POST['save'])){
						$level=$_GET['level_id'];
						$campus=$_GET['camp_id'];
						$seqtype=$_GET['sem_type'];
						$sem=$_GET['sem'];
						$prog_id=$_GET['prog_id'];
						$course_id=$_POST['course'];
						$select =$con->query("SELECT * FROM  courses WHERE id='$course_id' ") or die(mysqli_error($con));	
						while($rows=$select->fetch_assoc()){
							$lecture=$rows['lecture'];
							$tutorials=$rows['tutorials'];
						   $practicals=$rows['practicals'];

						}
						
				 
						$select =$con->query("SELECT * FROM  prog_courses WHERE  prog_id='$prog_id'
						AND course_id='$course_id' AND sem_id='$sem' and level_id='$level' ") or die(mysqli_error($con));	
					 $counts=$select->num_rows;	
					if($counts>0){
						echo "<script>alert('ERROR. CXourse already Exist in the System')</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?saving_subj&sem='.$_GET['sem'].'&sem_type='.$_GET['sem_type'].'&prog_id='.$_GET['prog_id'].'&year_id='.$_GET['year_id'].'&level_id='.$_GET['level_id'].'&camp_id='.$_GET['camp_id'].'&gdgddh">';
					}
					else {
						
					$select =$con->query("INSERT INTO  prog_courses SET  prog_id='$prog_id'
					,course_id='$course_id',sem_id='$sem',level_id='$level' ,type_id='$seqtype' ,practical='$practicals',
					lecture='$lecture',tutorials='$tutorials'") or die(mysqli_error($con));				
					//	echo "<script>alert('SAVING SUCCESSFUL')</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?saving_subj&sem='.$_GET['sem'].'&sem_type='.$_GET['sem_type'].'&prog_id='.$_GET['prog_id'].'&year_id='.$_GET['year_id'].'&level_id='.$_GET['level_id'].'&camp_id='.$_GET['camp_id'].'&gdgddh">';
					
					}
				}
					}
				
			

			function DeleteCourse(){

				$con= dbcon();
					if(isset($_GET['del'])){
						$id=$_GET['del'];
					
						
					$select =$con->query("DELETE FROM  prog_courses where id='".$id."' ") or die(mysqli_error($con));				
						echo "<script>alert('COURSE SUCCESSFULLY DELETED')</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?saving_subj&sem='.$_GET['sem'].'&sem_type='.$_GET['sem_type'].'&prog_id='.$_GET['prog_id'].'&year_id='.$_GET['year_id'].'&level_id='.$_GET['level_id'].'&camp_id='.$_GET['camp_id'].'&gdgddh">';
				
				}
					}


			function UpdateThisCourse(){

				$con= dbcon();
					if(isset($_POST['save_updates'])){
						$level=$_GET['level_id'];
						$campus=$_GET['camp_id'];
						$seqtype=$_GET['sem_type'];
						$sem=$_GET['sem'];
						$prog_id=$_GET['prog_id'];
						$course_id=$_POST['course'];
						$lecture=$_POST['lecture'];
						$tutorials=$_POST['tutorials'];
						$practicals=$_POST['practicals'];
				
						
					$select =$con->query("UPDATE prog_courses SET  practical='$practicals',
					lecture='$lecture',tutorials='$tutorials' WHERE id='".$_GET['edit']."'
					 ") or die(mysqli_error($con));				
						
								
					$select =$con->query("UPDATE courses SET  practical='$practicals',
					lecture='$lecture',tutorials='$tutorials' WHERE id='".$course_id."'
					 ") or die(mysqli_error($con));				
						echo "<script>alert('UPDATE SUCCESSFUL')</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?saving_subj&sem='.$_GET['sem'].'&sem_type='.$_GET['sem_type'].'&prog_id='.$_GET['prog_id'].'&year_id='.$_GET['year_id'].'&level_id='.$_GET['level_id'].'&camp_id='.$_GET['camp_id'].'&gdgddh">';
					
					
					
				}
					}



					function CourseUpdate(){

						$con= dbcon();
							if(isset($_POST['save'])){
							
								$course_id=$_POST['course'];
								$lecture=$_POST['lecture'];
								$tutorials=$_POST['tutorials'];
								$practicals=$_POST['practicals'];
						
										
							$select =$con->query("UPDATE courses SET  practical='$practicals',
							lecture='$lecture',tutorials='$tutorials' WHERE id='".$course_id."'
							 ") or die(mysqli_error($con));				
								echo "<script>alert('UPDATE SUCCESSFUL')</script>";
								echo '<meta http-equiv="Refresh" content="0; url=?update_course&id='.$course_id.'&gdgddh">';
							
							
							
						}
							}
		
		

	
	    function SaveProgUp(){
		
		$con= dbcon();
			if(isset($_POST['save_update'])){
				$prog=strtoupper($_POST['program']);
				$deg_id=$_POST['deg_id'];
				$duration=$_POST['duration'];
			
			$query =$con->query("update programs set prog_name='$prog',degree_id='$deg_id',duration='$duration' WHERE id='".$_GET['edit']."' ") or die(mysqli_error($con));
			echo "<script>alert('Update Successful')</script>";
			echo '<meta http-equiv="Refresh" content="0; url=?edit_prog&edit='.$_GET['edit'].'">';
			
			}
	          }

		 function TeacherCourse($user_id,$year_id,$campus_id){
				$con= dbcon();
				if(isset($_POST['save'])){
					$course_id=$_POST['course'];	
					$my_lecture=$_POST['lecture'];
					$my_tutorials=$_POST['tutorials'];
					$my_practicals=$_POST['practicals'];
			
					
				$select =$con->query("SELECT * FROM teacher_courses where teacher_id='$user_id'
				AND course_id='$course_id' AND campus_id='$campus_id' AND year_id='$year_id'
				 ") or die(mysqli_error($con));	
				if($select->num_rows>0)	{
					echo "<script>alert('ERROR. This course has already been allocated to this Teacher')</script>";
				}
				else {
				
				$select =$con->query("INSERT INTO teacher_courses SET teacher_id='$user_id'
				,course_id='$course_id',campus_id='$campus_id',year_id='$year_id',practicals='$my_practicals',
				lectures='$my_lecture',tutorial='$my_tutorials'
				 ") or die(mysqli_error($con));				
					echo "<script>alert('Course Successfully Allocated')</script>";
				
			echo '<meta http-equiv="Refresh" content="0; url=?assign_to&userid='.$user_id.'&year='.$year_id.'&camp_id='.$campus_id.'&gdgddh  ">';
				
				}
				
			}

			  }


		function UpdateTeacherCourse($user_id,$year_id,$campus_id){
				$con= dbcon();
				if(isset($_POST['save_updates'])){
					 $id=$_GET['edit'];	
					$my_lecture=$_POST['lecture'];
					$my_tutorials=$_POST['tutorials'];
					$my_practicals=$_POST['practicals'];
			
					
					$check=$con->query("SELECT * FROM  prog_courses,teacher_courses WHERE 
					prog_courses.id=teacher_courses.course_id AND teacher_courses.id='$id'  ") 
						   or die(mysqli_error($con));
						   $i=1;
						   while($rows=$check->fetch_assoc()){
							 
							 $tutorials=$rows['tutorials'];
							 $lecture_hours=$rows['lecture'];
							$practicals_hours=$rows['practical'];
						   }
				if($my_lecture>$lecture_hours){
					echo "<script>alert('ERROR. Only a Maximum of ".$lecture_hours." Lecture Hours can be allocated at Once ')</script>";	
					echo '<meta http-equiv="Refresh" content="0; url=?assign_to&userid='.$user_id.'&year='.$year_id.'&camp_id='.$campus_id.'&gdgddh  ">';
			
				}
				else if($my_practicals>$practicals_hours){
					echo "<script>alert('ERROR. Only a Maximum of ".$practicals_hours." Practical Hours can be allocated at Once ')</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?assign_to&userid='.$user_id.'&year='.$year_id.'&camp_id='.$campus_id.'&gdgddh  ">';
				
				}
				else if($my_tutorials>$tutorials){
					echo "<script>alert('ERROR. Only a Maximum of ".$practicals_hours." Tutorials Hours can be allocated at Once ')</script>";
					echo '<meta http-equiv="Refresh" content="0; url=?assign_to&userid='.$user_id.'&year='.$year_id.'&camp_id='.$campus_id.'&gdgddh  ">';
				
				}
				
				else {
				
				$select =$con->query("UPDATE teacher_courses SET practicals='$my_practicals',
				lectures='$my_lecture',tutorial='$my_tutorials' WHERE id='$id'
				 ") or die(mysqli_error($con));				
					echo "<script>alert('Course Hours Successfully Allocated')</script>";
				
			echo '<meta http-equiv="Refresh" content="0; url=?assign_to&userid='.$user_id.'&year='.$year_id.'&camp_id='.$campus_id.'&gdgddh  ">';
				
				}
				
			}


			

			  }

		function DeleteTeacherCourse($user_id,$year_id,$campus_id){
			$con= dbcon();
					if(isset($_GET['del'])){
						$id=$_GET['del'];
					
						
					$select =$con->query("DELETE FROM  teacher_courses where id='".$id."' ") or die(mysqli_error($con));				
						echo "<script>alert('COURSE SUCCESSFULLY DELETED')</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?assign_to&userid='.$user_id.'&year='.$year_id.'&camp_id='.$campus_id.'&gdgddh  ">';
			
				}
			  }
		function TakeAtt($course_id,$year_id,$campus_id,$user_id,$date,$starts,$ends){
		$dbcon= unicon();
		$con= dbcon();
				if(isset($_POST['matric'])){
					$matric=$_POST['matric'];
					$time=date('G:i');
					

					$check_exits=$con->query("SELECT * FROM  student_att WHERE course_id='$course_id' 
					AND teacher_id='$user_id' AND year_id='$year_id' AND campus_id='$campus_id' AND date='$date'
					AND matricule='$matric' AND starts='$starts' AND ends='$ends' ") 
						   or die(mysqli_error($con));

					$check=$dbcon->query("SELECT * FROM  student_infos WHERE matricule='$matric' order by id DESC LIMIT 1  ") 
						   or die(mysqli_error($dbcon));
					 $count=$check->num_rows;
					if($check->num_rows<1){
						echo "<script>alert('Matricule ".$matric." does not exits')</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?taking_att&courseid='.$course_id.'&campus_id='.$campus_id.'&date='.$date.'&starts='.$starts.'&ends='.$ends.'&gdgddh ">';
				


					}
					else if($check_exits->num_rows>0){
						
						echo '<meta http-equiv="Refresh" content="0; url=?taking_att&courseid='.$course_id.'&campus_id='.$campus_id.'&date='.$date.'&starts='.$starts.'&ends='.$ends.'&gdgddh ">';
				
					}
					else {
						   while($rows=$check->fetch_assoc()){
							 
							 $student_id=$rows['id'];
							
						   }
				$insert_att=$con->query("INSERT INTO student_att SET course_id='$course_id',matricule='$matric' 
				,teacher_id='$user_id', year_id='$year_id', campus_id='$campus_id',student_id='$student_id' ,
				date='$date',starts='$starts',ends='$ends',time='$time' ") 
						or die(mysqli_error($con));
						
						echo '<meta http-equiv="Refresh" content="0; url=?taking_att&courseid='.$course_id.'&campus_id='.$campus_id.'&date='.$date.'&starts='.$starts.'&ends='.$ends.'&gdgddh ">';
				
				
		
						}
				
					
			}
			}


			function DeleteAtt($course_id,$year_id,$campus_id,$user_id,$date,$starts,$ends){
				$con= dbcon();
						if(isset($_GET['id'])){
							$id=$_GET['id'];
						
						
							
						$select =$con->query("DELETE FROM  student_att where id='".$id."' ") or die(mysqli_error($con));				
							echo "<script>alert('ITEM SUCCESSFULLY DELETED')</script>";
							echo '<meta http-equiv="Refresh" content="0; url=?taking_att&courseid='.$course_id.'&campus_id='.$campus_id.'&date='.$date.'&starts='.$starts.'&ends='.$ends.'&gdgddh ">';
					
					}
				  }



				  function SaveTopic($id){
					if(isset($_POST['save'])){
						
						$con= dbcon();
						$topic=trim(nl2br($_POST['topic']));
						$check_exits=$con->query("SELECT * FROM  topics where course_id='$id'
						AND topic='$topic'
						  ") 
							   or die(mysqli_error($con));
	
						 if($check_exits->num_rows>0){
							 echo "<script>alert('This Topic is already saved')</script>";
							echo '<meta http-equiv="Refresh" content="0; url=?define_topics&id='.$id.'&gdgdhdh">';
					
						}
						else {
							   
					$insert_att=$con->query("INSERT INTO topics SET course_id='$id',topic='$topic' ") 
							or die(mysqli_error($con));
							echo "<script>alert('SUCCESSFULLY SAVED')</script>";
							echo '<meta http-equiv="Refresh" content="0; url=?define_topics&id='.$id.'&gdgdhdh">';
					
			
							}
					
	
					}
				}


				function SaveTopicTaught($id,$year_id,$user_id){
					if(isset($_POST['save'])){
						
						$con= dbcon();
						$course=$con->real_escape_string($_POST['topic']);
						$period=$_POST['period'];						
						$content=$con->real_escape_string(nl2br(ucfirst($_POST['content'])));
						$campus_id=$_GET['campus_id'];
						
					$insert_att=$con->query("SELECT * FROM  sub_topics_taught WHERE  time_id='$period' and subtopic_id='$course' AND 
					teacher_id='$user_id' AND year_id='$year_id' ") or die(mysqli_error($con));
					$counts=$insert_att->num_rows;
					if($counts>0){
						$insert_att=$con->query("UPDATE sub_topics_taught SET contents='$content' WHERE 
						time_id='$period' AND subtopic_id='$course' AND 
						teacher_id='$user_id' AND year_id='$year_id', ") or die(mysqli_error($con));
						echo "<script>alert('ERROR. RECORDS ALREADY EXISTS')</script>";
							echo '<meta http-equiv="Refresh" content="0; url=?sign_logbook&id='.$id.'&campus_id='.$campus_id.'&gdgdhdh">';
					

					}
					else{
						
							   
					$insert_att=$con->query("INSERT INTO sub_topics_taught SET time_id='$period',subtopic_id='$course',
					teacher_id='$user_id',year_id='$year_id',contents='$content' ") or die(mysqli_error($con));
							echo "<script>alert('SUCCESSFULLY SAVED')</script>";
							echo '<meta http-equiv="Refresh" content="0; url=?sign_logbook&id='.$id.'&campus_id='.$campus_id.'&gdgdhdh">';
					
					}
	
					}
				}


				function StaffCheckin($teacher_id,$subcamp_id,$campus_id,$year_id,$admin_id){
					$computer_name= gethostbyaddr($_SERVER['REMOTE_ADDR']);
				
					$con= dbcon();
				 
								if(isset($_POST['matric'])){
								   $date_time=date_create('now')->format('Y-m-d H:i:s');
								   $date=date('Y-m-d');
								  
						$check_exits=$con->query("SELECT * FROM  staff_att WHERE 
						 teacher_id='$teacher_id' AND year_id='$year_id' AND campus_id='$campus_id' AND date='$date'
						") 
							or die(mysqli_error($con));
						 $check_exits->num_rows;
						
						if($check_exits->num_rows>0){
							$insert_att=$con->query("UPDATE staff_att SET departure='$date_time', checked_out='$computer_name' WHERE 
						 teacher_id='$teacher_id' AND date='$date' ") 
						or die(mysqli_error($con));
						echo '<meta http-equiv="Refresh" content="0; url=?campus_checkin&camp_id='.$_GET['camp_id'].'&sub_camp='.$_GET['sub_camp'].'&gdgddh">';
	
						}
						else {
							
						$insert_att=$con->query("INSERT INTO staff_att SET subcamp_id='$subcamp_id',user_id='$admin_id',arrival='$date_time'
						,teacher_id='$teacher_id', year_id='$year_id', campus_id='$campus_id',date='$date',computer='$computer_name' ") 
						or die(mysqli_error($con));
						//echo "<script>alert('SUCCESSFULLY SAVED')</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?campus_checkin&camp_id='.$_GET['camp_id'].'&sub_camp='.$_GET['sub_camp'].'&gdgddh">';
	
	
				
								}
						
							
							}
						}

						
			




				function SaveTopicTaughtUpdates($id,$year_id,$user_id){
					if(isset($_POST['save_updates'])){
						
						$con= dbcon();
						$course=$con->real_escape_string($_POST['topic']);
						$period=$_POST['period'];						
						$content=$con->real_escape_string(nl2br(ucfirst($_POST['content'])));
						$campus_id=$_GET['campus_id'];
						
						
							   
					$insert_att=$con->query("UPDATE sub_topics_taught SET time_id='$period',subtopic_id='$course',
					contents='$content' WHERE id='".$_GET['edit']."' ") or die(mysqli_error($con));
							echo "<script>alert('UPDATE SUCCESSFULLY')</script>";
							echo '<meta http-equiv="Refresh" content="0; url=?sign_logbook&id='.$id.'&campus_id='.$campus_id.'&gdgdhdh">';
					
	
					}
				}

				
				function DeleteSaveTopicTaught($id,$year_id,$user_id){
					if(isset($_GET['del'])){
						
						$con= dbcon();
						$campus_id=$_GET['campus_id'];
						
						
							   
					$insert_att=$con->query("DELETE FROM sub_topics_taught   WHERE id='".$_GET['del']."' ") or die(mysqli_error($con));
							echo "<script>alert('Records SUCCESSFULLY Deleted')</script>";
							echo '<meta http-equiv="Refresh" content="0; url=?sign_logbook&id='.$id.'&campus_id='.$campus_id.'&gdgdhdh">';
					
	
					}
				}


				function DeleteTopic($id){
					if(isset($_GET['del'])){
						
						$con= dbcon();
						$del_id=$_GET['del'];
						
							$check_exits=$con->query("DELETE FROM  topics   WHERE id='$del_id'
							")  or die(mysqli_error($con));	
							echo "<script>alert('SUCCESSFULLY DELETED')</script>";
							echo '<meta http-equiv="Refresh" content="0; url=?define_topics&id='.$id.'&gdgdhdh">';
						
	
					}
				}


				function SaveSubTopic($id,$topic_id){
					if(isset($_POST['save'])){
						
						$con= dbcon();
						$topic=$con->real_escape_string($_POST['topic']);
						$check_exits=$con->query("SELECT * FROM  sub_topics where topic_id='$topic_id'
						AND content='$topic'
						  ") 
							   or die(mysqli_error($con));
	
						 if($check_exits->num_rows>0){
							 echo "<script>alert('This Topic is already saved')</script>";
							echo '<meta http-equiv="Refresh" content="0; url=?defining_subtopics&id='.$id.'&sub_id='.$topic_id.'&gdgdhdh">';
					
						}
						else {
							   
					$insert_att=$con->query("INSERT INTO sub_topics SET topic_id='$topic_id',content='$topic' ") 
							or die(mysqli_error($con));
							echo "<script>alert('SUCCESSFULLY SAVED')</script>";
							echo '<meta http-equiv="Refresh" content="0; url=?defining_subtopics&id='.$id.'&sub_id='.$topic_id.'&gdgdhdh">';
					
			
							}
					
	
					}
				}


				function DeleteSubTopic($id,$topic_id){
					if(isset($_GET['del'])){
						
						$con= dbcon();
						$del_id=$_GET['del'];
						
							$check_exits=$con->query("DELETE FROM  sub_topics   WHERE id='$del_id'
							")  or die(mysqli_error($con));	
							echo "<script>alert('SUCCESSFULLY DELETED')</script>";
							echo '<meta http-equiv="Refresh" content="0; url=?defining_subtopics&id='.$id.'&sub_id='.$topic_id.'&gdgdhdh">';
						
	
					}
				}

			
			

				function SaveLogBook($course_id,$time_id,$topic_id,$tid){
					if(isset($_POST['save'])){
						
						$con= dbcon();
						$content=$con->real_escape_string($_POST['content']);
						
							$check_exits=$con->query("UPDATE  teacher_att SET content='$content' ,topic_id='$topic_id'  WHERE id='$time_id'
							")  or die(mysqli_error($con));	
							echo "<script>alert('UPDATE SUCCESSFULLY ')</script>";
							echo '<meta http-equiv="Refresh" content="0; url=?sign_it&id='.$_GET['id'].'&course_id='.$course_id.'&time='.$time_id.'&tid='.$tid.'&gdgdgh">';
	
	
					}
				}



         function SaveteacherStart($teacher_id,$course_id,$campus_id,$year_id,$admin_id){
			$computer_name= gethostbyaddr($_SERVER['REMOTE_ADDR']);
			  $admin_id;
	
			$con= dbcon();
						if(isset($_POST['save_record'])){
							$time=$_POST['time'];
							$date=$_POST['date'];
							$course=$_GET['course'];
					       $date_time=$date ." $time";
						  
					$check_exits=$con->query("SELECT * FROM  teacher_att WHERE course_id='$course_id' 
					AND teacher_id='$teacher_id' AND year_id='$year_id' AND campus_id='$campus_id' AND arrival='$date'
					  ") 
						   or die(mysqli_error($con));
echo $check_exits->num_rows;
					 if($check_exits->num_rows>0){
						echo '<meta http-equiv="Refresh" content="0; url=?teacher_att&userid='.$teacher_id.'&course='.$course.'&year='.$year_id.'&camp_id='.$campus_id.'&gdgddh">';
				
					}
					else {
						   
				$insert_att=$con->query("INSERT INTO teacher_att SET course_id='$course_id',user_id='$admin_id'
				,teacher_id='$teacher_id', year_id='$year_id', campus_id='$campus_id',arrival='$date_time',computer='$computer_name' ") 
						or die(mysqli_error($con));
						//echo "<script>alert('SUCCESSFULLY SAVED')</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?teacher_att&userid='.$teacher_id.'&course='.$course.'&year='.$year_id.'&camp_id='.$campus_id.'&gdgddh">';

				
		
						}
				
					
					}
			function Departure($teacher_id,$course_id,$year_id,$campus_id){
				if(isset($_POST['save_updates'])){
					
			        $con= dbcon();
					$id=$_GET['depart'];
					$ends=$_POST['ends'];
					
					$check_exits=$con->query("SELECT * FROM  teacher_att WHERE id='$id'
					  ")  or die(mysqli_error($con));

					while($rows=$check_exits->fetch_assoc()){
						$arrival=$rows['arrival'];
					}
					 $depart=(new DateTime($arrival))->format("Y-m-d") ." $ends";
					
						$check_exits=$con->query("UPDATE  teacher_att SET departure='$depart' WHERE id='$id'
						")  or die(mysqli_error($con));	
						echo "<script>alert('SUCCESSFULLY SAVED')</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?teacher_att&userid='.$teacher_id.'&course='.$course_id.'&year='.$year_id.'&camp_id='.$campus_id.'&gdgddh">';


				}
			}
			
			function DeleteTime($teacher_id,$course_id,$year_id,$campus_id){
				if(isset($_GET['del'])){
					
			        $con= dbcon();
					$id=$_GET['del'];
					
						$check_exits=$con->query("DELETE FROM  teacher_att   WHERE id='$id'
						")  or die(mysqli_error($con));	
						echo "<script>alert('SUCCESSFULLY DELETED')</script>";
						echo '<meta http-equiv="Refresh" content="0; url=?teacher_att&userid='.$teacher_id.'&course='.$course_id.'&year='.$year_id.'&camp_id='.$campus_id.'&gdgddh">';


				}
			}


		
			

	

			

			
			 
			
		

		 
		

		 }
				  

			 
			
// 			 	function PersonalDetails($user_id){
		
// 		        $con= dbcon();
// 			     if(isset($_POST['save'])){
				
// 				$dob=date('d-m-Y', strtotime($_POST['dob']));
// 				$sex=$_POST['sex'];
// 				$pob=strtoupper($_POST['pob']);
// 				$nationality=strtoupper($_POST['nation']);
// 				$region=strtoupper($_POST['country']);
// 				$division=strtoupper($_POST['state']);
// 				$residence=strtoupper($_POST['residence']);
// 				$tel=$_POST['tel'];
// 				$date=date('Y-m-d');
// 				$your_id=$_POST['your_id'];
// 				$cur_ayear=$_POST['cur_ayear'];
// 				$market_source=$_POST['market'];
			
// 				 $select =$con->query("SELECT * FROM  regions where id='$region' or region='$region'  ") or die(mysqli_error($con));
															
// 									while($rows=$select->fetch_assoc()){
// 										$region_name=$rows['region'];
// 									}
// 				$select =$con->query("SELECT * FROM  divisions where id='$division' OR division_name='$division'   ") or die(mysqli_error($con));
										
// 				while($rows=$select->fetch_assoc()){
// 					$division_name=$rows['division_name'];
// 				}
// 				$select_stage=$con->query("SELECT * FROM  person_stage where your_id='$your_id' AND stage='1'  ") or die(mysqli_error($con));
			
// 			$query =$con->query("UPDATE personal_details set sex='$sex',dob='$dob',pob='$pob',nationality='$nationality',tel='$tel',
// 			region='$region_name',division='$division_name',residence='$residence',date='$date',user_id='$user_id',year_id='$cur_ayear',market_source='$market_source'   WHERE your_id='$your_id' ") or die(mysqli_error($con));
// 			if($select_stage->num_rows>0){
// 			}
// 			else {			
			
			
// 			$query =$con->query("INSERT INTO person_stage set date='$date',stage='1', your_id='$your_id' ") or die(mysqli_error($con));
			
// 			}
// 			echo "<script>alert('Data Successfully Saved')</script>";
// 			echo '<meta http-equiv="Refresh" content="0; url=?start_app&campus_id='.$_GET['campus_id'].'&id='.$_GET['id'].'&your_id='.$_GET['your_id'].'&g='.$_GET['g'].'">';
			
// 			}
// 	        }


// 			/////////////////personal details for admission office
// 			function PersonalDetailsAdmission(){
		
// 		        $con= dbcon();
// 			     if(isset($_POST['save'])){
				
// 				$dob=date('d-m-Y', strtotime($_POST['dob']));;
// 				$sex=$_POST['sex'];
// 				$name=$con->real_escape_string(strtoupper($_POST['name']));
// 				$email=$con->real_escape_string(strtoupper($_POST['email']));
// 				$tel=$con->real_escape_string(strtoupper($_POST['tel']));
// 				$campus=$con->real_escape_string(strtoupper($_POST['campus']));
// 				$pob=strtoupper($_POST['pob']);
// 				$nationality=strtoupper($_POST['nation']);
// 				$region=strtoupper($_POST['country']);
// 				echo $division=strtoupper($_POST['state']);
// 				$residence=strtoupper($_POST['residence']);
// 				$tel=$_POST['tel'];
// 				$date=date('Y-m-d');
// 				$your_id=$_POST['your_id'];
// 				$cur_ayear=$_POST['cur_ayear'];
// 				$market_source=$_POST['market'];
// 				@session_start();
// 				$user_id=$_GET['your_id'];
// 				 $select =$con->query("SELECT * FROM  regions where id='$region' or region='$region'  ") or die(mysqli_error($con));
															
// 									while($rows=$select->fetch_assoc()){
// 										$region_name=$rows['region'];
// 									}
// 				$select =$con->query("SELECT * FROM  divisions where id='$division'    ") or die(mysqli_error($con));
										
// 				while($rows=$select->fetch_assoc()){
// 					$division_name=$rows['division_name'];
// 				}
// 				$query=$con->query("SELECT * FROM  person_stage where your_id='$your_id' AND stage='1'  ") or die(mysqli_error($con));
			
// 				$update_users =$con->query("UPDATE users set full_name='$name', campus_id='$campus',user_email='$email',tel='$tel'
// 				WHERE id='$user_id'  ") or die(mysqli_error($con));

// 				$select_stage=$con->query("SELECT * FROM  person_stage where your_id='$your_id' AND stage='1'  ") or die(mysqli_error($con));
			
// 				$query =$con->query("UPDATE personal_details set sex='$sex',dob='$dob',pob='$pob',nationality='$nationality',tel='$tel',
// 				region='$region_name',division='$division_name',residence='$residence',date='$date',user_id='$user_id',year_id='$cur_ayear',market_source='$market_source'   WHERE your_id='$your_id' ") or die(mysqli_error($con));
// 				if($select_stage->num_rows>0){
// 			}
// 			else {			
			
				
// 			$query =$con->query("INSERT INTO person_stage set date='$date',stage='1', your_id='$your_id' ") or die(mysqli_error($con));
			
// 			}
// 			echo "<script>alert('Data Successfully Saved')</script>";
// 			echo '<meta http-equiv="Refresh" content="0; url=?start_app&id='.$_GET['id'].'&your_id='.$_GET['your_id'].'&g='.$_GET['g'].'">';
			
// 			}
// 	        }


// 			function PersonalDetailsUpdate(){
		
// 		        $con= dbcon();
// 			     if(isset($_POST['save'])){
				
// 				$dob=strtoupper($_POST['dob']);
// 				$sex=$_POST['sex'];
// 				$name=$con->real_escape_string(strtoupper($_POST['name']));
// 				$email=$con->real_escape_string(strtoupper($_POST['email']));
// 				$tel=$con->real_escape_string(strtoupper($_POST['tel']));
// 				$campus=$con->real_escape_string(strtoupper($_POST['campus']));
// 				$pob=strtoupper($_POST['pob']);
// 				$nationality=strtoupper($_POST['nation']);
// 				$region=strtoupper($_POST['country']);
// 				$division=strtoupper($_POST['state']);
// 				$residence=strtoupper($_POST['residence']);
// 				$tel=$_POST['tel'];
// 				$date=date('Y-m-d');
// 				$your_id=$_POST['your_id'];
// 				$cur_ayear=$_POST['cur_ayear'];
// 				$market_source=$_POST['market'];
// 				@session_start();
// 				$user_id=$_GET['your_id'];
// 				 $select =$con->query("SELECT * FROM  regions where id='$region' or region='$region'  ") or die(mysqli_error($con));
															
// 									while($rows=$select->fetch_assoc()){
// 										$region_name=$rows['region'];
// 									}
// 				$select =$con->query("SELECT * FROM  divisions where id='$division' OR division_name='$division'   ") or die(mysqli_error($con));
										
// 				while($rows=$select->fetch_assoc()){
// 					$division_name=$rows['division_name'];
// 				}
				
			
// 				$query =$con->query("UPDATE personal_details set sex='$sex',dob='$dob',pob='$pob',nationality='$nationality',tel='$tel',
// 				region='$region_name',division='$division_name',residence='$residence',date='$date',user_id='$user_id',year_id='$cur_ayear',market_source='$market_source'   WHERE your_id='$your_id' ") or die(mysqli_error($con));
// 			  $query =$con->query("UPDATE users SET full_name='$name'   WHERE id='$your_id' ") or die(mysqli_error($con));
		
// 			echo "<script>alert('Data Successfully Updated')</script>";
// 			echo '<meta http-equiv="Refresh" content="0; url=?update_bio&your_id='.$_GET['your_id'].'&campus_id='.$_GET['campus_id'].'&id='.$_GET['id'].'&g='.$_GET['g'].'">';
			
// 			}
// 	        }
	
	
// 		function StageTwo($user_id){
		
// 		        $con= dbcon();
// 			if(isset($_POST['save'])){
				
// 				$first_choice=$con->real_escape_string($_POST['first_choice']);
// 				$second_choice=$con->real_escape_string($_POST['second_choice']);
// 				$first_writtem=strtoupper($con->real_escape_string($_POST['first_written']));
// 				$second_written=strtoupper($con->real_escape_string($_POST['second_written']));
// 				$first_spoken=strtoupper($con->real_escape_string($_POST['first_spoken']));
// 				$second_spoken=strtoupper($con->real_escape_string($_POST['second_spoken']));
// 				$health=$_POST['health'];
// 				$healt_reason=$con->real_escape_string($_POST['health_reason']);
// 				$allergy=$_POST['allergy'];
// 				$allergy_reason=$con->real_escape_string($_POST['allergy_reason']);
// 				$disablity=$_POST['disablity'];
// 				$disability_reason=$con->real_escape_string($_POST['disablity_reason']);
// 				$entry=$con->real_escape_string($_POST['entry']);
// 				$awaiting=$_POST['awaiting'];
// 				$date=date('Y-m-d');
// 				$your_id=$_POST['your_id'];
// 				$level=$_POST['level'];
				
// 				@session_start();
// 				$user_id=$_SESSION['userSession'];;
				
// 				$select_stage=$con->query("SELECT * FROM  stage_two where your_id='$your_id'    ") or die(mysqli_error($con));
// 				if($select_stage->num_rows>0){
			
// 			$query =$con->query("UPDATE stage_two set first_choice='$first_choice',second_choice='$second_choice',first_written='$first_writtem'
// 			,second_written='$second_written',first_spoken='$first_spoken',second_spoken='$second_spoken', health='$health',
// 			health_reason='$healt_reason',allergy='$allergy',allergy_reason='$allergy_reason',disability='$disablity',
// 			disability_reason='$disability_reason',entry='$entry',awaiting='$awaiting',level='$level',user_id='$user_id' WHERE your_id='$your_id' ") or die(mysqli_error($con));
// 				}
// 			else {			
			
			
// 			$query =$con->query("INSERT INTO stage_two  set first_choice='$first_choice',second_choice='$second_choice',first_written='$first_writtem'
// 			,second_written='$second_written',first_spoken='$first_spoken',second_spoken='$second_spoken', health='$health',
// 			health_reason='$healt_reason',allergy='$allergy',allergy_reason='$allergy_reason',disability='$disablity',
// 			disability_reason='$disability_reason',entry='$entry',awaiting='$awaiting' ,your_id='$your_id' ") or die(mysqli_error($con));
// 			$query =$con->query("INSERT INTO person_stage set date='$date',stage='2', your_id='$your_id',user_id='$user_id' ") or die(mysqli_error($con));
			
// 			}
			
// 			$select_stage=$con->query("SELECT * FROM  person_stage where your_id='$your_id' AND stage='2'  ") or die(mysqli_error($con));
			
// 			if($select_stage->num_rows>0){
// 			}
// 			else {			
			
			
// 			$query =$con->query("INSERT INTO person_stage set date='$date',stage='2', your_id='$your_id' ") or die(mysqli_error($con));
			
// 			}
// 			echo "<script>alert('Data Successfully Saved')</script>";
// 			echo '<meta http-equiv="Refresh" content="0; url=?stage_two&id='.$_GET['id'].'&campus_id='.$_GET['campus_id'].'&g='.$_GET['g'].'">';
			
// 			}
// 	}

// 	///////////Stage 2 for admission officerr account use ONLY
// 	function StageTwoAdmision(){
						
// 						$con= dbcon();
// 					if(isset($_POST['save'])){
						
// 						$first_choice=$con->real_escape_string($_POST['first_choice']);
// 						$second_choice=$con->real_escape_string($_POST['second_choice']);
// 						$first_writtem=strtoupper($con->real_escape_string($_POST['first_written']));
// 						$second_written=strtoupper($con->real_escape_string($_POST['second_written']));
// 						$first_spoken=strtoupper($con->real_escape_string($_POST['first_spoken']));
// 						$second_spoken=strtoupper($con->real_escape_string($_POST['second_spoken']));
// 						$health=$_POST['health'];
// 						$healt_reason=$con->real_escape_string($_POST['health_reason']);
// 						$allergy=$_POST['allergy'];
// 						$allergy_reason=$con->real_escape_string($_POST['allergy_reason']);
// 						$disablity=$_POST['disablity'];
// 						$disability_reason=$con->real_escape_string($_POST['disablity_reason']);
// 						$entry=$con->real_escape_string($_POST['entry']);
// 						$awaiting=$_POST['awaiting'];
// 						$level=$_POST['level'];
// 						$date=date('Y-m-d');
// 						$your_id=$_POST['your_id'];
						
// 						@session_start();
// 						$user_id=$_SESSION['userSession'];;
						
// 						$select_stage=$con->query("SELECT * FROM  stage_two where your_id='$your_id'    ") or die(mysqli_error($con));
// 						if($select_stage->num_rows>0){
					
// 					$query =$con->query("UPDATE stage_two set first_choice='$first_choice',second_choice='$second_choice',first_written='$first_writtem'
// 					,second_written='$second_written',first_spoken='$first_spoken',second_spoken='$second_spoken', health='$health',
// 					health_reason='$healt_reason',allergy='$allergy',allergy_reason='$allergy_reason',disability='$disablity',
// 					disability_reason='$disability_reason',entry='$entry',awaiting='$awaiting',level='$level' WHERE your_id='$your_id' ") or die(mysqli_error($con));
// 						}
// 					else {			
					
					
// 					$query =$con->query("INSERT INTO stage_two  set first_choice='$first_choice',second_choice='$second_choice',first_written='$first_writtem'
// 					,second_written='$second_written',first_spoken='$first_spoken',second_spoken='$second_spoken', health='$health',
// 					health_reason='$healt_reason',allergy='$allergy',allergy_reason='$allergy_reason',disability='$disablity',
// 					disability_reason='$disability_reason',entry='$entry',awaiting='$awaiting' ,your_id='$your_id' ,level='$level'") or die(mysqli_error($con));
// 					$query =$con->query("INSERT INTO person_stage set date='$date',stage='2', your_id='$your_id' ") or die(mysqli_error($con));
					
// 					}
					
// 					$select_stage=$con->query("SELECT * FROM  person_stage where your_id='$your_id' AND stage='2'  ") or die(mysqli_error($con));
					
// 					if($select_stage->num_rows>0){
// 					}
// 					else {			
					
					
// 					$query =$con->query("INSERT INTO person_stage set date='$date',stage='2', your_id='$your_id' ") or die(mysqli_error($con));
					
// 					}
// 					echo "<script>alert('Data Successfully Saved')</script>";
// 					echo '<meta http-equiv="Refresh" content="0; url=?stage_two&id='.$_GET['id'].'&campus_id='.$_GET['campus_id'].'&your_id='.$_GET['your_id'].'&g='.$_GET['g'].'">';
					
// 					}
// 					}	

	
// 	function StageThree($user_id){
		
// 		        $con= dbcon();
// 			if(isset($_POST['save_educate'])){
				
// 				$school=strtoupper($con->real_escape_string($_POST['school']));
// 				$year=$con->real_escape_string($_POST['year']);
// 				$course=strtoupper($con->real_escape_string($_POST['course']));
// 				$diploma=strtoupper($con->real_escape_string($_POST['diploma']));
				
// 				$date=date('Y-m-d');
// 				$your_id=$_POST['your_id'];
// 				@session_start();
// 				$user_id=$_SESSION['userSession'];;
				
// 				$select_stage=$con->query("SELECT * FROM  stage_three where your_id='$your_id'  AND school='$school'
// 				AND year='$year' AND certificate='$diploma' AND course='$course'") or die(mysqli_error($con));
// 				if($select_stage->num_rows>0){
			
// 			$query =$con->query("UPDATE stage_three set school='$school',year='$year',course='$course',certificate='$diploma'  WHERE your_id='$your_id' ") or die(mysqli_error($con));
// 				}
// 			else {			
			
			
// 			$query =$con->query("INSERT INTO stage_three set school='$school',year='$year',course='$course',certificate='$diploma'
// 			,your_id='$your_id',user_id='$user_id' ") or die(mysqli_error($con));
// 			$query =$con->query("INSERT INTO person_stage set date='$date',stage='3', your_id='$your_id' ") or die(mysqli_error($con));
			
// 			}
// 			$select_stage=$con->query("SELECT * FROM  person_stage where your_id='$your_id' AND stage='3'  ") or die(mysqli_error($con));
			
// 			if($select_stage->num_rows>0){
// 			}
// 			else {			
			
			
// 			$query =$con->query("INSERT INTO person_stage set date='$date',stage='3', your_id='$your_id' ") or die(mysqli_error($con));
			
// 			}
// 			echo "<script>alert('Data Successfully Saved')</script>";
// 			echo '<meta http-equiv="Refresh" content="0; url=?stage_three&id='.$_GET['id'].'&campus_id='.$_GET['campus_id'].'&g='.$_GET['g'].'">';
			
// 			}
// 	       }



// 	  function StageThreeAdmission(){
		
// 			$con= dbcon();
// 		if(isset($_POST['save_educate'])){
			
// 			$school=strtoupper($con->real_escape_string($_POST['school']));
// 			$year=$con->real_escape_string($_POST['year']);
// 			$course=strtoupper($con->real_escape_string($_POST['course']));
// 			$diploma=strtoupper($con->real_escape_string($_POST['diploma']));
			
// 			$date=date('Y-m-d');
// 			$your_id=$_POST['your_id'];
// 			@session_start();
// 			$user_id=$_SESSION['userSession'];;
			
// 			$select_stage=$con->query("SELECT * FROM  stage_three where your_id='$your_id'  AND school='$school'
// 			AND year='$year' AND certificate='$diploma' AND course='$course'") or die(mysqli_error($con));
// 			if($select_stage->num_rows>0){
		
// 		$query =$con->query("UPDATE stage_three set school='$school',year='$year',course='$course',certificate='$diploma'  WHERE your_id='$your_id' ") or die(mysqli_error($con));
// 			}
// 		else {			
		
		
// 		$query =$con->query("INSERT INTO stage_three set school='$school',year='$year',course='$course',certificate='$diploma'
// 		,your_id='$your_id' ") or die(mysqli_error($con));
// 		$query =$con->query("INSERT INTO person_stage set date='$date',stage='3', your_id='$your_id' ") or die(mysqli_error($con));
		
// 		}
// 		$select_stage=$con->query("SELECT * FROM  person_stage where your_id='$your_id' AND stage='3'  ") or die(mysqli_error($con));
		
// 		if($select_stage->num_rows>0){
// 		}
// 		else {			
		
		
// 		$query =$con->query("INSERT INTO person_stage set date='$date',stage='3', your_id='$your_id' ") or die(mysqli_error($con));
		
// 		}
// 		echo "<script>alert('Data Successfully Saved')</script>";
// 		echo '<meta http-equiv="Refresh" content="0; url=?stage_three&id='.$_GET['id'].'&your_id='.$_GET['your_id'].'&campus_id='.$_GET['campus_id'].'&g='.$_GET['g'].'">';
		
// 		}
// 	   }
	
// 				function StageThreeB($user_ids){
		
// 		        $con= dbcon();
// 			if(isset($_POST['save_emp'])){
				
// 				$employer=strtoupper($con->real_escape_string($_POST['employer']));
// 				$posts=$con->real_escape_string($_POST['posts']);
// 				$from=strtoupper($con->real_escape_string($_POST['from']));
// 				$to=strtoupper($con->real_escape_string($_POST['to']));
// 				$professional=strtoupper($con->real_escape_string($_POST['professional']));
				
				
// 				$date=date('Y-m-d');
// 				$your_id=$_POST['your_id'];
// 				@session_start();
// 				$user_id=$_SESSION['userSession'];;
				
// 				$select_stage=$con->query("SELECT * FROM  stage_three where your_id='$your_id' and employer='$employer'    ") or die(mysqli_error($con));
// 				if($select_stage->num_rows>0){
			
// 			$query =$con->query("UPDATE stage_three set employer='$employer',post_held='$posts',froms='$from',tos='$to',
// 			type='$professional'  WHERE your_id='$your_id' ") or die(mysqli_error($con));
// 				}
// 			else {			
			
			
// 			$query =$con->query("INSERT INTO stage_three set  employer='$employer',post_held='$posts',froms='$from',tos='$to',
// 			type='$professional',your_id='$your_id',user_id='$user_id' ") or die(mysqli_error($con));
// 			$query =$con->query("INSERT INTO person_stage set date='$date',stage='3', your_id='$your_id' ") or die(mysqli_error($con));
			
// 			}
// 			$select_stage=$con->query("SELECT * FROM  person_stage where your_id='$your_id' AND stage='3'  ") or die(mysqli_error($con));
			
// 			if($select_stage->num_rows>0){
// 			}
// 			else {			
			
			
// 			$query =$con->query("INSERT INTO person_stage set date='$date',stage='3', your_id='$your_id' ") or die(mysqli_error($con));
			
// 			}
// 			echo "<script>alert('Data Successfully Saved')</script>";
// 			echo '<meta http-equiv="Refresh" content="0; url=?stage_three&id='.$_GET['id'].'&your_id='.$_GET['your_id'].'&campus_id='.$_GET['campus_id'].'&g='.$_GET['g'].'">';
			
// 			}
// 	}
	
	
// 		function StageFour($user_id){
		
// 		        $con= dbcon();
// 			if(isset($_POST['save_emp'])){
				
// 				$related=strtoupper($con->real_escape_string($_POST['related']));
// 				$s_name=$con->real_escape_string($_POST['s_name']);
// 				$s_adress=strtoupper($con->real_escape_string($_POST['s_address']));
// 				$s_tel=strtoupper($con->real_escape_string($_POST['s_tel']));
// 				$s_work=strtoupper($con->real_escape_string($_POST['occupation']));
				
// 				$date=date('Y-m-d');
// 				$your_id=$_POST['your_id'];
				 
// 				$select_stage=$con->query("SELECT * FROM  stage_four where your_id='$user_id'     ") or die(mysqli_error($con));
// 				if($select_stage->num_rows>0){
			
// 			$query =$con->query("UPDATE stage_four set relate='$related',sponsor_name='$s_name',sponsor_address='$s_adress',
// 				sponsor_tel='$s_tel',sponsor_work='$s_work' WHERE your_id='$user_id' ") or die(mysqli_error($con));
// 				}
// 			else {			
			
			
// 			$query =$con->query("INSERT INTO stage_four set relate='$related',sponsor_name='$s_name',sponsor_address='$s_adress',
// 				sponsor_tel='$s_tel',sponsor_work='$s_work',your_id='$user_id',user_id='$user_id' ") or die(mysqli_error($con));
			
			
// 			}
			
// 			echo "<script>alert('Data Successfully Saved')</script>";
// 			echo '<meta http-equiv="Refresh" content="0; url=?stage_four&id='.$_GET['id'].'&&campus_id='.$_GET['campus_id'].'&g='.$_GET['g'].'">';
			
// 			}
// 	}

// 	function StageFourAdmission(){
		
// 		$con= dbcon();
// 	if(isset($_POST['save_emp'])){
		
// 		$related=strtoupper($con->real_escape_string($_POST['related']));
// 		$s_name=$con->real_escape_string($_POST['s_name']);
// 		$s_adress=strtoupper($con->real_escape_string($_POST['s_address']));
// 		$s_tel=strtoupper($con->real_escape_string($_POST['s_tel']));
// 		$s_work=strtoupper($con->real_escape_string($_POST['occupation']));
		
// 		$date=date('Y-m-d');
// 		$your_id=$_POST['your_id'];
// 		@session_start();
// 		$user_id=$_SESSION['userSession'];
		
// 		$select_stage=$con->query("SELECT * FROM  stage_four where your_id='$your_id'     ") or die(mysqli_error($con));
// 		if($select_stage->num_rows>0){
	
// 	$query =$con->query("UPDATE stage_four set relate='$related',sponsor_name='$s_name',sponsor_address='$s_adress',
// 		sponsor_tel='$s_tel',sponsor_work='$s_work' WHERE your_id='$your_id' ") or die(mysqli_error($con));
// 		}
// 	else {			
	
	
// 	$query =$con->query("INSERT INTO stage_four set relate='$related',sponsor_name='$s_name',sponsor_address='$s_adress',
// 		sponsor_tel='$s_tel',sponsor_work='$s_work',your_id='$your_id'") or die(mysqli_error($con));
	
	
// 	}
	
// 	echo "<script>alert('Data Successfully Saved')</script>";
// 	echo '<meta http-equiv="Refresh" content="0; url=?stage_four&id='.$_GET['id'].'&your_id='.$_GET['your_id'].'&campus_id='.$_GET['campus_id'].'&g='.$_GET['g'].'">';
	
// 	}
// }
// 	function DeleteThree(){
		
// 		        $con= dbcon();
// 			if(isset($_GET['del'])){
				
				
// 				$del=$_GET['del'];
				
			
// 			$query =$con->query("DELETE FROM stage_three WHERE id='$del' ") or die(mysqli_error($con));
			
// 			echo "<script>alert('Data Successfully Saved')</script>";
// 			echo '<meta http-equiv="Refresh" content="0; url=?stage_three&id='.$_GET['id'].'&your_id='.$_GET['your_id'].'&campus_id='.$_GET['campus_id'].'&g='.$_GET['g'].'">';
			
// 			}
// 	}
	
// 	function SubmitForm(){
		
// 		    $con= dbcon();
// 			if(isset($_GET['submit'])){
				
				
// 		   $your_id=$_GET['your_id']; 
				
// 			$select_stage=$con->query("SELECT * FROM  person_stage where your_id='$your_id' AND stage='4'  ") or die(mysqli_error($con));
			
// 			if($select_stage->num_rows>0){
				
// 			echo "<script>alert('Your Form had already been Submitted . Thank you')</script>";
// 			echo '<meta http-equiv="Refresh" content="0; url=?stage_five&id='.$_GET['id'].'&g='.$_GET['g'].'">';
// 			}
// 			else {	

// 			@session_start();
// 			$userTel = $_SESSION['user']['tel'];
// 			$date=date('Y-m-d'); 
// 			$query =$con->query("INSERT INTO person_stage set date='$date',stage='4', your_id='$your_id' ") or die(mysqli_error($con));
// 			if($query===TRUE){
               
// 				$applicantNumber = "237".$userTel;
// 				$message = "Congrats!. We are happy to inform you that we have received your application form . Thank you";
//                 Helpers::sendSMS($message,$applicantNumber);
// 			}

// 			}
// 			echo "<script>alert('Your Form has successfully been Submitted . Thank you')</script>";
// 			echo '<meta http-equiv="Refresh" content="0; url=?stage_five&id='.$_GET['id'].'&campus_id='.$_GET['campus_id'].'&g='.$_GET['g'].'">';
			
// 			}
// 	}


// 	function SubmitFormAdmission(){
		
// 		$con= dbcon();
// 		if(isset($_GET['submit'])){
			
			
// 	   $your_id=$_GET['your_id']; 
// 	   $select =$con->query("SELECT * FROM  users where users.id='".$your_id."'  ") or die(mysqli_error($con)); 	
//                 while($rows=$select->fetch_assoc()){
//                   $full_name=$rows['full_name'];
                 
//                  $your_tel=$rows['tel'];
//                   $email=$rows['user_email'];
                 
//                 }
			
// 		$select_stage=$con->query("SELECT * FROM  person_stage where your_id='$your_id' AND stage='4'  ") or die(mysqli_error($con));
		
// 		if($select_stage->num_rows>0){
			
// 		echo "<script>alert('Your Form had already been Submitted . Thank you')</script>";
// 		echo '<meta http-equiv="Refresh" content="0; url=?stage_five&id='.$_GET['id'].'&g='.$_GET['g'].'">';
// 		}
// 		else {	

// 		@session_start();
// 		$userTel = $your_tel;
// 		$date=date('Y-m-d'); 
// 		$query =$con->query("INSERT INTO person_stage set date='$date',stage='4', your_id='$your_id' ") or die(mysqli_error($con));
// 		if($query===TRUE){
		   
// 			$applicantNumber = "237".$userTel;
// 			$message = "Congrats!. We are happy to inform you that we have received your application form . Thank you";
// 			Helpers::sendSMS($message,$applicantNumber);
// 		}

// 		}
// 		echo "<script>alert('Your Form has successfully been Submitted . Thank you')</script>";
// 		echo '<meta http-equiv="Refresh" content="0; url=?stage_five&id='.$_GET['id'].'&your_id='.$_GET['your_id'].'&campus_id='.$_GET['campus_id'].'&g='.$_GET['g'].'">';
		
// 		}
// }
// 		function SaveMatricule($user){
// 			if(isset($_POST['save'])){
// 		$con= dbcon(); 
// 		$your_id=$_POST['your_id'];
// 		$matric=$_POST['matric'];
// 		$prog_id=$_POST['prog'];
// 		$last=$_POST['last'];
// 		$ref= $con->real_escape_string(ucwords($_POST['ref']));
// 		$paymt_option=$con->real_escape_string(ucwords($_POST['paymt_option']));
// 		$ref_exists= $con->query("SELECT * FROM  users WHERE receipt_ref='$ref' ") or die(mysqli_error($con));
// 		if($ref_exists->num_rows>0){
// 			echo "<script>alert('Error. Receipt Reference ".$ref." already Exists in the system')</script>";		

// 		}
		
		
// 		else {
		
	
// 		$query_ref = $con->query("UPDATE users set  receipt_ref='$ref',payment_option_id='$paymt_option',validator='$user' WHERE id='$your_id' ") or die(mysqli_error($con));

	
// 		$query =$con->query("UPDATE personal_details set matricule='$matric',admitted='1' WHERE your_id='$your_id' ") or die(mysqli_error($con));
// 		$query_prog =$con->query("UPDATE programs set serial='$last'  WHERE id='$prog_id' ") or die(mysqli_error($con));

		

// 		echo "<script>alert('Student has successfully been admitted . Thank you')</script>";
// 		echo '<meta http-equiv="Refresh" content="0; url=?admit_applicant">';
		
// 		}
		
// 		}
// 	}



// 	function SaveMatriculeInd($user){
// 		if(isset($_POST['save'])){
// 	$con= dbcon(); 
// 	$your_id=$_POST['your_id'];
// 	$matric=$_POST['matric'];
// 	$prog_id=$_POST['prog'];
// 	$last=$_POST['last'];
	

// 	$query =$con->query("UPDATE personal_details set matricule='$matric',admitted='1' WHERE your_id='$your_id' ") or die(mysqli_error($con));
// 	$query_prog =$con->query("UPDATE programs set serial='$last'  WHERE id='$prog_id' ") or die(mysqli_error($con));

	

// 	echo "<script>alert('Student has successfully been admitted . Thank you')</script>";
// 	echo '<meta http-equiv="Refresh" content="0; url=?admit_applicant">';
	
// 	}
// }
			
// 	 function testSmsGroup(){
// 		 if(isset($_POST['save'])){
// 		$con= dbcon(); 
// 		$tempArray =array();
// 		$phoneNumbers=$con->query("SELECT tel FROM  users WHERE user_level='1' ") or die(mysqli_error($con));
// 		while($contact =$phoneNumbers->fetch_array()){
// 			array_push($tempArray,$contact['tel']);
// 		}
// 		$formatContactArray = Helpers::formatPhoneNumbers($tempArray);
// 		//send sms to formatted array of numbers
// 		$message=$_POST['message'];
// 		Helpers::sendSMS($message,$formatContactArray);
// 		echo "<script>alert('Your Form has successfully been Submitted . Thank you')</script>";
// 	}
		
// 	 }

// 	 function SaveManualPayments(){
// 		$con= dbcon(); 
// 		if(isset($_POST['submit'])){
// 		 $id=base64_decode($_GET['xxc']);
// 		 $year_id=$_POST['year_id'];
// 		 $mode=$_POST['mode'];
// 		 $dtype=$_POST['dtype'];
// 		 @session_start();
// 		 $date=date('Y-m-d G:i:s');
// 		 $user_id=$_SESSION['userSession'];
// 		 if(empty($dtype)){
// 			echo "<script>alert('Choose Degree type to continue')</script>";

// 		 }
// 		 else if(empty($mode)){
// 			echo "<script>alert('Choose a Reason for this method to continue')</script>";

// 		 } 
// 		 else {
// 		 $Payments=$con->query("SELECT * from degrees WHERE id='$mode' ") or die(mysqli_error($con));
// 		while($rows =$Payments->fetch_array()){
// 			 $amt=$rows['amount'];
// 		}
// 		$select_trans =$con->query("SELECT * FROM  users,transactions where transactions.user_id='".$id."' 
// 		AND users.id=transactions.user_id AND  transactions.year_id='$year_id' ") or die(mysqli_error($con));								
// 		 $momo_paid=$select_trans->num_rows;
// 		 if($momo_paid>0){
// 			echo "<script>alert('Payments Details already Exists for this User')</script>";

// 		 }
// 		 else {

// 			$query =$con->query("INSERT INTO transactions set created_at='$date',updated_at='$date',
// 			year_id='$year_id',staff_id='$user_id', amount='$amt', user_id='$id',reference='MANAUAL',
// 			degree_type_id='$dtype',mode_id='$mode' ") or die(mysqli_error($con));
// 			echo "<script>alert('Payments successfully bypassed. Tell the applicant to login and continue')</script>";
// 			echo '<meta http-equiv="Refresh" content="0; url=?approve_pmts">';

// 		 }

// 		}
// 	}


// 	}

		
	//With this function you can calculate the dates left until a certain date	
	function expire($expiration_date) // delare the function and get the expiration date as a parameter
	{
		$date=strtotime($expiration_date); // get the expiration date in seconds
		$days_left=ceil(($date-time())/(60*60*24)); // calculate the days left. calculate the expiration date minus the current time in seconds. Devide the difference by the seonds in one day
													// The result number will be the days left.
		return $days_left; //return the value
	}
	
	function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}




function countMyDays($year, $month, $ignore) {
	$count = 0;
	$counter = mktime(0, 0, 0, $month, 1, $year);
	while (date("n", $counter) == $month) {
		if (in_array(date("w", $counter), $ignore) == false) {
			$count++;
		}
		$counter = strtotime("+1 day", $counter);
	}
	return $count;  }
	
	// echo countMyDays($year, $month, array(0, 6)); // 23

	

	
	
	
			
			// With this function you can calculate on how many days someone has birthday
	function countdays($date)   // declare the function and get the birth date as a parameter
	{
		 $olddate =  substr($d, 4); // use this line if you have a date in the format YYYY-mm-dd.
		 $newdate = date("Y") ."".$olddate; //set the full birth date this year
		 $nextyear = date("Y")+1 ."".$olddate; //set the full birth date next year
		 
		 
			if(strtotime($newdate) > strtotime(date("Y-m-d"))) //check if the birthday has passed this year. In order to check use strotime(). if it has not....
			{
			$start_ts = strtotime($newdate); // set a variable equal to the birthday in seconds (Unix timestamp, check php manual for more information)
			$end_ts = strtotime(date("Y-m-d"));// and a variable equal to today in seconds
			$diff = $end_ts - $start_ts; // calculate the difference of today minus birthday
			$n = round($diff / (60*60*24));// divide the diffence with the seconds of one day to get the dates. Use round() to get a round number.
										//(60*60*24) represents 60 seconds * 60 minutes * 24 hours = 1 day in seconds. You can also directly write 86400
			$return = substr($n, 1); //you need this to get the right value without -
			return $return; // return the value
			}
			else // else if the birthday has past this year
			{
			$start_ts = strtotime(date("Y-m-d")); // set a variable equal to the today in seconds
			$end_ts = strtotime($nextyear); // and a variable with the birtday next year
			$diff = $end_ts - $start_ts; // calculate the difference of next birthday minus today
			$n = round($diff / (60*60*24)); // divide the diffence with the seconds of one day to get the dates.
			$return = $n; // assign the dates to return
			return $return; // return the value
		
			}
		
		}
				
			
	
	