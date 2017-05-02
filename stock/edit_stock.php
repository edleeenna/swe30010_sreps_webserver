<?php
  //$debug = true;
  $debug = false;

  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Edit Stock Item";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  //$extra_css = array("test.css", "test2.css");
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  $extra_js = array("edit_stock.js", "stock_functions.js");

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
    <form id="stock_item" action="edit_stock.php" method="get">
      <label>Select stock item to edit, by ID or Name.</label><br>
      <select class="browser-default" name="stock_id">      
        <?php get_ID_list(); ?>
      </select>
      <!-- TODO - Link id and name selection -->
      <input type="submit" value="Edit"> 
      <input type="reset" value="Reset">
    </form>
<?php
  } elseif (isset($_GET['stock_id'])) {
    if ($debug) echo '2) if isset($_GET[\'stock_id\']) section.<br>'.PHP_EOL;
    $php_stock = get_stock($_GET['stock_id']);
    // onsubmit="return check_stock_details(this)"
?>
      <div class="container">      
        <form id="edit_stock" action="\stock\edit_stock.php" method="post">
          <fieldset>
            <legend>Edit Stock Item</legend>
            <div class="input-field">
              <input readonly type="text" id="html_stock_id" name="html_stock_id" class="validate" value="<?php echo $php_stock['id'];?>">
              <label for="html_stock_id">Item ID</label>
            </div>
            <div class="input-field">
              <input type="text" id="html_stock_name" name="html_stock_name" class="validate" value="<?php echo $php_stock['name'];?>">
              <label for="html_stock_name">Item Name</label>
            </div>
            <div class="input-field">
              <textarea id="html_stock_description" name="html_stock_description" class="materialize-textarea"><?php echo $php_stock['description'];?></textarea>
              <label for="html_stock_description">Item Description</label>
            </div>
            <div class="input-field">
              <textarea id="html_stock_directions" name="html_stock_directions" class="materialize-textarea"><?php echo $php_stock['directions'];?></textarea>
              <label for="html_stock_directions">Directions</label>
            </div>
            <div class="input-field">
              <textarea id="html_stock_ingredients" name="html_stock_ingredients" class="materialize-textarea"><?php echo $php_stock['ingredients'];?></textarea>
              <label for="html_stock_ingredients">Ingredients</label>
            </div>
            <div class="input-field">
              <span id="html_stock_price_validation"></span>
              <input type="text" id="html_stock_price" name="html_stock_price" class="validate" value="<?php echo $php_stock['price'];?>">
              <label for="html_stock_price">Item Price</label>
            </div>
            <div class="input-field">
              <span id="html_stock_cost_price_validation"></span>
              <input type="text" id="html_stock_cost_price" name="html_stock_cost_price" class="validate" value="<?php echo $php_stock['cost_price'];?>">
              <label for="html_stock_cost_price">Item Cost Price</label>
            </div>
            <div class="input-field">
              <span id="html_stock_qty_validation"></span>
              <input type="text" id="html_stock_qty" name="html_stock_qty" class="validate" value="<?php echo $php_stock['qty'];?>">
              <label for="html_stock_qty">Item Qty</label>
            </div>
            <div class="input-field">
              <span id="html_stock_target_min_qty_validation"></span>
              <input type="text" id="html_stock_target_min_qty" name="html_stock_target_min_qty" class="validate" value="<?php echo $php_stock['target_min_qty'];?>">
              <label for="html_stock_target_min_qty">Item Target</label>
            </div>
            <div class="input-field">
              <input type="text" id="html_stock_supplier" name="html_stock_supplier" class="validate" value="<?php echo $php_stock['supplier'];?>">
              <label for="html_stock_supplier">Item Supplier</label>
            </div>
            <div class="input-field">
              <input type="text" id="html_stock_supplier_code" name="html_stock_supplier_code" class="validate" value="<?php echo $php_stock['supplier_order_code'];?>">
              <label for="html_stock_supplier_code">Item Supplier Code</label>
            </div>
            <div class="input-field">
              <span id="html_stock_category_id_validation"></span>
              <select id="html_stock_category_id" name="html_stock_category_id">
                <option value="" disabled>Choose your option</option>
                  <?php get_cat_list($php_stock['category_id']); ?>
              </select>
              <label>Category Name</label>
            </div>
            <div class="input-field">
              <input type="text" id="html_stock_barcode" name="html_stock_barcode" class="validate" value="<?php echo $php_stock['barcode'];?>">
              <label for="html_stock_barcode">Item Barcode</label>
            </div>
          </fieldset>
          <p>
            <input type="reset" value="Reset">
            <input type="submit" value="Submit">
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
      //echo 'Success! $_POST[\'html_stock_id\']: '.$_POST['html_stock_id'].'<br>'.PHP_EOL;
      header("Location:/stock/view_stock.php?stock_id=".$_POST['stock_id']);
    }
    else echo 'Failed!<br>'.PHP_EOL;
  //} elseif (!(isset ($_GET) && $_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET))) {
  }
?>
    </main>
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
