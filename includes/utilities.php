<?php
// Converts the database column title to a more readable form
function get_column_name($val) {
	switch ($val) {
		case "stock_id":
			return "ID";
		case "stock_name":
			return "Name";
		case "stock_description":
			return "Description";
		case "stock_directions":
			return "Directions";
		case "stock_ingredients":
			return "Ingredients";
		case "stock_price":
			return "Price ($)";
		case "stock_cost_price":
			return "Cost Price ($)";
		case "stock_qty":
			return "Quantity";
		case "stock_target_min_qty":
			return "Minimum Quantity";
		case "stock_supplier":
			return "Supplier";
		case "stock_supplier_order_code":
			return "Order Code";
		case "stock_category_id":
			return "Category ID";
		case "stock_barcode":
			return "Barcode";
		case "category_name":
			return "Category";
		default:
			return "UNDEFINED";
	}
}
?>