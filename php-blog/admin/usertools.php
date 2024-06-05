<?php
session_start();
include('config/dbcon.php');
if(isset($_POST['send_message'])) {
    $sender_name = $_POST['full-name'];
    $sender_email = $_POST['email']; 
    $message= $_POST['message'];

     $query = "INSERT INTO contact (sender_name,sender_email,message_sent) VALUES ('$sender_name','$sender_email','$message')";
     $query_run = mysqli_query($con,$query);

     if($query_run) {
         $_SESSION['message'] = "Your message has been sent , you will be answred soon";
         header('Location: ../index__.php');
         exit(0);
     }
     else {
         $_SESSION['message'] = "Something went wrong! Please try again later.";
         header('Location: ../index__.php');
         exit(0);
     }

 }
?>