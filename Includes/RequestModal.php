<style>
    /* COMMON OVERLAY */
    .approved-modal-overlay,
    .not-approved-modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        display: none;
        align-items: center;
        justify-content: center;
    }

    /* COMMON MODAL */
    .approved-modal,
    .not-approved-modal {
        width: 420px;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        animation: pop 0.3s ease;
    }

    /* HEADER */
    .approved-modal-header,
    .not-approved-modal-header {
        text-align: center;
        padding: 24px;
    }

    .approved-modal-header {
        background: #e9f9f0;
    }

    .not-approved-modal-header {
        background: #fdecea;
    }

    .status-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        font-size: 26px;
        font-weight: bold;
        color: #fff;
        margin: 0 auto 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .status-icon.approved {
        background: #28a745;
    }

    .status-icon.rejected {
        background: #dc3545;
    }

    /* BODY */
    .approved-modal-body,
    .not-approved-modal-body {
        padding: 20px 24px;
        line-height: 1.6;
        color: #333;
    }

    .email-box {
        background: #f5f5f5;
        border-left: 4px solid #28a745;
        padding: 10px;
        margin: 12px 0;
    }

    .rejected-box {
        border-left-color: #dc3545;
    }

    .note {
        font-size: 14px;
        color: #555;
    }

    .form-group {
        margin-top: 12px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 6px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 8px 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .store-hours {
        font-size: 12px;
        color: #666;
        margin-top: 4px;
    }

    /* FOOTER */
    .approved-modal-footer,
    .not-approved-modal-footer {
        padding: 16px;
        text-align: right;
    }

    /* COMMON BUTTON STYLE */
    .btn-close,
    .btn-submit {
        background: #28a745;
        color: #fff;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    /* SUBMIT BUTTON (PRIMARY) */
    .btn-submit {
        background: #28a745;
    }

    .btn-submit:hover {
        background: #218838;
    }

    /* CLOSE BUTTON (SECONDARY) */
    .btn-close {
        background: #6c757d;
    }

    .btn-close:hover {
        background: #5a6268;
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
</style>

<div class="approved-modal-overlay" id="approvedModal">
    <div class="approved-modal">
        <div class="approved-modal-header">
            <span class="status-icon approved">✔</span>
            <h2>Request Approved</h2>
        </div>

        <form method="POST" action="../Controllers/action_request.php">
            <div class="approved-modal-body">
                <input type="hidden" name="request_id" id="requestId">
                <input type="hidden" name="pet_id" id="petId">
                <input type="hidden" name="ref_number" id="refNumber">
                <input type="hidden" name="fullName" id="fullName">

                <p>Hello,</p>
                <p>
                    We are happy to inform you that your <strong>pet adoption request</strong>
                    has been <strong>approved</strong>.
                </p>

                <div class="email-box">
                    <p><strong>Notification sent to:</strong></p>
                    <p id="email"></p>
                    <input type="hidden" name="email" id="emailValue">
                </div>

                <!-- SELECTED PET -->
                <div class="form-group">
                    <label>Selected Pet</label>
                    <input type="text" name="petName" id="pet-name" readonly>
                </div>

                <!-- LOCATION -->
                <div class="form-group">
                    <label>Adoption Center Location</label>
                    <input type="text" value="Happy Paws Adoption Center" readonly>
                </div>

                <!-- TIME -->
                <div class="form-group">
                    <div class="store-hours">
                        Store hours: 9:00 AM – 5:00 PM (Monday to Saturday)
                    </div>
                </div>
            </div>

            <div class="approved-modal-footer">
                <button type="button" class="btn-close btn-approved-close">Close</button>
                <button type="submit" name="approve-request" class="btn-submit btn-approved-submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- ===== NOT APPROVED MODAL ===== -->
<div class="not-approved-modal-overlay" id="rejectedModal">
    <div class="not-approved-modal">
        <div class="not-approved-modal-header">
            <span class="status-icon rejected">✖</span>
            <h2>Request Not Approved</h2>
        </div>

        <form method="POST" action="../Controllers/action_request.php">
            <input type="hidden" name="request_id" id="rejectedrequestId">
            <input type="hidden" name="petName" id="rejectedpet-name">
            <input type="hidden" name="fullName" id="rejectedfullName">

            <div class="not-approved-modal-body">
                <p>Hello,</p>
                <p>
                    Thank you for your interest in adopting a pet. Unfortunately,
                    your <strong>adoption request</strong> was <strong>not approved</strong>
                    at this time.
                </p>

                <div class="email-box rejected-box">
                    <p><strong>Email notification:</strong></p>
                    <p id="rejectedEmail"></p>
                    <input type="hidden" name="email" id="rejectedemailValue">
                </div>

                <p class="note">
                    You may reapply in the future or contact us for more information.
                </p>
            </div>

            <div class="approved-modal-footer">
                <button type="button" class="btn-close btn-not-approved-close">Close</button>
                <button type="submit" name="reject-request" class="btn-submit btn-not-approved-submit">Submit</button>
            </div>
        </form>
    </div>
</div>