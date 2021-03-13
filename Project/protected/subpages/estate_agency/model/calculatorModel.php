<?php
class calculatorModel {
	public function calculatePersonalIncomeTax($acquisitionYear, $acquisitionPrice, $plannedSellingPrice) {
		$difference = $plannedSellingPrice - $acquisitionPrice;
		if ($difference <= 0) {
			return 0;
		}

		$taxMultiplier = 1.5;
		$multiplier;
		$thisYear = (int)date("Y");

		if($acquisitionYear <= $thisYear - 5) {
			return 0;
		} else if($acquisitionYear == $thisYear - 4) {
			$multiplier = 0.3;
		} else if($acquisitionYear == $thisYear - 3) {
			$multiplier = 0.6;
		} else if($acquisitionYear == $thisYear - 2) {
			$multiplier = 0.9;
		} else {
			$multiplier = 1;
		}

		return $difference * $taxMultiplier * $multiplier;
	}
}