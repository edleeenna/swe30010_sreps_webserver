<?php
  echo "Start<br>".PHP_EOL;
  include 'includes/head.php';
  echo "connect<br>".PHP_EOL;
  /*
  include 'includes/db_connect.php';
  echo "SQL<br>".PHP_EOL;
  
  try{
    echo "try<br>".PHP_EOL;
    // Test if any records match the supplied username and password
    $sql = "SELECT * FROM stock;";
    // Query the database to acquire results and hand them to resultSet
    $result = $conn->query($sql);
  }
  catch(PDOEXCEPTION $e){
    echo "catch<br>".PHP_EOL;
    // Display error message details
    echo 'Error fetching user login details: '.$e->getMessage();
    // Stop running script
    exit();
  }
  echo "results<br>".PHP_EOL;
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //echo "ID: " . $row["item_id"]. " - Name: " . $row["item_name"]. " - Description: " . $row["item_description"]. "<br>";
      print_r (array_values($row))
      echo "<br>";
    }
  }
  else {
    echo "0 results";
  }
  echo "Close<br>".PHP_EOL;
  $conn->close();*/
?>
    Edit Stock Item<br>
    Item<br>
    ID:<br>
    Name:<br>
    Cost Price<br>
    Price <br>
    Quantity <br>
    Minimm Target Quantity:<br>
<?php
  include 'includes/tail.php';
?>
