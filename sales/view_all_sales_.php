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
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
?>    
    </nav>
    <main>
      <h1>List of all Sales</h1>
      <link rel='stylesheet' href='/resources/demos/style.css'>
      <script>
        $( function() {
          $( '#datepicker' ).datepicker();
        } );
        $( function() {
          $( '#datepicker1' ).datepicker();
        } );
      </script>
<?php
/*
echo "<link rel='stylesheet' href='/resources/demos/style.css'>";
echo "<script>
  $( function() {
    $( '#datepicker' ).datepicker();
  } );
  </script>";
echo "<script>
  $( function() {
    $( '#datepicker1' ).datepicker();
  } );
  </script>"; /* */

  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';
  // Older query
  $allSaleQuery = "select sale_id, sale_datetime, ol.orderline_stock_id, st.stock_name, ol.orderline_qty, ol.orderline_price FROM sales sl
  INNER JOIN orderlines ol ON ol.orderline_sale_id = sl.sale_id
  INNER JOIN stock st ON st.stock_id = ol.orderline_stock_id"; /* */
  // Newer query
  /*
  $allSaleQuery = "select sale_id, sale_datetime,  FROM sales
  INNER JOIN orderlines ol ON ol.orderline_sale_id = sl.sale_id
  INNER JOIN stock st ON st.stock_id = ol.orderline_stock_id"; /* */
  $allSale = mysqli_query($conn, $allSaleQuery);
?>
      <div id='selectdate' class='selectdate'>
        <form method='get'>
          Select date from &#9; <input type='text' id='datepicker' name='datepicker' class='j-datepicker' placeholder='Select' value=''>
          &#9; to <input type='text' id='datepicker1' name='datepicker' class='j-datepicker' placeholder='Select' value=''>
          &#9; <input type='button' id='submit' value='View Report' onClick='formValidation()'>
        </form>
        <br>
      </div>
<?php
/*
echo "<div id='selectdate' class='selectdate'>";
echo "<form method='get'>";
echo " Select date from &#9; <input type='text' id='datepicker' name='datepicker' class='j-datepicker' placeholder='Select' value=''>";
echo "&#9; to <input type='text' id='datepicker1' name='datepicker' class='j-datepicker' placeholder='Select' value=''>";
echo " &#9; <input type='button' id='submit' value='View Report' onClick='formValidation()' >";
echo "</form>";
echo "<br>";
echo "</div>"; /* */

/*
while($row = mysqli_fetch_assoc($allSale)){ // loop to store the data in an associative array.
     $php_sale_id[$index] = $row['orderline_stock_id'];
     $php_sale_name[$index] = $row['stock_name'];
     $php_orderline_qty[$index] = $row['orderline_qty'];
     $php_orderline_price[$index] = $row['orderline_price'];
     $php_orderline_total[$index] = $row['total'];
     $index++;
}
*/
  echo "<table  class=\"striped\" border=\"1\">";
  echo "<tr>"
    ."<th scope=\"col\">Sale Id</th>"
    ."<th scope=\"col\">Sale Date</th>"
    ."<th scope=\"col\">Stock Id</th>"
    ."<th scope=\"col\">Stock Name</th>"
    ."<th scope=\"col\">Qty</th>"
    ."<th scope=\"col\">Price</th>"
    ."<th scope=\"col\">Total</th>"
    ."<th scope=\"col\">Edit</th>"
    ."<th scope=\"col\">View</th>"
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
    echo "<td>", "", "</td>";

    echo '<td><button onclick="window.location.href=\'/sales/edit_sale.php?sale_id='.$row["sale_id"].'\'" title="Edit item '.$row["sale_id"].'">Edit&hellip;</button></td>';
    echo '<td><button onclick="window.location.href=\'/sales/view_sale.php?sale_id='.$row["sale_id"].'\'" title="View item '.$row["sale_id"].'">View&hellip;</button></td>';
    echo "</tr>";
  }
  echo "</table>";

  mysqli_free_result($allSale);

  mysqli_close($conn);
?>
    </main>
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
