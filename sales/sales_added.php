<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Sale Added";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder.
  //$extra_css = "";

  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  //$extra_js = "";

  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/head.php';
/*
  <body>
*/
?>
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
?>
</nav>

<main>
<div class="container">

<?php
/*
  </body>
*/
 if (isset ($_POST["html_sales_datetime"])){
    $salesDateTime = $_POST["html_sales_datetime"];
  }
  
  if (isset ($_POST["html_stock_orderlines_id"])){
    $stockId = $_POST["html_stock_orderlines_id"];
  }
  
  if (isset ($_POST["html_rderlines_qty"])){
    $saleQty = $_POST["html_orderlines_qty"];
  }
  if (isset ($_POST["html_orderlines_price"])){
    $salePrice = $_POST["html_orderlines_price"];
  }
  
  
  

  include $_SERVER[ 'DOCUMENT_ROOT' ]. "/includes/db_connect.php";

    $salesInsertQuery = "INSERT INTO sales (sale_datetime) VALUES ('$salesDateTime')";
  
    $salesInsertResult = mysqli_query($conn, $salesInsertQuery);  
  
    $selectSalesId = "SELECT `sale_id` FROM `sales` WHERE `sale_datetime` = '$salesDateTime' ";
    
    $salesId = mysqli_query($conn, $selectSalesId);
    
    $orderlinesInsert = "INSERT INTO orderlines (orderline_sale_id, orderline_stock_id, orderline_qty, orderline_price) VALUES('$salesId', '$stockId', '$saleQty', '$salePrice' )";
          //insert sale into database
    
   // $orderlinesResult = mysqli_query($conn, $orderlinesInsert);
    
  if (!$conn) {
    echo "<p> Database connection failure</p>";
  }
  else {
     if(!$salesInsertResult ) {
      echo("Error description: " . mysqli_error($conn));
    
    }

    else {
      echo "<p> Successfully added sale to database! </p>";
      echo "<p>Sale Date/Time: ". $salesDateTime. "</p>";
    }
  }
      mysqli_close($conn);
  echo "</div>";
echo "</main>";
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
  
?>
