<?php
	// Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';

	if (!isset ($_POST['sale_id')) {
		echo 'Error deleting orderline. Sale ID required via post';
		exit();
	}
	
	$sale_id = $_GET['sale_id'];	    
	    
/// Delete sale by matching sale id and stock id
	$sql_update = <<<SQL
    	DELETE FROM sales 
    	WHERE sale_id = $sale_id
SQL;
    
	try{
		// Query the database to acquire results and hand them to resultSet
		$result = $conn->query($sql);
    }
    catch(PDOEXCEPTION $e){
		// If there is an error, display error message details
		echo 'Error deleting sale: '.$e->getMessage();
		// Stop running script
		exit();
    }
	    
	
	// Close the connection to the Database.
	$conn->close();

/// Return to sales index
	header("location:/sales/");	

?>