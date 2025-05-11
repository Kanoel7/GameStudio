<?php 
    include 'partials/header.php'; 
    
    // Database connection
    require_once '_inc/autoload.php';
    $database = new Database();
    $pdo = $database->getConnection();
    
    // Get all active job positions
    $stmt = $pdo->query("SELECT * FROM jobs WHERE active = 1 ORDER BY department, title");
    $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    
    <div class="site-section container mt-5">
        <h1 class="kyrylo-title mb-5">Current Openings</h1>
        
        <?php if (empty($jobs)): ?>
            <div class="alert alert-info">
                <p>There are currently no open positions. Please check back later.</p>
            </div>
        <?php else: ?>
            <?php foreach ($jobs as $job): ?>
                <div class="job-card">
                    <div>
                        <h3 class="job-title"><?php echo htmlspecialchars($job['title']); ?></h3>
                        <div class="job-department"><?php echo htmlspecialchars($job['department']); ?></div>
                    </div>
                    <div class="job-meta">
                        <span class="job-type"><?php echo htmlspecialchars($job['location']); ?></span>
                        <span class="job-type"><?php echo htmlspecialchars($job['type']); ?></span>
                        <button class="btn-glow btn-pink-glow" onclick="window.location.href='job_application.php?job_id=<?php echo $job['id']; ?>'">Apply Now</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

<?php 
    include 'partials/footer.php'; 
?>