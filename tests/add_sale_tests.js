/*
* Author: Elena Deen, 7353065
* Target: run_add_sale_tests.html
* Purpose: To test functional completeness for Distinction Task 10.7 - Quality Review
* Created: 14/05/2017
* Last updated: 14/05/2017
* Credits: QUnit
*/

/*QUnit.module( "group a" );
QUnit.test( "a basic test example", function( assert ) {
  assert.ok( true, "this test is fine" );
});
QUnit.test( "a basic test example 2", function( assert ) {
  assert.ok( true, "this test is fine" );
}); */

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
