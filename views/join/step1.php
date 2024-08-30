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
          1. IEEE ENIS SB will handle payment due to limited options (no MasterCard, technology cards, or PayPal).<br>
          2. Follow the tutorial to create an IEEE account. Once you have done, share your email address with us for payment processing.<br>
          3. After submitting the form, please make sure to pay the membership fee of 45 DT to the <a href="#sbOfficers" data-bs-toggle="modal" data-bs-target="#sbOfficers">
            following SB members</a>.

          <br>
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
              <label for="email" class="control-label text-dark">Email used for IEEE account</label>
              <input type="email" id="email" name="email" class="form-control" required />
            </div>
            <div class="col-12">
              <label for="password" class="control-label text-dark">Password used for IEEE account</label>
              <input type="text" id="password" name="password" class="form-control" required />
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
    <div class="row pt-5 justify-content-center wow fadeIn" data-wow-delay="0.3s">
      <div class="col-6 col-lg-2">
        <a href="index.php?url=step2" class="btn btn-primary rounded-pill d-flex justify-content-center align-items-center">
          Step 2 <i class="fa fa-arrow-right mx-2"></i>
        </a>
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

<!-- ========== SB Officers ========== -->
<div class="modal fade" id="sbOfficers" tabindex="-1" role="dialog" aria-labelledby="sbOfficersLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light-mode">
        <h4 class="modal-title text-dark">You can make the payment in person to the following SB members</h4>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="fa fa-times fa-lg text-dark"></i>
        </button>
      </div>
      <div class="modal-body bg-light-mode">
        <div class="container-fluid py-5">
          <div class="row g-5 justify-content-center">
            <!---->
            <div class="col-lg-3">
              <div class="position-relative rounded overflow-hidden">
                <div class="team-item border border-2 bg-light-mode">
                  <div class="overflow-hidden team-img">
                    <img class="img-fluid w-100" src="assets/img/team/team-21.jpg" alt="image" />
                  </div>
                  <div class="text-center p-2">
                    <h5 class="text-dark">Mahdi Bradai</h5>
                    <p class="text-dark">Chairman</p>
                  </div>
                </div>
              </div>
            </div>
            <!---->
            <div class="col-lg-3">
              <div class="position-relative rounded overflow-hidden">
                <div class="team-item border border-2 bg-light-mode">
                  <div class="overflow-hidden team-img">
                    <img class="img-fluid w-100" src="assets/img/team/team-22.jpg" alt="image" />
                  </div>
                  <div class="text-center p-2">
                    <h5 class="text-dark">Oussama Slimani</h5>
                    <p class="text-dark">Project Manager</p>
                  </div>
                </div>
              </div>
            </div>
            <!---->
            <div class="col-lg-3">
              <div class="position-relative rounded overflow-hidden">
                <div class="team-item border border-2 bg-light-mode">
                  <div class="overflow-hidden team-img">
                    <img class="img-fluid w-100" src="assets/img/team/team-25.jpg" alt="image" />
                  </div>
                  <div class="text-center p-2">
                    <h5 class="text-dark">Iheb Charfeddine</h5>
                    <p class="text-dark">Treasurer</p>
                  </div>
                </div>
              </div>
            </div>
            <!---->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ========== SB Officers ========== -->



<?php
require "views/home/components/footer.php";
?>