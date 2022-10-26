<?php
$title = "Job Application";
require "header.php";
if(!isset($_SESSION['id']) || $_SESSION['id'] == " " || $_SESSION['session_type'] == "employee")
{
  ?>
  <script type="text/javascript">window.location.replace('index.php');</script>
  <?php
}
?>
?>
<div class="page-loader hide" id="page-loader">
  <div class="loader">
    <div>
      <img src="assets/images/icon/loader.svg" alt="">
    </div>
  </div>
</div>
<br><br>
<section class="ads_area pt-70  ">
  <div class="container">
    <div class="applicants-page">
    	<div class="row justify-content-center">
        	<div class="col-lg-9 col-md-9 col-sm-9">
        		<!-- <h3 class="text-center">Job Details</h3> -->
        		<div class="job-details mt-3 text-center">
        			
        		</div>
        	</div>
    	</div>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8 col-md-8">
            	<table class="table table-striped">
            		<thead class="text-center">
            			<th>Picture</th>
            			<th>Applicant</th>
            			<th>CV</th>
            			<th>Action</th>
            		</thead>
            		<tbody id="applicant-list">
            			
            		</tbody>

            	</table>
            </div>
         </div>

    </div>
   </div>
</section>
<div class="modal fade" id="cvModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> View CV</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="cv-display">

      </div>
      <div class="modal-footer">
        <button class="btn purple color-white" type="button" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
require_once 'footer.php';
?>
