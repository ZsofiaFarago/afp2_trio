<div id="catalogue_div">
	<?php
		include_once PROTECTED_DIR.'subpages/estate_agency/core/MyController.php';
		include_once PROTECTED_DIR.'subpages/estate_agency/controller/catalogueController.php';
		$controller = new catalogueController();
		$estates = $controller->getAllEstates();
	?>
	<div class="text-content intro">
		<h1>Ingatlankatalógus</h1>
		<p>Itt találhatóak a legújabb, legfrissebb, éppen aktuális ingatlanhirdetések, melyeket regisztrált felhasználóink töltöttek fel. Ha érdekli valamelyik ajánlat, akkor a feltöltőtől érdeklődhet az adott ingatlan iránt, elérhetőségeit megtalálja a hirdetésben. Ha szeretne egy ingatlant lefoglalni vagy Ön is szeretne hirdetést feladni, ezt akkor teheti meg, ha regisztrált és bejelentkezett az oldalunkra. Foglalását vissza is mondhatja, ha meggondolta magát. Ha feltölt egy új ingatlant vagy lefoglal egyet, munkatársaink hamarosan felveszik Önnel a kapcsolatot, hogy egyeztethessenek a részletekről, és megválaszolják a kérdéseit. Az ingatlanok listáját rendezheti ár szerint növekvő vagy csökkenő sorrendbe.</p>
	</div>

		<?php if($controller->isUserLoggedIn()): ?>
		<div class="form" id="upload-estate-form">
			<h2>Ingatlan feltöltése</h2>
			<?php if(array_key_exists('save', $_POST)): ?>
				<?php $controller->uploadEstate(); ?>
				<meta http-equiv="refresh" content="0">
			<?php endif; ?>
			<form method="POST" enctype="multipart/form-data">
				<label for="city">Város <em>&#x2a;</em></label>
				<input id="city" name="city" required="" type="text"
					value="<?php echo (isset($_POST['city']))?$_POST['city']:'';?>"
				/>

				<label for="zipcode">Irányítószám <em>&#x2a;</em></label>
				<input id="zipcode" name="zipcode" required="" type="text"
					value="<?php echo (isset($_POST['zipcode']))?$_POST['zipcode']:'';?>"
				/>

				<label for="streetName">Közterület neve <em>&#x2a;</em></label>
				<input id="streetName" name="streetName" required="" type="text"
					value="<?php echo (isset($_POST['streetName']))?$_POST['streetName']:'';?>"
				/>

				<label for="streetNumber">Házszám <em>&#x2a;</em></label>
				<input id="streetNumber" name="streetNumber" required="" type="text"
					value="<?php echo (isset($_POST['streetNumber']))?$_POST['streetNumber']:'';?>"
				/>

				<label for="area">Alapterület <em>&#x2a;</em></label>
				<input id="area" name="area" required="" type="text"
					value="<?php echo (isset($_POST['area']))?$_POST['area']:'';?>"
				/>

				<label for="roomNumber">Szobák száma <em>&#x2a;</em></label>
				<input id="roomNumber" name="roomNumber" required="" type="text"
					value="<?php echo (isset($_POST['roomNumber']))?$_POST['roomNumber']:'';?>"
				/>

				<label for="selling_price">Eladási ár <em>&#x2a;</em></label>
				<input id="selling_price" name="selling_price" required="" type="text"
					value="<?php echo (isset($_POST['selling_price']))?$_POST['selling_price']:'';?>"
				/>

				<label for="purchase_price">Vételár <em>&#x2a;</em></label>
				<input id="purchase_price" name="purchase_price" required="" type="text"
					value="<?php echo (isset($_POST['purchase_price']))?$_POST['purchase_price']:'';?>"
				/>

				<label for="img">Képfeltöltés <em>&#x2a;</em></label>
				<input id="img" name="img" required="" type="file" style="display: block; background-color: transparent; border: none;"  accept="image/*" />

				<label for="description">Leírás <em>&#x2a;</em></label>
				<textarea id="description" name="description" required="" type="text" cols="61" rows="5" style="display: block;"></textarea>

				<h3>A *-gal jelölt mezők kitöltése kötelező.</h3>
				<button name="save" type="submit">Mentés</button>
			</form>
		</div>
	<?php endif; ?>

	<?php if(isset($estates)): ?>
		<?php foreach($estates as $estate): ?>
			<div class="records-div">
				<div class="record-div">
					<div class="record-image-div"><img src="<?=PUBLIC_DIR.'images/estate_agency/'.$estate['image_name']?>"></div>
					<div class="record-data-div">
						<p class="estate-address"><b>Cím: </b> <?=$estate['zipcode'].' '.$estate['name'].', '.$estate['street_name'].' '.$estate['street_number'].'.'?></p>
						<p class="estate-selling-price"><b>Eladási ár:</b> <?=$estate['selling_price'].' Ft'?></p>
						<p class="estate-purchase-price"><b>Vételárár:</b> <?=$estate['purchase_price'].' Ft'?></p>
						<p class="estate-area"><b>Alapterület: </b><?=$estate['area']. ' m<sup>2</sup>'?></p>
						<p class="estate-room-number"><b>Szobák száma:</b> <?=$estate['room_number']?></p>
						<p class="estate-description"><b>Leírás: </b><?=$estate['description']?></p>
						<p class="estate-uploader"><b>Feltöltötte: </b><?=$estate['last_name'].' '.$estate['first_name'].' ('.$estate['email'].', '.$estate['phone'].')'?></p>
						<form method="POST">
							<?php if($controller->isUserLoggedIn()): ?>
								<?php if(!$controller->isAlreadyReserved($estate['id'])): ?>
									<input type="submit" name="<?='reserve'.$estate['id']?>" value="Lefoglal" />
									<?php if(array_key_exists('reserve'.$estate['id'], $_POST)): ?>
										<?php $controller->reserve($estate['id']); ?>
											<meta http-equiv="refresh" content="0">
									<?php endif; ?>
									<?php else: ?>
										<?php
											$reserver = $controller->getReserverDetails();
										?>
										<div>Az ingatlant már lefoglalta: <?=$reserver['last_name'].' '.$reserver['first_name']?>.</div>
										<?php if($reserver['id'] == $_SESSION['uid'] && $estate['client_id'] != $_SESSION['uid']): ?>
											<input type="submit" name="<?='undo'.$estate['id']?>" value="Lefoglalás visszavonása" />
											<?php if(array_key_exists('undo'.$estate['id'], $_POST)): ?>
												<?php $controller->undoReservation($estate['id']) ?>
												<meta http-equiv="refresh" content="0">
										<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>