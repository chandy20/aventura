<?php

App::uses('AppController', 'Controller');

/**
 * Brazaletes Controller
 *
 * @property Brazalete $Brazalete
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
        $this->Brazalete->recursive = 0;
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
        if (!$this->Brazalete->exists($id)) {
            throw new NotFoundException(__('Invalid bracelet'));
        }
        $options = array('conditions' => array('Brazalete.' . $this->Brazalete->primaryKey => $id));
        $this->set('bracelet', $this->Brazalete->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            if ($this->request->data['Brazalete']['tipo_brazalete_id'] == 1) {
                $this->request->data['Brazalete']['fecha'] = '2000-01-01';
            }
            $codigo = $this->request->data['Brazalete']['cod_barras'];
            $id = $this->Brazalete->find('list', array('conditions' => array("Brazalete.cod_barras = '$codigo'"), 'fields' => array('Brazalete.id')));
            if ($id == array()) {
                $this->Brazalete->create();
                if ($this->Brazalete->save($this->request->data)) {
                    $this->Session->setFlash(__('El pasaporte ha sido creado.'));
                    return $this->redirect(array('action' => 'add'));
                } else {
                    $this->Session->setFlash(__('El brazalete no pudo ser creado, por favor intente nuevamente.'));
                }
            }else{
                $this->Session->setFlash(__('El código ya existe en la base de datos'));
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
        if (!$this->Brazalete->exists($id)) {
            throw new NotFoundException(__('Invalid bracelet'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Brazalete->save($this->request->data)) {
                $this->Session->setFlash(__('The bracelet has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The bracelet could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Brazalete.' . $this->Brazalete->primaryKey => $id));
            $this->request->data = $this->Brazalete->find('first', $options);
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
        $this->Brazalete->id = $id;
        if (!$this->Brazalete->exists()) {
            throw new NotFoundException(__('Invalid bracelet'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Brazalete->delete()) {
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
