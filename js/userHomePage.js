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
function showFormAddForecast(id, name){

  document.getElementById("bcModel").style.display="none";
document.getElementById("tableForModel").style.display="none";
document.getElementById("gbForecast").style.display="flex";
document.getElementById("forecastForm").style.display="block";
document.getElementById("nameOfTheModel").innerHTML=name;
document.getElementById("modelIdContainer").value=id;


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
   }