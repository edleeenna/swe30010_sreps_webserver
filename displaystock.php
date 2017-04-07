<?php
  include 'includes/head.php';
  include 'includes/db_connect.php';


$listAllQuery = "select * FROM stock";
      $listResult = mysqli_query($conn, $listAllQuery);
echo "<table  class=\"striped\" border=\"1\">";
  echo "<thread>"
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
        ."</tr>"
     ."</thread>";
        while ($row = mysqli_fetch_assoc($listResult)) {
          echo "<tbody>";
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

          echo "</tr>"
          echo "</tbody>";
        }
        echo "</table>";

        mysqli_free_result($listResult);

        mysqli_close($conn);
?>

<?php
  include 'includes/tail.php';
?>
