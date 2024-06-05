<?php
    session_start();
    include('admin/config/dbcon.php');
    if(isset($_POST['register_btn'])) {
        $fname = mysqli_real_escape_string($con,$_POST['fname']);
        $lname = mysqli_real_escape_string($con,$_POST['lname']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $conf_password = mysqli_real_escape_string($con,$_POST['cpassword']);

        if($password == $conf_password) {
            // check mail
            $checkmail = "SELECT email FROM users WHERE email = '$email'";
            $checkmail_run = mysqli_query($con,$checkmail);
            if(mysqli_num_rows($checkmail_run) > 0) 
            {
                // already exist 
                $_SESSION['message']= "Email Already Exists ";
                header("Location: register.php");
                exit(0);
            }
            else {
                // part 4 11:07 ro7 trgod
                $user_query ="INSERT INTO users (fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')";
                $user_query_run = mysqli_query($con,$user_query);

                if($user_query_run) {
                    $_SESSION['message']= "Regitered successfully ";
                    header("Location: login.php");
                    exit(0);
                }
                else {
                    $_SESSION['message']= "Something went wrong! Please try again later.";
                    header("Location: register.php");
                    exit(0);
                }
            }
        }
        else {
            $_SESSION['message']= "Password and confirm password does not match";
            header("Location: register.php");
            exit(0);
        }
    
    }
    else {
        header("location: register.php");
        exit(0);
    }

?>