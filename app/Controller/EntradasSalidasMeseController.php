<?php
App::uses('AppController', 'Controller');
/**
 * EntradasSalidasMese Controller
 *
 * @property EntradasSalidasMese $EntradasSalidasMese
 * @property PaginatorComponent $Paginator
 */
class EntradasSalidasMeseController extends AppController {

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
		$this->EntradasSalidasMese->recursive = 0;
		$this->set('entradasSalidasMese', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EntradasSalidasMese->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas mese'));
		}
		$options = array('conditions' => array('EntradasSalidasMese.' . $this->EntradasSalidasMese->primaryKey => $id));
		$this->set('entradasSalidasMese', $this->EntradasSalidasMese->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EntradasSalidasMese->create();
			if ($this->EntradasSalidasMese->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas mese has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas mese could not be saved. Please, try again.'));
			}
		}
		$torniquetes = $this->EntradasSalidasMese->Torniquete->find('list');
		$this->set(compact('torniquetes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EntradasSalidasMese->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas mese'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EntradasSalidasMese->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas mese has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas mese could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EntradasSalidasMese.' . $this->EntradasSalidasMese->primaryKey => $id));
			$this->request->data = $this->EntradasSalidasMese->find('first', $options);
		}
		$torniquetes = $this->EntradasSalidasMese->Torniquete->find('list');
		$this->set(compact('torniquetes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EntradasSalidasMese->id = $id;
		if (!$this->EntradasSalidasMese->exists()) {
			throw new NotFoundException(__('Invalid entradas salidas mese'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EntradasSalidasMese->delete()) {
			$this->Session->setFlash(__('The entradas salidas mese has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entradas salidas mese could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
