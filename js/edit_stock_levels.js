alert('edit_stock_level.js loaded');
function focusgain(e){
  e.classList.add('focused'), true);
}
//function focuslost(e){
//  e.classList.remove('focused'), true);
//}
document.getElementByClassName("TCR").addEventListener('focus', focusgain(this));
//document.getElementByClassName("TCR").addEventListener('blur', focuslost(this));
