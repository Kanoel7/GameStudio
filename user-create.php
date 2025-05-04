<?php
 include('partials/header.php');
 
 $db = new Database();
 $user = new User($db);
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $role = $_POST['role']; // tu príde 0 alebo 1
     $password = $_POST['password'];
 
     if ($user->create($name, $email, $role, $password)) {
         header("Location: admin.php");
         exit;
     } else {
         echo "<p style='color: red;'>Error creating user. Možno už existuje používateľ s týmto emailom.</p>";
     }
 }
 ?>
<section class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="kyrylo-title mb-4">Pridanie používateľa</h2>
            <div class="contact-form-container">
                <form id="user" method="POST" class="p-4 mb-0">
                    <div class="mb-4">
                        <label for="name" class="form-label text-white mb-2">Meno</label>
                        <input type="text" class="form-control bg-dark text-white" placeholder="Meno" id="name" name="name" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label text-white mb-2">Email</label>
                        <input type="email" class="form-control bg-dark text-white" placeholder="Email" id="email" name="email" required>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="form-label text-white mb-2">Rola</label>
                        <select id="role" name="role" class="form-control bg-dark text-white" required>
                            <option value="" disabled selected>Vyberte rolu</option>
                            <option value="0">Admin</option>
                            <option value="1">User</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label text-white mb-2">Heslo</label>
                        <input type="password" class="form-control bg-dark text-white" placeholder="Heslo" id="password" name="password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="register-btn text-white">Vytvoriť</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
 
 <?php
 include('partials/footer.php');
 ?>