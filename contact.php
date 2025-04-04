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

    <footer>
        <div class="container">
            <div class="row">
                <!-- About -->
                <div class="col-lg-3 col-md-6">
                    <a class="text-decoration-none footer-title footer-links fs-4" href="about.html">About Us</a>
                    <ul class="footer-links">
                        <li><a href="about.html">History</a></li>
                        <li><a href="about.html">Team</a></li>
                        <li><a href="about.html">Our Mission</a></li>
                    </ul>
                </div>

                <!-- Career -->
                <div class="col-lg-3 col-md-6">
                    <a class="text-decoration-none footer-title footer-links fs-4" href="careers.html">Career</a>
                    <ul class="footer-links">
                        <li><a href="careers.html">Jobs</a></li>
                        <li><a href="careers.html">Internships</a></li>
                        <li><a href="careers.html">Open Vacancies</a></li>
                    </ul>
                </div>

                <!-- Contacts -->
                <div class="col-lg-3 col-md-6">
                    <a class="text-decoration-none footer-title footer-links fs-4" href="contact.html">Contacts</a>
                    <ul class="footer-links">
                        <li><a href="contact.html">Email</a></li>
                        <li><a href="contact.html">Phone</a></li>
                        <li><a href="contact.html">Address</a></li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div class="col-lg-3 col-md-6">
                    <a class="text-decoration-none footer-title footer-links fs-4" href="about.html">Social Media</a>
                    <ul class="footer-links">
                        <li><a href="about.html">Twitter</a></li>
                        <li><a href="about.html">LinkedIn</a></li>
                        <li><a href="about.html">Instagram</a></li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="copyright">
                <p>&copy; 2024 Gaming Studio. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/contact.js"></script>
</body>
</html>
