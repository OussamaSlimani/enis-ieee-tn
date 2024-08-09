<?php
require "views/members/components/header.php";
?>


<!-- ===================== header Start ===================== -->
<div class="container-fluid pt-4 px-4">
     <div class="bg-light rounded-top p-4">
          <div class="row align-items-center">
               <div class="col-9">
                    <h4 class="fw-semibold mb-8">Active Members</h4>
                    <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                              <li class="breadcrumb-item">Dashboard</li>
                              <li class="breadcrumb-item" aria-current="page">Add member</li>
                         </ol>
                    </nav>
               </div>
          </div>
     </div>
</div>
<!-- ===================== header End ===================== -->

<!-- ===================== add members Start ===================== -->
<div class="container-fluid pt-4 px-4">
     <div class="bg-light rounded p-4">
          <!-- notification -->
          <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
               <?php if (!empty($notification)) : ?>
                    <?php if ($notification['success'] == true) : ?>
                         <div class="alert alert-success" role="alert" id="notification">
                              <?php echo $notification['message']; ?>
                         </div>
                    <?php else : ?>
                         <div class="alert alert-danger" role="alert" id="notification">
                              <?php echo $notification['message']; ?>
                         </div>
                    <?php endif; ?>
               <?php endif; ?>
          </div>
          <!-- notification -->
          <form action="index.php?url=store_member" method="POST">
               <div class="card-body">
                    <h4>Personal Information</h4>
                    <div class="row pt-3">
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label for="ieeenumber" class="control-label">IEEE Number</label>
                                   <input type="text" id="ieeenumber" name="ieeenumber" class="form-control" required />
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label for="fullname" class="control-label">Full Name</label>
                                   <input type="text" id="fullname" name="fullname" class="form-control" required />
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label for="email" class="control-label">Email</label>
                                   <input type="email" id="email" name="email" class="form-control" required />
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label for="password" class="control-label">Password</label>
                                   <input type="password" id="password" name="password" class="form-control" required />
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label for="department" class="control-label">Department</label>
                                   <select id="department" name="department" class="form-control form-select" required>
                                        <option value="computer engineering">Computer Engineering</option>
                                        <option value="electrical engineering">Electrical Engineering</option>
                                        <option value="electromechanical engineering">Electromechanical Engineering</option>
                                        <option value="materials engineering">Materials Engineering</option>
                                        <option value="civil engineering">Civil Engineering</option>
                                        <option value="biological engineering">Biological Engineering</option>
                                        <option value="geo-resources and environmental engineering">Geo-resources and Environmental Engineering</option>
                                   </select>
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label for="membershipstatus" class="control-label">Membership Status</label>
                                   <select id="membershipstatus" name="membershipstatus" class="form-control form-select" required>
                                        <option value="Not Active">Not Active (Payment pending)</option>
                                        <option value="Active">Active (Payment completed)</option>
                                   </select>
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3" id="date-container">
                                   <label for="endmembership" class="control-label">Payment date</label>
                                   <input type="date" id="joining_time" name="joining_time" class="form-control" min="2000-01-01" max="2070-12-31">
                              </div>
                         </div>
                    </div>
                    <div class="row">
                         <div class="col-12">
                              <div class="mb-3">
                                   <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                         </div>
                    </div>
               </div>
          </form>
     </div>
</div>
<!-- ===================== add members End ===================== -->

<?php
require "views/members/components/footer.php";
?>