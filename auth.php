<?php
require_once 'config.php';

// Handle login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Find user by email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        // Login successful
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['username'] = $user['username'];
        
        // Redirect based on role
        $roles = getCurrentUserRoles();
        if (in_array('admin', $roles)) {
            redirect('admin.php');
        } elseif (in_array('worker', $roles)) {
            redirect('worker.php');
        } else {
            redirect('customer.php');
        }
    } else {
        $error = "Invalid email or password";
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    redirect('login.php');
}
?>