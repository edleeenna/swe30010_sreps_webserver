<?php
	// Connect to database.
    include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';    
	    
/// Delete sale by matching sale id and stock id
	$sql = <<<SQL
    	INSERT INTO sales VALUES ()
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
	    
	$sale_id = mysqli_insert_id($conn);
	
	// Close the connection to the Database.
	$conn->close();

/// Return to add sale;
	header("location:/sales/add_sale.php?sale_id=$sale_id");	
?>