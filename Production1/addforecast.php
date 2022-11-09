

<div class="w-5" id="forecastForm">
      <h2 class="fw-bolder">Forecast for <span id="nameOfTheModel"></span></h2>
      <form class="row g-3 computer" action="../phpSubmit/addforecast.php" method="POST">
        <input type="text" class="d-none" id="modelIdContainer">
  <div class="form-floating col-md-6">
    
    <div class="form-floating">
  <input type="number" class="form-control" onkeyup="chooseWorkingDays()" value="<?php $year = new DateTime(); $year  = $year->format('Y'); echo $year; ?>"placeholder="Enter year" name="chosenYearForecast" id="chosenYearForecast"></input>
  <label for="floatingTextarea">Year</label>
</div>
  </div>
  <div class="form-floating col-md-6">
  <select id="inputMonth" name="inputMonth" onchange="chooseWorkingDays()" class="form-select">
      <option selected disabled>Choose...</option>
      <option>January</option>
      <option>February</option>
      <option>March</option>
      <option>April</option>
      <option>May</option>
      <option>June</option>
      <option>July</option>
      <option>August</option>
      <option>September</option>
      <option>October</option>
      <option>November</option>
      <option>December</option>



    </select>
    <label for="inputMonth">Month</label>

  </div>
  <div class="form-floating col-md-6">
    <input type="text" class="form-control" name="inputLine" id="inputLine" value="<?php echo  $_SESSION['lineName']; ?>"placeholder="Line name">
    <label for="inputLine">Line</label>

  </div>
  <div class="form-floating col-md-6">
    <input type="text" class="form-control" name="inputModel" id="inputModel"placeholder="Model name">
    <label for="inputModel" >Model</label>

  </div>
  <div class="form-floating col-md-12">
    <input type="text" class="form-control" onkeyup="compute()"name="inputProjQnty" id="inputProjQnty"placeholder="Projection quantity">
    <label for="inputQuantity" >Projection Quantity</label>
  </div>
  <div class="form-floating col-md-2  ">
    <input type="text" class="form-control" name="inputdaysOfWork" id="inputdaysOfWork"placeholder="Projection quantity">
    <label for="inputdaysOfWork" >Days of work</label>
  </div>
  <div class="form-floating col-md-2">
    <input type="text" class="form-control" name="inputActualManpower"id="inputActualManpower"placeholder="Projection quantity">
    <label for="inputActualManpower" >Actual Manpower</label>
  </div>
  <div class="form-floating col-md-3">
    <input type="text" class="form-control" id="inputJpnSTU" name="inputJpnSTU" placeholder="Projection quantity">
    <label for="inputJpnSTU" >Japan STU</label>
  </div>
  <div class="form-floating col-md-3">
    <input type="text" class="form-control" id="inputGpiSTU" name="inputGpiSTU" placeholder="Projection quantity">
    <label for="inputGpiSTU" >GPI STU</label>
  </div>
  <div class="form-floating col-md-2">
    <input type="text" class="form-control" id="inputActualTime" name="inputActualTime" placeholder="Projection quantity">
    <label for="inputActualTime" >Actual Time</label>
  </div>
  <div class="form-floating col-md-6">
    <input type="text" class="form-control" id="inputTotGpiTarget" name="inputTotGpiTarget" placeholder="Projection quantity">
    <label for="inputTotGpiTarget" >Total GPI Target</label>
  </div>
  <div class="form-floating col-md-6">
    <input type="text" class="form-control" id="inputTotActual" name="inputTotActual" placeholder="Projection quantity">
    <label for="inputTotActual" >Total (Actual)</label>
  </div>
  <div class="form-floating col-md-6">
    <input type="text" class="form-control" step="0.01" id="inputForAct" name="inputForAct" placeholder="Projection quantity">
    <label for="inputForAct" >Forecast Actual</label>
  </div>
  <div class="form-floating col-md-6">
    <input type="text" class="form-control" id="inputMFGT" step="0.01" name="inputMFGT" placeholder="Projection quantity">
    <label for="inputMFGT" >MP Forecast GPI Target</label>
  </div>
  <div class="form-floating col-md-12">
    <input type="text" class="form-control" id="inputFinalForecast"step="0.01" name="inputFinalForecast"  placeholder="Projection quantity">
    <label for="inputMFGT" >Final Forecast</label>
  </div>
  <div class="d-grid gap-2">
  <button class="btn gsuccess" type="submit" name="addForecastBtn">Submit</button>

</div>
</form>


      </div>