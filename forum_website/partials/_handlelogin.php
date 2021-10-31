<?php

include '_dbconnect.php';
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $user_login_email = $_POST['email'];
    $user_login_pass = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE user_email='$user_login_email'";
    $res = mysqli_query($conn, $sql);
    $emailcount = mysqli_num_rows($res);

    if ($emailcount == 1) {
        $row = mysqli_fetch_assoc($res);
        $user_name= $row['user_name'];
        $user_id = $row['user_id'];

        if (password_verify($user_login_pass, $row['user_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user_name;
            $_SESSION['sno']= $user_id;

            header('location:/forum_website/index.php?login=true');
        } else {
            $error = 'Your password didn\'t matched !';
            header("location:/forum_website/index.php?login=false&error=$error");
        }
    } else {
        $error = 'Entered email is not exist! Please Create an Account first';
        header("location:/forum_website/index.php?login=false&error=$error");
    }
}
