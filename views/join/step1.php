<?php
require "views/home/components/header.php";
?>

<!-- ==========  banner End ========== -->
<div class="container-fluid bg-dark mb-5 border-bottom" style="padding-top: 80px">
  <div class="d-flex justify-content-between align-items-center pt-5 px-4 wow bounceInDown">
    <div class="border-start-4 px-4 py-4 m-4 d-flex flex-column justify-content-center">
      <h1 class="display-5 m-2 text-white">JOIN US</h1>
      <h4 class="text-white m-2 pt-2">
        Step 1 : Sign Up for an IEEE Account.
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
          1. Due to limited payment options (no MasterCard, technology cards, or PayPal), IEEE ENIS SB will handle the payment.<br>
          2. Follow the tutorial carefully to create the IEEE account.<br>
          3. After creating your IEEE account, provide us with the email address and password you used.<br>
          4. We need access to your account for payment processing.<br>
          5. Please ensure all submitted information is accurate.
        </p>

      </div>
      <div class="col-lg-6 d-flex align-items-center justify-content-center wow slideInUp" data-wow-delay="0.1s">
        <iframe width="600" height="350" src="https://www.youtube.com/embed/ombVAw4wA3U?si=1vLjqB9FIc2no8hN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
      <div class="col-lg-6 d-flex align-items-center justify-content-center wow fadeIn" data-wow-delay="0.3s">
        <form method="POST" action="index.php?url=submit_step1">
          <div class="row g-2">
            <div class="col-12">
              <label for="fullname" class="control-label text-dark">Full Name</label>
              <input type="text" id="fullname" name="fullname" class="form-control" required />
            </div>
            <div class="col-12">
              <label for="email" class="control-label text-dark">Email</label>
              <input type="email" id="email" name="email" class="form-control" required />
            </div>
            <div class="col-12">
              <label for="password" class="control-label text-dark">Password</label>
              <input type="password" id="password" name="password" class="form-control" required />
            </div>
            <div class="col-12">
              <label for="department" class="control-label text-dark">Department</label>
              <select id="department" name="department" class="form-control form-select" required>
                <option value="computer engineering">Computer Engineering</option>
                <option value="electrical engineering">Electrical Engineering</option>
                <option value="electromechanical engineering">Electromechanical Engineering</option>
                <option value="materials engineering">Materials Engineering</option>
                <option value="civil engineering">Civil Engineering</option>
                <option value="biological engineering">Biological Engineering</option>
                <option value="geo-resources and environmental engineering">Geo-resources and Environmental Engineering</option>
              </select>
            </div>
            <div class="col-12 form-check">
              <input type="checkbox" class="form-check-input" id="termsCheckbox" required>
              <label class="text-dark form-check-label" for="termsCheckbox">
                I agree to the <a href="#termsModal" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a>
              </label>
            </div>
            <div class="col-12 mt-3">
              <button class="btn btn-primary w-100 py-2" type="submit">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- ========== Terms and Conditions start ========== -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light-mode">
        <h4 class="modal-title text-dark">Terms and Conditions</h4>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="fa fa-times fa-lg text-dark"></i>
        </button>
      </div>
      <div class="modal-body bg-light-mode">
        <p class="text-dark">
          - IEEE ENIS SB will handle payments on behalf of members due to the absence of MasterCard, technology cards, or PayPal in our region. <br>
          - By agreeing, you authorize IEEE ENIS SB to use your IEEE account details exclusively for processing payments. <br>
          - You agree to provide accurate information during the account access process. IEEE ENIS SB will treat your account information confidentially and utilize it solely for payment processing as outlined in these Terms and Conditions. <br>
          - IEEE ENIS SB assumes responsibility for securely processing payment transactions associated with your IEEE account.
        </p>
      </div>
    </div>
  </div>
</div>
<!-- ==========  Events section End ========== -->





<?php
require "views/home/components/footer.php";
?>