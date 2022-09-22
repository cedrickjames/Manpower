/* global bootstrap: false */
(function () {
  'use strict'
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()

var sidebar=0;


function slideMainContent(){
if(sidebar==0){
document.getElementById("mainContent").style.width="100%";  
document.getElementById("mainContent").style.marginLeft= "0px"; 
// document.getElementById("sidebar").style.opacity= ""; 
// document.getElementById("sidebar").style.transition = "all .1s";

document.getElementById("mainContent").style.transition = "all .3s";






sidebar=1;
}
else{
  document.getElementById("mainContent").style.width="calc(100% - 280px)";  
document.getElementById("mainContent").style.marginLeft= "280px";  

sidebar=0;
}

}