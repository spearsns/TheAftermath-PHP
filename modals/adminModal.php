<div class="modal fade" id="adminModal" tabindex="-3" role="dialog" aria-labelledby="adminModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <div class='container-fluid'>

<!--OUTPUT-->
          <div class='row black py-2'>
            <div class='col-2'></div>
            <div class='col-8'><h4 style='color: red;' id='adminLog' class='text-center TNR'>&nbsp;</h4></div>
            <div class='col-2'></div>
          </div>
<!--GAME NAME-->
          <div class='row black'>
            
            <div class='col-12 col-sm-6 py-1'>
              <img class='img-fluid h-100 mx-auto d-block' src="img/graffiti/campaign.png" />
            </div>

            <div class='col-12 col-sm-6 py-1'>
              <div class="input-group input-group-lg">
                <input type="text" id="currentGName" class="form-control border text-center" readonly />
              </div>
            </div>

          </div>
<!--GAME DESCRIPTION-->
          <div class='row black'>

            <div class='col-12 col-md-6 py-1'>
              <img class='img-fluid mx-auto d-block' src="img/graffiti/description1.png" />
            </div>

            <div class='col-12 col-md-6 py-1'>
              <div class="input-group input-group-lg">
                <textarea class='form-control' id="currentGDesc" rows='4' readonly></textarea>
              </div>
            </div>

            <div class='col-12 col-md-6 py-1'>
              <img class='img-fluid mx-auto d-block' src="img/graffiti/newDescription.png" />
            </div>

            <div class='col-12 col-md-6 py-1'>
              <div class="input-group input-group-lg">
                <textarea class='form-control' id="newGDesc" rows='4'></textarea>
              </div>
            </div>

            <div class='col-12 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-1'>
              <button type="button" class="btn btn-success btn-lg btn-block border" id='updateGDescBtn'>UPDATE</button>
            </div>

          </div>
          <hr class='hr-white my-0 d-block' />
<!--STORYTELLER PASSWORD-->
          <div class='row black'>
            <div class='col-12 col-sm-6 py-1'>
              <img class='img-fluid h-100 mx-auto d-block' src="img/graffiti/StorytellerPassword.png" />
            </div>
            <div class='col-12 col-sm-6 py-1'>
              <div class="input-group input-group-lg">
                <input type="text" id="currentSTPass" class="form-control border text-center" readonly/>
              </div>
            </div>
            <div class='col-12 col-sm-6 py-1'>
              <img class='img-fluid h-100 mx-auto d-block' src="img/graffiti/newPassword.png" />
            </div>
            <div class='col-12 col-sm-6 py-1'>
              <div class="input-group input-group-lg">
                <input type="text" id="newSTPass" class="form-control border text-center" />
              </div>
            </div>            
            <div class='col-12 col-sm-6 py-1'>
              <img class='img-fluid h-100 mx-auto d-block' src="img/graffiti/confirmPW.png" />
            </div>
            <div class='col-12 col-sm-6 py-1'>
              <div class="input-group input-group-lg">
                <input type="text" id="confirmSTPass" class="form-control border text-center" />
              </div>
            </div>
            <div class='col-12 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-1'>
              <button type="button" class="btn btn-success btn-lg btn-block border" id='updateSTPassBtn'>UPDATE</button>
            </div>
          </div>
          <hr class='hr-white my-0 d-block' />
<!--PLAYER PASSWORD-->
          <div class='row black'>
            <div class='col-12 col-sm-6 py-1'>
              <img class='img-fluid h-100 mx-auto d-block' src="img/graffiti/PlayerPassword.png" />
            </div>
            <div class='col-12 col-sm-6 py-1'>
              <div class="input-group input-group-lg">
                <input type="text" id="currentPPass" class="form-control border text-center" readonly />
              </div>
            </div>
            <div class='col-12 col-sm-6 py-1'>
              <img class='img-fluid h-100 mx-auto d-block' src="img/graffiti/newPassword.png" />
            </div>
            <div class='col-12 col-sm-6 py-1'>
              <div class="input-group input-group-lg">
                <input type="text" id="newPPass" class="form-control border text-center" />
              </div>
            </div>
            <div class='w-100 d-none d-lg-block order-lg-6'></div>
            <div class='col-12 col-sm-6 py-1'>
              <img class='img-fluid h-100 mx-auto d-block' src="img/graffiti/confirmPW.png" />
            </div>
            <div class='col-12 col-sm-6 py-1'>
              <div class="input-group input-group-lg">
                <input type="text" id="confirmPPW" class="form-control border text-center" />
              </div>
            </div>
            <div class='col-12 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-1'>
              <button type="button" class="btn btn-success btn-lg btn-block border" id='updatePPassBtn' >UPDATE</button>
            </div>
          </div>
          <hr class='hr-white my-0 d-block' />

<!--CLOSE GAME-->
          <div class='row black py-2'>
            <div class='col-md-4 py-1'></div>
            <div class='col-md-4 py-1'>
              <button type="button" class="btn btn-warning btn-lg btn-block border" id='endGameBtn'>END GAME</button>
            </div>
            <div class='col-md-4 py-1'></div>
          </div>

      <div class="modal-footer">
        <div class='col-md-4 py-1'></div>
        <div class='col-md-4 py-1'>
          <button type="button" class="btn btn-danger btn-lg btn-block border" id='adminCloseBtn' data-dismiss='modal'>EXIT</button>
        </div>
        <div class='col-md-4 py-1'></div>
      </div>

        </div>
      </div>
    </div>
  </div>
</div>