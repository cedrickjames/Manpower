function addYear(){
    fsyear1 = document.getElementById('fsyear1').value;
    fsyear2 = document.getElementById('fsyear2').value;
    fsyear1++;
    document.getElementById('fsyear2').value = fsyear1;
}
function lessYear(){
    fsyear1 = document.getElementById('fsyear1').value;
    fsyear2 = document.getElementById('fsyear2').value;
    fsyear2--;
    document.getElementById('fsyear1').value = fsyear2;
}