<?php
  function cleanInput($input) {
    echo "Cleaning $input.<br>".PHP_EOL;
    return htmlspecialchars(stripslashes(trim($input)));
  }
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
      echo 'Error fetching list of stock IDs: '.$e->getMessage();
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
      $sql = "SELECT * FROM stock WHERE stock_id = ".$php_stock_id.";";
      // Query the database to acquire results and hand them to resultSet
      $result = $conn->query($sql);
    }
    catch(PDOEXCEPTION $e){
      // Display error message details
      echo 'Error fetching stock item details: '.$e->getMessage();
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
    echo "Result testing completed.".$result->num_rows."<br>".PHP_EOL;
    //$row = $result->fetch();
    $row = $result->fetch_assoc();
    print_r (array_values($row));
    $php_stock_details = array();
    $php_stock_details['id'] = $row['stock_id'];
    $php_stock_details['name'] = $row['stock_name'];
    $php_stock_details['description'] = $row['stock_description'];
    $php_stock_details['directions'] = $row['stock_directions'];
    $php_stock_details['ingredients'] = $row['stock_ingredients'];
    $php_stock_details['price'] = $row['stock_price'];
    $php_stock_details['cost_price'] = $row['stock_cost_price'];
    $php_stock_details['qty'] = $row['stock_qty'];
    $php_stock_details['target_min_qty'] = $row['stock_target_min_qty'];
    $php_stock_details['supplier'] = $row['stock_supplier'];
    $php_stock_details['supplier_order_code'] = $row['stock_supplier_order_code'];
    $php_stock_details['category_id'] = $row['stock_category_id'];
    $php_stock_details['bar_code'] = $row['stock_bar_code'];
    //}

    $conn->close();
    return $php_stock_details;
  }
  function update_stock() {
    if (isset($_POST['html_item_update'])) {
      //echo "update_stock Function called.<br>".PHP_EOL;
      include 'includes/db_connect.php';

      try{
        // Test if any records match the supplied username and password
        //$sql = "UPDATE stock SET stock_id = :stock_id, stock_name = :stock_name, stock_description = :stock_description;";
        /*$sql = "UPDATE stock SET";
        $sql .= " stock_name = ".cleanInput($_POST['html_stock_name']);
        $sql .= ", stock_description = ".cleanInput($_POST['html_stock_description']);
        $sql .= ", stock_directions = ".cleanInput($_POST['html_stock_directions']);
        $sql .= ", stock_ingredients = ".cleanInput($_POST['html_stock_ingredients']);
        $sql .= ", stock_price = ".cleanInput($_POST['html_stock_price']);
        $sql .= ", stock_cost_price = ".cleanInput($_POST['html_stock_cost_price']);
        $sql .= ", stock_qty = ".cleanInput($_POST['html_stock_qty']);
        $sql .= ", stock_target_min_qty = ".cleanInput($_POST['html_stock_target_min_qty']);
        $sql .= ", stock_supplier = ".cleanInput($_POST['html_stock_supplier']);
        $sql .= ", stock_supplier_order_code = ".cleanInput($_POST['html_stock_supplier_order_code']);
        $sql .= ", stock_category_id = ".cleanInput($_POST['html_stock_category_id']);
        $sql .= ", stock_bar_code = ".cleanInput($_POST['html_stock_bar_code']);
        $sql .= " WHERE stock_id = ".cleanInput($_POST['html_stock_id']).";";*/
        $sql = "UPDATE stock SET stock_name = ?, stock_description = ?, stock_directions = ?, stock_ingredients = ?, stock_price = ?, stock_cost_price = ?, stock_qty = ?, stock_target_min_qty = ?, stock_supplier = ?, stock_supplier_order_code = ?, stock_category_id = ?, stock_bar_code = ? WHERE stock_id = ?"
        //$sql .= " WHERE stock_id = ".ltrim(cleanInput($_POST['html_stock_id']), '0').";";
      //echo "SQL completed.<br>".PHP_EOL;
        
        // Prepare sql statement
        $statement = $conn->prepare($sql);
        //$success = $conn->query($sql);
      echo "SQL prepared. ".$sql."<br>".PHP_EOL;
        $statement->bind_param("ssssddiissisi", cleanInput($_POST['html_stock_name']), cleanInput($_POST['html_stock_description']), cleanInput($_POST['html_stock_directions']), cleanInput($_POST['html_stock_ingredients']), cleanInput($_POST['html_stock_price']), cleanInput($_POST['html_stock_cost_price']), cleanInput($_POST['html_stock_qty']), cleanInput($_POST['html_stock_target_min_qty']), cleanInput($_POST['html_stock_supplier']), cleanInput($_POST['html_stock_supplier_order_code']), cleanInput($_POST['html_stock_category_id']), cleanInput($_POST['html_stock_bar_code']), cleanInput($_POST['html_stock_id']));
      //echo cleanInput($_POST['html_stock_id']).".<br>".PHP_EOL;
      //echo cleanInput($_POST['html_stock_name']).".<br>".PHP_EOL;
      //echo cleanInput($_POST['html_stock_description']).".<br>".PHP_EOL;
        
        // create bindinds to place holders.
        //$statement->bindValue(':stock_id', cleanInput($_POST['html_stock_id']));
        //$statement->bindValue(':stock_name', cleanInput($_POST['html_stock_name']));
        //$statement->bindValue(':stock_description', cleanInput($_POST['html_stock_description']));
      //echo "Statement value binding completed.<br>".PHP_EOL;
        //$statement->bindValue(':', cleanInput($_POST['']));
        // Send update query to database, store results in $success.
        $success = $statement->execute();
      }
      //echo "SQL Statement executed.<br>".PHP_EOL;
      catch(PDOEXCEPTION $e){
        // Display error message details
        echo 'Error updating stock item details: '.$e->getMessage();
        // Stop running script
        exit();
      }
      echo "SQL section completed.<br>".PHP_EOL;
      echo "Success = ".$success.".<br>".PHP_EOL;
      // Create user feedback messages for success or failure to update.
      if ($success) {
        echo '<script type="text/javascript">alert("Successfully updated stock item details.");</script>';
      }
      else {
        echo '<script type="text/javascript">alert("Failed to update stock item details.");</script>';
      }
      echo "Success test completed.<br>".PHP_EOL;
      $conn->close();
    }
  }
?>
