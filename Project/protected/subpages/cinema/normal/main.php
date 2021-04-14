<?php if(isset($_GET['loggedIn'])) : ?>
	<h3>Sikeres bejelentkezés!</h3>
	<hr>
	<h4>Jogosultsági szint: <?=$_SESSION['permission']; ?></h4>
<?php endif; ?>
<?php if(!isset($_GET['reserve'])) : ?>
	Üdvözöljük az AFP Mozi oldalán.
	Böngészéshez kattintson a Műsorlista menüpontra.
<?php else: ?>
	<center><h1>Helyfoglaláshoz válassz ülőhelyet!</h1></center>

	<?php 
		$query = "SELECT name, time FROM films WHERE id=:id";
		$params = [ ':id' => $_GET['reserve'] ];
		require_once CN_DATABASE_CONTROLLER;
		$result = getRecord($query, $params);
	 ?>
	<center><h4>Választott film: <?=$result['name'];?>, <?=$result['time']; ?></h4></center>
	<center><p style="color: green; margin-bottom: 0px">● - Szabad hely</p> </center>
	<center><p style="color: red">● - Foglalt hely</p> </center>

	<style type="text/css">
		.table a
		{
    	display:block;
    	text-decoration:none;
		}
		.tg  {border-collapse:collapse;border-spacing:0;width: 60%;border:3px solid gray;margin-left: auto;margin-right: auto;}
		.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
		  overflow:hidden;padding:1px 1px;word-break:normal;}
		.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
		  font-weight:normal;overflow:hidden;padding:1px 1px;word-break:normal;}
		.tg .tg-0bg9{background-color:#32cb00;border-color:#000000;text-align:center;vertical-align:top}
	</style>
	<table class="tg">
	<tbody>
	  <tr>
	  	<?php for ($i = 0; $i < 9; $i++) : ?>
		  	<tr>
				<?php for ($k = 1; $k < 17; $k++) : ?>
					<td class="tg-0bg9"><a href="index.php?S=cinema&reserveSeat=<?=$i*16+$k; ?>"><div style="height:100%;width:100%">&nbsp;</div></a></td>
				<?php endfor; ?>
		  	</tr>
	    <?php endfor; ?>
	  </tr>
	</tbody>
</table>
<?php endif; ?>