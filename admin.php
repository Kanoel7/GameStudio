
<?php
include('partials/header.php');



$db = new Database();
$contact = new Contact($db);
$contacts = $contact->index();



if (isset($_GET['delete'])) {
    $contact->destroy($_GET['delete']);
    
    header("Location: admin.php");
    exit;
}

?>


<section class="container mt-5 pt-5">
    <h1 class="kyrylo-title">Vítaj admin</h1>

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
                <th class="px-4 py-3">Sprava</th>
                <th class="px-4 py-3">Akcie</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($contacts as $con){
             echo '<tr>';
            echo '<td class="px-4 py-3">'.$con['id'].'</td>';
            echo '<td class="px-4 py-3">'.$con['name'].'</td>';
            echo '<td class="px-4 py-3">'.$con['email'].'</td>';
            echo '<td class="px-4 py-3">'.substr($con['message'], 0, 50).(strlen($con['message']) > 50 ? '...' : '').'</td>';
            echo '<td class="px-4 py-3">';
            echo '<a href="contact-show.php?id='.$con['id'].'" class="btn-glow btn-blue-glow text-decoration-none px-3 py-2 mx-2">Zobraziť</a>';
            echo '<a href="contact-edit.php?id='.$con['id'].'" class="btn-glow btn-blue-glow text-decoration-none px-3 py-2 mx-2">Editovať</a>';
            echo '<a href="?delete='.$con['id'].'" class="btn-glow btn-pink-glow text-decoration-none px-3 py-2 mx-2" onclick="return confirm(\'Určite chcete vymazať túto správu?\');">Vymazať</a>';
            echo '</td>';
            echo '</tr>';

         } 
         ?>


        </tbody>
    </table>
    </div>



</section>

<?php
include('partials/footer.php');
?>