<?php
   $debug = true;
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Add Sale";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  //$extra_css = "";
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  $extra_js = "add_sales.js";

  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/head.php';
/*
  <body>
*/
?>
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/stock_functions.php';
?>    
</nav>

<main>
<?php
	 if (!isset($_POST['html_stock_id']) && !isset($_GET['stock_id'])) {
    if ($debug) echo '1) if NOT isset($_POST[\'html_stock_id\']) AND NOT isset($_GET[\'stock_id\']) section.<br>'.PHP_EOL;
?>
	<div class="container">
      <form id="add_sales" method="get" action="add_sale.php">
        <fieldset>
          <legend>Add Sales Item</legend>
         <div>
	<label>Select stock item for sale, by ID or Name.</label><br>
      <select class="browser-default" name="stock_id">
        <?php get_ID_list(); ?>
      </select>
	</div>
        </fieldset>
        <p>
            <input type="reset" value="Reset">
            <input type="submit" value="Submit">
        </p>
      </form>
    </div>
<?php
} elseif (isset($_GET['stock_id'])) {
    if ($debug) echo '2) if isset($_GET[\'stock_id\']) section.<br>'.PHP_EOL;
    $php_stock = get_stock($_GET['stock_id']);		 
?>
	
<div class="container">
      <form id="add_sales" method="post" action="/stock/add_sale.php">
        <fieldset>
          <legend>Add Sales Item</legend>
          <div class="input-field">
            <input type="text" id="html_sales_datetime" name="html_sales_datetime" class="validate">
            <label for="html_stock_name">Sales Date/Time</label>
          </div>
	 <div class="input-field">
              <input readonly type="text" id="html_stock_id" name="html_stock_id" class="validate" value="<?php echo $php_stock['id'];?>">
              <label for="html_stock_id">Stock Item ID:</label>
            </div>
        </fieldset>
        <p>
            <input type="reset" value="Reset">
            <input type="submit" value="Submit">
        </p>
      </form>
    </div>
	
	
	

</main>
<?php
/*
  </body>
*/
   include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
