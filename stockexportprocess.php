<?php
//include 'includes/head.php';

include 'includes/db_connect.php';
  
$select = "SELECT * FROM stock";

$result = mysqli_query($conn, $select);

if (!$conn) {

  echo "<p> Database connection failure</p>";
}
else {
  if(!$result) {
    echo("Error description: " . mysqli_error($conn));
  }
else {
   
  $fields = mysqli_num_fields ( $result );

  for ( $i = 0; $i < $fields; $i++ ){
    $header .= mysqli_fetch_field_direct($result, $i)->name. "\t";
  }

  while( $row = mysqli_fetch_row( $result ) ){
    $line = '';
    foreach( $row as $value ){                                            
    if ( ( !isset( $value ) ) || ( $value == "" ) ){
      $value = "\t";
    }
    else {
      $value = str_replace( '"' , '""' , $value );
      $value = '"' . $value . '"' . "\t";
    }
      $line .= $value;
    }
    $data .= trim( $line ) . "\n";
  }

  $data = str_replace( "\r" , "" , $data );
  if ( $data == "" ){
    $data = "\n(0) Records Found!\n";                        
  }

  $date = date("Y-m-d");

  header("Content-type: text/csv");
  header("Content-Disposition: attachment; filename=".$date.".xls");
  header("Pragma: no-cache");
  header("Expires: 0");
  print "$header\n$data";
  }
}

mysqli_close($conn);

  include 'includes/tail.php';
?>