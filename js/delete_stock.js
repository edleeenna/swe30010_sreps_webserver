/*
* Author: Elena Deen, 7353065
* Target: orginally edit_stock.php, borrowed by John for augmenting delete_stock.php.
* Purpose: validate data, because if the user doens't input correct values the insert statement to the database wont work
* Created: 21/04/2016
* Last updated: 30/04/2016
* Credits: stackoverflow, w3schools (links can be found where used)
*/

function init(){
	// initalise form
	var js_delete_stock = document.getElementById("delete_stock");
	js_delete_stock.onsubmit = validate_stock;
	
	// initialise select fields
	$(document).ready(function() {
		$('select').material_select();
	});
	// 
	var js_submit_delete = document.getElementById("delete_item");
	js_submit_delete.onclick = alert("Test button click.");
}

window.onload = init;
