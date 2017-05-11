<?php
  //$debug = true;
  $debug = false;
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
<?php
	//echo "connect<br>".PHP_EOL;
	// Include functions for deleting stock. Could be made part of all functions for stock. eg: stock_func.php
 	include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/stock_functions.php';
  	if ((isset ($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST))) { 
  		//echo $_POST['stock_id'];
		deleteStock($_POST['stock_id']);

?>
	<div class="container">
		Stock item with stock id: <?php echo $_POST['stock_id'] ?> was deleted.<br>
		Press the button to return.<br>
		<a class="waves-effect waves-light btn" href="/stock/delete_stock.php"><i class="material-icons left">arrow_back</i>Return</a>
	</div>
<?php
  	}
  	elseif (!(isset ($_GET) && $_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET))) { 
?>
	<div class="container"> 
		<form id="stock_item" action="delete_stock.php" method="get">
			<div class="input-field">
				<select name="stock_id">
					<option value="" disabled selected>Please select a stock item</option>
<?php
					$results = getAllStock();
					foreach($results as $row){
?>
					<option value="<?php echo $row['stock_id'];?>"> <?php echo $row['stock_id'];?> - <?php echo $row['stock_name'];?> </option>
<?php
					}
?>
				</select>
				<label>Select stock item to view by ID.</label>			
			</div>
			<div class="center-align">
				<button class="btn waves-effect waves-light" type="submit">Submit<i class="material-icons right">send</i></button>
				<button class="btn waves-effect waves-light" type="reset">Clear<i class="material-icons right">clear</i></button>
			</div>
		</form>
	</div>
<?php
	} elseif (isset($_GET['stock_id'])) {
    	$php_stock = get_stock($_GET['stock_id']);
?>
		<div class="container">      
			<form id="delete_stock" action="\stock\delete_stock.php" method="post" onsubmit="return confirm_del('<?php echo $_GET['stock_id']; ?>');">
				<fieldset>
					<legend>Edit Stock Item</legend>
					<input type="hidden" name="stock_id" value="<?php echo $_GET['stock_id']; ?>" />
					Item ID: <span><?php echo $php_stock['id']; ?> </span><br>
					Item Name: <span><?php echo $php_stock['name'];?> </span><br>
					Item Description: <span><?php echo $php_stock['description'];?> </span><br>
					Directions: <span><?php echo $php_stock['directions'];?> </span><br>
					Ingredients: <?php echo $php_stock['ingredients'];?> <br>
					Item Price: <span><?php echo $php_stock['price'];?> </span> <br>
					Item Cost Price: <span><?php echo $php_stock['cost_price'];?> </span> <br>
					Item Qty: <span><?php echo $php_stock['qty'];?> </span> <br>
					Item Target: <span><?php echo $php_stock['target_min_qty'];?> </span> <br>
					Item Supplier: <span><?php echo $php_stock['supplier'];?> </span> <br>
					Item Supplier Code: <span><?php echo $php_stock['supplier_order_code'];?> </span> <br>
					Item Category Name: <span><?php echo $php_stock['category_name'];?> </span> <br>
					Item Barcode: <span><?php echo $php_stock['barcode'];?> </span> <br>
					<div class="center-align">
						<button class="btn waves-effect waves-light" type="submit">Delete<i class="material-icons right">delete</i></button>
						<a class="waves-effect waves-light btn" href="/stock/delete_stock.php"><i class="material-icons left">clear</i>Cancel</a>
					</div>			
				</fieldset>
			</form>
		</div>
<?php
	}
?>
</main>

<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
