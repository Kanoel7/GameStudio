<?php
include 'partials/header.php';

// Database connection
require_once '_inc/autoload.php';
$database = new Database();
$pdo = $database->getConnection();

// Get job ID from URL parameter
$job_id = isset($_GET['job_id']) ? (int)$_GET['job_id'] : 0;
$job = null;

// Form submission handling
$errors = [];
$success = false;

// If job ID is provided, fetch job details
if ($job_id > 0) {
    $stmt = $pdo->prepare("SELECT * FROM jobs WHERE id = ? AND active = 1");
    $stmt->execute([$job_id]);
    $job = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$job) {
        // Job not found or not active
        $errors[] = "The selected job position is not available.";
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic validation
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $cover_letter = trim($_POST['cover_letter'] ?? '');
    $job_id = (int)($_POST['job_id'] ?? 0);
    
    // Validate fields
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    
    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    }
    
    if ($job_id <= 0) {
        $errors[] = "Please select a valid job position.";
    }
    
    // No resume upload handling - removed as requested
    
    // If no errors, insert into database
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO job_applications (job_id, name, email, phone, cover_letter, status, created_at) VALUES (?, ?, ?, ?, ?, 'pending', NOW())");
            $success = $stmt->execute([$job_id, $name, $email, $phone, $cover_letter]);
            
            if ($success) {
                // Clear form data after successful submission
                $name = $email = $phone = $cover_letter = '';
            } else {
                $errors[] = "Failed to submit application. Please try again.";
            }
        } catch (PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }
}

// Get list of all active jobs
$all_jobs = [];
$stmt = $pdo->query("SELECT * FROM jobs WHERE active = 1 ORDER BY department, title");
$all_jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Pre-select job if ID was provided
if ($job_id > 0) {
    foreach ($all_jobs as $job_option) {
        if ($job_option['id'] == $job_id) {
            $job = $job_option;
            break;
        }
    }
}
?>

<div class="site-section container mt-5">
    <h1 class="kyrylo-title mb-5">Apply for a Position</h1>
    
    <?php if ($success): ?>
        <div class="alert alert-success">
            <h4>Application Submitted Successfully!</h4>
            <p>Thank you for your interest in joining our team. We will review your application and contact you soon.</p>
            <p><a href="careers.php" class="btn btn-glow btn-pink-glow">Return to Careers</a></p>
        </div>
    <?php else: ?>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <h4>Please correct the following errors:</h4>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <form method="post" enctype="multipart/form-data" class="job-application-form">
            <div class="form-group">
                <label for="job_id">Position *</label>
                <select name="job_id" id="job_id" class="form-control" style="color: black;" required>
                    <option value="">-- Select a position --</option>
                    <?php foreach ($all_jobs as $job_option): ?>
                        <option value="<?php echo $job_option['id']; ?>" <?php echo (isset($job_id) && $job_id == $job_option['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($job_option['title']) . ' (' . htmlspecialchars($job_option['department']) . ')'; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="name">Full Name *</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone *</label>
                <input type="tel" name="phone" id="phone" class="form-control" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>" required>
            </div>
            
            <!-- Resume upload field removed as requested -->
            
            <div class="form-group">
                <label for="cover_letter">Cover Letter</label>
                <textarea name="cover_letter" id="cover_letter" class="form-control" rows="5"><?php echo isset($cover_letter) ? htmlspecialchars($cover_letter) : ''; ?></textarea>
                <small class="text-muted">Optional: Tell us why you're interested in this position and why you'd be a good fit.</small>
            </div>
            
            <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-glow btn-pink-glow">Submit Application</button>
                <a href="careers.php" class="btn btn-outline-secondary ml-2">Cancel</a>
            </div>
        </form>
    <?php endif; ?>
</div>

<?php include 'partials/footer.php'; ?>
