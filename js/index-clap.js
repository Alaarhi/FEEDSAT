var clap = document.getElementsByClassName('clap');
var clapIcon = document.getElementsByClassName('clap--icon');
var btnDimension = 80;
var tlDuration = 300;
var numberOfClaps = 0;
var clapHold = void 0;

var triangleBurst = new mojs.Burst({
  parent: clap,
  radius: { 50: 95 },
  count: 5,
  angle: 30,
  children: {
    shape: 'polygon',
    radius: { 6: 0 },
    scale: 1,
    stroke: 'rgba(211,84,0 ,0.5)',
    strokeWidth: 2,
    angle: 210,
    delay: 30,
    speed: 0.2,
    easing: mojs.easing.bezier(0.1, 1, 0.3, 1),
    duration: tlDuration
  }
});
var circleBurst = new mojs.Burst({
  parent: clap,
  radius: { 50: 75 },
  angle: 25,
  duration: tlDuration,
  children: {
    shape: 'circle',
    fill: 'rgba(149,165,166 ,0.5)',
    delay: 30,
    speed: 0.2,
    radius: { 3: 0 },
    easing: mojs.easing.bezier(0.1, 1, 0.3, 1)
  }
});





i=0;
for(i=0;i<clap.length;i++){
clap[i].addEventListener('click', function () {
  j=this.id;

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