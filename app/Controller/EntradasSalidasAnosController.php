<?php
App::uses('AppController', 'Controller');
/**
 * EntradasSalidasAnos Controller
 *
 * @property EntradasSalidasAno $EntradasSalidasAno
 * @property PaginatorComponent $Paginator
 */
class EntradasSalidasAnosController extends AppController {

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
		$this->EntradasSalidasAno->recursive = 0;
		$this->set('entradasSalidasAnos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EntradasSalidasAno->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas ano'));
		}
		$options = array('conditions' => array('EntradasSalidasAno.' . $this->EntradasSalidasAno->primaryKey => $id));
		$this->set('entradasSalidasAno', $this->EntradasSalidasAno->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EntradasSalidasAno->create();
			if ($this->EntradasSalidasAno->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas ano has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas ano could not be saved. Please, try again.'));
			}
		}
		$torniquetes = $this->EntradasSalidasAno->Torniquete->find('list');
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
		if (!$this->EntradasSalidasAno->exists($id)) {
			throw new NotFoundException(__('Invalid entradas salidas ano'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EntradasSalidasAno->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas salidas ano has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas salidas ano could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EntradasSalidasAno.' . $this->EntradasSalidasAno->primaryKey => $id));
			$this->request->data = $this->EntradasSalidasAno->find('first', $options);
		}
		$torniquetes = $this->EntradasSalidasAno->Torniquete->find('list');
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
		$this->EntradasSalidasAno->id = $id;
		if (!$this->EntradasSalidasAno->exists()) {
			throw new NotFoundException(__('Invalid entradas salidas ano'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EntradasSalidasAno->delete()) {
			$this->Session->setFlash(__('The entradas salidas ano has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entradas salidas ano could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
