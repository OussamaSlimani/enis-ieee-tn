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
     <title>IEEE ENIS Admin</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />

     <!-- Favicon -->
     <link href="app/views/assets/img/favicon.png" rel="icon" />

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
     <link href="assets/css/style-admin.css" rel="stylesheet" />
</head>

<body>
     <div class="container-fluid position-relative bg-white d-flex p-0">
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


          <!-- =====================  Sidebar Start  ===================== -->
          <div class="sidebar pe-4 pb-3">
               <nav class="navbar bg-light navbar-light">
                    <p class="navbar-brand mx-4 my-2">
                         <img src="app/views/assets/img/Logo/enis-sb.png" alt="logo-white" style="height: 42px" />
                    </p>
                    <div class="navbar-nav w-100 mt-4">
                         <a href="index.php?url=members" class="nav-item nav-link <?php echo isActive('members'); ?>"><i class="fa fa-tachometer-alt me-2"></i>Active Account</a>
                         <a href="index.php?url=new_members" class="nav-item nav-link <?php echo isActive('new_members'); ?>"><i class="fa fa-tachometer-alt me-2"></i>New Members</a>
                         <a href="index.php?url=renew_members" class="nav-item nav-link <?php echo isActive('renew_members'); ?>"><i class="fa fa-tachometer-alt me-2"></i>Renew</a>
                         <a href="index.php?url=officers" class="nav-item nav-link <?php echo isActive('officers'); ?>"><i class="fa fa-th me-2"></i>Officers</a>
                         <a href="index.php?url=presences" class="nav-item nav-link <?php echo isActive('presences'); ?>"><i class="fa fa-keyboard me-2"></i>Presence</a>
                         <a href="index.php?url=score" class="nav-item nav-link <?php echo isActive('score'); ?>"><i class="fa fa-table me-2"></i>Score</a>
                    </div>
               </nav>
          </div>
          <!-- ===================== Sidebar End ===================== -->

          <div class="content">
               <!-- ===================== Navbar Start ===================== -->
               <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0 d-flex justify-content-between">
                    <a href="#" class="sidebar-toggler flex-shrink-0">
                         <i class="fa fa-bars"></i>
                    </a>
                    <div class="navbar-nav d-lg-none">
                         <img src="app/views/assets/img/Logo/enis-sb.png" alt="logo-white" style="height: 42px" />
                    </div>
                    <div class="navbar-nav">
                         <a href="#" class="nav-link">
                              <i class="fas fa-sign-out-alt me-lg-2"></i>
                         </a>
                    </div>
               </nav>
               <!-- ===================== Navbar End ===================== -->