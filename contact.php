<?php 
    include 'partials/header.php'; 
?>
    <!-- Form -->
    <div class="container site-section">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <h2 class="kyrylo-title text-center mb-5">Contact</h2>
                <div class="contact-form-container">
                    <form id="contactForm" novalidate>
                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required>
                            <div class="invalid-feedback">
                                Please enter your name
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                            <div class="invalid-feedback">
                                Please enter a valid email
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="mb-4">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" required></textarea>
                            <div class="invalid-feedback">
                                Please enter your message
                            </div>
                        </div>

                        <!-- Privacy -->
                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="privacy" required>
                            <label class="form-check-label" for="privacy">
                                I agree to the processing of personal data
                            </label>
                            <div class="invalid-feedback">
                                You must agree to continue
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="register-btn w-100 text-white">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="js/contact.js"></script>

<?php 
    include 'partials/footer.php'; 
?>

    

