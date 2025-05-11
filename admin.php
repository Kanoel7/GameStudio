
<?php
include('partials/header.php');


$db = new Database();
$auth = new Authenticate($db);
$auth->requireLogin();

// Získanie role prihláseného používateľa
$userRole = $auth->getUserRole();
$userEmail = $_SESSION['email'];
$userName = $_SESSION['name'] ?? 'User';

// Kontakty
$contact = new Contact($db);

// Load contacts based on user role
if ($userRole == 0) {
    $contacts = $contact->index(); // Admin sees all contacts
} else {
    // Regular user sees only their own contacts
    $contacts = $contact->getByEmail($userEmail);
}

// Používatelia
$user = new User($db);
$users = $user->index();

// Job Applications
require_once '_inc/classes/JobApplication.php';
$jobApp = new JobApplication($db);

// Get applications based on user role
if ($userRole == 0) {
    // Admin sees all job applications
    $jobApplications = $jobApp->index();
} else {
    // Regular user sees only their own applications
    $jobApplications = $jobApp->getByEmail($userEmail);
}

// Vymazanie správy
if (isset($_GET['delete'])) {
    $contact->destroy($_GET['delete']);
    
    header("Location: admin.php");
    exit;
}
// Vymazanie používateľa
if ($userRole == 0) {
    $user = new User($db);
    $users = $user->index();
    
    if (isset($_GET['delete_user']) && $userRole == 0) {
        $user->destroy($_GET['delete_user']);
        header("Location: admin.php");
        exit;
    }
    
    // Delete job application
    if (isset($_GET['delete_application'])) {
        require_once '_inc/classes/JobApplication.php';
        $jobApp = new JobApplication($db);
        $jobApp->destroy($_GET['delete_application']);
        header("Location: admin.php");
        exit;
    }
    
    // Update job application status
    if (isset($_GET['application_id']) && isset($_GET['status'])) {
        require_once '_inc/classes/JobApplication.php';
        $jobApp = new JobApplication($db);
        $jobApp->updateStatus($_GET['application_id'], $_GET['status']);
        header("Location: admin.php");
        exit;
    }
}
?>


<section class="container mt-5 pt-5">
    <h1 class="kyrylo-title"><?= $userRole == 0 ? "Vítaj admin" : "Vítaj, " . htmlspecialchars($userName) ?></h1>

    <?php if($userRole == 0): // Admin interface ?>
        <!-- Admin view: Sekcia kontaktov -->
        <h2 class="section-title mb-4">Kontakty</h2>
        <div class="mb-4">
            <a href="contact-create.php" class="register-btn text-white text-decoration-none">Vytvoriť správu</a>
        </div>
        <div class="table-responsive">
            <table class="table table-dark table-hover" style="background: var(--dark-bg); border-radius: var(--border-radius-standard); overflow: hidden; box-shadow: var(--shadow-primary);">
            
            <thead>
                <tr style="background: var(--gradient-button);">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Meno</th>
                    <th class="px-4 py-3">Email</th>           
                    <th class="px-4 py-3">Správa</th>            
                    <th class="px-4 py-3">Delete</th>
                    <th class="px-4 py-3">Edit</th>
                    <th class="px-4 py-3">Show</th>
                </tr>
            </thead>
            <tbody>
            
            <?php foreach($contacts as $con): ?>
                <tr>
                    <td class="px-4 py-3"><?= htmlspecialchars($con['id']) ?></td>
                    <td class="px-4 py-3"><?= htmlspecialchars($con['name']) ?></td>
                    <td class="px-4 py-3"><?= htmlspecialchars($con['email']) ?></td>
                    <td class="px-4 py-3"><?= htmlspecialchars($con['message']) ?></td>
                    <td class="px-4 py-3"><a href="?delete=<?= $con['id'] ?>" class="btn-glow btn-pink-glow text-decoration-none px-3 py-2 mx-2" onclick="return confirm('Určite chcete vymazať túto správu?')">Delete</a></td>
                    <td class="px-4 py-3"><a href="contact-edit.php?id=<?= $con['id'] ?>" class="btn-glow btn-blue-glow text-decoration-none px-3 py-2 mx-2">Edit</a></td>
                    <td class="px-4 py-3"><a href="contact-show.php?id=<?= $con['id'] ?>" class="btn-glow btn-blue-glow text-decoration-none px-3 py-2 mx-2">Show</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    <?php else: // User interface ?>
        <!-- User view: Sekcia kontaktov -->
        <h2 class="section-title mb-4">My Messages</h2>
        <div class="mb-4">
            <a href="contact-create.php" class="register-btn text-white text-decoration-none">Send New Message</a>
        </div>
        <div class="table-responsive">
            <table class="table table-dark table-hover" style="background: var(--dark-bg); border-radius: var(--border-radius-standard); overflow: hidden; box-shadow: var(--shadow-primary);">
            
            <thead>
                <tr style="background: var(--gradient-button);">
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Message</th>            
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if(empty($contacts)): ?>
                <tr>
                    <td colspan="3" class="text-center py-4">You haven't sent any messages yet.</td>
                </tr>
            <?php else: ?>
                <?php foreach($contacts as $con): ?>
                    <tr>
                        <td class="px-4 py-3"><?= htmlspecialchars(date('d.m.Y', strtotime($con['created_at'] ?? 'now'))) ?></td>
                        <td class="px-4 py-3"><?= htmlspecialchars($con['message']) ?></td>
                        <td class="px-4 py-3">
                            <a href="?delete=<?= $con['id'] ?>" class="btn-glow btn-pink-glow text-decoration-none px-3 py-2 mx-2" onclick="return confirm('Are you sure you want to delete this message?')">Delete</a>
                            <a href="contact-show.php?id=<?= $con['id'] ?>" class="btn-glow btn-blue-glow text-decoration-none px-3 py-2 mx-2">Details</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
        </div>
    <?php endif; ?>
    
    <hr class="my-5">
    
    <!-- Sekcia používateľov (iba pre adminov) -->
    <?php if ($userRole == 0): // Admin sections ?>
        <h2 class="section-title mb-4">Používatelia</h2>
        <div class="mb-4">
            <a href="user-create.php" class="register-btn text-white text-decoration-none">Create User</a>
        </div>
        <div class="table-responsive">
            <table class="table table-dark table-hover" style="background: var(--dark-bg); border-radius: var(--border-radius-standard); overflow: hidden; box-shadow: var(--shadow-primary);">
                <thead>
                    <tr style="background: var(--gradient-button);">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Meno</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Delete</th>
                        <th class="px-4 py-3">Edit</th>
                        <th class="px-4 py-3">Show</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $u): ?>
                        <tr>
                            <td class="px-4 py-3"><?= htmlspecialchars($u['id']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($u['name']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($u['email']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($u['role']) ?></td>
                            <td class="px-4 py-3"><a href="?delete_user=<?= $u['id'] ?>" class="btn-glow btn-pink-glow text-decoration-none px-3 py-2 mx-2" onclick="return confirm('Určite chcete vymazať tohto používateľa?')">Delete</a></td>
                            <td class="px-4 py-3"><a href="user-edit.php?id=<?= $u['id'] ?>" class="btn-glow btn-blue-glow text-decoration-none px-3 py-2 mx-2">Edit</a></td>
                            <td class="px-4 py-3"><a href="user-show.php?id=<?= $u['id'] ?>" class="btn-glow btn-blue-glow text-decoration-none px-3 py-2 mx-2">Show</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <hr class="my-5">
        
        <!-- Job Applications Section - Admin View -->
        <h2 class="section-title mb-4">Job Applications</h2>
        <div class="table-responsive">
            <table class="table table-dark table-hover" style="background: var(--dark-bg); border-radius: var(--border-radius-standard); overflow: hidden; box-shadow: var(--shadow-primary);">
                <thead>
                    <tr style="background: var(--gradient-button);">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Position</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($jobApplications)): ?>
                        <tr>
                            <td colspan="8" class="text-center py-4">No job applications found</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($jobApplications as $app): ?>
                            <tr>
                                <td class="px-4 py-3"><?= htmlspecialchars($app['id']) ?></td>
                                <td class="px-4 py-3"><?= date('d.m.Y', strtotime($app['created_at'])) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($app['title']) ?> (<?= htmlspecialchars($app['department']) ?>)</td>
                                <td class="px-4 py-3"><?= htmlspecialchars($app['name']) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($app['email']) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($app['phone']) ?></td>
                                <td class="px-4 py-3">
                                    <span class="badge <?= ($app['status'] == 'pending') ? 'bg-warning' : (($app['status'] == 'accepted') ? 'bg-success' : (($app['status'] == 'rejected') ? 'bg-danger' : 'bg-info')) ?>">
                                        <?= ucfirst(htmlspecialchars($app['status'])) ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="dropdown" style="position: static;">
                                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?= $app['id'] ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="position: absolute; z-index: 1050;" aria-labelledby="dropdownMenuButton<?= $app['id'] ?>">
                                            <li><a class="dropdown-item" href="?application_id=<?= $app['id'] ?>&status=pending">Mark as Pending</a></li>
                                            <li><a class="dropdown-item" href="?application_id=<?= $app['id'] ?>&status=reviewed">Mark as Reviewed</a></li>
                                            <li><a class="dropdown-item" href="?application_id=<?= $app['id'] ?>&status=accepted">Mark as Accepted</a></li>
                                            <li><a class="dropdown-item" href="?application_id=<?= $app['id'] ?>&status=rejected">Mark as Rejected</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="?delete_application=<?= $app['id'] ?>" onclick="return confirm('Are you sure you want to delete this application?')">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php else: // User view for job applications ?>
        <!-- Job Applications Section - User View -->
        <h2 class="section-title mb-4">My Job Applications</h2>
        <div class="table-responsive">
            <table class="table table-dark table-hover" style="background: var(--dark-bg); border-radius: var(--border-radius-standard); overflow: hidden; box-shadow: var(--shadow-primary);">
                <thead>
                    <tr style="background: var(--gradient-button);">
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Position</th>
                        <th class="px-4 py-3">Department</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($jobApplications)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-4">You haven't applied for any positions yet.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($jobApplications as $app): ?>
                            <tr>
                                <td class="px-4 py-3"><?= date('d.m.Y', strtotime($app['created_at'])) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($app['title']) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($app['department']) ?></td>
                                <td class="px-4 py-3">
                                    <span class="badge <?= ($app['status'] == 'pending') ? 'bg-warning' : (($app['status'] == 'accepted') ? 'bg-success' : (($app['status'] == 'rejected') ? 'bg-danger' : 'bg-info')) ?>">
                                        <?= ucfirst(htmlspecialchars($app['status'])) ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>

<?php
include('partials/footer.php');
?>