<?php
App::uses('Knowyournumber', 'Model');

/**
 * Knowyournumber Test Case
 *
 */
class KnowyournumberTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.knowyournumber'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Knowyournumber = ClassRegistry::init('Knowyournumber');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Knowyournumber);

		parent::tearDown();
	}

}
