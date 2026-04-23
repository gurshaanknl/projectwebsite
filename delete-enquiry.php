<?php
/**
 * API Endpoint - Delete Enquiry
 */

session_start();

// Check if logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

header('Content-Type: application/json');

require_once __DIR__ . '/config.php';

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);
$id = $input['id'] ?? null;

if (!$id || !is_numeric($id)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid enquiry ID']);
    exit;
}

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

try {
    $stmt = $pdo->prepare("DELETE FROM enquiries WHERE id = ?");
    $stmt->execute([$id]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(['status' => 'success', 'message' => 'Enquiry deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Enquiry not found']);
    }
} catch(PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to delete enquiry: ' . (DEBUG_MODE ? $e->getMessage() : 'Database error')
    ]);
}
?>
