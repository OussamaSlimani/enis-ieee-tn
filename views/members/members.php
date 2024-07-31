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
                              <li class="breadcrumb-item" aria-current="page">
                                   List of active membership
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
$totalMembers = count($members);
$totalPages = ceil($totalMembers / $membersPerPage);
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$start = ($page - 1) * $membersPerPage;
$end = $start + $membersPerPage;
$currentMembers = array_slice($members, $start, $membersPerPage);
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
          <div class="d-flex align-items-center justify-content-between mb-4">
               <div class="m-3">
                    <a class="btn btn-primary d-flex align-items-center" href="index.php?url=create_member"><i class="fs-4 ti ti-plus"></i>Add Member</a>
               </div>
               <div class="m-3">
                    <form class="ms-4 d-flex" action="index.php?url=search_member" method="POST">
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
                              <th scope="col">IEEE Number</th>
                              <th scope="col">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php if (!empty($currentMembers)) : ?>
                              <?php foreach ($currentMembers as $member) : ?>
                                   <tr>
                                        <td><?php echo htmlspecialchars($member['FullName']); ?></td>
                                        <td><?php echo htmlspecialchars($member['Department']); ?></td>
                                        <td><?php echo htmlspecialchars($member['Email']); ?></td>
                                        <td><?php echo htmlspecialchars($member['Password']); ?></td>
                                        <td><?php echo htmlspecialchars($member['IeeeNumber']); ?></td>
                                        <td class="td-actions text-right">
                                             <a href="index.php?url=edit_member&code=<?php echo htmlspecialchars($member['MemberId']); ?>">
                                                  <i class="text-primary fa fa-pen me-2"></i>
                                             </a>
                                             <a href="index.php?url=delete_member&code=<?php echo htmlspecialchars($member['MemberId']); ?>">
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
                                        <a class="page-link" href="index.php?url=members&page=<?php echo $i; ?>"><?php echo $i; ?></a>
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
require "views/members/components/footer.php";
?>