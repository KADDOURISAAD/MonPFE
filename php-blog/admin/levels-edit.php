<?php

 include('authentication.php');
 include('includes/header.php');



?>
  <div class="container-fluid px-4">
    <h4 class="mt-4">Levels Edit</h4>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item">Levels Edit</li>
        </ol>
         <div class="row">
             <div class="col-md-6">
                 <div class="card">
                     <div class="card-header">
                    <h4>Edit Level</h4>
                    </div>
                     <div class="card-body">
                        <?php
                        if(isset($_GET['id'])) {
                            $field_id = $_GET['id'];
                            $field = "SELECT * FROM levels WHERE id ='$field_id'";
                            $field_run = mysqli_query($con,$field);

                            if(mysqli_num_rows($field_run) > 0) {
                                foreach($field_run as $field) { 
                                ?>


                             
                        <form action="code.php" method="POST">
                            <input type="hidden" name="level_id" value="<?=$field_id ?>">
                            <div class="row">
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                <label for="">Level Name</label>
                                    <input required type="text" name="level_name" value="<?=$field['name']; ?>" class="form-control">
                                </div>
                                <!--  -->
                                <div class="col-md-6 mb-3">
                                  <label for="">Field </label>
                                      <select name="field_name" id="field_name" required class="form-control">
                                      <option value="<?=$field['field']; ?>"><?=$field['field']; ?></option>
                                      <?php
                          // Requête pour récupérer les noms des champs depuis la table "fields"
                                   $field_query = "SELECT * FROM fields";
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
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Description</label>
                                   
                                    <textarea required name="description" rows="4" cols="50"  class="form-control"> <?=$field['description'];?> </textarea>
                                </div>
                               <!--  -->
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="update_level" class="btn btn-primary">Update Level</button>
                                </div>
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