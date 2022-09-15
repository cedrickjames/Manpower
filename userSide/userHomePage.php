<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../node_modules/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
  
    
      }
    </style>
      <link href="../sidebars.css" rel="stylesheet">
</head>
  <body>
   
  <nav class="navbar navbar-dark navbar-expand-sm shadow px-0 px-sm-3 sticky-top" style="background-color: #160A6B;">
    <div class="container-fluid px-3">
      <span class="navbar-brand me-4 	d-none d-sm-block " data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" onclick="slideMainContent()">
        <i class="fa-solid fa-bars fa-sm"></i>
      </span>
      <span class="navbar-brand  mb-0 h1">Manpower</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-xl-5 ms-sm-0 mt-3 mt-sm-0">
          <li class="nav-item px-xl-2 ">
            <a class="nav-link active" aria-current="page" href="#">Products</a>
          </li>
          <li class="nav-item px-xl-2">
            <a class="nav-link " href="#"> Packages</a>
          </li>
          <li class="nav-item px-xl-2">
            <a class="nav-link " href="#"> Contact</a>
          </li>
          <li class="nav-item px-xl-2 dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About Us
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav justify-content-end ml-0" style="width: 100%">
          <!-- <li class="nav-item mx-2 d-grid gap-2 d-none d-lg-flex">
          <button type="button" class="btn btn-success  fs-5 h-100 rounded-pill px-5 me-5 ">Invite
            <i class="fa-regular fa-envelope ps-2"></i>
          </button>
    </li> -->
          <li class="flex-row-reverse">
          <div class="pictureBadge m-0"></div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<!-- sidebar  -->
<!-- <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">


    
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
        <i class="fa-solid fa-home fa-sm"></i>
          Home
        </a>
      </li>
      <li>
        <a href="#" class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
          
          Dashboard
        </a>
      </li>
      <li>
        <a href="#"class="nav-link" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled" aria-selected="false" disabled>
          
          Orders
        </a>
      </li>
      <li>
        <a href="#" class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Products
        </a>
      </li>
      <li>
        <a href="#" class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Customers
        </a>
      </li>
    </ul>
    </div>
    <hr>
    
</div>

<div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">Welcome</div>
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">...</div>
    <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">...</div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
  </div> -->



<div class="sidebar  d-none d-sm-block" id="sideBar" >
<div class="offcanvas show offcanvas-start" id="offcanvasExample"data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header px-0">
  <div class="containerName row">
        <div class="blue px-3 col-4">
        <div class="initialsOfName">CJ</div>
        </div>
        <div class="pink col-8">
            <div class="name col-12">
              <h5>Cedrick James</h5>
            </div>
            <div class="green col-12">
            <h6>Production 1</h6>
            </div>
        </div>
     
    </div>
  </div>
     <hr>
  <div class="offcanvas-body">
  <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item side">
        <a href="#" class="nav-link side active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
        <i class="fa fa-home fa-sm"></i>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="nav-link side" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
        <i class="fa fa-users fa-sm"></i>

          Members
        </a>
      </li>
      <li>
        <a href="#" class="nav-link side" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled" aria-selected="false">
        <i class="fa fa-money-check fa-sm"></i>

          Payout
        </a>
      </li>
      <li>
        <a href="#" class="nav-link side" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
        <i class="fa fa-user fa-sm"></i>
         Profile
        </a>
      </li>
     
    </ul>
  </div>
</div>
 



</div>
<div class="main-content" id="mainContent">
<div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">Welcome</div>
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">1</div>
    <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">2</div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">3</div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">4</div>
  </div>
  </div>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="../sidebars.js"></script> 
    <script src="../js/userHomePage.js"></script> 
<script>

</script>
</body>
</html>