<?php
$title = "Verify";
require "header.php";
if(isset($_SESSION['id']) || $_SESSION['id'] != "")
{
  ?>
  <script type="text/javascript">window.location.replace('index.php');</script>
  <?php
}
?>
?>
<br>
<br>
<br>
<section class="ads_area pt-70  ">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12-md-12-sm-12">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-8 col-sm-8">
            <div class="verify-box">
              <div class="verify-box-content">
                <p class="">
                  <h5 class="blue color-white p-2 card text-center message"></h5>
                </p>
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
require_once "footer.php";
?>
