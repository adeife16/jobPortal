<?php

?>
<div class="alert-box success">hey</div>
<div class="alert-box failure"></div>
<div class="alert-box warning"></div>
<footer class="footer_area blue mt-50">
  <div class=" pt-15 pb-30">
    <div class="container">
      <div class="footer_copyright_wrapper text-center d-sm-flex justify-content-between align-items-center">
        <div class="copyright mt-15">
          <p>&copy; <?php echo date('Y'); ?> JAAD LOGISTICS</p>
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
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog cart-dialog" role="document">
    <div class="modal-content cartModal">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Product Cart</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body display-cart" id="display-cart">
        <h2 class="blue color-white text-center">Cart is Empty</h2>
      </div>
      <hr>
      <div class="display-gross color-red pl-5">
        Gross Total:
        <div class="gross-total color-red" id="gross-total">
          &#8358;0
        </div>
      </div>
      <div class="modal-footer">
        <div class="action-btn">
          <button type="button" class="btn color-white blue" name="checkout" id="checkout">Checkout</button>
          <button class="btn purple color-white" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TOP TOP PART START ======-->

<a href="#" class="back-to-top"><i class="icon ion-arrow-up-c"></i></a>

<!--====== BACK TOP TOP PART ENDS ======-->


<!-- Global scripts -->

<!--====== Jquery js ======-->
<script src="js/vendor/jquery-3.5.1.js"></script>
<script src="js/vendor/modernizr-3.7.1.min.js"></script>

<!--====== Bootstrap js ======-->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!--====== Slick js ======-->
<script src="js/slick.min.js"></script>

<!-- ====== Notification =======-->
<script src="js/notification.js"></script>
<!--====== Main js ======-->
<script src="js/main.js"></script>
<script src="js/cart.js"></script>
<script src="ajax/cart.js"></script>

<!-- =======Index Page ========= -->
<?php if ($title == "Home"): ?>
  <script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript" src="ajax/index.js"></script>
<?php endif; ?>
<!-- Product Page -->
<?php if ($title == "Product View"): ?>
  <script type="text/javascript" src="js/carousel.js"></script>
  <script type="text/javascript" src="js/product.js"></script>
  <script type="text/javascript" src="ajax/product.js"></script>
<?php endif; ?>
</body>

</html>
