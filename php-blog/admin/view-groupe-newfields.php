
<?php

 include('authentication.php');
 include('includes/header.php');



?>

  <div class="container-fluid px-4">
  <?php    if(isset($_SESSION['field_name'])) {
    $group_field = $_SESSION['field_name'];

$subject = $con->query("SELECT * FROM groups WHERE field ='$group_field' order by name");
 ?>
                        <h4 class="mt-4">Groups List</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item">Groups List</li>
                        </ol>
                        <div class="row">
                            <!-- Jdid -->
                            <div class="col-md-4">
                 <div class="card">
                     <div class="card-header">
                    <h4>Add Group
                       
                    </h4>
                    </div>
                     <div class="card-body">
                     <form action="code.php" method="POST">
                        
                            <div class="row">
                                <!-- fasila -->
                                <div class="col-md-12 mb-3">
                                    <label for="">Group Name</label>
                                    <input required type="text" name="group_name"  class="form-control">
                                  
                                </div>
                                  <!-- fasila -->
                                  <div class="col-md-12 mb-3">
                                    <label for="">Field</label>
                                    <input required type="text" name="field_name" value="<?php echo $group_field ?>" class="form-control" readonly>
                                  
                                </div>
                                <!--  -->
                                

                                <!-- fasila -->
                                <div class="col-md-12 mb-3">
                                
                                    <label for="">Number of students</label>
                                    <input required type="text" name="student_number"  class="form-control">
                                  
                                </div>
                               
                           
                                <!-- fasila -->
                                
                                <br><br><br>
                                <div class="col-md-12 mb-3">
                                    <button type="submit"  name="add_group" class="btn btn-primary">Add Group</button>
                                </div>
                            </div>
                        </form>
                     </div>
                </div>
            </div>
                            <!-- jdid -->
                            <div class="col-md-8">
                                <?php include('message.php');?>
                                <div class="card">
                                    <div class="card-header">
                                
                                             
                                            <h4><?php echo $group_field?> Groups
                                            
                                        </h4>
                                    
                                    </div>
                                    <div class="card-body">
                                        
                                        <!-- New  -->
                                        <table id="example" class="table table-bordered table-hover">
							<thead>
                                
								<tr>
									
                                    <th class="text-center">#</th>
                                    <th class="text-center">Group Name</th>
                                    <th class="text-center">Number of students</th>
                                   
                                    <th class="text-center">Delet</th>
									
								</tr> 
							</thead>
							<tbody>
<?php 



							
								$i = 1;
								
								while($row=$subject->fetch_assoc()):
								?>
								<tr>
                                   <td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<?php echo $row['name'] ?>
										
                                        <td><?php echo $row['student_number'] ?></td>

                                        
                                       
                                        <td><form action="code.php" method="POST">
                                        <button type="submit" name="groupe_delete" value="<?= $row['id']?>" class="btn btn-danger">Delete</button>
                                       </form></td>
								
                                              
                                         
										
								</tr>
								
								<?php endwhile; 
								}
								?>
</tbody>
						</table>
                                        <!-- New -->
                                        
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
   

<?php
 include('includes/footer.php');

 include('includes/scripts.php');


?>