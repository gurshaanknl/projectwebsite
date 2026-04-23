<?php
/**
 * Returns Google Client ID for frontend use
 */
require_once __DIR__ . '/config.php';

header('Content-Type: application/json');
echo json_encode([
    'client_id' => GOOGLE_CLIENT_ID ?? '',
    'enabled' => function_exists('google_oauth_is_configured') ? google_oauth_is_configured() : !empty(GOOGLE_CLIENT_ID)
]);
?>
