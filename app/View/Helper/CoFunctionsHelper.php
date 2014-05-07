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

}














