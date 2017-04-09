<?php
  //echo "Start<br>".PHP_EOL;
  include 'includes/head.php';
  echo "Page specifically for editing stock levels and minimum target levels.<br>".PHP_EOL;
  // Include functions for editing stock. Could be made part of all functions for stock. eg: stock_func.php
  include 'includes/stock_func_edit.php';
  update_stock();
  if (!isset($_POST['html_item_select'])) {
?>
    <form id="stock_item" action="edit_stock.php" method="post">
      Select stock item to edit, by ID or Name.<br>

<?php
        get_limited_stock_list();
?>

<?php /*
      <select name="name_list">
        get_name_list();
      </select>*/
?>
      <input type="submit" name="html_item_select" value="Edit Stock Item"> <input type="reset" value="Reset selection.">
<?php
  }
  else{
    $php_stock_details = get_stock_item_details($_POST['html_selected_id']);
    //$stock_details = get_stock_item_details($_POST['name_list']);
    // onsubmit="return check_stock_details(this)"
?>
      <form id="stock_item" action="edit_stock.php" method="post">
        Item Id: <input class="stock_edit" type="text" name="html_stock_id" value="<?php echo $php_stock_details['id'];?>" readonly><br>
        Item Name: <input class="stock_edit" type="text" name="html_stock_name" value="<?php echo $php_stock_details['name'];?>"><br>
        Item Description: <input class="stock_edit" type="text" name="html_stock_description" value="<?php echo $php_stock_details['description'];?>"><br>
        Item Price: <input class="stock_edit" type="text" name="html_stock_price" value="<?php echo $php_stock_details['price'];?>"><br>
        Item Cost Price: <input class="stock_edit" type="text" name="html_stock_cost_price" value="<?php echo $php_stock_details['cost_price'];?>"><br>
        Item Quantity: <input class="stock_edit" type="text" name="html_stock_qty" value="<?php echo $php_stock_details['qty'];?>"><br>
        Item Target Minimum Quantity: <input class="stock_edit" type="text" name="html_stock_target_min_qty" value="<?php echo $php_stock_details['target_min_qty'];?>"><br>
        Item Supplier: <input class="stock_edit" type="text" name="html_stock_supplier" value="<?php echo $php_stock_details['supplier'];?>"><br>
        Item Supplier Order Code: <input class="stock_edit" type="text" name="html_stock_supplier_order_code" value="<?php echo $php_stock_details['supplier_order_code'];?>"><br>
        Item Bar Code: <input class="stock_edit" type="text" name="html_stock_bar_code" value="<?php echo $php_stock_details['bar_code'];?>"><br>
        <input type="submit" name="html_item_update" value="Update Stock Item"> <input type="reset" value="Clear fields.">
<?php
  }
?>
    </form>
<?php
  include 'includes/tail.php';
?>
