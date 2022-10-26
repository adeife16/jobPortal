<?php
$title = "Signup";
require "header.php";
if(isset($_SESSION['id']) || $_SESSION['id'] != "")
{
  ?>
  <script type="text/javascript">window.location.replace('index.php');</script>
  <?php
}
?>
<br>
<br>
<br>
<section class="ads_area pt-50  ">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-12 col-sm-12" id="signup-form">
        <div class="signup-box-background">
          <div class="signup-box">
            <div class="tabs_menu mt-50 text-center">
              <ul class="nav" id="myTab" role="tablist">
                <li>
                  <a style="display: inline-block" class="active" id="employer-tab" data-toggle="tab" href="#employer" role="tab" aria-controls="employer" aria-selected="true">Company</a>
                </li>
                <li>
                  <a style="display: inline-block" id="employee-tab" data-toggle="tab" href="#employee" role="tab" aria-controls="employee" aria-selected="fasse">Employee</a>
                </li>
              </ul>
            </div>
            <br>
            <div class="ads_tabs">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="employer" role="tabpanel" aria-labelledby="employer-tab">
                  <div class="employer-form">
                    <h4>Sign up as a Company</h4>
                    <hr>
                    <form action="" class="form" id="employer-form" enctype="multipart/form-data" method="POST">
                      <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name" aria-describedby="helpId">
                        <small id="helpId" class="text-danger">Name of your company as it appears in registeration certificate</small>
                      </div>
                      <div class="form-group">
                        <label for="company_address">Address</label>
                        <input type="text" name="company_address" id="company_address" class="form-control" placeholder="Company Address" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="company_email">Email</label>
                        <input type="text" name="company_email" id="company_email" class="form-control" placeholder="Company Email" aria-describedby="helpId">
                        <small id="helpId" class="text-danger">The email address will be used for verification.</small>
                      </div>
                      <div class="form-group">
                        <label for="company_website">Website</label>
                        <input type="link" name="company_website" id="company_website" class="form-control" placeholder="Website Link" aria-describedby="helpId">
                        <small id="helpId" class="text-danger">Optional</small>
                      </div>
                      <div class="form-group">
                        <label for="company_password">Password</label>
                        <input type="password" name="company_password" id="company_password" class="form-control" placeholder="Password" aria-describedby="helpId">
                        <small id="helpId" class="text-danger">Password must be at least 8 characters long</small>
                        <div>
                          <input type="checkbox" onclick="checkPassword()"> Check Password
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="company_password_confirm"></label>
                        <input type="password" name="company_password_confirm" id="company_password_confirm" class="form-control" placeholder="Confirm Password" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="company_phone_compulsory">Phone Number</label>
                        <input type="text" name="company_phone_compulsory" id="company_phone_compulsory" class="form-control" placeholder="Company's Phone Number" aria-describedby="helpId">
                        <small id="helpId" class="text-danger">This phone number will be used for verification</small>
                      </div>
                      <div class="form-group">
                        <label for="company_phone_compulsory">Phone Number</label>
                        <input type="text" name="company_phone_optional" id="company_phone_optional" class="form-control" placeholder="Company's Phone Number" aria-describedby="helpId">
                        <small id="helpId" class="text-danger">Optional</small>
                      </div>
                      <div class="form-group">
                        <label for="company_employees">Number of employees</label>
                        <input type="number" name="company_employees" id="company_employees" class="form-control" placeholder="" min="1" aria-describedby="helpId">
                        <small id="helpId" class="text-danger">Number of employees in your organisation</small>
                      </div>
                      <div class="form-group">
                        <label for="company_state">State</label>
                        <select name="company_state" id="company_state" class="form-control">

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="company_city">City</label>
                        <select name="company_city" id="company_city" class="form-control">

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Company Logo</label>
                        <div class="file-upload2">
                          <button class="file-upload-btn btn blue color-white" type="button" onclick="$('.file-upload-input2').trigger( 'click' )">Upload File</button>
                          <div class="image-upload-wrap2">
                            <div class="drag-text">
                              <input class="file-upload-input2" type='file' name="logo" id="file-upload2" onchange="readURL2(this);" accept=".jpg, .jpeg, .png" />
                              <p>Drag and drop a file or click to upload</p>
                            </div>
                          </div>
                          <div class="file-upload-content2">
                            <img class="file-upload-image2" src="#" alt="your image" />
                            <div class="file-name2"></div>
                            <div class="file-size2"></div>
                            <div class="image-title-wrap">
                              <button type="button" onclick="removeUpload2()" class="remove-image2 blue color-white">Remove</button>
                            </div>
                          </div>
                        </div>
                        <small id="helpId" class="text-danger">File size limit is 1Mb</small>
                        <div id="bar-5" class="bar-main-container blue hide">
                          <div class="wrap">
                            <div class="bar-percentage2" data-percentage2="100"></div>
                            <div class="bar-container">
                              <div class="bar"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr class="">
                      <div class="form-group">
                        <label for="">Registeration Certificate</label>
                        <div class="file-upload">
                          <button class="file-upload-btn btn blue color-white" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Upload File</button>

                          <div class="image-upload-wrap">
                            <div class="drag-text">
                              <input class="file-upload-input" type='file' id="file-upload1" name="company_certificate" onchange="readURL(this);" accept=".pdf, .jpg, .jpeg, .png" />
                              <p>Drag and drop a file or click to upload</p>
                            </div>
                          </div>
                          <div class="file-upload-content">
                            <img class="file-upload-image" src="#" alt="your image" />
                            <div class="file-name1"></div>
                            <div class="file-size1"></div>
                            <div class="image-title-wrap">
                              <button type="button" onclick="removeUpload()" class="remove-image blue color-white">Remove</button>
                            </div>
                          </div>
                        </div>
                        <small id="helpId" class="text-danger">File size limit is 1Mb</small>
                        <div id="bar-3" class="bar-main-container blue hide">
                          <div class="wrap">
                            <div class="bar-percentage" data-percentage="100"></div>
                            <div class="bar-container">
                              <div class="bar"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <!-- <div class="form-group">
                      <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LeCKM0aAAAAABjJq7I25LWzsicNk8-AHL5Ea-XA"></div>
                      <input type="hidden" name="captcha" id="captcha" value="">
                    </div> -->
                    <!-- <div class="form-group">
                    <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LeisTEbAAAAAIOprSi1P2GxBLgURN3rJwsCNg-J"></div>
                  </div> -->
                  <div class="form-group">
                    <input type="checkbox" name="company_terms" id="company_terms">&nbsp;<span> By checking this box, you agree to out <a href="#">Terms and Conditions</a></span>
                  </div>
                  <div class="form-group text-center">
                    <input type="submit" name="company_signup" id="company_signup" class="btn blue color-white" value="SIGN UP">
                    <button type="button" class="btn blue color-white hide" id="company-loader">&nbsp;&nbsp;<i class="fas fa-circle-notch fa-spin" aria-hidden="true"></i>&nbsp;&nbsp;</button>

                  </div>

                </form>
              </div>
            </div>
            <!-- Employee Form -->
            <div class="tab-pane fade" id="employee" role="tabpanel" aria-labelledby="employee-tab">
              <div class="employee-form">
                <h4>Signup as a an Employee</h4>
                <hr>
                <form action="" class="form" id="employee-form" method="POST" enctype="multipart/form-data">
                  <h5>Basic Details</h5>
                  <br>
                  <div class="form-group">
                    <label for="employee_firstname">First Name</label>
                    <input type="text" name="employee_firstname" id="employee_firstname" class="form-control" placeholder="First Name" aria-describedby="helpId">
                  </div>
                  <div class="form-group">
                    <label for="employee_lastname">Last Name</label>
                    <input type="text" name="employee_lastname" id="employee_lastname" class="form-control" placeholder="Last Name" aria-describedby="helpId">
                  </div>
                  <div class="form-group">
                    <label for="employee_address">Address</label>
                    <textarea name="employee_address" id="employee_address" class="form-control" placeholder="Enter your full address" aria-describedby="helpId"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="employee_gender">Gender</label>
                    <select name="employee_gender" id="employee_gender" class="form-control">
                      <option value="">Select Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="employee_dob">Date of Birth</label>
                    <input type="date" name="employee_dob" id="employee_dob" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-danger">Date of birth must match the one in identity card</small>
                  </div>
                  <div class="form-group">
                    <label for="employee_email">Email</label>
                    <input type="text" name="employee_email" id="employee_email" class="form-control" placeholder="Email Address" aria-describedby="helpId">
                    <small id="helpId" class="text-danger">The email address will be used for verification</small>
                  </div>
                  <div class="form-group">
                    <label for="employee_password">Password</label>
                    <input type="password" name="employee_password" id="employee_password" class="form-control" placeholder="Password" aria-describedby="helpId">
                    <small id="helpId" class="text-danger">Password must be at least 8 characters long</small>
                    <div>
                      <input type="checkbox" onclick="checkPassword2()"> Check Password
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="employee_password_confirm">Confirm Password</label>
                    <input type="password" name="employee_password_confirm" id="employee_password_confirm" class="form-control" placeholder="Confirm Password" aria-describedby="helpId">
                  </div>
                  <div class="form-group">
                    <label for="employee_phone_compulsory">Phone Number</label>
                    <input type="text" name="employee_phone_compulsory" id="employee_phone_compulsory" class="form-control" placeholder="Phone Number" aria-describedby="helpId">
                    <small id="helpId" class="text-danger">Phone Number will be used for verification</small>
                  </div>
                  <div class="form-group">
                    <label for="employee_state">State</label>
                    <select name="employee_state" id="employee_state" class="form-control">
                    </select>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="employee_city">City</label>
                    <select name="employee_city" id="employee_city" class="form-control">
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="employee_about">About Me</label>
                    <textarea name="employee_about" id="employee_about" class="form-control"></textarea>
                    <small id="helpId" class="text-danger">Tell us a little about yourself</small>
                  </div>
                  <br>
                  <hr>
                  <br>
                  <h5>Verification Details</h5>
                  <br>
                  <div class="form-group">
                    <label for="">Profile Picture</label>
                    <div class="file-upload3">
                      <button class="file-upload-btn btn blue color-white" type="button" onclick="$('.file-upload-input3').trigger( 'click' )">Upload File</button>
                      <div class="image-upload-wrap3">
                        <div class="drag-text">
                          <input class="file-upload-input3" type='file' name="employee_picture" id="file-upload3" onchange="readURL3(this);" accept=".jpg, .jpeg, .png" />
                          <p>Drag and drop a file or click to upload</p>
                        </div>
                      </div>
                      <div class="file-upload-content3">
                        <img class="file-upload-image3" src="#" alt="your image" />
                        <div class="file-name3"></div>
                        <div class="file-size3"></div>
                        <div class="image-title-wrap">
                          <button type="button" onclick="removeUpload3()" class="remove-image2 blue color-white">Remove</button>
                        </div>
                      </div>
                    </div>
                    <small id="helpId" class="text-danger">File size limit is 1Mb</small>
                    <div id="bar-6" class="bar-main-container blue hide">
                      <div class="wrap">
                        <div class="bar-percentage3" data-percentage3="100"></div>
                        <div class="bar-container">
                          <div class="bar"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">CV Upload</label>
                    <div class="file-upload4">
                      <button class="file-upload-btn btn blue color-white" type="button" onclick="$('.file-upload-input4').trigger( 'click' )">Upload File</button>

                      <div class="image-upload-wrap4">
                        <div class="drag-text">
                          <input class="file-upload-input4" type='file' id="file-upload4" name="employee_cv" onchange="readURL4(this);" accept=".pdf, .jpg, .jpeg, .png" />
                          <p>Drag and drop a file or click to upload</p>
                        </div>
                      </div>
                      <div class="file-upload-content4">
                        <img class="file-upload-image4" src="#" alt="your image" />
                        <div class="file-name4"></div>
                        <div class="file-size4"></div>
                        <div class="image-title-wrap">
                          <button type="button" onclick="removeUpload4()" class="remove-image blue color-white">Remove</button>
                        </div>
                      </div>
                    </div>
                    <small id="helpId" class="text-danger">File size limit is 1Mb</small>
                    <div id="bar-7" class="bar-main-container blue hide">
                      <div class="wrap">
                        <div class="bar-percentage4" data-percentage4="100"></div>
                        <div class="bar-container">
                          <div class="bar"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <hr class="">
                  <!-- <div class="form-group">
                  <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LeCKM0aAAAAABjJq7I25LWzsicNk8-AHL5Ea-XA"></div>
                </div> -->
                <!-- <div class="form-group">
                <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LeisTEbAAAAAIOprSi1P2GxBLgURN3rJwsCNg-J"></div>
              </div> -->
              <div class="form-group">
                <input type="checkbox" name="employee_terms" id="employee_terms">&nbsp;<span> By checking this box, you agree to out <a href="#">Terms and Conditions</a></span>
              </div>
              <div class="form-group text-center">
                <input type="submit" class="btn color-white blue" id="employee_signup" name="employee_signup" value="SIGN UP">
                <button type="button" class="btn blue color-white hide" id="employee-loader">&nbsp;&nbsp;<i class="fas fa-circle-notch fa-spin" aria-hidden="true"></i>&nbsp;&nbsp;</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div id="signup-success" class="col-lg-8 col-md-12 col-sm-12 hide">
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="blue p-5" id="signup-success-message">
    <h5 class="color-white">Congratulations! you have successfully signup, please check your mailbox to verify and activate your account. If you can't find the message in your inbox, please check your spam.</h5>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

</div>
</div>
</div>
</section>

<?php
include_once "footer.php";
?>
