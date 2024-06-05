
<?php

 include('authentication.php');
 include('includes/header.php');



?>
<div class="container-fluid px-4">
  
    
  <div class="row mt-4">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
             <h4>Add Course
                 
             </h4>
             </div>
<div class="card-body">
                     <form action="code.php" method="POST">
                        
                            <div class="row">
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Course Name</label>
                                    <input required type="text" name="course_name"  class="form-control">
                                  
                                </div>
                                <!-- fasila -->
                               <div class="col-md-6 mb-3">
                                    <label for="">Course Coefficient</label>
                                    <input required type="number" name="coef"  class="form-control">
                                  
                                </div>
                                <!-- fasila -->
                               <div class="col-md-6 mb-3">
                                    <label for="">Course credit</label>
                                    <input required type="number" name="credit"  class="form-control">
                                  
                                </div>
                                <!-- fasila -->
                                <div class="col-md-6 mb-3">
                                    <label for="">Description</label>
                                    <textarea required name="description" rows="4" cols="50" class="form-control"></textarea>
                                </div>
                               <!-- fasila -->
                               


                               
                               <div class="col-md-6 mb-3">
    <label for="">Field</label>
    <select name="field_name" required class="form-control">
        <option value="">--Select Field--</option>
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
    <label for="">Semester</label>
    <select name="semester" required class="form-control">
        <option value="">--Select semester--</option>
        <option value="S1">--Semester 1 --</option>
        <option value="S2">--Semester 2 --</option>
        
    </select>
</div>

<!--  -->

<div class="col-md-3 mb-3">
<label for="">Lessons</label>
<div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
<input type="checkbox" class="btn-check" name="has_course" id="btncheck1" autocomplete="off">
  <label class="btn btn-outline-primary" for="btncheck1">Cours</label>

  <input type="checkbox" class="btn-check" name="has_td" id="btncheck2" autocomplete="off">
  <label class="btn btn-outline-primary" for="btncheck2">TD</label>

  <input type="checkbox" class="btn-check" name="has_tp" id="btncheck3" autocomplete="off">
  <label class="btn btn-outline-primary" for="btncheck3">TP</label>
</div>
    </div>
<!--  -->
                           
                                <!-- fasila -->
                               
                                <br><br><br>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="add_course" class="btn btn-primary">Add Course</button>
                                </div>
                            </div>
                        </form>
                     </div></div>
            </div>
            </div>
            </div>
        </div>
    </div>

            <?php
 include('includes/footer.php');

 include('includes/scripts.php');


?>
