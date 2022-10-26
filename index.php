<?php
    session_start();
    $title = "Home";
    if (isset($_SESSION['id']) && $_SESSION['session_type'] == "employee") {
        header('location: home.php');
        // echo "<script>window.location.replace('home.php');</script>";
    }
    require_once "header.php";
?>  
       <section class="ads_area pt-10">
        <div class="row">
            <div class="col-sm-12 col-md-12 white">
                <div class="row">
                    <div class="hero justify-content-center pt-30 pl-30 pr-30 pb-30" style="display: flex; margin: 0 auto; box-sizing: border-box;">
                        <div class="hero-txt col-lg-6" style="box-sizing: border-box; display: flex; flex-direction: column; justify-content: center;">
                            <h1>You Deserve a Good Job, Find One Here.</h1>
                            <h5>Looking for the latest jobs in Nigeria? </h5>
                            <h5>Join thousands of jobseekers who elivated their career in a short perioid of time.</h5>
                            <h5>Build your profile, connect with companies and get hired faster.</h5>
                            
                            <h5>Trusted by over 15,000 companies and Business</h5>
                            <br>
                            <p style="margin: 0 auto;">
                            <button class="btn blue color-white">Get Started</button>                     
                            </p>
                        </div>
                        <div class="hero-img col-lg-6">
                            <!-- <button class="btn color-white"> GET STARTED</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="row p-4" style="background: white;">
                <div class="col-lg-6">
                    <img src="assets/images/img.png" class="main-img">
                </div>
                <div class="col-lg-6 p-3" style="align-self: center;">
                    <p>
                        <h3>Personalised
                        Job search & alerts</h3>
                        <p>
                        Job seekers are daily bombarded with tons of openings they do not need from job platforms . But not with Jobgam!
                        We understand your time is important and very central to your career and life's success.
                        Our advanced algorithm, built with data from your profile, job searches and previous applications, offers you jobs that are within your preferences saving you the much needed time and preventing endless searches!
                    </p>
                    </p>
                </div>
            </div>
            <div class="row p-5" style="background: white;">
                <div class="col-lg-6" style="align-self: center;">
                    <p>
                        <h3>Optimise your Profile</h3>
                        Your chances of being noticed by expert hirers for amazing opportunities improves significantly with an optimized profile. And it is easy, quick and delivers the results you need.!
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="assets/images/img2.png" class="main-img">
                </div>
            </div>
            <div class="row justify-content-center white">
                <div class="col-lg-8">
                    <h2>Hire the Best Candidates for Your Business</h2>
                    <p>We know how to drive targeted candidates to you. Using Artificial intelligence. Also giving you all the tools needed to hire faster and better. Find out why over 83,000 HR’s and Business’s RESUME</p>
                    <br>
                    <img src="assets/images/img3.jpg" style="border-radius: 10px;">
                </div>
            </div>
            <div class="pt-90 pb-90 white"></div>
            <div class="row justify-content-center white pl-20 pr-20 pt-50 pb-50">
                <div class="col-lg-4">
                    <h3>Stay Updated with what we do.</h3>
                    <p>Enter your email address so we can easily get to you.</p>
                </div>
                <div class="col-lg-4">
                    <form>
                        <input type="text" class="form-control" style="display:inline-flex;  width: auto;" placeholder="Enter email addres" name="">
                        <button class="btn color-white blue">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
    require_once "footer.php";
?>
