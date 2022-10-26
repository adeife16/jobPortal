<?php
$title = "Forgot Pass";
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
<section class="ads_area pt-70   mb-5 mt-5">
  <div class="mt-5 mb-5">
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-sm-12 content">
          <div id="pass-form-message"></div>
          <div class="pass-form-background m-4">

            <div class="pass-form white p-5">
              <h4 class="text-center">RESET PASSWORD</h4>
              <form class="form" action="" id="pass-form" method="post">
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email address">
                </div>
                <div class="form-group">
                  <button type="button" class="btn color-white blue"  id="pass-form-submit">SUBMIT</button>
                  <button type="button" class="btn color-white blue hide" id="pass-form-btn" disabled>SENDING...</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<br>
<br>
<br>


<?php
require_once 'footer.php';
?>
