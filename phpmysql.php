<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Parsing connnection string
foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_") !== 0) {
        continue;
    }
    
    $servername = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $username = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $password = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

define('DB_SERVERNAME', $servername);
define('DB_NAME', $dbname);
define('DB_USERNAME', $username);
define('DB_PASSWORD', $password);

// Create connection
$conn = new mysqli(DB_SERVERNAME, 'pharmacy', DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "connection successful<br/>";
    echo "DB_SERVERNAME: $servername<br/>";
    echo "DB_NAME: $dbname<br/>";
    echo "DB_USERNAME: $username<br/>";
    echo "DB_PASSWORD: $password<br/>";
}
$conn->close();
?>





