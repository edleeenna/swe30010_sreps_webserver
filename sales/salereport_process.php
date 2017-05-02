<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "View All Sales";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  $extra_css = array('tablecss.css','jquery-ui.css');
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  $extra_js = array("jquery-1.12.4.js", "jquery-ui.js", "display_sale.js");
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
      



<?php

if(isset($_GET['datepicker']) && isset($_GET['datepicker1'])){

date_default_timezone_set('australia/melbourne');
 // $datepicker = date('Y-m-d', strtotime($_GET['datepicker']));
  //$datepicker1 = date('Y-m-d', strtotime($_GET['datepicker1']));

$datepicker = $_GET['datepicker'];
$datepicker1 = $_GET['datepicker1'];



$datepicker1x = date('y/m/d',strtotime(str_replace('-', '/', $_GET['datepicker1']) . "+1 days"));


session_start();
$_SESSION["datepicker"] = $datepicker;
$_SESSION["datepicker1"] = $datepicker1x;

echo "<h2>List of Sales from ".$datepicker." to ".$datepicker1." </h1>";


//echo "<link rel='stylesheet' href='/resources/demos/style.css'>";
echo "<script>
  $( function() {
    $( '#datepicker' ).datepicker();
  } );
  </script>";
echo "<script>
  $( function() {
    $( '#datepicker1' ).datepicker();
  } );
  </script>";
 




include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';
$allSaleQuery = "select sale_id, sale_datetime, ol.orderline_stock_id, st.stock_name, ol.orderline_qty, ol.orderline_price FROM sales sl
INNER JOIN orderlines ol ON ol.orderline_sale_id = sl.sale_id
INNER JOIN stock st ON st.stock_id = ol.orderline_stock_id WHERE sale_datetime >= '".$datepicker."' AND sale_datetime < '".$datepicker1x."'";

//print($allSaleQuery);
$allSale = mysqli_query($conn, $allSaleQuery);

echo "<div id='selectdate' class='selectdate'>";
echo "<form method='get'>";
echo " Select date from &#9; <input type='text' id='datepicker' name='datepicker' class='j-datepicker' placeholder='Select' value=''>";
echo "&#9; to <input type='text' id='datepicker1' name='datepicker' class='j-datepicker' placeholder='Select' value=''>";
echo " &#9; <input type='button' id='submit' value='View Report' onClick='formValidation()' >";
echo "</form>";

/*
echo "<form method='post' action='saleexportprocess.php'>";
echo " <p><input type='submit' id='submit' value='Export to CSV'></p>";
echo "</form>";*/
echo "<br>";
echo "</div>";






echo "<table  class=\"striped\" border=\"1\">";
     echo "<tr>"
        ."<th scope=\"col\">Sale Id</th>"
        ."<th scope=\"col\">Sale Date</th>"
        ."<th scope=\"col\">Stock Id</th>"
        ."<th scope=\"col\">Stock Name</th>"
        ."<th scope=\"col\">Qty</th>"
        ."<th scope=\"col\">Price</th>"
        //."<th scope=\"col\">Total</th>"
        ."</tr>";

        while ($row = mysqli_fetch_assoc($allSale)) {


          echo "<tr>";
          echo "<td>", $row["sale_id"], "</td>";
          echo "<td>", $row["sale_datetime"], "</td>";
          echo "<td>", $row["orderline_stock_id"], "</td>";
          echo "<td>", $row["stock_name"], "</td>";
          echo "<td>", $row["orderline_qty"], "</td>";
          echo "<td>", $row["orderline_price"], "</td>";

          /*echo '<td><button onclick="window.location.href=\'/stock/edit_stock.php?stock_id='.$row["stock_id"].'\'" title="Edit item '.$row["stock_id"].'">Edit&hellip;</button></td>';
          echo '<td><button onclick="window.location.href=\'/stock/view_stock.php?stock_id='.$row["stock_id"].'\'" title="View item '.$row["stock_id"].'">View&hellip;</button></td>';*/
          echo "</tr>";

        }
        echo "</table>";

        mysqli_free_result($allSale);

        mysqli_close($conn);
}
?>
</main>
<?php
/*
  </body>
*/
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
