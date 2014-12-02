<?php

App::uses('AppController', 'Controller');

/**
 * Bracelets Controller
 *
 * @property Bracelet $Bracelet
 * @property PaginatorComponent $Paginator
 */
class BrazaletesController extends AppController {

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
        $this->loadModel('TipoBrazalete');
        $tipos = $this->TipoBrazalete->find('list', array('fields' => 'TipoBrazalete.nombre'));
        $this->set(compact('tipos'));
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

    public function activar() {
        if ($this->request->is('post')) {
            $cod = $this->request->data['Brazalete']['cod_barras'];
            $brazalete = $this->Brazalete->find('list', array('conditions' => array("Brazalete.cod_barras = '$cod'"), 'fields' => array('Brazalete.id')));
            if ($brazalete != array()) {
                $fecha = date('Y-m-d');
                $this->Brazalete->query("UPDATE brazaletes SET fecha='$fecha' WHERE cod_barras = '$cod'");
                $this->Session->setFlash('Pasaporte activado con exito.');
            } else {
                $this->Session->setFlash('Código no registrado en la base de datos.');
            }
        }
    }

}
