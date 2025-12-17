<style>
    /* REQUEST DETAILS MODAL OVERLAY */
    .details-modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    /* DETAILS MODAL */
    .details-modal {
        width: 90%;
        max-width: 800px;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        animation: pop 0.3s ease;
        max-height: 90vh;
        display: flex;
        flex-direction: column;
    }

    /* HEADER */
    .details-modal-header {
        background: #f8f9fa;
        padding: 24px;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .details-modal-header h2 {
        margin: 0;
        color: #2c3e50;
        font-size: 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .ref-number {
        background: #3498db;
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    .status-badge {
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .status-approved {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .status-rejected {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* BODY */
    .details-modal-body {
        padding: 24px;
        flex: 1;
        overflow-y: auto;
    }

    /* SECTIONS */
    .details-section {
        margin-bottom: 32px;
        padding-bottom: 24px;
        border-bottom: 1px solid #eee;
    }

    .details-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .section-title {
        color: #2c3e50;
        font-size: 18px;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #3498db;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title i {
        color: #3498db;
    }

    /* GRID LAYOUT */
    .details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .detail-item {
        margin-bottom: 16px;
    }

    .detail-label {
        display: block;
        font-size: 14px;
        color: #7f8c8d;
        margin-bottom: 6px;
        font-weight: 500;
    }

    .detail-value {
        font-size: 16px;
        color: #2c3e50;
        font-weight: 500;
        word-break: break-word;
    }

    /* PET INFO CARD */
    .pet-card {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-top: 16px;
        border: 1px solid #e9ecef;
    }

    .pet-photo-container {
        width: 120px;
        height: 120px;
        border-radius: 10px;
        overflow: hidden;
        margin-right: 20px;
        float: left;
        border: 3px solid #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .pet-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .pet-info {
        overflow: hidden;
    }

    .pet-name {
        font-size: 22px;
        color: #2c3e50;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .pet-meta {
        display: flex;
        gap: 20px;
        margin-bottom: 12px;
    }

    .pet-meta-item {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #7f8c8d;
        font-size: 14px;
    }

    /* MESSAGE SECTIONS */
    .message-section {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        margin-top: 8px;
        border-left: 4px solid #3498db;
    }

    .message-content {
        color: #2c3e50;
        line-height: 1.6;
        white-space: pre-wrap;
        margin: 0;
        font-size: 15px;
    }

    /* CONTACT INFO */
    .contact-info {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #2c3e50;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .contact-info:hover {
        color: #3498db;
    }

    .contact-info i {
        width: 20px;
        color: #7f8c8d;
    }

    /* FOOTER */
    .details-modal-footer {
        padding: 20px 24px;
        background: #f8f9fa;
        border-top: 1px solid #dee2e6;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    /* BUTTONS */
    .btn-close {
        background: #6c757d;
        color: #fff;
        border: none;
        padding: 10px 24px;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.2s ease;
        font-weight: 500;
    }

    .btn-close:hover {
        background: #5a6268;
    }

    .btn-action {
        padding: 10px 24px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .btn-reject {
        background: #dc3545;
        color: white;
    }

    .btn-reject:hover {
        background: #c82333;
    }

    .btn-approve {
        background: #28a745;
        color: white;
    }

    .btn-approve:hover {
        background: #218838;
    }

    /* ANIMATION */
    @keyframes pop {
        from {
            transform: scale(0.9);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .details-modal {
            width: 95%;
            max-height: 95vh;
        }

        .details-modal-header {
            flex-direction: column;
            gap: 12px;
            align-items: flex-start;
        }

        .details-modal-footer {
            flex-wrap: wrap;
        }

        .pet-photo-container {
            float: none;
            margin: 0 auto 16px;
            display: block;
        }

        .pet-meta {
            flex-direction: column;
            gap: 8px;
        }

        .details-grid {
            grid-template-columns: 1fr;
        }
    }

    /* SCROLLBAR */
    .details-modal-body::-webkit-scrollbar {
        width: 6px;
    }

    .details-modal-body::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .details-modal-body::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 3px;
    }

    .details-modal-body::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
</style>

<!-- REQUEST DETAILS MODAL -->
<div class="details-modal-overlay" id="requestDetailsModal">
    <div class="details-modal">
        <div class="details-modal-header">
            <div>
                <h2>
                    <i class="fas fa-file-alt"></i>
                    Adoption Request Details
                    <span class="ref-number" id="detailsRefNumber"></span>
                </h2>
                <div style="margin-top: 8px;">
                    <span class="status-badge status-pending" id="detailsStatus"></span>
                    <span style="color: #7f8c8d; margin-left: 12px; font-size: 14px;">Submitted: <span id="detailsDate"></span></span>
                </div>
            </div>
            <button type="button" class="btn-view-close btn-close">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="details-modal-body">
            <!-- APPLICANT INFORMATION -->
            <div class="details-section">
                <h3 class="section-title">
                    <i class="fas fa-user"></i>
                    Applicant Information
                </h3>
                <div class="details-grid">
                    <div class="detail-item">
                        <span class="detail-label">Full Name</span>
                        <p class="detail-value" id="detailsFullName"></p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">City</span>
                        <p class="detail-value" id="detailsCity"></p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Email</span>
                        <p class="detail-value contact-info" id="detailsEmail">
                            <i class="fas fa-envelope"></i>
                        </p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Contact Number</span>
                        <p class="detail-value contact-info" id="detailsContact">
                            <i class="fas fa-phone"></i>
                        </p>
                    </div>
                </div>
            </div>

            <!-- PET INFORMATION -->
            <div class="details-section">
                <h3 class="section-title">
                    <i class="fas fa-paw"></i>
                    Pet Information
                </h3>
                <div class="pet-card">
                    <div class="pet-photo-container">
                        <img
                            alt="Titeng burat23"
                            class="pet-photo"
                            id="detailsPetPhoto">
                    </div>
                    <div class="pet-info">
                        <h3 class="pet-name" id="detailsPetName"></h3>
                        <div class="pet-meta">
                            <span class="pet-meta-item">
                                <i class="fas fa-dog"></i>
                                <span id="detailsPetType"></span>
                            </span>
                            <span class="pet-meta-item">
                                <i class="fas fa-birthday-cake"></i>
                                <span id="detailsPetAge"></span>
                            </span>
                            <span class="pet-meta-item">
                                <i class="fas fa-dna"></i>
                                <span id="detailsPetBreed"></span>
                            </span>
                        </div>
                        <input type="hidden" id="detailsPetId" value="5">
                    </div>
                </div>
            </div>

            <!-- PET EXPERIENCE -->
            <div class="details-section">
                <h3 class="section-title">
                    <i class="fas fa-graduation-cap"></i>
                    Pet Experience
                </h3>
                <div class="message-section">
                    <p class="message-content" id="detailsExperience"></p>
                </div>
            </div>

            <!-- MESSAGE -->
            <div class="details-section">
                <h3 class="section-title">
                    <i class="fas fa-comment"></i>
                    Applicant's Message
                </h3>
                <div class="message-section">
                    <p class="message-content" id="detailsMessage"></p>
                </div>
            </div>
        </div>
    </div>
</div>