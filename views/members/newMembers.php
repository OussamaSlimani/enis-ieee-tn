<?php
require "views/members/components/header.php";

$pays = array_filter($members, function ($member) {
     return $member['pays'] == "yes";
});

?>

<!-- ===================== header Start ===================== -->
<div class="container-fluid pt-4 px-4">
     <div class="bg-light rounded-top p-4">
          <div class="row align-items-center">
               <div class="col-9">
                    <h4 class="fw-semibold mb-8">New Members</h4>
                    <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                              <li class="breadcrumb-item">Total : <?php echo count($members); ?></li>
                              <li class="breadcrumb-item" aria-current="page">
                                   Who pays : <?php echo count($pays); ?>
                              </li>
                              <li class="breadcrumb-item" aria-current="page">
                                   <a href="index.php?url=statistics">Statistics</a>
                              </li>
                         </ol>
                    </nav>
               </div>
          </div>
     </div>
</div>
<!-- ===================== header End ===================== -->


<!-- ===================== members Start ===================== -->
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
          <div class="d-flex align-items-center justify-content-end mb-4">
               <div class="m-3">
                    <form class="ms-4 d-flex" action="index.php?url=search_new_member" method="POST">
                         <input class="form-control border" type="text" name="search" placeholder="Search by full name..." />
                         <button class="btn btn-primary" type="submit">
                              <i class="fa fa-search"></i>
                         </button>
                    </form>
               </div>
          </div>
          <div class="table-responsive">
               <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                         <tr class="text-dark">
                              <th scope="col">FullName</th>
                              <th scope="col">Department</th>
                              <th scope="col">Email</th>
                              <th scope="col">Password</th>
                              <th scope="col">Pays</th>
                              <th scope="col">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php if (!empty($members)) : ?>
                              <?php foreach ($members as $member) : ?>
                                   <tr <?php if ($member['pays'] === "yes") echo 'style="background-color: #c2dfb4;"'; ?>>
                                        <td><?php echo htmlspecialchars($member['FullName']); ?></td>
                                        <td><?php echo htmlspecialchars($member['Department']); ?></td>
                                        <td><?php echo htmlspecialchars($member['Email']); ?></td>
                                        <td><?php echo htmlspecialchars($member['Password']); ?></td>
                                        <td>
                                             <?php if ($member['pays'] === "yes"): ?>
                                                  <a href="index.php?url=pays&code=<?php echo htmlspecialchars($member['MemberId']); ?>">
                                                       <i class="fa fa-money-bill me-2" style="font-size: 18px; color: green; padding-right: 4px;" title="Payment Confirmed"></i>
                                                  </a>
                                             <?php else: ?>
                                                  <a href="index.php?url=pays&code=<?php echo htmlspecialchars($member['MemberId']); ?>">
                                                       <i class="fa fa-money-bill me-2" style="font-size: 18px; color: grey; padding-right: 4px;" title="Payment Not Confirmed"></i>
                                                  </a>
                                             <?php endif; ?>
                                        </td>




                                        <td class="td-actions text-right">
                                             <a href="index.php?url=payment_new_member&code=<?php echo htmlspecialchars($member['MemberId']); ?>">
                                                  <i class="text-success fa fa-check me-2" style="font-size: 18px; padding-right : 4px;"></i>
                                             </a>
                                             <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                  data-url="index.php?url=delete_new_member&code=<?php echo htmlspecialchars($member['MemberId']); ?>">
                                                  <i class="text-danger fa fa-trash me-2"></i>
                                             </a>
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

<!-- Bootstrap Modal for Confirmation -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    Are you sure you want to delete this member?
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="" id="confirmDelete" class="btn btn-danger">Delete</a>
               </div>
          </div>
     </div>
</div>
<script>
     var deleteModal = document.getElementById('deleteModal');
     deleteModal.addEventListener('show.bs.modal', function(event) {
          var button = event.relatedTarget;
          var url = button.getAttribute('data-url');
          var confirmDelete = document.getElementById('confirmDelete');
          confirmDelete.setAttribute('href', url);
     });
</script>

<!-- ===================== members End ===================== -->


<?php
require "views/members/components/footer.php";
?>