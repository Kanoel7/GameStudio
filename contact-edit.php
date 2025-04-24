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
    <h1>Editovanie správy</h1>
    <form id="contact" method="POST">
        <input type="text" id ="name" name="name" value="<?php echo $contactData['name'];?>" required><br>
        <input type="email" id="email" name="email" value="<?php echo $contactData['email'];?>"required><br>
        <textarea id="message" name="message" ><?php echo $contactData['message'];?></textarea><br>
        <input type="submit" value="Odoslať">
    </form>
</section>

<?php
include('partials/footer.php');
?>