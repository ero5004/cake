<?php
/**
 * KnowyournumberFixture
 *
 */
class KnowyournumberFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'knowYourNumbersId' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'customerId' => array('type' => 'integer', 'null' => false, 'default' => null),
		'chwId' => array('type' => 'integer', 'null' => false, 'default' => null),
		'time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'latitude' => array('type' => 'float', 'null' => false, 'default' => null),
		'longitude' => array('type' => 'float', 'null' => false, 'default' => null),
		'height' => array('type' => 'integer', 'null' => false, 'default' => null),
		'weight' => array('type' => 'integer', 'null' => false, 'default' => null),
		'systolic' => array('type' => 'integer', 'null' => false, 'default' => null),
		'diastolic' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'knowYourNumbersId', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'knowYourNumbersId' => 1,
			'customerId' => 1,
			'chwId' => 1,
			'time' => '2014-05-07 18:58:25',
			'latitude' => 1,
			'longitude' => 1,
			'height' => 1,
			'weight' => 1,
			'systolic' => 1,
			'diastolic' => 1
		),
	);

}
