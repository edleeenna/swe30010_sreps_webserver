<?php
  include 'includes/head.php';
  ?>
<h2>Add Stock</h2>
<form method="" action="">
  <fieldset>
    <legend>Add Stock</legend>
    <p>
      <label for="itemId">Item Id: </label>
      <input type="number" id="itemId" name="itemId">
    </p>
    <p>
      <label for="itemName">Item Name: </label>
      <input type="text" id="itemName" name="itemName">
    </p>
    <p>
      <label for="itemDescription">Item Description: </label>
      <input type="text" id="itemDescription" name="itemDescription" >
    </p>
    <p>
      <label for="directions">Directions: </label>
      <input name="directions" id="directions">
    </p>
    <p>
      <label for="ingredients">Ingredients: </label>
      <input type="text" id="ingredients" name="ingredients">
    </p>
    <p>
      <label for="itemprice">Item Price: </label>
      <input type="number" id="itemprice" name="itemprice">
    </p>
    <p>
      <label for="itemCostPrice">Item Cost Price: </label>
      <input type="number" id="itemCostPrice" name="itemCostPrice">
    </p>
    <p>
      <label for="itemQty">Item Qty: </label>
      <input type="number" id="itemQty" name="itemQty">
    </p>
    <p>
      <label for="itemTarget">Item Target</label>
      <input type="number" id="itemTarget" name="itemTarget">
    </p>
    <p>
      <label for="itemSupplier">Item Supplier</label>
      <input type="text" id="itemSupplier" name="itemSupplier">
    </p>
    <p>
      <label for="itemSuppliercode">Item Supplier Code</label>
      <input type="number" id="itemSuppliercode" name="itemSuppliercode">
    </p>
    <p>
      <label for="itemCategoryId">Item Supplier Code</label>
      <input type="number" id="itemCategoryId" name="itemCategoryId">
    </p>
    <p>
      <label for="itemBarcode">Item Barcode</label>
      <input type="number" id="itemBarcode" name="itemBarcode">
    </p>
    <p>
      <input type="reset" id="reset">
      <input type="submit" id="submit" value="Add Stock">
    </p>
  </fieldset>
</form>
<?php echo '<p>SWE30010 - Development Project 2</p>'; ?>
Page content End<br>
<?php
  include 'includes/tail.php';
  ?>
