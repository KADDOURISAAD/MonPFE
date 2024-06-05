<?php

 include('authentication.php');
 include('includes/header.php');



?>
  <div class="container-fluid px-4">
    <h4 class="mt-4">Course Edit</h4>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item">Course Edit</li>
        </ol>
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                    <h4>Edit Course</h4>
                    </div>
                     <div class="card-body">
                        <?php
                        if(isset($_GET['id'])) {
                            $course_id = $_GET['id'];
                            $course = "SELECT * FROM courses WHERE id ='$course_id'";
                            $course_run = mysqli_query($con,$course);

                            if(mysqli_num_rows($course_run) > 0) {
                                foreach($course_run as $course) { 
                                ?>


                             
                        <form action="code.php" method="POST">
                            <input type="hidden" name="course_id" value="<?=$course['id']; ?>">
                            <div class="row">
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Course Name</label>
                                    <input type="text" name="course_name" value="<?=$course['course_name'];?>" class="form-control">
                                </div>
                                <!-- fasila -->
                                  <!-- fasila -->
                               <div class="col-md-6 mb-3">
                                    <label for="">Course Coefficient</label>
                                    <input required type="number" name="coef"  value="<?=$course['coef'];?>" class="form-control">
                                  
                                </div>
                                <!-- fasila -->

                                   <!-- fasila -->
                               <div class="col-md-6 mb-3">
                                    <label for="">Course credit</label>
                                    <input required type="number" name="credit"  value="<?=$course['credit'];?>" class="form-control">
                                  
                                </div>
                                <!--  -->
                                <div class="col-md-6 mb-3">
                                <label for="">Semester</label>
    <select   name="semester" class="form-control">
        <option value="S1" <?= $course['semester'] == 'S1' ? 'selected' : '' ?>>Semester 1 </option>
        <option value="S2" <?= $course['semester'] == 'S2' ? 'selected' : '' ?>>Semester 2 </option>
       
    </select>
                                </div>
    </div>
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Field </label>
    <select name="field_name" required class="form-control">
        <option value="<?=$course['field_name'];?>"><?=$course['field_name'];?></option>
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
   <!--  -->
   <div class="col-md-6 mb-3">
   <label for="">Lessons</label>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" name="has_course" <?= $course['has_course'] == '1' ? 'checked':''?> id="btncheck1" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck1">Cours</label>

                <input type="checkbox" class="btn-check" name="has_td" <?= $course['has_td'] == '1' ? 'checked':''?> id="btncheck2" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck2">TD</label>

                <input type="checkbox" class="btn-check" name="has_tp" <?= $course['has_tp'] == '1' ? 'checked':''?> id="btncheck3" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck3">TP</label>
                </div>
                </div>
                <!--  -->
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Description</label>
                                    
                                    <textarea required name="description"  rows="4" cols="50" class="form-control"><?=$course['description'];?></textarea>
                                </div>
 
             
                               
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="update_course" class="btn btn-primary">Update Course</button>
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
                    </div>
   
<?php
 include('includes/footer.php');

 include('includes/scripts.php');


?>

<!-- Ro7 tergod khy video number 8 d9i9a 11.35 -->