/*
* Author: Elena Deen, 7353065
* Target: run_add_sale_tests.html
* Purpose: To test functional completeness for Distinction Task 10.7 - Quality Review
* Created: 14/05/2017
* Last updated: 14/05/2017
* Credits: QUnit
*/

var addSale = require('./js/add_sale.js');

QUnit.test("Hello Test", function(assert){
  assert.ok(1 == "1", "Passed!");
});

QUnit.test("Add Price Test", function(assert){
  var price = addSale.getPrice(1, 3);
  assert.true(price, 3);
});
