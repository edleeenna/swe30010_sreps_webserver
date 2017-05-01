<?php
  $servername = "127.0.0.1";
  $dbname = "localdb";
  $username = "root";
  $password = "";
  
  // Parsing connnection string
  foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_") !== 0) {
        continue;
    }
    // Assigning fresh values.
    $servername = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $username = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $password = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
    $dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
  }
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $conn->connect_error . PHP_EOL;
  }
  $sql = "SELECT * FROM stock";
  $result = $conn->query($sql);
  // Point to start of result set again.
  // $result->data_seek(0);
  while ($row = $result->fetch_assoc()) {
    echo " Stock Id = " . $row['stock_supplier'] . "<br>".PHP_EOL;
  } /* */
  //echo $row['stock_id'];
  /*
  $sql = "UPDATE stock SET stock_qty = 26 WHERE stock_id = 000001";
  if ($conn->query($sql) === true) {
    echo "Record updated successfully";
  }
  else {
    echo "Error updating record: (" . $mysqli->connect_errno . ") " . $conn->connect_error . PHP_EOL;
  } /* */
?>
