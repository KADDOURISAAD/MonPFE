<?php
include('admin/config/dbcon.php');

if(isset($_SESSION['auth_user'])) { 
  $field = $_SESSION['auth_user']['user_field'];
  $role = $_SESSION['auth_role'];
  $user_name = $_SESSION['auth_user']['first_name'];
  $user_groupe = $_SESSION['auth_user']['user_groupe']; // Assuming 'user_groupe' is the group name of the user
  $semesters = ['S1', 'S2'];
  $fname = $_SESSION['auth_user']['first_name'];

  echo '<style>
  .highlight {
      border: 2px red solid;
  }
  </style>';

  foreach ($semesters as $semester) {
    // Fetch timetable data from the database
    if ($role == '2') { // Assuming role '2' is for teachers
      $query = "SELECT id, room, time, day, lesson, group_name, teacher_name, field FROM timetable WHERE   semester = '$semester'";
    } else {
      $query = "SELECT id, room, time, day, lesson, group_name, teacher_name, field FROM timetable WHERE field = '$field' AND semester = '$semester'";
    }

    $query_run = mysqli_query($con, $query);
    
    // Check if there are any rows returned
    if(mysqli_num_rows($query_run) > 0) {
      if ($role == '2') {
        echo "<h1>Timetable for $user_name - $semester</h1>";
      } else {
        echo "<h1>Timetable $field - $semester</h1>";
      }

      echo '<div class="table-responsive-xl">';
      echo '<table class="table table-bordered mt-5">
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
              <tbody>';

      // Organize the data
      $timetable = [];
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
          'field' => $row['field'],
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
              // Check if the group matches the user's group and apply the highlight class if it does
              $highlight_class = ($entry['group_name'] === $user_groupe || $entry['teacher_name'] === $user_name) ? 'highlight' : '';
              
              echo "<div style='display: flex; align-items: center;' class='$highlight_class'>"; // Start a flex container
              if ($role == '2') {
                if(!empty($entry['group_name'])){
                  echo "<div style='background-color: #f2f2f2; margin: 2px; padding: 5px;'>{$entry['group_name']} | {$entry['field']} | {$entry['lesson']} | {$entry['room']} |{$entry['teacher_name']}</div>"; 
                } else {               
                  echo "<div style='background-color: #f2f2f2; margin: 2px; padding: 5px;'>Cours | {$entry['field']} | {$entry['lesson']} | {$entry['room']} | {$entry['teacher_name']}</div>"; 
                }
              } else {
                if(!empty($entry['group_name'])){
                  echo "<div style='background-color: #f2f2f2; margin: 2px; padding: 5px;'>{$entry['lesson']} | {$entry['group_name']} | {$entry['room']} | {$entry['teacher_name']}</div>"; 
                } else {        
                  echo "<div style='background-color: #f2f2f2; margin: 2px; padding: 5px;'>{$entry['lesson']}-Cours | {$entry['room']} | {$entry['teacher_name']}</div>"; 
                }
              }
              echo "<form method='POST' action='code.php'>"; // Change 'delete.php' to your delete endpoint
              echo "<input type='hidden' name='id' value='{$entry['id']}'>";
              echo "</form>";
              echo "</div>"; // End flex container
            }
          }
          echo "</td>";
        }
        echo "</tr>";
      }

      echo '</tbody></table></div>';
    }
  }
}
?>
