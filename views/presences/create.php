<?php
require "app/views/members/components/header.php";
?>

<!-- ===================== header Start ===================== -->
<div class="container-fluid pt-4 px-4">
     <div class="bg-light rounded-top p-4">
          <div class="row align-items-center">
               <div class="col-9">
                    <h4 class="fw-semibold mb-8">Presence</h4>
                    <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                              <li class="breadcrumb-item">Dashboard</li>
                              <li class="breadcrumb-item" aria-current="page">
                                   add Activity
                              </li>
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
          <form action="index.php?url=store_activity" method="POST">
               <div class="card-body">
                    <h4>Activity information</h4>
                    <div class="row pt-3">
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label class="control-label">Name</label>
                                   <input type="text" id="name" name="name" class="form-control" />
                              </div>
                         </div>
                         <!--/span-->
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label class="control-label">Date</label>
                                   <input class="form-control" type="date" id="date" name="date" />
                              </div>
                         </div>
                         <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                         <div class="col-md-6">
                              <div class="mb-3">
                                   <label class="control-label">Type</label>
                                   <select id="type" name="type" class="form-control form-select">
                                        <option value="workshop">Workshop</option>
                                        <option value="event">Event</option>
                                        <option value="syp">ENIS SYP</option>
                                        <option value="ag">Meeting AG</option>
                                        <option value="building">Team Building</option>
                                        <option value="ambassador">Ambassador</option>
                                        <option value="organization">Organization</option>
                                        <option value="networking">Networking</option>
                                   </select>
                              </div>
                         </div>
                         <!--/span-->
                         <div class="col-md-6 mb-3">
                              <div class="mb-3">
                                   <label class="control-label">Location type</label>
                                   <select id="location_type" name="location_type" class="form-control form-select">
                                        <option value="physical">Physical</option>
                                        <option value="online">Online</option>
                                   </select>
                              </div>
                         </div>
                         <!--/span-->
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