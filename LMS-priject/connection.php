<?php

$server= "localhost";
$user= "root";
$password= "";
$db="signup";

$con= mysqli_connect( $server,$user,$password,$db);


if($con){
   
}else{
    ?>
    <script>
    alert("not connected!!");
</script>
<?php
}

?>