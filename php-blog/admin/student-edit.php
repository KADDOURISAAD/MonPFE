<?php

 include('authentication.php');
 include('includes/header.php');



?>
  <div class="container-fluid px-4">
    <h4 class="mt-4">Students</h4>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item">Students</li>
        </ol>
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                    <h4>Edit Student</h4>
                    </div>
                     <div class="card-body">
                        <?php
                        if(isset($_GET['id'])) {
                            $user_id = $_GET['id'];
                            $users = "SELECT * FROM users WHERE id ='$user_id'";
                            $users_run = mysqli_query($con,$users);

                            if(mysqli_num_rows($users_run) > 0) {
                                foreach($users_run as $user) { 
                                ?>


                             
                        <form action="code.php" method="POST">
                            <input type="hidden" name="user_id" value="<?=$user['id']; ?>">
                            <div class="row">
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">First Name</label>
                                    <input type="text" name="fname" value="<?=$user['fname'];?>" class="form-control">
                                </div>
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lname" value="<?=$user['lname'];?>" class="form-control">
                                </div>
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Email Adress</label>
                                    <input type="text" name="email" value="<?=$user['email'];?>" class="form-control">
                                </div>
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Password</label>
                                    <input type="text" name="password" value="<?=$user['password'];?>"  class="form-control">
                                </div>
                                <!-- fasila -->
                              <input required type="hidden" name="role_as" value ="0"  class="form-control">
                              
                              <!-- fasila -->
                              <div class="col-md-6 mb-3">
                                  <label for="">Birth date</label>
                                  <input required type="date" name="birth_date" value="<?=$user['birth_date'];?>" class="form-control">
                              </div>
                              <!--  -->
                              <!-- fasila -->
                              <div class="col-md-6 mb-3">
                                  <label for="">Gender</label>
                                  <select name="gender" required class="form-control">
                                      <option value="<?=$user['gender'];?>"><?=$user['gender'];?></option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                  </select>
                              </div>
                              <!--  -->
                              
                              <!-- fasila -->
                              <div class="col-md-6 mb-3">
                                  <label for="">Mobile Number</label>
                                  <input required type="number" name="mobile_number" value="<?=$user['mobile_number'];?>" class="form-control">
                              </div>
                              <!--  -->
                               <!-- fasila -->
                               <div class="col-md-6 mb-3">
                                  <label for="">Adress</label>
                                  <input required type="text" name="address" value="<?=$user['address'];?>"  class="form-control">
                              </div>
                              <!--  -->
                              <div class="col-md-6 mb-3">
                                  <label for="">Level </label>
                                      <select name="field_name" id="field_name" required class="form-control">
                                      <option value="<?=$user['field'];?>"><?=$user['field'];?></option>
                                      <?php
                          // Requête pour récupérer les noms des champs depuis la table "fields"
                                   $field_query = "SELECT * FROM levels";
                                  $field_query_run = mysqli_query($con, $field_query);

                          // Vérifier si la requête a renvoyé des résultats
                          if ($field_query_run) {
                          // Boucle à travers les résultats et afficher chaque nom de champ comme une option
                          foreach ($field_query_run as $field_row) {
                                  ?>
                              <option value="<?php echo $field_row['name']; ?>"><?php echo $field_row['name']; ?></option>
                                  <?php
                                          }
                                  } else {
                              // Afficher un message si aucune donnée n'est trouvée dans la table "fields"
                              echo "<option value=''>No fields found</option>";
                                          }
                                           ?>
                                  </select>
                                  </div>
                                  <!--  -->
                                  <div class="col-md-6 mb-3">
                                  <label for="">Group</label>
                                  <select name="group_name" id="group_name" required class="form-control">
                                  <option value="<?=$user['groupe'];?>"><?=$user['groupe'];?></option>
                                              </select>
                                          </div>
                                          
                              
                              <!--  -->
                              
                                 <div class="col-md-12 mb-3">
                                    <button type="submit" name="update_user" class="btn btn-primary">Update Student</button>
                                </div>  



                                </form>
                        <?php
                                }
                            } else {
                                ?>
                                <h4>No Record Found</h4>
                                <?php
                            }
                        }
                         
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
 include('includes/footer.php');

 include('includes/scripts.php');


?>

<!-- Ro7 tergod khy video number 8 d9i9a 11.35 -->