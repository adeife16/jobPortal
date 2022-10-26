<?php
$title = "All Riders";
require "header.php";
if(!isset($_SESSION['id']) || $_SESSION['id'] == "")
{
  ?>
  <script type="text/javascript">window.location.replace('index.php');</script>
  <?php
}
?>
<br>
<section class="ads_area pt-70 mt-5">
  <div class="container">
    <div class="search-page">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-9 col-sm-9">
          <div class="search-tab red color-white p-4 text-center">
            <form class=" rider-search" action="" method="post">
              <div class="row justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-5">
                  <div class="form-group">

                    <label for="rider-state">State</label>
                    <select class="form-control rider-state" name="rider-state" id="rider-state">
                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-5">
                  <div class="form-group">

                    <label for="rider-city">City</label>
                    <select class="form-control rider-city" name="rider-city" id="rider-city">
                    </select>
                  </div>
                </div>
                <!-- <div class="col-lg-3 col-md-3 col-sm-3">
                <label for="rider-exp">Experience</label>
                <input type="number" class="form-control rider-exp" name="rider-exp" id="rider-exp" min="0">
              </div> -->
              <div class="col-lg-2 col-md-2 col-sm-2 text-center justify-content-center" style="display:flex; align-items:center">
                <button type="button" class="btn blue color-white search" id="search" name="search">SEARCH</button>
                <button type="button" class="btn blue color-white search-btn hide" id="search-btn" name="search">SEARCH</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center display-div" id="display-div">

    </div>
    <div class="load-more mt-20  text-center" id="load-more">

    </div>
    <div class="search-loader hide text-center" id="search-loader">
          <img src="assets/images/icon/loader.svg" alt="">
    </div>
    <input type="hidden" id="pagination" class="hide" disabled>
  </div>
</div>

<?php
require_once 'footer.php';
?>
