alert('edit_stock_level.js loaded');

function focusgain(e){
  alert('gained focus');
  //e.classList.add('focused'), true);
}
function focuslost(e){
  alert('focus lost');
  //e.classList.remove('focused'), true);
}
var pieces = document.getElementsByClassName("TCR");
//alert(pieces);

for (var i = 0; i < pieces.length; i++) {
  pieces[i].addEventListener('focus', focusgain(), true);
  pieces[i].addEventListener('blur', focuslost(), true);
}
