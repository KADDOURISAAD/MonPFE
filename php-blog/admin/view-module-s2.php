<?php

 include('authentication.php');
 include('includes/header.php');



?>

  <div class="container-fluid px-4">
                        <h4 class="mt-4">Course List</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item">Course List</li>
                        </ol>
                <div class="row">

                     
                            <div class="col-md-12">
                                <?php include('message.php');?>
                                <div class="card">
                                    <div class="card-header">
                                            <h4>Course S2
                                            <a href="add-course.php" class="btn btn-primary float-end">Add Course</a>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- jdid -->
                                        <table id="example" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Module</th>
                                    <th class="text-center">TD</th>
                                    <th class="text-center">TP</th>
                                    <th class="text-center">Field</th>
                                    <th class="text-center">Semester</th>
                                    <th class="text-center">Coefficient</th>
                                    <th class="text-center">Credit</th>
                                    <th class="text-center" >Edit</th>
                                    <th class="text-center">Delete</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$subject = $con->query("SELECT * 
                                FROM courses 
                                WHERE semester = 'S2'
                                ORDER BY field_name ASC");
                                
								while($row=$subject->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p>Module: <b><?php echo $row['course_name'] ?></b></p>
										<p>Description: <small><b><?php echo $row['description'] ?></b></small></p>
										<td>
                                                                    <?php
                                                                        if($row['has_td'] == '1') 
                                                                        {
                                                                            echo "Yes";
                                                                        }elseif ($row['has_td'] == '0') {
                                                                            echo "No";
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        if($row['has_tp'] == '1') 
                                                                        {
                                                                            echo "Yes";
                                                                        }elseif ($row['has_tp'] == '0') {
                                                                            echo "No";
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td><?= $row['field_name']?></td>
                                                                <td><?= $row['semester']?></td>
                                                                <td><?= $row['coef']?></td>
                                                                <td><?= $row['credit']?></td>
                                
                                                                <td><a href="course-edit.php?id=<?= $row['id']?>" class="btn btn-success">Edit</a></td>
                                                                <td>
                                                                    <form action="code.php" method="POST">
                                                                    <button type="submit" name="course_delete" value="<?= $row['id']?>" class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </td>
									
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
                                        <!-- jdid -->
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
   

<?php
 include('includes/footer.php');

 include('includes/scripts.php');


?>