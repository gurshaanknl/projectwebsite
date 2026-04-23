<?php
/**
 * Submit Homepage Contact Form Handler
 * Processes form submissions from index.html contact form
 */

header('Content-Type: application/json');

// Include configuration
require_once __DIR__ . '/config.php';

// Include PHPMailer
require_once __DIR__ . '/vendor/PHPMailer/Exception.php';
require_once __DIR__ . '/vendor/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/vendor/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database Connection
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch(PDOException $e) {
    if (DEBUG_MODE) {
        echo json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $e->getMessage()]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database connection failed. Please try again later.']);
    }
    exit;
}

// Get and sanitize form data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$project_type = trim($_POST['project_type'] ?? '');
$message = trim($_POST['message'] ?? '');

// Debug logging (only in debug mode)
if (DEBUG_MODE) {
    error_log("POST data received: " . print_r($_POST, true));
}

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = 'Name is required';
}

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address';
}

if (empty($phone)) {
    $errors[] = 'Phone is required';
}

if (empty($project_type)) {
    $errors[] = 'Project type is required';
}

if (!empty($errors)) {
    echo json_encode(['status' => 'error', 'message' => implode('. ', $errors)]);
    exit;
}

// Additional validation
if (strlen($name) < 2) {
    echo json_encode(['status' => 'error', 'message' => 'Name must be at least 2 characters long.']);
    exit;
}

// Build message with project type
$full_message = "Project Type: " . $project_type;
if (!empty($message)) {
    $full_message .= "\n\nMessage: " . $message;
}
$full_message .= "\n\nSource: Homepage Contact Form";

// Save to database
try {
    $stmt = $pdo->prepare("INSERT INTO enquiries (name, email, phone, message, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([$name, $email, $phone, $full_message]);
    $enquiry_id = $pdo->lastInsertId();
} catch(PDOException $e) {
    if (DEBUG_MODE) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save enquiry: ' . $e->getMessage()]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save enquiry. Please try again.']);
    }
    exit;
}

// Send email notification using PHPMailer
try {
    $mail = new PHPMailer(true);
    
    // Check if SMTP is configured
    if (defined('SMTP_ENABLED') && SMTP_ENABLED === true) {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port = SMTP_PORT;
    } else {
        // Use PHP mail() function (default for XAMPP)
        $mail->isMail();
    }
    
    // Email settings
    $mail->setFrom(FROM_EMAIL, FROM_NAME);
    $mail->addAddress(ADMIN_EMAIL);
    $mail->addReplyTo($email, $name);
    
    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission from Veer Dreams Website';
    $mail->CharSet = 'UTF-8';
    
    // HTML Email Body
    $mail->Body = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background-color: #D4AF37; color: #fff; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
            .content { background-color: #f9f9f9; padding: 30px; border: 1px solid #ddd; }
            .field { margin-bottom: 15px; }
            .label { font-weight: bold; color: #555; }
            .value { color: #333; margin-top: 5px; }
            .message-box { background-color: #fff; padding: 15px; border-left: 4px solid #D4AF37; margin-top: 10px; }
            .footer { text-align: center; padding: 20px; color: #777; font-size: 12px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Contact Form Submission</h2>
            </div>
            <div class='content'>
                <div class='field'>
                    <div class='label'>Name:</div>
                    <div class='value'>" . htmlspecialchars($name) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Email:</div>
                    <div class='value'>" . htmlspecialchars($email) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Phone:</div>
                    <div class='value'>" . htmlspecialchars($phone) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Project Type:</div>
                    <div class='value'>" . htmlspecialchars($project_type) . "</div>
                </div>
                " . (!empty($message) ? "
                <div class='field'>
                    <div class='label'>Message:</div>
                    <div class='message-box'>" . nl2br(htmlspecialchars($message)) . "</div>
                </div>
                " : "") . "
                <div class='field'>
                    <div class='label'>Enquiry ID:</div>
                    <div class='value'>#{$enquiry_id}</div>
                </div>
                <div class='field'>
                    <div class='label'>Submitted At:</div>
                    <div class='value'>" . date('F j, Y, g:i a') . "</div>
                </div>
            </div>
            <div class='footer'>
                <p>This is an automated email from Veer Dreams website (Homepage Contact Form).</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    // Plain text version
    $mail->AltBody = "New Contact Form Submission from Veer Dreams Website\n\n" .
                     "Name: {$name}\n" .
                     "Email: {$email}\n" .
                     "Phone: {$phone}\n" .
                     "Project Type: {$project_type}\n" .
                     (!empty($message) ? "Message:\n{$message}\n\n" : "") .
                     "Enquiry ID: #{$enquiry_id}\n" .
                     "Submitted At: " . date('F j, Y, g:i a');
    
    $mail->send();
    
    // Success response
    echo json_encode([
        'status' => 'success',
        'message' => 'Thank you! Your message has been submitted successfully. We will get in touch with you soon.'
    ]);
    
} catch(Exception $e) {
    // Email failed but enquiry was saved to database
    // Log the error but still return success to user
    if (DEBUG_MODE) {
        error_log("Email sending failed: " . $mail->ErrorInfo);
    }
    
    // Still return success since the enquiry was saved
    echo json_encode([
        'status' => 'success',
        'message' => 'Thank you! Your message has been received. We will get in touch with you soon.'
    ]);
}
?>
