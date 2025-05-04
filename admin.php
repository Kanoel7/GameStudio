
<?php
include('partials/header.php');

$db = new Database();
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
if (isset($_GET['delete_user'])) {
    $user->destroy($_GET['delete_user']);
    header("Location: admin.php");
    exit;
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
    
    <!-- Sekcia používateľov -->
    <h2 class="section-title mb-4">Používatelia</h2>
    <div class="mb-4">
        <a href="user-create.php" class="register-btn text-white text-decoration-none">Vytvoriť používateľa</a>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-hover" style="background: var(--dark-bg); border-radius: var(--border-radius-standard); overflow: hidden; box-shadow: var(--shadow-primary);">
            <thead>
                <tr style="background: var(--gradient-button);">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Meno</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Rola</th>
                    <th class="px-4 py-3">Delete</th>
                    <th class="px-4 py-3">Edit</th>
                    <th class="px-4 py-3">Show</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td class="px-4 py-3"><?= htmlspecialchars($user['id']) ?></td>
                        <td class="px-4 py-3"><?= htmlspecialchars($user['name']) ?></td>
                        <td class="px-4 py-3"><?= htmlspecialchars($user['email']) ?></td>
                        <td class="px-4 py-3"><?= $user['role'] == 0 ? 'Admin' : 'User' ?></td>
                        <td class="px-4 py-3"><a href="?deleteUser=<?= $user['id'] ?>" class="btn-glow btn-pink-glow text-decoration-none px-3 py-2 mx-2" onclick="return confirm('Určite chcete vymazať tohto používateľa?')">Delete</a></td>
                        <td class="px-4 py-3"><a href="user-edit.php?id=<?= $user['id'] ?>" class="btn-glow btn-blue-glow text-decoration-none px-3 py-2 mx-2">Edit</a></td>
                        <td class="px-4 py-3"><a href="user-show.php?id=<?= $user['id'] ?>" class="btn-glow btn-blue-glow text-decoration-none px-3 py-2 mx-2">Show</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<?php
include('partials/footer.php');
?>