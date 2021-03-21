<?php
	class agentController extends MyController {
	    public function __construct() {
	        parent::__construct();
	        $this->setModel('agentModel');
    	}

    	public function index() {
    		$agents = $this->model->getAllAgents();
    		$this->addViewParams('agents', $agents);
    		$this->renderPage('agentsView');
    	}
	}
?>