/*

Testing user input is of correct values before inserting into database.
This file is for Distinction Task - Qualilty Review

*/



function validate_name(name)
{	
	//if a number
	if (isNaN(name) == false ) {
		return "not valid";
	}
	//if not a number
	else {
		return "valid";
	}
	
}

function validate_qty(qty)
{
	//if a number
	if (isNaN(qty)) {
		return "this is not a number";
	}
	else if (qty < 0) {
		return "quantity cannot be less than 0";
	}
	//if not a number
	else {
		return "this is a valid number";
	}
		
}


