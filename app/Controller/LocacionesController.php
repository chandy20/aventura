<?php
App::uses('AppController', 'Controller');
/**
 * Locaciones Controller
 *
 * @property Locacione $Locacione
 * @property PaginatorComponent $Paginator
 */
class LocacionesController extends AppController {

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
		$this->Locacione->recursive = 0;
		$this->set('locaciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Locacione->exists($id)) {
			throw new NotFoundException(__('Invalid locacione'));
		}
		$options = array('conditions' => array('Locacione.' . $this->Locacione->primaryKey => $id));
		$this->set('locacione', $this->Locacione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Locacione->create();
			if ($this->Locacione->save($this->request->data)) {
				$this->Session->setFlash(__('The locacione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The locacione could not be saved. Please, try again.'));
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
		if (!$this->Locacione->exists($id)) {
			throw new NotFoundException(__('Invalid locacione'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Locacione->save($this->request->data)) {
				$this->Session->setFlash(__('The locacione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The locacione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Locacione.' . $this->Locacione->primaryKey => $id));
			$this->request->data = $this->Locacione->find('first', $options);
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
		$this->Locacione->id = $id;
		if (!$this->Locacione->exists()) {
			throw new NotFoundException(__('Invalid locacione'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Locacione->delete()) {
			$this->Session->setFlash(__('The locacione has been deleted.'));
		} else {
			$this->Session->setFlash(__('The locacione could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
