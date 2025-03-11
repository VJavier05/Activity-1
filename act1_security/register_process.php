<?php
session_start();
require 'db_connect.php'; 

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
   

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: register.php"); // Redirect back to the registration page
        exit();
    }

    // Check if the email is unique
    $check_email_sql = "SELECT COUNT(*) FROM users WHERE email = :email";
    $stmt = $pdo->prepare($check_email_sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    if ($stmt->fetchColumn() > 0) {
        $_SESSION['error'] = "Email already exists.";
        header("Location: register.php");
        exit();
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement to prevent SQL injection
    $sql = "INSERT INTO users 
    (email, password, role) 
    VALUES 
    (:email, :password, 'user')";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
          
            ':email' => $email,
            ':password' => $hashed_password,
          
        ]);

        $message = "A new user, $first_name $last_name, has registered.";

        $_SESSION['success'] = "Registration successful!";
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: register.php");
        exit();
    }
}
?>
