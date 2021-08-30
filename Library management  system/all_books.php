<?php

session_start();

if (!isset($_SESSION['user'])) {

    header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './link/links2.php' ?>
    <?php include './link/links.php' ?>
</head>

<body>
    <div>
        <!-- left_div -->
        <?php include './fixed/left_div.php' ?>
        <div class="right_div  p-3">
            <!-- right_div nav -->
            <?php include './fixed/nav.php' ?>
            <div class="scrollbg" style="height: 83vh; display:block;  overflow:scroll; overflow-x:hidden ">
                <div class="x-a">
                    <div class="container py-4 mx-2" style="height: 100%;">
                        <div class="row" >

                            <?php

                            include 'connection.php';

                            $selectquery = " select * from books ";

                            $query = mysqli_query($con, $selectquery);

                            $nums = mysqli_num_rows($query);


                            while ($res = mysqli_fetch_array($query)) {

                            ?>
                                <div class="col-md-2">
                                    <div class="card my-2 py-1">
                                        <div class="imgnedit">
                                            <img src="<?php echo $res['cvr_img']; ?>" class="card-img-top" alt="<?php echo $res['name']; ?>">
                                            <div class="editgrp">
                                                <div class="xs" >
                                                <a href="updatemodal2.php?id=<?php echo $res['id'];?>&type=<?php echo $res['type'];?>&bookname=<?php echo $res['name'];?>&author=<?php echo $res['author'];?>&cvr_img=<?php echo $res['cvr_img'];?>&qty=<?php echo $res['quantity'];?>&rating=<?php echo $res['rating'];?>" ><i class="fas fa-pen-square"></i></a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="details">
                                            <p class="text-capitalize fw-bold"><?php echo $res['name']; ?></p>
                                            <p class="text-capitalize">by <?php echo $res['author']; ?></p>
                                            <p class="text-capitalize">Quantity: <?php echo $res['quantity']; ?></p>
                                            <p class="text-capitalize">Rating: <?php echo $res['rating']; ?> <i class="fas text-warning fa-star"></i></p>
                                        </div>
                                    </div>

                                </div>
                            <?php
                            }
                            ?>
                        </div>



                    </div>
                </div>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>