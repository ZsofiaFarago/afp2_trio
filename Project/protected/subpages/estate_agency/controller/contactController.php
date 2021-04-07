<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/validation.php';
    class contactController extends MyController {
	    public function __construct() {
	        parent::__construct();
	        $this->setModel('contactModel');
            $this->validation = new Validation();
    	}

    	private $validation;

        private $name;
    	private $email;
    	private $subject;
    	private $addressedId;
    	private $message;

    	public function getAllAgents() {
    		$agents = $this->model->getAllAgents();
    		return $agents;
    	}

    	public function getErrorMessage($name, $email, $message) {
            $errorMessage = "";
            if(!$this->validation->checkEmail($email)) {
                $errorMessage = "Szabálytalan email cím! Minta: username@domain.com";
            }

            $regex = "/^[A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}(?:[ -][A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}){0,2}$/";
            if(!$this->validation->checkStringByRegex($name, $regex)) {
                $errorMessage = "Nem megfelelő nevet adott meg!";
            }
            if(!$this->validation->checkStringLength(5, 500, $message)) {
                $errorMessage = "Az üzenet 5 és 500 karakter közöttinek kell lennie!";
            }
        }

        public function sendMessage() {
    		if(array_key_exists('send', $_POST)) {
    			$this->name = $_POST['name'];
    			$this->email = $_POST['email'];
    			$this->subject = $_POST['subject'];
    			$this->addressedId = $_POST['addressed'];
    			$this->message = $_POST['message'];
    			$errorMessage = $this->getErrorMessage($this->name, $this->email, $this->message);
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