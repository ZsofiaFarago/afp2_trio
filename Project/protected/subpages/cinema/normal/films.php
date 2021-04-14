<h2><center>Filmek listája</center></h2>
<hr>
<p>FEJLESZTÉS ALATT...</p>

<?php 
	$query = "SELECT id, name, time, price FROM films";
	require_once CN_DATABASE_CONTROLLER;
	$items = getList($query);

 ?>


<div class="item">
	<?php foreach ($items as $i) : ?>
				<div class="item">
						<table style="table-layout: fixed; width: 60%; border: 3px solid gray; margin-left: auto; margin-right: auto;   background-color: #f5821e">
						<tr>
							<td></td>			
						</tr>
						<tr>
							<td><b>Név:</b> <?=$i['name'] ?></td>
							<td style="text-align: center">
								<?=$i['price'] ?><p>Ft</p>
							</td>	
						</tr>
						<tr>
							<td><b>Időpont: <?=$i['time'] ?></b></td>	
						</tr>
						<hr>
						<tr>
							<td colspan="2"><?php if(array_key_exists('permission', $_SESSION)) : ?>
								<center><button style="color: black"><a href="index.php?S=cinema&reserve=<?=$i['id']; ?>">Foglalás</a></button></center>
							<?php endif; ?>
							</td>
						</tr>
					</table>
				</div>
				<hr style="margin-bottom: 12px; margin-top: 12px;">
		<?php endforeach; ?>
</div>