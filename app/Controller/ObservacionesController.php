<?php
App::uses('AppController', 'Controller');
/**
 * Observaciones Controller
 *
 * @property Observacione $Observacione
 * @property PaginatorComponent $Paginator
 */
class ObservacionesController extends AppController {

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
		$this->Observacione->recursive = 0;
		$this->set('observaciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Observacione->exists($id)) {
			throw new NotFoundException(__('Invalid observacione'));
		}
		$options = array('conditions' => array('Observacione.' . $this->Observacione->primaryKey => $id));
		$this->set('observacione', $this->Observacione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Observacione->create();
			if ($this->Observacione->save($this->request->data)) {
				$this->Session->setFlash(__('Observación creada con éxito.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('La observacion no pudo ser creada. Por favor, intente de nuevo.'));
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
		if (!$this->Observacione->exists($id)) {
			throw new NotFoundException(__('Invalid observacione'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Observacione->save($this->request->data)) {
				$this->Session->setFlash(__('The observacione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The observacione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Observacione.' . $this->Observacione->primaryKey => $id));
			$this->request->data = $this->Observacione->find('first', $options);
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
		$this->Observacione->id = $id;
		if (!$this->Observacione->exists()) {
			throw new NotFoundException(__('Invalid observacione'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Observacione->delete()) {
			$this->Session->setFlash(__('The observacione has been deleted.'));
		} else {
			$this->Session->setFlash(__('The observacione could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
