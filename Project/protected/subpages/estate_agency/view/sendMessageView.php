<div class="formResult">
	<b>Sikeres üzenetküldés!</b><br/>
	<b>Feladó:</b> <?=$messageData['name'].' ('.$messageData['email'].')'?><br/>
	<b>Címzett:</b> <?=$messageData['addressedName'].' ('.$messageData['addressedEmail'].')'?><br/>
	<b>Tárgy:</b> <?=$messageData['subject']?><br/>
	<b>Üzenet:</b> <br/><?=$messageData['message']?>
</div>