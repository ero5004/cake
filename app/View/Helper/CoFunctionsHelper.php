<?php
/**
 * Application level co-functionality
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class CoFunctionsHelper extends Helper {
	 
	 /*
	 * Sub-routine that serves as a sort of comparator.
	 * To used in conjunction with "usort(...,"cmp")"
	 * usort($your_data, "cmp");
	 */
	function cmp($a, $b){
		return strcmp($a->time, $b->time);
	}
	
	//compares 2 date variable objects
	function cmp_dates($a, $b){
		//print_r($a);
		//echo ('~>> ' . $a['Knowyournumber']['time']);
		$a_t = strtotime($a['Knowyournumber']['time']); 
		$b_t = strtotime($b['Knowyournumber']['time']); 
		if($a_t == $b_t){
			return 0;
		}else if($a_t < $b_t){
			return -1;
		}else{ // a_t > b_t
			return 1;
		}		
	}
	
	// Sorts an array of objects by their date field if they have it
	function sort_objs_by_date($objs){
		//echo h($objs);
		//usort($objs, 'cmp_dates');
		usort($objs, array($this, "cmp_dates"));
	}
	
	 /*
	  * Computes the Body Mass Index (BMI) given mass & height values.  This function 
	  * assumes that mass is provided as a weight in kilograms & height is in centimeters.
	  * 
	  * Sample example showing how to call a helper's internal function:
	  *<?php echo $this->Link->makeEdit('Change this Recipe', '/recipes/edit/5'); ?>
	  */
	 public function computeBMI($mass, $height) {
		$factor = 100.0; // strict input to output conversion constant:  100 centimeters in 1 meter
		$scale = 2.5; // tunable parameter according to MacKay, N.J. (2010), scale should be 2.3 <= x <= 2.7
		$bmi = $mass / pow(($height/$factor), $scale);
		/* 
		 * BMI = mass / (height)^2
		 * Formula taken from:  http://en.wikipedia.org/wiki/Body_mass_index
		 * To evaluate the computed BMI (and tune the scale), this table can be used:
		 *	Category 								BMI range – kg/m2 	BMI Prime
		 *	Very severely underweight 				less than 15 		less than 0.60
		 *	Severely underweight 					from 15.0 to 16.0 	from 0.60 to 0.64
		 *	Underweight 							from 16.0 to 18.5 	from 0.64 to 0.74
		 *	Normal (healthy weight) 				from 18.5 to 25 	from 0.74 to 1.0
		 *	Overweight 	from 25 to 30 				from 1.0 to 1.2
		 *	Obese Class I (Moderately obese) 		from 30 to 35 		from 1.2 to 1.4
		 *	Obese Class II (Severely obese) 		from 35 to 40 		from 1.4 to 1.6
		 *	Obese Class III (Very severely obese) 	over 40 			over 1.6
		 */
		return $bmi;
	 }
	 
	 //old sub-routine to get last item in array (deprecated but kept for legacy debugging purposes)
	 function getLastArrItem($records){
		$arrlength=count($records);//get length of array
		$last_item = $records[$arrlength-1]['Knowyournumber']['time'];//equivalent to end($array);
		echo '~>> ' . $last_item . "\n";
		return $last_item;
	}
}














