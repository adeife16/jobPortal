<div class="alert-box success"></div>
<div class="alert-box failure"></div>
<div class="alert-box warning"></div>
<!-- <footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Your Website 2019</span>
    </div>
  </div>
</footer> -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="logout.php">Logout</a>
  </div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="js/main.js"></script>
<script src="js/notification.js" charset="utf-8"></script>

<!-- Dashboard page scripts -->
<?php if ($title == "Dashboard"): ?>
  <script src="js/dashboard.js" charset="utf-8"></script>
  <script src="ajax/dashboard.js" charset="utf-8"></script>
<?php endif; ?>
<?php if ($title == 'Profile'): ?>
  <script src="js/profile.js" charset="utf-8"></script>
  <script src="ajax/profile.js" charset="utf-8"></script>
<?php endif; ?>
<!-- request page script -->
<?php if ($title == "Request"): ?>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="js/request.js" charset="utf-8"></script>
  <script src="ajax/request.js" charset="utf-8"></script>
<?php endif; ?>
<?php if ($title == "Employees"): ?>
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <script src="vendor/datatables/jquery.dataTables.min.js" charset="utf-8"></script>
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


  <script src="js/employees.js" charset="utf-8"></script>
  <script src="ajax/employees.js" charset="utf-8"></script>

<?php endif; ?>
<?php if ($title == "Companies"): ?>
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <script src="vendor/datatables/jquery.dataTables.min.js" charset="utf-8"></script>
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


  <script src="js/companies.js" charset="utf-8"></script>
  <script src="ajax/companies.js" charset="utf-8"></script>

<?php endif; ?>

<!-- Page level plugins -->
<!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script> -->

</body>

</html>
