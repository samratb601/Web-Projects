<?php

include '_dbconnect.php';
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $user_name = $_POST['username'];
    $user_email = $_POST['email'];
    $user_pass = $_POST['password'];
    $user_cpass = $_POST['cpassword'];

    // password encryption
    $enpass = password_hash($user_pass, PASSWORD_BCRYPT);
    $encpass = password_hash($user_cpass, PASSWORD_BCRYPT);

    // fetching email from DB 
    $existemailquery = "SELECT * FROM `user` WHERE user_email='$user_email' ";
    $result = mysqli_query($conn, $existemailquery);
    $emailcount = mysqli_num_rows($result);

    if ($emailcount > 0) {
        $error= 'Your email is already exists!!';
        header("location: /forum_website/index.php?signupsuccess=false&error=$error");
        exit();
    } else {
        if ($user_pass == $user_cpass) {
            $sql = "INSERT INTO `user`(`user_name`, `user_email`, `user_pass`) VALUES ('$user_name','$user_email','$enpass')";
            $result = mysqli_query($conn, $sql);
           
            if ($result) {
               
                header('location: /forum_website/index.php?signupsuccess=true');
             exit();   
            }
        } else {
            $error= 'Your password not matched';
            header("location: /forum_website/index.php?signupsuccess=false&error=$error");
            exit();
        }
    }
}
?>
