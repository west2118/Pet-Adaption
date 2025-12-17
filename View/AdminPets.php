<?php

include "../Model/pet.php";
$pet = new Pet();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pets - Admin Dashboard</title>
    <?php include "../Includes/href.php" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../Styles/AdminPets.css">
</head>

<body>
    <?php include "../Includes/AdminSidebar.php" ?>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <h1><i class="fas fa-paw"></i> Manage Pets</h1>
            <div class="header-actions">
                <a href="../View/AdminPetForm.php" class="btn btn-primary" id="addPetBtn">
                    <i class="fas fa-plus-circle"></i> Add New Pet
                </a>
            </div>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h3>All Pets</h3>
            </div>

            <div class="table-wrapper">
                <table id="myTable">
                    <thead>
                        <tr>
                            <th>Pet</th>
                            <th>Type</th>
                            <th>Breed</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Date Added</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $pets = $pet->getAllPets();
                        foreach ($pets as $row) { ?>
                            <tr>
                                <td>
                                    <div class="pet-cell">
                                        <img src="<?php echo htmlspecialchars($row['photo']); ?>" alt="Max" class="pet-avatar">
                                        <div class="pet-info">
                                            <h4><?php echo htmlspecialchars($row['petName']); ?></h4>

                                        </div>
                                    </div>
                                </td>

                                <td><?php echo ucfirst(htmlspecialchars($row['petType'])); ?></td>

                                <td><?php echo htmlspecialchars($row['breed']); ?></td>

                                <td><?php echo htmlspecialchars($row['age']); ?></td>

                                <td><?php echo ucfirst(htmlspecialchars($row['gender'])); ?></td>

                                <td>
                                    <span class="status-preview status-<?php echo strtolower($row['status']); ?>">
                                        <?php echo ucfirst(htmlspecialchars($row['status'])); ?>
                                    </span>
                                </td>

                                <td><?php echo htmlspecialchars($row['date_added']); ?></td>

                                <td class="actions">
                                    <button class="btn-view"
                                        data-id="<?= $row['pet_id']; ?>"
                                        data-name="<?= htmlspecialchars($row['petName']); ?>"
                                        data-type="<?= htmlspecialchars($row['petType']); ?>"
                                        data-breed="<?= htmlspecialchars($row['breed']); ?>"
                                        data-age="<?= htmlspecialchars($row['age']); ?>"
                                        data-gender="<?= htmlspecialchars($row['gender']); ?>"
                                        data-date="<?= htmlspecialchars($row['date_added']); ?>"
                                        data-status="<?= htmlspecialchars($row['status']); ?>"
                                        data-vaccinated="<?= htmlspecialchars($row['vaccinated']); ?>"
                                        data-description="<?= htmlspecialchars($row['description']); ?>"
                                        data-photo="<?= htmlspecialchars($row['photo']); ?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="../View/AdminPetForm.php?edit=<?= $row['pet_id'] ?>" class="btn-edit" id="btn-edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn-delete" data-id="<?= $row['pet_id']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Delete Confirmation Modal -->
    <!-- <div class="modal-overlay" id="deleteModal">
        <div class="modal">
            <div class="modal-header">
                <h3>Confirm Deletion</h3>
                <button class="close-modal" id="closeDeleteModal">&times;</button>
            </div>
            <div style="padding: 20px 0;">
                <p>Are you sure you want to delete <strong id="deletePetName">this pet</strong>? This action cannot be undone.</p>
                <div style="display: flex; gap: 15px; margin-top: 30px;">
                    <button class="btn btn-outline" id="cancelDeleteBtn" style="flex: 1;">Cancel</button>
                    <button class="btn" id="confirmDeleteBtn" style="flex: 1; background-color: #ef4444; color: white;">Delete Pet</button>
                </div>
            </div>
        </div>
    </div> -->

    <?php include '../Includes/PetDetailModal.php'; ?>

    <?php include '../Includes/RemovePetModal.php'; ?>

    <script>
        let table = new DataTable('#myTable');

        const viewBtns = document.querySelectorAll('.btn-view');
        const petModalOverlay = document.querySelector('.pet-modal-overlay');
        const closeBtn = petModalOverlay.querySelector('.pet-close-btn');

        viewBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Get data from button
                const petName = btn.getAttribute('data-name');
                const petType = btn.getAttribute('data-type');
                const breed = btn.getAttribute('data-breed');
                const age = btn.getAttribute('data-age');
                const gender = btn.getAttribute('data-gender');
                const dateAdded = btn.getAttribute('data-date');
                const status = btn.getAttribute('data-status');
                const vaccinated = btn.getAttribute('data-vaccinated') === "1" ? "Yes" : "No";
                const description = btn.getAttribute('data-description');
                const photo = btn.getAttribute('data-photo');

                // Populate modal
                document.getElementById("petModalPhoto").src = photo;
                document.getElementById("petModalPhoto").alt = petName;

                document.getElementById("petNameValue").textContent = petName;
                document.getElementById("petTypeValue").textContent = petType;
                document.getElementById("petBreedValue").textContent = breed;
                document.getElementById("petAgeValue").textContent = age;
                document.getElementById("petGenderValue").textContent = gender;
                document.getElementById("petDateAddedValue").textContent = dateAdded;
                document.getElementById("petStatusValue").textContent = status;
                document.getElementById("petVaccinatedValue").textContent = vaccinated;
                document.getElementById("petDescriptionText").textContent = description;

                // Show modal
                petModalOverlay.classList.add('active');
            });
        });

        // Function to close modal
        closeBtn.addEventListener('click', () => {
            petModalOverlay.classList.remove('active');
        });

        petModalOverlay.addEventListener('click', (e) => {
            if (e.target === petModalOverlay) {
                petModalOverlay.classList.remove('active');
            }
        });

        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', () => {
                const petId = btn.getAttribute('data-id');
                document.getElementById('deletePetId').value = petId;
                document.getElementById('overlay').style.display = 'block';
                document.getElementById('deleteModal').style.display = 'block';
            });
        });

        document.querySelectorAll('.cancelBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('overlay').style.display = 'none';
                document.getElementById('deleteModal').style.display = 'none';
            });
        });
    </script>
</body>

</html>