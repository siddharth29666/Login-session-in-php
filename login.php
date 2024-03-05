<?php

require_once "./connection.php";

if(isset($_POST['sginnin'])){


    $email1= $_POST['email'];
    $password2=$_POST['password'];


    $query ="SELECT * FROM `sgin_up` WHERE `email1`='$email1' AND `password2`='$password2'";

    $result=mysqli_query($conn,$query);

    // echo "<pre>";
    // print_r($result);
    // die();


    if(mysqli_num_rows($result)>0){

        $data=mysqli_fetch_assoc($result);
        $_SESSION['userdata']=$data;
        // echo "<pre>";
        // print_r($data);
        // die();

        header("location:dashboard.php");
        

    }else{

        echo "inviled username and password";
    }
}

?>