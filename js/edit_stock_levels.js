//alert('edit_stock_level.js loaded');

function focusgain(e){
  //alert('gained focus');
  //e.classList.add('focused');
  //e.classList.add('focused', true);
}

function focusgone(e){
  //alert('focus lost');
  //e.classList.remove('focused', true);
}
var pieces = document.getElementsByClassName("TCR");
//alert(pieces);
var mylist ='';
for (var i = 0; i < pieces.length; i++) {
  mylist += pieces[i].localName+' '+pieces[i].innerText;
  pieces[i].addEventListener('focus', focusgain(this), true);
  pieces[i].addEventListener('blur', focusgone(this), true);
}
alert(mylist);
