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

  function getSale($sale_id) {
    // Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

    // SQL to select all fields from the stock table, matching the specified stock_id.
    // New Select
    $saleSQL = <<<SQL
    SELECT sale_id, sale_datetime, orderline_stock_id, stock_name, orderline_qty, orderline_price, orderline_qty * orderline_price AS subtotal FROM `sales`
    INNER JOIN orderlines ON sale_id = orderline_sale_id 
    INNER JOIN stock ON stock_id = orderline_stock_id
    WHERE sale_id = 000001
SQL;
    /* */
    // Old Select
    /* $saleSQL = <<<SQL
    select sale_id, sale_datetime, ol.orderline_stock_id, st.stock_name, ol.orderline_qty, ol.orderline_price, SUM(ol.orderline_price*ol.orderline_qty) "total" FROM sales sl
    INNER JOIN orderlines ol ON ol.orderline_sale_id = sl.sale_id
    INNER JOIN stock st ON st.stock_id = ol.orderline_stock_id 
    WHERE sale_id = $sale_id
    GROUP BY sale_id, ol.orderline_stock_id
SQL;
    /* */
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
    //if ($result->num_rows > 1) echo "Too many results";

    /*
    foreach ($finfo as $val){
        for ($x = 0; $x <= $val->max_length; $x++) {
            print($row['sale_id']);
            //$php_sale_id[$x++]         = $row['orderline_stock_id'];
        } 
    }
     while ($row = mysqli_fetch_assoc($result)){

        foreach (mysqli_fetch_lengths($result) as $i => $val) {
            $php_sale_id[$i] = $row['orderline_stock_id'];
       
    }
            
    }
    foreach( $php_sale_id as $index => $php_sale_id ) {
       print($php_sale_id.$php_sale_name[$index]);
    }
    */
    $php_orderline_total[$index] = 0;
    while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
      $php_sale_id[$index] = $row['orderline_stock_id'];
      $php_sale_name[$index] = $row['stock_name'];
      $php_orderline_qty[$index] = $row['orderline_qty'];
      $php_orderline_price[$index] = $row['orderline_price'];
      $php_orderline_subtotal[$index] = $row['subtotal'];
      $php_orderline_total[$index] += $row['subtotal'];
      $index++;
    }

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
