<?php
/**
 * index.php
 *
 * @package    Sprint 1
 * @author     Group 0
 * @copyright  2017
 * @todo 	   Sales Reporting and Prediction System
 */
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales Reporting and Prediction System</title>
	<link href="style.css" rel="stylesheet" type="text/css" /> 
</head>
<body>
<h1>Sales Reporting and Prediction System</h1>
<?php include("menu.php"); ?>
<article>
<fieldset>
<legend>Sale</legend>
<p>
				<label for='iname'>Item Name:</label>
				<input type='text' name='iname' id='iname' value='' /><span id='iname'></span>
			
<p>
<p>
				<label for='qty'>Quantity:</label>
				<input type='qty' name='qty' id='qty' value='' /><span id='qty'></span>
			
<p>
<p>
			<input type='reset' value='Reset'/>
			<input type='button' value='Add' onClick='formValidation()'/>
			</p>
</fieldset>
<br>
<fieldset>
<legend>Sale table</legend>

<table class='box'>

							<tr ><td colspan='4'><h4>Item List</h4>
							</td></tr>
							<tr>
							<td><label for='itname'>Name</label></td>
							<td><label for='itname'>Quantity</label></td>
							<td><label for='itname'>Edit</label></td>
							<td><label for='itname'>Delete</label></td>
							</tr>



							<tr>
							<td><label for='itname'>Item 1</label></td>
							<td><label for='itname'>9</label></td>
							<td><input type='button' value='Edit' onClick='edit()'/></td>
							<td><input type='button' value='Delete' onClick='delete()'/></td>
							</tr>


							<tr>
							<td><label for='itname'>Item 2</label></td>
							<td><label for='itname'>10</label></td>
							<td><input type='button' value='Edit' onClick='edit()'/></td>
							<td><input type='button' value='Delete' onClick='delete()'/></td>
							</tr>
					</table>
</fieldset>
</article>
<?php
include("footer.php");
?>
</body>
</html>
