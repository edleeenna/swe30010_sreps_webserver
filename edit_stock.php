<?php
  include 'includes/head.php';
  include 'includes/db_connect.php';

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
      //echo "ID: " . $row["item_id"]. " - Name: " . $row["item_name"]. " - Description: " . $row["item_description"]. "<br>";
      print_r (array_values($row))
      echo "<br>";
    }
  }
  else {
    echo "0 results";
  }
  
  $conn->close();
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
