<?php
App::uses('AppController', 'Controller');
/**
 * EntradasSalidasDias Controller
 *
 * @property EntradasSalidasDia $EntradasSalidasDia
 * @property PaginatorComponent $Paginator
 */
class EntradasSalidasDiasController extends AppController {

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
		$this->EntradasSalidasDia->recursive = 0;
		$this->set('entradasSalidasDias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EntradasSalidasDia->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas dia'));
		}
		$options = array('conditions' => array('EntradasSalidasDia.' . $this->EntradasSalidasDia->primaryKey => $id));
		$this->set('entradasSalidasDia', $this->EntradasSalidasDia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EntradasSalidasDia->create();
			if ($this->EntradasSalidasDia->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas dia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas dia could not be saved. Please, try again.'));
			}
		}
		$torniquetes = $this->EntradasSalidasDia->Torniquete->find('list');
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
		if (!$this->EntradasSalidasDia->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas dia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EntradasSalidasDia->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas dia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas dia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EntradasSalidasDia.' . $this->EntradasSalidasDia->primaryKey => $id));
			$this->request->data = $this->EntradasSalidasDia->find('first', $options);
		}
		$torniquetes = $this->EntradasSalidasDia->Torniquete->find('list');
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
		$this->EntradasSalidasDia->id = $id;
		if (!$this->EntradasSalidasDia->exists()) {
			throw new NotFoundException(__('Invalid entradas salidas dia'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EntradasSalidasDia->delete()) {
			$this->Session->setFlash(__('The entradas salidas dia has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entradas salidas dia could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
