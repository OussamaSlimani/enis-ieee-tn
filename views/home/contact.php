<?php
require "views/home/components/header.php";
?>

<!-- ==========  banner End ========== -->
<div class="container-fluid bg-dark mb-5 border-bottom" style="padding-top: 80px">
  <div class="d-flex justify-content-between align-items-center pt-5 px-2 wow bounceInDown">
    <div class="border-start-4 px-4 py-4 m-4 d-flex flex-column justify-content-center">
      <h1 class="display-5 m-2 text-white">CONTACT US</h1>
      <h4 class="text-white m-2 pt-2">
        Connect with us through different channels!
      </h4>
    </div>
    <div class="headerIcon">
      <img src="assets/img/icons/a-07.png" style="height: 250px; padding: 12px" alt="image" />
    </div>
  </div>
</div>
<!-- ==========  banner End ========== -->

<div class="change-mode-animation-container d-none animated fadeIn">
  <div class="change-mode-animation"></div>
</div>

<!-- ======= Contact Start ======= -->
<div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
  <div class="container py-4">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px">
      <h5 class="fw-bold text-primary text-uppercase">Contact Us</h5>
      <h2 class="mb-0 text-dark">
        If You Have Any Query, Feel Free To Contact Us
      </h2>
    </div>
    <div class="row g-5 mb-5 pb-2">
      <div class="col-lg-4">
        <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
          <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px">
            <i class="fa fa-phone-alt text-white"></i>
          </div>
          <div class="ps-4">
            <h5 class="mb-2 text-dark">Call to ask any question</h5>
            <h4 class="text-dark mb-0">+216 28 675 568</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
          <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px">
            <i class="fa fa-envelope-open text-white"></i>
          </div>
          <div class="ps-4">
            <h5 class="mb-2 text-dark">Email to get free quote</h5>
            <h4 class="text-dark mb-0">sb.enis@ieee.org</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
          <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px">
            <i class="fa fa-map-marker-alt text-white"></i>
          </div>
          <div class="ps-4">
            <h5 class="mb-2 text-dark">Visit us</h5>
            <h4 class="text-dark mb-0">ENIS, Sfax, Tunisia</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="row g-5">
      <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
        <form>
          <div class="row g-3">
            <div class="col-md-6">
              <input type="text" class="form-control border-0 bg-light px-4" placeholder="Your Name" style="height: 55px" />
            </div>
            <div class="col-md-6">
              <input type="email" class="form-control border-0 bg-light px-4" placeholder="Your Email" style="height: 55px" />
            </div>
            <div class="col-12">
              <input type="text" class="form-control border-0 bg-light px-4" placeholder="Subject" style="height: 55px" />
            </div>
            <div class="col-12">
              <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message"></textarea>
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100 py-3" type="submit">
                Send Message
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
        <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279.1859442139585!2d10.717743795979837!3d34.72570711270346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13002ca4425ed6a1%3A0x1cb1842d2707fe25!2sNational%20Engineering%20School%20of%20Sfax!5e0!3m2!1sen!2sus!4v1690050981300!5m2!1sen!2sus" frameborder="0" style="min-height: 350px; border: 0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
  </div>
</div>
<!-- ==========   Contact End ========== -->

<!-- ========== FAQ start ========== -->
<div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
  <div class="container py-4">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px">
      <h5 class="fw-bold text-primary text-uppercase">FAQS</h5>
      <h2 class="mb-0 text-dark">
        Frequently asked questions
      </h2>
    </div>
    <div class="col-lg-12">
      <div class="accordion accordion-custom" id="accordionExample">
        <div class="accordion-item wow fadeInUp" data-wow-delay="0.1s">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button fw-semi-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              What is IEEE?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              IEEE is the world’s largest technical professional
              organization dedicated to advancing technology for the
              benefit of humanity. IEEE and its members inspire a global
              community through its highly cited publications,
              conferences, technology standards, and professional and
              educational activities.
            </div>
          </div>
        </div>
        <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed fw-semi-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Can all students from different fields join IEEE ENIS
              Student Branch?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Yes, the IEEE ENIS Student Branch contains diverse chapters
              that cover all the present fields at ENIS.
            </div>
          </div>
        </div>
        <div class="accordion-item wow fadeInUp" data-wow-delay="0.3s">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed fw-semi-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              What to do in order to become an IEEE ENIS Student Branch
              member?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              All you have to do is pay the subscription fee. Contact our
              treasurer to finalize the payment procedure.
            </div>
          </div>
        </div>
        <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
          <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed fw-semi-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
              What is ENIS?
            </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Founded in 1983, the National School of Engineers of Sfax
              (ENIS) is one of the major institutions for education,
              research, and technological transfer. It provides training
              for engineers in seven disciplines, namely electrical
              engineering, electromechanical engineering, computer
              engineering, materials engineering, civil engineering,
              biological engineering, and geo-resources and environmental
              engineering.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ========== FAQ start ========== -->

<?php
require "views/home/components/footer.php";
?>