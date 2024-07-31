<?php
require "views/home/components/header.php";
?>

<!-- ==========  banner End ========== -->
<div class="container-fluid bg-dark mb-5 border-bottom" style="padding-top: 80px">
  <div class="d-flex justify-content-between align-items-center pt-5 px-2 wow bounceInDown">
    <div class="border-start-4 px-4 py-4 m-4 d-flex flex-column justify-content-center">
      <h1 class="display-5 m-2 text-white">OUR ACTIVITIES</h1>
      <h4 class="text-white m-2 pt-2">
        Powered by Vtools API Service!
      </h4>
    </div>
    <div class="headerIcon">
      <img src="assets/img/icons/a-15.png" style="height: 220px; padding: 12px" alt="image" />
    </div>
  </div>
</div>
<!-- ==========  banner End ========== -->

<!-- ======= Upcoming & Activities Start ======= -->
<div class="container-fluid py-5">
  <!-- Upcoming Section -->
  <div class="section-title text-center position-relative pb-2 mb-2 mx-auto" style="max-width: 600px">
    <h5 class="fw-bold text-primary text-uppercase">Stay Tuned</h5>
    <h2 class="mb-0 text-dark">Exciting Upcoming Await!</h2>
  </div>
  <div class="container py-3">
    <div class="activities row g-5">
      <!-- Notification -->
      <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
        <?php if (!empty($notification_upcoming)) : ?>
          <div class="alert alert-info" role="alert">
            <?= htmlspecialchars($notification_upcoming) ?>
          </div>
        <?php endif; ?>
      </div>
      <!-- Loop through upcoming -->
      <?php if (!empty($upcoming)) : ?>
        <?php foreach ($upcoming as $up) : ?>
          <div class="col-lg-4 col-md-6 wow fadeInUp">
            <div class="activities-container container p-4 border border-2 border-primary-radius-2 bg-light-mode">
              <div class="border-bottom p-1 mb-4 d-flex justify-content-between align-items-center">
                <div style="max-width: 80%">
                  <h4 class="text-dark"><?= htmlspecialchars($up['title']) ?></h4>
                  <p class="text-dark">By <?= htmlspecialchars($up['chapter']) ?></p>
                </div>
                <div class="circle d-flex justify-content-center align-items-center">
                  <img src="<?= htmlspecialchars($up['chapter_logo_path']) ?>" alt="Chapter Logo" />
                </div>
              </div>
              <p class="act-description text-dark"><?= htmlspecialchars($up['description']) ?></p>
              <div class="d-flex justify-content-between">
                <p class="text-dark">
                  <i class="fa fa-folder me-2"></i>Category
                </p>
                <p class="text-dark"><?= htmlspecialchars($up['category']) ?></p>
              </div>
              <div class="d-flex justify-content-between">
                <p class="text-dark"><i class="fa fa-calendar me-2"></i>Date</p>
                <p class="text-dark"><?= htmlspecialchars($up['date']) ?></p>
              </div>
              <div class="d-flex justify-content-between mb-2">
                <p class="text-dark">
                  <i class="fa fa-map-marker-alt me-2"></i>Location Type
                </p>
                <p class="text-dark"><?= htmlspecialchars($up['location_type']) ?></p>
              </div>
              <div class="d-flex justify-content-center">
                <a href="<?= htmlspecialchars($up['link']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary rounded-pill py-2 px-3 mb-1">Vtools Link</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

  <!-- Activities Section -->
  <div class="section-title text-center position-relative pb-2 mb-2 mx-auto" style="max-width: 600px">
    <h5 class="fw-bold text-primary text-uppercase">Our Activities</h5>
    <h2 class="mb-0 text-dark">Engage with Us!</h2>
  </div>
  <div class="container py-3">
    <div class="activities row g-4">
      <!-- Notification -->
      <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
        <?php if (!empty($notification_activities)) : ?>
          <div class="alert alert-info" role="alert">
            <?= htmlspecialchars($notification_activities) ?>
          </div>
        <?php endif; ?>
      </div>
      <!-- Loop through activities -->
      <?php if (!empty($activities)) : ?>
        <?php foreach ($activities as $activity) : ?>
          <div class="col-lg-4 col-md-6 wow fadeInUp">
            <div class="activities-container container p-4 border border-2 border-primary-radius-2 bg-light-mode">
              <div class="border-bottom p-1 mb-4 d-flex justify-content-between align-items-center">
                <div style="max-width: 80%">
                  <h4 class="text-dark"><?= htmlspecialchars($activity['title']) ?></h4>
                  <p class="text-dark">By <?= htmlspecialchars($activity['chapter']) ?></p>
                </div>
                <div class="circle d-flex justify-content-center align-items-center">
                  <img src="<?= htmlspecialchars($activity['chapter_logo_path']) ?>" alt="Chapter Logo" />
                </div>
              </div>
              <p class="act-description text-dark"><?= htmlspecialchars($activity['description']) ?></p>
              <div class="d-flex justify-content-between">
                <p class="text-dark">
                  <i class="fa fa-folder me-2"></i>Category
                </p>
                <p class="text-dark"><?= htmlspecialchars($activity['category']) ?></p>
              </div>
              <div class="d-flex justify-content-between">
                <p class="text-dark"><i class="fa fa-calendar me-2"></i>Date</p>
                <p class="text-dark"><?= htmlspecialchars($activity['date']) ?></p>
              </div>
              <div class="d-flex justify-content-between mb-2">
                <p class="text-dark">
                  <i class="fa fa-map-marker-alt me-2"></i>Location Type
                </p>
                <p class="text-dark"><?= htmlspecialchars($activity['location_type']) ?></p>
              </div>
              <div class="d-flex justify-content-center">
                <a href="<?= htmlspecialchars($activity['link']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary rounded-pill py-2 px-3 mb-1">Vtools Link</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<!-- ======= Upcoming & Activities End ======= -->




<?php
require "views/home/components/footer.php";
?>