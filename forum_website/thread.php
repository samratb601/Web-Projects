<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <title>iKnoW</title>
</head>

<body>
    <?php
    include('partials/_header.php');
    ?>
    <?php include  'partials/_dbconnect.php' ?>

    <?php
    $id = $_GET['thread_id'];
    $sql = "SELECT * FROM `thread` WHERE thread_id=$id";
    $result =  mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $thread_name = $row['thread_title'];
        $thread_desc = $row['thread_desc'];
        $thread_time = $row['timestamp'];
        $thread_user_id = $row['thread_user_id'];

        // fetching user name from user table 
        $sql2 = "SELECT `user_name` FROM `user` WHERE `user_id`=$thread_user_id;";
        $res2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($res2);

        $thread_user_name= $row['user_name'];
    }
    ?>
    <!-- category container starts here  -->
    <div class="container">
        <div class="jumbotron jumbotron-fluid  my-2">
            <h2><span class="text-capitalize  text-primary"><?php echo $thread_name; ?></span></h2>
            <p class="lead  p-2"><?php echo $thread_desc; ?> </p>
            <hr class="my-4">
            <p class="text-secondary h6">* No Spam / Advertising / Self-promote in the forums.Do not post copyright-infringing material.Do not post “offensive” post links or images.Do not cross post questions.Do not PM users asking for help.Remain respectful of other members at all times *</p>
            <p class=" mt-3 text-secodary">Posted by <span class="fw-bold"> <?php echo $thread_user_name; ?></span> at <?php echo $thread_time ?> </p>

        </div>
    </div>
    <div class="container  py-1">
        <?php
        $method = $_SERVER['REQUEST_METHOD'];
        $showalert = false;

        if ($method == 'POST') {
            // insert into thread database 
            $comment_content = $_POST['comment'];
            $comment_content = str_replace("<","&lt",$comment_content);
            $comment_content = str_replace(">","&gt",$comment_content);
            $comment_by = $_SESSION['sno'];

            if ($comment_content == '') {
                echo '<div class="alert alert-danger d-flex alert-dismissible fade show align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                        <strong>Alert!</strong>
                        Your Comment can\'t be Empty!!
                        </div>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            } else {

                $sql = "INSERT INTO `comments`( `comment_content`, `thread_id`, `comment_by`) VALUES ('$comment_content','$id','$comment_by')";

                $result =  mysqli_query($conn, $sql);

                $showalert = true;
                if ($showalert) {
                    echo '<div class="alert alert-success d-flex alert-dismissible fade show align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill"/></svg>
                    <div>
                    <strong>Success!</strong>
                    Your Comment has been added!!
                    </div>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
            }
        }
        ?>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
            echo '<form action="" method="POST">
            <h3 class="py-1 border border-secondary text-center rounded-pill">Post a Comment </h3>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Comment here <sapn class="h6">regarding - 
                '.$thread_name.'</span></label>
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="comment"></textarea>
            </div>

            <button type="submit" class="btn btn-success btn-sm rounded-pill">Post Comment</button>
        </form>';
        } else {
            echo '<div class="container  py-1"> 
            <h3 class="py-1 border border-secondary text-center rounded-pill">Post a Comment</h3>
            <p class="h6">
            To Post a Comment You need to 
            <button class="text-primary" type="button" data-bs-toggle="modal" data-bs-target="#loginmodal" style="border:none; background:transparent;text-decoration:underline;">login</button>
             first. Don\'t have an Account? 
            <button class="text-primary" type="button" data-bs-toggle="modal" data-bs-target="#signupmodal" style="border:none; background:transparent; text-decoration:underline;">Sign up</button>
             here.</p>
            </div>';
        }
        ?>
    </div>
    <div class="container my-2" id="quest">
        <h3 class="py-1">Discussion</h3>

        <?php
        $id = $_GET['thread_id'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result =  mysqli_query($conn, $sql);
        $no_result = true;

        while ($row = mysqli_fetch_assoc($result)) {
            $no_result = false;
            $comment_content = $row['comment_content'];
            $comment_time = $row['comment_time'];

            $comment_by = $row['comment_by'];


            // fetching user name from user table 
            $sql2 = "SELECT `user_name` FROM `user` WHERE `user_id`='$comment_by';";
            $res2 = mysqli_query($conn, $sql2);
            $row = mysqli_fetch_assoc($res2);

            echo  '<div class="d-flex my-2">
            <div class="flex-shrink-0">
                <img src="img/user-circle-1179465.png" width="30px" alt="...">
            </div>';

            if (isset($_SESSION['sno']) && $comment_by == $_SESSION['sno']) {
                echo '<div class="flex-grow-1 ms-3 ">
            <p class="d-flex my-1"> <b class="border bg-primary text-light shadow-lg rounded-pill px-3 me-2">' . $row['user_name'] . '</b> at<span class="text-secondary ms-2 mb-0 ">' . $comment_time . '</span></p>
               ' . $comment_content . '
            </div>';
            } else {
                echo '<div class="flex-grow-1 ms-3 ">
                <p class="d-flex my-1"> <b class="border bg-dark text-light shadow-lg rounded-pill px-3 me-2">' . $row['user_name'] . '</b> at<span class="text-secondary ms-2 mb-0 ">' . $comment_time . '</span></p>
                   ' . $comment_content . '
                </div>';
            }
            echo '</div>';
        }
        if ($no_result) {
            echo '<div class="jumbotron jumbotron-fluid  my-2">
            <h3 class="text-danger">No results found !!</h3>
            <hr class="my-3">
            <p class="h6">
                Be the first person to Comment!!
            </p>
        </div>';
        }
        ?>

    </div>


    <?php
    include('partials/_footer.php');
    ?>

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