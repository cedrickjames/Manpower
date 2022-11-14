

<div class="sidebar  d-none d-lg-block" id="sideBar" >
<div class="offcanvas show offcanvas-start" id="offcanvasExample" data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header p-0" style="height: 200px; color: white;">
  <div class="containerName row">
        <div class="blue px-3 col-4">
        <div class="initialsOfName"><?php
       $fullname= $_SESSION['full_name'];
         $words = explode(" ", "$fullname");
$acronym = "";

for($i=0; $i<2; $i++){
  $acronym .= mb_substr($words[$i], 0, 1);
}
echo $acronym;
 ?></div>
        </div>
        <div class="pink col-8">
            <div class="name col-12">
              <h5 style="
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  font-size: 1.3rem;
 "><?php echo $_SESSION['full_name']?></h5>
            </div>
            <div class="green col-12">
            <h6><?php echo $_SESSION['department']?></h6>
            </div>
        </div>
     
    </div>
  </div>
     <hr class="m-0">
  <div class="offcanvas-body">
  <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item side" style="height: 40px">
        <a href="./userHomePage.php" class="nav-link side active" id="forecastButton" >
        <div class="icon-sampleIcon d-inline"></div>
          <div class=" d-inline ms-1">Forecast</div>
         <div type="button" class="d-inline float-end w-25 text-center" onclick="showForecastOptions()" id="forecastOptionButton"><i class="fa-solid fa-caret-down" id="dropdownIcon"></i></div>
        </a>
      </li>
      <ul class="list-group mt-2 " id="forecastOption">
  <li class="list-group-item" data-bs-toggle="modal" data-bs-target="#addLineModal">Add Line</li>
  <li class="list-group-item"data-bs-toggle="modal" data-bs-target="#updateWorkingDaysModal">Update Working Days</li>

</ul>
      <li>
        <a href="./dashboard.php" class="nav-link side" id="dashboardOpt" >
        <div class="d-inline me-1" ><i class="fa fa-chart-simple fa-sm "></i></div>
        
        <div class="d-inline ms-1">Dashboard</div>
        </a>
     
      </li>
      <li>
        <a href="./manpower.php" class="nav-link side" id="manpowerOpt">
        <div class="d-inline" style="margin-right: 2px">  <i class="fa fa-users fa-sm"></i></div>
       
      <div class="d-inline">Manpower</div>
        </a>
      </li>

      <li >
        <a href="./signup_request.php" class="nav-link side " id="requestOpt" >
        <div class="d-inline" style="margin-right: 6px"><i class="fa fa-user fa-sm"></i></div>
        <div class="d-inline position-relative ">Signup Request

        <span class=" ms-4 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        <?php
   $Department = $_SESSION['department'];
                       $selectrequest= "SELECT * FROM `users` WHERE `department` = '$Department' AND `approved` = '0' ";
                       $resultRequest = mysqli_query($con, $selectrequest);
                       $countRequest = mysqli_num_rows($resultRequest); 
                       echo $countRequest;
                       ?>
    <span class="visually-hidden">unread messages</span>
  </span>
        </div>
    
        </a>
       
      </li>

     
    </ul>
  </div>
</div>
 



</div>




<div class="offcanvas offcanvas-start d-none d-sm-block " tabindex="-1" id="offcanvasExample2" data-bs-backdrop="false"  aria-labelledby="offcanvasExampleLabel" style="z-index:10000">
<div class="offcanvas-header  p-0" style="height: 200px; color: white;">
  
  <div class="containerName row">
        <div class="blue px-3 col-4" style="width: 23.33333333%;">
        <div class="initialsOfName"><?php
       $fullname= $_SESSION['full_name'];
         $words = explode(" ", "$fullname");
$acronym = "";

for($i=0; $i<2; $i++){
  $acronym .= mb_substr($words[$i], 0, 1);
}
echo $acronym;
 ?></div>
        </div>
        <div class="pink col-8">
            <div class="name col-12">
              <h5 ><?php echo $_SESSION['full_name']?></h5>
            </div>
            <div class="green col-12">
            <h6><?php echo $_SESSION['department']?></h6>
            </div>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>


  </div>
     <hr class="m-0">
     <div class="offcanvas-body">
  <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item side" style="height: 40px">
        <a href="./userHomePage.php" class="nav-link side active" id="forecastButton2" >
        <div class="icon-sampleIcon d-inline"></div>
          <div class=" d-inline ms-1">Forecast</div>
         <div type="button" class="d-inline float-end w-25 text-center" onclick="showForecastOptions2()" id="forecastOptionButton2"><i class="fa-solid fa-caret-down" id="dropdownIcon2"></i></div>
        </a>
      </li>
      <ul class="list-group mt-2 " id="forecastOption2">
  <li class="list-group-item" onclick="hideSidebar()"data-bs-toggle="modal" data-bs-target="#addLineModal">Add Line</li>
  <li class="list-group-item"data-bs-toggle="modal" data-bs-target="#updateWorkingDaysModal">Update Working Days</li>

</ul>
      <li>
        <a href="./dashboard.php"  id="dashboardOpt2" class="nav-link side " >
        <div class="d-inline me-1" ><i class="fa fa-chart-simple fa-sm "></i></div>
        
        <div class="d-inline ms-1">Dashboard</div>
        </a>
     
      </li>
      <li>
        <a href="./manpower.php"  class="nav-link side" id="manpowerOpt2">
        <div class="d-inline" style="margin-right: 2px">  <i class="fa fa-users fa-sm"></i></div>
       
      <div class="d-inline">Manpower</div>
        </a>
      </li>

      <li >
        <a href="./signup_request.php" class="nav-link side " id="requestOpt2" >
        <div class="d-inline" style="margin-right: 6px"><i class="fa fa-user fa-sm"></i></div>
        <div class="d-inline position-relative ">Signup Request

        <span class=" ms-4 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
   <?php
   $Department = $_SESSION['department'];
                       $selectrequest= "SELECT * FROM `users` WHERE `department` = '$Department' AND `approved` = '0' ";
                       $resultRequest = mysqli_query($con, $selectrequest);
                       $countRequest = mysqli_num_rows($resultRequest); 
                       echo $countRequest;
                       ?>
                      
    <span class="visually-hidden">unread messages</span>
  </span>
        </div>
    
        </a>
       
      </li>
    </ul>
  </div>
</div>





<!-- 
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample2" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
    </div>
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Dropdown button
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
  </div>
</div> -->

