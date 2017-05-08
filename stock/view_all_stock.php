<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "View All Stock";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  $extra_css = 'tablecss.css';
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  //$extra_js = "";

  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/head.php';
?>
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
?>
</nav>

<main>

<?php
include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';
include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/stock_functions.php';
include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/Paginator.class.php';
include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/utilities.php';

    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
    $page       = ( isset( $_GET['page'] ) )  ? $_GET['page']  : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
    
    $query      =<<<SQL
    	SELECT stock.stock_id, stock.stock_name, stock.stock_price, stock.stock_qty, stock.stock_supplier, categories.category_name 
    	FROM stock 
    	LEFT JOIN categories ON stock.stock_category_id = categories.category_id    
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


	<table class="striped" border="1">
		<tr>
<?php	
		foreach($results->fields as $field)    {
			echo "<th>".get_column_name($field)."</th>";
		}
		
			echo "<th></th>";
			echo "<th></th>";  
	
			echo "</tr>".PHP_EOL.PHP_EOL;
		
		for( $i = 0; $i < count( $results->data ); $i++ ) {
		echo "<tr>";
		foreach($results->data[$i] as $cell) {
			echo "<td>".$cell."</td>";
		}
?>
			<td><a class="waves-effect waves-light btn" href="/stock/edit_stock.php?stock_id=<?php echo $results->data[$i]["stock_id"]?>" title="Edit item <?php echo $results->data[$i]["stock_id"]?>">Edit</a></td>
			<td><a class="waves-effect waves-light btn" href="/stock/view_stock.php?stock_id=<?php echo $results->data[$i]["stock_id"]?>" title="View item <?php echo $results->data[$i]["stock_id"]?>">View</a></td>
<?php	
		echo "</tr>".PHP_EOL;        
		}
?>
	</table>

<?php
	echo '<div class="center-align">'.PHP_EOL;
		echo $Paginator->createLinks( $links, 'pagination' );
	echo '</div>'.PHP_EOL;
?>
</main>

<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
