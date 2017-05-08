<?php
  $debug = true;
  //$debug = false;
  
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "View Sale";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  //$extra_css = "";
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  //$extra_js = "";

  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/head.php';
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
?>
    </nav>
    <main>
<?php
  if (isset($GLOBALS['debug']) && ($GLOBALS['debug'])) echo "Debug check 1<br>".PHP_EOL;

  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/sale_functions.php';
  if (isset ($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {  // no ?stock_id= present
    header("Location:/sales/view_sale.php?sale_id=".$_POST['html_sale_id']);
  } 
  elseif (!(isset ($_GET) && $_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET))) { // change post to get and display as ?stock_id= not ?html_stock_id=
    if (isset($GLOBALS['debug']) && ($GLOBALS['debug'])) echo "Get Stock Item to view<br>".PHP_EOL;
?>
    <form id="stock_item" action="view_sale.php" method="post">
      <label>Select an Order to view.</label><br>
      <select class="browser-default" name="html_sale_id">
        <option value="" disabled selected>Select an Order</option>
        <?php getSaleID(); ?>
      </select>     
      <input type="submit" value="Submit"> 
      <input type="reset" value="Reset">
    </form>
<?php
  } 
  else {
    if (isset($GLOBALS['debug']) && ($GLOBALS['debug'])) echo "View a sale<br>".PHP_EOL;
    $php_sale = getSale($_GET['sale_id']);
?>
    <div class="container">     
      <div class="fixed-action-btn">
        <a class="btn-floating btn-large" href="\sales\edit_sale.php?sale_id=<?php echo $php_sale['id'];?>">
          <i class="large material-icons">mode_edit</i>
        </a>
      </div>
      <br>       
      <h5>Sale ID: <span><?php echo $php_sale['sale_id']; ?> </span> </h5>
      <h5>Sale Date: <span><?php echo $php_sale['sale_datetime'];?> </span> </h5>
      <br> 
      <table class="striped" border="1">
        <tr><th scope="col">Stock ID</th><th scope="col">Stock Name</th><th scope="col">Qty</th><th scope="col">Price</th><th scope="col">Subtotal</th></tr>
<?php
    if (!empty($php_sale['orderline_stock_id'])){
      foreach( $php_sale['orderline_stock_id'] as $index => $php_sale_id ) {
  //   print($php_sale_id.$php_sale_name[$index]);
    // echo "<p>Stock ID: ".$php_sale_id." Stock Name: ".$php_sale['stock_name'][$index]."</p>";
        echo "<tr>";
        echo "<td>", $php_sale_id, "</td>";
        echo "<td>", $php_sale['stock_name'][$index], "</td>";
        echo "<td>", $php_sale['orderline_qty'][$index], "</td>";
        echo "<td>", $php_sale['orderline_price'][$index], "</td>";
        echo "<td>", $php_sale['orderline_subtotal'][$index], "</td>";
      }
?>
        <tr><th>Total</th><td></td><td></td><td></td><th><?php echo array_sum($php_sale['orderline_total']);?></th></tr>
<?php
    }
?>
      </table>
    </div>
<?php
  }
  if (isset($GLOBALS['debug']) && ($GLOBALS['debug'])) echo "Debug check 2<br>".PHP_EOL;
?>
    </main>
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
