<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Paws Adoption Center - Find Your Forever Friend</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../Styles/LandingPage.css">
</head>

<body>
    <!-- Header -->
    <?php include '../Includes/User/Navbar.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h2>Find Your Perfect Furry Companion</h2>
            <p>Every pet deserves a loving home. Browse our available pets waiting for their forever families. Adoption saves lives.</p>
            <div class="hero-buttons">
                <a href="#pets" class="btn btn-primary">
                    <i class="fas fa-heart"></i> View Available Pets
                </a>
                <a href="#how-it-works" class="btn btn-secondary">
                    <i class="fas fa-question-circle"></i> Learn How to Adopt
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Pets Section -->
    <section class="featured-pets" id="pets">
        <div class="container">
            <div class="section-header">
                <h2>Meet Our Available Pets</h2>
                <p>These wonderful animals are waiting for their forever homes. Each adoption helps us save more animals in need.</p>
            </div>

            <div class="pets-grid">
                <!-- Pet Card 1 -->
                <div class="pet-card">
                    <span class="pet-badge badge-available">Available</span>
                    <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Golden Retriever" class="pet-image">
                    <div class="pet-info">
                        <div class="pet-header">
                            <div class="pet-name">Max</div>
                            <span class="pet-type">Dog</span>
                        </div>
                        <div class="pet-details">
                            <p><i class="fas fa-birthday-cake"></i> <strong>Age:</strong> 3 years</p>
                            <p><i class="fas fa-venus-mars"></i> <strong>Gender:</strong> Male</p>
                            <p><i class="fas fa-syringe"></i> <strong>Vaccinated:</strong> Yes</p>
                        </div>
                        <p class="pet-description">Max is a friendly and energetic Golden Retriever who loves playing fetch and going for long walks. He's great with kids and other dogs.</p>
                        <div class="pet-actions">
                            <button class="btn-small btn-view">
                                <i class="fas fa-info-circle"></i> View Details
                            </button>
                            <button class="btn-small btn-adopt adopt-btn" data-pet="Max">
                                <i class="fas fa-heart"></i> Adopt Me
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Pet Card 2 -->
                <div class="pet-card">
                    <span class="pet-badge badge-available">Available</span>
                    <img src="https://images.unsplash.com/photo-1513360371669-4adf3dd7dff8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Gray Cat" class="pet-image">
                    <div class="pet-info">
                        <div class="pet-header">
                            <div class="pet-name">Luna</div>
                            <span class="pet-type">Cat</span>
                        </div>
                        <div class="pet-details">
                            <p><i class="fas fa-birthday-cake"></i> <strong>Age:</strong> 2 years</p>
                            <p><i class="fas fa-venus-mars"></i> <strong>Gender:</strong> Female</p>
                            <p><i class="fas fa-syringe"></i> <strong>Vaccinated:</strong> Yes</p>
                        </div>
                        <p class="pet-description">Luna is a gentle and affectionate gray cat who enjoys cuddling and quiet afternoons. She's litter trained and gets along with other cats.</p>
                        <div class="pet-actions">
                            <button class="btn-small btn-view">
                                <i class="fas fa-info-circle"></i> View Details
                            </button>
                            <button class="btn-small btn-adopt adopt-btn" data-pet="Luna">
                                <i class="fas fa-heart"></i> Adopt Me
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Pet Card 3 -->
                <div class="pet-card">
                    <span class="pet-badge badge-adopted">Recently Adopted</span>
                    <img src="https://images.unsplash.com/photo-1583511655826-05700d52f4d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Beagle" class="pet-image">
                    <div class="pet-info">
                        <div class="pet-header">
                            <div class="pet-name">Buddy</div>
                            <span class="pet-type">Dog</span>
                        </div>
                        <div class="pet-details">
                            <p><i class="fas fa-birthday-cake"></i> <strong>Age:</strong> 4 years</p>
                            <p><i class="fas fa-venus-mars"></i> <strong>Gender:</strong> Male</p>
                            <p><i class="fas fa-syringe"></i> <strong>Vaccinated:</strong> Yes</p>
                        </div>
                        <p class="pet-description">Buddy is a friendly Beagle with a great sense of smell. He loves exploring and would make a great companion for an active family.</p>
                        <div class="pet-actions">
                            <button class="btn-small btn-view">
                                <i class="fas fa-info-circle"></i> View Details
                            </button>
                            <button class="btn-small btn-adopt" disabled>
                                <i class="fas fa-heart"></i> Adopted
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="view-all">
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-paw"></i> View All Available Pets
                </a>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="section-header">
                <h2>How Adoption Works</h2>
                <p>Our adoption process is simple and designed to ensure each pet finds the perfect forever home.</p>
            </div>

            <div class="steps-container">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Submit Inquiry</h3>
                    <p>Found a pet you love? Submit an adoption inquiry form. Tell us about your home, lifestyle, and why you'd be a great fit.</p>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Meet & Greet</h3>
                    <p>If your application is approved, we'll schedule a meet and greet so you can get to know the pet before making a decision.</p>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Welcome Home</h3>
                    <p>Complete the adoption paperwork, pay the adoption fee, and take your new family member home! We provide post-adoption support.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-header">
                <h2>Happy Families, Happy Pets</h2>
                <p>Read stories from adopters who found their perfect companions through Happy Paws.</p>
            </div>

            <div class="testimonials-container">
                <div class="testimonial">
                    <div class="testimonial-text">
                        "Adopting Max from Happy Paws was the best decision we ever made. The process was smooth, and the staff was incredibly helpful. Max has brought so much joy to our family!"
                    </div>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" alt="Sarah Johnson" class="author-avatar">
                        <div class="author-info">
                            <h4>Sarah Johnson</h4>
                            <p>Adopted Max in 2023</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial">
                    <div class="testimonial-text">
                        "As a first-time pet owner, I was nervous about adoption. The team at Happy Paws guided me through every step and helped me find Luna, the perfect cat for my lifestyle."
                    </div>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" alt="Michael Chen" class="author-avatar">
                        <div class="author-info">
                            <h4>Michael Chen</h4>
                            <p>Adopted Luna in 2023</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial">
                    <div class="testimonial-text">
                        "We've adopted two pets from Happy Paws over the years. Their commitment to matching pets with the right families is exceptional. Both of our pets have been perfect additions to our home."
                    </div>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" alt="Emma Williams" class="author-avatar">
                        <div class="author-info">
                            <h4>Emma Williams</h4>
                            <p>Adopted Coco & Simba</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Find Your New Best Friend?</h2>
            <p>Browse our available pets or learn more about the adoption process. Every adoption helps us save more animals.</p>
            <div class="hero-buttons">
                <a href="#pets" class="btn btn-primary" style="background-color: #48bb78; color: white;">
                    <i class="fas fa-heart"></i> View Available Pets
                </a>
                <a href="#how-it-works" class="btn btn-secondary" style="border-color: white; color: white;">
                    <i class="fas fa-question-circle"></i> Adoption Process
                </a>
            </div>
        </div>
    </section>

    <?php include '../Includes/User/Footer.php'; ?>

    <!-- Adoption Form Modal -->
    <div class="modal-overlay" id="adoptionModal">
        <div class="modal">
            <div class="modal-header">
                <h3>Adoption Inquiry for <span id="petName"></span></h3>
                <button class="close-modal" id="closeModal">&times;</button>
            </div>
            <form id="adoptionForm">
                <div class="form-group">
                    <label for="fullName">Full Name *</label>
                    <input type="text" id="fullName" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <input type="tel" id="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group">
                    <label for="address">Home Address</label>
                    <input type="text" id="address" placeholder="Enter your home address">
                </div>
                <div class="form-group">
                    <label for="homeType">Type of Home</label>
                    <select id="homeType">
                        <option value="">Select your home type</option>
                        <option value="house">House with Yard</option>
                        <option value="house_no_yard">House without Yard</option>
                        <option value="apartment">Apartment</option>
                        <option value="condo">Condo</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="experience">Previous Pet Experience</label>
                    <textarea id="experience" placeholder="Tell us about your experience with pets (if any)"></textarea>
                </div>
                <div class="form-group">
                    <label for="message">Why are you interested in adopting <span id="petName2"></span>?</label>
                    <textarea id="message" placeholder="Tell us why you'd be a good fit for this pet"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 16px; font-size: 1.1rem;">
                    <i class="fas fa-paper-plane"></i> Submit Adoption Inquiry
                </button>
                <p style="margin-top: 20px; font-size: 0.9rem; color: #718096; text-align: center;">
                    Note: This is a static demonstration. In a real system, this form would submit your inquiry to our adoption team.
                </p>
            </form>
        </div>
    </div>

    <script>
        // Static functionality for demonstration
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mainNav = document.getElementById('mainNav');

            mobileMenuBtn.addEventListener('click', function() {
                mainNav.classList.toggle('active');
                const icon = this.querySelector('i');
                if (mainNav.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });

            // Close mobile menu when clicking a link
            const navLinks = document.querySelectorAll('nav a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mainNav.classList.remove('active');
                    mobileMenuBtn.querySelector('i').classList.remove('fa-times');
                    mobileMenuBtn.querySelector('i').classList.add('fa-bars');
                });
            });

            // Adoption modal functionality
            const adoptButtons = document.querySelectorAll('.adopt-btn');
            const modal = document.getElementById('adoptionModal');
            const closeModal = document.getElementById('closeModal');
            const petNameSpan = document.getElementById('petName');
            const petNameSpan2 = document.getElementById('petName2');
            const adoptionForm = document.getElementById('adoptionForm');

            // Show modal when "Adopt Me" is clicked
            adoptButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const petName = this.getAttribute('data-pet');
                    petNameSpan.textContent = petName;
                    petNameSpan2.textContent = petName;
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

            // Handle form submission (just for demo)
            adoptionForm.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Thank you for your adoption inquiry! In a real system, this would be sent to our adoption team.\n\nForm submission disabled for this demonstration.');
                modal.classList.remove('active');
                // Reset form
                adoptionForm.reset();
            });

            // View Details button functionality
            const viewDetailButtons = document.querySelectorAll('.btn-view');
            viewDetailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const petCard = this.closest('.pet-card');
                    const petName = petCard.querySelector('.pet-name').textContent;
                    const petType = petCard.querySelector('.pet-type').textContent;

                    alert(`Details for ${petName} (${petType}):\n\nThis would show more detailed information about the pet in a real system.\n\nFeatures might include:\n• Full medical history\n• Behavioral notes\n• Adoption requirements\n• More photos\n• Care instructions`);
                });
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        // Close mobile menu if open
                        mainNav.classList.remove('active');
                        mobileMenuBtn.querySelector('i').classList.remove('fa-times');
                        mobileMenuBtn.querySelector('i').classList.add('fa-bars');

                        // Scroll to target
                        window.scrollTo({
                            top: targetElement.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Form validation simulation
            const formInputs = document.querySelectorAll('#adoptionForm input, #adoptionForm textarea, #adoptionForm select');
            formInputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.hasAttribute('required') && !this.value.trim()) {
                        this.style.borderColor = '#f56565';
                    } else {
                        this.style.borderColor = '#e2e8f0';
                    }
                });
            });

            // Newsletter subscription simulation
            const newsletterInput = document.querySelector('input[type="email"]');
            const subscribeBtn = document.querySelector('.footer-section .cta-button');

            subscribeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (newsletterInput.value && newsletterInput.value.includes('@')) {
                    alert('Thank you for subscribing to our newsletter! You will receive updates on new pets and adoption events.');
                    newsletterInput.value = '';
                } else {
                    alert('Please enter a valid email address to subscribe.');
                    newsletterInput.focus();
                }
            });

            // Pet card hover effects enhancement
            const petCards = document.querySelectorAll('.pet-card');
            petCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>

</html>