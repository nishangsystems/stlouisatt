	   <?PHP include '../includes/functions.php';
			  @session_start();
				if(empty($_SESSION['userSession'])){
					
						echo '<meta http-equiv="Refresh" content="0; url=../login.php">';
				}
			
				 else {
					
					$query =$con->query("SELECT * FROM users WHERE id=".$_SESSION['userSession']) or die(mysqli_error($con));
			
					while($userRow=$query->fetch_array()){
					
					$full_name=$userRow['full_name'];
					$level=$userRow['user_level'];
					$user_id=$userRow['id'];
					
					}
						$select =$con->query("SELECT * FROM   ayear WHERE status='1' ") or die(mysqli_error($con));
							
							while($rows=$select->fetch_assoc()){
								$cur_ayear=$rows['cur_ayear'];
								$year_id=$rows['id'];
							}

     					
				

            if(empty($level)){
            echo '<meta http-equiv="Refresh" content="0; url=../login.php">';

            }
            else if($level!=2){
                echo '<meta http-equiv="Refresh" content="0; url=../login.php">';
                
                }

            
            if($level=='2' ){
	   
	   
	    ?>
       
	   
	   <?php include '../includes/header.php'; ?>	
	   <?php include '../includes/Teachers_sidebar.php'; ?>
       <?php include '../includes/Teachers_content.php'; ?>
       <?php include '../includes/footer.php'; ?>
       <?php  } } ?>























			
