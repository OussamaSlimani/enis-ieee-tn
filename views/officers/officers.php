<?php
require "views/members/components/header.php";
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
                              <li class="breadcrumb-item" aria-current="page">
                                   List of officers
                              </li>
                         </ol>
                    </nav>
               </div>
          </div>
     </div>
</div>
<!-- ===================== header End ===================== -->

<!-- ===================== officers Start ===================== -->
<div class="container-fluid pt-4 px-4">
     <div class="bg-light text-center rounded p-4">
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
          <div class="d-flex align-items-center justify-content-between mb-4">
               <div class="m-3">
                    <a class="btn btn-primary d-flex align-items-center" href="index.php?url=create_officer"><i class="fs-4 ti ti-plus"></i>Add Officer</a>
               </div>
               <div class="m-3">
                    <form class="ms-4 d-flex" action="index.php?url=filter_officers" method="POST">
                         <select id="filter" name="chapter" class="form-control form-select">
                              <option value="all">All</option>
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
                         <button type="submit" class="btn btn-primary ms-2">Filter</button>
                    </form>
               </div>
          </div>
          <div class="table-responsive">
               <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                         <tr class="text-dark">
                              <th scope="col">FullName</th>
                              <th scope="col">Email</th>
                              <th scope="col">IEEE Number</th>
                              <th scope="col">Position</th>
                              <th scope="col">Chapter</th>
                              <th scope="col">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php if (!empty($officers)) : ?>
                              <?php foreach ($officers as $officer) : ?>
                                   <tr>
                                        <td><?php echo htmlspecialchars($officer['FullName']); ?></td>
                                        <td><?php echo htmlspecialchars($officer['Email']); ?></td>
                                        <td><?php echo htmlspecialchars($officer['IeeeNumber']); ?></td>
                                        <td><?php echo htmlspecialchars($officer['Position']); ?></td>
                                        <td><?php echo htmlspecialchars($officer['Chapter']); ?></td>
                                        <td class="td-actions text-right">
                                             <a href="index.php?url=delete_officer&code=<?php echo htmlspecialchars($officer['OfficerId']); ?>">
                                                  <i class="text-danger fa fa-trash me-2"></i>
                                             </a>
                                        </td>
                                   </tr>
                              <?php endforeach; ?>
                         <?php else : ?>
                              <tr>
                                   <td class="text-center" colspan="6">No officers found.</td>
                              </tr>
                         <?php endif; ?>
                    </tbody>
               </table>
          </div>
     </div>
</div>
<!-- ===================== officers End ===================== -->


<?php
require "views/members/components/footer.php";
?>