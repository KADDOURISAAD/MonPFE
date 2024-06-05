<?php
include('admin/config/dbcon.php');

if(isset($_SESSION['auth_user'])) { 
  $field = $_SESSION['auth_user']['user_field'];
  $role = $_SESSION['auth_role'];
  $user_name = $_SESSION['auth_user']['first_name'];
  $semesters = ['S1', 'S2'];

  foreach ($semesters as $semester) {
    $query = "SELECT id,Rooms,ExamDate, DATE_FORMAT(StartTime, '%H:%i') AS StartTime, DATE_FORMAT(EndTime, '%H:%i') AS EndTime, Module FROM exams WHERE Field = ? AND Semester = ? order by ExamDate";
                        $stmt = $con->prepare($query);
                        $stmt->bind_param('ss', $field, $semester);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $exams = $result->fetch_all(MYSQLI_ASSOC);
                        
                        if (count($exams) > 0) {
    // Fetch timetable data from the database
    ?><div class="card">
                <div class="card-header">
                    <h4><?= $field != 'null' && $semester != 'null' ? "$field-$semester Exams Timetable" : "" ?></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive-xl">
                        <?php
                       
                       
                            echo "<table class='table table-bordered mt-5'>";
                            echo "<thead><tr><th scope='col'>Date</th><th scope='col'>Time</th><th scope='col'>Module</th><th scope='col'>Salle</th></tr></thead><tbody>";
                            foreach ($exams as $index => $examrow) {
                                echo "<tr><td>{$examrow['ExamDate']}</td><td>{$examrow['StartTime']}-{$examrow['EndTime']}</td><td>{$examrow['Module']}</td>";
                                if ($index == 0) {
                                    echo "<td rowspan='" . count($exams) . "'>Rooms: <b>{$examrow['Rooms']}</b></td>";
                                    echo"<input type='hidden' id='examroom' name='examroom' value='{$examrow['Rooms']}'>";
                                }
                                ?><td><button 
                                data-bs-id="<?php echo $examrow['id']; ?>"
                                data-bs-date="<?php echo $examrow['ExamDate']; ?>"
                                data-bs-Stime="<?php echo $examrow['StartTime']; ?>"
                                data-bs-Etime="<?php echo $examrow['EndTime']; ?>"
                                data-bs-module="<?php echo $examrow['Module']; ?>"
                                data-bs-toggle="modal"
                                data-bs-target="#exammodal"
                                data-bs-whatever="@mdo"
                                style="margin-left: 10px; padding: 5px; font-size: 2; background-color: transparent; border: none;"
                              >
                                <?php
                                echo "</tr>";

                            }
                            echo "</tbody></table>";
                      
                        ?>
                    </div>
                </div>
            </div> <?php } ?>
        <?php
    }}?>