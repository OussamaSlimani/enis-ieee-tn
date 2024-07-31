<?php
require "app/views/members/components/header.php";
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

<!-- ===================== edit members Start ===================== -->
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
          <form action="index.php?url=update_member&code=<?php echo $member['MemberId']; ?>" method="POST">
               <div class="card-body">
                    <h4>Personal Information</h4>
                    <div class="row pt-3">
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label for="ieeenumber" class="control-label">IEEE Number</label>
                                   <input type="text" id="ieeenumber" name="ieeenumber" class="form-control" required value="<?php echo isset($member['IeeeNumber']) ? $member['IeeeNumber'] : ''; ?>" />
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label for="fullname" class="control-label">Full Name</label>
                                   <input type="text" id="fullname" name="fullname" class="form-control" required value="<?php echo isset($member['FullName']) ? $member['FullName'] : ''; ?>" />
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label for="email" class="control-label">Email</label>
                                   <input type="email" id="email" name="email" class="form-control" required value="<?php echo isset($member['Email']) ? $member['Email'] : ''; ?>" />
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label for="password" class="control-label">Password</label>
                                   <input type="text" id="password" name="password" class="form-control" required value="<?php echo isset($member['Password']) ? $member['Password'] : ''; ?>" />
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label for="department" class="control-label">Department</label>
                                   <select id="department" name="department" class="form-control form-select" required>
                                        <option value="computer engineering" <?php echo ($member['Department'] == 'computer engineering') ? 'selected' : ''; ?>>Computer Engineering</option>
                                        <option value="electrical engineering" <?php echo ($member['Department'] == 'electrical engineering') ? 'selected' : ''; ?>>Electrical Engineering</option>
                                        <option value="electromechanical engineering" <?php echo ($member['Department'] == 'electromechanical engineering') ? 'selected' : ''; ?>>Electromechanical Engineering</option>
                                        <option value="materials engineering" <?php echo ($member['Department'] == 'materials engineering') ? 'selected' : ''; ?>>Materials Engineering</option>
                                        <option value="civil engineering" <?php echo ($member['Department'] == 'civil engineering') ? 'selected' : ''; ?>>Civil Engineering</option>
                                        <option value="biological engineering" <?php echo ($member['Department'] == 'biological engineering') ? 'selected' : ''; ?>>Biological Engineering</option>
                                        <option value="geo-resources and environmental engineering" <?php echo ($member['Department'] == 'geo-resources and environmental engineering') ? 'selected' : ''; ?>>Geo-resources and Environmental Engineering</option>
                                   </select>
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label for="membershipstatus" class="control-label">Membership Status</label>
                                   <select id="membershipstatus" name="membershipstatus" class="form-control form-select" required>
                                        <option value="Active" <?php echo ($member['MembershipStatus'] == 'Active') ? 'selected' : ''; ?>>Active (Payment completed)</option>
                                        <option value="Not Active" <?php echo ($member['MembershipStatus'] == 'Not Active') ? 'selected' : ''; ?>>Not Active (Payment pending)</option>
                                   </select>
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label for="EndMembership" class="control-label">EndMembership</label>
                                   <input type="text" id="EndMembership" name="EndMembership" class="form-control" required value="<?php echo isset($member['EndMembership']) ? $member['EndMembership'] : ''; ?>" />
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
<!-- ===================== edit members End ===================== -->


<?php
require "app/views/members/components/footer.php";
?>