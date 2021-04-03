<?php
	class contactController extends MyController {
	    public function __construct() {
	        parent::__construct();
	        $this->setModel('contactModel');
    	}

    	private $name;
    	private $email;
    	private $subject;
    	private $addressedId;
    	private $message;

    	public function getAllAgents() {
    		$agents = $this->model->getAllAgents();
    		return $agents;
    	}

    	public function sendMessage() {
    		if(array_key_exists('send', $_POST)) {
    			$this->name = $_POST['name'];
    			$this->email = $_POST['email'];
    			$this->subject = $_POST['subject'];
    			$this->addressedId = $_POST['addressed'];
    			$this->message = $_POST['message'];
    			$errorMessage = "";
    			if($errorMessage == "") {
    				$message = $this->model->sendMessage($this->name, $this->email, $this->subject, $this->addressedId, $this->message);
    				$selectedAgent = $this->model->getAgentById($this->addressedId);
    				$messageData = [
    					'name' => $this->name,
    					'email' => $this->email,
    					'subject' => $this->subject,
    					'message' => $message,
    					'addressedName' => $selectedAgent['first_name'].' '.$selectedAgent['last_name'],
    					'addressedEmail' => $selectedAgent['email']
    				];

    				$this->addViewParams('messageData', $messageData);
    				$this->renderPage('sendMessageView');
    			} else {
    				$this->addParams('errorMesage', $errorMessage);
    				$this->renderPage('formErrorMessageView');
    			}
    		}
    	}
    }
?>