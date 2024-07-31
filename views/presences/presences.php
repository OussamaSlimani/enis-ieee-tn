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
                                   List of activities and presences
                              </li>
                         </ol>
                    </nav>
               </div>
          </div>
     </div>
</div>
<!-- ===================== header End ===================== -->

<!-- ===================== members Start ===================== -->
<?php
$membersPerPage = 30;
$totalMembers = count($activities);
$totalPages = ceil($totalMembers / $membersPerPage);
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$start = ($page - 1) * $membersPerPage;
$end = $start + $membersPerPage;
$currentMembers = array_slice($activities, $start, $membersPerPage);
?>

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
                    <a class="btn btn-primary d-flex align-items-center" href="index.php?url=create_activity"><i class="fs-4 ti ti-plus"></i>Add Activity</a>
               </div>
          </div>
          <div class="table-responsive">
               <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                         <tr class="text-dark">
                              <th scope="col">Name</th>
                              <th scope="col">Type</th>
                              <th scope="col">Location Type</th>
                              <th scope="col">Date</th>
                              <th scope="col">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php if (!empty($currentMembers)) : ?>
                              <?php foreach ($currentMembers as $member) : ?>
                                   <tr>
                                        <td><?php echo htmlspecialchars($member['Name']); ?></td>
                                        <td><?php echo htmlspecialchars($member['Type']); ?></td>
                                        <td><?php echo htmlspecialchars($member['LocationType']); ?></td>
                                        <td><?php echo htmlspecialchars($member['Date']); ?></td>
                                        <td class="td-actions text-right">
                                             <a href="index.php?url=mark_presence&code=<?php echo htmlspecialchars($member['ActivityId']); ?>">
                                                  <i class="text-primary fa fa-user-plus me-2"></i>
                                             </a>
                                             <a href="index.php?url=delete_activity&code=<?php echo htmlspecialchars($member['ActivityId']); ?>">
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
               <?php if ($totalPages > 1) : ?>
                    <nav aria-label="Page navigation">
                         <ul class="pagination justify-content-center mt-4">
                              <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                   <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                                        <a class="page-link" href="index.php?url=presences&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                   </li>
                              <?php endfor; ?>
                         </ul>
                    </nav>
               <?php endif; ?>
          </div>
     </div>
</div>

<!-- ===================== members End ===================== -->


<?php
require "app/views/members/components/footer.php";
?>