<?php
//include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/head.php';

include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';
  


session_start();

if(isset($_SESSION["datepicker"]) && isset($_SESSION["datepicker1"])){


$select = "select sale_id, sale_datetime, ol.orderline_stock_id, st.stock_name, ol.orderline_qty, ol.orderline_price FROM sales sl
INNER JOIN orderlines ol ON ol.orderline_sale_id = sl.sale_id
INNER JOIN stock st ON st.stock_id = ol.orderline_stock_id WHERE sale_datetime >= '".$_SESSION["datepicker"]."' AND sale_datetime < '".$_SESSION["datepicker1"]."'";

$result = $conn->query($select);




    function stockExport($result){
      $f = fopen('php://temp', 'wt');
      $first = true;
      while ($row = $result->fetch_assoc()) {
        if ($first) {
          fputcsv($f, array_keys($row));
          $first = false;
        }
        fputcsv($f, $row);
      }

      $size = ftell($f);
      date_default_timezone_set('australia/melbourne');
      $date = date("Y-m-d");
      rewind($f);
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("Content-Length: $size");
      header("Content-type: text/x-csv");
      header("Content-type: text/csv");
      header("Content-type: application/csv");
      header("Content-Disposition: attachment; filename=Sales-from-".$_SESSION["datepicker"]."-to-".$_SESSION["datepicker1"].".csv");
      fpassthru($f);
      exit;
    }
}


if (!$conn) {

  echo "<p> Database connection failure</p>";
}
else {
  if(!$result) {
    echo("Error description: " . mysqli_error($conn));
  }
else {
stockExport($result);


  }
}
$conn->close();

//include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>