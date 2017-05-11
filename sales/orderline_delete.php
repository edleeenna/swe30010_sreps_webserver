<?php
    // Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

	if (!isset ($_POST['sale_id'])) {
		echo 'Error deleting orderline. Sale ID required via post';
		exit();
	} elseif (!isset ($_POST['stock_id'])) {
		echo 'Error deleting orderline. Stock ID required via post';
		exit();
	} elseif (!isset ($_POST['stock_qty'])) {
		echo 'Error deleting orderline. Stock qty required via post';
		exit();	
	}

	$sale_id = $_POST['sale_id'];
	$stock_id = $_POST['stock_id'];
	$stock_qty = $_POST['stock_qty'];


/// Update stock by inceaseing stock qty by matching stock id
	$sql_update = <<<SQL
    	UPDATE stock 
		SET stock_qty = stock_qty + $stock_qty
		WHERE stock_id = $stock_id
SQL;
    
	try{
		// Query the database to acquire results and hand them to resultSet
		$result = $conn->query($sql_update);
    }
    catch(PDOEXCEPTION $e){
		// If there is an error, display error message details
		echo 'Error updating stock: '.$e->getMessage();
		// Stop running script
		exit();
    }
	    
	    
/// Delete orderline by matching sale id and stock id
	$sql_delete = <<<SQL
    	DELETE FROM orderlines 
    	WHERE orderlines.orderline_sale_id = $sale_id AND orderlines.orderline_stock_id = $stock_id
SQL;
    
	try{
		// Query the database to acquire results and hand them to resultSet
		$result = $conn->query($sql_delete);
    }
    catch(PDOEXCEPTION $e){
		// If there is an error, display error message details
		echo 'Error deleting orderline: '.$e->getMessage();
		// Stop running script
		exit();
    }
	    
	
	// Close the connection to the Database.
	$conn->close();

/// Return to add sale;
	header("location:/sales/add_sale.php?sale_id=$sale_id");	
?>