(function ($) {
  "use strict";

  // Initiate the wowjs
  new WOW().init();

  // Chapters carousel
  $(".chapters-carousel").owlCarousel({
    autoplay: true,
    autoplayTimeout: 5000,
    smartSpeed: 1000,
    dots: true,
    loop: true,
    center: true,
    responsive: {
      0: {
        items: 2,
      },
      576: {
        items: 2,
      },
      768: {
        items: 3,
      },
      992: {
        items: 5,
      },
    },
  });

  // teams carousel
  $(".teams-carousel").owlCarousel({
    autoplay: true,
    autoplayTimeout: 5000,
    smartSpeed: 1000,
    dots: true,
    loop: true,
    center: true,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 1,
      },
      768: {
        items: 3,
      },
      992: {
        items: 5,
      },
    },
  });

  // event carousel
  $(".event-carousel").owlCarousel({
    autoplay: true,
    autoplayTimeout: 5000,
    smartSpeed: 1000,
    dots: true,
    loop: true,
    center: true,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 1,
      },
      768: {
        items: 1,
      },
      992: {
        items: 1,
      },
    },
  });

  // Testimonials carousel
  $(".testimonial-carousel").owlCarousel({
    autoplay: true,
    autoplayTimeout: 5000,
    smartSpeed: 1000,
    dots: true,
    loop: true,
    center: true,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 3,
      },
    },
  });

  // Gallery carousel
  $(".gallery-carousel").owlCarousel({
    autoplay: true,
    autoplayTimeout: 1500,
    smartSpeed: 500,
    dots: true,
    loop: true,
    center: true,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 3,
      },
    },
  });

  // event carousel
  $(".event-carousel").owlCarousel({
    autoplay: true,
    autoplayTimeout: 1500,
    smartSpeed: 500,
    dots: true,
    loop: true,
    center: true,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 1,
      },
      768: {
        items: 1,
      },
      992: {
        items: 1,
      },
    },
  });

  /* **************** Facts counter ***************** */
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 2000,
  });

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 250) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 20, "easeInOutExpo");
    return false;
  });
})(jQuery);

/* ================= Toggle dark/night mode ============== */
function toggleDarkMode() {
  const body = document.body;
  const isDarkMode = body.classList.toggle("dark-mode");
  updateTextColors(isDarkMode);
  updateIconColors(isDarkMode);
  updateBgColors(isDarkMode);
  updateImgColors(isDarkMode);
  updateCheckbox(isDarkMode);
  localStorage.setItem("darkMode", isDarkMode);
}

function updateTextColors(isDarkMode) {
  document.querySelectorAll(".text-dark, .text-light").forEach((element) => {
    element.classList.toggle("text-dark", !isDarkMode);
    element.classList.toggle("text-light", isDarkMode);
  });
}

function updateBgColors(isDarkMode) {
  document
    .querySelectorAll(".bg-light-mode, .bg-dark-mode")
    .forEach((element) => {
      element.classList.toggle("bg-light-mode", !isDarkMode);
      element.classList.toggle("bg-dark-mode", isDarkMode);
    });
}

function updateImgColors(isDarkMode) {
  document.querySelectorAll(".img-mode img").forEach((img) => {
    const currentFileName = img.src.split("/").pop();
    img.src = `assets/img/Logo/${isDarkMode ? "light/" : ""}${currentFileName}`;
  });
}

function updateIconColors(isDarkMode) {
  document
    .querySelectorAll(".btn-outline-primary, .btn-outline-white")
    .forEach((element) => {
      element.classList.toggle("btn-outline-primary", !isDarkMode);
      element.classList.toggle("btn-outline-white", isDarkMode);
    });
}
function updateCheckbox(isDarkMode) {
  document.getElementById("darkModeToggleBtn").checked = isDarkMode;
}

document.addEventListener("DOMContentLoaded", () => {
  const savedDarkMode = localStorage.getItem("darkMode") === "true";
  if (savedDarkMode) {
    document.body.classList.add("dark-mode");
    updateTextColors(true);
    updateIconColors(true);
    updateBgColors(true);
    updateImgColors(true);
    updateCheckbox(true);
  }
});

/* ========= Spinner ========= */
document.addEventListener("DOMContentLoaded", function () {
  var spinner = document.getElementById("spinner");
  spinner.classList.remove("show");
});

/* ========= Notification ========= */
document.addEventListener("DOMContentLoaded", function () {
  var notification = document.getElementById("notification");
  if (notification) {
    setTimeout(function () {
      notification.style.display = "none";
    }, 30000);
  }
});
/* ========= Countdown ========= */
var countDownDate = new Date("Sept 21, 2024 08:00:00").getTime();
var countdownfunction = setInterval(function () {
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("days").innerHTML = days;
  document.getElementById("hours").innerHTML = hours;
  document.getElementById("minutes").innerHTML = minutes;
  document.getElementById("seconds").innerHTML = seconds;
  if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("counter").innerHTML = "EXPIRED";
  }
}, 1000);
