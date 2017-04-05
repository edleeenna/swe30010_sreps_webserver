    
<?php

  include 'includes/head.php';
  include 'includes/db_connect.php';

 $stock_id = $_SESSION['stock_id'];// Stock ID int
 $stock_name = $_SESSION['stock_name'];// Name of the product
 $stock_description = $_SESSION['stock_description'];// Product description
 $stock_directions = $_SESSION['stock_directions']; // Item directions
 $stock_ingredients = $_SESSION['stock_ingredients'];// Ingridents 
 $stock_price = $_SESSION['stock_price']; // Current price
 $stock_cost_ptice = $_SESSION['stock_cost_ptice']; // costing price
 $stock_qty = $_SESSION['stock_qty'];// amount in stock
 $stock_target_min_qty = $_SESSION['stock_target_min_qty'];// min amount to have in stock
 $stock_supplier = $_SESSION['stock_supplier'];// supplier name
 $stock_supplier_order_code = $_SESSION['stock_supplier_order_code']; //supplier code
 $stock_category_id = $_SESSION['stock_category_id']; // category ID
 $stock_bar_code = $_SESSION['stock_bar_code'];// barcode ID

    if (!$conn) { //If Cannot Connect Display Error Message
        echo "Unable to connect to the stock database"; 
    } 
    else { 
        $sqltable="stock"; 
        $query = "INSERT INTO $sqltable (stock_id, stock_name, stock_description, stock_directions,
        stock_ingredients, stock_price, stock_cost_ptice, stock_qty, stock_target_min_qty, stock_supplier, 
        stock_supplier_order_code, stock_category_id, stock_bar_code) 
        VALUES ('$stock_id', '$stock_name', '$stock_description', '$stock_directions', '$stock_ingredients',
        '$stock_price', '$stock_cost_ptice', '$stock_qty', '$stock_target_min_qty', '$stock_supplier',
        '$stock_supplier_order_code', '$stock_category_id', '$stock_bar_code');"; 

        $result = mysqli_query($conn, $query); //execute query to insert user entered values into stock table
        }

    ?>



