<?php
$title = "Companies";
require_once 'header.php';
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Companies</h1>
</div>
<div class="row justify-content-center">
  <div class="col-xl-12 col-lg-12 blue  col-md-12 col-sm-12">
    <div class="form-tab p-3">
      <div class="row">
        <div class="col-lg-7">
          <div class="action-div" id="action-div">
            <form class="form-inline " id="name-form" action="" method="post">
              <div class="form-group">
                <input type="text" name="employee-name" class="form-control" id="employee-name" value="" placeholder="Enter Employee Name">
              </div>
            </form>
            <form class="action-form hide" id="location-form" action="" method="post">
              <div class="form-group w-100 ml-2">
                <span>State:</span>
                <select class="form-control" id="employee-state">
                </select>
              </div>
              <div class="form-group w-100 ml-2">
                <span>City:</span>
                <select class="form-control" id="employee-city">
                </select>
              </div>
              <div class="form-group ml-2">
                <button class='btn white color-blue' id='search'>SEARCH</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-5">
          <span class="color-white">SEARCH BY:</span>
          <button type="button" class="btn white color-blue" id="action-btn" name=""><span class="name-show hide">Name</span><span class="location-show ">Location</span></button>
          <!-- <button type="button" class="btn white color-blue" id="location-action"name=""></button> -->
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-lg-12">
    <div class="display-div" id="display-div">
      <div class="table-responsive">
        <table class="table  table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Logo</th>
              <th>Name</th>
              <th>Company ID</th>
              <th>Account Status</th>
              <th>Rating</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>

          <tbody id="display-table">
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Logout Modal-->
  <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body"><span style="color: red">Delete Employee? This process cannot be undone!</span></div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <span id="del-span">
        <button class="btn btn-danger" id="del-btn" data-dismiss="modal" value="">Delete</button>
      </span>
    </div>
  </div>
  </div>
  </div>
  <?php
  require_once 'footer.php';
  ?>