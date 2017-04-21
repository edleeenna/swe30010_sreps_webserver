<?php
  // Function to clean data for pushing to the database.
  function cleanInput($input) {
    //echo "Cleaning $input.<br>".PHP_EOL;
    return htmlspecialchars(stripslashes(trim($input)));
  }

  function get_ID_list(){
    // Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

    try{
      // SQL to select stock_id's from the Stock Database;
      $sql = "SELECT stock_id, stock_name FROM stock ORDER BY stock_id ASC;";
      // Query the database to acquire results and hand them to resultSet
      $result = $conn->query($sql);
    }
    catch(PDOEXCEPTION $e){
      // Display error message details
      echo 'Error fetching list of stock IDs: '.$e->getMessage();
      // Stop running script
      exit();
    }
    $php_id_list = '';
    $php_name_list = '';
    // See if there are results to process.
    if ($result->num_rows > 0) {
      // work through each row returned, add to the option list for selection.
      foreach ($result as $row) {
        $php_id_list .= '<option value="'.$row['stock_id'].'">'.$row['stock_id'].'</option>';
        $php_name_list .= '<option value="'.$row['stock_name'].'">'.$row['stock_name'].'</option>';
      }
      echo $php_id_list."<br>".PHP_EOL;
      echo "</select>".PHP_EOL;
      echo '<select class="browser-default" name="html_selected_name">'.PHP_EOL;
      echo $php_name_list."<br>".PHP_EOL;
    }
    else {
      echo "0 results";
    }
    // Close connection to database.
    $conn->close();
  }

  // Function to retreive stock item details and return them to the web interface.
  function get_stock_item_details($php_stock_id) {
    // Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

    try{
      // SQL to select all fields from the stock table, matching the specified stock_id.
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

    if ($result->num_rows == 0) echo "0 results";
    if ($result->num_rows > 1) echo "Too many results";

    $row = $result->fetch_assoc();

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

    // Close connection to database.
    $conn->close();
    // return stock item details to calling section. Should be the Web Interface.
    return $php_stock_details;
  }

  // Function to update a stock item.
  function update_stock() {
    //Only run if Update Stock Item has been clicked.
    if (isset($_POST['html_item_update'])) {
      // Connect to the database.
      include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

      try{
        // SQL to update the record that matches the stock_id;
        $sql = "UPDATE stock SET stock_name = ?, stock_description = ?, stock_directions = ?, stock_ingredients = ?, stock_price = ?,";
        $sql .= " stock_cost_price = ?, stock_qty = ?, stock_target_min_qty = ?, stock_supplier = ?, stock_supplier_order_code = ?,";
        $sql .= " stock_category_id = ?, stock_bar_code = ? WHERE stock_id = ?";
        
        // Prepare sql statement
        $statement = $conn->prepare($sql);
        
        // Bind parameters to statement.
        $statement->bind_param('ssssddiissisi', cleanInput($_POST['html_stock_name']), cleanInput($_POST['html_stock_description']),
                               cleanInput($_POST['html_stock_directions']), cleanInput($_POST['html_stock_ingredients']),
                               cleanInput($_POST['html_stock_price']), cleanInput($_POST['html_stock_cost_price']), 
                               cleanInput($_POST['html_stock_qty']), cleanInput($_POST['html_stock_target_min_qty']), 
                               cleanInput($_POST['html_stock_supplier']), cleanInput($_POST['html_stock_supplier_order_code']), 
                               cleanInput($_POST['html_stock_category_id']), cleanInput($_POST['html_stock_bar_code']), 
                               cleanInput($_POST['html_stock_id']));
        // Execute statement and save result in success.
        $success = $statement->execute();
      }
      catch(PDOEXCEPTION $e){
        // Display error message details
        echo 'Error updating stock item details: '.$e->getMessage();
        // Stop running script
        exit();
      }

      // Create user feedback messages for success or failure to update.
      if ($success) {
        echo '<script type="text/javascript">alert("Successfully updated stock item details.");</script>';
      }
      else {
        echo '<script type="text/javascript">alert("Failed to update stock item details.");</script>';
      }
      // Close connection to the database.
      $conn->close();
    }
  }

  function get_limited_stock_list() {
    // Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

    try{
      // SQL to select stock_id's from the Stock Database;
      $sql = "SELECT stock_id, stock_name, stock_price, stock_cost_price, stock_qty, stock_target_min_qty FROM stock ORDER BY stock_id ASC;";
      // Query the database to acquire results and hand them to resultSet
      $result = $conn->query($sql);
    }
    catch(PDOEXCEPTION $e){
      // Display error message details
      echo 'Error fetching list of stock IDs: '.$e->getMessage();
      // Stop running script
      exit();
    }
    $php_row_list = '';
    // See if there are results to process.
    if ($result->num_rows > 0) {
      // work through each row returned, add to the option list for selection.
      foreach ($result as $row) {
        $php_row_list .= '      <div class="TR" id="'.$row['stock_id'].'">';
        //$php_row_list .= '<div class="TC" name="stock_id">ID: '.$row['stock_id'].'</div>';
        //$php_row_list .= '<div class="TC" name="stock_name" contenteditable="true">Name: '.$row['stock_name'].'</div>';
        //$php_row_list .= '<div class="TC" name="stock_price" contenteditable="true">Price: '.$row['stock_price'].'</div>';
        //$php_row_list .= '<div class="TC" name="stock_cost_price" contenteditable="true">Cost Price: '.$row['stock_cost_price'].'</div>';
        //$php_row_list .= '<div class="TC" name="stock_qty" contenteditable="true">Quantity: '.$row['stock_qty'].'</div>';
        //$php_row_list .= '<div class="TC" name="stock_target_min_qty" contenteditable="true">Target Minimum Qantity: '.$row['stock_target_min_qty'].'</div>';
        $php_row_list .= '<div class="TCL">ID:</div><div class="TCR" name="stock_id">'.$row['stock_id'].'</div>';
        $php_row_list .= '<div class="TCL">Name:</div><div class="TCR" name="stock_name" contenteditable="true" onfocus="focusgain(this);" onblur="focusgone(this);">'.$row['stock_name'].'</div>';
        $php_row_list .= '<div class="TCL">Price:</div><div class="TCR" name="stock_price" contenteditable="true">'.$row['stock_price'].'</div>';
        $php_row_list .= '<div class="TCL">Cost Price:</div><div class="TCR" name="stock_cost_price" contenteditable="true">'.$row['stock_cost_price'].'</div>';
        $php_row_list .= '<div class="TCL">Quantity:</div><div class="TCR" name="stock_qty" contenteditable="true">'.$row['stock_qty'].'</div>';
        $php_row_list .= '<div class="TCL">Target Minimum Qantity:</div><div class="TCR" name="stock_target_min_qty" contenteditable="true">'.$row['stock_target_min_qty'].'</div>';
        $php_row_list .= '</div><br>'.PHP_EOL;
      }
      echo $php_row_list;
    }
    else {
      echo "0 results";
    }
    // Close connection to database.
    $conn->close();
  }
?>
