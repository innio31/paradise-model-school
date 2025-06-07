<?php
require_once 'includes/auth.php';

if(isLoggedIn()) {
    header("location: dashboard.php");
    exit;
}

$admission_number = $password = "";
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate admission number
    if(empty(trim($_POST["admission_number"]))) {
        $error = "Please enter your admission number.";
    } else {
        $admission_number = trim($_POST["admission_number"]);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))) {
        $error = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // If no errors, try to login
    if(empty($error)) {
        if(loginStudent($admission_number, $password)) {
            header("location: dashboard.php");
            exit;
        } else {
            $error = "Invalid admission number or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal Login | Greenwood High</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="portal-login">
    <div class="login-container">
        <div class="login-card">
            <div class="school-brand text-center mb-4">
                <i class="fas fa-graduation-cap fa-3x mb-3"></i>
                <h2>Greenwood High</h2>
                <h4>Student Portal</h4>
            </div>
            
            <?php if(!empty($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label for="admission_number" class="form-label">Admission Number</label>
                    <input type="text" class="form-control" id="admission_number" name="admission_number" 
                           value="<?php echo $admission_number; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                <div class="text-center mt-3">
                    <a href="forgot-password.php">Forgot Password?</a>
                </div>
            </form>
        </div>
        
        <div class="login-footer mt-4 text-center">
            <p>Need help? Contact the IT department at <a href="mailto:it-support@greenwoodhigh.edu">it-support@greenwoodhigh.edu</a></p>
            <p>&copy; <?php echo date("Y"); ?> Greenwood High School. All rights reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>