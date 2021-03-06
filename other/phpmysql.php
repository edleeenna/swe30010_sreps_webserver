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
    $username = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $password = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
    $dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "connection successful<br/>";
    echo "DB_SERVERNAME: $servername<br/>";
    echo "DB_USERNAME: $username<br/>";
    echo "DB_PASSWORD: $password<br/>";
    echo "DB_NAME: $dbname<br/>";
}
  try{
    // Test if any records match the supplied username and password
      $sql = "SELECT * FROM stock;";
      // Query the database to acquire results and hand them to resultSet
      $result = $conn->query($sql);
  }
  catch(PDOEXCEPTION $e){
      // Display error message details
      echo 'Error fetching user login details: '.$e->getMessage();
      // Stop running script
      exit();
  }
  
   if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "ID: " . $row["stock_id"]. " - Name: " . $row["stock_name"]. " - Description: " . $row["stock_description"]. " - Catagory ID: " . $row["stock_catagory_id"]. "<br>";
        echo "ID: " . $row["stock_id"]. " - Catagory ID: " . $row["stock_category_id"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
