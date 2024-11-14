<?php
require "views/members/components/header.php";
?>

<!-- chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/lib/waypoints/waypoints.min.js"></script>

<!-- Template Javascript -->
<script src="assets/js/main-admin.js"></script>


<!-- ================ department Bar Chart start ==================== -->
<div class="container-fluid pt-4 px-4">
     <div class="bg-light rounded p-4">
          <div>
               <h4>Distribution by department</h4>
               <canvas id="department"></canvas>
          </div>
          <script>
               const ctx = document.getElementById('department');
               new Chart(ctx, {
                    type: 'bar',
                    data: {
                         labels: ['Computer', 'Electromechanical', 'Biological', 'Electrical', 'Geo-resources', 'Civil', 'Materials'],
                         datasets: [{
                              label: 'Number of Students',
                              data: [
                                   <?php echo $computer ?>,
                                   <?php echo $electromechanical ?>,
                                   <?php echo $biological ?>,
                                   <?php echo $electrical ?>,
                                   <?php echo $geo ?>,
                                   <?php echo $civil ?>,
                                   <?php echo $materials ?>,
                              ],
                              backgroundColor: [
                                   'rgba(75, 192, 192, 0.8)',
                                   'rgba(255, 159, 64, 0.8)',
                                   'rgba(255, 205, 86, 0.8)',
                                   'rgba(201, 203, 207, 0.8)',
                                   'rgba(54, 162, 235, 0.8)',
                                   'rgba(153, 102, 255, 0.8)',
                                   'rgba(255, 99, 132, 0.8)'
                              ],
                              borderColor: [
                                   'rgba(75, 192, 192, 1)',
                                   'rgba(255, 159, 64, 1)',
                                   'rgba(255, 205, 86, 1)',
                                   'rgba(201, 203, 207, 1)',
                                   'rgba(54, 162, 235, 1)',
                                   'rgba(153, 102, 255, 1)',
                                   'rgba(255, 99, 132, 1)'
                              ],
                              borderWidth: 1,
                         }]
                    },
                    options: {
                         responsive: true,
                         plugins: {
                              legend: {
                                   display: true,
                                   position: 'top',
                                   labels: {
                                        font: {
                                             size: 14
                                        },
                                        color: '#333'
                                   }
                              },
                              tooltip: {
                                   enabled: true,
                                   backgroundColor: 'rgba(0, 0, 0, 0.7)',
                                   titleFont: {
                                        size: 16,
                                        weight: 'bold'
                                   },
                                   bodyFont: {
                                        size: 14
                                   },
                                   padding: 10,
                                   boxPadding: 6
                              }
                         },
                         scales: {
                              x: {
                                   ticks: {
                                        color: '#333',
                                        font: {
                                             size: 13
                                        }
                                   },
                                   grid: {
                                        display: false
                                   }
                              },
                              y: {
                                   beginAtZero: true,
                                   ticks: {
                                        color: '#333',
                                        font: {
                                             size: 13
                                        }
                                   },
                                   grid: {
                                        color: 'rgba(200, 200, 200, 0.2)'
                                   }
                              }
                         },

                    }
               });
          </script>
     </div>
</div>

<!-- ================ department Pie Chart start ==================== -->
<div class="container-fluid pt-4 pb-4 px-4">
     <div class="bg-light rounded p-4">
          <div class="d-flex align-items-start justify-content-between flex-wrap">
               <div class="payment-section w-50 mb-4">
                    <h4 class="text-center">Payment</h4>
                    <canvas id="PaymentPie"></canvas>
               </div>
               <div class="payment-section w-50 mb-4">
                    <h4 class="text-center">Department Payment</h4>
                    <canvas id="departmentPaymentPie"></canvas>
               </div>
          </div>
          <script>
               const ctxPie = document.getElementById('PaymentPie');
               new Chart(ctxPie, {
                    type: 'pie',
                    data: {
                         labels: ['Pay', 'Not yet'],
                         datasets: [{
                              label: '',
                              data: [
                                   <?php echo $pays ?>,
                                   <?php echo $newMembers - $pays  ?>,
                              ],
                              backgroundColor: [
                                   'rgba(75, 192, 192, 0.6)',
                                   'rgba(255, 99, 132, 0.6)',
                              ],
                              borderWidth: 1
                         }]
                    },
                    options: {
                         responsive: true,
                         plugins: {
                              legend: {
                                   position: 'top',
                              },
                              tooltip: {
                                   enabled: true
                              }
                         }
                    }
               });
          </script>
          <script>
               const ctxPie2 = document.getElementById('departmentPaymentPie');
               new Chart(ctxPie2, {
                    type: 'pie',
                    data: {
                         labels: ['Computer', 'Electromechanical', 'Biological', 'Electrical', 'Geo-resources', 'Civil', 'Materials'],
                         datasets: [{
                              label: '',
                              data: [
                                   <?php echo $computerPay ?>,
                                   <?php echo $electromechanicalPay ?>,
                                   <?php echo $biologicalPay ?>,
                                   <?php echo $electricalPay ?>,
                                   <?php echo $geoPay ?>,
                                   <?php echo $civilPay ?>,
                                   <?php echo $materialsPay ?>,
                              ],
                              backgroundColor: [
                                   'rgba(75, 192, 192, 0.6)',
                                   'rgba(255, 159, 64, 0.6)',
                                   'rgba(255, 205, 86, 0.6)',
                                   'rgba(201, 203, 207, 0.6)',
                                   'rgba(54, 162, 235, 0.6)',
                                   'rgba(153, 102, 255, 0.6)',
                                   'rgba(255, 99, 132, 0.6)',
                              ],
                              borderWidth: 1
                         }]
                    },
                    options: {
                         responsive: true,
                         plugins: {
                              legend: {
                                   position: 'top',
                              },
                              tooltip: {
                                   enabled: true
                              }
                         }
                    }
               });
          </script>
     </div>
</div>