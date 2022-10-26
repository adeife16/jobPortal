<?php
$title = "Jobs";
require_once 'header.php';
if(!isset($_SESSION['id']))
{
  ?>
  <script type="text/javascript">window.location.replace('index.php');</script>
  <?php
}
?>
<section class="jobs-page pt-70 mt-70">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-9 col-sm-9">
        <div class="search-tab red color-white p-4 text-center">
          <form class=" job-search" id="job-search" action="" method="post">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-5">
                <div class="form-group">

                  <label for="job-type">Job Type</label>
                  <select class="form-control type" name="job-type" id="job-type">
                    <option value="">Any Type</option>
                    <option value="full-time">Full Time</option>
                    <option value="part-time">Part Time</option>
                    <option value="contract">Contract</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-5">
                <div class="form-group">

                  <label for="job-cat">Category</label>
                  <select class="form-control category" name="job-cat" id="job-cat">
                    <option value="">Any Category</option>
                    <option value="bike">Biker</option>
                    <option value="van">Van Driver</option>
                    <option value="truck">Large Haulage</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 text-center justify-content-center" style="display:flex; align-items:center">
                <button type="button" class="btn blue color-white search" id="search" name="search">SEARCH</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center" id="display-div">

    </div>
  </div>
</section>

<?php
require_once 'footer.php';
?>
