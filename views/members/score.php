<?php
require "app/views/members/components/header.php";
?>

<!-- ===================== header Start ===================== -->
<div class="container-fluid pt-4 px-4">
     <div class="bg-light rounded-top p-4">
          <div class="row align-items-center">
               <div class="col-9">
                    <h4 class="fw-semibold mb-8">Score</h4>
                    <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                              <li class="breadcrumb-item">Dashboard</li>
                              <li class="breadcrumb-item" aria-current="page">
                                   Scoring System
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
          <div class="table-responsive">
               <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                         <tr class="text-dark">
                              <th scope="col">FullName</th>
                              <th scope="col">Department</th>
                              <th scope="col">Email</th>
                              <th scope="col">Score</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php if (!empty($currentMembers)) : ?>
                              <?php foreach ($currentMembers as $member) : ?>
                                   <tr>
                                        <td><?php echo htmlspecialchars($member['FullName']); ?></td>
                                        <td><?php echo htmlspecialchars($member['Department']); ?></td>
                                        <td><?php echo htmlspecialchars($member['Email']); ?></td>
                                        <td><?php echo htmlspecialchars($member['Score']); ?></td>
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
                                        <a class="page-link" href="index.php?url=score&page=<?php echo $i; ?>"><?php echo $i; ?></a>
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