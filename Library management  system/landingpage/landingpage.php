<?php

session_start();

session_destroy();

?>

<?php
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to our E-library</title>
</head>

<body>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/alfons-morales-YLSwjSy7stw-unsplash.jpg" width="1600px" height="400px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/matthew-feeney-Nwkh-n6l25w-unsplash.jpg" width="1600px" height="400px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/susan-q-yin-2JIvboGLeho-unsplash.jpg" width="1600px" height="400px" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <h1 class="text-center ">
        Welcome to our E-library
    </h1>

    <div class="as my-3">
        <img src="img/—Pngtree—user vector icon_3788518.png" width="100px" height="100px" alt="">
        <div class="admin m-3">
            login as a
            <a class="btn btn-primary" href="../login.php" role="button">Admin</a>
            
        </div>

        <img src="img/194931.png" width="90px" height="90px" alt="">
        <div class="student m-3">
            Login as a
            <a class="btn btn-primary" href="../student/stud_login.php" role="button">Student</a>

        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>

</html>