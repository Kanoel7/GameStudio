<?php
 include('partials/header.php');
 
 $db = new Database();
 $user = new User($db);
 
 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $userData = $user->show($id);
 }
 ?>
 
 <section class="container mt-5 pt-5">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <h2 class="kyrylo-title mb-4">Detail používateľa</h2>
             <div class="contact-form-container">
                 <div class="p-4 mb-0">
                     <?php if ($userData): ?>
                         <div class="mb-4">
                             <label class="form-label text-white mb-2">Meno</label>
                             <p class="text-white"><?= htmlspecialchars($userData['name']) ?></p>
                         </div>
                         <div class="mb-4">
                             <label class="form-label text-white mb-2">Email</label>
                             <p class="text-white"><?= htmlspecialchars($userData['email']) ?></p>
                         </div>
                         <div class="mb-4">
                             <label class="form-label text-white mb-2">Rola</label>
                             <p class="text-white"><?= $userData['role'] == 0 ? 'Admin' : 'User' ?></p>
                         </div>
                         <div class="text-center">
                             <a href="admin.php" class="register-btn text-white text-decoration-none">Späť na zoznam používateľov</a>
                         </div>
                     <?php else: ?>
                         <div class="text-center">
                             <p class="text-white mb-4">Používateľ nebol nájdený.</p>
                             <a href="admin.php" class="register-btn text-white text-decoration-none">Späť na zoznam používateľov</a>
                         </div>
                     <?php endif; ?>
                 </div>
             </div>
         </div>
     </div>
 </section>
 
 <?php
 include('partials/footer.php');
 ?>