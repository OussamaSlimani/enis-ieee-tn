<?php
require "app/views/members/components/header.php";
?>

<!-- ===================== header Start ===================== -->
<div class="container-fluid pt-4 px-4">
     <div class="bg-light rounded-top p-4">
          <div class="row align-items-center">
               <div class="col-9">
                    <h4 class="fw-semibold mb-8">Officers</h4>
                    <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                              <li class="breadcrumb-item">Dashboard</li>
                              <li class="breadcrumb-item" aria-current="page">Add Officer</li>
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
          <form action="index.php?url=store_officer" method="POST">
               <div class="card-body">
                    <h4>Personal Information</h4>
                    <div class="row pt-3">
                         <div class="col-12">
                              <div class="mb-3">
                                   <label class="control-label">Member</label>
                                   <select id="members" name="IdMember" class="form-control form-select">
                                        <?php if (!empty($members)) : ?>
                                             <?php foreach ($members as $member) : ?>
                                                  <option value="<?php echo htmlspecialchars($member['MemberId']); ?>">
                                                       <?php echo htmlspecialchars($member['FullName']) . ' -- ' . htmlspecialchars($member['Department']) . ' -- ' . htmlspecialchars($member['Email']); ?>
                                                  </option>
                                             <?php endforeach; ?>
                                        <?php endif; ?>
                                   </select>
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label class="control-label">Chapter</label>
                                   <select id="chapter1" name="Chapter" class="form-control form-select">
                                        <option value="SB">SB</option>
                                        <option value="CS">CS</option>
                                        <option value="IAS">IAS</option>
                                        <option value="CIS">CIS</option>
                                        <option value="WIE">WIE</option>
                                        <option value="RAS">RAS</option>
                                        <option value="SSCS">SSCS</option>
                                        <option value="EMBS">EMBS</option>
                                        <option value="Cyber">CYBER</option>
                                        <option value="AESS">AESS</option>
                                        <option value="PES">PES</option>
                                        <option value="Sight">SIGHT</option>
                                   </select>
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label class="control-label">Position</label>
                                   <select id="position1" name="Position" class="form-control form-select">
                                        <option value="Chair">Chair</option>
                                        <option value="Vice chair">Vice chair</option>
                                        <option value="Treasurer">Treasurer</option>
                                        <option value="Secretary">Secretary</option>
                                        <option value="Project manager">Project manager</option>
                                        <option value="Webmaster">Webmaster</option>
                                        <option value="Media manager">Media Manager</option>
                                        <option value="Event manager">Event Manager</option>
                                        <option value="Logistic manager">Logistic Manager</option>
                                        <option value="Human Resources">Human Resources</option>
                                   </select>
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
require "app/views/members/components/footer.php";
?>