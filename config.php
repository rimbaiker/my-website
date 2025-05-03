<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ppt_designer');

// Start session
session_start();

// Connect to database
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Helper functions
function redirect($url) {
    header("Location: $url");
    exit();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function hasRole($roleName) {
    if (!isLoggedIn()) return false;
    
    global $pdo;
    $stmt = $pdo->prepare("SELECT r.name FROM roles r 
                          JOIN user_roles ur ON r.id = ur.role_id 
                          WHERE ur.user_id = ? AND r.name = ?");
    $stmt->execute([$_SESSION['user_id'], $roleName]);
    return $stmt->fetch() !== false;
}

function getCurrentUserRoles() {
    if (!isLoggedIn()) return [];
    
    global $pdo;
    $stmt = $pdo->prepare("SELECT r.name FROM roles r 
                          JOIN user_roles ur ON r.id = ur.role_id 
                          WHERE ur.user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    function isAdmin() {
        return isset($_SESSION['roles']) && in_array('admin', $_SESSION['roles']);
    }
}
?>