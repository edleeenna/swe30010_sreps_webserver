/*
* Author: Elena Deen, 7353065
* Target: edit_stock.php
* Purpose: validate data, because if the user doens't input correct values the insert statement to the database wont work
* Created: 21/04/2016
* Last updated: 30/04/2016
* Credits: stackoverflow, w3schools (links can be found where used)
*/

function init(){
	// initialise select fields
	$(document).ready(function() {
		$('select').material_select();
	});

}

window.onload = init;
