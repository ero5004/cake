<?php
App::uses('AppController', 'Controller');
App::uses('GoogleCharts', 'GoogleCharts.Lib');
/**
 * Knowyournumbers Controller
 *
 * @property Knowyournumber $Knowyournumber
 * @property PaginatorComponent $Paginator
 */
class KnowyournumbersController extends AppController {

/**
 * This array lists the helpers that the controller knows of...
 *
 */
	public $helpers = array('GoogleMap','CoFunctions', 'GoogleCharts.GoogleCharts');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Knowyournumber->recursive = 0;
		$this->set('knowyournumbers', $this->Paginator->paginate());
		
		$this->set('title_for_layout', 'All Consultations');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Knowyournumber->exists($id)) {
			throw new NotFoundException(__('Invalid knowyournumber'));
		}
		$options = array('conditions' => array('Knowyournumber.' . $this->Knowyournumber->primaryKey => $id));
		$this->set('knowyournumber', $this->Knowyournumber->find('first', $options));
	}

	
	/*
	* Computes the Body Mass Index (BMI) given mass & height values.  This function 
	* assumes that mass is provided as a weight in kilograms & height is in centimeters.
	*
	*/
	function computeBMI($mass, $height) {
		$factor = 100.0; // strict input to output conversion constant:  100 centimeters in 1 meter
		$scale = 2.5; // tunable parameter according to MacKay, N.J. (2010), scale should be 2.3 <= x <= 2.7
		$bmi = $mass / pow(($height/$factor), $scale);
		return $bmi;
	}
	
	public function viewPatient($patientId = null) {		
		//prepare patient record object array
		$options = array('conditions' => array('Knowyournumber.customerId' => $patientId));
		$patientRecords = $this->Knowyournumber->find('all', $options);
		
		// Prepare the consultation map (BMI vs time)
		$chartBmi = new GoogleCharts();
		$chartBmi->type("LineChart");
		$chartBmi->options(array('title' => "BMI over time"));
		$chartBmi->columns(array('time' => array('type' => 'string', 'label' => 'Time'), 
			'bmi' => array('type' => 'number', 'label' => 'BMI')
			));
		
		// Prepare the consultation map (BP vs time)
		$chartBp = new GoogleCharts();
		$chartBp->type("LineChart");
		$chartBp->options(array('title' => "Blood Pressure over time"));
		$chartBp->columns(array('time' => array('type' => 'string', 'label' => 'Time'), 
			'systolic' => array('type' => 'number', 'label' => 'BP - systolic'),
			'diastolic' => array('type' => 'number', 'label' => 'BP - diastolic')
			));
		
		// Extract data from patient records object array
		foreach ($patientRecords as $patientRecord)
		{
			$time = $patientRecord['Knowyournumber']['time'];
			$height = $patientRecord['Knowyournumber']['height'];
			$weight = $patientRecord['Knowyournumber']['weight'];
			$systolic = $patientRecord['Knowyournumber']['systolic'];
			$diastolic = $patientRecord['Knowyournumber']['diastolic'];
			$bmi = $this->computeBMI($weight, $height);
			$chartBmi->addRow(array('time' => $time, 'bmi' => $bmi));
			$chartBp->addRow(array('time' => $time, 'systolic' => $systolic, 'diastolic' => $diastolic));
		}
		
		$this->set('title_for_layout', 'Customer Info');
		
		$this->set(compact('chartBmi'));
		$this->set(compact('chartBp'));		
		$this->set('patientRecords', $patientRecords);//set view's internal copy of patient records
		//$this->set('id',$patientId);//pass in current id into view as well
	}
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set('title_for_layout', 'Add New Consultation');
		if ($this->request->is('post')) {
			$this->Knowyournumber->create();
			if ($this->Knowyournumber->save($this->request->data)) {
				$this->Session->setFlash(__('The knowyournumber has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The knowyournumber could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->set('title_for_layout', 'Edit Consultation');
		if (!$this->Knowyournumber->exists($id)) {
			throw new NotFoundException(__('Invalid knowyournumber'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Knowyournumber->save($this->request->data)) {
				$this->Session->setFlash(__('The knowyournumber has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The knowyournumber could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Knowyournumber.' . $this->Knowyournumber->primaryKey => $id));
			$this->request->data = $this->Knowyournumber->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->set('title_for_layout', 'Delete Consultation');
		$this->Knowyournumber->id = $id;
		if (!$this->Knowyournumber->exists()) {
			throw new NotFoundException(__('Invalid knowyournumber'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Knowyournumber->delete()) {
			$this->Session->setFlash(__('The knowyournumber has been deleted.'));
		} else {
			$this->Session->setFlash(__('The knowyournumber could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function consultationMap($chwId = null) {
		$this->set('title_for_layout', 'Map of Consultations');
		$options = array('conditions' => array('Knowyournumber.chwId' => $chwId));
		$this->set('chwConsultations', $this->Knowyournumber->find('all', $options));
	}
	
}
