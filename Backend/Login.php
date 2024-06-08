<?php
session_start();
include './db.php'; // Make sure this file correctly sets up your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_input = $_POST['user_email'];
    $password = $_POST['user_password'];

    // Secure the input
    $user_input = mysqli_real_escape_string($conn, $user_input);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check if the user exists (by email or mobile)
    $query = "SELECT * FROM user_details WHERE email='$user_input' OR mobile='$user_input'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['seller_id'] = $user['id'];
            $_SESSION['seller_name'] = $user['name'];
            echo '1'; // Success
        } else {
            echo '2'; // Wrong password
        }
    } else {
        echo '5'; // User not found
    }
} else {
    echo 'Invalid request method';
}
?>
