<?php 
	/*for ($i=0; $i < 144 ; $i++) { 
		$query = "INSERT INTO spots (film_id, number, available) VALUES (:film_id, :number, :available)";
		$params = [ ':film_id' => 2,
					':number' => $i,
					':available' => 1];
		require_once CN_DATABASE_CONTROLLER;
		executeDML($query, $params);
	}*/

	
 ?>

<?php if(isset($_GET['loggedIn'])) : ?>
	<h3>Sikeres bejelentkezés!</h3>
	<hr>
	<h4>Jogosultsági szint: <?=$_SESSION['permission']; ?></h4>
<?php endif; ?>
<?php if(isset($_GET['reserveSeat'])) : ?>
	<?php 
		$query = "SELECT * FROM spots WHERE film_id = :film_id AND number = :number AND available = 1";
		$params = [
			':film_id' => $_GET['film_id'],
			':number' => $_GET['reserveSeat']
		];
		require_once CN_DATABASE_CONTROLLER;
		$result = getList($query, $params);
	?>
		<?php if(empty($result)) : ?>
			<h1><center>Sikertelen helyfoglalás!</center></h1>
			<h2><center>Ez a hely már foglalt!</center></h2>
		<?php else : ?>
			<?php 
				$query = "UPDATE spots SET available = 0 WHERE film_id = :film_id AND number = :number";
				$params = [ ':film_id' => $_GET['film_id'], 
						    ':number' => $_GET['reserveSeat']];
				executeDML($query, $params);
		 	?>
			<center><h2>Sikeres helyfoglalás a <?=$_GET['reserveSeat']; ?> számú ülőhelyre.</h2></center>
			<center><p>Jó szórakozást!</p></center>
		<?php endif; ?>
<?php elseif(!isset($_GET['reserve'])) : ?>
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

	<?php 
		$query = "SELECT available FROM spots WHERE film_id = :film_id";
		$params = [':film_id' => $_GET['reserve']];
		$seats = getList($query,$params);
	 ?>

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
		.tg .tg-red{background-color:red;border-color:#000000;text-align:center;vertical-align:top}
	</style>
	<table class="tg">
	<tbody>
	  <tr>
	  	<?php for ($i = 0; $i < 9; $i++) : ?>
		  	<tr>
				<?php for ($k = 1; $k < 17; $k++) : ?>
					<td 
						<?php if($seats[$i*16+$k-1]['available'] == 1) : ?>
							class="tg-0bg9"
						<?php else : ?>
							class="tg-red"
						<?php endif; ?>
					><a href="index.php?S=cinema&film_id=<?=$_GET['reserve'];?>&reserveSeat=<?=$i*16+$k-1; ?>"><div style="height:100%;width:100%">&nbsp;</div></a></td>
				<?php endfor; ?>
		  	</tr>
	    <?php endfor; ?>
	  </tr>
	</tbody>
</table>
<h1 style="margin-top: 48px"><center>VÁSZON</center></h1>
<?php endif; ?>