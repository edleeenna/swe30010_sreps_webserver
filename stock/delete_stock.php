<?php
  $debug = true;
  //$debug = false;
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Delete Stock Item";
  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  //$extra_css = array("test.css", "test2.css");
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  $extra_js = array("delete_stock.js", "stock_functions.js");
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/head.php';
  //start of body and nav are in the head.php section.
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
?>
    </nav>
    <main>
      Work In Progress.
<?php
  //echo "connect<br>".PHP_EOL;
  // Include functions for deleting stock. Could be made part of all functions for stock. eg: stock_func.php
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/stock_functions.php';
  //if (isset ($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
  if (!isset($_POST['html_stock_id']) && !isset($_GET['stock_id'])) {
    if ($debug) echo "1) Select item to delete.<br>".PHP_EOL;
?>
    <form id="stock_item" action="delete_stock.php" method="get">
      <label>Select stock item to delete, by ID.</label><br>
      <select class="browser-default" name="stock_id">
        <?php get_ID_list(); ?>
      </select> 
      <!-- TODO - Link id and name selection -->
      <input type="submit" value="Select">
      <input type="reset" value="Reset">
    </form>
<?php
  } elseif (isset($_GET['stock_id'])) {
    if ($debug) {
      echo "2) Display selected item prior to delete request.<br>".PHP_EOL;
      echo "Request entry of \"Delete".$_GET['stock_id']."\" to confirm proceeding with delete request.<br>".PHP_EOL;
    }
    $php_stock = get_stock($_GET['stock_id']);
?>
    <div class="container">      
      <form id="delete_stock" action="\stock\delete_stock.php" method="post">
        <fieldset>
          <legend>Edit Stock Item</legend>
          <div class="input-field">
            <label for="html_stock_id">Item ID</label>
            <input readonly type="text" id="html_stock_id" name="html_stock_id" class="validate" value="<?php echo $php_stock['id'];?>">
          </div>
          <div class="input-field">
            <label for="html_stock_name">Item Name</label>
            <input readonly type="text" id="html_stock_name" name="html_stock_name" class="validate" value="<?php echo $php_stock['name'];?>">
          </div>
          <div class="input-field">
            <label for="html_stock_description">Item Description</label>
            <textarea readonly id="html_stock_description" name="html_stock_description" class="materialize-textarea"><?php echo $php_stock['description'];?></textarea>
          </div>
          <div class="input-field">
            <label for="html_stock_directions">Directions</label>
            <textarea readonly id="html_stock_directions" name="html_stock_directions" class="materialize-textarea"><?php echo $php_stock['directions'];?></textarea>
          </div>
          <div class="input-field">
            <label for="html_stock_ingredients">Ingredients</label>
            <textarea readonly id="html_stock_ingredients" name="html_stock_ingredients" class="materialize-textarea"><?php echo $php_stock['ingredients'];?></textarea>
          </div>
          <div class="input-field">
            <label for="html_stock_price">Item Price</label>
            <input readonly type="text" id="html_stock_price" name="html_stock_price" class="validate" value="<?php echo $php_stock['price'];?>">
          </div>
          <div class="input-field">
            <label for="html_stock_cost_price">Item Cost Price</label>
            <input readonly type="text" id="html_stock_cost_price" name="html_stock_cost_price" class="validate" value="<?php echo $php_stock['cost_price'];?>">
          </div>
          <div class="input-field">
            <label for="html_stock_qty">Item Qty</label>
            <input readonly type="text" id="html_stock_qty" name="html_stock_qty" class="validate" value="<?php echo $php_stock['qty'];?>">
          </div>
          <div class="input-field">
            <label for="html_stock_target_min_qty">Item Target</label>
            <input readonly type="text" id="html_stock_target_min_qty" name="html_stock_target_min_qty" class="validate" value="<?php echo $php_stock['target_min_qty'];?>">
          </div>
          <div class="input-field">
            <label for="html_stock_supplier">Item Supplier</label>
            <input readonly type="text" id="html_stock_supplier" name="html_stock_supplier" class="validate" value="<?php echo $php_stock['supplier'];?>">
          </div>
          <div class="input-field">
            <label for="html_stock_supplier_code">Item Supplier Code</label>
            <input readonly type="text" id="html_stock_supplier_code" name="html_stock_supplier_code" class="validate" value="<?php echo $php_stock['supplier_order_code'];?>">
          </div>
          <div class="input-field">
            <label for="html_stock_category_name">Category Name</label>
            <select disabled id="html_stock_category_id" name="html_stock_category_id">
              <option value="" disabled>Choose your option</option>
              <?php get_cat_list($php_stock['category_id']); // get_category($php_stock['category_id']);Get Catagory instead of list.?>
            </select>
          </div>
          <div class="input-field">
            <label for="html_stock_barcode">Item Barcode</label>
            <input readonly type="text" id="html_stock_barcode" name="html_stock_barcode" class="validate" value="<?php echo $php_stock['barcode'];?>">
          </div>
        </fieldset>
        <p>
          <input type="reset" value="Reset">
          <input type="submit" value="Delete">
        </p>
      </form>
    </div>
<?php
  }
  elseif (isset($_POST['html_stock_id'])) {
    if ($debug) echo "3) Display item deleted confirmation message.<br>".PHP_EOL;
      //$succ = delete_stock($_POST);
  }
?>
      </main>
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
