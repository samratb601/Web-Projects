<div class="left_div  py-5">
            <div class="logo">
                <img src="img/user-circle-1179465.png" width="100px" height="100px" alt="">
            </div>
            <div class="x-at">
                <p class="text-secondary fw-bold "> Admin </p>
                <p class="text-secondary text-capitalize"><?php echo $_SESSION['user']; ?></p>
            </div>


            
            <div class="menu">
                <a class="btn btn-outline-warning btn-sm  m-2" href="all_books.php" role="button">All Books</a>
                <a class="btn btn-outline-warning btn-sm  m-2" href="available_books.php" role="button">Avilable Books</a>
                <a class="btn btn-outline-warning btn-sm  m-2" href="#" role="button">Given Books</a>
                <a class="btn btn-outline-warning btn-sm  m-2 " href="manage_books.php" role="button">Manage Books</a>
                <a class="btn btn-sm  btn-success m-2" href="student_home.php" role="button">Manage Students</a>
            </div>
            
            <div class="d-flex flex-column">
                <a class="btn btn-danger btn-sm m-5" onclick="return checklogout()" href="landingpage/landingpage.php" role="button">Log out</a>
            </div>
        </div>
        <script>
              function checklogout() {
            return confirm("Are you sure? You want to log out?");
        }
        </script>