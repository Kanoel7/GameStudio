<?php
include('partials/header.php');
$db = new Database();
$contact = new Contact($db);

if(isset($_GET['id'])){
    $id =  $_GET['id'];
    $contactData = $contact->show($id);
    //print_r($contactData);
}
?>
<section class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="kyrylo-title mb-4">Detail správy</h2>
            <div class="contact-form-container">
                <div class="p-4 mb-0">
                    <div class="mb-4">
                        <label class="form-label text-white mb-2">Meno</label>
                        <p class="text-white"><?php echo htmlspecialchars($contactData['name'])?></p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-white mb-2">Email</label>
                        <p class="text-white"><?php echo htmlspecialchars($contactData['email'])?></p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-white mb-2">Správa</label>
                        <p class="text-white"><?php echo htmlspecialchars($contactData['message'])?></p>
                    </div>
                    <div class="text-center">
                        <a href="admin.php" class="register-btn text-white text-decoration-none">Naspäť do admin rozhrania</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include('partials/footer.php');
?>