<?php

$dbHost = 'mysql525.loopia.se';
$db = 'zocomutbildning_se_db_7';
$dbUser = 'taggadig@z164631';
$password = 'ta55ad1g234';
$charset = 'utf8';
$dsn = "mysql:host={$dbHost};dbname={$db};charset={$charset}";
$options = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, \PDO::ATTR_EMULATE_PREPARES => false];
try {
    $pdo = new \PDO($dsn, $dbUser, $password, $options);
} catch (\PDOException $e) {
    error_log("Database connection Error");
    die("A problem has occurred with our servers! Please try again later");
}