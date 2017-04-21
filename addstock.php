<?php
  // Variable to set the local (current) page title [NOT Site Title].
  //$pageTitle = "";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  //$extra_css = "";
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  //$extra_ja = "";

  include 'includes/head.php';
?>
    </nav>
    <main>
<h2>Add Stock</h2>
<form  id="addStockForm" method="post" action="stockadded.php">
  <fieldset>
    <legend>Add Stock</legend>
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
      <input name="directions" id="directions" name="directions">
    </p>
    <p>
      <label for="ingredients">Ingredients: </label>
    <input type="text" id="ingredients" name="ingredients">
    </p>
    <p>
      <label for="itemprice">Item Price: </label>
	  <span id="itemPriceValidation"></span>
      <input type="text" id="itemprice" name="itemprice">
    </p>
    <p>
      <label for="itemCostPrice">Item Cost Price: </label>
	  <span id="itemCostPriceValidation"></span>
      <input type="text" id="itemCostPrice" name="itemCostPrice">
    </p>
    <p>
      <label for="itemQty">Item Qty: </label>
	  <span id="itemQtyValidation"></span>
      <input type="text" id="itemQty" name="itemQty">
    </p>
    <p>
      <label for="itemTarget">Item Target</label>
	  <span id="itemTargetValidation"></span>
      <input type="text" id="itemTarget" name="itemTarget">
    </p>
    <p>
      <label for="itemSupplier">Item Supplier</label>
      <input type="text" id="itemSupplier" name="itemSupplier">
    </p>
    <p>
      <label for="itemSupplierCode">Item Supplier Code</label>
      <input type="text" id="itemSupplierCode" name="itemSupplierCode">
    </p>
    <p>
      <label for="itemCategoryId">Item Category Id</label>
	  <span id="categoryIdValidation"></span>
      <input type="text" id="itemCategoryId" name="itemCategoryId">
    </p>
    <p>
      <label for="itemBarcode">Item Barcode</label>
      <input type="text" id="itemBarcode" name="itemBarcode">
    </p>
    </fieldset>
    <p>
      <input type="reset" id="reset">
      <input type="submit" id="submit" value="Add Stock">
    </p>

</form>
<script src="js/addstockvalidation.js"></script>
    </main>
<?php
  include 'includes/tail.php';
?>
