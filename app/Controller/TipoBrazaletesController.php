<?php
App::uses('AppController', 'Controller');
/**
 * TipoBrazaletes Controller
 *
 * @property TipoBrazalete $TipoBrazalete
 * @property PaginatorComponent $Paginator
 */
class TipoBrazaletesController extends AppController {

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
		$this->TipoBrazalete->recursive = 0;
		$this->set('tipoBrazaletes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TipoBrazalete->exists($id)) {
			throw new NotFoundException(__('Invalid tipo brazalete'));
		}
		$options = array('conditions' => array('TipoBrazalete.' . $this->TipoBrazalete->primaryKey => $id));
		$this->set('tipoBrazalete', $this->TipoBrazalete->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TipoBrazalete->create();
			if ($this->TipoBrazalete->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo brazalete has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo brazalete could not be saved. Please, try again.'));
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
		if (!$this->TipoBrazalete->exists($id)) {
			throw new NotFoundException(__('Invalid tipo brazalete'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TipoBrazalete->save($this->request->data)) {
				$this->Session->setFlash(__('The tipo brazalete has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo brazalete could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TipoBrazalete.' . $this->TipoBrazalete->primaryKey => $id));
			$this->request->data = $this->TipoBrazalete->find('first', $options);
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
		$this->TipoBrazalete->id = $id;
		if (!$this->TipoBrazalete->exists()) {
			throw new NotFoundException(__('Invalid tipo brazalete'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TipoBrazalete->delete()) {
			$this->Session->setFlash(__('The tipo brazalete has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipo brazalete could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
