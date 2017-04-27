function validate_stock() {
	'use strict';
	var err = '';
	var result = true;
	var focus = '';
	
	/// stock name
	var stock_name = document.getElementById("html_stock_name").value;
	var stock_name_err = document.getElementById("html_stock_name_validation");
	if (isNull(stock_name)) {
		stock_name_err.innerHTML = "*Must not be empty*";
	
		err = "stock_name";
		result = false;
		if (isNull(focus)) { focus = stock_name_err; }
	} else {
		stock_name_err.innerHTML = "";
	}
	
	/// stock description
	
	/// stock directions
	
	/// stock ingrediants
	
	/// stock price
	var stock_price = document.getElementById("html_stock_price").value;
	var stock_price_err = document.getElementById("html_stock_price_validation");
	
	if (isNull(stock_price)) {
		stock_price_err.innerHTML = "*Must not be empty*";
	
		err = "stock_price";
		result = false;
		if (isNull(focus)) { focus = stock_price_err; }
		
	} else if (!stock_price.match(/^\s*-?[1-9]\d*(\.\d{1,2})?\s*$/)) {
		stock_price_err.innerHTML = "*Must enter a decimal greater than 0*";
		result = false;		
		if (isNull(focus)) { focus = stock_price_err; }
	} else {
		stock_price_err.innerHTML = "";
	}

	/// stock cost price
	var stock_cost_price = document.getElementById("html_stock_cost_price").value;
	var stock_cost_price_err = document.getElementById("html_stock_cost_price_validation");
	
	if (isNull(stock_cost_price)) {
		stock_cost_price_err.innerHTML = "*Must not be empty*";
	
		err = "stock_cost_price";
		result = false;
		if (isNull(focus)) { focus = stock_cost_price_err; }

	} else if (!stock_cost_price.match(/^\s*-?[1-9]\d*(\.\d{1,2})?\s*$/)) {
		stock_cost_price_err.innerHTML = "*Must enter a decimal greater than 0*";
		err = "stock_cost_price";
		result = false;
		if (isNull(focus)) { focus = stock_cost_price_err; }
	} else {
		stock_cost_price_err.innerHTML = "";
	}
	
	/// stock qty
	var stock_qty = document.getElementById("html_stock_qty").value;
	var stock_qty_err = document.getElementById("html_stock_qty_validation");
	
	if (isNumber(stock_qty) && isPositiveInt(stock_qty)) {
		stock_qty_err.innerHTML = "*Must be a positive integer*";
	
		err = "stock_qty";
		result = false;
		if (isNull(focus)) { focus = stock_qty_err; }
	} else {
		stock_qty_err.innerHTML = "";
	}

	/// stock target min qty
	var stock_target_min_qty = document.getElementById("html_stock_target_min_qty").value;
	var stock_target_min_qty_err = document.getElementById("html_stock_target_min_qty_validation");

	if (isNumber(stock_target_min_qty) && isPositiveInt(stock_target_min_qty)) {
		stock_target_min_qty_err.innerHTML = "*Must be a positive integer*";
	
		err = "stock_target_min_qty";
		result = false;
		if (isNull(focus)) { focus = stock_target_min_qty_err; }
	} else {
		stock_target_min_qty_err.innerHTML = "";
	}
	
	/// stock supplier
	
	/// stock supplier order code
	
	/// stock category
	var stock_category_id = document.getElementById("html_stock_category_id").value;
	var stock_category_id_err = document.getElementById("html_stock_category_id_validation");
	
	if (isNull(stock_category_id)) {
		stock_category_id_err.innerHTML = "*Must select a category*";
	
		err = "stock_price";
		result = false;
		if (isNull(focus)) { focus = stock_category_id_err; }
		
	} else {
		stock_category_id_err.innerHTML = "";
	}

	
	/// stock barcode
		
	//alert(err);
	if (!isNull(focus)) {
		focus.focus();
		focus.scrollIntoView();
	}
	
	return result;
}

function isPositiveInt(val) {
	if (true) {
		return true;
	} else {
		return false;
	}
}

function isNull(val) {
	if (val == "" || val == '' || val == null) {
	 	return true;
	 } else {
	 	return false;
	 }
}

//checking if input is a number
function isNumber(number) {
	if (isNaN(number)){
		return true;
	} else {
		return false;
	}
}
