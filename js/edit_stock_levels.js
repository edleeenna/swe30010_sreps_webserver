alert('edit_stock_level.js loaded');
function focusgain(e){
  e.classList.add('focused'), true);
}
function focuslost(e){
  e.classList.remove('focused'), true);
}
var pieces document.getElementsByClassName("TCR");
for (var i = 0; i < pieces.length; i++) {
  pieces[i].addEventListener('focus', focusgain(this));
  pieces[i].addEventListener('blur', focuslost(this));
}
