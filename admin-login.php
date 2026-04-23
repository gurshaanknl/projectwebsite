<?php
/**
 * Admin Login Page for Enquiries Dashboard
 * Simple password protection
 */

// Configure session to expire when browser closes
ini_set('session.cookie_lifetime', 0); // Session cookie (expires when browser closes)
ini_set('session.cookie_httponly', 1); // Prevent JavaScript access to cookie
ini_set('session.use_only_cookies', 1); // Only use cookies for session
session_start();

// Simple password - set a secure value before enabling password login again.
// $admin_password = 'your-secure-admin-password';
$admin_password = '';

// Check if already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin-dashboard.php');
    exit;
}

// Handle login
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    
    if ($admin_password !== '' && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin-dashboard.php');
        exit;
    } else {
        $error = 'Incorrect password. Please try again.';
    }
}

// Get Google Client ID if configured
require_once __DIR__ . '/config.php';
$google_enabled = !empty(GOOGLE_CLIENT_ID);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Veer Dreams</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #2b2b2b 0%, #1a1a1a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-box {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            max-width: 400px;
            width: 100%;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo img {
            max-width: 150px;
        }
        h1 {
            color: #D4AF37;
            margin-bottom: 10px;
            font-size: 28px;
            text-align: center;
        }
        p.subtitle {
            color: #666;
            margin-bottom: 30px;
            text-align: center;
        }
        .error-message {
            background: #fee;
            color: #c33;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #c33;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="password"]:focus {
            outline: none;
            border-color: #D4AF37;
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            background: #D4AF37;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn-login:hover {
            background: #b8941f;
        }
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
            color: #999;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }
        .divider span {
            padding: 0 15px;
            font-size: 14px;
        }
        #google-signin-container {
            width: 100%;
            margin-bottom: 15px;
            min-height: 50px;
        }
        .footer-text {
            margin-top: 20px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }
        .footer-text a {
            color: #D4AF37;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="logo">
            <img src="furniture/img/logoovd.png" alt="Veer Dreams">
        </div>
        <h1>Admin Login</h1>
        <p class="subtitle">Sign in to access enquiries dashboard</p>
        
        <?php if ($error): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <!-- Password Login Form -->
        <form method="POST" action="">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required autofocus placeholder="Enter your password">
            </div>
            <button type="submit" class="btn-login">Login with Password</button>
        </form>
        
        <p class="footer-text">
            Secure password login
        </p>
    </div>

</body>
</html>
