/*
* Author: Elena Deen, 7353065
* Target: addstock.php
* Purpose: validate data, because if the user doens't input correct values the insert statement to the database wont work
* Created: 21/04/2016
* Last updated: 30/04/2016
* Credits: stackoverflow, w3schools (links can be found where used)
*/

function validate() {
  'use strict';
  var errMsg = '', result = true;

  //validating item price
  var itemPrice = document.getElementById("itemprice").value;
  var itemPriceErr = document.getElementById("itemPriceValidation");

  if (!itemPrice.match(/^\s*-?[1-9]\d*(\.\d{1,2})?\s*$/)) {
    itemPriceErr.innerHTML = "*Must enter a decimal and must not be 0*";
    result = false;
  }

  //validating item cost price
  var itemCostPrice = document.getElementById("itemCostPrice").value;
  var itemCostPriceErr = document.getElementById("itemCostPriceValidation");

  if (!itemCostPrice.match(/^\s*-?[1-9]\d*(\.\d{1,2})?\s*$/)) {
    itemCostPriceErr.innerHTML = "*Must enter a decimal and must not be 0*";
    result = false;
  }

    //validating item quantity
  var itemQty = document.getElementById("itemQty").value;
  var itemQtyErr = document.getElementById("itemQtyValidation");

  //validating item target
  var itemTarget = document.getElementById("itemTarget").value;
  var itemTargetErr = document.getElementById("itemTargetValidation");

  var stockCategoryId = document.getElementById("itemCategoryId").value;
  var categoryIdErr = document.getElementById("categoryIdValidation");

  notNumber(itemTarget, itemTargetErr);
  notNumber(itemQty, itemQtyErr);
  notNumber(stockCategoryId, categoryIdErr);



  return result;

}

//checking if input is a number
function notNumber(number,errMsg) {
  var result = true;

  if (isNaN(number)){
    errMsg.innerHTML = "*Must enter a number*";
  }
}

function init(){

  var addStock = document.getElementById("addStockForm");
  addStock.onsubmit = validate;
}

window.onload = init;
