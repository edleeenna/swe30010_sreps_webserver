<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "View All Stock";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  $extra_css = 'tablecss.css';
  
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
	    <h1>List of Stock</h1>
<?php
include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';
$listAllQuery = "select * FROM stock";
      $listResult = mysqli_query($conn, $listAllQuery);
echo "<form method='post' action='stockexportprocess.php'>";
echo " <p><input type='submit' id='submit' value='Export to CSV'></p>";
echo "</form>";
echo "<br>";
echo "<table  class=\"striped\" border=\"1\">";
     echo "<tr>"
        ."<th scope=\"col\">Stock Id</th>"
        ."<th scope=\"col\">Stock Name</th>"
        ."<th scope=\"col\">Stock Description</th>"
        ."<th scope=\"col\">Stock Directions</th>"
        ."<th scope=\"col\">Ingredients</th>"
        ."<th scope=\"col\">Price</th>"
        ."<th scope=\"col\">Stock Cost Price</th>"
        ."<th scope=\"col\">Stock Qty</th>"
        ."<th scope=\"col\">Target</th>"
        ."<th scope=\"col\">Supplier</th>"
        ."<th scope=\"col\">Supplier Code</th>"
        ."<th scope=\"col\">Category</th>"
        ."<th scope=\"col\">Barcode</th>"
        ."<th scope=\"col\"></th>"
        ."</tr>";

        while ($row = mysqli_fetch_assoc($listResult)) {
          echo "<tr>";
          echo "<td>", $row["stock_id"], "</td>";
          echo "<td>", $row["stock_name"], "</td>";
          echo "<td>", $row["stock_description"], "</td>";
          echo "<td>", $row["stock_directions"], "</td>";
          echo "<td>", $row["stock_ingredients"], "</td>";
          echo "<td>", $row["stock_price"], "</td>";
          echo "<td>", $row["stock_cost_price"], "</td>";
          echo "<td>", $row["stock_qty"], "</td>";
          echo "<td>", $row["stock_target_min_qty"], "</td>";
          echo "<td>", $row["stock_supplier"], "</td>";
          echo "<td>", $row["stock_supplier_order_code"], "</td>";
          echo "<td>", $row["stock_category_id"], "</td>";
          echo "<td>", $row["stock_bar_code"], "</td>";
          echo '<td><button onclick="window.location.href=\'/stock/edit_stock.php?stock_id='.$row["stock_id"].'\'" title="Edit item '.$row["stock_id"].'">Edit</button></td>';
          echo "</tr>";

        }
        echo "</table>";

        mysqli_free_result($listResult);

        mysqli_close($conn);
?>
</main>
<?php
/*
  </body>
*/
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
