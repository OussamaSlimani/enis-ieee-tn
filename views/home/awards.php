<?php
require "views/home/components/header.php";
?>

<!-- ==========  banner End ========== -->
<div class="container-fluid bg-dark mb-5 border-bottom" style="padding-top: 80px">
  <div class="d-flex justify-content-between align-items-center pt-5 px-2 wow bounceInDown">
    <div class="border-start-4 px-4 py-4 m-4 d-flex flex-column justify-content-center">
      <h1 class="display-5 m-2 text-white">OUR AWARDS!</h1>
      <h4 class="text-white m-2 pt-2">
        2023/2024 ENIS SB Awards.
      </h4>
    </div>
    <div class="headerIcon">
      <img src="assets/img/icons/a-04.png" style="height: 250px; padding: 12px" alt="image" />
    </div>
  </div>
</div>
<!-- ==========  banner End ========== -->

<?php
$awards = [
  [
    'title' => 'Honorable Mention for the IEEE WIE SBAG of the Year',
    'subtitle' => 'IEEE WIE ENIS SAG',
    'year' => '2024'
  ],
  [
    'title' => 'IEEE SSCS Student Shirt Design Contest',
    'subtitle' => 'Hend Belkhiria',
    'year' => '2024'
  ],
  [
    'title' => 'R8 WIE Student Affinity Group of the Year',
    'subtitle' => 'IEEE WIE ENIS SAG',
    'year' => '2024'
  ],
  [
    'title' => 'R8 Outstanding WIE Student Volunteer',
    'subtitle' => 'Nadine Jellali',
    'year' => '2024'
  ],
  [
    'title' => 'Highest Score in the IEEE TryEngineering',
    'subtitle' => 'IEEE WIE ENIS SAG',
    'year' => '2024'
  ],
  [
    'title' => 'Darrel Chong Student Activity - Bronze',
    'subtitle' => 'WIE Annual Congress of Tunisia 2.0',
    'year' => '2024'
  ],
  [
    'title' => 'Darrel Chong Student Activity - Bronze',
    'subtitle' => 'HELLO WORLD 3.0!',
    'year' => '2024'
  ],
  [
    'title' => 'IEEE SSCS Student Branch Chapter of the Year Award',
    'subtitle' => 'IEEE SSCS ENIS SBC',
    'year' => '2024'
  ],
  [
    'title' => 'Outstanding Large IAS Chapter',
    'subtitle' => 'IEEE IAS ENIS SBC',
    'year' => '2024'
  ],
  [
    'title' => 'IEEE IAS Humanitarian Award Contest',
    'subtitle' => 'First Place',
    'year' => '2024'
  ],
  [
    'title' => 'IEEE IAS CMD Outstanding Member',
    'subtitle' => 'Amir Abid',
    'year' => '2024'
  ],
  [
    'title' => 'IEEE IAS CMD Chapter Award for Best Website',
    'subtitle' => 'First Place',
    'year' => '2024'
  ],
  [
    'title' => 'IEEE STEM Champion',
    'subtitle' => 'Bilel Djemel',
    'year' => '2024'
  ],
  [
    'title' => 'IEEE Regional Exemplary Student Branch',
    'subtitle' => 'IEEE ENIS SB',
    'year' => '2023'
  ]
];

?>

<!-- ======= awards start ======= -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
  <div class="container py-5">
    <div class="row g-5">
      <?php foreach ($awards as $award): ?>
        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
          <div class="service-item bg-light-mode rounded d-flex flex-column align-items-center justify-content-center text-center">
            <div class="service-icon">
              <i class="fas fa-award text-white"></i>
            </div>
            <h4 class="mb-2 text-dark"><?php echo $award['title']; ?></h4>
            <h5 class="mb-2 text-dark"><?php echo $award['subtitle']; ?></h5>
            <p class="m-0 text-dark"><?php echo $award['year']; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- ======= awards end ======= -->


<?php
require "views/home/components/footer.php";
?>