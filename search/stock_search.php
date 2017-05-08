<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Search Stock";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  //$extra_css = "";
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  $extra_js = "utilities.js";

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
	include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';
	include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/stock_functions.php';
	include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/Paginator.class.php';
	include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/utilities.php';

	if (!(isset ($_GET) && $_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET))) { // check if ?q= set
?>
     <div class="container"> 
	     <form id="search" action="stock_search.php" method="get">
	    	<div class="input-field">
				<input id="q" type="text" name="q">
				<label for="q">Enter Search Query</label>
	        </div>
	        
	        <div class="center-align">
		        <button class="btn waves-effect waves-light" type="submit">Search<i class="material-icons right">search</i></button>
		  		<button class="btn waves-effect waves-light" type="reset">Clear<i class="material-icons right">clear</i></button>
			</div>
	    </form>
	</div>
<?php
  } 
  else {
	$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
    
    $query      =<<<SQL
    	SELECT stock.stock_id, stock.stock_name, stock.stock_price, stock.stock_qty, stock.stock_supplier, categories.category_name 
    	FROM stock 
    	LEFT JOIN categories ON stock.stock_category_id = categories.category_id   
    	WHERE stock.stock_id LIKE '%{$_GET['q']}%' OR
			  stock.stock_name LIKE '%{$_GET['q']}%' OR
    	      stock.stock_description LIKE '%{$_GET['q']}%' OR
    	      stock.stock_directions LIKE '%{$_GET['q']}%' OR
    	      stock.stock_supplier LIKE '%{$_GET['q']}%' OR
    	      categories.category_name LIKE '%{$_GET['q']}%' 
SQL;

    $Paginator  = new Paginator( $conn, $query );
 
    $results    = $Paginator->getData( $limit, $page );

?>
	<div class="container"> 	 
	  	<p>
	  		<a class="btn-floating btn-large waves-effect waves-light" href="stock_search.php" title="Return to Search Home"><i class="material-icons">keyboard_backspace</i></a>
	  		<a>Search: <?php echo $_GET['q'] ?></a>
	  	</p>
	  	
	  	
<?php	  	
		echo '<table class="striped" border="1">'.PHP_EOL;

			echo '  <!-- table headers -->'.PHP_EOL;
			echo '  <tr>';	
	
			foreach($results->fields as $field)    {
				echo "<th>".get_column_name($field)."</th>";
			}
			
				echo "<th></th>";
				echo "<th></th>";  
		
				echo "</tr>".PHP_EOL;
			
			echo '  <!-- table data -->'.PHP_EOL;
			for( $i = 0; $i < count( $results->data ); $i++ ) {
			echo "  <tr>";
			
			foreach($results->data[$i] as $cell) {
				echo "<td>".$cell."</td>";
			}
			
			echo '<td><a class="waves-effect waves-light btn" href="/stock/edit_stock.php?stock_id='.$results->data[$i]["stock_id"].'" title="Edit item '.$results->data[$i]["stock_id"].'">Edit</a></td>';
			echo '<td><a class="waves-effect waves-light btn" href="/stock/view_stock.php?stock_id='.$results->data[$i]["stock_id"].'" title="View item '.$results->data[$i]["stock_id"].'">View</a></td>';
	
			echo "</tr>".PHP_EOL;        
			}

		echo '</table>'.PHP_EOL.PHP_EOL;

	echo '<div class="center-align">'.PHP_EOL;
		echo $Paginator->createLinks( $links, 'pagination', 'q='.$_GET['q']);
	echo '</div>'.PHP_EOL;
?>
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
