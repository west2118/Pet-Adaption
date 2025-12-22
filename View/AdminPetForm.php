<?php

require_once "../Model/pet.php";
$pet = new Pet();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Pet | Pet Management</title>
    <link rel="stylesheet" href="../Styles/AddPetForm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php include "../Includes/AdminSidebar.php" ?>

    <div class="page-container">
        <header class="page-header">
            <h1 class="page-title">
                <i class="fas fa-plus-circle"></i>
                Add New Pet
            </h1>
            <a href="../View/AdminPets.php" class="back-button">
                <i class="fas fa-arrow-left"></i>
                Back to Manage Pets
            </a>
        </header>

        <main class="content-card">
            <div class="card-header">
                <h2>Pet Information</h2>
                <p style="margin-top: 8px; color: #718096; font-size: 0.95rem;">
                    Please fill in all required fields (marked with <span style="color: #e53e3e;">*</span>) to add a new pet to the system.
                </p>
            </div>

            <div class="card-body">
                <?php
                if (isset($_GET['edit'])) {
                    $get_id_edit = $_GET['edit'];
                    $row = $pet->getPetById($get_id_edit);
                    if ($row) { ?>
                        <form action="../Controllers/action_pet.php" method="POST" class="add-pet-form" id="addPetForm">
                            <!-- First Row: Pet Name & Type -->
                            <input type="hidden" class="form-control" name="pet_id" value="<?php echo $row['pet_id']; ?>" required>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="petName" class="form-label required">
                                        <i class="fas fa-dog"></i>
                                        Pet Name
                                    </label>
                                    <input
                                        type="text"
                                        id="petName"
                                        name="petName"
                                        class="form-input"
                                        placeholder="Enter pet name (e.g., Max)"
                                        value="<?php echo $row['petName']; ?>"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="petType" class="form-label required">
                                        <i class="fas fa-paw"></i>
                                        Pet Type
                                    </label>
                                    <select id="petType" name="petType" class="form-select" required>
                                        <option value="">Select pet type</option>
                                        <option value="dog" <?php if ($row['petType'] == 'dog') echo 'selected'; ?>>Dog</option>
                                        <option value="cat" <?php if ($row['petType'] == 'cat') echo 'selected'; ?>>Cat</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Second Row: Breed & Age -->
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="petBreed" class="form-label">
                                        <i class="fas fa-dna"></i>
                                        Breed
                                    </label>
                                    <div class="breed-input-container">
                                        <input
                                            type="text"
                                            id="breed"
                                            name="breed"
                                            class="form-input"
                                            placeholder="Enter breed (e.g., Golden Retriever)"
                                            value="<?php echo $row['breed']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="petAge" class="form-label required">
                                        <i class="fas fa-birthday-cake"></i>
                                        Age
                                    </label>
                                    <input
                                        type="text"
                                        id="age"
                                        name="age"
                                        class="form-input"
                                        placeholder="e.g., 2 years, 6 months"
                                        value="<?php echo $row['age']; ?>"
                                        required>
                                </div>
                            </div>

                            <!-- Third Row: Gender & Status -->
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="gender" class="form-label required">
                                        <i class="fas fa-venus-mars"></i>
                                        Gender
                                    </label>

                                    <select id="gender" name="gender" class="form-select" required>
                                        <option value="">Select gender</option>
                                        <option value="male" <?php if ($row['gender'] == 'male') echo 'selected'; ?>>Male</option>
                                        <option value="female" <?php if ($row['gender'] == 'female') echo 'selected'; ?>>Female</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="vaccinated" class="form-label required">
                                        <i class="fas fa-paw"></i>
                                        Vaccinated
                                    </label>
                                    <select id="vaccinated" name="vaccinated" class="form-select" required>
                                        <option value="">Select vaccinated type</option>
                                        <option value="1" <?php if ($row['vaccinated'] == '1') echo 'selected'; ?>>Vaccinated</option>
                                        <option value="0" <?php if ($row['vaccinated'] == '0') echo 'selected'; ?>>Not Vaccinated</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="form-group full-width">
                                <label for="petDescription" class="form-label required">
                                    <i class="fas fa-align-left"></i>
                                    Description
                                </label>
                                <textarea
                                    id="description"
                                    class="form-textarea"
                                    name="description"
                                    placeholder="Describe the pet's personality, temperament, special needs, and any other important information..."
                                    required><?php echo htmlspecialchars($row['description']); ?></textarea>
                            </div>

                            <!-- Photo Upload -->
                            <div class="form-group full-width">
                                <label for="photoLink" class="form-label">
                                    <i class="fas fa-camera"></i>
                                    Photo Link
                                </label>
                                <input
                                    type="text"
                                    id="photo"
                                    name="photo"
                                    class="form-input"
                                    value="<?php echo $row['photo']; ?>"
                                    placeholder="Enter image URL here">
                                <div style="font-size: 0.85rem; color: #a0aec0; margin-top: 10px;">
                                    <i class="fas fa-info-circle"></i> Enter a valid image URL. You can also upload a photo after creating the pet record.
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="form-actions">
                                <a href="../View/AdminPets.php" class="btn btn-cancel">
                                    <i class="fas fa-times"></i>
                                    Cancel
                                </a>
                                <button type="submit" name="edit" class="btn btn-submit">
                                    <i class="fas fa-plus-circle"></i>
                                    Edit Pet
                                </button>
                            </div>
                        </form>
                    <?php }
                } else {
                    ?>
                    <form action="../Controllers/action_pet.php" method="POST" class="add-pet-form" id="addPetForm">
                        <!-- First Row: Pet Name & Type -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="petName" class="form-label required">
                                    <i class="fas fa-dog"></i>
                                    Pet Name
                                </label>
                                <input
                                    type="text"
                                    id="petName"
                                    name="petName"
                                    class="form-input"
                                    placeholder="Enter pet name (e.g., Max)"
                                    value=""
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="petType" class="form-label required">
                                    <i class="fas fa-paw"></i>
                                    Pet Type
                                </label>
                                <select id="petType" name="petType" class="form-select" required>
                                    <option value="">Select pet type</option>
                                    <option value="dog">Dog</option>
                                    <option value="cat">Cat</option>
                                </select>
                            </div>
                        </div>

                        <!-- Second Row: Breed & Age -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="petBreed" class="form-label">
                                    <i class="fas fa-dna"></i>
                                    Breed
                                </label>
                                <div class="breed-input-container">
                                    <input
                                        type="text"
                                        id="breed"
                                        name="breed"
                                        class="form-input"
                                        placeholder="Enter breed (e.g., Golden Retriever)"
                                        value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="petAge" class="form-label required">
                                    <i class="fas fa-birthday-cake"></i>
                                    Age
                                </label>
                                <input
                                    type="text"
                                    id="age"
                                    name="age"
                                    class="form-input"
                                    placeholder="e.g., 2 years, 6 months"
                                    value=""
                                    required>
                            </div>
                        </div>

                        <!-- Third Row: Gender & Status -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="gender" class="form-label required">
                                    <i class="fas fa-venus-mars"></i>
                                    Gender
                                </label>

                                <select id="gender" name="gender" class="form-select" required>
                                    <option value="">Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="vaccinated" class="form-label required">
                                    <i class="fas fa-paw"></i>
                                    Vaccinated
                                </label>
                                <select id="vaccinated" name="vaccinated" class="form-select" required>
                                    <option value="">Select vaccinated type</option>
                                    <option value="1">Vaccinated</option>
                                    <option value="0">Not Vaccinated</option>
                                </select>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group full-width">
                            <label for="petDescription" class="form-label required">
                                <i class="fas fa-align-left"></i>
                                Description
                            </label>
                            <textarea
                                id="description"
                                class="form-textarea"
                                name="description"
                                placeholder="Describe the pet's personality, temperament, special needs, and any other important information..."
                                required></textarea>
                        </div>

                        <!-- Photo Upload -->
                        <div class="form-group full-width">
                            <label for="photoLink" class="form-label">
                                <i class="fas fa-camera"></i>
                                Photo Link
                            </label>
                            <input
                                type="text"
                                id="photo"
                                name="photo"
                                class="form-input"
                                placeholder="Enter image URL here">
                            <div style="font-size: 0.85rem; color: #a0aec0; margin-top: 10px;">
                                <i class="fas fa-info-circle"></i> Enter a valid image URL. You can also upload a photo after creating the pet record.
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <a href="../View/AdminPets.php" class="btn btn-cancel">
                                <i class="fas fa-times"></i>
                                Cancel
                            </a>
                            <button type="submit" name="add" class="btn btn-submit">
                                <i class="fas fa-plus-circle"></i>
                                Add Pet
                            </button>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </main>
    </div>
</body>

</html>