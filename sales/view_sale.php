<?php
  //$debug = true;
  //$debug = false;
  
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "View Sale";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  //$extra_css = "";
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  $extra_js = "view_sale.js";

  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/head.php';
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
?>
    </nav>
    
<main>
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/sale_functions.php';
	
	if (!(isset ($_GET) && $_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET))) {		
		$results = getAllSales();
?>
	<div class="container"> 
		<form id="stock_item" action="view_sale.php" method="get">
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
				<label>Select sale via its ID and timestamp to view it.</label>			
			</div>
			<div class="center-align">
				<button class="btn waves-effect waves-light" type="submit">Submit<i class="material-icons right">send</i></button>
				<button class="btn waves-effect waves-light" type="reset">Clear<i class="material-icons right">clear</i></button>
			</div>
		</form>
	</div>
<?php
	} elseif (isset($_GET['sale_id'])) {
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
		<legend>Orderlines</legend>
			<table class="striped" border="1">
				<thead>
				    <tr>
				    	<th scope="col">Stock ID</th>
				    	<th scope="col">Stock Name</th>
				    	<th scope="col">Qty</th>
				    	<th scope="col">Price</th>
				    	<th scope="col">Subtotal</th>
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
			        </tr>
<?php
   	 }
?>
				</tbody>
			</table>
		</fieldset>
    </div>
<?php
	}
?>
</main>

<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
