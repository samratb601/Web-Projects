<?php

session_start();

if(!isset($_SESSION['user'])){
  
    header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php include './link/links2.php' ?>
</head>

<body>
    <div>
        <!-- left_div -->
        <?php include './fixed/left_div.php' ?>
        <div class="right_div  p-3">
            <!-- right_div nav -->
            <?php include './fixed/nav.php' ?>
            <div class="x-a">
                <h1 class="text-capitalize">Welcome Admin <?php echo $_SESSION['user']; ?>  To our E-Library</h1>
            </div>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
</body>

</html>