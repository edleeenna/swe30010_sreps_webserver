<?php
  echo "Start<br>".PHP_EOL;
  include 'includes/head.php';
  echo "connect<br>".PHP_EOL;
  // Include functions for editing stock. Could be made part of all functions for stock. eg: stock_func.php
  include 'includes/stock_func_edit.php';

  function get_stock_item(){
    
    include 'includes/db_connect.php';
    echo "SQL<br>".PHP_EOL;

    try{
      echo "try<br>".PHP_EOL;
      // Test if any records match the supplied username and password
      $sql = "SELECT * FROM stock;";
      // Query the database to acquire results and hand them to resultSet
      $result = $conn->query($sql);
    }
    catch(PDOEXCEPTION $e){
      echo "catch<br>".PHP_EOL;
      // Display error message details
      echo 'Error fetching user login details: '.$e->getMessage();
      // Stop running script
      exit();
    }
    echo "results<br>".PHP_EOL;
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
      //while($row = $result->fetch()) {
        //echo "ID: " . $row["item_id"]. " - Name: " . $row["item_name"]. " - Description: " . $row["item_description"]. "<br>";
        print_r (array_values($row));
        echo "<br><br>".PHP_EOL;
      }
    }
    else {
      echo "0 results";
    }
    echo "Close<br>".PHP_EOL;
    $conn->close();
  }
  //get_stock_item();
  if (!isset($POST['stock_select'])) {
?>
    <form id="stock_item" action="edit_stock.php" method="post">
      Select stock item to edit, by ID or Name.<br>
      <select name="ID_list">
        get_ID_list();
      </select>
<?php /*
      <select name="name_list">
        get_name_list();
      </select>*/
?>
      <input type="submit" name="item_select" value="Edit Stock Item"> <input type="reset" value="Reset selection.">
<?php
  }
  else{
    $stock_details = get_stock_item_details($_POST['ID_list']);
    //$stock_details = get_stock_item_details($_POST['name_list']);
    // onsubmit="return check_stock_details(this)"
?>
      <form id="stock_item" action="edit_stock.php" method="post">
        Item ID: <input class="stock_edit" type="text" name="item_id" value="<?php echo $php_stock_details['item_id'];?>"><br>
        Item Name: <input class="stock_edit" type="text" name="item_name" value="<?php echo $php_stock_details['item_name'];?>"><br>
        Item Description: <input class="stock_edit" type="text" name="item_description" value="<?php echo $php_stock_details['item_description'];?>"><br>
        <input type="submit" name="item_update" value="Update Stock Item"> <input type="reset" value="Clear fields.">
<?php
  }
?>
    </form>
    Edit Stock Item<br>
    Item<br>
    ID:<br>
    Name:<br>
    Cost Price<br>
    Price <br>
    Quantity <br>
    Minimm Target Quantity:<br>
<?php
  include 'includes/tail.php';
?>
