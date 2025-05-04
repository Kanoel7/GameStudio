<?php
include('partials/header.php');

$db = new Database();
$contact = new Contact($db);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $contactData = $contact->show($id);
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        if($contact->update($id,$name,$email,$message)){
            header('Location: admin.php');
            exit;
        }else{
            echo 'Nepodarilo sa upraviť záznam';
        }
    }
}
?>

<section class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="kyrylo-title mb-4">Editovanie správy</h2>
            <div class="contact-form-container">
                <form id="contact" method="POST" class="p-4 mb-0">
                    <div class="mb-4">
                        <label for="name" class="form-label text-white mb-2">Vaše meno</label>
                        <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="<?php echo htmlspecialchars($contactData['name']);?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label text-white mb-2">Váš email</label>
                        <input type="email" class="form-control bg-dark text-white" id="email" name="email" value="<?php echo htmlspecialchars($contactData['email']);?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="form-label text-white mb-2">Vaša správa</label>
                        <textarea class="form-control bg-dark text-white" id="message" name="message" rows="5" required><?php echo htmlspecialchars($contactData['message']);?></textarea>
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