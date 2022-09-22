

<div class="w-5" id="forecastForm">
      <h2 class="fw-bolder">Forecast for <span id="nameOfTheModel"></span></h2>
      <form class="row g-3 computer">
        <input type="text" class="d-none" id="modelIdContainer">
  <div class="form-floating col-md-6">
    
    <div class="form-floating">
  <input type="number" class="form-control" placeholder="Enter year" id="floatingTextarea"></input>
  <label for="floatingTextarea">Year</label>
</div>
  </div>
  <div class="form-floating col-md-6">
  <select id="inputMonth" class="form-select">
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
    <input type="text" class="form-control" id="inputLine" placeholder="Line name">
    <label for="inputLine">Line</label>

  </div>
  <div class="form-floating col-md-6">
    <input type="text" class="form-control" id="inputModel"placeholder="Model name">
    <label for="inputModel" >Model</label>

  </div>
  <div class="form-floating col-md-12">
    <input type="number" class="form-control" id="inputModel"placeholder="Projection quantity">
    <label for="inputQuantity" >Projection Quantity</label>
  </div>
  <div class="form-floating col-md-2  ">
    <input type="number" class="form-control" id="inputdaysOfWork"placeholder="Projection quantity">
    <label for="inputdaysOfWork" >Days of work</label>
  </div>
  <div class="form-floating col-md-2">
    <input type="number" class="form-control" id="inputActualManpower"placeholder="Projection quantity">
    <label for="inputActualManpower" >Actual Manpower</label>
  </div>
  <div class="form-floating col-md-3">
    <input type="number" class="form-control" id="inputJpnSTU"placeholder="Projection quantity">
    <label for="inputJpnSTU" >Japan STU</label>
  </div>
  <div class="form-floating col-md-3">
    <input type="number" class="form-control" id="inputGpiSTU"placeholder="Projection quantity">
    <label for="inputGpiSTU" >GPI STU</label>
  </div>
  <div class="form-floating col-md-2">
    <input type="number" class="form-control" id="inputActualTime"placeholder="Projection quantity">
    <label for="inputActualTime" >Actual Time</label>
  </div>
  <div class="form-floating col-md-6">
    <input type="number" class="form-control" id="inputTotGpiTarget"placeholder="Projection quantity">
    <label for="inputTotGpiTarget" >Total GPI Target</label>
  </div>
  <div class="form-floating col-md-6">
    <input type="number" class="form-control" id="inputTotActuak"placeholder="Projection quantity">
    <label for="inputTotActuak" >Total (Actual)</label>
  </div>
  <div class="form-floating col-md-6">
    <input type="number" class="form-control" id="inputForAct"placeholder="Projection quantity">
    <label for="inputForAct" >Forecast Actual</label>
  </div>
  <div class="form-floating col-md-6">
    <input type="number" class="form-control" id="inputMFGT"placeholder="Projection quantity">
    <label for="inputMFGT" >MP Forecast GPI Target</label>
  </div>
  <div class="form-floating col-md-12">
    <input type="number" class="form-control" id="inputMFGT"placeholder="Projection quantity">
    <label for="inputMFGT" >Amount</label>
  </div>
  <div class="d-grid gap-2">
  <button class="btn btn-outline-success" type="button">Submit</button>

</div>
</form>


      </div>