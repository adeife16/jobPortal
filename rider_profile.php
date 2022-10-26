<?php
$title = "Profile";
require "header.php";
if(!isset($_SESSION['id']) || $_SESSION['id'] == "")
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
              <div style="margin: 0 auto">
                <img src="assets/images/profile.jpg" class="profile-image" id="profile-image" alt="Profile Image">
              </div>
              <div class="profile-details-display">
                <div class="container">
                  <p><h2>Rick Sanchez</h2></p>
                  <p><h4>dadaadeife@gmail.com </h4></p>
                  <p>&nbsp; <i class="fas fa-map"></i>Lagos,Nigeria</p>
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-md-8">
              <div class="profile-tab">
                <div class="tabs_menu text-center">
                  <ul class="nav" id="myTab" role="tablist">
                    <li>
                      <a class="active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a>
                    </li>
                    <li>
                      <a id="edit-tab" data-toggle="tab" href="#edit-profile" role="tab" aria-controls="edit-profile" aria-selected="fasse">Edit Profile</a>
                    </li>
                    <li>
                      <a id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="fasse">Edit Password</a>
                    </li>
                  </ul>
                </div>
              </div>
              <section>
                <div class="tab-content p-5" id="myTabContent">
                  <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <!-- Profile details -->
                    <table class="table">
                      <tr>
                        <td>First Name: </td>
                        <td>Opeyemi</td>
                      </tr>
                      <tr>
                        <td>First Name: </td>
                        <td>Opeyemi</td>
                      </tr>
                      <tr>
                        <td>First Name: </td>
                        <td>Opeyemi</td>
                      </tr>
                      <tr>
                        <td>First Name: </td>
                        <td>Opeyemi</td>
                      </tr>
                      <tr>
                        <td>First Name: </td>
                        <td>Opeyemi</td>
                      </tr>
                      <tr>
                        <td>First Name: </td>
                        <td>Opeyemi</td>
                      </tr>
                      <tr>
                        <td>First Name: </td>
                        <td>Opeyemi</td>
                      </tr>
                    </table>
                  </div>
                  <!-- Edit Profile Form -->
                  <div class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="edit-tab">
                    <form class="profile-edit" action="" method="post">
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" value="Name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" value="Name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" value="Name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" value="Name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" value="Name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" value="Name">
                      </div>
                    </form>
                  </div>
                  <!-- Edit password Form -->
                  <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <form class="password-edit" action="" method="post">
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" value="Name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" value="Name">
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
<?php
require_once 'footer.php';
?>
