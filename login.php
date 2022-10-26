<?php
$title = "Login";
require "header.php";
if(isset($_SESSION['id']))
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
    <div class="row justify-content-center">
      <div class="col-lg-12-md-12-sm-12">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-12 col-sm-8">
            <div class="login-box-background">
              <div class="login-box justify-content-center">
                <h3 class="text-center">LOGIN</h3>
                <form action="" id="login-form" class="form" method="post">
                  <div class="form-group">
                    <label for="login-email">Email</label>
                    <input type="text" name="email" id="login-email" class="form-control" placeholder="Email Address" aria-describedby="helpId">
                  </div>
                  <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" name="password" id="login-password" class="form-control" placeholder="Password" aria-describedby="helpId">
                  </div>
                  <div class="form-group text-center mb-0">
                    <button type="button" name="login" id="login" class="btn blue color-white" placeholder="LOGIN" aria-describedby="helpId">LOGIN</button>
                    <button type="button" class="btn blue color-white hide" id="login-loader">&nbsp;&nbsp;<i class="fas fa-circle-notch fa-spin color-white"></i>&nbsp;&nbsp;</button>
                  </div>
                </form>
                <br>
                <div class="">
                  <p class="text-right"><a href="forgot_pass.php" class="color-blue">forgot password?</a></p>
                </div>
              </div>
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
require_once "footer.php";?>
