<?php

$host="localhost";
$username="root";
$pass="";
$db_name="registration_form";

session_start();


$conn = mysqli_connect($host,$username,$pass,$db_name);

if($conn){

    // echo "database connection succsesfuly";
}
else{

    echo "database connectio failed";
}
?>