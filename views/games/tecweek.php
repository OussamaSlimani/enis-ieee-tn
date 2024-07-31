<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Groot Game</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/tecweek/style.css" />
</head>

<body class="bg-dark text-white d-flex justify-content-center align-items-center vh-100">
  <div id="ship" class="earth position-absolute">
    <div id="bullet_point"></div>
  </div>
  <div id="stats" class="position-fixed p-3">
    <div class="d-flex align-items-center">
      <span class="text-warning">&#9733;</span>
      <span id="kills_counter" class="mb-2">0</span>
    </div>
    <div class="d-flex align-items-center">
      <span class="me-2 text-danger">&#10084;</span>
      <!-- Heart icon -->
      <div class="progress" style="width: 150px">
        <div id="life_progress" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>

  <!-- Game Over Modal -->
  <div class="modal fade" id="gameOverModal" tabindex="-1" aria-labelledby="gameOverModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header">
          <h5 class="modal-title" id="gameOverModalLabel">Game Over</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="final-score"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="restart-button">
            Restart
          </button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="assets/tecweek/main.js"></script>
</body>

</html>