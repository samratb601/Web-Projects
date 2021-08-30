<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>PHP login system</title>

    <?php include './link/links.php' ?>
    
</head>
<body>
<?php

include 'connection.php';

if(isset($_POST['submit'])){
    $email= $_POST['email'];
    $password= $_POST['password'];


    // searching email from Db 
    $emailsearch= " select * from registration where email='$email' " ;
    $query= mysqli_query($con, $emailsearch );
    $emailcount= mysqli_num_rows($query);

    // if more than one email is present or not $emailcount returns true or false value
    if($emailcount){
                
        // The mysql_fetch_assoc() function returns a row from a recordset as an associative array. This function gets a row from the
        //   mysql_query() function and returns an array on success.
        $email_pass= mysqli_fetch_assoc(mysqli_query($con, $emailsearch ));

        // storing the password from DB for corresponding email.
        $fetched_email_pass= $email_pass['password'];


        // fetching the username for corresponding email
        $_SESSION['user']= $email_pass['username'];

        // verifying the login password and fetched emailpassword for the corresponding email
        $password_verify= password_verify($password, $fetched_email_pass);

        if($password_verify){
            ?>
            <script>
                alert("Log-in Succesfull");
                location.replace("home.php");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Password Incorrect!!");
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            alert("Invalid E-mail!!");
        </script>
        <?php
    }
}

?>


<div class="container mt-3 border  rounded " style="width:300px">
    <h3 class="mt-3">Admin Log-in</h3>
    <hr>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="mb-2">
                
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control-sm form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            
            <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control-sm form-control"  required>
            </div>
            
            <div >
            <button type="submit" name="submit" class="btn-sm btn-primary mb-2">Login</button>
            <p style="font-size:14px">Doesn't have any Account? <a href="signup.php" >SignUp Here</a> </p>
            </div>
        </form>
        </div>
</body>
</html>