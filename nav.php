


<nav class="navbar navbar-dark navbar-expand-sm shadow px-0 px-sm-3 sticky-top" style="background-color: #061362;">
    <div class="container-fluid px-3">
      <span class="navbar-brand me-4 	d-none d-lg-block " data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" onclick="slideMainContent()">
      <i class="fa-solid fa-bars fa-sm"></i>

      </span>
      <span class="navbar-brand me-4 	d-block d-lg-none d-none d-sm-block" data-bs-toggle="offcanvas" href="#offcanvasExample2" role="button" aria-controls="offcanvasExample">
      <i class="fa-solid fa-bars fa-sm"></i>
</span>
      <span class="navbar-brand  mb-0 h1">Manpower</span>
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <!-- <li class="flex-row-reverse navbar-toggler" onclick="showSulok()">
          <div class="pictureBadge m-0" style="background-image: url('<?php echo $_SESSION['profile_picture'] ; ?>');"></div>

      
          </li> -->
      <div class="" id="navbarNavDropdown">
        <ul class="navbar-nav ms-xl-5 ms-sm-0 mt-3 mt-sm-0 w-100 d-none">
          <li class="nav-item px-xl-2 ">
            <a class="nav-link active" aria-current="page" href="#">Production 1</a>
          </li>
          <li class="nav-item px-xl-2">
            <a class="nav-link " href="#"> Production 2</a>
          </li>
          <li class="nav-item px-xl-2">
            <a class="nav-link " href="#"> Quality Control</a>
          </li>

        </ul>
        <ul class="nav justify-content-end ml-0" style="width: 100%">
          <!-- <li class="nav-item mx-2 d-grid gap-2 d-none d-lg-flex">
          <button type="button" class="btn btn-success  fs-5 h-100 rounded-pill px-5 me-5 ">Invite
            <i class="fa-regular fa-envelope ps-2"></i>
          </button>
    </li> -->
          <li class="flex-row-reverse" onclick="showSulok()">
          <div class="pictureBadge m-0" style="background-image: url('<?php echo $_SESSION['profile_picture'] ; ?>');"></div>

      
          </li>
        </ul>
        <div class="w-15 h-15 bg-success"> </div>
      </div>
    </div>
    
  </nav>

  <div class="sulok d-none" id="sulok">
 <div class="container text-center h-100 div-sulok">
  <div class="row row-cols-1 row-sulok p-3">
    <div class="profile_pic col-5">
    
       <div class="pictureBadgeSulok m-0 " id="profilechange" style="background-image: url('<?php echo $_SESSION['profile_picture'] ; ?>');">
          <div class="picbg d-flex align-items-center">
            <form action="userHomePage.php" method="POST" enctype="multipart/form-data">
          <input type="file" class="editProfile" name="changeprofile" id="changeprofile"/>
          <button type = "submit" name="editProfile" id="editProfile" class="d-none" value="Upload"></button>
          </form>
             <span class="profilepic__icon" style="margin: 0 auto"> <i class="fas fa-camera"></i></span>
       </div>
 
       </div>
    
  </div>
    
    <div class="col-7">
      <div class="row">
        <div class="col-12 p-0 fw-semibold fs-4"><h4 class="sulok-name"><?php echo $_SESSION['full_name']  ?></h4></div>
        <div class="col-12 p-0">mis.dev@glory.com.ph</div>

      </div>
    </div>

  </div>
  <div class="row row-cols-1 row-sulok signout ">
    <div class="col-12 "><a href="../logout.php" class="hrefsignout">Signout</a></div>
  </div> 

</div>
 </div>


 <script>
  var validImagetypes=["image/gif", "image/jpeg", "image/png"];
  function previewImageSignup(image_blog){
    // document.getElementById("signupImage").style.display="none";
    // document.getElementById("cardImage").display=null;
    $("#profilechange").fadeIn();
  
    
      if(image_blog.files && image_blog.files[0])
      {
       var reader=new FileReader();
       var pictureeme =  $("#changeprofile").prop("files")[0];
         reader.onload=function(e)
         {
          $("#profilechange").css("background-image", "url(" + e.target.result + ")");
          //  $("#signupImage").attr('src', e.target.result);
          //  $("#cardImage").fadeIn();
           if($.inArray(pictureeme["type"], validImagetypes)<0)
           {
            $("#changeprofile").addClass("is-invalid")
            return;
           }
           else{
             $("#changeprofile").removeClass("is-invalid");
           }
         }
         reader.readAsDataURL(image_blog.files[0]);
     
      }
     }
     $("#changeprofile").change(function(){
      previewImageSignup(this);
      $( "#editProfile" ).click();
     });
</script>


