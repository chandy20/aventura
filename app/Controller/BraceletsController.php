<?php
App::uses('AppController', 'Controller');
/**
 * Bracelets Controller
 *
 * @property Bracelet $Bracelet
 * @property PaginatorComponent $Paginator
 */
class BraceletsController extends AppController {

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
		$this->Bracelet->recursive = 0;
		$this->set('bracelets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bracelet->exists($id)) {
			throw new NotFoundException(__('Invalid bracelet'));
		}
		$options = array('conditions' => array('Bracelet.' . $this->Bracelet->primaryKey => $id));
		$this->set('bracelet', $this->Bracelet->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bracelet->create();
			if ($this->Bracelet->save($this->request->data)) {
				$this->Session->setFlash(__('The bracelet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bracelet could not be saved. Please, try again.'));
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
		if (!$this->Bracelet->exists($id)) {
			throw new NotFoundException(__('Invalid bracelet'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bracelet->save($this->request->data)) {
				$this->Session->setFlash(__('The bracelet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bracelet could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bracelet.' . $this->Bracelet->primaryKey => $id));
			$this->request->data = $this->Bracelet->find('first', $options);
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
		$this->Bracelet->id = $id;
		if (!$this->Bracelet->exists()) {
			throw new NotFoundException(__('Invalid bracelet'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Bracelet->delete()) {
			$this->Session->setFlash(__('The bracelet has been deleted.'));
		} else {
			$this->Session->setFlash(__('The bracelet could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
