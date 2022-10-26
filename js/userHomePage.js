
function seePassword() {
  var checkBox = document.getElementById("seepassword");
  var password = document.getElementById("passwordSignin");
  var password1 = document.getElementById("passwordSignin1");

  if (checkBox.checked == true) {
    password.setAttribute("type", "text");
    password1.setAttribute("type", "text");
  } else {
    password.setAttribute("type", "password");
    password1.setAttribute("type", "password");
  }
}

function showTableForModel(id, Linename){
// document.getElementById("tableForModel").style.display=null;
// document.getElementById("cardholder").style.display="none";
// document.getElementById("bcModel").style.display=null;
// document.getElementById("forecastForm").style.display="none";

document.getElementById("containerOfLineId").value=id;
document.getElementById("idOfLine").value=id;

document.getElementById("InputLineName").value=Linename;

document.getElementById("nameOfLine").innerHTML=Linename;


}
function showLine(){

    if(document.getElementById("tableForModel").style.display!="none"){
        document.getElementById("bcModel").style.display="none";
        document.getElementById("tableForModel").style.display="none";
        document.getElementById("cardholder").style.display=null;
    }
else if(document.getElementById("forecastForm").style.display!="none"){
    document.getElementById("bcModel").style.display=null;
    document.getElementById("tableForModel").style.display=null;
    document.getElementById("cardholder").style.display="none";
document.getElementById("forecastForm").style.display="none";

}
}
function hideForcast(){
  document.getElementById("tableForModel").style.display="block";
  document.getElementById("gbForecast").style.display="none";
  document.getElementById("forecastForm").style.display="none";
  document.getElementById("bcModel").style.display="flex";

}
function showFormAddForecast(id, name,japan,gpi,actualTime, numberOfAssign){
document.getElementById("searchInput").style.display="none"
  document.getElementById("bcModel").style.display="none";
document.getElementById("tableForModel").style.display="none";
document.getElementById("gbForecast").style.display="flex";
document.getElementById("forecastForm").style.display="block";
document.getElementById("nameOfTheModel").innerHTML=name;
document.getElementById("modelIdContainer").value=id;
document.getElementById("inputModel").value=name;
document.getElementById("inputJpnSTU").value=japan;
document.getElementById("inputGpiSTU").value=gpi;
document.getElementById("inputActualTime").value=actualTime;
document.getElementById("inputActualManpower").value=numberOfAssign;







}
var a=0;


function showForecastOptions(){
    console.log("Options");
    if(a==0){
        document.getElementById("forecastOption").style.display="block";
        document.getElementById("forecastOption").classList.remove("mystyle");

        var element = document.getElementById("dropdownIcon");
  element.classList.remove("fa-caret-down");
  element.classList.add("fa-caret-up");

a=1;
    }
    else{
        document.getElementById("forecastOption").style.display="none";
        var element = document.getElementById("dropdownIcon");
        element.classList.remove("fa-caret-up");
        element.classList.add("fa-caret-down");
a=0;
    }

    
}
var b=1;
function showForecastOptions2(){
  console.log("Options");
  if(b==0){
      document.getElementById("forecastOption2").style.display="block";
      document.getElementById("forecastOption2").classList.remove("mystyle");

      var element = document.getElementById("dropdownIcon2");
element.classList.remove("fa-caret-down");
element.classList.add("fa-caret-up");

b=1;
  }
  else{
      document.getElementById("forecastOption2").style.display="none";
      var element = document.getElementById("dropdownIcon2");
      element.classList.remove("fa-caret-up");
      element.classList.add("fa-caret-down");
b=0;
  }

  
}
showForecastOptions2();

function hideSidebar(){
 var side =  document.getElementById("offcanvasExample2");
 side.classList.remove("show");
 var backdrop = document.getElementsByClassName("offcanvas-backdrop");
 backdrop.classList.remove("show");

}
// const image_input = document.querySelector("#inputImage");
// function insertPicture(){
//     // var image = document.getElementById("inputImage").files[0].name; 
//     // document.getElementById("alternativeImage").display="none";
//     // document.getElementById("cardImage").display="block";

//     // document.getElementById("cardImage").src = image;

//     const reader = new FileReader();
//   reader.addEventListener("load", () => {
//     const uploaded_image = reader.result;
//     document.querySelector("#cardImage").style.backgroundImage = `url(${uploaded_image})`;
//     // document.getElementById("cardImage").src = `url(${uploaded_image})`;
//   });
//   reader.readAsDataURL(this.files[0]);
// }
var validImagetypes=["image/gif", "image/jpeg", "image/png"];
function previewImage(image_blog){
  document.getElementById("alternativeImage").style.display="none";
  // document.getElementById("cardImage").display=null;
  $("#cardImage").fadeIn();

  
    if(image_blog.files && image_blog.files[0])
    {
     var reader=new FileReader();
     var pictureeme =  $("#inputImage").prop("files")[0];
       reader.onload=function(e)
       {
         $("#cardImage").attr('src', e.target.result);
        //  $("#cardImage").fadeIn();
         if($.inArray(pictureeme["type"], validImagetypes)<0)
         {
          $("#inputImage").addClass("is-invalid")
          return;
         }
         else{
           $("#inputImage").removeClass("is-invalid");
         }
       }
       reader.readAsDataURL(image_blog.files[0]);
   
    }
   }
   $("#inputImage").change(function(){
     previewImage(this);
   });

   document.getElementById("floatingInputName").onkeyup = function() {typeName()};
   function typeName(){
    var nameValue = document.getElementById("floatingInputName");
    // x.value.toUpperCase();
    document.getElementById("machineName").innerHTML=nameValue.value;
  // console.log(x.value);
   }
   document.getElementById("floatingDescription").onkeyup = function() {typeDesc()};
   function typeDesc(){
    var descValue = document.getElementById("floatingDescription");
    // x.value.toUpperCase();
    document.getElementById("machineDescription").innerHTML=descValue.value;
  // console.log(x.value);
   }
   document.getElementById("floatingLocation").onchange = function() {typeLoc()};
   function typeLoc(){
    var locValue = document.getElementById("floatingLocation");
    // x.value.toUpperCase();
    document.getElementById("machineLocation").innerHTML=locValue.value;
  // console.log(x.value);
   }

   function clickCard(id){
document.getElementById(id).click();
   }

   function enableWorkingDaysEdit(name){
    document.querySelectorAll('input').forEach(element => element.disabled = false);
    document.getElementById('year1').style.display="none";
    document.getElementById('year2').style.display="block";

   }


   function compute(){
    //TOTAL GPI TARGET
    var gpiStu = document.getElementById("inputGpiSTU").value;
    var projection = document.getElementById("inputProjQnty").value;
    var tot=parseFloat(gpiStu) * parseFloat(projection);

    if(projection=="")
    {
           document.getElementById("inputTotGpiTarget").value =  0;
    }
    else
    {
        document.getElementById("inputTotGpiTarget").value =  tot.toFixed(2);
       //END GPI TARGET
    }


    //TOTAL ACTUAL TIME
    var actime = document.getElementById("inputActualTime").value;
    var projection2 = document.getElementById("inputProjQnty").value;
    var tot2=parseFloat(actime) * parseFloat(projection2);

    document.getElementById("inputTotActual").value =  tot2.toFixed(2);

    //END ACTUAL TIME


    //forecast actual
    
    var noDays=document.getElementById("inputdaysOfWork").value;
    var totactual=document.getElementById("inputTotActual").value;
    var tot3=(parseFloat(totactual)/435)/parseFloat(noDays);
 
    document.getElementById("inputForAct").value =  tot3.toFixed(2);

    //end of forecast actual

    //forecast manpower

    var totgpitarget=document.getElementById("inputTotGpiTarget").value;
    var tot4=(parseFloat(totgpitarget)/435)/parseFloat(noDays)
    document.getElementById("inputMFGT").value =  tot4.toFixed(2);

    //end forecast manpower


    //amount
    var manPower=document.getElementById("inputActualManpower").value;
    var tot5=parseFloat(manPower)-parseFloat(tot3);
    document.getElementById("inputFinalForecast").value =  tot5.toFixed(2);
    
    //end of amount
   }
   function editcompute(){
    //TOTAL GPI TARGET
    var gpiStu = document.getElementById("editinputGpiSTU").value;
    var projection = document.getElementById("editinputProjQnty").value;
    var tot=parseFloat(gpiStu) * parseFloat(projection);

    if(projection=="")
    {
           document.getElementById("editinputTotGpiTarget").value =  0;
    }
    else
    {
        document.getElementById("editinputTotGpiTarget").value =  tot.toFixed(2);
       //END GPI TARGET
    }


    //TOTAL ACTUAL TIME
    var actime = document.getElementById("editinputActualTime").value;
    var projection2 = document.getElementById("editinputProjQnty").value;
    var tot2=parseFloat(actime) * parseFloat(projection2);

    document.getElementById("editinputTotActual").value =  tot2.toFixed(2);

    //END ACTUAL TIME


    //forecast actual
    
    var noDays=document.getElementById("editinputdaysOfWork").value;
    var totactual=document.getElementById("editinputTotActual").value;
    var tot3=(parseFloat(totactual)/435)/parseFloat(noDays);
 
    document.getElementById("editinputForAct").value =  tot3.toFixed(2);

    //end of forecast actual

    //forecast manpower

    var totgpitarget=document.getElementById("editinputTotGpiTarget").value;
    var tot4=(parseFloat(totgpitarget)/435)/parseFloat(noDays)
    document.getElementById("editinputMFGT").value =  tot4.toFixed(2);

    //end forecast manpower


    //amount
    var manPower=document.getElementById("editinputActualManpower").value;
    var tot5=parseFloat(manPower)-parseFloat(tot3);
    document.getElementById("editinputFinalForecast").value =  tot5.toFixed(2);
    
    //end of amount
   }
   function computeGpiStu(){
                      
console.log("computed");
    jpstu= document.getElementById("InputJPNSTU").value;
  
     tot=parseFloat(jpstu) * parseFloat(1.3);
          
     if(jpstu==""){
      document.getElementById("InputGPISTU").value ="";
     }else{

     document.getElementById("InputGPISTU").value = tot.toFixed(2);


  }
     
 }


 $('#lineselect').change(function() {
  var $options = $('#machineSelect')
  .val('')
  .find('option')
  .show();
  if (this.value != '0')
  $options
  .not('[data-val="' + this.value + '"], [data-val="one"]')
  .hide();
  $('#machineSelect option:eq(0)').prop('selected', true)
  // console.log("asd");

  })

  $('#lineselect2').change(function() {
    var $options = $('#machineSelect2')
    .val('')
    .find('option')
    .show();
    if (this.value != '0')
    $options
    .not('[data-val="' + this.value + '"], [data-val="one"]')
    .hide();
    $('#machineSelect2 option:eq(0)').prop('selected', true)
    // console.log("asd");
  
    })
  // function filterOptions(){
  //   var $options = $('#machineSelect')
  //   .val('')
  //   .find('option')
  //   .show();
  //   if (this.value != '0')
  //   $options
  //   .not('[data-val="' + this.value + '"],[data-val=""]')
  //   .hide();
  //   console.log("asd");
  // }


  
 function filterMachine(){
  var checkBox = document.getElementById("machineSelect").value;

            var table = document.getElementById('manpowerBody');
            let tr = table.querySelectorAll('tr');
            
            for(let index=0; index < tr.length;index++){
                let val = tr[index].getElementsByTagName('td')[6];
                if(val.innerHTML.indexOf(checkBox)> -1){
                    tr[index].style.display='';
        
                }
                else{
                    tr[index].style.display='none';
                }
            }
        
 }
 function filterMachineAll(){
  var checkBox = "";

  var table = document.getElementById('manpowerBody');
  let tr = table.querySelectorAll('tr');
  
  for(let index=0; index < tr.length;index++){
      let val = tr[index].getElementsByTagName('td')[6];
      if(val.innerHTML.indexOf(checkBox)> -1){
          tr[index].style.display='';

      }
      else{
          tr[index].style.display='none';
      }
  }

 }
 $(document).ready(function () {
  
  $('#forecastTableList').DataTable(  {
    "columnDefs": [
      { "width": "1%", "targets": 9 },
      {"className": "dt-center", "targets": "_all"}
    ],
    responsive: true,
    
  }   );

});
$(document).ready(function () {
  
  $('#manpowerTable').DataTable(  {
    responsive: true, 
  });
});

function showAddForecast(){
  var forecastTable = document.getElementById("forecastTable");
  forecastTable.classList.add("d-none");

  var forecastCard= document.getElementById("cardholder");
  forecastCard.classList.remove("d-none");
}
  

const deleteForecast = document.getElementById('deleteForecast')
deleteForecast.addEventListener('show.bs.modal', event => {
  // Button that triggered the modal
  const button = event.relatedTarget
  // Extract info from data-bs-* attributes
  const forecastId = button.getAttribute('data-bs-ForecastId')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  const forecastIDTitle = deleteForecast.querySelector('#forecastIDTitle');
  const forecastID = deleteForecast.querySelector('#forecastID');
  forecastID.value = forecastId;
  forecastIDTitle.innerHTML = forecastId;
})


function passForecastDataToEdit(forecast_Id, line, model, projection_Qty, gpiSTU, japanSTU, actual_time, total_gpi_target, total_actual, mp_forecast_gpi_target,actualForcast, total_manpower_needed, inputdaysOfWork, month, year){
  document.getElementById('EditForecastIdContainer').value=forecast_Id;
  document.getElementById('editchosenYearForecast').value=year;
  document.getElementById('editinputMonth').value=month;
  document.getElementById('editinputLine').value=line;
  document.getElementById('editinputModel').value=model;
  document.getElementById('editinputProjQnty').value=projection_Qty;
  document.getElementById('editinputdaysOfWork').value=inputdaysOfWork;
  document.getElementById('editinputActualManpower').value=
  document.getElementById('editinputJpnSTU').value=japanSTU
  document.getElementById('editinputGpiSTU').value=gpiSTU;
  document.getElementById('editinputActualTime').value=actual_time;
  document.getElementById('editinputTotGpiTarget').value=total_gpi_target;
  document.getElementById('editinputTotActual').value=total_actual;
  document.getElementById('editinputMFGT').value=mp_forecast_gpi_target;
  document.getElementById('editinputFinalForecast').value=total_manpower_needed;
  document.getElementById('editinputForAct').value=actualForcast;



}


(function($) {

	"use strict";

	$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

})(jQuery);


var showsulok = false;
function showSulok(){
  if(showsulok == false){
    var element = document.getElementById("sulok");
    element.classList.remove("d-none");
    showsulok=true;
  }
  else{
      var element = document.getElementById("sulok");
      element.classList.add("d-none");
      showsulok=false;
  }
  
  var element = document.getElementById("dropdownIcon");
  element.classList.remove("fa-caret-up");
  element.classList.add("fa-caret-down");
}


