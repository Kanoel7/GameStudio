
<?php
include('partials/header.php');


$db = new Database();
$auth = new Authenticate($db);
$auth->requireLogin();

// Získanie role prihláseného používateľa
$userRole = $auth->getUserRole();
// Kontakty
$contact = new Contact($db);
$contacts = $contact->index();

// Používatelia
$user = new User($db);
$users = $user->index();

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
}
?>


<section class="container mt-5 pt-5">
    <h1 class="kyrylo-title">Vítaj admin</h1>

    <!-- Sekcia kontaktov -->
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
    
    <hr class="my-5">
    
    <!-- Sekcia používateľov (iba pre adminov) -->
    <?php if ($userRole == 0): ?>
        <h2>Používatelia</h2>
        <a href="user-create.php" class="button">Create User</a>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Meno</th>
                <th>Email</th>
                <th>Role</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Show</th>
            </tr>
            <?php foreach($users as $u): ?>
                <tr>
                    <td><?= htmlspecialchars($u['id']) ?></td>
                    <td><?= htmlspecialchars($u['name']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td><?= htmlspecialchars($u['role']) ?></td>
                    <td><a href="?delete_user=<?= $u['id'] ?>" onclick="return confirm('Určite chcete vymazať tohto používateľa?')">Delete</a></td>
                    <td><a href="user-edit.php?id=<?= $u['id'] ?>">Edit</a></td>
                    <td><a href="user-show.php?id=<?= $u['id'] ?>">Show</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</section>

<?php
include('partials/footer.php');
?>