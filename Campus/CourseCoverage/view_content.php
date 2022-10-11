
        <div class="row">
        <div class="col-sm-12">  
 
  
 <?php 


 $check_exits=$con->query("SELECT * FROM courses,prog_courses,topics WHERE courses.id=prog_courses.course_id
 and prog_courses.id='".$_GET['id']."'  AND topics.course_id=prog_courses.id
  ") 
        or die(mysqli_error($con));
        $i=1;
         $nums=$check_exits->num_rows;
 
 ?>      
   
 <table class="table .table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Topic</th>
        <th>Sub Topics</th>
        
        
        
      </tr>
    </thead>
    <tbody>
    <?php
   

			while($rows=$check_exits->fetch_assoc()){
	?>
  
      <tr>
        <td><?php echo $i++; ?></td>
        
  
         <td><?php echo $rows['topic']; ?>   </td>
        
            <td>
        <?php 
       
        $check_all=$con->query("SELECT * from sub_topics where topic_id='".$rows['id']."'
        ")  or die(mysqli_error($con));
               while($ro=$check_all->fetch_assoc()){

                $check_alls=$con->query("SELECT * from sub_topics_taught where subtopic_id='".$ro['id']."'
                ")  or die(mysqli_error($con));
                 $yes=$check_alls->num_rows;
    
                    
                    if($yes>0){
                        $act= "<span style='color:#00F;font-weight:bold'> ✓</span>";
                    }
                    else {
                        $act= "<span style='color:#f00;font-weight:bold'>❌</span>";
                    }
                    $topic=$ro['content'].$act;
              echo "<ul><li>". $topic."</li></ul>";
                 
                 ?> 

                 <?php } ?>
        </td>
       
      </tr>
      <?php }  ?>
      

      
      
    </tbody>
  </table>
  
          </div>
        </div>
        
        