<?php if(isset($_GET['loggedIn'])) : ?>
	<h3>Sikeres bejelentkezés!</h3>
	<hr>
	<h4>Jogosultsági szint: <?=$_SESSION['permission']; ?></h4>
<?php endif; ?>
Üdvözöljük az AFP Mozi oldalán.
Böngészéshez kattintson a Műsorlista menüpontra.