<div id="agents-div">
	<?php
		include_once PROTECTED_DIR.'subpages/estate_agency/core/MyController.php';
		include_once PROTECTED_DIR.'subpages/estate_agency/controller/agentController.php';
		$controller = new agentController();
		$controller->index();
	?>
</div>