$(function () {

  "use strict";

  //===== Prelooder

  $(window).on('load', function (event) {
    $('.preloader').addClass("hide");
  });

  function preloader(num){
    var num = num
    if(num == 1){
      $('.preloader').fadeIn();
    }
    if(num == 0){
      $('.preloader').delay(500).fadeOut(500);

    }
  }
  // Change logo on scroll down

  $(window).on('scroll', function (event) {
    var scroll = $(window).scrollTop();
    if (scroll < 110) {
      $(".header_navbar").removeClass("sticky");
      $("#change-color").addClass("color-blue");
      $("#change-color").removeClass("color-white");}
      else {
        $(".header_navbar").addClass("sticky");
        $("#change-color").removeClass("color-blue");
        $("#change-color").addClass("color-white");

      }
    });



    //===== Mobile Menu

    $(".navbar-toggler").on('click', function () {
      $(this).toggleClass("active");
    });

    var subMenu = $('.sub-menu-bar .navbar-nav .sub-menu');

    if (subMenu.length) {
      subMenu.parent('li').children('a').append(function () {
        return '<button class="sub-nav-toggler"> <span></span> </button>';
      });

      var subMenuToggler = $('.sub-menu-bar .navbar-nav .sub-nav-toggler');

      subMenuToggler.on('click', function () {
        $(this).parent().parent().children('.sub-menu').slideToggle();
        return false
      });

    }


    //===== Nice Select

    // $('select').niceSelect();




    //===== Slick Testimonial

    $('.testimonial_active').slick({
      dots: false,
      infinite: true,
      arrows: true,
      prevArrow: '<span class="prev"><i class="fa fa-angle-left"></i></span>',
      nextArrow: '<span class="next"><i class="fa fa-angle-right"></i></span>',
      speed: 800,
      slidesToShow: 2,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
    });


    //===== Range Slider Price Range

    var $range = $(".js-range-slider"),
    $inputFrom = $(".js-input-from"),
    $inputTo = $(".js-input-to"),
    instance,
    min = 500,
    max = 8000,
    from = 0,
    to = 0;

    // $range.ionRangeSlider({
    //     skin: "round",
    //     type: "double",
    //     min: min,
    //     max: max,
    //     from: 500,
    //     to: 5500,
    //     onStart: updateInputs,
    //     onChange: updateInputs
    // });
    instance = $range.data("ionRangeSlider");

    function updateInputs(data) {
      from = data.from;
      to = data.to;

      $inputFrom.prop("value", from);
      $inputTo.prop("value", to);
    }

    $inputFrom.on("input", function () {
      var val = $(this).prop("value");

      // validate
      if (val < min) {
        val = min;
      } else if (val > to) {
        val = to;
      }

      instance.update({
        from: val
      });
    });

    $inputTo.on("input", function () {
      var val = $(this).prop("value");

      // validate
      if (val < from) {
        val = from;
      } else if (val > max) {
        val = max;
      }

      instance.update({
        to: val
      });
    });



    //===== Back to top

    // Show or hide the sticky footer button
    $(window).on('scroll', function (event) {
      if ($(this).scrollTop() > 600) {
        $('.back-to-top').fadeIn(200)
      } else {
        $('.back-to-top').fadeOut(200)
      }
    });


    //Animate the scroll to yop
    $('.back-to-top').on('click', function (event) {
      event.preventDefault();

      $('html, body').animate({
        scrollTop: 0,
      }, 1500);
    });


    //=====
  });

  // Validate Password
  function passValidate(pass){

    if(pass.length < 8){
      return false;
    }
  }
  // get session details from backend
  function getSession(){
    $.ajax({
      url: 'backend/session.php',
      type: 'POST',
      cache: false,
      data: {getSession: ''}
    })
    .done(function(response) {
      // if response status is success, create session variables
      data = JSON.parse(response);
      if(data[0].status == "success"){
        var session_details = data[1];
        setSession(session_details);
      }
      else{
      }
      });
      // .fail(function() {
      //   console.log("error");
      // })
      // .always(function() {
      //   console.log("complete");
      // });

    }
    // Hide or display login and signup, profile and logout link depending on session availability
    function setSession(session_details){
      if(session_details === null){
        window.location.replace ('../logout.php');
      }
      else{
        sessionStorage.clear();
        for(var index in session_details) {
          sessionStorage.setItem(index, session_details[index]);
        }
      }
      var sessionId = sessionStorage.getItem("session_id");
      var sessionType = sessionStorage.getItem("session_type");
      if(sessionId == "" || sessionId === null){

        window.location.replace ('../logout.php');

      }
      else{
        $("#has-access").toggleClass('hide');
        $("#access1, #access2").toggleClass('hide');
        $("#sessionUser").append(sessionStorage.getItem("session_name"));
        // Include Rider or Company search in header
        if(sessionType == 'company'){

          $("#session-link").html("<a href='../all_rider.php'>Riders</a>");
          $("#company-session").html("<a href='../job_post.php' class='color-dark' style='color: #222;'>Job Posts</a>");
        }
        else if(sessionType == 'rider'){
          // $("#session-link").html("<a href='../all_company.php'>Companies</a>");
          $("#rider-session").html('<a href="../jobs.php">Jobs</a>');

        }
        else {

        }


      }
    }
    $(document).ready(function() {
      getSession();
      var sessionId = sessionStorage.getItem("session_id");
      setTimeout(function(){ getCart(sessionId) },2000);
    });
