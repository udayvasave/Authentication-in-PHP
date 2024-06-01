<?php

include './db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //collect formDAta

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql_insert = "INSERT INTO `user_details`(`name`,`email`,`mobile`,`password`) VALUES ('$name','$email','$mobile','$password')";

    if(mysqli_query($conn,$sql_insert)){
        echo '1';
    }
    else{
        echo '0';
    }

}

?>