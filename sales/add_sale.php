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
	<p id="error_message" ></p>
	<div class="container">
      <form id="add_sales" method="post" action="add_sale.php">
        <fieldset>
          <legend>Add Sales Item</legend>
		<div class="input-field">
            <input readonly type="text" id="html_sales_datetime" name="html_sales_datetime" class="validate">
            <label for="html_stock_name">Sales Date/Time</label>
          </div>
         <div>
	<label>Select stock item for sale, by ID or Name.</label><br>
      <select class="browser-default" name="stock_id" onchange="showStock(this.value)">
        <?php get_ID_list(); ?>
      </select>
	</div>
		<?php
		$q = intval($_GET['q']);
		include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';
		$sql="SELECT * FROM sales WHERE id = '".$q."'";
		$result = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$row['stock_name'] = $stockName;
			$row['stock_price'] = $stockPrice;
		}
		?>
	<div class="input-field">
            <input readonly type="text" id="html_stock_orderlines_name" name="html_orderlines_name_datetime" value="<?php $stockName ?>" class="validate">
            <label for="html_stock_orderlines_name">Stock Name: </label>
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
