<?php 
function get_pdo() {
$host = "localhost";
$db = 'event_planner';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Allows for Error Handling
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //Sets our fetch to by default return an array of values. 
];

try {
    return new PDO($dsn, $user, $pass, $options);
}
catch (PDOException $ex) {
print_r("DB Connect FAILED: " . $ex->getMessage());
}
}
?>