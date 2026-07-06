<?php
class Database {
    private static $pdo = null;
    public static function get() {
        if (self::$pdo === null) {
            $cfg = include __DIR__ . '/../config/config.php';
            $db = $cfg['db'];
            $dsn = "mysql:host={$db['host']};port={$db['port']};dbname={$db['name']};charset=utf8mb4";
            self::$pdo = new PDO($dsn, $db['user'], $db['pass'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_SSL_CA => null,
                PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
            ]);
        }
        return self::$pdo;
    }
}
?>
