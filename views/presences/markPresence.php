<?php
require "views/members/components/header.php";
?>

<!-- ===================== header Start ===================== -->
<div class="container-fluid pt-4 px-4">
     <div class="bg-light rounded-top p-4">
          <div class="row align-items-center">
               <div class="col-9">
                    <h4 class="fw-semibold mb-8">Mark the presence</h4>
                    <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                              <li class="breadcrumb-item">Dashboard</li>
                              <li class="breadcrumb-item" aria-current="page">
                                   presence
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
               <div class="text-start m-3">
                    <h4> <?php echo $activity['Name']; ?></h4>
                    <p class="text-muted">
                         <strong>Date:</strong><?php echo $activity['Date']; ?><br>
                         <strong>Type:</strong> <?php echo $activity['Type']; ?><br>
                         <strong>Location:</strong><?php echo $activity['LocationType']; ?>
                    </p>
               </div>
               <div class="m-3">
                    <form class="ms-4 d-flex" action="index.php?url=search_presence" method="POST">
                         <input class="form-control border" type="text" name="search" placeholder="Search by full name..." />
                         <input type="hidden" name="ActivityId" value="<?php echo htmlspecialchars($activity['ActivityId']); ?>" />
                         <button class="btn btn-primary" type="submit">
                              <i class="fa fa-search"></i>
                         </button>
                    </form>
               </div>
          </div>
          <div class="table-responsive">
               <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                         <thead>
                              <tr class="text-dark">
                                   <th scope="col">Full Name</th>
                                   <th scope="col">Email</th>
                                   <th scope="col">IEEE Number</th>
                                   <th scope="col">Department</th>
                                   <th scope="col">Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php if (!empty($members)) : ?>
                                   <?php foreach ($members as $member) : ?>
                                        <tr>
                                             <td><?php echo htmlspecialchars($member['FullName']); ?></td>
                                             <td><?php echo htmlspecialchars($member['Email']); ?></td>
                                             <td><?php echo htmlspecialchars($member['IeeeNumber']); ?></td>
                                             <td><?php echo htmlspecialchars($member['Department']); ?></td>
                                             <td class="td-actions text-right">
                                                  <?php $memberId = $member['MemberId']; ?>
                                                  <?php if (in_array($memberId, $presences)) : ?>
                                                       <a class="text-primary" href="index.php?url=remove_present&code=<?php echo htmlspecialchars($activity['ActivityId']) . '-' . htmlspecialchars($memberId); ?>">
                                                            <i class="fa fa-times"></i> Remove Presence
                                                       </a>
                                                  <?php else : ?>
                                                       <a class="text-primary" href="index.php?url=mark_as_present&code=<?php echo htmlspecialchars($activity['ActivityId']) . '-' . htmlspecialchars($memberId); ?>">
                                                            <i class="fa fa-check"></i> Mark Present
                                                       </a>
                                                  <?php endif; ?>
                                             </td>
                                        </tr>
                                   <?php endforeach; ?>
                              <?php else : ?>
                                   <tr>
                                        <td class="text-center" colspan="5">No members found.</td>
                                   </tr>
                              <?php endif; ?>
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</div>
<!-- ===================== officers End ===================== -->


<?php
require "views/members/components/footer.php";
?>