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



