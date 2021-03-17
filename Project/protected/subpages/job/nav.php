<center>

<a href="index.php">Home</a>
<span> &nbsp; | &nbsp;</span>
<?php if(array_key_exists('permission', $_SESSION) && $_SESSION['permission'] == 0) : ?>
    <a href="index.php?P=create">Create</a>
    <span> &nbsp; | &nbsp;</span>
<?php endif; ?>
<a href="index.php">Find</a>
<span> &nbsp; | &nbsp;</span>
<?php if(!loggedIn()) : ?>
	<a href="index.php?P=register">Register</a>
<?php else : ?>
	<a href="index.php?P=logout">Logout</a>
<?php endif; ?>	
<?php if(array_key_exists('permission', $_SESSION) && $_SESSION['permission'] == 1) : ?>
    <h3>Admin</h3>
<?php endif; ?>


</center>