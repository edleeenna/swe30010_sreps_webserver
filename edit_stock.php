<?php
  //echo "Start<br>".PHP_EOL;
  include 'includes/head.php';
  //echo "connect<br>".PHP_EOL;
  // Include functions for editing stock. Could be made part of all functions for stock. eg: stock_func.php
  include 'includes/stock_func_edit.php';

  if (!isset($_POST['item_select'])) {
?>
    <form id="stock_item" action="edit_stock.php" method="post">
      Select stock item to edit, by ID or Name.<br>
      <select name="html_selected_id">
<?php
        get_ID_list();
?>
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
    $php_stock_details = get_stock_item_details($_POST['html_selected_id']);
    //$stock_details = get_stock_item_details($_POST['name_list']);
    // onsubmit="return check_stock_details(this)"
?>
      <form id="stock_item" action="edit_stock.php" method="post">
        Item ID: <input class="stock_edit" type="text" name="item_id" value="<?php echo $php_stock_details[0];?>"><br>
        Item Name: <input class="stock_edit" type="text" name="item_name" value="<?php echo $php_stock_details[1];?>"><br>
        Item Description: <input class="stock_edit" type="text" name="item_description" value="<?php echo $php_stock_details[2];?>"><br>
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
