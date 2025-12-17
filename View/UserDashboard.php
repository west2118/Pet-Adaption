<?php

include "../Model/pet.php";
$pet = new Pet();

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
        <section class="filters">
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
        </section>

        <!-- Available Pets Section -->
        <h2 class="section-title">Available Pets</h2>

        <div class="pets-grid">
            <!-- Pet Card 1 -->
            <?php
            $pets = $pet->getAllAvailablePets();
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
                            <button class="btn btn-details"><i class="fas fa-info-circle"></i> View Details</button>
                            <button class="btn btn-adopt adopt-btn" data-id="<?php echo htmlspecialchars($row['pet_id']); ?>" data-pet="<?php echo htmlspecialchars($row['petName']); ?>"><i class="fas fa-heart"></i> Adopt Me</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <?php include '../Includes/User/Footer.php'; ?>

    <?php include '../Includes/RequestFormModal.php'; ?>

    <script>
        // Modal functionality for demonstration purposes only
        document.addEventListener('DOMContentLoaded', function() {
            const adoptButtons = document.querySelectorAll('.adopt-btn');
            const modal = document.getElementById('adoptionModal');
            const closeModal = document.getElementById('closeModal');
            const petNameSpan = document.getElementById('petName');
            const adoptionForm = document.getElementById('adoptionForm');

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

            // View Details button functionality
            const viewDetailButtons = document.querySelectorAll('.btn-details');
            viewDetailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const petCard = this.closest('.pet-card');
                    const petName = petCard.querySelector('.pet-name').textContent;
                    alert(`Details for ${petName}:\n\nThis would show more detailed information about the pet in a real system.\n\nFeatures might include:\n• Full medical history\n• Behavioral notes\n• Adoption requirements\n• More photos`);
                });
            });

            // Filter functionality (visual only)
            const statusFilter = document.getElementById('status-filter');
            const petCards = document.querySelectorAll('.pet-card');

            statusFilter.addEventListener('change', function() {
                const showAdopted = this.value === 'all';

                petCards.forEach(card => {
                    if (card.classList.contains('adopted')) {
                        card.style.display = showAdopted ? 'block' : 'none';
                    }
                });
            });
        });
    </script>
</body>

</html>