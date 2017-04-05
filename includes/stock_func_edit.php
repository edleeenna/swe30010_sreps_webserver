<?php
  function get_ID_list(){
    echo "get_ID_list Function called.<br>".PHP_EOL;
    include 'includes/db_connect.php';

    try{
      // Test if any records match the supplied username and password
      $sql = "SELECT stock_id FROM stock ORDER BY stock_id ASC;";
      // Query the database to acquire results and hand them to resultSet
      $result = $conn->query($sql);
    }
    catch(PDOEXCEPTION $e){
      // Display error message details
      echo 'Error fetching user login details: '.$e->getMessage();
      // Stop running script
      exit();
    }
    echo "get_ID_list Function finished SQL.<br>".PHP_EOL;
    if ($result->num_rows > 0) {
      // output data of each row
      foreach ($result as $row) {
      //while($row = $result->fetch_assoc()) {
        //echo '<option value="'.$row["stock_id"].'>".$row["stock_id"]."</option>";
        echo '<option value="'.$row['stock_id'].'>'.$row['stock_id'].'</option>';
      }
    }
    else {
      echo "0 results";
    }

    $conn->close();
  }
  /*function get_stock_item_details($_POST['stock_id']) {
    
    include 'includes/db_connect.php';

    try{
      // Test if any records match the supplied username and password
      $sql = "SELECT * FROM stock WHERE stock_id = ".$_POST['stock_id'].";";
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
  }*/
?>
