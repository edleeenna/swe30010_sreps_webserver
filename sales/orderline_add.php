<?php
// Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

	if (!isset ($_POST['sale_id'])) {
		echo 'Error inserting orderline. Sale ID required via post';
		exit();
	} elseif (!isset ($_POST['stock_id'])) {
		echo 'Error inserting orderline. Stock ID required via post';
		exit();
	} elseif (!isset ($_POST['stock_qty'])) {
		echo 'Error inserting orderline. Stock qty required via post';
		exit();	
	}

	$sale_id = $_POST['sale_id'];
	$stock_id = $_POST['stock_id'];
	$stock_qty = $_POST['stock_qty'];


/// Update stock by inceaseing stock qty by matching stock id
	$sql_update_stock = <<<SQL
    	UPDATE stock 
		SET stock_qty = stock_qty - $stock_qty
		WHERE stock_id = $stock_id
SQL;
    
	try{
		// Query the database to acquire results and hand them to resultSet
		$result = $conn->query($sql_update_stock);
    }
    catch(PDOEXCEPTION $e){
		// If there is an error, display error message details
		echo 'Error updating stock: '.$e->getMessage();
		// Stop running script
		exit();
    }
	    
	    
/// Delete orderline by matching sale id and stock id
	$sql_insert_orderline = <<<SQL
		INSERT INTO orderlines (orderline_sale_id, orderline_stock_id, orderline_qty, orderline_price)
		SELECT $sale_id, $stock_id, $stock_qty, stock.stock_price 
		FROM stock 
		WHERE stock.stock_id = $stock_id
SQL;
    
	try{
		// Query the database to acquire results and hand them to resultSet
		$result = $conn->query($sql_insert_orderline);
    }
    catch(PDOEXCEPTION $e){
		// If there is an error, display error message details
		echo 'Error inserting orderline: '.$e->getMessage();
		// Stop running script
		exit();
    }
	    
	
	// Close the connection to the Database.
	$conn->close();

/// Return to add sale;
	header("location:/sales/add_sale.php?sale_id=$sale_id");
?>