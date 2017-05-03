<?php
  $debug = true;
  //$debug = false;

  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Add Sale Item";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder.
  //$extra_css = array("test.css", "test2.css");

  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  $extra_js = "add_sales.js";

  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/head.php';
  //start of body and nav are in the head.php section.
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
?>
    </nav>
    <main>
<?php
  //echo "connect<br>".PHP_EOL;
  // Include functions for editing stock. Could be made part of all functions for stock. eg: stock_func.php
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/stock_functions.php';
  //if (!isset($_POST['html_stock_id']) && !isset($_GET['stock_id'])) echo 'Neither $_POST[\'html_stock_id\'] or $_GET[\'stock_id\'] set.<br>'.PHP_EOL;
  //if (isset($_GET['stock_id'])) echo '$_GET[\'stock_id\'] is set.<br>'.PHP_EOL;
  //if (isset($_POST['html_stock_id'])) echo '$_POST[\'html_stock_id\'] is set.<br>'.PHP_EOL;

  //if (isset ($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
  if (!isset($_POST['html_stock_id']) && !isset($_GET['stock_id'])) {
    if ($debug) echo '1) if NOT isset($_POST[\'html_stock_id\']) AND NOT isset($_GET[\'stock_id\']) section.<br>'.PHP_EOL;
?>
    <form id="sale_item" action="add_sale.php" method="get">
      <label>Select stock item for Sale.</label><br>
      <select class="browser-default" name="stock_id">
        <?php get_ID_list(); ?>
      </select>
      <!-- TODO - Link id and name selection -->
      <input type="submit" value="Choose Stock for Sale">
      <input type="reset" value="Reset">
    </form>
<?php
  } elseif (isset($_GET['stock_id'])) {
    if ($debug) echo '2) if isset($_GET[\'stock_id\']) section.<br>'.PHP_EOL;
    $php_stock = get_stock($_GET['stock_id']);
    // onsubmit="return check_stock_details(this)"
?>
      <div class="container">
        <form id="edit_stock" action="\stock\sale_added.php" method="post">
          <fieldset>
            <legend>Add Sale Item</legend>
		  <div class="input-field">
            <input type="text" id="html_sales_datetime" name="html_sales_datetime" class="validate">
            <label for="html_sales_datetime">Sales Date/Time</label>
          </div>
            <div class="input-field">
              <input readonly type="text" id="html_stock_orderlines_name" name="html_stock_orderlines_name" class="validate" value="<?php echo $php_stock['name'];?>">
              <label for="html_stock_orderlines_name">Item ID</label>
            </div>
	 <div class="input-field">
            <input type="text" id="html_orderlines_qty" name="html_orderlines_qty">" class="validate">
            <label for="html_orderlines_qty">Sales Quantity</label>
          </div>
	 <div class="input-field">
            <input readonly type="text" id="html_orderlines_price" name="html_orderlines_price">" class="validate">
            <label for="html_orderlines_price">Sales Price</label>
          </div>
           
          </fieldset>
          <p>
            <input type="reset" value="Reset">
            <input type="submit" value="Add Sale">
          </p>
        </form>
      </div>
<?php
  }
  //else{
  //elseif (isset($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
  elseif (isset($_POST['html_stock_id'])) {
    if ($debug) echo '3) if isset($_POST[\'html_stock_id\']) section.<br>'.PHP_EOL;
    $succ = update_stock($_POST);
    //$succ = update_stock();
    // jump to item view of newly created stock item
    if ($succ == true) {
      echo 'Success! $_POST[\'html_stock_id\']: '.$_POST['html_stock_id'].'<br>'.PHP_EOL;
//      header("Location:/stock/view_stock.php?stock_id=".$_POST['stock_id']);
    }
    else echo 'Failed!<br>'.PHP_EOL;
  //} elseif (!(isset ($_GET) && $_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET))) {
  }
?>
    </main>
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
