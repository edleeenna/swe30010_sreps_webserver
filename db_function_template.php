<?php
  // This is not working code until all syntax is correct.
  // It is a base template to help you start your own.

  // Start of function X
  function <function_name>(){

    // Include the "db_connect.php" file to connect to the database.
    include 'includes/db_connect.php';

    try{
      // Place your SQL Code here and amend this comment to reflecty purpose.
      $sql = "<Your SQL here EG: SELECT * FROM table; >";
      // Query the database to acquire results and hand them to resultSet
      $result = $conn->query($sql);
    }
    catch(PDOEXCEPTION $e){
      // If there is an error, display error message details
      echo 'Error fetching user login details: '.$e->getMessage();
      // Stop running script
      exit();
    }

    // Display your results here in whatever form you need. Will require
    // changing the code depending on the type of SQL Query and desired output.
    if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
        //echo "ID: " . $row["<field_name>"]. " - Name: " . $row["<field_name>"]. " - Description: " . $row["<field_name>"]. "<br>";
        print_r (array_values($row));
        echo "<br><br>".PHP_EOL;
      }
    }
    else {
      // Indictate no results found if empty set.
      echo "0 results";
    }

    // Close the connection to the Database.
    $conn->close();
  }
?>
