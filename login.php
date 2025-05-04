<?php
 include('partials/header.php');
 ?>
 <section class="container">
     <h2>Prihlásenie</h2>
     <form method="POST" >
         <label for="email">Email:</label>
         <input type="email" id="email" name="email" required><br>
         <label for="password">Heslo:</label>
         <input type="password" id="password" name="password" required><br>
         <button type="submit">Prihlásiť sa</button>
     </form>
 </section>
 <?php
 include('partials/footer.php');
 ?>