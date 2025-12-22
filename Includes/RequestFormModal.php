<link rel="stylesheet" href="../Styles/RequestFormModal.css">

<div class="modal-overlay" id="adoptionModal">
    <div class="modal">
        <div class="modal-header">
            <h3>Adoption Inquiry for <span id="petName"></span></h3>
            <button class="close-modal" id="closeModal">&times;</button>
        </div>

        <form id="adoptionForm" method="POST" action="../Controllers/action_request.php">
            <input type="hidden" name="pet_id" id="petId">

            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">First Name *</label>
                    <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required>
                </div>

                <div class="form-group">
                    <label for="last">Last Name *</label>
                    <input type="text" id="last" name="lastName" placeholder="Enter your last name" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="homeCity">Home City</label>
                <input type="text" id="homeCity" name="homeCity" placeholder="Enter your home city">
            </div>

            <div class="form-group">
                <label for="contact">Phone Number *</label>
                <input type="tel" id="contact" name="contact" placeholder="Enter your phone number" required>
            </div>

            <div class="form-group">
                <label for="petExperience">Previous Pet Experience</label>
                <textarea id="petExperience" name="petExperience" placeholder="Tell us about your experience with pets (if any)"></textarea>
            </div>

            <div class="form-group">
                <label for="message">Additional Message</label>
                <textarea id="message" name="message" placeholder="Any additional information or questions"></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" name="submit" class="btn btn-submit">Submit Adoption Inquiry</button>
                <button type="button" class="btn btn-cancel" id="btn-cancel">Cancel</button>
            </div>
        </form>
    </div>
</div>