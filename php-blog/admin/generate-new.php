<?php

 include('authentication.php');
 include('includes/header.php');



 $field = $_GET['field'];  
 $semester = $_GET['semester'];
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
        <option value="<?=$field?>"><?php if($field != 'null') {echo $field;} else{echo "Select Level";}?></option>
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
                               
                                 <option value="<?=$semester?>">
                                 <?php
                                 if($semester=='S1'){echo'Semester 1';}elseif($semester=='S2'){echo'Semester 2';}else{echo'Select Semester';}
                                 ?>
                                </option>
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
                                <input name="field_name_" type="hidden" value="<?=$field?>">
                              <input name="semester_" type="hidden" value="<?=$semester?>">
                                
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
                                
                                <!--  -->
                                <div class="col-md-3 mb-3">
                                <label for="">Lesson</label>
                                <select required name="lesson" id="lesson" class="form-control">
                                <option value="">Select Lesson</option>
                                <?php
                                $lesson_query = "SELECT semester,course_name,has_course,has_tp, has_td FROM courses WHERE semester = '$semester' AND field_name='$field' ORDER BY semester";
                                $lesson_query_run = mysqli_query($con, $lesson_query);
                                
                                // Check if the query was successful
                                if ($lesson_query_run) {
                                    
                                    // Loop through the results and store the course names in an array
                                    while ($lesson_row = mysqli_fetch_assoc($lesson_query_run)) {
                                        if ($lesson_row['has_course'] == 1) {
                                           
                                         ?>   <option value="<?php echo 'Cours-' . $lesson_row['course_name'];?>"><?php echo 'Cours-' . $lesson_row['course_name'];?></option><?php
                                        }
                                        // Check if has_tp is 1, if true, add TP row
                                        if ($lesson_row['has_tp'] == 1) {
                                            
                                         ?>   <option value="<?php echo 'TP-' . $lesson_row['course_name'];?>"><?php echo 'TP-' . $lesson_row['course_name'];?></option><?php
                                        }
                                        // Check if has_td is 1, if true, add TD row
                                        if ($lesson_row['has_td'] == 1) {
                                          ?>  <option value="<?php echo 'TD-' . $lesson_row['course_name'];?>"><?php echo 'TD-' . $lesson_row['course_name'];?></option><?php
                                        }
                                    }}
                                ?>
                                </select>
                                </div>
                                <!--  -->
                                <div class="col-md-3 mb-3">
                                <label for="">Group</label>
                                <select  name="group_name" id="group_name" class="form-control">
                                <option value="">Select Group</option>
                                <?php
                            // Requête pour récupérer les noms des champs depuis la table "fields"
                                     $group = "SELECT * FROM groups WHERE field='$field'";
                                    $group_run = mysqli_query($con, $group);

                            // Vérifier si la requête a renvoyé des résultats
                            if ($group_run) {
                            // Boucle à travers les résultats et afficher chaque nom de champ comme une option
                            foreach ($group_run as $group_row) {
                                    ?>
                                <option value="<?php echo $group_row['name'];?>"><?php echo $group_row['name']  ?></option>
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
                                <label for="">Room</label>
                                <select required name="room" class="form-control">
                                <option value="">Select Room</option>
                                <?php
                            // Requête pour récupérer les noms des champs depuis la table "fields"
                                     $room_query = "SELECT * FROM rooms";
                                    $room_query_run = mysqli_query($con, $room_query);

                            // Vérifier si la requête a renvoyé des résultats
                            if ($room_query_run) {
                            // Boucle à travers les résultats et afficher chaque nom de champ comme une option
                            foreach ($room_query_run as $room_row) {
                                    ?>
                                <option value="<?php echo $room_row['room_name'];?>"><?php echo $room_row['room_name'] . ' ' . $room_row['room_type']; ?></option>
                                    <?php
                                            }
                                    } else {
                                // Afficher un message si aucune donnée n'est trouvée dans la table "fields"
                                echo "<option value=''>No fields found</option>";
                                            }
                                             ?>
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
                                            <a class='btn btn-primary float-end' href="allpdf.php">Download all Timetables</a>      
                                        </h4>
                                      
                                    </div>
                                    <div class="card-body">
                                    <div class="table-responsive-xl">
                                    <?php
                     
                     $query = "SELECT id,room,time,day,lesson,group_name,teacher_name FROM timetable WHERE field='$field' AND semester='$semester' ";
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
  $timetable[$key][] = [
    'lesson' => $row['lesson'],
    'group_name' => $row['group_name'],
    'teacher_name' => $row['teacher_name'],
    'room' => $row['room'],
    'id' => $row['id'] // assuming 'id' is the primary key of the timetable table
  ];
}

$times = ['8:30-10:00', '10:00-11:30', '11:30-13:00', '13:00-14:00', '14:00-15:30', '15:30-17:00'];

foreach ($times as $time) {
  echo "<tr>";
  echo "<td>$time</td>";
  foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'] as $day) {
    echo "<td>";
    $key = $time . '-' . $day;
    if (isset($timetable[$key])) {
      foreach ($timetable[$key] as $entry) {
        // Output the data with a delete button
        echo "<div style='display: flex; align-items: center;'>";
        if(!empty($entry['group_name'])){
          echo "<div style='background-color: #f2f2f2; margin: 2px; padding: 5px;'>{$entry['lesson']} | {$entry['group_name']} | {$entry['room']} | {$entry['teacher_name']}</div>"; 
          }else{        
                    echo "<div style='background-color: #f2f2f2; margin: 2px; padding: 5px;'>{$entry['lesson']} | {$entry['room']} | {$entry['teacher_name']}</div>"; 
        }
        echo "<form method='POST' action='code.php'>"; // Change 'delete.php' to your delete endpoint
        echo "<input type='hidden' name='id' value='{$entry['id']}'>";
        echo "<input type='hidden' name='id' value='{$entry['id']}'>";
        echo "<input type='hidden' name='field__name' value='$field'>";
        echo "<input type='hidden' name='_semester_' value='$semester'>";
        echo "<button name='delete_event' type='submit' style='margin-left: 10px; padding: 5px; font-size: 2; background-color: transparent; border: none;'><i class='fa-regular fa-trash-can'></i></button>"; // Button with icon
        echo "</form>";
        echo "</div>"; // End flex container
      }
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
   
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const formElements = {
        teacher: document.querySelector('select[name="teacher"]'),
        group: document.querySelector('select[name="group_name"]'),
        time: document.querySelector('select[name="time"]'),
        day: document.querySelector('select[name="day"]'),
        room: document.querySelector('select[name="room"]'),
        lesson: document.querySelector('select[name="lesson"]')
    };

    async function checkConstraints() {
        const field_name = document.querySelector('input[name="field_name_"]').value;
        const semester = document.querySelector('input[name="semester_"]').value;
        const teacher = formElements.teacher.value;
        const group = formElements.group.value;
        const time = formElements.time.value;
        const day = formElements.day.value;
        const room = formElements.room.value;
        const lesson = formElements.lesson.value;

        const params = new URLSearchParams({
            field_name, semester, teacher, group, time, day, room, lesson
        });

        try {
            const response = await fetch('check_constraints.php?' + params.toString());
            const data = await response.json();

            if (data.status === 'error') {
                alert(data.message);
            } else {
                console.log('Constraints are fine.');
            }
        } catch (error) {
            console.error('Error checking constraints:', error);
        }
    }

    formElements.teacher.addEventListener('change', checkConstraints);
    formElements.group.addEventListener('change', checkConstraints);
    formElements.time.addEventListener('change', checkConstraints);
    formElements.day.addEventListener('change', checkConstraints);
    formElements.room.addEventListener('change', checkConstraints);
    formElements.lesson.addEventListener('change', checkConstraints);
});
</script>

<?php

 include('includes/footer.php');

 include('includes/scripts.php');

  
?>
<!--  -->
