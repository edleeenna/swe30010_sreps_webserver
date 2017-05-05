<?php
  // Whilst debug can be set here... it is best to set it in individual pages
  // so that other working pages are not affected.
  // $debug = true;
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
    //$input = mysql_escape_mimic($input);
    return htmlspecialchars(stripslashes(trim($input)));
  }

  // executes a sql quesry to the database a returns a result
 function execute_query($sql) {
    // Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

	 try{
      // Query the database to acquire results and hand them to resultSet
      $rs = $conn->query($sql);
    }
    catch(Exception $e){
      // Display error message details
      echo 'Error fetching list of stock IDs: '.$e->errorMessage();
      // Stop running script
      exit();
    }
	
	$result = new stdClass();
	$result->result = $rs;
	$result->insert_id = mysqli_insert_id($conn);
	
	return $result;
 } 

 // Gets all the stock item ids from the database
   function get_ID_list(){
      $sql = <<<SQL
	  SELECT stock_id 
	  FROM stock 
	  ORDER BY stock_id ASC
SQL;
      
    $result = execute_query($sql)->result;

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
  }

  // Converts the database column title to a more readable form
  function get_column_name($val) {
    switch ($val) {
	  case "stock_id":
	    return "ID";
      case "stock_name":
	    return "Name";
      case "stock_description":
	    return "Description";
      case "stock_directions":
	    return "Directions";
      case "stock_ingredients":
	    return "Ingredients";
      case "stock_price":
	    return "Price ($)";
      case "stock_cost_price":
	    return "Cost Price ($)";
      case "stock_qty":
	    return "Quantity";
      case "stock_target_min_qty":
	    return "Minimum Quantity";
      case "stock_supplier":
	    return "Supplier";
      case "stock_supplier_order_code":
	    return "Order Code";
      case "stock_category_id":
	    return "Category ID";
      case "stock_barcode":
	    return "Barcode";
	  case "category_name":
	    return "Category";
	  default:
	    return "UNDEFINED";
	  }
  }
  
  // Gets all the stock items from the database
  // Also returns the category name of each stock item
  function get_all_stock() {
    // SQL to select all fields from the stock table, matching the specified stock_id.
    $sql = <<<SQL
      SELECT stock.*, categories.category_name
      FROM stock 
      LEFT JOIN categories ON stock.stock_category_id = categories.category_id  
SQL;
  
    $result = execute_query($sql)->result;

    if ($result->num_rows == 0) echo "0 results";

    // return stock item details to calling section. Should be the Web Interface.
    return $result;
  }
  
  // Gets all the stock items from the database with minimal columns
  // Also returns the category name of each stock item
  function get_all_stock_reduced() {
    // SQL to select all fields from the stock table, matching the specified stock_id.
    $sql = <<<SQL
      SELECT 
	    stock.stock_id,
		stock.stock_name,
		stock.stock_price,
		stock.stock_qty,
		stock.stock_supplier,
		categories.category_name
      FROM stock 
      LEFT JOIN categories ON stock.stock_category_id = categories.category_id  
SQL;
  
   $result = execute_query($sql)->result;
   
    if ($result->num_rows == 0) echo "0 results";

    // return stock item details to calling section. Should be the Web Interface.
    return $result;
  }
    
  // Gets a stock item from the database
  // Also returns the category name
  function get_stock($php_stock_id) {
    // SQL to select all fields from the stock table, matching the specified stock_id.
    $sql = <<<SQL
      SELECT stock.*, categories.category_name 
      FROM stock 
      LEFT JOIN categories ON stock.stock_category_id = categories.category_id  
      WHERE stock_id = $php_stock_id
SQL;
  
    $result = execute_query($sql)->result;

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

    // return stock item details to calling section. Should be the Web Interface.
    return $php_stock;
  }
 
  // Adds a stock item to the database 
  function add_stock($php_stock) {
    foreach($php_stock as $key => $value) {
        $value = cleanInput($value);
    }
  
    $php_stock_name =      isset($php_stock["html_stock_name"])                ? mysql_escape_mimic($php_stock["html_stock_name"])                : "";
    $php_stock_description = isset($php_stock["html_stock_description"])         ? mysql_escape_mimic($php_stock["html_stock_description"])         : "";
    $php_stock_directions =   isset($php_stock["html_stock_directions"])          ? mysql_escape_mimic($php_stock["html_stock_directions"])          : "";
    $php_stock_ingredients = isset($php_stock["html_stock_ingredients"])         ? mysql_escape_mimic($php_stock["html_stock_ingredients"])         : "";
    $php_stock_price =        isset($php_stock["html_stock_price"])               ? mysql_escape_mimic($php_stock["html_stock_price"])               : "";
    $php_stock_cost_price =  isset($php_stock["html_stock_cost_price"])          ? mysql_escape_mimic($php_stock["html_stock_cost_price"])          : "";
    $php_stock_qty =         isset($php_stock["html_stock_qty"])                 ? mysql_escape_mimic($php_stock["html_stock_qty"])                 : "";
    $php_stock_target_min_qty = isset($php_stock["html_stock_target_min_qty"])      ? mysql_escape_mimic($php_stock["html_stock_target_min_qty"])      : "";
    $php_stock_supplier = isset($php_stock["html_stock_supplier"])            ? mysql_escape_mimic($php_stock["html_stock_supplier"])            : "";
    $php_stock_supplier_code  = isset($php_stock["html_stock_supplier_order_code"]) ? mysql_escape_mimic($php_stock["html_stock_supplier_order_code"]) : "";
    $php_stock_category_id    = isset($php_stock["html_stock_category_id"])         ? mysql_escape_mimic($php_stock["html_stock_category_id"])         : "";
    $php_stock_barcode        = isset($php_stock["html_stock_barcode"])             ? mysql_escape_mimic($php_stock["html_stock_barcode"])             : "";

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

    $result = execute_query($sql)->insert_id;  
    
    // return stock item details to calling section.
    return $result;
  }

  // Updates a stock item in the database
  function update_stock($php_stock) {
   if (isset($GLOBALS['debug']) && ($GLOBALS['debug'])) echo "update_stock() called.".mysql_escape_mimic($_POST['html_stock_supplier'])."<br>".PHP_EOL;

    $sqltable = "stock";
	
	$php_stock_name           = mysql_escape_mimic(cleanInput($_POST['html_stock_name']));
    $php_stock_description    = mysql_escape_mimic(cleanInput($_POST['html_stock_description']));
    $php_stock_directions     = mysql_escape_mimic(cleanInput($_POST['html_stock_directions']));
    $php_stock_ingredients    = mysql_escape_mimic(cleanInput($_POST['html_stock_ingredients']));
    $php_stock_price          = mysql_escape_mimic(cleanInput($_POST['html_stock_price']));
    $php_stock_cost_price     = mysql_escape_mimic(cleanInput($_POST['html_stock_cost_price']));
    $php_stock_qty            = mysql_escape_mimic(cleanInput($_POST['html_stock_qty']));
    $php_stock_target_min_qty = mysql_escape_mimic(cleanInput($_POST['html_stock_target_min_qty']));
    $php_stock_supplier       = mysql_escape_mimic(cleanInput($_POST['html_stock_supplier']));
    $php_stock_supplier_code  = mysql_escape_mimic(cleanInput($_POST['html_stock_supplier_code']));
    $php_stock_category_id    = mysql_escape_mimic(cleanInput($_POST['html_stock_category_id']));
    $php_stock_barcode        = mysql_escape_mimic(cleanInput($_POST['html_stock_barcode']));
    $php_stock_id             = mysql_escape_mimic(cleanInput($_POST['html_stock_id']));

    $sql =<<<SQL
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
      WHERE  stock_id                  = $php_stock_id
SQL;

    
	$result = execute_query($sql)->result;
	
	if ($result)
        return $php_stock_id;
    else
		return 0;
  }

  function get_cat_list($val = ""){
    $sql =<<<SQL
      SELECT category_id, category_name 
      FROM categories 
      ORDER BY category_id ASC
SQL;
    
    $result = execute_query($sql)->result;
    
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
  }
  
  function get_category($val = ""){
    if (isset($GLOBALS['debug']) && ($GLOBALS['debug'])) echo "get_category(".$val.") called.<br>".PHP_EOL;

	 $sql =<<<SQL
	 SELECT category_name 
	 FROM categories 
	 WHERE category_id = $val
SQL;

     $result = execute_query($sql)->result;
    
	$php_returned_category = $result->fetch_assoc();
     
	 echo '<input readonly type="text" id="html_stock_catagory_id" name="html_stock_catagory_id" value="'.$php_returned_category['category_name'].'">';
  }

  function delete_stock_item($php_stock_id) {
    // Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

    // SQL to select all fields from the stock table, matching the specified stock_id.
    $sql = <<<SQL
      DELETE * FROM stock WHERE stock_id = $php_stock_id
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

    // Close connection to database.
    $conn->close();
    // return stock item details to calling section. Should be the Web Interface.
    return $php_stock;
  }
?>
