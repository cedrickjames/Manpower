<div class="main-content " id="mainContent">
  <div class="tab-content " id="v-pills-tabContent">
    <div class="tab-pane fade show active " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
      tabindex="0">

      <div class="row" id="bcModel" style="display: none">
        <div class="col goback">
          <!-- <input type="text" class="form-control" placeholder="First name" aria-label="First name"> -->
          <button type="button" class="form-control btn btn-outline-primary text-start" id="goBack"
            onclick="showLine()">
            <span><i class="fa-solid fa-arrow-left"></i></span>
            Go back</button>

        </div>
        <div class=" searchInput col">
          <input type="search" class="form-control" id="filterbox" placeholder=" " onkeyup="getSelectValueDaily();">
        </div>
      </div>

      <div class="row row-cols-1 row-cols-md-4 g-4 " id="cardholder">

        <div class="col">
          <a class="card" href="#" onclick="showTableForModel()">

            <img src="../samplePictures/GPI Machine/BRM 10.png" class="card-img-top" alt="...">

            <div class="card-body">
              <h5 class="card-title">BRM 10</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Banknote Recycler</li>
              <li class="list-group-item">GPI 1</li>
            </ul>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </a>
        </div>
        <div class="col">
          <div class="card">
            <img src="../samplePictures/GPI Machine/GFB 800.png" class="card-img-top" alt="...">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">An item</li>
              <li class="list-group-item">A second item</li>
            </ul>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="../samplePictures/GPI Machine/GND 700.png" class="card-img-top" alt="...">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">An item</li>
              <li class="list-group-item">A second item</li>
            </ul>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">

            <img src="../samplePictures/GPI Machine/RBG 100.png" class="card-img-top" alt="...">

            <div class="card-body">
              <h5 class="card-title">RBG 100</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">An item</li>
              <li class="list-group-item">A second item</li>
            </ul>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="../samplePictures/GPI Machine/RBG 150.png" class="card-img-top" alt="...">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">An item</li>
              <li class="list-group-item">A second item</li>
            </ul>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="../samplePictures/GPI Machine/RBG 200C2.png" class="card-img-top" alt="...">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">An item</li>
              <li class="list-group-item">A second item</li>
            </ul>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="../samplePictures/GPI Machine/RBG 200C.png" class="card-img-top" alt="...">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">An item</li>
              <li class="list-group-item">A second item</li>
            </ul>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="../samplePictures/GPI Machine/RBW 10.png" class="card-img-top" alt="...">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">An item</li>
              <li class="list-group-item">A second item</li>
            </ul>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="../samplePictures/GPI Machine/UD 700.png" class="card-img-top" alt="...">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">An item</li>
              <li class="list-group-item">A second item</li>
            </ul>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>

      </div>

      <div class="row row-cols-1 row-cols-md-4 g-1" style="display: none" id="tableForModel">

        <table class="table  table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr onclick="showForm()">
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>


      </div>
      <div class="w-5" style="display: none" id="forecastForm">
      <h2 class="fw-bolder">Forecast </h2>
      <form class="row g-3 computer">
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

    </div>
    <div class="tab-pane " id="table-for-models" role="tabpanel" aria-labelledby="table-for-models-tab" tabindex="0">
      table
    </div>
    <div class="tab-pane " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
      <div class="row p-3 h-lg-25 bg-success balance-container ">
        this is a nice div

      </div>
    </div>
    <div class="tab-pane " id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">2
    </div>
    <div class="tab-pane " id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">3
    </div>
    <div class="tab-pane " id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">4
    </div>
  </div>
</div>