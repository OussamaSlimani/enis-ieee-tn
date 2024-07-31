<?php
function isActive($urlFragment)
{
     // Get the current URL and extract the part after "?url="
     $query = $_SERVER['REQUEST_URI'];

     $params = $_GET;
     $urlParameter = isset($params['url']) ? $params['url'] : '';

     // Compare the extracted URL parameter with the provided URL fragment
     return $urlParameter === $urlFragment ? 'active' : '';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8" />
     <title>IEEE ENIS Student Branch</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
     <meta content="IEEE, ieee enis, National School of Engineers in Sfax, engineering, creativity, association, communication, training, competitions" name="keywords" />
     <meta content="Founded in 2009, the IEEE branch at the National School of Engineers in Sfax fosters student development through training and competitions." name="description" />

     <!-- Favicon -->
     <link href="assets/img/favicon.png" rel="icon" />

     <!-- Google Web Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Meow+Script&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">


     <!-- Icon Font Stylesheet -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

     <!-- Libraries Stylesheet -->
     <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
     <link href="assets/lib/animate/animate.min.css" rel="stylesheet" />

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

     <!-- Spinner End -->

     <!-- ==================== WEBSITE CONTENT START ==================== -->

     <!-- ==========  Navbar Start ========== -->
     <div class="container-fluid position-relative p-0">
          <nav class="navbar navbar-expand-lg navbar-dark py-3 py-lg-0 sticky-top shadow-sm bg-light-mode">
               <a href="index" class="navbar-brand p-0 img-mode">
                    <img src="assets/img/Logo/enis-sb.png" alt="logo-white" style="height: 42px" />
               </a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
               </button>

               <!-- links -->
               <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                         <a href="index.php" class="nav-item nav-link text-dark <?php echo isActive('index') . ' ' . isActive(''); ?>">Home</a>
                         <a href="index.php?url=about" class="nav-item nav-link text-dark <?php echo isActive('about'); ?>">About</a>
                         <a href="index.php?url=subunits" class="nav-item nav-link text-dark <?php echo isActive('subunits'); ?>">Subunits</a>
                         <a href="index.php?url=activities" class="nav-item nav-link text-dark <?php echo isActive('activities'); ?>">Activities</a>
                         <a href="index.php?url=events" class="nav-item nav-link text-dark <?php echo isActive('events'); ?>">Events</a>
                         <a href="index.php?url=awards" class="nav-item nav-link text-dark <?php echo isActive('awards'); ?>">Awards</a>
                         <a href="index.php?url=contact" class="nav-item nav-link text-dark <?php echo isActive('contact'); ?>">Contact</a>
                    </div>

                    <div class="col-lg-3 text-center text-lg-end mt-2">
                         <div class="d-inline-flex align-items-center">
                              <label for="theme" class="theme">
                                   <span class="theme__toggle-wrap">
                                        <input id="darkModeToggleBtn" onclick="toggleDarkMode()" class="theme__toggle" type="checkbox" role="switch" name="theme" value="dark" />
                                        <span class="theme__icon">
                                             <span class="theme__icon-part"></span>
                                             <span class="theme__icon-part"></span>
                                             <span class="theme__icon-part"></span>
                                             <span class="theme__icon-part"></span>
                                             <span class="theme__icon-part"></span>
                                             <span class="theme__icon-part"></span>
                                             <span class="theme__icon-part"></span>
                                             <span class="theme__icon-part"></span>
                                             <span class="theme__icon-part"></span>
                                        </span>
                                   </span>
                              </label>

                              <a href="index.php?url=join" class="btn btn-primary py-2 px-4 ms-3">Join us!</a>
                         </div>
                    </div>
               </div>
          </nav>
     </div>
     <!-- ==========  Navbar End ========== -->