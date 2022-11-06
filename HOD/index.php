	   <?PHP include '../includes/functions.php';
			  @session_start();
				if(empty($_SESSION['userSession'])){
					
						echo '<meta http-equiv="Refresh" content="0; url=../login.php">';
				}
			
				 else {
					
					$query =$con->query("SELECT * FROM campus,users WHERE campus.id=users.campus_id AND users.id=".$_SESSION['userSession']) or die(mysqli_error($con));
			
					while($userRow=$query->fetch_array()){
					
					$email=$userRow['user_email'];
					$level=$userRow['user_level'];
					$admin_id=$userRow['id'];
					$my_campus_id=$userRow['campus_id'];
					$campus_name=$userRow['camp_name'];
					
					
					}
						$select =$con->query("SELECT * FROM   ayear WHERE status='1' ") or die(mysqli_error($con));
							
							while($rows=$select->fetch_assoc()){
								$cur_ayear=$rows['cur_ayear'];
								$cur_year_id=$rows['id'];
							}

     					
				

            if(empty($level)){
            echo '<meta http-equiv="Refresh" content="0; url=../login.php">';

            }
            else if($level!=3){
                echo '<meta http-equiv="Refresh" content="0; url=../login.php">';
                
                }

            
            if($level=='3' ){
	   
	   
	    ?>
       
	   
	   <?php include '../includes/campus_header.php'; ?>	
	   <?php include '../includes/campus_sidebar.php'; ?>
       <?php include '../includes/campus_content.php'; ?>
       <?php include '../includes/footer.php'; ?>
       <?php  } } ?>























			
