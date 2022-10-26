
<?php
  session_start();
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <title><?php echo $title;?></title> -->

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="icon" href="images/logo.png" type="image/png">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <!--====== PRELOADER PART START ======-->

  <div class="preloader" id="preloader">
    <div class="loader">
      <div>
        <img src="images/icon/loader.svg" alt="">
      </div>
    </div>
  </div>


<header class="header_area">
  <div class="social-top p-2">
    <div class="contact-icons">
      <ul>
        <li class="color-white"><i class="fa color-white fa-md fa-phone" aria-hidden="true"></i> 08029273647</li>
        <li class="color-white"><i class="fa color-white fa-md fa-phone" aria-hidden="true"></i> 08123573847</li>
      </ul>

    </div>
    <div class="social-icons">
      <ul>
        <li><a href=""><i class="fab color-white fa-md fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fab color-white fa-md fa-whatsapp" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fab color-white fa-md fa-instagram" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fab color-white fa-md fa-twitter" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
  <div class="header_navbar mt-4">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="../index.php">
          <span>
            <img src="images/logo.png" alt="logo" style="width: 70px;">
            <small style="display: inline-flex; font-weight:bold;"><span class="color-red">JAAD</span> <span class="color-blue" id="change-color">LOGISTICS</span></small>
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="fasse" aria-label="Toggle navigation">
          <span class="toggler-icon"></span>
          <span class="toggler-icon"></span>
          <span class="toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto">
            <li>
              <a class="active" href="../index.php">Home</a>
            </li>
            <!-- <li>
              <a href="#">Pages <i class="fa fa-angle-down"></i></a>

              <ul class="sub-menu">
                <li><a href="about.html">About</a></li>
                <li><a href="product.html">Listing</a></li>
                <li><a href="product-details.html">Product Details</a></li>
                <li><a href="error-404.html">404</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="pricing.html">Pricing</a></li>


              </ul>
            </li> -->
            <li><a href="index.php">Store</a></li>
            <li><a href="../about.php">About Us<span class="line"></span></a></li>
            <li id="rider-session"></li>
            <li id="session-link">

            </li>
            <li>
            <span  class="">
              <li><a href="../login.php" id="access1" class="nav-link ">Login</a></li>
              <li><a href="../signup.php" id="access2" class="nav-link">Signup</a></li>
            </span>
            </li>
          </ul>
        <div class="dropdown hide" id="has-access">
          <a href="#" class="dropdown-toggle color-dark" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="fasse"> <span id="sessionUser"></span> </a>
          <div class="dropdown-menu access-menu" aria-labelledby="dropdownMenuLink">
            <ul class="access-sub-menu">
              <li><a href="../profile.php" class="color-dark" style="color: #222;">Profile</a></li>
              <li id="company-session"></li>
              <li><a href="logout.php"  class="color-dark" style="color: #222;">Logout</a></li>
            </ul>
          </div>

        </div>
        </div>
      </div>
      <!--
      <div class="dropdown">
      <a href="#" class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="fasse">My Account</a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <ul class="sub-menu">
      <li><a href="dashboard.html"><i class="fas fa-cogs"></i> Dashboard</a></li>
      <li><a href="profile-settings.html"><i class="fas fa-cog"></i> Profile Settings</a></li>
      <li><a href="my-ads.html"><i class="fas fa-layer-group"></i> My Ads</a></li>
      <li><a href="offermessages.html"><i class="fas fa-envelope"></i> Offers/Messages</a></li>
      <li><a href="payments.html"><i class="fas fa-wallet"></i> Payments</a></li>
      <li><a href="favourite-ads.html"><i class="fas fa-heart"></i> My Favourites</a></li>
      <li><a href="privacy-setting.html"><i class="fas fa-star"></i> Privacy Settings</a></li>
      <li><a href="#"><i class="fas fa-sign-out"></i> Sign Out</a></li>
    </ul>
  </div>
</div> -->
</nav>
</div>
</div>
</header>
<!-- <div class="page-loader hide" id="page-loader">
  <div class="loader">
    <div>
      <img src="images/icon/loader.svg" alt="">
    </div>
  </div>
</div> -->

<button type="button" name="cart-btn" data-toggle="modal" id="cart-btn" data-target="#cartModal" class="btn cart-btn"><span class="cart-tag">0</span><i class="icon ion-android-cart"></i></button>
