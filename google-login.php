<?php
/**
 * Google Sign-In Handler
 * Verifies Google OAuth token and logs in user
 */

session_start();

header('Content-Type: application/json');

require_once __DIR__ . '/config.php';

// Check if Google OAuth is configured
if (!function_exists('google_oauth_is_configured') || !google_oauth_is_configured()) {
    echo json_encode(['status' => 'error', 'message' => 'Google Sign-In is not configured']);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);
$credential = $input['credential'] ?? null;

if (!$credential) {
    echo json_encode(['status' => 'error', 'message' => 'No credential provided']);
    exit;
}

// Verify the Google ID token
// Split the JWT token to get the payload
$parts = explode('.', $credential);
if (count($parts) !== 3) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid token format']);
    exit;
}

// Decode the payload (second part)
$payload = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], $parts[1])), true);

if (!$payload) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to decode token']);
    exit;
}

// Verify token is from Google and not expired
$current_time = time();
if (!isset($payload['iss']) || $payload['iss'] !== 'https://accounts.google.com') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid token issuer']);
    exit;
}

if (!isset($payload['exp']) || $payload['exp'] < $current_time) {
    echo json_encode(['status' => 'error', 'message' => 'Token has expired']);
    exit;
}

if (!isset($payload['aud']) || !in_array($payload['aud'], get_google_client_ids(), true)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid token audience']);
    exit;
}

// Get user email
$email = $payload['email'] ?? null;
$name = $payload['name'] ?? 'User';
$picture = $payload['picture'] ?? null;

if (!$email) {
    echo json_encode(['status' => 'error', 'message' => 'Email not found in token']);
    exit;
}

// Check if email is in allowed list
$allowed_emails = array_map('trim', explode(',', GOOGLE_ALLOWED_EMAILS));
if (!in_array($email, $allowed_emails)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'This email is not authorized to access the admin dashboard. Please contact the administrator.'
    ]);
    exit;
}

// Login successful - set session
$_SESSION['admin_logged_in'] = true;
$_SESSION['admin_email'] = $email;
$_SESSION['admin_name'] = $name;
$_SESSION['admin_picture'] = $picture;
$_SESSION['login_method'] = 'google';

echo json_encode([
    'status' => 'success',
    'message' => 'Login successful',
    'user' => [
        'email' => $email,
        'name' => $name
    ]
]);
?>
