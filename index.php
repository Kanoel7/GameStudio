<?php 
    include 'partials/header.php'; 
?>

    <!-- Main screen -->
    <section class="main-bg-section">
        <div class="main-bg-image"></div>
        <div class="container">
            <div class="main-bg-content">
                <h1 class="main-title">Gaming Studio</h1>
                <p class="main-subtitle">More than innovations</p>
            </div>
        </div>
    </section>

    <!-- Disciplines section -->
    <div class="container site-section">
        <h2 class="kyrylo-title">Main Disciplines</h2>
        <div class="row">
            <!-- Engineering -->
            <div class="col-lg-6 my-4">
                <div class="kyrylo-card" card-color="pink">
                    <img src="img/engineering.jpg" alt="Engineering" class="card-image">
                    <h3>Engineering</h3>
                    <p>Game engineers are responsible for writing and refining codes, developing game engines,
                        and designing resources that help realise the visions of the designers and the artists.
                        They improve or embed advanced technologies such as physics engines, artificial intelligence,
                        and networking systems, troubleshoot numerous high-level technical issues and ensure cross-platform functionality.</p>
                         <!-- kreatívny bod    Learn More-->
                    <button class="btn-glow btn-pink-glow" onclick="window.location.href='gallery.html'">Learn More</button>
                </div>
            </div>
            <!-- Design -->
            <div class="col-lg-6 my-4">
                <div class="kyrylo-card" card-color="pink">
                    <img src="img/design.jpg" alt="Design" class="card-image">
                    <h3>Design</h3>
                    <p>The professionals that develop the game engagement are referred to as game designers.
                        They create levels or goals that are difficult and entertaining for players, create captivating plotlines, and design the basic rules that govern a game.
                        To ensure that games are fun, fair, and interesting, this job requires a delicate balance between creativity and strategy; it cannot be undermined.
                        Designers coordinate with other members of the team in an attempt to enhance ideas and integrate outcomes of game testing.</p>
                    <button class="btn-glow btn-pink-glow" onclick="window.location.href='gallery.html'">Learn More</button>
                </div>
            </div>
            <!-- Development -->
            <div class="col-lg-6 my-4">
                <div class="kyrylo-card" card-color="pink">
                    <img src="img/development.jpg" alt="Development" class="card-image">
                    <h3>Development</h3>
                    <p>In the case of designing games, multiple fields come into play.
                        Game designers are responsible for the whole development cycle of the game from conceptualization to production level.
                        They can code, merge audiovisuals, fix bugs, and manage overall performance of the game.
                        Mostly, developers are organized into teams to use the skills of engineers, designers, and even artists, to produce an interesting game.</p>
                    <button class="btn-glow btn-pink-glow" onclick="window.location.href='gallery.html'">Learn More</button>
                </div>
            </div>
            <!-- Art -->
            <div class="col-lg-6 my-4">
                <div class="kyrylo-card" card-color="pink">
                    <img src="img/art.jpg" alt="Art" class="card-image">
                    <h3>Art</h3>
                    <p>Game artists are the ones who to actualize the game's art flashing on the screen.
                        These include 3D models, props, environments, and characters that convey the look and feel of a game.
                        The industry also demands knowledge of visual aesthetics: colors, lighting, composition as well as 3D modelling, texturing and rigging.
                        Game art is subject to technical restrictions and the game and its design.</p>
                    <button class="btn-glow btn-pink-glow" onclick="window.location.href='gallery.html'">Learn More</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us section -->
    <div class="container site-section">
        <h2 class="section-title">Why Choose Us</h2>
        <p class="text-center mb-5">We combine cutting-edge technology with compelling storytelling to create unforgettable gaming experiences.</p>
        
        <div class="row">
            <!-- Innovation -->
            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div class="feature-number">01</div>
                    <h3>Innovation</h3>
                    <p>Pushing boundaries with the latest technologies and game mechanics</p>
                </div>
            </div>
            
            <!-- Creativity -->
            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div class="feature-number">02</div>
                    <h3>Creativity</h3>
                    <p>Crafting unique worlds and stories that capture players' imagination</p>
                </div>
            </div>
            
            <!-- Quality -->
            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div class="feature-number">03</div>
                    <h3>Quality</h3>
                    <p>Delivering polished experiences with attention to every detail</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row justify-content-between ms-5">
                <div class="col-lg-4 ">
                    <h5 class="text-white-50">Games</h5>
                    <nav class="d-flex flex-column gap-2">
                        <a href="#" class="nav-link text-white-50">Our Games</a>
                        <a href="#" class="nav-link text-white-50">Upcoming Releases</a>
                        <a href="#" class="nav-link text-white-50">Game Updates</a>
                        <a href="#" class="nav-link text-white-50">Community Hub</a>
                    </nav>
                </div>
                <div class="col-lg-4">
                    <h5 class="text-white-50">Company</h5>
                    <nav class="d-flex flex-column gap-2">
                        <a href="about.html" class="nav-link text-white-50">About Us</a>
                        <a href="careers.html" class="nav-link text-white-50">Careers</a>
                        <a href="#" class="nav-link text-white-50">Press Kit</a>
                        <a href="#" class="nav-link text-white-50">Investors</a>
                    </nav>
                </div>
                <div class="col-lg-4">
                    <h5 class="text-white-50">Support</h5>
                    <nav class="d-flex flex-column gap-2">
                        <a href="contact.html" class="nav-link text-white-50">Contact Us</a>
                        <a href="#" class="nav-link text-white-50">Player Support</a>
                        <a href="#" class="nav-link text-white-50">Bug Reports</a>
                        <a href="#" class="nav-link text-white-50">Privacy Policy</a>
                    </nav>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <p class="text-center text-white-50 mb-0">© 2025 Gaming Studio. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>