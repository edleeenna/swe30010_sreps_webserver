<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "View All Sales";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  $extra_css = array('tablecss.css','jquery-ui.css');
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  //$extra_js = array("jquery-1.12.4.js", "jquery-ui.js", "display_sale.js");
  $extra_js = array("jquery-ui.js", "display_sale.js");
  //$extra_js = array("jquery-1.12.4.js", "display_sale.js");
  //$extra_js = array("jquery-1.12.4.js", "jquery-ui.js");
  
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/head.php';
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
?>    
    </nav>

<main>
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';
  // Older query
  /* $allSaleQuery = "select sale_id, sale_datetime, ol.orderline_stock_id, st.stock_name, ol.orderline_qty, ol.orderline_price FROM sales sl
  INNER JOIN orderlines ol ON ol.orderline_sale_id = sl.sale_id
  INNER JOIN stock st ON st.stock_id = ol.orderline_stock_id"; /* */
  // Newer query
  $allSaleQuery = ""; /* */
	include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';
	include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/stock_functions.php';
	include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/Paginator.class.php';
	include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/utilities.php';

    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
    $page       = ( isset( $_GET['page'] ) )  ? $_GET['page']  : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
    
    $query      =<<<SQL
    	SELECT sale_id, sale_datetime, SUM(orderline_qty * orderline_price) AS sale_total 
    	FROM sales 
    	INNER JOIN orderlines ON sale_id = orderline_sale_id GROUP BY sale_id    
SQL;

    $Paginator  = new Paginator( $conn, $query );
 
    $results    = $Paginator->getData( $limit, $page );

?>

	<div class="fixed-action-btn horizontal">
		<a class="btn-floating btn-large red" title="Menu"><i class="large material-icons">menu</i></a>
		<ul>
			<li><a class="btn-floating green" title="Export" href="/stock/stockexportprocess.php"><i class="material-icons">file_download</i></a></li>
		</ul>
	</div>

	<div class="container">
		<table class="striped" border="1">
			<tr>
<?php	
			foreach($results->fields as $field)    {
?>
				<th> <?php echo get_column_name($field); ?> </th>
<?php
			}
?>
				<th></th>
				<th></th>
			</tr>
<?php		
			for( $i = 0; $i < count( $results->data ); $i++ ) {
?>
			<tr>
<?php
			foreach($results->data[$i] as $cell) {
?>
				<td><?php echo $cell; ?></td>
<?php
			}
?>
				<td><a class="waves-effect waves-light btn" href="/sales/edit_sale.php?sale_id=<?php echo $results->data[$i]["sale_id"]?>" title="Edit item <?php echo $results->data[$i]["sale_id"]?>">Edit</a></td>
				<td><a class="waves-effect waves-light btn" href="/sales/view_sale.php?sale_id=<?php echo $results->data[$i]["sale_id"]?>" title="View item <?php echo $results->data[$i]["sale_id"]?>">View</a></td>
			</tr>
<?php       
			}
?>
		</table>
	</div>
	<div class="center-align">
		<?php echo $Paginator->createLinks( $links, 'pagination' ); ?>
	</div>
</main>

<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
