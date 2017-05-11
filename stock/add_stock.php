<?php
	// Variable to set the local (current) page title [NOT Site Title].
	$pageTitle = "Add Stock Item";
	
	// Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
	// All files should reside in the "css" folder.
	//$extra_css = "";
	
	// Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
	// All files should reside in the "js" folder.
	$extra_js = array("add_stock.js", "stock_functions.js");

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
	
	if (isset ($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST) ) {		
		$stockId = add_stock($_POST);
		echo $stockId.PHP_EOL;
		if ($stockId != "") {
			// jump to item view of newly created stock item
			header("Location:/stock/view_stock.php?stock_id=".$stockId);
		}
	}
	else{
?>
		<div class="container">		
			<form id="add_stock" method="post" action="/stock/add_stock.php">
				<fieldset>
					<legend>Add Stock Item</legend>
					<div class="input-field">						
						<span id="html_stock_name_validation"></span>
						<input type="text" id="html_stock_name" name="html_stock_name" class="validate">
						<label for="html_stock_name">Item Name</label>
					</div>
					<div class="input-field">
						<textarea id="html_stock_description" name="html_stock_description" class="materialize-textarea"></textarea>
						<label for="html_stock_description">Item Description</label>
					</div>
					<div class="input-field">
		        		<textarea id="html_stock_directions" name="html_stock_directions" class="materialize-textarea"></textarea>
						<label for="html_stock_directions">Directions/Dose</label>
					</div>
					<div class="input-field">
		        		<textarea id="html_stock_ingrediants" name="html_stock_ingrediants" class="materialize-textarea"></textarea>
						<label for="html_stock_ingrediants">Ingredients</label>
					</div>
					<div class="input-field">
						<span id="html_stock_price_validation"></span>
						<input type="text" id="html_stock_price" name="html_stock_price" class="validate">
		       			<label for="html_stock_price">Item Price(decimal)</label>
					</div>
					<div class="input-field">
						<span id="html_stock_cost_price_validation"></span>
						<input type="text" id="html_stock_cost_price" name="html_stock_cost_price" class="validate">
		        		<label for="html_stock_cost_price">Item Cost Price (decimal)</label>
					</div>
					<div class="input-field">
						<span id="html_stock_qty_validation"></span>
						<input type="text" id="html_stock_qty" name="html_stock_qty" class="validate">
		        		<label for="html_stock_qty">Item Qty</label>
					</div>
					<div class="input-field">
						<span id="html_stock_target_min_qty_validation"></span>
						<input type="text" id="html_stock_target_min_qty" name="html_stock_target_min_qty" class="validate">
		        		<label for="html_stock_target_min_qty">Item Target</label>
					</div>
					<div class="input-field">
						<input type="text" id="html_stock_supplier" name="html_stock_supplier" class="validate">
		        		<label for="html_stock_supplier">Item Supplier</label>
					</div>
					<div class="input-field">
						<input type="text" id="html_stock_supplier_code" name="html_stock_supplier_code" class="validate">
		        		<label for="html_stock_supplier_code">Item Supplier Code</label>
					</div>
					<div class="input-field">
						<select id="html_stock_category_id" name="html_stock_category_id">
							<option value="" disabled selected>Please select a stock item your option</option>
<?php
							$results = getAllCategories();
							foreach($results as $row){
?>
							<option value="<?php echo $row['category_id'];?>"> <?php echo $row['category_id'];?> - <?php echo $row['category_name'];?> </option>
<?php
}
?>
						</select>
						<label>Select stock category</label>			
					</div>
					<div class="input-field">
						<input type="text" id="html_stock_barcode" name="html_stock_barcode" class="validate">
		        		<label for="html_stock_barcode">Item Barcode</label>
					</div>
					
					<div class="center-align">
						<button class="btn waves-effect waves-light" type="submit">Submit<i class="material-icons right">send</i></button>
						<button class="btn waves-effect waves-light" type="reset">Clear<i class="material-icons right">clear</i></button>
					</div>
				</fieldset>
			</form>
		</div>
<?php
	}
?>
</main>
<?php
/*
  </body>
*/
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
