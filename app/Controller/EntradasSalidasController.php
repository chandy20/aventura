<?php
App::uses('AppController', 'Controller');
/**
 * EntradasSalidas Controller
 *
 * @property EntradasSalida $EntradasSalida
 * @property PaginatorComponent $Paginator
 */
class EntradasSalidasController extends AppController {

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
		$this->EntradasSalida->recursive = 0;
		$this->set('entradasSalidas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EntradasSalida->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salida'));
		}
		$options = array('conditions' => array('EntradasSalida.' . $this->EntradasSalida->primaryKey => $id));
		$this->set('entradasSalida', $this->EntradasSalida->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EntradasSalida->create();
			if ($this->EntradasSalida->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salida could not be saved. Please, try again.'));
			}
		}
		$torniquetes = $this->EntradasSalida->Torniquete->find('list');
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
		if (!$this->EntradasSalida->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EntradasSalida->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salida could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EntradasSalida.' . $this->EntradasSalida->primaryKey => $id));
			$this->request->data = $this->EntradasSalida->find('first', $options);
		}
		$torniquetes = $this->EntradasSalida->Torniquete->find('list');
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
		$this->EntradasSalida->id = $id;
		if (!$this->EntradasSalida->exists()) {
			throw new NotFoundException(__('Invalid entradas salida'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EntradasSalida->delete()) {
			$this->Session->setFlash(__('The entradas salida has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entradas salida could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
