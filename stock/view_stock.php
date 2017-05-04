<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "View Stock Item";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  $extra_css = "view_stock.css";
  
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
<?php
  //echo "connect<br>".PHP_EOL;
  // Include functions for editing stock. Could be made part of all functions for stock. eg: stock_func.php
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/stock_functions.php';
  if (isset ($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {  // no ?stock_id= present
    header("Location:/stock/view_stock.php?stock_id=".$_POST['html_stock_id']);
  } 
  elseif (!(isset ($_GET) && $_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET))) { // change post to get and display as ?stock_id= not ?html_stock_id=
?>
    <form id="stock_item" action="view_stock.php" method="post">
      <label>
        Select stock item to view by ID.
      </label><br>
      
      <select class="browser-default" name="html_stock_id">
        <option value="" disabled selected>Select a stock item</option>
        <?php get_ID_list(); ?>
      </select>      
      <input type="submit" value="Submit"> 
      <input type="reset" value="Reset">
    </form>
<?php
  } 
  else {
    $php_stock = get_stock($_GET['stock_id']);
?>
    <div class="container">      
      <div class="fixed-action-btn">
        <a class="btn-floating btn-large" href="\stock\edit_stock.php?stock_id=<?= $php_stock['id'] ?>">
          <i class="large material-icons">mode_edit</i>
        </a>
      </div>
      
      <p>View Stock Item</p>          
      <p>Item ID: <span><?php echo $php_stock['id']; ?> </span> <p>
      <p>Item Name: <span><?php echo $php_stock['name'];?> </span> <p>
      <p>Item Description: <textarea readonly="yes"><?php echo $php_stock['description'];?> </textarea> <p>
      <p>Directions: <textarea readonly="yes"><?php echo $php_stock['directions'];?> </textarea> <p>
      <p>Ingredients: <textarea readonly="yes"><?php echo $php_stock['ingredients'];?> </textarea> <p>
      <p>Item Price: <span><?php echo $php_stock['price'];?> </span> <p>
      <p>Item Cost Price: <span><?php echo $php_stock['cost_price'];?> </span> <p>
      <p>Item Qty: <span><?php echo $php_stock['qty'];?> </span> <p>
      <p>Item Target: <span><?php echo $php_stock['target_min_qty'];?> </span> <p>
      <p>Item Supplier: <span><?php echo $php_stock['supplier'];?> </span> <p>
      <p>Item Supplier Code: <span><?php echo $php_stock['supplier_order_code'];?> </span> <p>
      <p>Item Category Name: <span><?php echo $php_stock['category_name'];?> </span> <p>
      <p>Item Barcode: <span><?php echo $php_stock['barcode'];?> </span> <p>
    </div>
<?php
  }
?>
</main>
<?php
    /*
    View Stock Item<br>
    Item<br>
    ID:<br>
    Name:<br>
    Cost Price<br>
    Price <br>
    Quantity <br>
    Minimm Target Quantity:<br>*/
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
