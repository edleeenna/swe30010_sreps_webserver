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
include $_SERVER['DOCUMENT_ROOT'].'/includes/Paginator.class.php';

    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
    $query      ="SELECT stock.stock_id, stock.stock_name, stock.stock_price, stock.stock_qty, stock.stock_supplier, categories.category_name FROM stock LEFT JOIN categories ON stock.stock_category_id = categories.category_id";    

    $Paginator  = new Paginator( $conn, $query );
 
    $results    = $Paginator->getData( $limit, $page );

?>

<form method='post' action='stockexportprocess.php'>
	<p><input type='submit' id='submit' value='Export to CSV'></p>
</form>

<?php
  echo "<table  class=\"striped\" border=\"1\">".PHP_EOL;
    echo "<tr>";
   
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
				
				echo '<td><button onclick="window.location.href=\'/stock/edit_stock.php?stock_id='.$results->data[$i]["stock_id"].'\'" title="Edit item '.$results->data[$i]["stock_id"].'">Edit&hellip;</button></td>';
				echo '<td><button onclick="window.location.href=\'/stock/view_stock.php?stock_id='.$results->data[$i]["stock_id"].'\'" title="View item '.$results->data[$i]["stock_id"].'">View&hellip;</button></td>'; 
	        		        
				echo "</tr>";        
        }
        //while ($row = mysqli_fetch_assoc($listResult)) {
          //echo "<tr>";
            // $row is array... foreach( .. ) puts every element
            // of $row to $cell variable
            //foreach($row as $cell)
              //echo "<td>$cell</td>";
//
//          echo '<td><button onclick="window.location.href=\'/stock/edit_stock.php?stock_id='.$row["stock_id"].'\'" title="Edit item '.$row["stock_id"].'">Edit&hellip;</button></td>';
//	        echo '<td><button onclick="window.location.href=\'/stock/view_stock.php?stock_id='.$row["stock_id"].'\'" title="View item '.$row["stock_id"].'">View&hellip;</button></td>';
          
  //        echo "</tr>".PHP_EOL.PHP_EOL;
   //     }
        echo "</table>".PHP_EOL;

//        mysqli_free_result($listResult);
        
        echo $Paginator->createLinks( $links, 'pagination pagination-sm' );
?>
</main>

<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
