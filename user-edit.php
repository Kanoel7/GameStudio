<?php
 include('partials/header.php');
 
 $db = new Database();
 $user = new User($db);
 
 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $userData = $user->show($id);
 
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $name = $_POST['name'];
         $email = $_POST['email'];
         $role = $_POST['role'];
 
         if ($user->edit($id, $name, $email, $role)) {
             header("Location: admin.php");
             exit;
         } else {
             echo "<p style='color: red;'>Error editing user. Možno už existuje používateľ s týmto emailom.</p>";
         }
     }
 }
 ?>
 
<section class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="kyrylo-title mb-4">Upraviť používateľa</h2>
            <div class="contact-form-container">
                <form id="user" method="POST" class="p-4 mb-0">
                    <div class="mb-4">
                        <label for="name" class="form-label text-white mb-2">Meno</label>
                        <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="<?= htmlspecialchars($userData['name']) ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label text-white mb-2">Email</label>
                        <input type="email" class="form-control bg-dark text-white" id="email" name="email" value="<?= htmlspecialchars($userData['email']) ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="form-label text-white mb-2">Rola</label>
                        <select id="role" name="role" class="form-control bg-dark text-white" required>
                            <option value="0" <?= $userData['role'] == 0 ? 'selected' : '' ?>>Admin</option>
                            <option value="1" <?= $userData['role'] == 1 ? 'selected' : '' ?>>User</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="register-btn text-white">Uložiť zmeny</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
 
 <?php
 include('partials/footer.php');
 ?>