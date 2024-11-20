<?php
require "views/home/components/header.php";
?>

<!-- ==========  banner End ========== -->
<div class="container-fluid bg-dark mb-5 border-bottom" style="padding-top: 80px">
  <div class="d-flex justify-content-between align-items-center pt-5 px-4 wow bounceInDown">
    <div class="border-start-4 px-4 py-4 m-4 d-flex flex-column justify-content-center">
      <h1 class="display-5 m-2 text-white">JOIN US</h1>
      <h4 class="text-white m-2 pt-2">
        Step 3 : Get Your IEEE Email Address
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
          1. This step is optional but highly recommended!<br>
          2. Follow the tutorial to get you IEEE Email address and IEEE Number. <br>
          3. Once you have done, share your new Email address and IEEE Number with us.<br>
        </p>
      </div>
      <div class="col-lg-6 d-flex align-items-center justify-content-center wow slideInUp" data-wow-delay="0.1s">
        <iframe width="600" height="350" src="https://www.youtube.com/embed/MKf146C0uJs?si=uhSrQJkUjWPwQcJn" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
      <div class="col-lg-6 d-flex align-items-center justify-content-center wow fadeIn" data-wow-delay="0.3s">
        <form method="POST" action="index.php?url=submit_step3">
          <div class="row g-2">
            <div class="col-12">
              <label for="IeeeNumber" class="control-label text-dark">IEEE Number</label>
              <input type="IeeeNumber" id="IeeeNumber" name="IeeeNumber" class="form-control" required />
            </div>
            <div class="col-12">
              <label for="ieeeEmail" class="control-label text-dark">IEEE Email</label>
              <input type="ieeeEmail" id="ieeeEmail" name="ieeeEmail" class="form-control" required />
            </div>
            <div class="col-12">
              <label for="email" class="control-label text-dark">Email used to create IEEE account (Step 1)</label>
              <input type="email" id="email" name="email" class="form-control" required />
            </div>
            <div class="col-12">
              <label for="password" class="control-label text-dark">Password</label>
              <input type="text" id="password" name="password" class="form-control" required />
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100 py-2" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row pt-5 justify-content-center wow fadeIn" data-wow-delay="0.3s">
      <div class="col-6 col-lg-2">
        <a href="index.php?url=step2" class="btn btn-primary rounded-pill d-flex justify-content-center align-items-center">
          <i class="fa fa-arrow-left mx-2"></i> Step 2
        </a>
      </div>
    </div>
  </div>
</section>
<!-- ========== Join End ========== -->


<?php
require "views/home/components/footer.php";
?>