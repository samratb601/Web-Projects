<?php

include 'connection.php';

$id= $_GET['id'];

$dltquery= " delete from books where id=$id " ;

$res= mysqli_query($con, $dltquery);

if(!$res){
    
}else{

    ?>
 <script>
     alert("Deletd Sucessfully!");
     location.replace("manage_books.php");
 </script>
    <?php
}

?>