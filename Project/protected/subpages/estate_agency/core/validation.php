<?php
	class Validation {
		public function checkIfAllRequiredDataIsGiven($required) {
	        foreach($required as $field) {
	            if (!isset($_POST[$field]) || empty($_POST[$field])) {
	                return false;
	            }
	        }
	        return true;
	    }

	    public function checkIfAllRequiredDataIsNumeric($required) {
	        foreach($required as $field) {
	            if (!is_numeric($_POST[$field])) {
	                return false;
	            }
	        }
	        return true;
	    }

	    public function checkYear($year) {
	        if(0 <= $year && $year <= (int)date("Y")) {
	            return true;
	        }
	        return false;
	    }

	    public function checkPrice($price) {
	        if(0 <= $price) {
	            return true;
	        }
	        return false;
	    }

	    public function checkStringLength($min, $max, $text) {
	    	$length = strlen($text);
	    	if($length <= $max && $min <= $length) {
	    		return true;
	    	}
	    	return false;
	    }

		public function checkEmail($email) {
	    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  				return false;
			}
			return true;
	    }

	    public function checkStringByRegex($name, $regex) {
	    	if (!preg_match($regex, $name)) {
				return false;
			}
			return true;
	    }
	}
?>