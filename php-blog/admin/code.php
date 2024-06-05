<?php
    include('authentication.php');


//  Add Course

    if(isset($_POST['add_course'])) {
        $course_name = $_POST['course_name'];
        $description = $_POST['description'];
        
        $has_coures = $_POST['has_course'] == true ? '1':'0';
        $has_td = $_POST['has_td'] == true ? '1':'0';
        $has_tp = $_POST['has_tp'] == true ? '1':'0';
        $field_name = $_POST['field_name'];
        $coef = $_POST['coef'];
        $credit = $_POST['credit'];
        $semester = $_POST['semester'];

        
        $query = "INSERT INTO courses (course_name,description,has_td,has_tp,field_name,coef,credit,semester,has_course) VALUES ('$course_name','$description','$has_td','$has_tp','$field_name','$coef','$credit','$semester','$has_coures')";
        $query_run = mysqli_query($con,$query);

        if($query_run) {
            $_SESSION['message'] = "Course added Successfully";
            header('Location: view-course.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-course.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
            exit(0);
        }
        
    
    }
//  Add field
    if(isset($_POST['add_field'])) {
            $field_name = $_POST['field_name'];
            $description = $_POST['description'];
            
            $query = "INSERT INTO fields (name,description) VALUES ('$field_name','$description')";
            $query_run = mysqli_query($con,$query);
    
            if($query_run) {
                $_SESSION['message'] = "Field Added Successfully";
                header('Location: view-fields.php');
                exit(0);
            }
            else {
                $_SESSION['message'] = "Something went wrong! Please try again later.";
                header('Location: view-fields.php');
                exit(0);
            }
        }
        // Update field
        if(isset($_POST['update_field'])) {
            $field_id = $_POST['field_id'];
            $field_name = $_POST['field_name'];
            $description = $_POST['description'];
            
    
            $query = "UPDATE fields SET name='$field_name', description='$description' WHERE id='$field_id'";
            $query_run = mysqli_query($con,$query);
            
    
            if($query_run) {
                $_SESSION['message'] = "Updated Successfully";
                header('Location: view-fields.php');
                exit(0);
            }
    
    
        }
    if(isset($_POST['course_deletee'])) {
        session_start();
        $course_id = $_POST['course_delete'];
        $semester = $_POST['semester'];
        $field_name = $_POST['field_name'];
        $query = "DELETE FROM courses WHERE id = $course_id";
        $query_run = mysqli_query($con,$query);

        if($query_run) {
            $_SESSION['message'] = "Course deletd Successfully";
            header('Location: view-course.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-course.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
            exit(0);
        }



    }


    if(isset($_POST['user_delete'])) {
        $user_id = $_POST['user_id'];

        $query = "DELETE FROM users WHERE id = $user_id";
        $query_run = mysqli_query($con,$query);

        if($query_run) {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location: view-register.php');
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-register.php');
            exit(0);
        }



    }
    if(isset($_POST['fields_delete'])) {
        $field_id = $_POST['field_id'];

        $query = "DELETE FROM fields WHERE id = $field_id";
        $query_run = mysqli_query($con,$query);

        if($query_run) {
            $_SESSION['message'] = "Field deleted Successfully";
            header('Location: view-fields.php');
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-fields.php');
            exit(0);
        }



    }

    if(isset($_POST['add_user'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role_as = $_POST['role_as'];
        $birth_date = $_POST['birth_date'];
        $gender = $_POST['gender'];
        $mobile_number = $_POST['mobile_number'];
        $address = $_POST['address'];
        $field_name = $_POST['field_name'];
        $address = $_POST['address'];
        $group_name = $_POST['group_name'];
    
        
        $status = $_POST['status'] == true ? '1':'0';

        $query = "INSERT INTO users (fname,lname,email,password,role_as,status,birth_date,groupe,address,gender,mobile_number,field) VALUES ('$fname','$lname','$email','$password','$role_as','$status','$birth_date','$group_name','$address',' $gender','$mobile_number','$field_name')";
        $query_run = mysqli_query($con,$query);
        if($role_as==0){
        if($query_run) {
            $_SESSION['message'] = "Student Added Successfully";
            header('Location: view-student.php');
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-student.php');
            exit(0);
        }
    }elseif($role_as==2)
    {
        if($query_run) {
            $_SESSION['message'] = "Teacher Added Successfully";
            header('Location: view-teacher.php');
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-teacher.php');
            exit(0);
        }
    }else
    {
        if($query_run) {
            $_SESSION['message'] = "Teacher Added Successfully";
            header('Location: view-register.php');
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-register.php');
            exit(0);
        }
    }

    }


    if(isset($_POST['add_room'])) {
        $room_name= $_POST['room_name'];
        $room_type = $_POST['room_type'];
 

        $query = "INSERT INTO rooms (room_name,room_type) VALUES ('$room_name','$room_type')";
        $query_run = mysqli_query($con,$query);

        if($query_run) {
            $_SESSION['message'] = "Room Added Successfully";
            header('Location: view-rooms.php');
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-rooms.php');
            exit(0);
        }

    }
    



    if(isset($_POST['update_course'])) {
        $course_id = $_POST['course_id'];
        $course_name = $_POST['course_name'];
        $description = $_POST['description'];
        $field_name = $_POST['field_name'];
        $has_course = $_POST['has_course'] == true ? '1':'0';

        $has_td = $_POST['has_td'] == true ? '1':'0';
        $has_tp = $_POST['has_tp'] == true ? '1':'0';
        $coef = $_POST['coef'];
        $credit = $_POST['credit'];
        $semester = $_POST['semester'];

        $query = "UPDATE courses SET course_name='$course_name', description='$description' ,has_td='$has_td',has_tp='$has_tp',field_name ='$field_name',semester='$semester',credit='$credit',coef='$coef',has_course='$has_course' WHERE id='$course_id'";
        $query_run = mysqli_query($con,$query);
        

        if($query_run) {
            $_SESSION['message'] = "Course updated Successfully";
            header('Location: view-course.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-course.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
            exit(0);
        }
        
    


    }
    if(isset($_POST['update_user'])) {
        $user_id = $_POST['user_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role_as = $_POST['role_as'];
        $birth_date = $_POST['birth_date'];
        $gender = $_POST['gender'];
        $mobile_number = $_POST['mobile_number'];
        $address = $_POST['address'];
        $field_name = $_POST['field_name'];
        $address = $_POST['address'];
        $group_name = $_POST['group_name'];
      
        $status = $_POST['status'] == true ? '1':'0';

        $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', password='$password', role_as='$role_as', status='$status',birth_date='$birth_date',gender='$gender',mobile_number='$mobile_number',address='$address',groupe='$group_name',field='$field_name' WHERE id='$user_id'";
        $query_run = mysqli_query($con,$query);
        

        if($role_as==0){
            if($query_run) {
                $_SESSION['message'] = "Student updated Successfully";
                header('Location: view-student.php');
                exit(0);
            }
            else {
                $_SESSION['message'] = "Something went wrong! Please try again later.";
                header('Location: view-student.php');
                exit(0);
            }
        }elseif($role_as==2)
        {
            if($query_run) {
                $_SESSION['message'] = "Teacher updated Successfully";
                header('Location: view-teacher.php');
                exit(0);
            }
            else {
                $_SESSION['message'] = "Something went wrong! Please try again later.";
                header('Location: view-teacher.php');
                exit(0);
            }
        }else
        {
            if($query_run) {
                $_SESSION['message'] = "Admin updated Successfully";
                header('Location: view-register.php');
                exit(0);
            }
            else {
                $_SESSION['message'] = "Something went wrong! Please try again later.";
                header('Location: view-register.php');
                exit(0);
            }
        }
    


    }
    if(isset($_POST['update_room'])) {
        $room_id = $_POST['room_id'];
        $room_name = $_POST['room_name'];
        $room_type = $_POST['room_type'];
        

        $query = "UPDATE rooms SET room_name='$room_name', room_type='$room_type' WHERE id='$room_id'";
        $query_run = mysqli_query($con,$query);
        

        if($query_run) {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: view-rooms.php');
            exit(0);
        }


    }
    if(isset($_POST['room_delete'])) {
        $room_id = $_POST['room_id'];

        $query = "DELETE FROM rooms WHERE id = $room_id";
        $query_run = mysqli_query($con,$query);

        if($query_run) {
            $_SESSION['message'] = "Room deleted Successfully";
            header('Location: view-rooms.php');
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-rooms.php');
            exit(0);
        }



    }
    // add group
    if(isset($_POST['add_group'])) {
        session_start();
        $group_name = $_POST['group_name'];
        $field_name = $_POST['field_name'];
        $student_number = $_POST['student_number'];
        
        $query = "INSERT INTO groups (name,field,student_number) VALUES ('$group_name','$field_name','$student_number')";
        $query_run = mysqli_query($con,$query);
      
        if($query_run) {
            $_SESSION['message'] = "Group added Successfully";
            header('Location: view-groupe-fields.php?field=' . urlencode($field_name));
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-groupe-fields.php?field=' . urlencode($field_name));
            exit(0);
        }
    }
    // delete room
    if(isset($_POST['groupe_delete'])) {
        session_start();
        
        $groupe_delete = $_POST['groupe_delete'];
        $groupe_name = $_POST['field_name'];
    
        // Delete the group
        $query = "DELETE FROM groups WHERE id = $groupe_delete";
        $query_run = mysqli_query($con, $query);
    
        // Retrieve the field value before deletion
       
    
     
        if($query_run) {
            $_SESSION['message'] = "Group deleted Successfully";
            header('Location: view-groupe-fields.php?field=' . urlencode($groupe_name));
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-groupe-fields.php?field=' . urlencode($groupe_name));
            exit(0);
        }
    }
    
// add event with contraintes
if (isset($_POST['add_event'])) {
    $field_name = $_POST['field_name_'];
    $semester = $_POST['semester_'];
    $teacher = $_POST['teacher'];
    $lesson = $_POST['lesson'];
    $group_name = $_POST['group_name'];
    $time = $_POST['time'];
    $day = $_POST['day'];
    $room = $_POST['room'];

    // Escaping the variables for security reasons
    $field_name = mysqli_real_escape_string($con, $field_name);
    $semester = mysqli_real_escape_string($con, $semester);
    $teacher = mysqli_real_escape_string($con, $teacher);
    $lesson = mysqli_real_escape_string($con, $lesson);
    $group_name = mysqli_real_escape_string($con, $group_name);
    $time = mysqli_real_escape_string($con, $time);
    $day = mysqli_real_escape_string($con, $day);
    $room = mysqli_real_escape_string($con, $room);

    // Vérifier la disponibilité du créneau horaire
    $check_query = "SELECT * FROM timetable WHERE semester='$semester' AND time='$time' AND day='$day' AND room='$room'";
    $check_query_run = mysqli_query($con, $check_query);

    if (!$check_query_run) {
        die("Query Failed: " . mysqli_error($con));
    }
    //  CRUD
    // group
    $check_lesson_query = "SELECT * FROM timetable WHERE field='$field_name' AND lesson='$lesson' AND semester='$semester' AND group_name='$group_name'";
    $check_lesson_query_run = mysqli_query($con, $check_lesson_query);

    if (!$check_lesson_query_run) {
        die("Query Failed: " . mysqli_error($con));
    }
    $check_groupTime_query = "SELECT * FROM timetable WHERE field='$field_name' AND time='$time' AND day='$day'  AND semester='$semester' AND group_name='$group_name'";
    $check_groupTime_query_run = mysqli_query($con, $check_groupTime_query);

    $check_Cours_query = "SELECT * FROM timetable WHERE field='$field_name' AND time='$time' AND day='$day'  AND semester='$semester' AND group_name=''";
    $check_Cours_query_run = mysqli_query($con, $check_Cours_query);
    if (!$check_Cours_query_run) {
        die("Query Failed: " . mysqli_error($con));
    }
    if (mysqli_num_rows($check_Cours_query_run) > 0) {
        // Si le créneau est déjà occupé, afficher un message d'erreur
        $_SESSION['message'] = "There is cours in this time you cannot add other lessons ";
        header('Location: generate-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
        exit(0);
    }
    if (!$check_groupTime_query_run) {
        die("Query Failed: " . mysqli_error($con));
    }
    $check_teacher_query = "SELECT * FROM timetable WHERE  time='$time' AND day='$day'  AND semester='$semester' AND teacher_name='$teacher'";
    $check_teacher_query_run = mysqli_query($con, $check_teacher_query);

    if (!$check_teacher_query_run) {
        die("Query Failed: " . mysqli_error($con));
    }
    if (mysqli_num_rows($check_teacher_query_run) > 0) {
        // Si le créneau est déjà occupé, afficher un message d'erreur
        $_SESSION['message'] = "teacher cannot used here ";
        header('Location: generate-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
        exit(0);
    } else
    if (mysqli_num_rows($check_groupTime_query_run) > 0) {
        // Si le créneau est déjà occupé, afficher un message d'erreur
        $_SESSION['message'] = "you cannot use same group or or same teacher or any td/tp lesson with cours lesson in same time";
        header('Location: generate-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
        exit(0);
    } elseif (mysqli_num_rows($check_query_run) > 0) {
        // Si le créneau est déjà occupé, afficher un message d'erreur
        $_SESSION['message'] = "The class $room is occupied.";
        header('Location: generate-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
        exit(0);
    } elseif (mysqli_num_rows($check_lesson_query_run) > 0) {
        $_SESSION['message'] = "The $lesson lesson is already created with group $group_name.";
        header('Location: generate-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
        exit(0);
    } else {
        // Si le créneau est libre, insérer le nouvel événement
        $insert_query = "INSERT INTO timetable (field, semester, teacher_name, lesson, group_name, time, day, room) VALUES ('$field_name', '$semester', '$teacher', '$lesson', '$group_name', '$time', '$day', '$room')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if (!$insert_query_run) {
            die("Query Failed: " . mysqli_error($con));
        }

        if ($insert_query_run) {
            $_SESSION['message'] = "Event added successfully.";
            header('Location: generate-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
            exit(0);
        } else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: generate-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
            exit(0);
        }
    }
}

    // delete event
    if(isset($_POST['delete_event'])) {
        $semester= $_POST['_semester_'];
        $field_name = $_POST['field__name'];
        
        $delete_event = $_POST['id'];
    
        // Delete the group
        $query = "DELETE FROM timetable WHERE id = $delete_event";
        $query_run = mysqli_query($con, $query);
        if($query_run) {
            $_SESSION['message'] = "Event deleted Successfully";
            header('Location: generate-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: generate-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
            exit(0);
        }
        
    }
    // add level
    if(isset($_POST['add_level'])) {
        $field_name = $_POST['field_name'];
        $description = $_POST['description'];
        $name = $_POST['level_name'];
        
        $query = "INSERT INTO levels (name,field,description) VALUES ('$name','$field_name','$description')";
        $query_run = mysqli_query($con,$query);

        if($query_run) {
            $_SESSION['message'] = "level Added Successfully";
            header('Location: view-levels.php');
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-levels.php');
            exit(0);
        }
    }
    // delete level 
    if(isset($_POST['level_delete'])) {
        $level_id = $_POST['level_id'];

        $query = "DELETE FROM levels WHERE id = $level_id";
        $query_run = mysqli_query($con,$query);

        if($query_run) {
            $_SESSION['message'] = "Level deleted Successfully";
            header('Location: view-levels.php');
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-levels.php');
            exit(0);
        }
    }
    if(isset($_POST['update_level'])) {
        $level_id = $_POST['level_id'];
        $name = $_POST['level_name'];
        $field_name = $_POST['field_name'];
        $description = $_POST['description'];
        
        $description = mysqli_real_escape_string($con, $description);
    
        $query = "UPDATE levels SET name='$name',field='$field_name',description='$description' WHERE id='$level_id'";
        $query_run = mysqli_query($con,$query);
        

        if($query_run) {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: view-levels.php');
            exit(0);
        }


    }
    if(isset($_POST['add_event-ex'])) {
        session_start();
        
        $field_name = $_POST['field_name_'];
        $semester = $_POST['semester_'];
        $lesson = $_POST['lesson'];
        $StartTime = $_POST['start'];
        $EndTime = $_POST['end'];
        $date = $_POST['date'];
        if(isset($_POST['rooms']) && !empty($_POST['rooms']))
        { $rooms = $_POST['rooms'];$rooms_string = implode(',',  $rooms);}else{$rooms_string = $_POST['roomarray'];}
               
    
        
        
        // first contrainte
        $check_ExamModule_query = "SELECT * FROM exams WHERE  Field='$field_name'  AND Semester='$semester' AND Module='$lesson' ";
        $check_ExamModule_query_run = mysqli_query($con, $check_ExamModule_query);

// second
     $check_ExamDate_query = "SELECT * FROM exams WHERE  Field='$field_name'  AND Semester='$semester' AND ExamDate='$date'  ";
        $check_ExamDate_query_run = mysqli_query($con, $check_ExamDate_query);


       if (!$check_ExamModule_query_run) {
        die("Query Failed: " . mysqli_error($con));
       }
    if (mysqli_num_rows($check_ExamModule_query_run) > 0) {
        // Si le créneau est déjà occupé, afficher un message d'erreur
        $_SESSION['message'] = "This exam is already exist in exams timtable";
        header('Location: generate-exams-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
        exit(0);
    } elseif (!$check_ExamDate_query_run) {
        die("Query Failed: " . mysqli_error($con));
       }
    if (mysqli_num_rows($check_ExamDate_query_run) > 0) {
        // Si le créneau est déjà occupé, afficher un message d'erreur
        $_SESSION['message'] = "There is Exam in this date ";
        header('Location: generate-exams-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
        exit(0);
    }  
      else {
        $query = "INSERT INTO exams (ExamDate,Module,Rooms,Field,Semester,StartTime,EndTime) VALUES ('$date','$lesson','$rooms_string','$field_name','$semester','$StartTime','$EndTime')";
        $query_run = mysqli_query($con,$query);
        if($query_run) {
            $_SESSION['message'] = "event exam added Successfully";
            header('Location: generate-exams-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: generate-exams-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
            exit(0);
        }
    }
    }

    if (isset($_POST['event-exam-update'])) {
        $exam_id = $_POST['exam-id'];
        $exam_date = $_POST['exam-date'];
        $start_time = $_POST['start-time'];
        $end_time = $_POST['end-time'];
        $module = $_POST['module'];
        $field_name = $_POST['field_name'];
        $semester = $_POST['semester'];
        $rooms = $_POST['exam-room'];$rooms_string = implode(',',  $rooms);
        // contraintes
        // first contrainte
        $check_ExamModule_query = "SELECT * FROM exams WHERE  Field='$field_name'  AND Semester='$semester' AND Module='$module' ";
        $check_ExamModule_query_run = mysqli_query($con, $check_ExamModule_query);

// second
     $check_ExamDate_query = "SELECT * FROM exams WHERE  Field='$field_name'  AND Semester='$semester' AND ExamDate='$exam_date'  ";
        $check_ExamDate_query_run = mysqli_query($con, $check_ExamDate_query);


       if (!$check_ExamModule_query_run) {
        die("Query Failed: " . mysqli_error($con));
       }
    if (mysqli_num_rows($check_ExamModule_query_run) > 0) {
        // Si le créneau est déjà occupé, afficher un message d'erreur
        $_SESSION['message'] = "This exam is already exist in exams timtable";
        header('Location: generate-exams-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
        exit(0);
    } elseif (!$check_ExamDate_query_run) {
        die("Query Failed: " . mysqli_error($con));
       }
    if (mysqli_num_rows($check_ExamDate_query_run) > 0) {
        // Si le créneau est déjà occupé, afficher un message d'erreur
        $_SESSION['message'] = "There is Exam in this date ";
        header('Location: generate-exams-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
        exit(0);
    }  else{
        // Update the exam in the database
        $query = "UPDATE exams SET ExamDate=?, StartTime=?, EndTime=?, Module=? WHERE id=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('ssssi', $exam_date, $start_time, $end_time, $module, $exam_id);
        $stmt->execute();
        $query2 = "UPDATE exams SET Rooms='$rooms_string' WHERE Field='$field_name' AND Semester='$semester'";
        $query2_run = mysqli_query($con,$query2);
        if ($stmt->affected_rows > 0 || $query2_run) {
            // Successfully updated
            $_SESSION['message'] = "Exam updated successfully";
            
        } else {
            // Failed to update
            $_SESSION['message'] = "Failed to update exam";
            
        }
    
        $stmt->close();
        $con->close();
        header('Location: generate-exams-new.php?field=' . urlencode($field_name) . '&semester=' . urlencode($semester));
        exit();
    }
        
    }
    // 
    if (isset($_POST['exam_deletee'])) {
        $examID = $_POST['examID'];
        $semester = $_POST['semester'];
        $field_name = $_POST['field_name'];
    
        $query = "DELETE FROM exams WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $examID);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Successfully
            $_SESSION['message'] = "Exam deleted successfully";
            
        } else {
            // Failed to 
            $_SESSION['message'] = "Failed to delete exam";
            
        }
        header("Location: generate-exams-new.php?field=$field_name&semester=$semester");
        exit();
    }
    // 
    if(isset($_POST['level_delete'])) {
        $level_id = $_POST['level_id'];

        $query = "DELETE FROM levels WHERE id = $level_id";
        $query_run = mysqli_query($con,$query);

        if($query_run) {
            $_SESSION['message'] = "Level deleted Successfully";
            header('Location: view-levels.php');
            exit(0);
        }
        else {
            $_SESSION['message'] = "Something went wrong! Please try again later.";
            header('Location: view-levels.php');
            exit(0);
        }
    }
    ?>