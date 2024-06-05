<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
include('config/dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['send'])) {
        $email = $_POST['email-to-reply'];
        $txt = $_POST['reply-to-sent'];
        $messageId = $_POST['message-id'];  // Get the message ID from the form

        $subject = "Salam Alikom";
        $message = "<style> ... </style>";
        $message .= "$txt";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kaddourisaadedu@gmail.com';
            $mail->Password = 'yvvd inki arwr hmnb';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('votre_email@gmail.com', 'Computer Science Departement');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();

            // Delete the message from the contact table
            $deleteQuery = "DELETE FROM contact WHERE id = ?";
            $stmt = $con->prepare($deleteQuery);
            $stmt->bind_param("i", $messageId);
            $stmt->execute();

            $_SESSION['message'] = 'Reply sent to '.$email;
            header('Location: index.php');
            exit(0);
        } catch (Exception $e) {
            $_SESSION['message'] = 'ERROR to send';
            header('Location: index.php');
            exit(0);
        }
    } else {
        echo "Aucune adresse e-mail n'a été fournie.";
    }
} else {
    echo "Méthode de requête incorrecte.";
}
?>
