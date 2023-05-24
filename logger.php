<?php

interface LoggerInterface
{
    public function log($level, $message);
}

class FileLogger implements LoggerInterface
{
    public function log($level, $message)
    {
        $logEntry = "[" . date('Y-m-d H:i:s') . "] [$level] $message" . PHP_EOL;
        file_put_contents('log.txt', $logEntry, FILE_APPEND);
    }
}

class DatabaseLogger implements LoggerInterface
{
    public function log($level, $message)
    {
        // Code to log the message to a database
        // This is just a placeholder implementation
        $pdo = new PDO('mysql:host=localhost;dbname=mydatabase', 'root', '');
        $stmt = $pdo->prepare("INSERT INTO logs (level, message) VALUES (?, ?)");
        $stmt->execute([$level, $message]);
    }
}

// Usage example
$fileLogger = new FileLogger();
$fileLogger->log('INFO', 'This is an information message.');

$databaseLogger = new DatabaseLogger();
$databaseLogger->log('ERROR', 'An error occurred.');

?>
