<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'goupcomp_content');
define('DB_USER', 'goupcomp_content');
define('DB_PASS', 'DkSSXsDjsBeYL9Z7gvJ2');

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