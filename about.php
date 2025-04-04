<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Gaming Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="gaming-studio-brand" href="index.html">Gaming Studio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="careers.html">Careers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.html">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.html">About Us</a>
                    </li>
                </ul>
                <button class="register-btn text-white" onclick="window.location.href='contact.html'">Contact Us</button>
            </div>
        </div>
    </nav>

    <!-- About Section -->
    <div class="site-section">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="gradient-title text-center mb-5">About Our Studio</h1>
                    
                    <!-- Studio Description -->
                    <div class="about-content">
                        <div class="kyrylo-card mb-5" card-color="pink">
                            <h2>Who We Are</h2>
                            <p>We are a passionate team of game developers, artists, and storytellers dedicated to creating immersive gaming experiences. Founded in 2020, our studio has quickly become known for innovative gameplay mechanics and stunning visual design.</p>
                        </div>


                        <!-- Our Mission -->
                        <div class="kyrylo-card mb-5" card-color="pink">
                            <h2>Our Mission</h2>
                            <p>Our mission is to push the boundaries of gaming by combining cutting-edge technology with compelling storytelling. We believe in creating games that not only entertain but also inspire and challenge players.</p>
                        </div>

                        <!-- Team Section -->
                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <div class="kyrylo-card h-100" card-color="pink">
                                    <img src="img/developteam.jpg" alt="Development Team" class="card-image mb-3">
                                    <h3>Development Team</h3>
                                    <p>Our talented developers work with the latest technologies and game engines to create seamless gaming experiences.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="kyrylo-card h-100" card-color="pink">
                                    <img src="img/creativeteam.jpg" alt="Creative Team" class="card-image mb-3">
                                    <h3>Creative Team</h3>
                                    <p>Our artists and designers bring worlds to life with stunning visuals and immersive environments.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Technologies -->
                        <div class="kyrylo-card mb-5" card-color="pink">
                            <h2>Our Technologies</h2>
                            <p>We utilize industry-leading technologies and tools:</p>
                            <ul class="tech-list">
                                <li>Unreal Engine 5</li>
                                <li>Unity 3D</li>
                                <li>Custom Game Engines</li>
                                <li>Advanced AI Systems</li>
                                <li>VR/AR Development Tools</li>
                            </ul>
                        </div>
                    </div>
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
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
