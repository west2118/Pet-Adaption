<?php

include "../Model/pet.php";
$pet = new Pet();

// Pagination setup
$limit = 9; // Number of pets per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$totalPets = $pet->getPetCount();
$totalPages = max(1, ceil($totalPets / $limit));

if ($page < 1) {
    header("Location: ?page=1");
    exit;
} elseif ($page > $totalPages) {
    header("Location: ?page=$totalPages");
    exit;
}

$pets = $pet->getAllPetsPaginated($limit, $offset);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Paws Adoption Center</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../Styles/UserDashboard.css">
</head>

<body>
    <!-- Header -->
    <?php include '../Includes/User/Navbar.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h2>Find Your Perfect Furry Companion</h2>
            <p>Browse our available pets waiting for their forever homes. Each adoption helps us save more animals in need.</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">
        <!-- Filter Section -->
        <!-- <section class="filters">
            <div class="filter-container">
                <div class="filter-group">
                    <label for="type-filter"><i class="fas fa-filter"></i> Pet Type</label>
                    <select id="type-filter">
                        <option value="all">All Pets</option>
                        <option value="dog">Dogs</option>
                        <option value="cat">Cats</option>
                        <option value="rabbit">Rabbits</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="age-filter"><i class="fas fa-birthday-cake"></i> Age</label>
                    <select id="age-filter">
                        <option value="all">Any Age</option>
                        <option value="young">Young (0-2 years)</option>
                        <option value="adult">Adult (2-8 years)</option>
                        <option value="senior">Senior (8+ years)</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="status-filter"><i class="fas fa-heart"></i> Status</label>
                    <select id="status-filter">
                        <option value="available">Available Only</option>
                        <option value="all">Show All</option>
                    </select>
                </div>
            </div>
        </section> -->

        <!-- Available Pets Section -->
        <h2 class="section-title">Available Pets</h2>

        <div class="pets-grid">
            <!-- Pet Card 1 -->
            <?php
            foreach ($pets as $row) { ?>
                <div class="pet-card">
                    <img src="<?php echo htmlspecialchars($row['photo']); ?>" alt="Golden Retriever" class="pet-image">
                    <div class="pet-info">
                        <div class="pet-header">
                            <div class="pet-name"><?php echo htmlspecialchars($row['petName']); ?></div>
                            <span class="pet-type">Dog</span>
                        </div>
                        <div class="pet-details">
                            <p><i class="fas fa-venus-mars"></i> <strong>Breed:</strong> <span><?php echo htmlspecialchars($row['breed']); ?></span></p>
                            <p><i class="fas fa-dog"></i> <strong>Gender:</strong> <span><?php echo htmlspecialchars($row['gender']); ?></span></p>
                            <p><i class="fas fa-syringe"></i> <strong>Vaccinated:</strong> <span><?php echo htmlspecialchars($row['vaccinated'] == 1) ? "Yes" : "No"; ?></span></p>
                        </div>
                        <div class="pet-actions">
                            <button class="btn btn-details btn-view" data-id="<?= $row['pet_id']; ?>"
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
                                <i class="fas fa-info-circle"></i> View Details</button>
                            <button class="btn btn-adopt adopt-btn" data-id="<?php echo htmlspecialchars($row['pet_id']); ?>" data-pet="<?php echo htmlspecialchars($row['petName']); ?>"><i class="fas fa-heart"></i> Adopt Me</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="pagination-controls">
            <?php if ($page > 1): ?>
                <a class="pagination-btn" href="?page=<?= $page - 1 ?>"><i class="fa fa-chevron-left"></i> Previous</a>
            <?php else: ?>
                <span class="pagination-btn" style="opacity: 0.5;"><i class="fa fa-chevron-left"></i> Previous</span>
            <?php endif; ?>

            <div class="page-numbers">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a class="pagination-btn <?= ($i == $page) ? 'active' : '' ?>" href="?page=<?= $i ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>

            <?php if ($page < $totalPages): ?>
                <a class="pagination-btn" href="?page=<?= $page + 1 ?>">Next <i class="fa fa-chevron-right"></i></a>
            <?php else: ?>
                <span class="pagination-btn" style="opacity: 0.5;">Next <i class="fa fa-chevron-right"></i></span>
            <?php endif; ?>
        </div>
    </main>

    <?php include '../Includes/User/Footer.php'; ?>

    <?php include '../Includes/RequestFormModal.php'; ?>

    <?php include '../Includes/PetDetailModal.php'; ?>

    <script>
        // Modal functionality for demonstration purposes only
        document.addEventListener('DOMContentLoaded', function() {
            const adoptButtons = document.querySelectorAll('.adopt-btn');
            const modal = document.getElementById('adoptionModal');
            const closeModal = document.getElementById('closeModal');
            const petNameSpan = document.getElementById('petName');
            const adoptionForm = document.getElementById('adoptionForm');

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

            // Show modal when "Adopt Me" is clicked
            adoptButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const petId = this.getAttribute('data-id');
                    document.getElementById('petId').value = petId;
                    const petName = this.getAttribute('data-pet');
                    petNameSpan.textContent = petName;
                    modal.classList.add('active');
                });
            });

            // Close modal when X is clicked
            closeModal.addEventListener('click', function() {
                modal.classList.remove('active');
            });

            // Close modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>