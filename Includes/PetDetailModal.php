<style>
    /* Pet Modal Specific Styles */
    .pet-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        display: none;
        /* Hidden by default */
        justify-content: center;
        align-items: center;
        z-index: 1000;
        padding: 20px;
    }

    /* Hide scrollbar for Webkit browsers */
    .pet-modal-details::-webkit-scrollbar {
        display: none;
    }

    /* Show modal when active */
    .pet-modal-overlay.active {
        display: flex;
    }

    .pet-modal-details {
        background-color: white;
        border-radius: 16px;
        width: 100%;
        max-width: 800px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        animation: petModalFadeIn 0.4s ease-out;
        display: flex;
        flex-direction: column;
    }

    @keyframes petModalFadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .pet-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 30px;
        border-bottom: 1px solid #eee;
        background-color: #f9f9f9;
        border-radius: 16px 16px 0 0;
    }

    .pet-modal-title {
        font-size: 1.8rem;
        color: #2c3e50;
        font-weight: 700;
    }

    .pet-close-btn {
        background: none;
        border: none;
        font-size: 1.5rem;
        color: #7f8c8d;
        cursor: pointer;
        transition: color 0.3s;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .pet-close-btn:hover {
        color: #e74c3c;
        background-color: #f5f5f5;
    }

    .pet-modal-content {
        display: flex;
        flex-direction: column;
        padding: 0;
    }

    .pet-modal-photo-container {
        padding: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8fafc;
    }

    .pet-modal-photo {
        width: 100%;
        max-width: 350px;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        object-fit: cover;
    }

    .pet-modal-info {
        padding: 30px;
    }

    /* UPDATED: 2-column grid for details */
    .pet-details-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        /* Two equal columns */
        gap: 20px;
        margin-bottom: 30px;
    }

    .pet-detail-item {
        margin-bottom: 0;
    }

    .pet-detail-label {
        font-weight: 600;
        color: #7f8c8d;
        font-size: 0.9rem;
        margin-bottom: 6px;
        display: block;
        letter-spacing: 0.5px;
    }

    .pet-detail-value {
        font-size: 1.1rem;
        color: #2c3e50;
        font-weight: 500;
    }

    .pet-status-badge,
    .pet-vaccinated-badge {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .pet-status-available {
        background-color: #d5f4e6;
        color: #27ae60;
    }

    .pet-status-adopted {
        background-color: #fdebd0;
        color: #e67e22;
    }

    .pet-status-pending {
        background-color: #e8f4fc;
        color: #3498db;
    }

    .pet-vaccinated-yes {
        background-color: #d6eaf8;
        color: #2980b9;
    }

    .pet-vaccinated-no {
        background-color: #fadbd8;
        color: #e74c3c;
    }

    /* UPDATED: Full width description */
    .pet-description-section {
        margin-top: 25px;
        padding-top: 25px;
        border-top: 1px solid #eee;
        grid-column: 1 / -1;
        /* Takes full width of grid */
        width: 100%;
    }

    .pet-description-text {
        line-height: 1.7;
        color: #555;
        font-size: 1.05rem;
        padding: 15px;
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    .pet-modal-footer {
        padding: 20px 30px;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: flex-end;
        background-color: #f9f9f9;
        border-radius: 0 0 16px 16px;
    }

    .pet-action-btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        border: none;
        font-size: 1rem;
        transition: all 0.3s;
    }

    .pet-adopt-btn {
        background-color: #3498db;
        color: white;
        margin-right: 10px;
    }

    .pet-adopt-btn:hover {
        background-color: #2980b9;
    }

    .pet-favorite-btn {
        background-color: #f8f9fa;
        color: #333;
        border: 1px solid #ddd;
    }

    .pet-favorite-btn:hover {
        background-color: #e9ecef;
    }

    .pet-detail-item i {
        margin-right: 8px;
        color: #3498db;
        width: 20px;
    }
</style>

<div class="pet-modal-overlay">
    <div class="pet-modal-details">
        <!-- Modal Header -->
        <div class="pet-modal-header">
            <h2 class="pet-modal-title">Pet Details</h2>
            <button class="pet-close-btn">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Modal Content -->
        <div class="pet-modal-content" id="petModalContent">
            <!-- Photo Section -->
            <div class="pet-modal-photo-container" id="petModalPhotoContainer">
                <img src="" alt="" class="pet-modal-photo" id="petModalPhoto">
            </div>

            <!-- Info Section -->
            <div class="pet-modal-info" id="petModalInfo">
                <!-- Pet Details Grid -->
                <div class="pet-details-grid" id="petDetailsGrid">
                    <!-- First Column -->
                    <div class="pet-detail-item" id="petNameItem">
                        <span class="pet-detail-label" id="petNameLabel"><i class="fas fa-paw"></i>Pet Name</span>
                        <div class="pet-detail-value" id="petNameValue"></div>
                    </div>

                    <div class="pet-detail-item" id="petTypeItem">
                        <span class="pet-detail-label" id="petTypeLabel"><i class="fas fa-dog"></i>Pet Type</span>
                        <div class="pet-detail-value" id="petTypeValue"></div>
                    </div>

                    <div class="pet-detail-item" id="petBreedItem">
                        <span class="pet-detail-label" id="petBreedLabel"><i class="fas fa-dna"></i>Breed</span>
                        <div class="pet-detail-value" id="petBreedValue"></div>
                    </div>

                    <div class="pet-detail-item" id="petAgeItem">
                        <span class="pet-detail-label" id="petAgeLabel"><i class="fas fa-birthday-cake"></i>Age</span>
                        <div class="pet-detail-value" id="petAgeValue"></div>
                    </div>

                    <!-- Second Column -->
                    <div class="pet-detail-item" id="petGenderItem">
                        <span class="pet-detail-label" id="petGenderLabel"><i class="fas fa-venus-mars"></i>Gender</span>
                        <div class="pet-detail-value" id="petGenderValue"></div>
                    </div>

                    <div class="pet-detail-item" id="petDateAddedItem">
                        <span class="pet-detail-label" id="petDateAddedLabel"><i class="fas fa-calendar-alt"></i>Date Added</span>
                        <div class="pet-detail-value" id="petDateAddedValue"></div>
                    </div>

                    <div class="pet-detail-item" id="petStatusItem">
                        <span class="pet-detail-label" id="petStatusLabel"><i class="fas fa-heartbeat"></i>Status</span>
                        <div class="pet-detail-value" id="petStatusValue"></div>
                    </div>

                    <div class="pet-detail-item" id="petVaccinatedItem">
                        <span class="pet-detail-label" id="petVaccinatedLabel"><i class="fas fa-syringe"></i>Vaccinated</span>
                        <div class="pet-detail-value" id="petVaccinatedValue"></div>
                    </div>

                    <!-- Full Width Description -->
                    <div class="pet-description-section" id="petDescriptionSection">
                        <span class="pet-detail-label" id="petDescriptionLabel"><i class="fas fa-file-alt"></i> Description</span>
                        <p class="pet-description-text" id="petDescriptionText"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>