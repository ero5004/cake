<?php
App::uses('AppController', 'Controller');
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
	public $helpers = array('GoogleMap','CoFunctions');

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

	
	public function viewPatient($patientId = null) {
		$options = array('conditions' => array('Knowyournumber.customerId' => $patientId));
		$this->set('patientRecords', $this->Knowyournumber->find('all', $options));
	}
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
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
		$this->Knowyournumber->recursive = 0;
		$this->set('knowyournumbers', $this->Paginator->paginate());
	}
	
}
