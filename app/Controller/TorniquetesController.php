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
    var $components = array('Paginator', 'Session',  'RequestHandler'); //'Auth',

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
                $this->Session->setFlash(__('Torniuqete Creado Exitosamente'));
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
        $grupos = $this->Torniquete->Grupo->find('list', array(
            "fields" => array(
                "Grupo.nombre_grupo"
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

        $tor = $this->Torniquete->find('list', array(
            "fields" => array(
                "Torniquete.id"
        )));
        foreach ($tor as $key => $value) {
            $torniquetes[$value] = "Torniquete " . $value;
        }
        $this->set(compact('torniquetes'));
    }

    public function dia() {

        $locaciones = $this->Torniquete->Locacione->find('list', array(
            "fields" => array(
                "Locacione.nombre_locacion"
        )));
        $tor = $this->Torniquete->find('list', array(
            "fields" => array(
                "Torniquete.id"
        )));
        foreach ($tor as $key => $value) {
            $torniquetes[$value] = "Torniquete " . $value;
        }
        $locaciones[0] = "TODAS";
        $grupos = $this->Torniquete->Grupo->find('list', array(
            "fields" => array(
                "Grupo.nombre_grupo"
        )));
        $this->set(compact('tipos', 'locaciones', 'grupos', 'torniquetes'));
    }

    public function reporte() {
        $this->layout = "webservices";
        $this->loadModel("EntradasSalidasDiasParque");
        $vista = $this->request->data ["vista"];
        if ($vista == 0) {
            $fecha = $this->request->data["fecha"];
            $torniquete = $this->request->data["torniquete"];
            $entrada = $this->request->data["entrada"];

            if ($entrada != "") {
                if ($entrada == 0) {
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
                }
            } else if ($entrada != 0) {
//                debug("1");
                $d = $this->EntradasSalidasDiasParque->query("SELECT sum(e.`entradas`) as entradas, sum(e.`salidas`) as salidas FROM `entradas_salidas_dias` e INNER JOIN `torniquetes` t ON t.`id` = e.`torniquete_id` INNER JOIN `locaciones` l ON l.`id` = t.`locacione_id` WHERE l.`id` = $entrada AND e.`fecha` = '$fecha'");
                foreach ($d as $key => $value) {
                    $datos ['EntradasSalidasDiasParque'] = $value[0];
                }
            } else {
//                debug("aqui");
                $d = $this->EntradasSalidasDiasParque->query("SELECT sum(e.`entradas`) as entradas, sum(e.`salidas`) as salidas FROM `entradas_salidas_dias` e INNER JOIN `torniquetes` t ON t.`id` = e.`torniquete_id` INNER JOIN `locaciones` l ON l.`id` = t.`locacione_id` WHERE t.`id` = $torniquete AND e.`fecha` = '$fecha'");
                foreach ($d as $key => $value) {
                    $datos ['EntradasSalidasDiasParque'] = $value[0];
                }
            }
        } else if ($vista == 1) {
            $torniquete = $this->request->data["torniquete"];
            $fecha = $this->request->data["fecha"];
            $d = $this->EntradasSalidasDiasParque->query("SELECT `entradas`, `salidas` FROM `entradas_salidas_dias` WHERE `fecha` = '$fecha' and `torniquete_id` = $torniquete ");
            foreach ($d as $key => $value) {
                $datos ['EntradasSalidasDiasParque'] = $value[0];
            }
        } else if ($vista == 2) {
            $locacione_id = $this->request->data["locacion"];
            $torniquete_id = $this->request->data["torniquete"];
            $hora = $this->request->data["hora"];
            $minuto = $this->request->data["minuto"];
            if (strlen($minuto) < 2) {
                $minuto = "0" . $this->request->data["minuto"];
            }
            $fecha = $this->request->data["fecha"] . " " . $hora . ":" . $minuto . ":00";
            if ($locacione_id != null || $locacione_id != "") {
                if ($locacione_id == 0 || $locacione_id == "0") {
                    $d = $this->EntradasSalidasDiasParque->query("SELECT SUM(`entradas`) AS entradas, sum(`salidas`) AS salidas FROM `entradas_salidas_minutos` WHERE `fecha` = '$fecha'");

                    foreach ($d as $key => $value) {
                        $datos ['EntradasSalidasDiasParque'] = $value[0];
                    }
                } else {
                    $d = $this->EntradasSalidasDiasParque->query("SELECT SUM(e.`entradas`) AS entradas, SUM(e.`salidas`) as salidas FROM `entradas_salidas_minutos` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` INNER JOIN `locaciones` l ON l.`id` = t.`locacione_id` WHERE l.`id`=$locacione_id AND `fecha` = '$fecha' ");
                    foreach ($d as $key => $value) {
                        $datos ['EntradasSalidasDiasParque'] = $value[0];
                    }
                }
            } else {
                $d = $this->EntradasSalidasDiasParque->query("SELECT SUM(e.`entradas`) AS entradas, SUM(e.`salidas`) AS salidas FROM `entradas_salidas_minutos` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE t.`id`=$torniquete_id AND `fecha` = '$fecha'");

                foreach ($d as $key => $value) {
                    $datos ['EntradasSalidasDiasParque'] = $value[0];
                }
            }
        }if ($vista == 3) {
            $locacione_id = $this->request->data["locacion"];
            $torniquete_id = $this->request->data["torniquete"];
            $hora = $this->request->data["hora"];
            $fecha = $this->request->data["fecha"] . " " . $hora . ":00:00";
            if ($locacione_id != null || $locacione_id != "") {
                if ($locacione_id == 0) {
                    $d = $this->EntradasSalidasDiasParque->query("SELECT SUM(e.`entradas`) AS entradas, SUM(e.`salidas`) AS salidas FROM `entradas_salidas_minutos` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` = '$fecha'");
                    foreach ($d as $key => $value) {
                        $datos ['EntradasSalidasDiasParque'] = $value[0];
                    }
                } else if ($locacione_id != 0) {
                    $d = $this->EntradasSalidasDiasParque->query("SELECT SUM(e.`entradas`) AS entradas, SUM(e.`salidas`) AS salidas FROM `entradas_salidas_minutos` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` = '$fecha' AND t.`locacione_id` = $locacione_id");
                    foreach ($d as $key => $value) {
                        $datos ['EntradasSalidasDiasParque'] = $value[0];
                    }
                }
            } else {
                $torniquete_id = $this->request->data["torniquete"];
                $hora = $this->request->data["hora"];
                $fecha = $this->request->data["fecha"] . " " . $hora . ":00:00";
                $d = $this->EntradasSalidasDiasParque->query("SELECT SUM(e.`entradas`) AS entradas, SUM(e.`salidas`) AS salidas FROM `entradas_salidas_minutos` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` = '$fecha' AND t.`id` = $torniquete_id");
                foreach ($d as $key => $value) {
                    $datos ['EntradasSalidasDiasParque'] = $value[0];
                }
            }
        } else if ($vista == 4) {
            $locacione_id = $this->request->data["entrada"];
            $fecha = $this->request->data["fecha"];
            if ($locacione_id != null || $locacione_id != "") {
                if ($locacione_id == 0) {
                    $d = $this->EntradasSalidasDiasParque->query("SELECT SUM(e.`entradas`) AS entradas, SUM(e.`salidas`) AS salidas FROM `entradas_salidas_meses` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` = '$fecha'");
                    foreach ($d as $key => $value) {
                        $datos ['EntradasSalidasDiasParque'] = $value[0];
                    }
                } else {
                    $d = $this->EntradasSalidasDiasParque->query("SELECT SUM(e.`entradas`) AS entradas, SUM(e.`salidas`) AS salidas FROM `entradas_salidas_meses` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` = '$fecha' AND t.`locacione_id`= $locacione_id");
                    foreach ($d as $key => $value) {
                        $datos ['EntradasSalidasDiasParque'] = $value[0];
                    }
                }
            } else if ($locacione_id == null || $locacione_id == "") {
                $torniquete_id = $this->request->data["torniquete"];
                $d = $this->EntradasSalidasDiasParque->query("SELECT SUM(e.`entradas`) AS entradas, SUM(e.`salidas`) AS salidas FROM `entradas_salidas_meses` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` = '$fecha' AND e.`torniquete_id`= $torniquete_id");
                foreach ($d as $key => $value) {
                    $datos ['EntradasSalidasDiasParque'] = $value[0];
                }
            }
        } else if ($vista == 5) {
            $locacione_id = $this->request->data["entrada"];
            $fecha = $this->request->data["fecha"];
            if ($locacione_id != null || $locacione_id != "") {
                if ($locacione_id == 0) {
                    $d = $this->EntradasSalidasDiasParque->query("SELECT SUM(e.`entradas`) AS entradas, SUM(e.`salidas`) AS salidas FROM `entradas_salidas_anos` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` = '$fecha'");
                    foreach ($d as $key => $value) {
                        $datos ['EntradasSalidasDiasParque'] = $value[0];
                    }
                } else {
                    $d = $this->EntradasSalidasDiasParque->query("SELECT SUM(e.`entradas`) AS entradas, SUM(e.`salidas`) AS salidas FROM `entradas_salidas_anos` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` = '$fecha' AND t.`locacione_id` = $locacione_id");
                    foreach ($d as $key => $value) {
                        $datos ['EntradasSalidasDiasParque'] = $value[0];
                    }
                }
            } else{
                $torniquete_id = $this->request->data["torniquete"];
                $d = $this->EntradasSalidasDiasParque->query("SELECT SUM(e.`entradas`) AS entradas, SUM(e.`salidas`) AS salidas FROM `entradas_salidas_anos` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` = '$fecha' AND t.`id` = $torniquete_id");
                    foreach ($d as $key => $value) {
                        $datos ['EntradasSalidasDiasParque'] = $value[0];
                    }
            }
        }
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }

    public function minutos() {
        $locaciones = $this->Torniquete->Locacione->find('list', array(
            "fields" => array(
                "Locacione.nombre_locacion"
        )));
        $locaciones[0] = "TODAS";

        $tor = $this->Torniquete->find('list', array(
            "fields" => array(
                "Torniquete.id"
        )));
        foreach ($tor as $key => $value) {
            $torniquetes[$value] = "Torniquete " . $value;
        }
        $this->set(compact('torniquetes', 'locaciones'));
    }

    public function horas() {
        $locaciones = $this->Torniquete->Locacione->find('list', array(
            "fields" => array(
                "Locacione.nombre_locacion"
        )));
        $locaciones[0] = "TODAS";

        $tor = $this->Torniquete->find('list', array(
            "fields" => array(
                "Torniquete.id"
        )));
        foreach ($tor as $key => $value) {
            $torniquetes[$value] = "Torniquete " . $value;
        }
        $this->set(compact('torniquetes', 'locaciones'));
    }

    public function mes() {
        $locaciones = $this->Torniquete->Locacione->find('list', array(
            "fields" => array(
                "Locacione.nombre_locacion"
        )));
        $locaciones[0] = "TODAS";

        $tor = $this->Torniquete->find('list', array(
            "fields" => array(
                "Torniquete.id"
        )));
        foreach ($tor as $key => $value) {
            $torniquetes[$value] = "Torniquete " . $value;
        }
        $this->set(compact('torniquetes', 'locaciones'));
    }

    public function anio() {
        $locaciones = $this->Torniquete->Locacione->find('list', array(
            "fields" => array(
                "Locacione.nombre_locacion"
        )));
        $locaciones[0] = "TODAS";

        $tor = $this->Torniquete->find('list', array(
            "fields" => array(
                "Torniquete.id"
        )));
        foreach ($tor as $key => $value) {
            $torniquetes[$value] = "Torniquete " . $value;
        }
        $this->set(compact('torniquetes', 'locaciones'));
    }
    
    public function bloqueo(){
        $locaciones = $this->Torniquete->Locacione->find('list', array(
            "fields" => array(
                "Locacione.nombre_locacion"
        )));
        $locaciones[0] = "TODAS";
        $locaciones2 = $this->Torniquete->Locacione->find('list', array(
            "fields" => array(
                "Locacione.nombre_locacion"
        )));
        $locaciones2[0] = "TODAS";

        $tor = $this->Torniquete->find('list', array(
            "fields" => array(
                "Torniquete.id"
        )));
        foreach ($tor as $key => $value) {
            $torniquetes[$value] = "Torniquete " . $value;
        }
        $this->set(compact('torniquetes', 'locaciones', 'locaciones2'));        
    }

}
