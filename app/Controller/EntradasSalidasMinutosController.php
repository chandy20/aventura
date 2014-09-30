<?php
App::uses('AppController', 'Controller');
/**
 * EntradasSalidasMinutos Controller
 *
 * @property EntradasSalidasMinuto $EntradasSalidasMinuto
 * @property PaginatorComponent $Paginator
 */
class EntradasSalidasMinutosController extends AppController {

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
		$this->EntradasSalidasMinuto->recursive = 0;
		$this->set('entradasSalidasMinutos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EntradasSalidasMinuto->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas minuto'));
		}
		$options = array('conditions' => array('EntradasSalidasMinuto.' . $this->EntradasSalidasMinuto->primaryKey => $id));
		$this->set('entradasSalidasMinuto', $this->EntradasSalidasMinuto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EntradasSalidasMinuto->create();
			if ($this->EntradasSalidasMinuto->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas minuto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas minuto could not be saved. Please, try again.'));
			}
		}
		$torniquetes = $this->EntradasSalidasMinuto->Torniquete->find('list');
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
		if (!$this->EntradasSalidasMinuto->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas minuto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EntradasSalidasMinuto->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas minuto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas minuto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EntradasSalidasMinuto.' . $this->EntradasSalidasMinuto->primaryKey => $id));
			$this->request->data = $this->EntradasSalidasMinuto->find('first', $options);
		}
		$torniquetes = $this->EntradasSalidasMinuto->Torniquete->find('list');
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
		$this->EntradasSalidasMinuto->id = $id;
		if (!$this->EntradasSalidasMinuto->exists()) {
			throw new NotFoundException(__('Invalid entradas salidas minuto'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EntradasSalidasMinuto->delete()) {
			$this->Session->setFlash(__('The entradas salidas minuto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entradas salidas minuto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
