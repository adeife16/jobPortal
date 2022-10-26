<?php
$title = "Profile";
require "header.php";
if(!isset($_SESSION['id']))
{
  ?>
  <script type="text/javascript">window.location.replace('index.php');</script>
  <?php
}
?>
<br>
<br>
<br>
<section class="ads_area pt-70  ">
  <div class="container">
    <div class="profile-page">
      <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="row">
            <div class="col-lg-4 col-md-4 text-center">
              <div style="margin: 0 auto" id="">
                <span style="display:block; float:right" data-toggle="modal" data-target="#picturemodal"><i class="fa fa-pen fa-lg" id="edit_image"></i></span>
                '<img src="" class="profile-image" id="profile-image" alt="Profile Image">
              </div>
              <div class="profile-details-display">
                <div class="container" id="basic_details">

                </div>
              </div>
            </div>
            <div class="col-lg-8 col-md-8">
              <div class="profile-tab">
                <div class="tabs_menu text-center">
                  <ul class="nav" id="myTab" role="tablist">
                    <li>
                      <a style="display: inline-block" class="active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a>
                    </li>
                    <li>
                      <a style="display: inline-block" id="edit-tab" data-toggle="tab" href="#edit-profile" role="tab" aria-controls="edit-profile" aria-selected="fasse">Edit Profile</a>
                    </li>
                    <li>
                      <a style="display: inline-block" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="fasse">Edit Password</a>
                    </li>
                  </ul>
                </div>
              </div>
              <section>
                <div class="tab-content p-5" id="myTabContent">
                  <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <!-- Profile details -->
                    <div class="details">

                    </div>
                  </div>
                  <!-- Edit Profile Form -->
                  <div class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="edit-tab">
                    <div id="company-div">
                      <!-- company form -->
                      <form class="profile-edit-company hide" id="profile-edit-company" action="" method="post">
                        <div class="form-group">
                          <label for="edit_name">Name</label>
                          <input type="text" class="form-control" name="edit_name" id="edit_name" disabled>
                        </div>
                        <div class="form-group">
                          <label for="edit_email">Email</label>
                          <input type="text" class="form-control" name="edit_email" id="edit_email" disabled>
                        </div>
                        <div class="form-group">
                          <label for="edit_address">Address</label>
                          <textarea name="edit_address" rows="8" cols="80" class="form-control" id="edit_address"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="edit_state">State</label>
                          <select class="edit_state form-control" name="edit_state" id="edit_state">

                          </select>
                        </div>
                        <div class="form-group">
                          <label for="edit_city">City</label>
                          <select class="edit_city form-control" name="edit_city" id="edit_city">

                          </select>
                        </div>
                        <div class="form-group">
                          <label for="edit_phone1">Phone Number</label>
                          <input type="text" class="form-control" name="edit_phone1" id="edit_phone1">
                        </div>
                        <div class="form-group">
                          <label for="edit_phone2">Phone Number (Optional)</label>
                          <input type="text" class="form-control" name="edit_phone2" id="edit_phone2">
                        </div>
                        <div class="form-group">
                          <label for="edit_employees">Employees</label>
                          <input type="number" class="form-control" name="edit_employees" id="edit_employees">
                        </div>
                        <div class="form-group">
                          <button type="button" name="edit_profile" id="edit_profile" class="btn blue color-white">UPDATE</button>
                        </div>
                        <div class="form-group">
                          <button type="button" name="edit_profile_btn" id="edit_profile_btn" class="btn blue color-white hide" disabled>LOADING</button>
                        </div>
                      </form>
                    </div>
                    <div class="rider-div">
                      <!-- rider  -->
                      <form class="profile-edit-rider hide" id="profile-edit-rider" action="" method="post">
                        <div class="form-group">
                          <label for="rider_edit_firstname">First Name</label>
                          <input type="text" class="form-control" name="rider_edit_firstname" id="rider_edit_firstname">
                        </div>
                        <div class="form-group">
                          <label for="rider_edit_lastname">Last Name</label>
                          <input type="text" class="form-control" name="rider_edit_lastname" id="rider_edit_lastname">
                        </div>
                        <div class="form-group">
                          <label for="rider_edit_email">Email</label>
                          <input type="text" class="form-control" name="rider_edit_email" id="rider_edit_email" disabled>
                        </div>
                        <div class="form-group">
                          <label for="rider_edit_address">Address</label>
                          <textarea name="rider_edit_address" rows="8" cols="80" class="form-control" id="rider_edit_address"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="rider_edit_state">State</label>
                          <select class="rider_edit_state form-control" name="rider_edit_state" id="rider_edit_state">

                          </select>
                        </div>
                        <div class="form-group">
                          <label for="rider_edit_city">City</label>
                          <select class="rider_edit_city form-control" name="rider_edit_city" id="rider_edit_city">

                          </select>
                        </div>
                        <div class="form-group">
                          <label for="rider_edit_phone1">Phone Number</label>
                          <input type="text" class="form-control" name="rider_edit_phone1" id="rider_edit_phone1">
                        </div>
                        <div class="form-group">
                          <label for="rider_edit_dob">Date of Birth</label>
                          <input type="text" class="form-control" name="rider_edit_dob" id="rider_edit_dob" disabled>
                        </div>
                        <div class="form-group">
                          <label for="rider_edit_about">About</label>
                          <textarea name="rider_edit_about" rows="8" cols="80" class="form-control" id="rider_edit_about">

                          </textarea>
                        </div>
                        <div class="form-group">
                          <button type="button" name="edit_profile_rider" id="edit_profile_rider" class="btn blue color-white">UPDATE</button>
                        </div>
                        <div class="form-group">
                          <button type="button" name="edit_profile_rider_btn" id="edit_profile_rider_btn" class="btn blue color-white hide" disabled>LOADING</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- Edit password Form -->
                  <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <form class="password-edit" action="" method="post">
                      <div class="form-group">
                        <label for="old_pass">Old Password</label>
                        <input type="password" class="form-control" name="old_pass" id="old_pass">
                      </div>
                      <div class="form-group">
                        <label for="new_pass">New Password</label>
                        <input type="password" class="form-control" name="new_pass" id="new_pass">
                      </div>
                      <div class="form-group">
                        <button type="button" name="update_pass" id="update_pass" class="btn blue color-white">UPDATE</button>
                        <button type="button" name="update_pass_btn" id="update_pass_btn" class="btn blue color-white hide" disabled>LOADING</button>
                      </div>
                    </form>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Profile Picture Upload Modal -->
<div id="picturemodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Update Picture</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
          <div class="color-red" id="photo-warning"></div>
          <div class="color-green" id="photo-success"></div>
        </div>

        <div class="profile-photo" style="text-align:center">

          <div id='outputImage'></div>
        </div>
        <div class="modal-footer">
          <form action="" id="uploadImageForm" name="frmupload"
          method="post" enctype="multipart/form-data">
          <input type="file" id="uploadImage" name="uploadImage" onchange="readURL(this);" class="btn-btn-primary" />
          <button id="ImageSubmit" class="btn blue color-white" type="button" name='imageSubmit'>UPLOAD</button>
          <button id="ImageSubmitBtn" class="btn blue color-white hide" type="button" name='imageSubmit' disabled>LOADING</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<?php
require_once 'footer.php';
?>
