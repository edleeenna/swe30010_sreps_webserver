<?php
  function getSaleID(){
    // Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

    try{
      // SQL to select stock_id's from the Stock Database;
      $sql = "SELECT sale_id FROM sales ORDER BY sale_id ASC;";
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
    // See if there are results to process.
    if ($result->num_rows > 0) {
      // work through each row returned, add to the option list for selection.
      foreach ($result as $row) {
        $php_id_list .= '<option value="'.$row['sale_id'].'">'.$row['sale_id'].'</option>';
      }
      echo $php_id_list."<br>".PHP_EOL;
    }
    else {
        echo "0 results";
    }
    // Close connection to database.
    $conn->close();
  }

  function getOrderlines($sale_id) {
    // Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

    // SQL to select all fields from the stock table, matching the specified stock_id.
    $sql = <<<SQL
    SELECT orderlines.orderline_stock_id, stock.stock_name, orderlines.orderline_qty, orderlines.orderline_price, orderlines.orderline_qty * orderlines.orderline_price AS orderline_total 
    FROM orderlines 
    INNER JOIN stock ON stock.stock_id = orderlines.orderline_stock_id
    WHERE orderlines.orderline_sale_id = $sale_id
SQL;
   
    try{
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

    $php_sale = array();
    
 	if($result->num_rows > 0) {
	    while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
	      $php_stock_id[] = $row['orderline_stock_id'];
	      $php_stock_name[] = $row['stock_name'];
	      $php_orderline_qty[] = $row['orderline_qty'];
	      $php_orderline_price[] = $row['orderline_price'];
	      $php_orderline_subtotal[] = $row['orderline_total'];
	    }
	   
	    $php_sale['orderline_stock_id']  = $php_stock_id;
	    $php_sale['stock_name']          = $php_stock_name;
	    $php_sale['orderline_qty']       = $php_orderline_qty;
	    $php_sale['orderline_price']     = $php_orderline_price;
	    $php_sale['orderline_total']     = $php_orderline_subtotal;
	}
    // Close connection to database.
    $conn->close();
    // return stock item details to calling section. Should be the Web Interface.
    return $php_sale;
  }
?>
