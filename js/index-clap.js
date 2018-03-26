function clapping(j){
var clap = document.getElementsByClassName('clap');
var clapIcon = document.getElementsByClassName('clap--icon');
var btnDimension = 80;
var tlDuration = 300;
var numberOfClaps = 0;
var clapHold = void 0;
i=0;

for(i=j;i<clap.length;i++){
  
clap[i].addEventListener('click', function () {
  j=this.id;
  if(!document.getElementById(j+"1").classList.contains("disabled"))
  if(document.getElementById(j+"1").classList.contains("checked"))
  {
    document.getElementById(j+"1").classList.remove("checked");
    document.getElementById(j+"11").innerText=parseInt(document.getElementById(j+"11").innerText)-1;
  }
  else 
  {
    document.getElementById(j+"1").classList.add("checked");  
    document.getElementById(j+"11").innerText=parseInt(document.getElementById(j+"11").innerText)+1;    
  }
});


clap[i].addEventListener('mousedown', function () {
  clapHold = setInterval(function () {
    repeatClapping(i);
  }, 400);
});

clap[i].addEventListener('mouseup', function () {
  clearInterval(clapHold);
});

}
function repeatClapping(j) {
  clapIcon[j-1].classList.add('checked');
}
}




/*====== TODO ==========
1. Bug fix. The button shouldn't 
scale up before being clicked (fixed)
2. Shadow should NOT fire hover 
animation in succession. 
Some sort of delay is delay. (Not that important)
3. Hover animation should be 
absent upon click (Not that important)
4. Handle onpress event on the button (Implemetaation is Buggy ATM)
5. Dynamically change burst angle 
everytime button is clicked 
=========================*/