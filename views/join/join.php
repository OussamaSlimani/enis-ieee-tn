<?php
require "views/home/components/header.php";
?>

<!-- ==========  banner End ========== -->
<div class="container-fluid bg-dark mb-5 border-bottom" style="padding-top: 80px">
  <div class="d-flex justify-content-between align-items-center pt-5 px-4 wow bounceInDown">
    <div class="border-start-4 px-4 py-4 m-4 d-flex flex-column justify-content-center">
      <h1 class="display-5 m-2 text-white">JOIN US</h1>
      <h4 class="text-white m-2 pt-2">
        Join us in 3 simple steps!
      </h4>
    </div>
    <div class="headerIcon">
      <img src="assets/img/icons/a-05.png" style="height: 250px; padding: 12px" alt="image" />
    </div>
  </div>
</div>
<!-- ==========  banner End ========== -->

<!-- ========== join Start ========== -->
<div class="container-fluid py-5">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4 mb-4 wow slideInUp" data-wow-delay="0.1s">
        <div class="bg-light-mode flex-fill border border-2 border-primary d-flex flex-column align-items-center text-center p-5" style="height:100%">
          <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px">
            <h2 class="text-white">1</h2>
          </div>
          <h3 class="text-dark">Sign Up for an IEEE Account</h3>
          <p class="mb-0 text-dark">
            Go to the official IEEE website and follow the steps in the tutorial video.
          </p>
          <a class="btn btn-primary rounded-pill py-2 px-3 mb-0 mt-4" href="index.php?url=step1">Go to step 1</a>
        </div>
      </div>
      <div class="col-lg-4  mb-4 wow slideInUp" data-wow-delay="0.4s">
        <div class="bg-light-mode border border-2 border-primary d-flex flex-column align-items-center text-center p-5" style="height:100%">
          <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px">
            <h2 class="text-white">2</h2>
          </div>
          <h3 class="text-dark">Wait for Your Membership Payment</h3>
          <p class="mb-0 text-dark">
            Please wait while we process your membership fee.
          </p>
          <a class="btn btn-primary rounded-pill py-2 px-3 mb-0 mt-4" href="index.php?url=step2">Go to step 2</a>
        </div>
      </div>
      <div class="col-lg-4 mb-4  wow slideInUp" data-wow-delay="0.8s">
        <div class="bg-light-mode border border-2 border-primary d-flex flex-column align-items-center text-center p-5" style="height:100%">
          <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px">
            <h2 class="text-white">3</h2>
          </div>
          <h3 class="text-dark">Get Your IEEE Email Address</h3>
          <p class="mb-0 text-dark">
            Visit the official IEEE website to get your own IEEE email address.
          </p>
          <a class="btn btn-primary rounded-pill py-2 px-3 mb-0 mt-4" href="index.php?url=step3">Go to step 3</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ========== join End ========== -->

<?php
require "views/home/components/footer.php";
?>