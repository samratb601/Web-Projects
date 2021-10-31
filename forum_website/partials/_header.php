<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
session_start();
include '_dbconnect.php';

echo '<nav class="navbar navbar-expand-lg  bg-dark sticky-top h6" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand " href="index.php">iKnoW</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php
          ">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu"  id="categories">';

$sql  = "SELECT * FROM `categories`";
$res = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($res)) {

  echo '<li><a class="dropdown-item text-capitalize h6"  href="threads.php?cat_id=' . $row['category_id'] . '">' . $row['category_name'] . '</a></li>';
}
echo '</ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>';


echo '<form class="d-flex" action="search.php" method="get">
        <input class="form-control me-2 rounded-pill" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success btn-sm  rounded-pill  py-2 px-lg-3"><i class="fa fa-search"></i></button>
      </form>';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
  $user_name = explode(' ', $_SESSION['username']);
  $user_id = $_SESSION['sno'];

  echo '<p class="text-light border border-success rounded-pill px-3 py-1 mb-0 ms-2 h6"> ' . $user_name[0] . ' </p>
          <div class="flex-shrink-0 ms-1">
          <img src="img/user-circle-1179465.png" width="30px" alt="...">
          </div>
          <a type="button" class="btn btn-danger btn-sm rounded-pill ms-2" href="partials/_logout.php" role="button">Log out</a>';
} else {
  echo '<button type="button" class="btn btn-primary btn-sm rounded-pill mx-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Log in</button>
          <button type="button" class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#signupmodal">Sign Up</button>';
}
echo '</div>
  </div>
</nav>';

include 'partials/_login.php';
include 'partials/_signup.php';

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
  echo '<div class="alert alert-success my-0 d-flex alert-dismissible fade show align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#check-circle-fill"/></svg>
        <div>
        <strong>Success!</strong>
        Signed up Successfully!! You can Log in now.
        </div>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
} elseif (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false") {

  echo '<div class="alert alert-danger my-0 d-flex alert-dismissible fade show align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
        <strong>Warning! </strong>
        ' . $_GET['error'] . '
        </div>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
} elseif (isset($_GET['login']) && $_GET['login'] == "true") {
  echo '<div class="alert alert-success my-0 d-flex alert-dismissible fade show align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#check-circle-fill"/></svg>
        <div>
        <strong>Success!</strong>
        Login Successfully!! <span class="h6 text-light bg-success rounded-pill px-2 py-1">' . $_SESSION['username'] . '</span> You can Post Threads & Comments now.
        </div>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
} elseif (isset($_GET['login']) && $_GET['login'] == "false") {
  echo '<div class="alert alert-danger my-0 d-flex alert-dismissible fade show align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
        <strong>Warning! </strong>
        ' . $_GET['error'] . '
        </div>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
