<?php
include '../../includes/functions.php';
if(isset($_POST["Import"])){
		

		echo $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
	    
                $query=$con->query("SELECT * FROM courses where course_code='".$emapData[0]."' ") or die(mysqli_error($con));
                if($query->num_rows>0){

                }
                else {
	          //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into courses (`course_code`, `course_title`, `cv`, `status` ) 
	            	values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]')";
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query( $con, $sql );
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						</script>";
				
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
	        
			 

			 //close of connection
			mysqli_close($con); 
				
		 	
			
		 }
       
	}	 
?>		 