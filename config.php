<?php
// Load sensitive configuration from environment variables or an optional
// `config.local.php` file which is ignored by version control.
if (file_exists(__DIR__ . '/config.local.php')) {
    require __DIR__ . '/config.local.php';
}

if (!defined('DB_HOST')) {
    define('DB_HOST', getenv('DB_HOST'));
}
if (!defined('DB_NAME')) {
    define('DB_NAME', getenv('DB_NAME'));
}
if (!defined('DB_USER')) {
    define('DB_USER', getenv('DB_USER'));
}
if (!defined('DB_PASS')) {
    define('DB_PASS', getenv('DB_PASS'));
}

if (!defined('GEMINI_API_KEY')) {
    $apiKey = getenv('GEMINI_API_KEY');
    if ($apiKey !== false) {
        define('GEMINI_API_KEY', $apiKey);
    }
}

function getDbConnection() {
    try {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        die('Błąd połączenia z bazą danych: ' . $e->getMessage());
    }
}
?>
