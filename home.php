<?php
	$title = "Main";
	require_once 'header.php';
	if(!isset($_SESSION['id']) || $_SESSION['id'] == "")
{
  ?>
  <script type="text/javascript">window.location.replace('index.php');</script>
  <?php
}
?>
<section class="ads_area pt-150">
	<div class="row justify-content-center mb-50">
		<div class="col-lg-12">
			<form class="form justify-content-center" id="search-form" name="search-form" method="post" action="">
				<div class="row justify-content-center" style="al">
					<div class="col-lg-5">
						<span for="query">Keywords</span>
						<input type="text" name="query" id="query" class="form-control" placeholder="Job title, keywords, or company" style="width: 90%; display: inline-flex;">
					</div>
					<div class="col-lg-5" style="align-self: self-end;">
						<span for="location">Location</span>
						<select class="form-control mr-10" id="location" name="location" style="width: 70%; display:inline-flex; ">
						
						</select>
						<button class="btn blue color-white" id="search" name="search">Find Jobs</button>
					</div>
<!-- 					<div class="col-lg-2" style="align-self: flex-end;">
						
					</div> -->

				</div>
			</form>
		</div>
	</div>
	<hr>
	<div class="row justify-content-center pl-50 pr-50" >
		<div class="col-lg-4">
			<div class="joblist" id="joblist">

			</div>
		</div>
		<div class="col-lg-6 displayPanel">
			<div class="displayjob white" id="displayjob" style="">

			</div>
		</div>
	</div>
</section>
<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Job Application</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <hr>
          <form class="form" action="" id="application" method="post">
	          <div class="form-group">
	          	<input type="hidden" name="jobId" id="jobId" value="">
	            <label for="">Upload Your CV</label>
	            <div class="file-upload2">
	              <button class="file-upload-btn btn blue color-white" type="button" onclick="$('.file-upload-input2').trigger( 'click' )">Upload File</button>
	              <div class="image-upload-wrap2">
	                <div class="drag-text">
	                  <input class="file-upload-input2" type='file' name="logo" id="file-upload2" onchange="readURL2(this);" accept=".pdf" />
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
	          <hr>
	          <div class="form-group text-center">
	          	<button class="btn blue color-white submit" id="submit" value="" type="button">SUBMIT</button>
	          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button class="btn purple color-white" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<?php 
	require_once 'footer.php';
?>