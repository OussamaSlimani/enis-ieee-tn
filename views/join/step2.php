<?php
require "views/home/components/header.php";
?>

<!-- ==========  banner End ========== -->
<div class="container-fluid bg-dark mb-5 border-bottom" style="padding-top: 80px">
  <div class="d-flex justify-content-between align-items-center pt-5 px-4 wow bounceInDown">
    <div class="border-start-4 px-4 py-4 m-4 d-flex flex-column justify-content-center">
      <h1 class="display-5 m-2 text-white">JOIN US</h1>
      <h4 class="text-white m-2 pt-2">
        Step 2 : Wait for Your Membership Payment.
      </h4>
    </div>
    <div class="headerIcon">
      <img src="assets/img/icons/a-05.png" style="height: 250px; padding: 12px" alt="image" />
    </div>
  </div>
</div>
<!-- ==========  banner End ========== -->


<!-- ========== Join Start ========== -->
<section class="container-fluid py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
        <?php if (!empty($notification)) : ?>
          <?php if ($notification['success'] == true) : ?>
            <div class="alert alert-success" role="alert" id="notification">
              <?php echo $notification['message']; ?>
            </div>
          <?php else : ?>
            <div class="alert alert-danger" role="alert" id="notification">
              <?php echo $notification['message']; ?>
            </div>
          <?php endif; ?>
        <?php endif; ?>
      </div>

      <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
        <h3 class="text-dark">Instructions</h3>
        <p class="text-dark">
          1. After paying the membership fee, wait for our treasurer to process payment on the IEEE website.<br>
          2. You can easily verify whether the payment has been processed or not using the form below.<br>
          3. If you encounter any problems or issues, please contact the IEEE ENIS SB treasurer.<br>
        </p>
      </div>
      <div class="col-lg-6 d-flex align-items-center justify-content-center wow fadeIn" data-wow-delay="0.3s">
        <form method="POST" action="index.php?url=submit_step2">
          <div class="row g-3">
            <div class="col-12">
              <label for="email" class="control-label text-dark">Email used for IEEE account</label>
              <input type="email" id="email" name="email" class="form-control" required />
            </div>
            <div class="col-12">
              <label for="password" class="control-label text-dark">Password used for IEEE account</label>
              <input type="password" id="password" name="password" class="form-control" required />
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100 py-2" type="submit">Verifier</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-6 d-flex align-items-center justify-content-center wow slideInUp" data-wow-delay="0.1s">

        <div class="p-4 wow fadeIn" data-wow-delay="0.5s">
          <img src="assets/img/team/team-25.jpg" height="200" alt="tre">
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center">
          <h3 class="text-dark">Iheb Charfeddine</h3>
          <p class="text-dark">IEEE ENIS SB Treasurer</p>
          <div class="d-flex mt-2">
            <a class="btn btn-primary btn-square me-2 wow fadeInUp" data-wow-delay="0.5s" href="https://www.facebook.com/iheb.charfeddine.7" target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
            <a class="btn btn-primary btn-square me-2 wow fadeInUp" data-wow-delay="0.6s" href="https://www.linkedin.com/in/iheb-charfeddine-77b617252/" target="_blank"><i class="fab fa-linkedin-in fw-normal"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row pt-5 justify-content-center wow fadeIn" data-wow-delay="0.3s">
      <div class="col-lg-4 d-flex align-items-center justify-content-center">
        <a href="index.php?url=step1" class="btn btn-primary rounded-pill d-flex justify-content-center align-items-center m-1">
          <i class="fa fa-arrow-left mx-2"></i> Step 1
        </a>
        <a href="index.php?url=step3" class="btn btn-primary rounded-pill d-flex justify-content-center align-items-center m-1">
          Step 3 <i class="fa fa-arrow-right mx-2"></i>
        </a>
      </div>
    </div>
  </div>
</section>
<!-- ========== Join End ========== -->


<?php
require "views/home/components/footer.php";
?>