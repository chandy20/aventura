<?php
App::uses('AppController', 'Controller');
/**
 * EntradasSalidasHoras Controller
 *
 * @property EntradasSalidasHora $EntradasSalidasHora
 * @property PaginatorComponent $Paginator
 */
class EntradasSalidasHorasController extends AppController {

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
		$this->EntradasSalidasHora->recursive = 0;
		$this->set('entradasSalidasHoras', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EntradasSalidasHora->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas hora'));
		}
		$options = array('conditions' => array('EntradasSalidasHora.' . $this->EntradasSalidasHora->primaryKey => $id));
		$this->set('entradasSalidasHora', $this->EntradasSalidasHora->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EntradasSalidasHora->create();
			if ($this->EntradasSalidasHora->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas hora has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas hora could not be saved. Please, try again.'));
			}
		}
		$descriptions = $this->EntradasSalidasHora->Description->find('list');
		$this->set(compact('descriptions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EntradasSalidasHora->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas hora'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EntradasSalidasHora->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas hora has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas hora could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EntradasSalidasHora.' . $this->EntradasSalidasHora->primaryKey => $id));
			$this->request->data = $this->EntradasSalidasHora->find('first', $options);
		}
		$descriptions = $this->EntradasSalidasHora->Description->find('list');
		$this->set(compact('descriptions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EntradasSalidasHora->id = $id;
		if (!$this->EntradasSalidasHora->exists()) {
			throw new NotFoundException(__('Invalid entradas salidas hora'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EntradasSalidasHora->delete()) {
			$this->Session->setFlash(__('The entradas salidas hora has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entradas salidas hora could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
