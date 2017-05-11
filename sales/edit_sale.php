<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Edit Sale";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  //$extra_css = "";
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  $extra_js = array("utilities.js", "edit_sale.js");

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
	include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/stock_functions.php';
	include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/sale_functions.php';
	
	if (!(isset ($_GET) && $_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET))) {		
		$results = getAllSales();
?>
	<div class="container"> 
		<form id="stock_item" action="edit_sale.php" method="get">
			<div class="input-field">
				<select name="sale_id">
					<option value="" disabled selected>Please select a sale</option>
<?php
					
					foreach($results as $row){
?>
					<option value="<?php echo $row['sale_id'];?>"> <?php echo $row['sale_id'];?> - <?php echo $row['sale_datetime'];?> </option>
<?php
					}
?>
				</select>
				<label>Select sale via its ID and timestamp to edit it.</label>			
			</div>
			<div class="center-align">
				<button class="btn waves-effect waves-light" type="submit">Submit<i class="material-icons right">send</i></button>
				<button class="btn waves-effect waves-light" type="reset">Clear<i class="material-icons right">clear</i></button>
				<a class="waves-effect waves-light btn" onclick="goBack();"><i class="material-icons left">arrow_back</i>Cancel</a>
			</div>
		</form>
	</div>
<?php
	} elseif (isset($_GET['sale_id'])) {
		$php_stock = getAllStock();
		$php_sale = getSale($_GET['sale_id']);
		$php_orderlines = getOrderlines($_GET['sale_id']);

?>
<div class="container">
	<fieldset>
		<legend>Sale Details</legend>
		<br>       
	      <h5>Sale ID: <span><?php echo $php_sale['sale_id']; ?> </span> </h5>
	      <h5>Sale Date: <span><?php echo $php_sale['sale_datetime'];?> </span> </h5>
	    <br> 
	</fieldset>
	
	<fieldset>
		<legend>Add Orderline</legend>
		<form action="/sales/orderline_add.php" method="post" >
			<div class="row">
				<input type="hidden" name="sale_id" value="<?php echo $_GET['sale_id']; ?>" />
				<div class="input-field col s6">
					<select name="stock_id" required style="padding:0 0 0 0">
						<option value="" disabled selected>Choose your option</option>
<?php
				
				foreach($php_stock as $row){
?>
						<option value="<?php echo $row['stock_id'];?>"> <?php echo $row['stock_id'];?> - <?php echo $row['stock_name'];?> </option>
<?php
}
?>
					</select>
				</div>
				<div class="input-field col s1">
					<input type="number" name="stock_qty" value="1" min="1" placeholder="Qty" autocomplete="off" required>
				</div>
				<button class="btn waves-effect waves-light" type="submit" title="Add to order"><i class="material-icons">add_shopping_cart</i>
				</button>
			</div>
		</form>		
	</fieldset>
	
	
	<fieldset>
		<legend>Current Orderlines</legend>
			<table class="striped" border="1">
				<thead>
				    <tr>
				    	<th scope="col">Stock ID</th>
				    	<th scope="col">Stock Name</th>
				    	<th scope="col">Qty</th>
				    	<th scope="col">Price</th>
				    	<th scope="col">Subtotal</th>
				    	<th></th>
				    </tr>
				</thead>
				
				<tbody>
<?php
    	if(isset($php_orderlines ) && count($php_orderlines ) > 0) {
      		foreach( $php_orderlines ['orderline_stock_id'] as $index => $php_stock_id ) {
?>    
			        <tr>
				        <td><?php echo $php_stock_id; ?></td>
				        <td><?php echo $php_orderlines ['stock_name'][$index]; ?></td>
				        <td><?php echo $php_orderlines ['orderline_qty'][$index]; ?></td>
				        <td><?php echo $php_orderlines ['orderline_price'][$index]; ?></td>
				        <td><?php echo $php_orderlines ['orderline_total'][$index]; ?></td>
				        <td>
				        	<form method="post" action="/sales/orderline_delete.php">
				        		<input type="hidden" name="sale_id" value="<?php echo $_GET['sale_id']; ?>" />
				        		<input type="hidden" name="stock_id" value="<?php echo $php_stock_id; ?>" />
				        		<input type="hidden" name="stock_qty" value="<?php $php_orderlines ['orderline_qty'][$index]; ?>" />
				        		<button class="btn waves-effect waves-light" type="submit" title="Remove from order"><i class="material-icons">remove_shopping_cart</i></button>
				        	</form>
				        </td>
			        </tr>
<?php
      		}
?>
					<tr>
			        	<th>Total</th>
			        	<td></td>
			        	<td></td>
			        	<td></td>
			        	<th><?php echo array_sum($php_orderlines ['orderline_total']);?></th>
			        	<td></td>
			        </tr>
<?php
   	 }
?>
				</tbody>
			</table>
			<div class="center-align">
				<a class="waves-effect waves-light btn" onclick="goBack();"><i class="material-icons left">arrow_back</i>Cancel</a>
			</div>
		</fieldset>
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
