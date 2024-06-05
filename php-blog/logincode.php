<?php
session_start();
include('admin/config/dbcon.php');

function loginUser($con, $email, $password, $is_admin = false) {
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $data = mysqli_fetch_assoc($login_query_run);
        $user_id = $data['id'];
        $user_name = $data['fname'].' '.$data['lname'];
        $first_name = $data['fname'];
        $user_email = $data['email'];
        $user_birth_date = $data['birth_date'];
        $user_phone_num = $data['mobile_number'];
        $user_address = $data['address'];
        $role_as = $data['role_as'];
        $user_field = $data['field'];
        $user_groupe = $data['groupe'];

        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as"; // 1 is admin 0 is a user
        $_SESSION['auth_user']  =  [
            'user_id'=> $user_id,
            'user_name'=> $user_name,
            'user_email'=> $user_email,
            'user_birth_date' => $user_birth_date,
            'user_phone_num' => $user_phone_num,
            'user_address' => $user_address,
            'user_field' => $user_field,
            'user_groupe' => $user_groupe,
            'first_name' => $first_name,
        ];

        if ($is_admin) {
            if ($_SESSION['auth_role'] == '1') { // 1 = admin
                $_SESSION['message'] = "Welcome to dashboard";
                header("Location: admin/index.php");
                exit(0);
            } else {
                $_SESSION['message'] = "Invalid email or password";
                header("Location: index.php");
                exit(0);
            }
        } else {
            if ($_SESSION['auth_role'] == '0' || $_SESSION['auth_role'] == '2') { // 0 = user
                $_SESSION['message'] = "You are Logged In";
                header("Location: index__.php");
                exit(0);
            } else {
                $_SESSION['message'] = "Invalid email or password";
                header("Location: index.php");
                exit(0);
            }
        }
    } else {
        $_SESSION['message'] = "Invalid email or password";
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['login_btn'])) {
    loginUser($con, $_POST['email'], $_POST['password']);
} elseif (isset($_POST['login_btn_admin'])) {
    loginUser($con, $_POST['email'], $_POST['password'], true);
} else {
    $_SESSION['message'] = "You are not allowed to access this file";
    header("Location: index.php");
    exit(0);
}
?>
