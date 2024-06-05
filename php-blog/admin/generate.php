<?php

 include('authentication.php');
 include('includes/header.php');



?>

  <div class="container-fluid px-4">
                        <h4 class="mt-4">Generate Timetable</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item">Time table</li>
                        </ol>
                        
                        <div class="row">
                        <div class="col-md-6 mb-3">
                        <form action="generate-new.php" method="POST">
    <select required name="field_name" id="field_name" class="form-select form-select-lg mb-3" aria-label="Large select example">
        <option value="">Select Level</option>
        <?php
        // Requête pour récupérer les noms des champs depuis la table "fields"
        $field_query = "SELECT * FROM levels";
        $field_query_run = mysqli_query($con, $field_query);

        // Vérifier si la requête a renvoyé des résultats
        if ($field_query_run) {
            // Boucle à travers les résultats et afficher chaque nom de champ comme une option
            foreach ($field_query_run as $row) {
                ?>
                <option value="<?= $row['name'] ?>" data-value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
                <?php
            }
        } else {
            // Afficher un message si aucune donnée n'est trouvée dans la table "fields"
            echo "<option value=''>No fields found</option>";
        }
        ?>
    </select>
    </form>
</div>   
                        <div class="col-md-6 mb-3">  
                               
                                <select required name="semester" id="semester" class="form-select form-select-lg mb-3" aria-label="Large select example">
                               
                                 <option value="">Select Semester</option>
                                    <option value="S1">Semester 1</option>
                                    <option value="S2">Semester 2</option>
                                
                                    </select>
                                </div>
                                
                                <!-- fasila -->
                                
                                <!--  -->
                               
                            <!-- Jdid -->
              <div class="col-md-4">
                 <div class="card">
                 <div class="card-header">
                    <h4>Add Event
                       
                    </h4>
                    </div>

                     <div class="card-body">
                      
                     
                     <form action="code.php" method="POST">
                        
                            <div class="row">
                                <!-- ADD EVENT -->
                                <!-- fasila -->
                            
                                
                               <!-- card end -->
                                <!-- fasila -->
                                
                                <div class="col-md-6 mb-3">
                                <label for="">Teacher</label>
                                <select required name="teacher" class="form-control">
                                <option value="">Select Teacher</option>
                                <?php
                            // Requête pour récupérer les noms des champs depuis la table "fields"
                                     $teacher_query = "SELECT fname,lname FROM users WHERE role_as=2";
                                    $teacher_query_run = mysqli_query($con, $teacher_query);

                            // Vérifier si la requête a renvoyé des résultats
                            if ($teacher_query_run) {
                            // Boucle à travers les résultats et afficher chaque nom de champ comme une option
                            foreach ($teacher_query_run as $teacher_row) {
                                    ?>
                                <option value="<?php echo $teacher_row['fname'];?>"><?php echo $teacher_row['fname'] . ' ' . $teacher_row['lname']; ?></option>
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
                                <div class="col-md-3 mb-3">
                                <label for="">Lesson</label>
                                <select required name="lesson" id="lesson" class="form-control">
                                <option value="">Select Lesson</option>
                                    
                                    </select>
                                </div>
                                <!--  -->
                                <div class="col-md-3 mb-3">
                                <label for="">Group</label>
                                <select  name="group_name" id="group_name" class="form-control">
                                <option value="">Select Group</option>
                                    
                                    </select>
                                </div>
                                <!--  -->
                                <div class="col-md-6 mb-3">
                                <label for="">Time</label>
                                <select required name="time" class="form-control">
                                <option value="">Select Time</option>
                                <option value="8:30-10:00">8:30-10:00</option>
                                <option value="10:00-11:30">10:00-11:30</option>
                                <option value="11:30-13:00">11:30-13:00</option>
                                <option value="14:00-15:30">14:00-15:30</option>
                                <option value="15:30-17:00">15:30-17:00</option>
                                    </select>
                                </div>
                                <!--  -->
                                <div class="col-md-6 mb-3">
                                <label for="">Day</label>
                                <select required name="day" class="form-control">
                                <option value="">Select Day</option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>                                                            
                                   </select>
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="add_event" class="btn btn-primary">Add event</button>
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
                                            <h4>TimeTable
                                            
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                    <div class="table-responsive-xl">
                                    <?php
                     
                     $query = "SELECT time,day,lesson,group_name,teacher_name FROM timetable";
                    $query_run = mysqli_query($con,$query);

                     
                     ?>  
                          <table class="table table-bordered mt-5">
  <thead>
    <tr>
      <th scope="col">Time</th>
      <th scope="col">Sunday</th>
      <th scope="col">Monday</th>
      <th scope="col">Tuesday</th>
      <th scope="col">Wednesday</th>
      <th scope="col">Thursday</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Assuming $query_run holds the result set
    $timetable = []; // Organize the data
    foreach ($query_run as $row) {
      $key = $row['time'] . '-' . $row['day'];
      if (!isset($timetable[$key])) {
        $timetable[$key] = [];
      }
      $timetable[$key][] = $row['lesson'] . '/' . $row['group_name'] . '/' . $row['teacher_name'];
    }

    $times = ['8:30-10:00', '10:00-11:30', '11:30-13:00', '13:00-14:00', '14:00-15:30', '15:30-17:00'];

    foreach ($times as $time) {
      echo "<tr>";
      echo "<td>$time</td>";
      foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'] as $day) {
        echo "<td>";
        $key = $time . '-' . $day;
        if (isset($timetable[$key])) {
          echo implode('<br>', array_slice($timetable[$key], 0, 3)); // Display up to three events
        }
        echo "</td>";
      }
      echo "</tr>";
    }
    ?>
  </tbody>
</table>

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