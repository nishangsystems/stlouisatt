
													<div class="space"></div>

<div>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th class="center">#</th>
        <th>Department</th>
      
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
                                   
                                      
                                      <?php
                                      $select =$con->query("SELECT * FROM  departments order by dept_name  ") or die(mysqli_error($con));
                                      $a=1;						
                                       while($rows=$select->fetch_assoc()){
                                      
                                  ?>
      <tr>
        <td class="center"><?php echo $a++; ?></td>

        <td>
          <?php echo $rows['dept_name'];  ?>
        </td>
        
        
        <td><a href="?create_dept_prog&id=<?php echo $rows['id']; ?>&&ndndbdb" class="btn btn-primary btn-xs">Create Programs for this Department </a></td>
      </tr>

      <?php } ?>
    </tbody>
  </table>

</div>
</div>