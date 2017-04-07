<?php
  include 'includes/head.php';


  if (isset ($_POST["itemName"])) {
    $itemName = $_POST["itemName"];
  }

 if (isset ($_POST["itemDescription"])) {
    $itemDescription = $_POST["itemDescription"];
  }

  if (isset ($_POST["directions"])) {
    $directions = $_POST["directions"];

  }

  if (isset ($_POST["ingredients"])) {
    $ingredients = $_POST["ingredients"];

  }

  if (isset ($_POST["itemprice"])) {
    $itemprice = $_POST["itemprice"];

  }

  if (isset ($_POST["itemCostPrice"])){
    $itemCostPrice = $_POST["itemCostPrice"];
  }

  if(isset ($_POST["itemQty"])) {
    $itemQty = $_POST["itemQty"];
  }

  if(isset ($_POST["itemTarget"])) {
    $itemTarget = $_POST["itemTarget"];
  }

  if (isset ($_POST["itemSupplier"])){
    $itemSupplier= $_POST["itemSupplier"];
  }


  if(isset ($_POST["itemSupplierCode"])) {
    $itemSupplierCode = $_POST["itemSupplierCode"];
  }

  if(isset ($_POST["itemCategoryId"])) {
    $itemCategoryId = $_POST["itemCategoryId"];
  }
   if(isset ($_POST["itemBarcode"])) {
    $itemBarcode = $_POST["itemBarcode"];
  }
include 'includes/db_connect.php';
$sqltable = "stock";
$query = "INSERT INTO $sqltable (stock_id, stock_name, stock_description, stock_directions,
        stock_ingredients, stock_price, stock_cost_ptice, stock_qty, stock_target_min_qty, stock_supplier,
        stock_supplier_order_code, stock_category_id, stock_bar_code)
        VALUES ('$itemName', '$itemDescription', '$directions', '$ingredients', '$itemprice', '$itemCostPrice', '$itemQty', '$itemTarget', '$itemSupplier', '$itemSupplierCode', '$itemCategoryId', '$itemBarcode')";

    $result = mysqli_query($conn, $query);
if (!$conn) {

    echo "<p> Database connection failure</p>";
  }
  else {
    if(!$result) {
    echo "<p> Something is wrong with ", $query, "</p>";
    }

    else {
      echo "<p > Successfully added Stock to the database!! </p>";

    }
    }
      mysqli_close($conn);

  include 'includes/tail.php';
?>
