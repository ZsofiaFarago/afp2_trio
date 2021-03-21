<?php if(isset($agents)): ?>
	<?php foreach($agents as $agent): ?>
		<div class="agent-div">
			<div class="agent-image-div"><img src="<?=PUBLIC_DIR.'images/estate_agency/'.$agent['image_name']?>"></div>
			<div class="agent-data-div">
				<div>
					<p class="agent-name"><b>Név:</b> <?=$agent['first_name'].' '.$agent['last_name']?></p>
					<p class="agent-profession"><b>Szakterület:</b> <?=$agent['speciality']?></p>
					<p class="agent-email"><b>Email:</b> <?=$agent['email']?></p>
					<p class="agent-phone"><b>Telefonszám:</b> <?=$agent['phone']?></p>
					<p class="agent-address"><b>Cím:</b> <?=$agent['zipcode'].' '.$agent['name'].', '.$agent['street_name'].' '.$agent['street_number']?></p>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>