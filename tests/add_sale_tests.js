/*
* Author: Elena Deen, 7353065
* Target: run_add_sale_tests.html
* Purpose: To test functional completeness for Distinction Task 10.7 - Quality Review
* Created: 14/05/2017
* Last updated: 14/05/2017
* Credits: QUnit
*/


QUnit.test("Hello Test", function(assert){
  assert.ok(1 == "1", "Passed!");
});

QUnit.module( "Test getPrice" );
QUnit.test("Test getPrice returns a correct result", function(assert){
  var price = getPrice(1, 3);
  assert.equal(price, 3);
});
QUnit.test("Test getPrice returns a false result", function(assert){
  var price = getPrice(1, 4);
  assert.notEqual(price, 3);
});
QUnit.test("Test getPrice doesn't accept a string", function(assert){
  var price = getPrice(1, "four");
  assert.notOk(price);
});

QUnit.module( "Test Date time" );
QUnit.test( "Sale dateime is correct", function( assert ) {

  var datetime = document.getElementById("datetime").innerHTML;
  datetime = getDateTime();
  assert.equal(getDateTime(), datetime);
});

QUnit.test( "Sale dateime return false if incorrect", function( assert ) {
  var datetime = document.getElementById("datetime").innerHTML;
  datetime = "2017/09/05 2:00:00"
  assert.notEqual(getDateTime(), datetime);
});

QUnit.module("Test user input of orderline name is of a string value");
QUnit.test("Test orderline name returns a string", function(assert) {
  var result = validate_name("Ear Plugs");
  assert.equal(result, "valid");
});

QUnit.test("Test orderline value returns 'not valid' if name is not a string", function(assert) {
  var result = validate_name(1);
  assert.equal(result, "not valid");

});

QUnit.module("Test user input of orderline qty is a number");
QUnit.test("Test qty is a number. Return false if it is a number", function(assert) {
  var result = validate_qty(3);
  assert.equal(result, "this is a valid number");
});

QUnit.test('Test qty is not a number. Return true if not a number', function(assert) {
  var result = validate_qty("five");
    assert.equal(result, "this is not a number");
});







