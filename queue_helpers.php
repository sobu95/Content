<?php
/**
 * Utility helpers for queue processing
 */

/**
 * Updates timestamp of the last queue processor run
 *
 * @param PDO $pdo Database connection
 */
function updateLastRunTimestamp(PDO $pdo) {
    try {
        $stmt = $pdo->prepare(
            "INSERT INTO settings (setting_key, setting_value)
            VALUES ('last_queue_run', NOW())
            ON DUPLICATE KEY UPDATE setting_value = NOW()"
        );
        $stmt->execute();
    } catch (Exception $e) {
        // Assumes logMessage is defined by the including script
        if (function_exists('logMessage')) {
            logMessage('Failed to update last run timestamp: ' . $e->getMessage(), 'error');
        }
    }
}
?>
