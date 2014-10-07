<?php
App::uses('AppController', 'Controller');
/**
 * EntradasSalidasDiasParques Controller
 *
 * @property EntradasSalidasDiasParque $EntradasSalidasDiasParque
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class EntradasSalidasDiasParquesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EntradasSalidasDiasParque->recursive = 0;
		$this->set('entradasSalidasDiasParques', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EntradasSalidasDiasParque->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas dias parque'));
		}
		$options = array('conditions' => array('EntradasSalidasDiasParque.' . $this->EntradasSalidasDiasParque->primaryKey => $id));
		$this->set('entradasSalidasDiasParque', $this->EntradasSalidasDiasParque->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EntradasSalidasDiasParque->create();
			if ($this->EntradasSalidasDiasParque->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas dias parque has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas dias parque could not be saved. Please, try again.'));
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
		if (!$this->EntradasSalidasDiasParque->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas dias parque'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EntradasSalidasDiasParque->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas dias parque has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas dias parque could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EntradasSalidasDiasParque.' . $this->EntradasSalidasDiasParque->primaryKey => $id));
			$this->request->data = $this->EntradasSalidasDiasParque->find('first', $options);
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
		$this->EntradasSalidasDiasParque->id = $id;
		if (!$this->EntradasSalidasDiasParque->exists()) {
			throw new NotFoundException(__('Invalid entradas salidas dias parque'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EntradasSalidasDiasParque->delete()) {
			$this->Session->setFlash(__('The entradas salidas dias parque has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entradas salidas dias parque could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->EntradasSalidasDiasParque->recursive = 0;
		$this->set('entradasSalidasDiasParques', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->EntradasSalidasDiasParque->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas dias parque'));
		}
		$options = array('conditions' => array('EntradasSalidasDiasParque.' . $this->EntradasSalidasDiasParque->primaryKey => $id));
		$this->set('entradasSalidasDiasParque', $this->EntradasSalidasDiasParque->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->EntradasSalidasDiasParque->create();
			if ($this->EntradasSalidasDiasParque->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas dias parque has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas dias parque could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->EntradasSalidasDiasParque->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas dias parque'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EntradasSalidasDiasParque->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas dias parque has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas dias parque could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EntradasSalidasDiasParque.' . $this->EntradasSalidasDiasParque->primaryKey => $id));
			$this->request->data = $this->EntradasSalidasDiasParque->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->EntradasSalidasDiasParque->id = $id;
		if (!$this->EntradasSalidasDiasParque->exists()) {
			throw new NotFoundException(__('Invalid entradas salidas dias parque'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EntradasSalidasDiasParque->delete()) {
			$this->Session->setFlash(__('The entradas salidas dias parque has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entradas salidas dias parque could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
