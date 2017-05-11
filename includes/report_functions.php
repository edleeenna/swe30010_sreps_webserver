<?php
  function getSalesReport($start_date, $end_date) {
    // Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';
    // SQL to select all fields from the stock table, matching the specified stock_id.
    // New Select
    $saleSQL = <<<SQL
    SELECT sale_datetime, orderline_stock_id, orderline_qty, (orderline_qty * orderline_price) as subtotal FROM orderlines
    INNER JOIN sales ON orderline_sale_id = sale_id
    WHERE sale_datetime >= $start_date AND sale_datetime <= DATE_ADD($end_date, INTERVAL 1 DAY) ORDER BY sale_datetime, orderline_stock_id
SQL;

    try{
        // Query the database to acquire results and hand them to resultSet
        $result = mysqli_query($conn, $saleSQL);
    }
    catch(PDOEXCEPTION $e){
      // Display error message details
      echo 'Error fetching stock item details: '.$e->getMessage();
      // Stop running script
      exit();
    }
    if ($result->num_rows == 0) echo "0 results";

    $php_orderline_total[$index] = 0;
    while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
      $php_sale_id[$index] = $row['orderline_stock_id'];
      $php_sale_name[$index] = $row['stock_name'];
      $php_report_qty[$index] = $row['orderline_qty'];
      $php_report_price[$index] = $row['orderline_price'];
      $php_report_subtotal[$index] = $row['subtotal'];
      $php_report_total[$index] += $row['subtotal'];
      $php_report_grand_total[$index] += $row['total'];
      $index++;
    }
    //sale_datetime, orderline_stock_id, orderline_qty, subtotal
    $sale = $conn->query($saleSQL);
    $row = $sale->fetch_assoc();
    $php_sale = array();
    //print($php_sale_id);
    $php_sale['sale_id']             = $row['sale_id'];
    $php_sale['sale_datetime']       = $row['sale_datetime'];
    $php_sale['orderline_stock_id']  = $php_sale_id;
    $php_sale['stock_name']          = $php_sale_name;
    $php_sale['orderline_qty']       = $php_orderline_qty;
    $php_sale['orderline_price']     = $php_orderline_price;
    $php_sale['orderline_subtotal']  = $php_orderline_subtotal;
    $php_sale['orderline_total']     = $php_orderline_total;
    // Close connection to database.
    $conn->close();
    // return stock item details to calling section. Should be the Web Interface.
    return $php_sale;
  }
?>
