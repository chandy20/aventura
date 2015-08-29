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
            $duplicados = "";
            $codigo_inicio = $this->request->data['Brazalete']['cod_barras_inicio'];
            $inicio = $codigo_inicio;
            $codigo_fin = $this->request->data['Brazalete']['cod_barras_fin'];
            $fin = $codigo_fin;
            $sw = 0;
            if ($codigo_inicio <= $codigo_fin) {
                while ($codigo_fin >= $codigo_inicio) {
                    //debug($codigo_inicio);
                    $id = $this->Brazalete->find('list', array('conditions' => array("Brazalete.cod_barras = '$codigo_inicio'"), 'fields' => array('Brazalete.id')));
                    if ($id == array()) {
                        $this->Brazalete->create();
                        $this->request->data['Brazalete']['cod_barras'] = $codigo_inicio;
                        if ($this->Brazalete->save($this->request->data)) {
                            if ($codigo_inicio == $codigo_fin) {
                                $mensaje = "Pasaporte(s) $inicio - $fin creado(s) con éxito.";
                                if ($duplicados != "") {
                                    $mensaje .= ", los siguientes codigos han sido duplicados: \n $duplicados";
                                }
                                $this->Session->setFlash(__($mensaje));
                                return $this->redirect(array('action' => 'add'));
                            }
                        } else {
                            $sw = $sw + 1;
                            if ($sw > 9) {
                                $sw = 0;
                                $duplicados .= ", $codigo_inicio \n";
                            }
                            $duplicados .= ", $codigo_inicio";
//                            $this->Session->setFlash(__('El brazalete no pudo ser creado, por favor intentalo nuevamente.'));
                        }
                    } else {
                        $sw = $sw + 1;
                        if ($sw > 9) {
                            $sw = 0;
                            $duplicados .= ", $codigo_inicio \n";
                        }
                        $duplicados .= ", $codigo_inicio";
                        $this->Session->setFlash(__('Código(s) ' . $duplicados . ' ya existe(n) en la base de datos'));
                    }
                    $codigo_inicio = $codigo_inicio + 1;
                    while (strlen($codigo_inicio) < 12) {
                        $codigo_inicio = '0' . $codigo_inicio;
                    }
                }
                //die;
            } else {
                $this->Session->setFlash(__('El código inicial no puede ser mayor al código final, por favor intente nuevamente'));
            }
        }
        $this->loadModel('TipoBrazalete');
        $tipos = $this->TipoBrazalete->find('list', array('fields' => 'TipoBrazalete.nombre'));
        $this->set(compact('tipos'));
    }

    /**
     * groupActive method
     *
     * @throws NotFoundException
     * @param 
     * @return void
     */
    public function groupActive(){
        
        if ($this->request->is('post')) {
            $duplicados = "";
            $codigo_inicio = $this->request->data['Brazalete']['cod_barras_inicio'];
            $inicio = $codigo_inicio;
            $codigo_fin = $this->request->data['Brazalete']['cod_barras_fin'];
            $fin = $codigo_fin;
            $sw = 0;
            if ($codigo_inicio <= $codigo_fin) {
                while ($codigo_fin >= $codigo_inicio) {
                    //debug($codigo_inicio);
                    $id = $this->Brazalete->find('list', array('conditions' => array("Brazalete.cod_barras = '$codigo_inicio'"), 'fields' => array('Brazalete.id')));
                    
                    if ($id != array()) {
                        
                        $this->Session->setFlash('Pasaporte activado con exito.');
                    } else {
                        $this->Session->setFlash('Código no registrado en la base de datos.');
                    }
            
                    if ($id == array()) {
                        $fecha = date('Y-m-d');
                        $this->Brazalete->query("UPDATE brazaletes SET fecha='$fecha' WHERE cod_barras = '$codigo_inicio'");
                        if ($codigo_inicio == $codigo_fin) {
                            $mensaje = "Activación de Pasaporte(s) $inicio - $fin Finalizada.";
                            if ($duplicados != "") {
                                $mensaje .= ", los siguientes codigos no estan creados, no pueden ser activados: \n $duplicados";
                            }
                            $this->Session->setFlash(__($mensaje));
                            return $this->redirect(array('action' => 'groupActive'));
                        }
                        else {
                            $sw = $sw + 1;
                            if ($sw > 9) {
                                $sw = 0;
                                $duplicados .= ", $codigo_inicio \n";
                            }
                            $duplicados .= ", $codigo_inicio";
//                            $this->Session->setFlash(__('El brazalete no pudo ser creado, por favor intentalo nuevamente.'));
                        }
                    } else {
                        $sw = $sw + 1;
                        if ($sw > 9) {
                            $sw = 0;
                            $duplicados .= ", $codigo_inicio \n";
                        }
                        $duplicados .= ", $codigo_inicio";
                        $this->Session->setFlash(__('Código(s) ' . $duplicados . ' no existe(n) en la base de datos'));
                    }
                    $codigo_inicio = $codigo_inicio + 1;
                    while (strlen($codigo_inicio) < 12) {
                        $codigo_inicio = '0' . $codigo_inicio;
                    }
                }
                //die;
            } else {
                $this->Session->setFlash(__('El código inicial no puede ser mayor al código final, por favor intente nuevamente'));
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
