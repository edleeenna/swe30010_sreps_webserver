<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "View Stock Item";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  $extra_css = "view_stock.css";
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  $extra_js = array("utilities.js","view_stock.js");

  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/head.php';
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
	if (!(isset ($_GET) && $_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET))) { // change post to get and display as ?stock_id= not ?html_stock_id=
?>
	<div class="container"> 
		<form id="stock_item" action="view_stock.php" method="get">
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
  } 
  else {
    $php_stock = get_stock($_GET['stock_id']);
?>
    <div class="container">  
		<div>
			<a class="waves-effect waves-light btn" onclick="goBack();"><i class="material-icons left">arrow_back</i>Back</a>
		</div>
		<div class="fixed-action-btn horizontal">
		    <a class="btn-floating btn-large red pulse" title="Menu"><i class="large material-icons">menu</i></a>
		    <ul>
		      <li><a class="btn-floating red darken-1" title="Delete" href="\stock\delete_stock.php?stock_id=<?= $php_stock['id'] ?>"><i class="material-icons">delete</i></a></li>
		      <li><a class="btn-floating yellow" title="Edit" href="\stock\edit_stock.php?stock_id=<?= $php_stock['id'] ?>"><i class="material-icons">edit</i></a></li>
		      <li><a class="btn-floating green" title="Export"><i class="material-icons">file_download</i></a></li>
		    </ul>
		  </div>    
             
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
