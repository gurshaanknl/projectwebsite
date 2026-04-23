<?php
/**
 * Save Chatbot Contact - Saves Google Sign-In info from chatbot to database
 */

header('Content-Type: application/json');

require_once __DIR__ . '/config.php';

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);
$name = trim($input['name'] ?? '');
$email = trim($input['email'] ?? '');
$phone = trim($input['phone'] ?? '');
$source = 'Chatbot - Google Sign-In'; // Mark as from chatbot

// Validation
if (empty($name) || empty($email)) {
    echo json_encode(['status' => 'error', 'message' => 'Name and email are required']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid email address']);
    exit;
}

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
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

// Check if this email already exists (to avoid duplicates)
try {
    $checkStmt = $pdo->prepare("SELECT id FROM enquiries WHERE email = ? ORDER BY created_at DESC LIMIT 1");
    $checkStmt->execute([$email]);
    $existing = $checkStmt->fetch();
    
    if ($existing) {
        // Update existing record with latest info
        $updateStmt = $pdo->prepare("UPDATE enquiries SET name = ?, phone = ?, message = CONCAT(IFNULL(message, ''), '\n\n[Updated via Chatbot Google Sign-In]'), created_at = NOW() WHERE id = ?");
        $updateStmt->execute([$name, $phone ?: null, $existing['id']]);
        echo json_encode([
            'status' => 'success',
            'message' => 'Contact information updated',
            'action' => 'updated'
        ]);
    } else {
        // Insert new record
        $message = "Contact information shared via Chatbot Google Sign-In.\nSource: " . $source;
        $stmt = $pdo->prepare("INSERT INTO enquiries (name, email, phone, message, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$name, $email, $phone ?: null, $message]);
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Contact information saved',
            'action' => 'created'
        ]);
    }
} catch(PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to save contact: ' . (DEBUG_MODE ? $e->getMessage() : 'Database error')
    ]);
}
?>
