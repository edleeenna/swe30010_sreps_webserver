function formValidation(){  

	var result = true;
	var message = "";
	var datepicker = document.getElementById('datepicker').value;
	var datepicker1 = document.getElementById('datepicker1').value;

	// Name validation
	if (datepicker == ""){
		message += "- Please select start date.\n";
		
	}

	if (datepicker1 == ""){
		message += "- Please select end date.\n";
		
	}



	if (message){
		result = false;
		alert(message);
		message = "";
		
	}else{
		//Send information to php
		window.location.href = "salereport_process.php?datepicker=" + datepicker + "&datepicker1=" + datepicker1;

	}

	return result;
}