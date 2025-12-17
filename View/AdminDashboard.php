<?php

include "../Model/pet.php";
include "../Model/request.php";

$pet = new Pet();
$request = new Request();

$totalPets = $pet->countAllPets();

$totalAdoptedPets = $pet->countAdoptedPets();

$totalAvailablePets = $pet->countAvailablePets();

$totalPendingRequests = $request->countPendingRequests();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Happy Paws Adoption Center</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../Styles/AdminDashboard.css">
</head>

<body>
    <?php include "../Includes/AdminSidebar.php" ?>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <h2>Dashboard Overview</h2>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon total">
                    <i class="fas fa-paw"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $totalPets; ?></h3>
                    <p>Total Pets</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon adopted">
                    <i class="fas fa-home"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $totalAdoptedPets; ?></h3>
                    <p>Adopted Pets</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon available">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $totalAvailablePets; ?></h3>
                    <p>Available Pets</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon pending">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $totalPendingRequests; ?></h3>
                    <p>Pending Requests</p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <!-- <div class="action-buttons">
            <div class="action-button" id="addPetAction">
                <div class="action-icon add">
                    <i class="fas fa-plus"></i>
                </div>
                <h3>Add New Pet</h3>
                <p>Add a new pet to the adoption listing</p>
            </div>

            <div class="action-button" id="managePetsAction">
                <div class="action-icon manage">
                    <i class="fas fa-edit"></i>
                </div>
                <h3>Manage Pets</h3>
                <p>Edit pet details, update status, or remove pets</p>
            </div>

            <div class="action-button" id="viewRequestsAction">
                <div class="action-icon requests">
                    <i class="fas fa-inbox"></i>
                </div>
                <h3>Adoption Requests</h3>
                <p>Review and process adoption inquiries</p>
            </div>

            <div class="action-button" id="generateReportsAction">
                <div class="action-icon reports">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <h3>Generate Reports</h3>
                <p>Create reports on adoptions and shelter stats</p>
            </div>
        </div> -->

        <!-- Recent Activity & Adoption Requests -->
        <div class="content-row">
            <!-- Recent Pets Table -->
            <div class="content-card">
                <div class="card-header">
                    <h3>Recently Added Pets</h3>
                    <a href="../View/AdminPets.php">View All</a>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Pet</th>
                                <th>Type</th>
                                <th>Age</th>
                                <th>Status</th>
                                <th>Added</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pets = $pet->getFiveRecentPets();
                            foreach ($pets as $row) { ?>
                                <tr>
                                    <td>
                                        <div class="pet-name-cell">
                                            <img src="<?php echo htmlspecialchars($row['photo']); ?>" alt="Rex" class="pet-avatar">
                                            <span><?php echo htmlspecialchars($row['petName']); ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo ucfirst(strtolower(htmlspecialchars($row['petType']))); ?></td>
                                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                                    <td><span class="status-badge status-adopted"><?php echo ucfirst(strtolower(htmlspecialchars($row['status']))); ?></span></td>
                                    <td><?php echo htmlspecialchars($row['date_added']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Adoption Requests -->
            <div class="content-card">
                <div class="card-header">
                    <h3>Recent Adoption Requests</h3>
                    <a href="../View/AdminAdoptionRequests.php">View All</a>
                </div>
                <div class="request-list">
                    <?php
                    $requests = $request->getLast4Requests();
                    foreach ($requests as $row) { ?>
                        <div class="request-item">
                            <div class="request-info">
                                <h4><?php echo htmlspecialchars($row['firstName'] . ' ' . $row['lastName']); ?></h4>
                                <p><i class="fas fa-dog"></i> Interested in: <?php echo htmlspecialchars($row['petName']); ?> (<?php echo htmlspecialchars($row['breed']); ?>)</p>
                                <p><i class="fas fa-clock"></i> Submitted: <?php echo htmlspecialchars($row['dateSubmitted']); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Static functionality for demonstration
        document.addEventListener('DOMContentLoaded', function() {
            // Action buttons functionality
            const addPetBtn = document.getElementById('addPetBtn');
            const addPetAction = document.getElementById('addPetAction');
            const managePetsAction = document.getElementById('managePetsAction');
            const viewRequestsAction = document.getElementById('viewRequestsAction');
            const generateReportsAction = document.getElementById('generateReportsAction');

            // Add Pet button actions
            addPetBtn.addEventListener('click', function() {
                alert('"Add New Pet" form would open here.\n\nThis would include:\n• Pet name, type, breed\n• Age, gender, description\n• Upload photos\n• Medical information\n• Set adoption status');
            });

            addPetAction.addEventListener('click', function() {
                alert('"Add New Pet" form would open here.\n\nThis would include:\n• Pet name, type, breed\n• Age, gender, description\n• Upload photos\n• Medical information\n• Set adoption status');
            });

            // Manage Pets action
            managePetsAction.addEventListener('click', function() {
                alert('Redirecting to "Manage Pets" page.\n\nThis page would show:\n• List of all pets with filters\n• Edit/Delete buttons for each pet\n• Status update options\n• Search and sort functionality');
            });

            // View Requests action
            viewRequestsAction.addEventListener('click', function() {
                alert('Redirecting to "Adoption Requests" page.\n\nThis page would show:\n• All pending adoption inquiries\n• Adopter details and contact info\n• Pet they are interested in\n• Approve/Deny functionality');
            });

            // Generate Reports action
            generateReportsAction.addEventListener('click', function() {
                alert('Opening "Generate Reports" options.\n\nAvailable reports:\n• Monthly adoption statistics\n• Pet type distribution\n• Adoption success rates\n• Shelter capacity report\n• Export to PDF/Excel');
            });

            // Notification icon
            const notificationIcon = document.querySelector('.notification-icon');
            notificationIcon.addEventListener('click', function() {
                alert('You have 3 notifications:\n\n1. New adoption request for Max\n2. Monthly report is ready\n3. System maintenance scheduled');
            });

            // Table row click functionality
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('click', function() {
                    const petName = this.querySelector('.pet-name-cell span').textContent;
                    alert(`Viewing details for ${petName}.\n\nThis would open an edit/view modal with full pet information and management options.`);
                });
            });

            // Adoption request action buttons
            const approveButtons = document.querySelectorAll('.btn-approve');
            const denyButtons = document.querySelectorAll('.btn-deny');

            approveButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const adopterName = this.closest('.request-item').querySelector('h4').textContent;
                    alert(`Approving adoption request from ${adopterName}.\n\nIn a real system, this would:\n• Mark the pet as adopted\n• Notify the adopter via email\n• Remove the pet from available listings\n• Update statistics`);
                });
            });

            denyButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const adopterName = this.closest('.request-item').querySelector('h4').textContent;
                    alert(`Denying adoption request from ${adopterName}.\n\nIn a real system, this would:\n• Send a rejection email to the adopter\n• Keep the pet available for adoption\n• Allow admin to add a reason for denial`);
                });
            });
        });
    </script>
</body>

</html>