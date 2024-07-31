setTimeout(function () {
  var mousePos = {},
    shipPos = { x: window.innerWidth * 0.5, y: window.innerHeight * 0.5 },
    vector = {},
    angle,
    b_speed = 10,
    ast_speed = 1,
    kills = 0,
    impacts = 0,
    planet_life = 100,
    ast_attack_damage = 10;

  function screenShake() {
    document.body.classList.add("screen_shake");
    document.body.onanimationend = function () {
      this.classList.remove("screen_shake");
    };
  }

  function rotateShip(e) {
    mousePos = { x: e.clientX, y: e.clientY };
    vector = { x: mousePos.x - shipPos.x, y: mousePos.y - shipPos.y };
    angle = Math.atan2(vector.y, vector.x) * (180 / Math.PI) + 90;
    ship.style.transform = "rotate(" + angle + "deg)";
    ship.style.setProperty("--anti-spin", "rotate(" + -angle + "deg)");
  }

  function fireBullet(e) {
    var b_point = bullet_point.getBoundingClientRect();
    var b = document.createElement("div");
    b.className = "bullet";
    b.dataset.angle = angle;
    b.dataset.bx = b_point.x;
    b.dataset.by = b_point.y;
    b.style.left = b_point.x + "px";
    b.style.top = b_point.y + "px";
    b.style.setProperty("--bullet-rot", "rotate(" + angle + "deg)");
    document.body.prepend(b);
  }

  function randomCorner() {
    return Math.random() * 50 + "%";
  }

  function addAsteroid() {
    var a = document.createElement("div");
    a.className = "asteroid";

    // Randomly determine which side the asteroid will appear from
    var side = Math.floor(Math.random() * 4);
    switch (side) {
      case 0: // From the top
        a.style.left = Math.floor(Math.random() * window.innerWidth) + "px";
        a.style.top = "-100px";
        break;
      case 1: // From the bottom
        a.style.left = Math.floor(Math.random() * window.innerWidth) + "px";
        a.style.top = window.innerHeight + "px";
        break;
      case 2: // From the left
        a.style.left = "-100px";
        a.style.top = Math.floor(Math.random() * window.innerHeight) + "px";
        break;
      case 3: // From the right
        a.style.left = window.innerWidth + "px";
        a.style.top = Math.floor(Math.random() * window.innerHeight) + "px";
        break;
    }

    // Randomize the border-radius for the asteroid shape
    a.style.borderRadius =
      randomCorner() +
      " " +
      randomCorner() +
      " " +
      randomCorner() +
      " " +
      randomCorner();

    document.body.appendChild(a);
  }

  function clearAllObjects() {
    document
      .querySelectorAll(".asteroid, .bullet")
      .forEach((elm) => elm.remove());
  }

  function updateGame() {
    if (Math.random() < 0.02) {
      addAsteroid();
    }

    if (document.querySelector(".bullet")) {
      var bullets = document.querySelectorAll(".bullet");
      bullets.forEach(function (elm) {
        var bx = Number(elm.dataset.bx),
          by = Number(elm.dataset.by),
          b_loc = elm.getBoundingClientRect(),
          point = document.elementFromPoint(b_loc.x + 8, b_loc.y + 8);

        bx += b_speed * Math.sin((Math.PI / 180) * Number(elm.dataset.angle));
        by -= b_speed * Math.cos((Math.PI / 180) * Number(elm.dataset.angle));

        elm.dataset.bx = bx;
        elm.dataset.by = by;
        elm.style.left = elm.dataset.bx + "px";
        elm.style.top = elm.dataset.by + "px";

        if (!point) {
          elm.remove();
        }
        if (point && point.classList.contains("asteroid")) {
          kills++;
          point.classList.add("explode");
          setTimeout(function () {
            point.remove();
          }, 250);
        }
      });
    }

    if (document.querySelector(".asteroid")) {
      var ass = document.querySelectorAll(".asteroid");
      ass.forEach(function (elm) {
        var elm_loc = elm.getBoundingClientRect(),
          new_x = 0,
          new_y = 0;

        if (elm_loc.x < shipPos.x - 25) {
          new_x = ast_speed;
        } else {
          new_x = -ast_speed;
        }
        if (elm_loc.y < shipPos.y - 25) {
          new_y = ast_speed;
        } else {
          new_y = -ast_speed;
        }

        elm.style.left = parseInt(elm.style.left) + new_x + "px";
        elm.style.top = parseInt(elm.style.top) + new_y + "px";

        var elm_point = document.elementFromPoint(
          elm_loc.x + 25,
          elm_loc.y + 25
        );
        if (elm_point && elm_point.classList.contains("earth")) {
          elm.classList.add("explode");
          elm.onanimationend = function () {
            impacts++;
            planet_life -= ast_attack_damage;
            updateLifeProgress(planet_life);
            elm.remove();
          };
          screenShake();
        }
      });
    }

    if (planet_life < 100) {
      planet_life += 0.1;
      updateLifeProgress(planet_life);
    }
    ship.style.filter = "saturate(" + planet_life + "%)";
    document.getElementById("kills_counter").innerHTML = kills;

    if (planet_life <= 0) {
      clearInterval(gameInterval);
      $("#gameOverModal").modal("show");
      document.getElementById("final-score").innerText = `Score: ${kills}`;
    }
  }

  var gameInterval = setInterval(updateGame, 1000 / 60);

  window.addEventListener("mousemove", rotateShip);
  window.addEventListener("click", fireBullet);

  window.addEventListener("resize", function () {
    shipPos = { x: window.innerWidth * 0.5, y: window.innerHeight * 0.5 };
  });

  document
    .getElementById("restart-button")
    .addEventListener("click", function () {
      $("#gameOverModal").modal("hide");
      clearAllObjects();
      kills = 0;
      planet_life = 100;
      updateLifeProgress(planet_life);
      gameInterval = setInterval(updateGame, 1000 / 60);
    });
}, 2000);

function stars() {
  var s = document.createElement("div");
  s.className = "star";
  s.style.pointerEvents = "none";
  s.style.left = Math.random() * window.innerWidth + "px";
  s.style.top = Math.random() * window.innerHeight + "px";
  document.body.appendChild(s);
}
for (var i = 0; i < 50; i++) {
  stars();
}

// Update life progress (assuming life value is between 0 and 100)
function updateLifeProgress(lifeValue) {
  const progressBar = document.getElementById("life_progress");
  progressBar.style.width = `${lifeValue}%`;
  progressBar.setAttribute("aria-valuenow", lifeValue);
}
