<?php
require "views/home/components/header.php";
?>

<!-- ==========  banner End ========== -->
<div class="container-fluid bg-dark mb-5 border-bottom" style="padding-top: 80px">
  <div class="d-flex justify-content-between align-items-center pt-5 px-2 wow bounceInDown">
    <div class="border-start-4 px-4 py-4 m-4 d-flex flex-column justify-content-center">
      <h2 class="display-5 m-2 text-white">IEEE ENIS SB ELECTION</h2>
      <h4 class="text-white m-2 pt-2">
        Your chance to be a part of our community!
      </h4>
    </div>
    <div class="headerIcon">
      <img src="assets/img/icons/a-16.png" style="height: 280px; padding: 12px" alt="image" />
    </div>
  </div>
</div>
<!-- ==========  banner End ========== -->

<!-- ========== Candidates Start ========== -->
<div class="container-xxl bg-light rounded-4 border p-4 bg-light-mode wow fadeIn" data-wow-delay="0.2s">
  <div class="container">
    <div class="text-center img-mode mb-5">
      <h2 class="text-dark fw-bold">IEEE ENIS SB Candidates</h2>
      <p class="text-secondary">Number of Candidates 1 out of 5 positions</p>
    </div>
    <div class="row justify-content-center gy-4">
      <!-- team item -->
      <div class="col-6 col-sm-4 col-md-3 col-lg-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="position-relative rounded overflow-hidden shadow-sm border bg-white-mode">
          <div class="overflow-hidden rounded-top">
            <img class="img-fluid w-100" src="assets/img/team/team-21.jpg" alt="Mahdi Bradai" />
          </div>
          <div class="text-center p-3 d-flex flex-column align-items-center">
            <h5 class="text-dark mb-0">Mahdi Bradai</h5>
            <p class="text-muted mb-0">Chairman</p>
            <a href="#event" class="text-primary rounded-pill mb-0" data-bs-toggle="modal" data-bs-target="#event">
              <i class="fas fa-info-circle mr-2"></i>Details
            </a>
          </div>
        </div>
      </div>
      <!-- team item -->
    </div>
  </div>
</div>
<!-- ========== Candidates End ========== -->


<!-- ========== Candidate Details Modal Start ========== -->
<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="eventLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light-mode">
        <h4 class="modal-title text-dark">Candidate Details</h4>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="fa fa-times fa-lg text-dark"></i>
        </button>
      </div>
      <div class="modal-body bg-light-mode">
        <!-- ========== Gallery Start  ==========-->
        <!-- Blog Start -->
        <div class="container-fluid py-5">
          <div class="container">
            <div class="row g-5">
              <div class="col-lg-8">
                <!---->
                <div class="mb-5">
                  <div class="section-title section-title-sm position-relative pb-3 mb-4">
                    <h3 class="mb-0 text-dark">About yourself</h3>
                  </div>
                  <p class="text-dark text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum egestas pharetra elementum. Morbi risus neque, porta at faucibus sed, hendrerit in enim. Nulla sed elit magna. Pellentesque turpis lacus, condimentum in neque lobortis, mollis hendrerit mi. Quisque luctus fringilla nibh, eu consequat lacus aliquam vel. Nam ut mi enim. Vivamus ullamcorper ligula in magna ullamcorper, ac interdum neque mollis. Sed malesuada urna libero, et pharetra sem varius vitae. Ut ut mauris vel nisi porttitor cursus. Cras et nisi et risus maximus scelerisque eu quis justo.</p>
                </div>
                <!---->
                <div class="mb-5">
                  <div class="section-title section-title-sm position-relative pb-3 mb-4">
                    <h3 class="mb-0 text-dark">What you have learned from IEEE so far</h3>
                  </div>
                  <p class="text-dark text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum egestas pharetra elementum. Morbi risus neque, porta at faucibus sed, hendrerit in enim. Nulla sed elit magna. Pellentesque turpis lacus, condimentum in neque lobortis, mollis hendrerit mi. Quisque luctus fringilla nibh, eu consequat lacus aliquam vel. Nam ut mi enim. Vivamus ullamcorper ligula in magna ullamcorper, ac interdum neque mollis. Sed malesuada urna libero, et pharetra sem varius vitae. Ut ut mauris vel nisi porttitor cursus. Cras et nisi et risus maximus scelerisque eu quis justo.</p>
                </div>
                <!---->
                <div class="mb-5">
                  <div class="section-title section-title-sm position-relative pb-3 mb-4">
                    <h3 class="mb-0 text-dark">What you hope to achieve by being involved with IEEE</h3>
                  </div>
                  <p class="text-dark text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum egestas pharetra elementum. Morbi risus neque, porta at faucibus sed, hendrerit in enim. Nulla sed elit magna. Pellentesque turpis lacus, condimentum in neque lobortis, mollis hendrerit mi. Quisque luctus fringilla nibh, eu consequat lacus aliquam vel. Nam ut mi enim. Vivamus ullamcorper ligula in magna ullamcorper, ac interdum neque mollis. Sed malesuada urna libero, et pharetra sem varius vitae. Ut ut mauris vel nisi porttitor cursus. Cras et nisi et risus maximus scelerisque eu quis justo.</p>
                </div>
                <!---->
              </div>
              <div class="col-lg-4">
                <div class="position-relative rounded overflow-hidden shadow-sm border bg-white-mode">
                  <div class="overflow-hidden rounded-top">
                    <img class="img-fluid w-100" src="assets/img/team/team-21.jpg" alt="Mahdi Bradai" />
                  </div>
                  <div class="text-center p-3 d-flex flex-column align-items-center">
                    <h5 class="text-dark mb-0">Mahdi Bradai</h5>
                    <p class="text-dark mb-0">Chairman</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Blog End -->
        <!-- ========== Gallery End ========== -->
      </div>
    </div>
  </div>
</div>
<!-- ========== Candidate Details Modal End ========== -->




<?php
require "views/home/components/footer.php";
?>