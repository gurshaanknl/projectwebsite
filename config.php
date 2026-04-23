<?php
/**
 * Database Configuration File
 * Update these values according to your XAMPP MySQL setup
 */

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'veerdreams');
define('DB_USER', 'root');
define('DB_PASS', ''); // Default XAMPP password is empty

// Email Configuration
define('ADMIN_EMAIL', 'veerdreams21@gmail.com');
define('FROM_EMAIL', 'noreply@veerdreams.com');
define('FROM_NAME', 'Veer Dreams');

// SMTP Configuration (Optional - for better email delivery)
// Uncomment and configure if you want to use SMTP instead of PHP mail()
/*
define('SMTP_ENABLED', true);
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'your-email@gmail.com');
// define('SMTP_PASS', 'your-app-password');
define('SMTP_SECURE', 'tls'); // 'tls' or 'ssl'
*/

// Error Reporting (Set to false in production)
define('DEBUG_MODE', true);

// Google OAuth Configuration
// Get these from: https://console.cloud.google.com/apis/credentials
define('GOOGLE_CLIENT_IDS', [
    // 'your-google-client-id.apps.googleusercontent.com',
    // Add duplicate / fallback Google Client IDs here when needed.
]);
define('GOOGLE_CLIENT_SECRETS', [
    // 'your-google-client-secret',
    // Add duplicate / fallback Google Client Secrets here when needed.
]);

// Backward-compatible primary Google OAuth values used across the app.
define('GOOGLE_CLIENT_ID', GOOGLE_CLIENT_IDS[0] ?? '');
define('GOOGLE_CLIENT_SECRET', GOOGLE_CLIENT_SECRETS[0] ?? '');
// Allowed Google emails (comma-separated) - Only these emails can login
define('GOOGLE_ALLOWED_EMAILS', 'veerdreams21@gmail.com'); // Add allowed admin emails here

function get_google_client_ids() {
    return array_values(array_filter(GOOGLE_CLIENT_IDS, static function ($clientId) {
        return is_string($clientId) && trim($clientId) !== '';
    }));
}

function google_oauth_is_configured() {
    return !empty(get_google_client_ids()) && !empty(GOOGLE_CLIENT_SECRET);
}
