<div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Job Notification</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="notice" id="notice">
            <p class="text-center">No Notification</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="alert-box success"></div>
<div class="alert-box failure"></div>
<div class="alert-box warning"></div>
<footer class="footer_area blue mt-50">
        <div class=" pt-15 pb-30">
            <div class="container">
                <div class="footer_copyright_wrapper text-center d-sm-flex justify-content-between align-items-center">
                    <div class="copyright mt-15">
                       <p>&copy; <?php echo date('Y'); ?> RESUME.COM</p>
                    </div>
                    <div class="social-icons mt-15">
                        <ul>
                            <li><a href=""><i class="fab color-white fa-lg fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fab color-white fa-lg fa-whatsapp" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fab color-white fa-lg fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fab color-white fa-lg fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="icon ion-arrow-up-c"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->


    <!-- Global scripts -->

    <!--====== Jquery js ======-->
    <script src="assets/js/vendor/jquery-3.5.1.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>

    <!-- ====== Notification =======-->
    <script src="assets/js/notification.js"></script>
    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

    <!-- Signup page scripts -->
    <?php if($title == "Signup"): ?>
        <script src="assets/js/signup.js"></script>
        <script src="ajax/signup.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php endif ?>
    <!-- Verification Page scripts -->
    <?php if ($title == "Verify"): ?>
      <script type="text/javascript" src="ajax/verify.js"></script>
    <?php endif; ?>
    <!-- Login page script -->
    <?php if ($title == "Login"): ?>
        <script type="text/javascript" src="assets/js/login.js"></script>
        <script src="ajax/login.js" charset="utf-8"></script>
    <?php endif; ?>
    <!-- Passsword resaet scripts -->
    <?php if ($title == "Forgot Pass"): ?>
        <script src="assets/js/forgot_pass.js" charset="utf-8"></script>
        <script src="ajax/forgot_pass.js" charset="utf-8"></script>
    <?php endif; ?>
    <!-- Profile page scripts -->
    <?php if ($title == "Profile"): ?>
      <script src="assets/js/profile.js" charset="utf-8"></script>
      <script src="ajax/profile.js" charset="utf-8"></script>
    <?php endif; ?>
    <!-- Riders display scripts -->
    <?php if ($title == "All Riders"): ?>
      <script src="assets/js/all_rider.js" charset="utf-8"></script>
      <script src="ajax/all_rider.js" charset="utf-8"></script>
    <?php endif; ?>
    <!-- Company display scripts -->
    <?php if ($title == "All Companies"): ?>
      <script src="assets/js/all_company.js" charset="utf-8"></script>
      <script src="ajax/all_company.js" charset="utf-8"></script>
    <?php endif; ?>
    <!-- Profile display scripts -->
    <?php if ($title == "View Profile"): ?>
      <script src="assets/js/view_profile.js" charset="utf-8"></script>
      <script src="ajax/view_profile.js" charset="utf-8"></script>
      <script src="assets/js/rider_rating.js" charset="utf-8"></script>

    <?php endif; ?>
    <?php if ($title == "Job Post"): ?>
      <script type="text/javascript" src="assets/js/job_post.js"></script>
      <script type="text/javascript" src="ajax/job_post.js"></script>
    <?php endif; ?>
    <?php if ($title == "Jobs"): ?>
      <script type="text/javascript" src="assets/js/jobs.js"></script>
      <script type="text/javascript" src="ajax/jobs.js"></script>
    <?php endif; ?>
    <?php if ($title == "Main"): ?>
      <script type="text/javascript" src="ajax/home.js"></script>
      <script type="text/javascript" src="assets/js/home.js"></script>
    <?php endif ?>
    <?php if ($title == "Job Application"): ?>
      <script type="text/javascript" src="ajax/job_application.js"></script>
      <script type="text/javascript" src="assets/js/job_application.js"></script>
    <?php endif ?>
</body>

</html>
