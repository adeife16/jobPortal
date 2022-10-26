<?php
$title="Product View";
require_once 'header.php';
?>
<section class="product-page pt-4">
  <div class="container">
    <div class="row pt-5 mt-5">
      <div class="col-sm-12">
        <h2>PRODUCT DETAILS</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-5">
        <div class="product-image">
          <!-- Images used to open the lightbox -->
          <div class="row">
            <div class="col-sm-12">
              <div class="display-window">
                <img src="" data-toggle="modal" data-target="#imageModal" onclick="openModal(this);" class="display-image" id="display-image">
              </div>
              <div class="thumbnail-window m-2">
                <img src="" id="thumbnail1" onclick="showImage(this);" alt="" class="thumbnail hover-shadow">
                <img src="" id="thumbnail2" onclick="showImage(this);" alt="" class="thumbnail hover-shadow">
                <img src="" id="thumbnail3" onclick="showImage(this);" alt="" class="thumbnail hover-shadow">
              </div>
            </div>
          </div>
        </div>
        <!-- The Modal/Lightbox -->
        <div id="myModal" class="modal dark">
          <span class="close cursor" onclick="closeModal()">&times;</span>
          <div class="modal-content">
          </div>
        </div>
      </div>
    <div class="col-lg-7">
      <table class="table product-details" id="product-details">

      </table>
    </div>
  </div>

</div>
</div>
</div>

</section>
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog cart-dialog" role="document">
    <div class="modal-content cartModal">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body image-modal">
        <img src="" class="zoom-image w-100" id="zoom-image" alt="">
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<?php
require_once 'footer.php';
?>
