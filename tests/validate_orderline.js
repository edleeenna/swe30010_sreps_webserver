/*

Testing user input is of correct values before inserting into database.
This file is for Distinction Task - Qualilty Review

*/



function validate_name(name)
{
	if (isNumber(name) == false ) {
		return "not valid";
	}
	else {
		return "valid";
	}
	
}


