(function ($) {
  "use strict";

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });

  // Sidebar Toggler
  $(".sidebar-toggler").click(function () {
    $(".sidebar, .content").toggleClass("open");
    return false;
  });

  // Progress Bar
  $(".pg-bar").waypoint(
    function () {
      $(".progress .progress-bar").each(function () {
        $(this).css("width", $(this).attr("aria-valuenow") + "%");
      });
    },
    { offset: "80%" }
  );
})(jQuery);

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
    }, 8000);
  }
});

/* **** */
document.addEventListener("DOMContentLoaded", function () {
  const membershipStatus = document.getElementById("membershipstatus");
  const dateContainer = document.getElementById("date-container");

  function toggleDateField() {
    if (membershipStatus.value === "Active") {
      dateContainer.classList.remove("hidden");
    } else {
      dateContainer.classList.add("hidden");
    }
  }

  membershipStatus.addEventListener("change", toggleDateField);

  // Initialize the visibility on page load
  toggleDateField();
});
