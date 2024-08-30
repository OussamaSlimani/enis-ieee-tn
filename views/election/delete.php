<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8" />
     <title>Delete Your Candidacy</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />

     <!-- Favicon -->
     <link href="assets/img/favicon.png" rel="icon" />

     <!-- Customized Bootstrap Stylesheet -->
     <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

     <!-- Template Stylesheet -->
     <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
     <!-- Spinner Start -->
     <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
          <div class="spinner">
               <svg xmlns="http://www.w3.org/2000/svg" width="350" height="126" viewBox="0 0 75 27">
                    <g fill-rule="evenodd">
                         <polygon points="20.4 4.1 21.8 8.5 26.6 8.5 22.8 11.4 24.3 15.8 20.4 13.1 16.6 15.8 18 11.4 14.3 8.5 18.9 8.5" />
                         <polygon points="37.9 0 39.3 4.5 44 4.5 40.2 7.3 41.6 11.8 37.9 9 34 11.8 35.4 7.3 31.7 4.5 36.3 4.5" />
                         <polygon points="54.9 4.1 56.3 8.5 61 8.5 57.2 11.4 58.6 15.8 54.9 13.1 51 15.8 52.4 11.4 48.6 8.5 53.4 8.5" />
                    </g>
               </svg>
          </div>
     </div>


     <!-- ==========  Login Start ========== -->
     <div class="container-fluid">
          <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
               <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="my-4 mx-3">
                         <?php if (!empty($notification)) : ?>
                              <div class="alert alert-danger" role="alert" id="notification">
                                   <?php echo $notification; ?>
                              </div>
                         <?php endif; ?>
                    </div>
                    <form action="index.php?url=login" method="POST">
                         <div class="bg-light border rounded p-4 p-sm-5 my-4 mx-3">
                              <div class="mb-3 text-center">
                                   <h3 class="text-dark">Delete Your Candidacy</h3>
                              </div>
                              <div class="form-floating mb-3">
                                   <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                   <label for="floatingInput">Email address</label>
                              </div>
                              <div class="form-floating mb-4">
                                   <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                   <label for="floatingPassword">Password</label>
                              </div>
                              <div class="d-flex align-items-center justify-content-between mb-4">
                              </div>
                              <button type="submit" class="btn btn-danger py-2 w-100 mb-4">Delete</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
     <!-- ==========  Login End ========== -->

     <!-- JavaScript Libraries -->
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
     <script src="assets/lib/wow/wow.min.js"></script>
     <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
     <script src="assets/lib/easing/easing.min.js"></script>
     <script src="assets/lib/waypoints/waypoints.min.js"></script>
     <script src="assets/lib/counterup/counterup.min.js"></script>

     <!-- Template Javascript -->
     <script src="assets/js/main.js"></script>
</body>

</html>