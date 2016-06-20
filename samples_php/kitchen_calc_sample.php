<?php
//This is a small library of functions that are used in the cyberkitchen app


/*** Calculate metric height ************************************/

function metric_height($ht) {
	$metricHeight = $ht *2.54;  //convert to cm
	return $metricHeight;
}

/*** Caculate metric weight ************************************/

function metric_weight($wt) {
	$metricWeight = $wt *.45359237;  //convert to kg
	return $metricWeight;
}

/*** Calculate RMR ************************************/

function compute_rmr($ht,$wt,$age,$gender) { //rmr units = kcal/day
	if ($gender == 'm') { //male
		$rmr = (10*$wt)+(6.25*$ht)-(5*$age)+5; //66.5 + (5.0*$ht) + (13.7*$wt) - (6.8*$age); Harris-Benedict equation changed 03-20-16 to Mifflin-St. Jeor
	}else { //female
		$rmr = (10*$wt)+(6.25*$ht)-(5*$age)-161; //655.1 + (1.8*$ht) + (9.6*$wt) - (4.7*$age); Harris-Benedict equation changed 03-20-16 to Mifflin-St. Jeor
	}
	return $rmr;
}


/*** Calculate activity factor ************************************/

function activity_factor($gender,$alevel) { //determine activity factor
	if ($gender == 'm') { //male
		switch($alevel) {
			case "s":
				$af = 1.3;
            break;
			case "lm":
				$af = 1.5;
            break;
			case "h":
				$af = 1.7;
            break;
			case "eh":
				$af = 1.9;
            break;
      }     
	} else { //female
		switch($alevel) {
			case "s":
				$af = 1.1;
            break;
			case "lm":
				$af = 1.3;
            break;
			case "h":
				$af = 1.5;
            break;
			case "eh":
				$af = 1.7;
            break;
		}
	}
	return $af;
}

/*** Calculate DCG ************************************/

function compute_dcg($rmr,$af,$adj) { //determine daily calorie goal
	$dcg = round(($rmr*$af),0) + $adj;
	return $dcg;
}





?>