<?php
  $debug = true;
  // $debug = false;
  function mysql_escape_mimic($inp) {
    if(is_array($inp))
        return array_map(__METHOD__, $inp);

    if(!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }

    return $inp;
  }
  // Function to clean data for pushing to the database.
  function cleanInput($input) {
    //echo "Cleaning $input.<br>".PHP_EOL;
    //$input = $conn->real_escape_string($input);
    $input = mysql_escape_mimic($input);
    return htmlspecialchars(stripslashes(trim($input)));
  }

  // Function to retreive stock item id list and return them to the web interface.
  function get_ID_list(){
    // Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

    try{
      // SQL to select stock_id's from the Stock Database;
      $sql = "SELECT stock_id FROM stock ORDER BY stock_id ASC;";
      // Query the database to acquire results and hand them to resultSet
      $result = $conn->query($sql);
    }
    catch(Exception $e){
      // Display error message details
      echo 'Error fetching list of stock IDs: '.$e->errorMessage();
      // Stop running script
      exit();
    }
    $php_id_list = '';
    // See if there are results to process.
    if ($result->num_rows > 0) {
      // work through each row returned, add to the option list for selection.
      foreach ($result as $row) {
        $php_id_list .= '<option value="'.$row['stock_id'].'">'.$row['stock_id'].'</option>';
      }
      echo $php_id_list.PHP_EOL;
    }
    else {
      echo "0 results";
    }
    // Close connection to database.
    $conn->close();
  }
  
  // Function to retreive stock item details including category name and returns as an array.
  function get_stock($php_stock_id) {
    // Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

    // SQL to select all fields from the stock table, matching the specified stock_id.
    $sql = <<<SQL
      SELECT stock.*, categories.category_name 
      FROM stock 
      LEFT JOIN categories ON stock.stock_category_id = categories.category_id  
      WHERE stock_id = $php_stock_id
SQL;
  
    try{
      // Query the database to acquire results and hand them to resultSet
      $result = $conn->query($sql);
    }
    catch(Exception $e){
      // Display error message details
      echo 'Error fetching stock item details: '.$e->errorMessage();
      // Stop running script
      exit();
    }

    if ($result->num_rows == 0) echo "0 results";
    if ($result->num_rows > 1) echo "Too many results";

    $row = $result->fetch_assoc();

    $php_stock = array();
    $php_stock['id']                  = $row['stock_id'];
    $php_stock['name']                = $row['stock_name'];
    $php_stock['description']         = $row['stock_description'];
    $php_stock['directions']          = $row['stock_directions'];
    $php_stock['ingredients']         = $row['stock_ingredients'];
    $php_stock['price']               = $row['stock_price'];
    $php_stock['cost_price']          = $row['stock_cost_price'];
    $php_stock['qty']                 = $row['stock_qty'];
    $php_stock['target_min_qty']      = $row['stock_target_min_qty'];
    $php_stock['supplier']            = $row['stock_supplier'];
    $php_stock['supplier_order_code'] = $row['stock_supplier_order_code'];
    $php_stock['category_id']         = $row['stock_category_id'];    
    $php_stock['category_name']       = $row['category_name'];
    $php_stock['barcode']             = $row['stock_barcode'];

    // Close connection to database.
    $conn->close();
    // return stock item details to calling section. Should be the Web Interface.
    return $php_stock;
  }
  
  function add_stock($php_stock) {
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

    foreach($php_stock as $key => $value) {
        $value = cleanInput($value);
    }
  
    $php_stock_name           = isset($php_stock["html_stock_name"])                ? $php_stock["html_stock_name"]                : "";
    $php_stock_description    = isset($php_stock["html_stock_description"])         ? $php_stock["html_stock_description"]         : "";
    $php_stock_directions     = isset($php_stock["html_stock_directions"])          ? $php_stock["html_stock_directions"]          : "";
    $php_stock_ingredients    = isset($php_stock["html_stock_ingredients"])         ? $php_stock["html_stock_ingredients"]         : "";
    $php_stock_price          = isset($php_stock["html_stock_price"])               ? $php_stock["html_stock_price"]               : "";
    $php_stock_cost_price     = isset($php_stock["html_stock_cost_price"])          ? $php_stock["html_stock_cost_price"]          : "";
    $php_stock_qty            = isset($php_stock["html_stock_qty"])                 ? $php_stock["html_stock_qty"]                 : "";
    $php_stock_target_min_qty = isset($php_stock["html_stock_target_min_qty"])      ? $php_stock["html_stock_target_min_qty"]      : "";
    $php_stock_supplier       = isset($php_stock["html_stock_supplier"])            ? $php_stock["html_stock_supplier"]            : "";
    $php_stock_supplier_code  = isset($php_stock["html_stock_supplier_order_code"]) ? $php_stock["html_stock_supplier_order_code"] : "";
    $php_stock_category_id    = isset($php_stock["html_stock_category_id"])         ? $php_stock["html_stock_category_id"]         : "";
    $php_stock_barcode        = isset($php_stock["html_stock_barcode"])             ? $php_stock["html_stock_barcode"]             : "";
    
    $sqltable = "stock";
    
    $sql = <<<SQL
      INSERT INTO $sqltable (
        stock_name,
        stock_description,
        stock_directions,
        stock_ingredients,
        stock_price,
        stock_cost_price,
        stock_qty,
        stock_target_min_qty,
        stock_supplier,
        stock_supplier_order_code,
        stock_category_id,
        stock_barcode
      ) VALUES (
        '$php_stock_name',
        '$php_stock_description',
        '$php_stock_directions',
        '$php_stock_ingredients',
        '$php_stock_price',
        '$php_stock_cost_price',
        '$php_stock_qty',
        '$php_stock_target_min_qty',
        '$php_stock_supplier',
        '$php_stock_supplier_code',
        '$php_stock_category_id',
        '$php_stock_barcode'
      )
SQL;

    try{
      // Query the database to acquire results and hand them to resultSet
      $result = $conn->query($sql);
    }
    catch(Exception $e){
      // Display error message details
      echo 'Error inserting stock item details: '.$e->errorMessage();
      // Stop running script
      exit();
    }  
    
    $php_new_stock_id = mysqli_insert_id($conn);

    // Close connection to database.
    $conn->close();
    // return stock item details to calling section.
    return $php_new_stock_id;
  }

  // Function to update a stock item.
  function update_stock($php_stock) {
  //function update_stock() {
    //mysqli_query($conn , "UNLOCK TABLES;");
    if ($GLOBALS['debug']) echo "update_stock() called.".mysql_escape_mimic($_POST['html_stock_supplier'])."<br>".PHP_EOL;

    //function do_alert($msg) 
    //{
      //echo '<script type="text/javascript">alert("update_stock() called.");</script>'.PHP_EOL;
    //}
    //{  
    //echo "Update Stock Called<br>".PHP_EOL;
    //echo "'<script type="text/javascript">alert("'Stock'"); </script>';".PHP_EOL;
     //  }
  /*
    foreach($php_stock as $key => $value) {
      $value = cleanInput($value);
    }
    //echo '<script type="text/javascript">alert("foreach cleanInput completed.");</script>'.PHP_EOL;
  
    $php_stock_id             = isset($php_stock["html_stock_id"])                  ? $php_stock["html_stock_id"]                  : "";
    $php_stock_name           = isset($php_stock["html_stock_name"])                ? $php_stock["html_stock_name"]                : "";
    $php_stock_description    = isset($php_stock["html_stock_description"])         ? $php_stock["html_stock_description"]         : "";
    $php_stock_directions     = isset($php_stock["html_stock_directions"])          ? $php_stock["html_stock_directions"]          : "";
    $php_stock_ingredients    = isset($php_stock["html_stock_ingredients"])         ? $php_stock["html_stock_ingredients"]         : "";
    $php_stock_price          = isset($php_stock["html_stock_price"])               ? $php_stock["html_stock_price"]               : "";
    $php_stock_cost_price     = isset($php_stock["html_stock_cost_price"])          ? $php_stock["html_stock_cost_price"]          : "";
    $php_stock_qty            = isset($php_stock["html_stock_qty"])                 ? $php_stock["html_stock_qty"]                 : "";
    $php_stock_target_min_qty = isset($php_stock["html_stock_target_min_qty"])      ? $php_stock["html_stock_target_min_qty"]      : "";
    $php_stock_supplier       = isset($php_stock["html_stock_supplier"])            ? $php_stock["html_stock_supplier"]            : "";
    $php_stock_supplier_code  = isset($php_stock["html_stock_supplier_order_code"]) ? $php_stock["html_stock_supplier_order_code"] : "";
    $php_stock_category_id    = isset($php_stock["html_stock_category_id"])         ? $php_stock["html_stock_category_id"]         : "";
    $php_stock_barcode        = isset($php_stock["html_stock_barcode"])             ? $php_stock["html_stock_barcode"]             : "";
    */
    //echo '<script type="text/javascript">alert("SQL variables assigned.");</script>'.PHP_EOL;

    $sqltable = "stock";
    //echo '<script type="text/javascript">alert("sqltable set.");</script>'.PHP_EOL;
/*
    $sql = <<<SQL
      UPDATE $sqltable 
      SET    stock_name                = '$php_stock_name',
             stock_description         = '$php_stock_description',
             stock_directions          = '$php_stock_directions',
             stock_ingredients         = '$php_stock_ingredients',
             stock_price               = '$php_stock_price',
             stock_cost_price          = '$php_stock_cost_price',
             stock_qty                 = '$php_stock_qty',
             stock_target_min_qty      = '$php_stock_target_min_qty',
             stock_supplier            = '$php_stock_supplier',
             stock_supplier_order_code = '$php_stock_supplier_code',
             stock_category_id         = '$php_stock_category_id',
             stock_barcode             = '$php_stock_barcode'
      WHERE  stock_id                  = '$php_stock_id';
SQL; */
    $php_stock_name           = mysql_escape_mimic($_POST['html_stock_name']);
    $php_stock_description    = mysql_escape_mimic($_POST['html_stock_description']);
    $php_stock_directions     = mysql_escape_mimic($_POST['html_stock_directions']);
    $php_stock_ingredients    = mysql_escape_mimic($_POST['html_stock_ingredients']);
    $php_stock_price          = mysql_escape_mimic($_POST['html_stock_price']);
    $php_stock_cost_price     = mysql_escape_mimic($_POST['html_stock_cost_price']);
    $php_stock_qty            = mysql_escape_mimic($_POST['html_stock_qty']);
    $php_stock_target_min_qty = mysql_escape_mimic($_POST['html_stock_target_min_qty']);
    $php_stock_supplier       = mysql_escape_mimic($_POST['html_stock_supplier']);
    $php_stock_supplier_code  = mysql_escape_mimic($_POST['html_stock_supplier_code']);
    $php_stock_category_id    = mysql_escape_mimic($_POST['html_stock_category_id']);
    $php_stock_barcode        = mysql_escape_mimic($_POST['html_stock_barcode']);
    $php_stock_id             = mysql_escape_mimic($_POST['html_stock_id']);
    /*
    $sql = <<<SQL
      UPDATE $sqltable 
      SET    stock_name='$php_stock_name',
             stock_description='$php_stock_description',
             stock_directions='$php_stock_directions',
             stock_ingredients='$php_stock_ingredients',
             stock_price='$php_stock_price',
             stock_cost_price='$php_stock_cost_price',
             stock_qty='$php_stock_qty',
             stock_target_min_qty='$php_stock_target_min_qty',
             stock_supplier='$php_stock_supplier',
             stock_supplier_order_code='$php_stock_supplier_code',
             stock_category_id='$php_stock_category_id',
             stock_barcode='$php_stock_barcode'
      WHERE  stock_id=$php_stock_id;
SQL; /* */
    $sql = "UPDATE $sqltable SET stock_name='$php_stock_name',";
    $sql .= " stock_description='$php_stock_description',";
    $sql .= " stock_directions='$php_stock_directions',";
    $sql .= " stock_ingredients='$php_stock_ingredients',";
    $sql .= " stock_price='$php_stock_price',";
    $sql .= " stock_cost_price='$php_stock_cost_price',";
    $sql .= " stock_qty='$php_stock_qty',";
    $sql .= " stock_target_min_qty='$php_stock_target_min_qty',";
    $sql .= " stock_supplier='$php_stock_supplier',";
    $sql .= " stock_supplier_order_code='$php_stock_supplier_code',";
    $sql .= " stock_category_id='$php_stock_category_id',";
    $sql .= " stock_barcode='$php_stock_barcode'";
    $sql .= " WHERE stock_id=$php_stock_id;";
    //echo '<script type="text/javascript">alert("SQL Statment assembled.");</script>'.PHP_EOL;
    echo "Stock Id: ".$_POST['html_stock_id']."<br> SQL: ".$sql.'<br>'.PHP_EOL;
    
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';
    //echo '<script type="text/javascript">alert("connected with database.");</script>'.PHP_EOL;
    /*
    try{
      // Query the database to acquire results and hand them to resultSet
      $result = $conn->query($sql);
    }
    //catch(PDOEXCEPTION $e){
    catch(Exception $e) { 
      // Display error message details
      //echo 'Error updating stock item details: '.$e->getMessage();
      echo 'Error updating stock item details: '.$e->errorMessage();

      // Stop running script
      exit();
    } */ 
    //echo '<script type="text/javascript">alert("sql result processing finished.");</script>'.PHP_EOL;
    //$success = false;
    // if ($result != 1){
    //   $success = false;
    //   echo '$result: '.$result.'<br>'.PHP_EOL;
    //   echo '$conn->info: ' . $conn->info . '<br>'.PHP_EOL;
    //   echo '$conn->affected_rows: '.$conn->affected_rows.'<br>'.PHP_EOL;
    // }
    
    //if ($result->num_rows == 0) $success = false;
    //if ($result->num_rows > 1) $success = false;
    //if ($result == "" ) $success = false;

    //if ($result->affected_rows == 1) $success = true;
    //if ($result == 1) $success = true;

    if ($conn->query($sql) === true) {
      echo "Record updated successfully";
      $success = true;
    }
    else {
      echo "Error updating record: (" . $mysqli->connect_errno . ") " . $conn->connect_error . PHP_EOL;
      $success = false;
    }
    
    // Close connection to database.
    //$conn->close();
    return $success;
  }

  function get_cat_list($val = ""){
    // Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

    try{
      // SQL to select stock_id's from the Stock Database;
      $sql = "SELECT category_id, category_name FROM categories ORDER BY category_id ASC;";
      // Query the database to acquire results and hand them to resultSet
      $result = $conn->query($sql);
    }
    catch(Exception $e){
      // Display error message details
      echo 'Error fetching list of stock IDs: '.$e->errorMessage();
      // Stop running script
      exit();
    }
    $php_cat_list = '';
    // See if there are results to process.
    if ($result->num_rows > 0) {
      // work through each row returned, add to the option list for selection.
      foreach ($result as $row) {
        if ($val != "" && $val == $row['category_id']) {
          $php_cat_list .= '                  <option value="'.$row['category_id'].'" selected>'.$row['category_name'].'</option>'.PHP_EOL;
        } else {
          $php_cat_list .= '                  <option value="'.$row['category_id'].'">'.$row['category_name'].'</option>'.PHP_EOL;
        }
      }
      echo $php_cat_list;
    }
    else {
      echo "0 results";
    }
    // Close connection to database.
    //$conn->close();
  }
?>
