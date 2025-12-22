<?php

include "../Model/request.php";
$request = new Request();

$totalRequests = $request->countAllRequests();

$totalPendingRequests = $request->countPendingRequests();

$totalApprovedRequests = $request->countApprovedRequests();

$totalCompletedRequests = $request->countCompletedRequests();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Requests - Admin Dashboard</title>
    <?php include "../Includes/href.php" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../Styles/AdminAdoptionRequest.css">
</head>

<body>
    <?php include "../Includes/AdminSidebar.php" ?>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <h1><i class="fas fa-inbox"></i> Adoption Requests</h1>
        </div>

        <!-- Stats Summary -->
        <div class="stats-summary">
            <div class="stat-box pending">
                <div class="stat-icon pending">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $totalRequests; ?></h3>
                    <p>Total Requests</p>
                </div>
            </div>

            <div class="stat-box rejected">
                <div class="stat-icon rejected">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $totalPendingRequests; ?></h3>
                    <p>Pending</p>
                </div>
            </div>

            <div class="stat-box approved">
                <div class="stat-icon approved">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $totalApprovedRequests; ?></h3>
                    <p>Approved</p>
                </div>
            </div>

            <div class="stat-box completed">
                <div class="stat-icon completed">
                    <i class="fas fa-home"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $totalCompletedRequests; ?></h3>
                    <p>Completed Adoptions</p>
                </div>
            </div>
        </div>

        <!-- Requests Table -->
        <div class="table-container">
            <div class="table-header">
                <h3>Adoption Requests</h3>
            </div>

            <div class="table-wrapper">
                <table id="myTable">
                    <thead>
                        <tr>
                            <th>Requester</th>
                            <th>Reference Number</th>
                            <th>Pet</th>
                            <th>Submitted</th>
                            <th>Status</th>
                            <th>Contact</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $requests = $request->getAllRequests();
                        foreach ($requests as $row) { ?>
                            <tr>
                                <td>
                                    <div class="requester-cell">
                                        <div class="requester-avatar">
                                            <?php
                                            $firstInitial = strtoupper(substr($row['firstName'], 0, 1));
                                            $lastInitial = strtoupper(substr($row['lastName'], 0, 1));
                                            echo $firstInitial . $lastInitial;
                                            ?>
                                        </div>
                                        <div class="requester-info">
                                            <h4>
                                                <?php
                                                $firstInitial = $row['firstName'];
                                                $lastInitial = $row['lastName'];
                                                echo $firstInitial . " " . $lastInitial;
                                                ?>
                                            </h4>
                                            <p><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($row['homeCity']); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo htmlspecialchars($row['ref_number']); ?></td>
                                <td>
                                    <div class="pet-cell">
                                        <img src="<?php echo htmlspecialchars($row['photo']); ?>" alt="Max" class="pet-avatar">
                                        <div class="pet-info">
                                            <h4><?php echo htmlspecialchars($row['petName']); ?></h4>
                                            <p><?php echo htmlspecialchars($row['breed']); ?> • <?php echo htmlspecialchars($row['age']); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo htmlspecialchars($row['dateSubmitted']); ?></td>
                                <td>
                                    <span class="status-badge status-<?php echo strtolower($row['status']); ?>">
                                        <?php echo ucfirst(strtolower(htmlspecialchars($row['status']))); ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="requester-info">
                                        <p><i class="fas fa-envelope"></i> <?php echo htmlspecialchars($row['email']); ?></p>
                                        <p><i class="fas fa-phone"></i> <?php echo htmlspecialchars($row['contact']); ?></p>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <?php if ($row['status'] === "pending"): ?>
                                            <button class="btn-icon btn-approve"
                                                data-id="<?php echo htmlspecialchars($row['request_id']); ?>"
                                                data-name="<?php echo htmlspecialchars($row['petName']); ?>"
                                                data-breed="<?php echo htmlspecialchars($row['breed']); ?>"
                                                data-email="<?php echo htmlspecialchars($row['email']); ?>"
                                                data-refnumber="<?php echo htmlspecialchars($row['ref_number']); ?>"
                                                data-fullname="<?php echo htmlspecialchars($row['firstName'] . ' ' . $row['lastName']); ?>"
                                                data-petid="<?php echo htmlspecialchars($row['pet_id']); ?>">
                                                <i class="fas fa-check"></i>
                                            </button>

                                            <button class="btn-icon btn-reject"
                                                data-id2="<?php echo htmlspecialchars($row['request_id']); ?>"
                                                data-email2="<?php echo htmlspecialchars($row['email']); ?>"
                                                data-name2="<?php echo htmlspecialchars($row['petName']); ?>"
                                                data-breed2="<?php echo htmlspecialchars($row['breed']); ?>"
                                                data-fullname2="<?php echo htmlspecialchars($row['firstName'] . ' ' . $row['lastName']); ?>">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        <?php elseif ($row['status'] === "approved"): ?>
                                            <form method="POST" action="../Controllers/action_request.php" style="margin: 0; display: flex; gap: 10px;">
                                                <input type="hidden" name="request_id" value="<?php echo htmlspecialchars($row['request_id']); ?>">
                                                <input type="hidden" name="pet_id" value="<?php echo htmlspecialchars($row['pet_id']); ?>">
                                                <button type="submit" name="mark_adopted" class="btn-icon btn-addopted">
                                                    <span>Mark as Adopted</span>
                                                </button>
                                            </form>
                                        <?php endif; ?>

                                        <!-- VIEW BUTTON ALWAYS SHOWN -->
                                        <button class="btn-icon btn-view"
                                            data-fullname="<?php echo htmlspecialchars($row['firstName'] . ' ' . $row['lastName']); ?>"
                                            data-homecity="<?php echo htmlspecialchars($row['homeCity']); ?>"
                                            data-email="<?php echo htmlspecialchars($row['email']); ?>"
                                            data-status="<?php echo htmlspecialchars($row['status']); ?>"
                                            data-contact="<?php echo htmlspecialchars($row['contact']); ?>"
                                            data-petexperience="<?php echo htmlspecialchars($row['petExperience']); ?>"
                                            data-message="<?php echo htmlspecialchars($row['message']); ?>"
                                            data-datesubmitted="<?php echo htmlspecialchars($row['dateSubmitted']); ?>"
                                            data-refnumber="<?php echo htmlspecialchars($row['ref_number']); ?>"
                                            data-petname="<?php echo htmlspecialchars($row['petName']); ?>"
                                            data-pettype="<?php echo htmlspecialchars($row['petType']); ?>"
                                            data-breed="<?php echo htmlspecialchars($row['breed']); ?>"
                                            data-age="<?php echo htmlspecialchars($row['age']); ?>"
                                            data-photo="<?php echo htmlspecialchars($row['photo']); ?>">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include '../Includes/RequestDetailsModal.php'; ?>

    <?php include '../Includes/RequestModal.php'; ?>

    <script>
        let table = new DataTable('#myTable');

        // Static functionality for demonstration
        document.addEventListener('DOMContentLoaded', function() {
            const approveBtns = document.querySelectorAll('.btn-approve');
            const rejectBtns = document.querySelectorAll('.btn-reject');

            const approvedModal = document.getElementById('approvedModal');
            const rejectedModal = document.getElementById('rejectedModal');

            const detailsBtns = document.querySelectorAll('.btn-view');
            const detailsModal = document.getElementById('requestDetailsModal');

            /* OPEN APPROVED MODAL */
            approveBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    approvedModal.style.display = 'flex';

                    const requestId = btn.getAttribute('data-id');
                    document.getElementById('requestId').value = requestId;

                    const petId = btn.getAttribute('data-petid');
                    document.getElementById('petId').value = petId;

                    const refNumber = btn.getAttribute('data-refnumber');
                    document.getElementById('refNumber').value = refNumber;

                    const fullName = btn.getAttribute('data-fullname');
                    document.getElementById('fullName').value = fullName;

                    const petName = btn.getAttribute('data-name');
                    const petBreed = btn.getAttribute('data-breed');
                    document.getElementById('pet-name').value = `${petName} (${petBreed})`;

                    const email = btn.getAttribute('data-email');
                    document.getElementById('email').textContent = email;
                    document.getElementById('emailValue').value = email;
                });
            });

            /* OPEN REJECTED MODAL */
            rejectBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    rejectedModal.style.display = 'flex';

                    const requestId = btn.getAttribute('data-id2');
                    document.getElementById('rejectedrequestId').value = requestId;

                    const petName = btn.getAttribute('data-name2');
                    const petBreed = btn.getAttribute('data-breed2');
                    document.getElementById('rejectedpet-name').value = `${petName} (${petBreed})`;

                    const email = btn.getAttribute('data-email2');
                    document.getElementById('rejectedEmail').textContent = email;
                    document.getElementById('rejectedemailValue').value = email;

                    const fullName = btn.getAttribute('data-fullname2');
                    document.getElementById('rejectedfullName').value = fullName;
                });
            });

            /* CLOSE BUTTONS */
            document.querySelectorAll('.btn-approved').forEach(btn => {
                btn.addEventListener('click', () => {
                    approvedModal.style.display = 'none';
                });
            });

            document.querySelectorAll('.btn-rejected').forEach(btn => {
                btn.addEventListener('click', () => {
                    rejectedModal.style.display = 'none';
                });
            });

            // Details
            detailsBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    detailsModal.style.display = 'flex';

                    const fullName = btn.getAttribute('data-fullname');
                    document.getElementById('detailsFullName').textContent = fullName;

                    const homeCity = btn.getAttribute('data-homecity');
                    document.getElementById('detailsCity').textContent = homeCity;

                    const email = btn.getAttribute('data-email');
                    document.getElementById('detailsEmail').textContent = email;

                    const status = btn.getAttribute('data-status');
                    document.getElementById('detailsStatus').textContent = status;

                    const contact = btn.getAttribute('data-contact');
                    document.getElementById('detailsContact').textContent = contact;

                    const petExperience = btn.getAttribute('data-petexperience');
                    document.getElementById('detailsExperience').textContent = petExperience;

                    const message = btn.getAttribute('data-message');
                    document.getElementById('detailsMessage').textContent = message;

                    const dateSubmitted = btn.getAttribute('data-datesubmitted');
                    document.getElementById('detailsDate').textContent = dateSubmitted;

                    const ref_number = btn.getAttribute('data-refnumber');
                    document.getElementById('detailsRefNumber').textContent = ref_number;

                    const petName = btn.getAttribute('data-petname');
                    document.getElementById('detailsPetName').textContent = petName;

                    const petType = btn.getAttribute('data-pettype');
                    document.getElementById('detailsPetType').textContent = petType;

                    const breed = btn.getAttribute('data-breed');
                    document.getElementById('detailsPetBreed').textContent = breed;

                    const age = btn.getAttribute('data-age');
                    document.getElementById('detailsPetAge').textContent = age;

                    const photo = btn.getAttribute('data-photo');
                    document.getElementById('detailsPetPhoto').src = photo;
                });
            });

            /* CLOSE BUTTONS */
            document.querySelectorAll('.btn-view-close').forEach(btn => {
                btn.addEventListener('click', () => {
                    detailsModal.style.display = 'none';
                });
            });

            document.querySelectorAll('.btn-close').forEach(btn => {
                btn.addEventListener('click', () => {
                    approvedModal.style.display = 'none';
                    rejectedModal.style.display = 'none';
                });
            });

            window.addEventListener('click', (e) => {
                if (e.target === approvedModal) {
                    approvedModal.style.display = 'none';
                }
                if (e.target === rejectedModal) {
                    rejectedModal.style.display = 'none';
                }
                if (e.target === detailsModal) {
                    detailsModal.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>