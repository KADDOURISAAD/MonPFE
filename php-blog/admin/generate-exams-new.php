<?php
include('authentication.php');
include('includes/header.php');

$field = isset($_GET['field']) ? $_GET['field'] : 'null';
$semester = isset($_GET['semester']) ? $_GET['semester'] : 'null';
?>
<div class="modal fade" id="deleteModalExam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="code.php" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Exam?
                    <input type="hidden" name="examID" id="examID" value="">
                    <input type="hidden" name="semester" value="<?=$semester?>">
                    <input type="hidden" name="field_name" value="<?=$field?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="exam_deletee" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid px-4">
    <h4 class="mt-4">Generate Timetable</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Timetable</li>
    </ol>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <form id="selectionForm">
                <select required name="field_name" id="field_name-ex" class="form-select form-select-lg mb-3" aria-label="Large select example">
                    <option value="<?=$field?>"><?= $field != 'null' ? $field : "Select Level" ?></option>
                    <?php
                    $field_query = "SELECT * FROM levels";
                    $field_query_run = mysqli_query($con, $field_query);
                    if ($field_query_run) {
                        foreach ($field_query_run as $row) {
                            echo "<option value='{$row['name']}'>{$row['name']}</option>";
                        }
                    } else {
                        echo "<option value=''>No fields found</option>";
                    }
                    ?>
                </select>
            </form>
        </div>

        <div class="col-md-6 mb-3">
            <select required name="semester" id="semester-ex" class="form-select form-select-lg mb-3" aria-label="Large select example">
                <option value="<?=$semester?>"><?= $semester == 'S1' ? 'Semester 1' : ($semester == 'S2' ? 'Semester 2' : 'Select Semester') ?></option>
                <option value="S1">Semester 1</option>
                <option value="S2">Semester 2</option>
            </select>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add Event</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" id="addEventForm">
                        <input type="hidden" name="field_name_" value="<?=$field?>">
                        <input type="hidden" name="semester_" value="<?=$semester?>">
                        
                        <div class="col-md-12 mb-3">
                            <label for="lesson">Lesson</label>
                            <select required name="lesson" id="lesson" class="form-control">
                                <option value="">Select Module</option>
                                <?php
                                $lesson_query = "SELECT course_name, has_course FROM courses WHERE semester = ? AND field_name = ?";
                                $stmt = $con->prepare($lesson_query);
                                $stmt->bind_param('ss', $semester, $field);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while ($lesson_row = $result->fetch_assoc()) {
                                    if ($lesson_row['has_course'] == 1) {
                                        echo "<option value='{$lesson_row['course_name']}'>{$lesson_row['course_name']}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="startTime">Start Time</label>
                            <input type="time" id="startTime" name="start" class="form-control">
                            <div id="startTimeError" class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="endTime">End Time</label>
                            <input type="time" id="endTime" name="end" class="form-control">
                            <div id="endTimeError" class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="eventDate">Date</label>
                            <input type="date" name="date" id="eventDate" class="form-control">
                            <div id="dateError" class="invalid-feedback"></div>
                        </div>
                        <?php
                        $roomtest = "SELECT * FROM exams WHERE Field = ? AND Semester = ? ";
                        $stmt = $con->prepare($roomtest);
                        $stmt->bind_param('ss', $field, $semester);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $roomROw = $result->fetch_all(MYSQLI_ASSOC);

                        if (count($roomROw) > 0) {
                            foreach ($roomROw as $roomrow) {
                            ?>
                            
                            <div class="col-md-12 mb-3" >
                            <label for="rooms">Rooms</label>
                            <input type="text" name="roomarray" class="form-control" value="<?=$roomrow['Rooms']?>" readonly>
                            
                        </div>
                        <?php break;?>
                          <!--  -->
                         <?php }?>
                        <?php }
                        else{?>
                            <div class="col-md-12 mb-3" id="roomsContainer">
                            <label for="rooms">Rooms</label>
                            <select name="rooms[]" id="rooms" class="form-control" multiple>
                                <option value="">Select Rooms</option>
                                <?php
                                $room_query = "SELECT room_name FROM rooms";
                                $room_query_run = mysqli_query($con, $room_query);
                                if ($room_query_run) {
                                    foreach ($room_query_run as $room_row) {
                                        echo "<option value='{$room_row['room_name']}'>{$room_row['room_name']}</option>";
                                    }
                                } else {
                                    echo "<option value=''>No rooms found</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <?php
                        }
                         ?>
                        <!--  -->
                        <div class="col-md-12 mb-3">
                            <button type="submit" name="add_event-ex" class="btn btn-primary">Add event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4><?= $field != 'null' && $semester != 'null' ? "$field-$semester Exams Timetable" : "" ?></h4>
                    <a class='btn btn-primary float-end' href="allexamspdf.php">Download all exam Timetables</a>      

                </div>
                <div class="card-body">
                    <div class="table-responsive-xl">
                        <?php
                        $query = "SELECT id, Rooms, ExamDate, DATE_FORMAT(StartTime, '%H:%i') AS StartTime, DATE_FORMAT(EndTime, '%H:%i') AS EndTime, Module FROM exams WHERE Field = ? AND Semester = ? ORDER BY ExamDate";
                        $stmt = $con->prepare($query);
                        $stmt->bind_param('ss', $field, $semester);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $exams = $result->fetch_all(MYSQLI_ASSOC);

                        if (count($exams) > 0) {
                            echo "<table class='table table-bordered mt-5'>";
                            echo "<thead><tr><th scope='col'>Date</th><th scope='col'>Time</th><th scope='col'>Module</th><th scope='col'>Room</th><th scope='col'>Actions</th></tr></thead><tbody>";
                            foreach ($exams as $index => $examrow) {
                                echo "<tr><td>{$examrow['ExamDate']}</td><td>{$examrow['StartTime']}-{$examrow['EndTime']}</td><td>{$examrow['Module']}</td>";
                                if ($index == 0) {
                                    echo "<td rowspan='" . count($exams) . "'>Rooms: <b>{$examrow['Rooms']}</b></td>";
                                    echo"<input type='hidden' id='examroom' name='examroom' value='{$examrow['Rooms']}'>";
                                }
                                echo "<td>
                                    <button data-bs-room='{$examrow['Rooms']}' data-bs-id='{$examrow['id']}' data-bs-date='{$examrow['ExamDate']}' data-bs-stime='{$examrow['StartTime']}' data-bs-etime='{$examrow['EndTime']}' data-bs-module='{$examrow['Module']}' data-bs-toggle='modal' data-bs-target='#exammodal' data-bs-whatever='@mdo' class='btn btn-sm btn-outline-primary'><i class='fas fa-edit'></i></button>
                                    <button type='button' class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#deleteModalExam' data-examID='{$examrow['id']}'><i class='fas fa-trash'></i></button>
                                    </td></tr>";
                            }
                            echo "</tbody></table>";
                        } else {
                            echo "<p>No exams found for the selected field and semester.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
            document.addEventListener('DOMContentLoaded', function () {
    const formElements = {
       
        date: document.querySelector('input[name="date"]'),
        
        lesson: document.querySelector('select[name="lesson"]')
    };

    async function checkConstraintsExam() {
        const field_name = document.querySelector('select[name="field_name"]').value;
        const semester = document.querySelector('select[name="semester"]').value;
       
        const date = formElements.date.value;
        const room = formElements.room.value;
        const lesson = formElements.lesson.value;

        const params = new URLSearchParams({
            field_name, semester,date,room,lesson
        });

        try {
            const response = await fetch('check_exam_constraints.php?' + params.toString());
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

    formElements.teacher.addEventListener('change', checkConstraintsExam);
    formElements.group.addEventListener('change', checkConstraintsExam);
    formElements.time.addEventListener('change', checkConstraintsExam);
    formElements.day.addEventListener('change', checkConstraintsExam);
    formElements.room.addEventListener('change', checkConstraintsExam);
    formElements.lesson.addEventListener('change', checkConstraintsExam);
});
</script>
<script>
    
document.addEventListener('DOMContentLoaded', function () {
    var examModal = new bootstrap.Modal(document.getElementById('exammodal'));
    var editButtons = document.querySelectorAll('button[data-bs-toggle="modal"][data-bs-target="#exammodal"]');

    editButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var rooms = this.getAttribute('data-bs-room');
            var id = this.getAttribute('data-bs-id');
            var date = this.getAttribute('data-bs-date');
            var startTime = this.getAttribute('data-bs-stime');
            var endTime = this.getAttribute('data-bs-etime');
            var module = this.getAttribute('data-bs-module');

            var modalRoom = document.getElementById('exam-room');
            var modalId = document.getElementById('exam-id');
            var modalDate = document.getElementById('exam-date');
            var modalStartTime = document.getElementById('start-time');
            var modalEndTime = document.getElementById('end-time');
            var modalModule = document.getElementById('module');
 
            modalRoom.value = rooms;
            modalId.value = id;
            modalDate.value = date;
            modalStartTime.value = startTime;
            modalEndTime.value = endTime;
            modalModule.value = module;

            examModal.show();
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var startTimeInput = document.getElementById('startTime');
    var endTimeInput = document.getElementById('endTime');
    var eventDateInput = document.getElementById('eventDate');

    startTimeInput.addEventListener('input', validateTime);
    endTimeInput.addEventListener('input', validateTime);
    eventDateInput.addEventListener('input', validateDate);

    function validateTime() {
        var startTime = startTimeInput.value;
        var endTime = endTimeInput.value;

        if (startTime && endTime) {
            if (endTime <= startTime) {
                endTimeInput.classList.add('is-invalid');
                document.getElementById('endTimeError').textContent = 'End time must be greater than start time.';
            } else {
                endTimeInput.classList.remove('is-invalid');
                document.getElementById('endTimeError').textContent = '';
            }
        }
    }

    function validateDate() {
        var eventDate = eventDateInput.value;
        var currentDate = new Date().toISOString().split('T')[0];

        if (eventDate && eventDate < currentDate) {
            eventDateInput.classList.add('is-invalid');
            document.getElementById('dateError').textContent = 'Date must be greater than or equal to current date.';
        } else {
            eventDateInput.classList.remove('is-invalid');
            document.getElementById('dateError').textContent = '';
        }
    }
});

function hideRooms() {
    var roomsContainer = document.getElementById('roomsContainer');
    var roomsSelect = document.getElementById('rooms');

    roomsContainer.style.display = 'none';
    roomsSelect.removeAttribute('required');
}

document.getElementById("field_name-ex").addEventListener("change", redirectToAnotherPage);
document.getElementById("semester-ex").addEventListener("change", redirectToAnotherPage);

function redirectToAnotherPage() {
    var fieldName = document.getElementById("field_name-ex").value;
    var semester = document.getElementById("semester-ex").value;

    var url = "generate-exams-new.php?field=" + encodeURIComponent(fieldName) + "&semester=" + encodeURIComponent(semester);
    window.location.href = url;
}

var deleteModal = document.getElementById('deleteModalExam');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var examID = button.getAttribute('data-examID');
        var modalInput = deleteModal.querySelector('#examID');
        modalInput.value = examID;
    });


</script>

<div class="modal fade" id="exammodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Exam Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="code.php" method="POST">
          <input type="hidden" class="form-control" name="exam-id" id="exam-id">
          <div class="mb-3">
            <label for="exam-date" class="col-form-label">Edit Exam:</label>
            <input type="date" class="form-control" name="exam-date" id="exam-date">
          </div>
          <div class="mb-3">
            <label for="start-time" class="col-form-label">Start Time:</label>
            <input type="time" class="form-control" name="start-time" id="start-time">
          </div>
          <div class="mb-3">
            <label for="end-time" class="col-form-label">End Time:</label>
            <input type="time" class="form-control" name="end-time" id="end-time">
          </div>
          <div class="mb-3">
            <label for="module" class="col-form-label">Module:</label>
            <select name="module" id="module" class="form-control">
              <option value=""></option>
              <?php
              $lesson_query = "SELECT course_name, has_course FROM courses WHERE semester = ? AND field_name = ?";
              $stmt = $con->prepare($lesson_query);
              $stmt->bind_param('ss', $semester, $field);
              $stmt->execute();
              $result = $stmt->get_result();
              while ($lesson_row = $result->fetch_assoc()) {
                  if ($lesson_row['has_course'] == 1) {
                      echo "<option value='{$lesson_row['course_name']}'>{$lesson_row['course_name']}</option>";
                  }
              }
              ?>
            </select>
            <div class="mb-3">
            <label for="rooms" class="col-form-label">Edit Rooms:</label>
            <select name="exam-room[]" id="exam-room" class="form-control" multiple>
          <?php  $roomtest = "SELECT * FROM exams WHERE Field = ? AND Semester = ? ";
                        $stmt = $con->prepare($roomtest);
                        $stmt->bind_param('ss', $field, $semester);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $roomROw = $result->fetch_all(MYSQLI_ASSOC);

                        if (count($roomROw) > 0) {
                            foreach ($roomROw as $roomrow) {
                            ?>
              <option value="<?=$roomrow['Rooms']?>">Selected Rooms : <?=$roomrow['Rooms']?></option>
              
              <?php break;}}
              $lesson_query = "SELECT * FROM rooms";
              $stmt = $con->prepare($lesson_query);
              
              $stmt->execute();
              $result = $stmt->get_result();
              while ($lesson_row = $result->fetch_assoc()) {
                  
                      echo "<option value='{$lesson_row['room_name']}'>{$lesson_row['room_name']} {$lesson_row['room_type']}</option>";
                  
              }
              ?>
            </select>
          </div>
          <input type="hidden" name="field_name" value="<?=$field?>">
          <input type="hidden" name="semester" value="<?=$semester?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="event-exam-update" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php
include('includes/footer.php');
include('includes/scripts.php');
?>
