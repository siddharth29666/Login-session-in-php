<?php

require_once "./connection.php";
if(isset($_POST['login'])){





// echo "<pre>";
// print_r($_POST);
// die();

$fname = $_POST['fname'];
$email1 = $_POST['email1'];
$password2 = $_POST['password2'];


$query="INSERT INTO `sgin_up`(`fname`,`email1`,`password2`) VALUES('$fname','$email1','$password2')";
$res=mysqli_query($conn,$query);

if($res){
?>
<script>
    alert("data insert succsesfuly");
    window.location.href="index.php";
</script>
    <!-- echo "data insert succsesfuly"; -->
    <?php
}
else{

    echo "data insert error " .mysqli_error($conn);
}
}


?>