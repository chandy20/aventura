<?php

App::uses('AppController', 'Controller');

/**
 * Torniquetes Controller
 *
 * @property Torniquete $Torniquete
 * @property PaginatorComponent $Paginator
 */
class TorniquetesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    var $components = array('Paginator', 'Session', 'RequestHandler');

//    public $components = array('Paginator', 'Session', 'RequestHandler');

    function beforeFilter() {
        if ($this->RequestHandler->accepts('html')) {
            // Execute code only if client accepts an HTML (text/html) response
        } elseif ($this->RequestHandler->accepts('xml')) {
            // Execute XML-only code
        }
        if ($this->RequestHandler->accepts(array('xml', 'rss', 'atom'))) {
            // Executes if the client accepts any of the above: XML, RSS or Atom
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Torniquete->recursive = 0;
        $this->set('torniquetes', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Torniquete->exists($id)) {
            throw new NotFoundException(__('Invalid torniquete'));
        }
        $options = array('conditions' => array('Torniquete.' . $this->Torniquete->primaryKey => $id));
        $this->set('torniquete', $this->Torniquete->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Torniquete->create();
            if ($this->Torniquete->save($this->request->data)) {
                $this->Session->setFlash(__('The torniquete has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The torniquete could not be saved. Please, try again.'));
            }
        }
        $tipos = $this->Torniquete->Tipo->find('list', array(
            "fields" => array(
                "Tipo.nombre_tipo"
        )));

        $locaciones = $this->Torniquete->Locacione->find('list', array(
            "fields" => array(
                "Locacione.nombre_locacion"
        )));

        $this->set(compact('tipos', 'locaciones', 'grupos'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Torniquete->exists($id)) {
            throw new NotFoundException(__('Invalid torniquete'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Torniquete->save($this->request->data)) {
                $this->Session->setFlash(__('The torniquete has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The torniquete could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Torniquete.' . $this->Torniquete->primaryKey => $id));
            $this->request->data = $this->Torniquete->find('first', $options);
        }
        $tipos = $this->Torniquete->Tipo->find('list', array(
            "fields" => array(
                "Tipo.nombre_tipo"
        )));

        $locaciones = $this->Torniquete->Locacione->find('list', array(
            "fields" => array(
                "Locacione.nombre_locacion"
        )));
        $grupos = $this->Torniquete->Grupo->find('list', array(
            "fields" => array(
                "Grupo.nombre_grupo"
        )));
        $this->set(compact('tipos', 'locaciones', 'grupos'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Torniquete->id = $id;
        if (!$this->Torniquete->exists()) {
            throw new NotFoundException(__('Invalid torniquete'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Torniquete->delete()) {
            $this->Session->setFlash(__('The torniquete has been deleted.'));
        } else {
            $this->Session->setFlash(__('The torniquete could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function reportes() {
        
    }

    public function dia() {

        $locaciones = $this->Torniquete->Locacione->find('list', array(
            "fields" => array(
                "Locacione.nombre_locacion"
        )));
        $grupos = $this->Torniquete->Grupo->find('list', array(
            "fields" => array(
                "Grupo.nombre_grupo"
        )));
        $this->set(compact('tipos', 'locaciones', 'grupos'));
    }

    public function reporte() {
        $this->loadModel("EntradasSalidasDiasParque");
        $this->layout = "webservices";
        $fecha = $this->request->data["fecha"];
        $entrada = $this->request->data["entrada"];
        if ($entrada == null || $entrada == "") {

            $options = array(
                "conditions" => array(
                    "EntradasSalidasDiasParque.fecha" => $fecha
                ),
                "fields" => array(
                    "EntradasSalidasDiasParque.entradas",
                    "EntradasSalidasDiasParque.salidas"
                ),
                "recursive" => 0
            );
            $datos = $this->EntradasSalidasDiasParque->find("all", $options);
            $log = $this->EntradasSalidasDiasParque->getDataSource()->getLog(false, false);
        } else {
            $d = $this->EntradasSalidasDiasParque->query("SELECT sum(e.`entradas`) as entradas, sum(e.`salidas`) as salidas FROM `entradas_salidas_dias` e INNER JOIN `torniquetes` t ON t.`id` = e.`torniquete_id` INNER JOIN `locaciones` l ON l.`id` = t.`locacione_id` WHERE l.`id` = $entrada AND e.`fecha` = '$fecha'");
            foreach ($d as $key => $value) {
                $datos ['EntradasSalidasDiasParque']= $value[0]; 
//                $datos ['EntradasSalidasDiasParque']= $value;['salidas']; 
            }
//            debug($datos);die;
            
        } 
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }

}
