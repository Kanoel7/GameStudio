<?php
include('partials/header.php');
$db = new Database();
$contact = new Contact($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if($contact->create($name,$email,$message)){
        header('Location: admin.php');
        exit;
    }else{
        echo 'Nepodarilo sa odoslať formulár';
    }
}
?>

<section class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="kyrylo-title mb-4">Vytvorenie správy v adminovi</h2>
            <div class="contact-form-container">
                <form id="contact" method="POST" class="p-4 mb-0">
                    <div class="mb-4">
                        <label for="name" class="form-label text-white mb-2">Vaše meno</label>
                        <input type="text" class="form-control bg-dark text-white" placeholder="Vaše meno" id="name" name="name" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label text-white mb-2">Váš email</label>
                        <input type="email" class="form-control bg-dark text-white" placeholder="Váš email" id="email" name="email" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="form-label text-white mb-2">Vaša správa</label>
                        <textarea class="form-control bg-dark text-white" placeholder="Vaša správa" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="register-btn text-white">Odoslať</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include('partials/footer.php');
?>