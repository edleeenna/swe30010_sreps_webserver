<?php
  function get_ID_list(){
    //echo "get_ID_list Function called.<br>".PHP_EOL;
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
    //echo "get_ID_list Function finished SQL.<br>".PHP_EOL;
    if ($result->num_rows > 0) {
      // output data of each row
      foreach ($result as $row) {
      //while($row = $result->fetch_assoc()) {
        //echo '<option value="'.$row["stock_id"].'>".$row["stock_id"]."</option>";
        echo '<option value="'.$row['stock_id'].'">'.$row['stock_id'].'</option>';
      }
      echo "<br>".PHP_EOL;
    }
    else {
      echo "0 results";
    }

    $conn->close();
  }
  function get_stock_item_details($php_stock_id) {
    //echo "get_stock_item_details() called.".PHP_EOL;
    include 'includes/db_connect.php';

    try{
      // Test if any records match the supplied username and password
      $sql = "SELECT stock_id, stock_name, stock_description FROM stock WHERE stock_id = ".$php_stock_id.";";
      // Query the database to acquire results and hand them to resultSet
      $result = $conn->query($sql);
    }
    catch(PDOEXCEPTION $e){
      // Display error message details
      echo 'Error fetching user login details: '.$e->getMessage();
      // Stop running script
      exit();
    }
    //echo "SQL Query completed.<br>".PHP_EOL;
    if ($result->num_rows == 0) echo "0 results";
    if ($result->num_rows > 1) echo "Too many results";
    //if ($result->num_rows = 1) {
      // output data of each row
      /*while($row = $result->fetch_assoc()) {
        //echo "ID: " . $row["item_id"]. " - Name: " . $row["item_name"]. " - Description: " . $row["item_description"]. "<br>";
        print_r (array_values($row))
        echo "<br>";
      }*/
    echo "Result testing completed.<br>".PHP_EOL;
    $row = $results->fetch();
    //$row = $results->fetch_assoc();
    //print_r (array_values($row));
    $php_stock_details = array();
    $php_stock_details[0] = $row['stock_id'];
    $php_stock_details[1] = $row['stock_name'];
    $php_stock_details[2] = $row['stock_description'];
    //}

    $conn->close();
    return $php_stock_details;
  }
?>
