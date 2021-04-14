<h2><center>Filmek listája</center></h2>
<hr>
<p>FEJLESZTÉS ALATT...</p>

<?php 
	$query = "SELECT id, name, time, price FROM films";
	require_once DATABASE_CONTROLLER;
	$items = getList($query);

 ?>


<div class="item">
	<?php foreach ($items as $i) : ?>
				<div class="item">
						<table style="table-layout: fixed; width: 60%; border: 3px solid gray; margin-left: auto; margin-right: auto;   background-color: #bababa;">
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
							
						</tr>
					</table>
				</div>
				<hr style="margin-bottom: 12px; margin-top: 12px;">
		<?php endforeach; ?>
</div>