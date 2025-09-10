<?php
/**
 * Configuration Template for HoneyDew Catering Booking System
 * 
 * Copy this file to config.php and update the values below
 * DO NOT commit config.php to version control
 */

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'your_database_username');
define('DB_PASSWORD', 'your_database_password');
define('DB_NAME', 'honeydew_catering');
define('DB_CHARSET', 'utf8mb4');

// Site Configuration
define('SITE_URL', 'http://localhost/honeydew-catering');
define('SITE_NAME', 'HoneyDew Catering Services');
define('ADMIN_EMAIL', 'admin@honeydew-catering.com');
define('CONTACT_EMAIL', 'contact@honeydew-catering.com');

// Security Settings
define('SESSION_TIMEOUT', 3600); // 1 hour in seconds
define('ADMIN_SESSION_TIMEOUT', 7200); // 2 hours for admin sessions
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOGIN_LOCKOUT_TIME', 900); // 15 minutes

// File Upload Settings
define('UPLOAD_PATH', 'uploads/');
define('MAX_FILE_SIZE', 5242880); // 5MB in bytes
define('ALLOWED_FILE_TYPES', 'jpg,jpeg,png,gif,pdf,doc,docx');

// Email Configuration (for notifications)
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your_email@gmail.com');
define('SMTP_PASSWORD', 'your_email_password');
define('SMTP_ENCRYPTION', 'tls');

// Application Settings
define('ORDERS_PER_PAGE', 20);
define('DEFAULT_TIMEZONE', 'Asia/Kuala_Lumpur');
define('DATE_FORMAT', 'Y-m-d H:i:s');
define('CURRENCY', 'MYR');
define('CURRENCY_SYMBOL', 'RM');

// Debug Settings (set to false in production)
define('DEBUG_MODE', true);
define('LOG_ERRORS', true);
define('ERROR_LOG_FILE', 'logs/error.log');

// Business Settings
define('BUSINESS_HOURS_START', '08:00');
define('BUSINESS_HOURS_END', '18:00');
define('MIN_ORDER_AMOUNT', 100.00);
define('ADVANCE_BOOKING_DAYS', 2); // Minimum days in advance for booking

// Payment Settings (if integrated)
define('PAYMENT_GATEWAY', 'stripe'); // options: stripe, paypal, manual
define('PAYMENT_CURRENCY', 'MYR');
define('TAX_RATE', 0.06); // 6% SST in Malaysia

// Cache Settings
define('ENABLE_CACHE', true);
define('CACHE_DURATION', 3600); // 1 hour

// API Settings
define('API_ENABLED', true);
define('API_VERSION', 'v1');
define('API_RATE_LIMIT', 100); // requests per hour

// Social Media Links (for footer/contact page)
define('FACEBOOK_URL', 'https://facebook.com/honeydewcatering');
define('INSTAGRAM_URL', 'https://instagram.com/honeydewcatering');
define('TWITTER_URL', 'https://twitter.com/honeydewcatering');

// Error Handling
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Set timezone
date_default_timezone_set(DEFAULT_TIMEZONE);
?>