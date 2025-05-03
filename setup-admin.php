<?php
require_once 'config.php';

// Check if admin already exists
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = 'admin@ppt-designer.com'");
$stmt->execute();
$adminExists = $stmt->fetch();

if (!$adminExists) {
    // Default admin credentials
    $adminEmail = 'admin@ppt-designer.com';
    $adminPassword = 'Admin@1234'; // Change this to a more secure password
    
    // Hash the password
    $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
    
    // Insert admin user
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute(['Admin', $adminEmail, $hashedPassword]);
    $adminId = $pdo->lastInsertId();
    
    // Get admin role ID
    $stmt = $pdo->prepare("SELECT id FROM roles WHERE name = 'admin'");
    $stmt->execute();
    $adminRole = $stmt->fetch();
    
    // Assign admin role
    if ($adminRole) {
        $stmt = $pdo->prepare("INSERT INTO user_roles (user_id, role_id) VALUES (?, ?)");
        $stmt->execute([$adminId, $adminRole['id']]);
    }
    
    echo "Default admin account created successfully!<br>";
    echo "Email: admin@ppt-designer.com<br>";
    echo "Password: Admin@1234<br>";
    echo "<strong>Important:</strong> Change this password immediately after first login!";
} else {
    echo "Admin account already exists.";
}
?>