<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

function loginStudent($admissionNumber, $password) {
    global $pdo;
    
    // Prepare SQL statement
    $sql = "SELECT id, admission_number, password, full_name FROM students 
            WHERE admission_number = :admission_number AND status = 'active'";
    
    if($stmt = $pdo->prepare($sql)) {
        // Bind parameters
        $stmt->bindParam(":admission_number", $admissionNumber, PDO::PARAM_STR);
        
        // Attempt to execute
        if($stmt->execute()) {
            // Check if admission number exists
            if($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Verify password
                if(password_verify($password, $row['password'])) {
                    // Password is correct, start new session
                    $_SESSION["student_loggedin"] = true;
                    $_SESSION["student_id"] = $row['id'];
                    $_SESSION["admission_number"] = $row['admission_number'];
                    $_SESSION["student_name"] = $row['full_name'];
                    
                    return true;
                } else {
                    return false; // Invalid password
                }
            } else {
                return false; // Admission number not found
            }
        } else {
            return false; // SQL execution failed
        }
    }
    return false;
}

function isLoggedIn() {
    return isset($_SESSION["student_loggedin"]) && $_SESSION["student_loggedin"] === true;
}

function logout() {
    $_SESSION = array();
    session_destroy();
}
?>