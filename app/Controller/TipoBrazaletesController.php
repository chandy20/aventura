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
            $this->request->data['TipoBrazalete']['nombre'] = strtoupper($this->request->data['TipoBrazalete']['nombre']);
            $tipo = $this->request->data['TipoBrazalete']['nombre'];
            $existe = $this->TipoBrazalete->query("SELECT t.id FROM tipo_brazalete t WHERE t.nombre LIKE '$tipo'"); //
            if ($existe == array()) {
                $this->TipoBrazalete->create();
                if ($this->TipoBrazalete->save($this->request->data)) {
                    $this->Session->setFlash(__('El tipo de pasaporte se creo correctamente.'));
                    return $this->redirect(array('action' => 'add'));
                } else {
                    $this->Session->setFlash(__('El tipo de pasaporte no pudo ser creado. Por favor, Intente nuevamente.'));
                }
            } else {
                $this->Session->setFlash(__('El tipo de pasaporte ya existe. No puede duplicarlo.'));
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
            $asignado = $this->TipoBrazalete->query("SELECT t.id, count(*) AS cantidad FROM tipo_brazalete t INNER JOIN brazaletes b ON b.tipo_brazalete_id = t.id WHERE b.tipo_brazalete_id = $id");
            if ($asignado[0][0]['cantidad'] == '0') {
                $this->request->data['TipoBrazalete']['nombre'] = strtoupper($this->request->data['TipoBrazalete']['nombre']);
                $tipo = $this->request->data['TipoBrazalete']['nombre'];
                $existe = $this->TipoBrazalete->query("SELECT t.id FROM tipo_brazalete t WHERE t.nombre LIKE '$tipo'"); //
                if ($existe == array() || $existe[0]['t']['id'] == $id) {
                    if ($this->TipoBrazalete->save($this->request->data)) {
                        $this->Session->setFlash(__('El tipo de pasaporte se editó correctamente.'));
                        return $this->redirect(array('action' => 'index'));
                    } else {
                        $this->Session->setFlash(__('El tipo de pasaporte no pudo ser editado. Por favor, Intente nuevamente.'));
                    }
                } else {
                    $this->Session->setFlash(__('El tipo de pasaporte ya existe. No puede duplicarlo.'));
                }
            } else {
                $this->Session->setFlash(__('El tipo de pasaporte ya fue asignado a pasaportes. No puede editarlo.'));
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
        $asignado = $this->TipoBrazalete->query("SELECT t.id, count(*) AS cantidad FROM tipo_brazalete t INNER JOIN brazaletes b ON b.tipo_brazalete_id = t.id WHERE b.tipo_brazalete_id = $id");
        if ($asignado[0][0]['cantidad'] == '0') {
            $this->request->allowMethod('post', 'delete');
            if ($this->TipoBrazalete->delete()) {
                $this->Session->setFlash(__('El tipo de pasaporte se borró correctamente.'));
            } else {
                $this->Session->setFlash(__('El tipo de pasaporte no pudo ser borrado. Por favor, intente nuevamente.'));
            }
        } else {
            $this->Session->setFlash(__('El tipo de pasaporte ya fue asignado a pasaportes. No puede borrarlo.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
