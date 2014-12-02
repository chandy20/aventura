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
                $this->Session->setFlash(__('El torniquete no pudo ser guardado. por favor, intente de nuevo.'));
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

    public function rango() {
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
        $vista = $this->request->data ["vista"];
        $this->loadModel("EntradasSalidas");
        if ($vista == 0) {
            $fecha = $this->request->data["fecha"];
            $torniquete = $this->request->data["torniquete"];
            $entrada = $this->request->data["entrada"];
            $hora = 9;
            if ($entrada != "") {
                if ($entrada == 0) {
                    for ($i = 0; $i < 14; $i++) {
                        if ($hora < 10) {
                            $time = '0' . $hora;
                            $hora ++;
                        } else {
                            $time = $hora;
                            $hora ++;
                        }
                        $date = $fecha . " " . $time;
                        $e = $this->EntradasSalidas->query("SELECT count(`id`)as entradas FROM `entradas_salidas` WHERE fecha LIKE '$date%' AND `tipo` = 'I'");
                        $s = $this->EntradasSalidas->query("SELECT count(`id`)as salidas FROM `entradas_salidas` WHERE fecha LIKE '$date%' AND `tipo` = 'O'");
                        $datos ['EntradasSalidasHora']['entradas' . $i] = $e[0][0]['entradas'];
                        $datos ['EntradasSalidasHora']['salidas' . $i] = $s[0][0]['salidas'];
                    }
                    $e = $this->EntradasSalidas->query("SELECT count(`id`)as entradas FROM `entradas_salidas` WHERE fecha LIKE '$fecha%' AND `tipo` = 'I'");
                    $s = $this->EntradasSalidas->query("SELECT count(`id`)as salidas FROM `entradas_salidas` WHERE fecha LIKE '$fecha%' AND `tipo` = 'O'");
                    $datos ['EntradasSalidasHora']['entradas' . $i] = $e[0][0]['entradas'];
                    $datos ['EntradasSalidasHora']['salidas' . $i] = $s[0][0]['salidas'];
                } else if ($entrada != 0) {
                    for ($i = 0; $i < 14; $i++) {
                        if ($hora < 10) {
                            $time = '0' . $hora;
                            $hora ++;
                        } else {
                            $time = $hora;
                            $hora ++;
                        }
                        $date = $fecha . " " . $time;
                        $e = $this->EntradasSalidas->query("SELECT count(e.`id`) as entradas FROM `entradas_salidas` e INNER JOIN torniquetes t ON e.torniquete_id = t.id WHERE t.locacione_id = $entrada AND e.fecha LIKE '$date%' AND e.tipo='I'");
                        $s = $this->EntradasSalidas->query("SELECT count(e.`id`) as salidas FROM `entradas_salidas` e INNER JOIN torniquetes t ON e.torniquete_id = t.id WHERE t.locacione_id = $entrada AND e.fecha LIKE '$date%' AND e.tipo='O'");
                        if ($e != array()) {
                            $datos ['EntradasSalidasHora']['entradas' . $i] = $e[0][0]['entradas'];
                        } else {
                            $datos ['EntradasSalidasHora']['entradas' . $i] = '0';
                        }
                        if ($s != array()) {
                            $datos ['EntradasSalidasHora']['salidas' . $i] = $s[0][0]['salidas'];
                        } else {
                            $datos ['EntradasSalidasHora']['salidas' . $i] = '0';
                        }
                    }
                    $e = $this->EntradasSalidas->query("SELECT count(e.`id`) as entradas FROM `entradas_salidas` e INNER JOIN torniquetes t ON e.torniquete_id = t.id WHERE t.locacione_id = $entrada AND e.fecha LIKE '$fecha%' AND e.tipo='I'");
                    $s = $this->EntradasSalidas->query("SELECT count(e.`id`) as salidas FROM `entradas_salidas` e INNER JOIN torniquetes t ON e.torniquete_id = t.id WHERE t.locacione_id = $entrada AND e.fecha LIKE '$fecha%' AND e.tipo='O'");
                    if ($e != array()) {
                        $datos ['EntradasSalidasHora']['entradas' . $i] = $e[0][0]['entradas'];
                    } else {
                        $datos ['EntradasSalidasHora']['entradas' . $i] = '0';
                    }
                    if ($s != array()) {
                        $datos ['EntradasSalidasHora']['salidas' . $i] = $s[0][0]['salidas'];
                    } else {
                        $datos ['EntradasSalidasHora']['salidas' . $i] = '0';
                    }
                }
            } else {
                for ($i = 0; $i < 14; $i++) {
                    if ($hora < 10) {
                        $time = '0' . $hora;
                        $hora ++;
                    } else {
                        $time = $hora;
                        $hora ++;
                    }
                    $date = $fecha . " " . $time;
                    $e = $this->EntradasSalidas->query("SELECT count(e.`id`) as entradas FROM `entradas_salidas` e WHERE `fecha` LIKE '$date%' AND `torniquete_id`= $torniquete AND e.tipo = 'I'");
                    $s = $this->EntradasSalidas->query("SELECT count(e.`id`) as salidas FROM `entradas_salidas` e WHERE `fecha` LIKE '$date%' AND `torniquete_id`= $torniquete AND e.tipo = 'O'");
                    if ($e != array()) {
                        $datos ['EntradasSalidasHora']['entradas' . $i] = $e[0][0]['entradas'];
                    } else {
                        $datos ['EntradasSalidasHora']['entradas' . $i] = '0';
                    }
                    if ($s != array()) {
                        $datos ['EntradasSalidasHora']['salidas' . $i] = $s[0][0]['salidas'];
                    } else {
                        $datos ['EntradasSalidasHora']['salidas' . $i] = '0';
                    }
                }
                $e = $this->EntradasSalidas->query("SELECT count(e.`id`) as entradas FROM `entradas_salidas` e WHERE `fecha` LIKE '$fecha%' AND `torniquete_id`= $torniquete AND e.tipo = 'I'");
                $s = $this->EntradasSalidas->query("SELECT count(e.`id`) as salidas FROM `entradas_salidas` e WHERE `fecha` LIKE '$fecha%' AND `torniquete_id`= $torniquete AND e.tipo = 'O'");
                if ($e != array()) {
                    $datos ['EntradasSalidasHora']['entradas' . $i] = $e[0][0]['entradas'];
                } else {
                    $datos ['EntradasSalidasHora']['entradas' . $i] = '0';
                }
                if ($s != array()) {
                    $datos ['EntradasSalidasHora']['salidas' . $i] = $s[0][0]['salidas'];
                } else {
                    $datos ['EntradasSalidasHora']['salidas' . $i] = '0';
                }
            }
            $this->loadModel('Observacione');
            $observaciones = $this->Observacione->find('list', array(
                'conditions' => array("Observacione.fecha='$fecha'"),
                'fields' => array('Observacione.observacion')
            ));
            $i = 0;
            if ($observaciones != array()) {
                foreach ($observaciones as $key => $value) {
                    $datos['EntradasSalidasHora']['observacion' . $i] = $value;
                    $i++;
                }
            } else {
                $datos['EntradasSalidasHora']['observacion0'] = 'No hay observaciones disponibles para la fecha seleccionada';
            }
        } else if ($vista == 1) {
            $torniquete = $this->request->data["torniquete"];
            $fecha = $this->request->data["fecha"];
            $d = $this->EntradasSalidas->query("SELECT sum(e.`entradas`) as entradas,sum(e.`salidas`) as salidas FROM `entradas_salidas` WHERE `fecha` LIKE '$fecha %' and `torniquete_id` = $torniquete ");
            foreach ($d as $key => $value) {
                $datos ['EntradasSalidasDiasParque'] = $value[0];
            }
        } else if ($vista == 2) {
            $locacione_id = $this->request->data["locacion"];
            $torniquete_id = $this->request->data["torniquete"];
            $hora = $this->request->data["hora"];
            $minuto = $this->request->data["minuto"];
            if (strlen($hora) < 2) {
                $hora = "0" . $this->request->data["hora"];
            }
            if (strlen($minuto) < 2) {
                $minuto = "0" . $this->request->data["minuto"];
            }
            $fecha = $this->request->data["fecha"] . " " . $hora . ":" . $minuto;
            if ($locacione_id != null || $locacione_id != "") {
                if ($locacione_id == 0 || $locacione_id == "0") {
                    $e = $this->EntradasSalidas->query("SELECT count(`id`) AS entradas FROM `entradas_salidas` WHERE `fecha` LIKE '$fecha%' AND tipo='I'");
                    $s = $this->EntradasSalidas->query("SELECT count(`id`) AS salidas FROM `entradas_salidas` WHERE `fecha` LIKE '$fecha%' AND tipo='O'");
                    $datos ['EntradasSalidasDiasParque']['entradas'] = $e[0][0]['entradas'];
                    $datos ['EntradasSalidasDiasParque']['salidas'] = $s[0][0]['salidas'];
                } else {
                    $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` INNER JOIN `locaciones` l ON l.`id` = t.`locacione_id` WHERE l.`id`=$locacione_id AND `fecha` LIKE '$fecha%' AND e.tipo='I'");
                    $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` INNER JOIN `locaciones` l ON l.`id` = t.`locacione_id` WHERE l.`id`=$locacione_id AND `fecha` LIKE '$fecha%'AND e.tipo='O'");
                    $datos ['EntradasSalidasDiasParque']['entradas'] = $e[0][0]['entradas'];
                    $datos ['EntradasSalidasDiasParque']['salidas'] = $s[0][0]['salidas'];
                }
            } else {
                $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE t.`id`=$torniquete_id AND e.`fecha` LIKE '$fecha%' AND e.tipo='I'");
                $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE t.`id`=$torniquete_id AND e.`fecha` LIKE '$fecha%' AND e.tipo='O'");
                $datos ['EntradasSalidasDiasParque']['entradas'] = $e[0][0]['entradas'];
                $datos ['EntradasSalidasDiasParque']['salidas'] = $s[0][0]['salidas'];
            }
        }if ($vista == 3) {
            $locacione_id = $this->request->data["locacion"];
            $torniquete_id = $this->request->data["torniquete"];
            $hora = $this->request->data["hora"];
            if (strlen($hora) < 2) {
                $hora = "0" . $this->request->data["hora"];
            }
            $fecha = $this->request->data["fecha"] . " " . $hora;
            if ($locacione_id != null || $locacione_id != "") {
                if ($locacione_id == 0) {
                    $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha%' AND e.tipo = 'I'");
                    $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha%' AND e.tipo = 'O'");
                    $datos ['EntradasSalidasDiasParque']['entradas'] = $e[0][0]['entradas'];
                    $datos ['EntradasSalidasDiasParque']['salidas'] = $s[0][0]['salidas'];
                } else if ($locacione_id != 0) {
                    $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha%' AND t.`locacione_id` = $locacione_id AND e.tipo='I'");
                    $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha%' AND t.`locacione_id` = $locacione_id AND e.tipo='O'");
                    $datos ['EntradasSalidasDiasParque']['entradas'] = $e[0][0]['entradas'];
                    $datos ['EntradasSalidasDiasParque']['salidas'] = $s[0][0]['salidas'];
                }
            } else {
                $torniquete_id = $this->request->data["torniquete"];
                $hora = $this->request->data["hora"];
                $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha%' AND t.`id` = $torniquete_id AND e.tipo='I'");
                $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha%' AND t.`id` = $torniquete_id AND e.tipo='O'");
                $datos ['EntradasSalidasDiasParque']['entradas'] = $e[0][0]['entradas'];
                $datos ['EntradasSalidasDiasParque']['salidas'] = $s[0][0]['salidas'];
            }
        } else if ($vista == 4) {
            $locacione_id = $this->request->data["entrada"];
            $fecha = $this->request->data["fecha"];
            if ($locacione_id != null || $locacione_id != "") {
                if ($locacione_id == 0) {
                    $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha-%' AND e.tipo='I'");
                    $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha-%' AND e.tipo='O'");
                    $datos ['EntradasSalidasDiasParque']['entradas'] = $e[0][0]['entradas'];
                    $datos ['EntradasSalidasDiasParque']['salidas'] = $s[0][0]['salidas'];
                } else {
                    $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha-%' AND t.`locacione_id`= $locacione_id AND e.tipo='I'");
                    $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha-%' AND t.`locacione_id`= $locacione_id AND e.tipo='O'");
                    $datos ['EntradasSalidasDiasParque']['entradas'] = $e[0][0]['entradas'];
                    $datos ['EntradasSalidasDiasParque']['salidas'] = $s[0][0]['salidas'];
                }
            } else if ($locacione_id == null || $locacione_id == "") {
                $torniquete_id = $this->request->data["torniquete"];
                $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha-%' AND e.`torniquete_id`= $torniquete_id AND e.tipo='I'");
                $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha-%' AND e.`torniquete_id`= $torniquete_id AND e.tipo='O'");
                $datos ['EntradasSalidasDiasParque']['entradas'] = $e[0][0]['entradas'];
                $datos ['EntradasSalidasDiasParque']['salidas'] = $s[0][0]['salidas'];
            }
        } else if ($vista == 5) {
            $locacione_id = $this->request->data["entrada"];
            $fecha = $this->request->data["fecha"];
            if ($locacione_id != null || $locacione_id != "") {
                if ($locacione_id == 0) {
                    $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha-%' AND e.tipo='I'");
                    $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha-%' AND e.tipo='O'");
                    $datos ['EntradasSalidasDiasParque']['entradas'] = $e[0][0]['entradas'];
                    $datos ['EntradasSalidasDiasParque']['salidas'] = $s[0][0]['salidas'];
                } else {
                    $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha-%' AND t.`locacione_id` = $locacione_id AND e.tipo='I'");
                    $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha-%' AND t.`locacione_id` = $locacione_id AND e.tipo='O'");
                    $datos ['EntradasSalidasDiasParque']['entradas'] = $e[0][0]['entradas'];
                    $datos ['EntradasSalidasDiasParque']['salidas'] = $s[0][0]['salidas'];
                }
            } else {
                $torniquete_id = $this->request->data["torniquete"];
                $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha-%' AND t.`id` = $torniquete_id AND e.tipo='I'");
                $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha-%' AND t.`id` = $torniquete_id AND e.tipo='O'");
                $datos ['EntradasSalidasDiasParque']['entradas'] = $e[0][0]['entradas'];
                $datos ['EntradasSalidasDiasParque']['salidas'] = $s[0][0]['salidas'];
            }
        } else if ($vista == 6) {
            $locacione_id = $this->request->data["entrada"];
            $fecha = $this->request->data["fecha"];
            $fecha2 = $this->request->data["fecha2"];
            $dias = $this->request->data['dias'];
            if ($locacione_id != null || $locacione_id != "") {
                if ($locacione_id == 0) {
                    for ($i = 0; $i < $dias; $i++) {
                        $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha%' AND e.tipo='I'");
                        $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha%' AND e.tipo='O'");
                        $fecha = date('Y-m-d', strtotime('+1 days', strtotime($fecha)));
                        $datos ['EntradasSalidasDiasParque']['entradas' . $i] = $e[0][0]['entradas'];
                        $datos ['EntradasSalidasDiasParque']['salidas' . $i] = $s[0][0]['salidas'];
                    }
                } else {
                    $dias = $this->request->data['dias'];
                    for ($i = 0; $i < $dias; $i++) {
                        $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha %' AND t.`locacione_id` = $locacione_id AND e.tipo='I'");
                        $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha %' AND t.`locacione_id` = $locacione_id AND e.tipo='O'");
                        $fecha = date('Y-m-d', strtotime('+1 days', strtotime($fecha)));
                        $datos ['EntradasSalidasDiasParque']['entradas' . $i] = $e[0][0]['entradas'];
                        $datos ['EntradasSalidasDiasParque']['salidas' . $i] = $s[0][0]['salidas'];
                    }
                }
            } else {
                $torniquete_id = $this->request->data["torniquete"];
                for ($i = 0; $i < $dias; $i++) {
                    $e = $this->EntradasSalidas->query("SELECT count(e.`id`) AS entradas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha %' AND t.`id` = $torniquete_id AND e.tipo='I'");
                    $s = $this->EntradasSalidas->query("SELECT count(e.`id`) AS salidas FROM `entradas_salidas` e INNER JOIN `torniquetes` t ON t.`id`= e.`torniquete_id` WHERE e.`fecha` LIKE '$fecha %' AND t.`id` = $torniquete_id AND e.tipo='O'");
                    $fecha = date('Y-m-d', strtotime('+1 days', strtotime($fecha)));
                    $datos ['EntradasSalidasDiasParque']['entradas' . $i] = $e[0][0]['entradas'];
                    $datos ['EntradasSalidasDiasParque']['salidas' . $i] = $s[0][0]['salidas'];
                }
            }
        } else if ($vista == 7) {
            $fecha = $this->request->data["fecha"];
            $dias = $this->request->data['dias'];
            $con = 0;
            $sin = 0;
            for ($i = 0; $i < $dias; $i++) {
                $b = $this->EntradasSalidas->query("SELECT count(e.`id`) AS brazaletes FROM entradas_salidas e WHERE e.`fecha` LIKE '$fecha%' AND e.tipo='I' AND brazalete_id <> 0 ");
                $n = $this->EntradasSalidas->query("SELECT count(e.`id`) AS brazaletes FROM entradas_salidas e WHERE e.`fecha` LIKE '$fecha%' AND e.tipo='I' AND brazalete_id = 0 ");
                $fecha = date('Y-m-d', strtotime('+1 days', strtotime($fecha)));
                $con = $con + $b[0][0]['brazaletes'];
                $sin = $sin + $n[0][0]['brazaletes'];
            }
            $datos ['pasaporte']['con'] = $con;
            $datos ['pasaporte']['sin'] = $sin;
        } else if ($vista == 8) {
            $fecha = $this->request->data["fecha"];
            $dias = $this->request->data['dias'];
            for ($i = 0; $i < $dias; $i++) {
                $d = $this->EntradasSalidas->query("SELECT count(e.`id`) as entradas FROM `entradas_salidas` e INNER JOIN `brazaletes` b ON b.id = e.`brazalete_id` WHERE  b.`tipo_brazalete_id`  = 2 AND e.`fecha` LIKE '$fecha%'");
                $z = $this->EntradasSalidas->query("SELECT count(e.`id`) as entradas FROM `entradas_salidas` e INNER JOIN `brazaletes` b ON b.id = e.`brazalete_id` WHERE  b.`tipo_brazalete_id`  = 3 AND e.`fecha` LIKE '$fecha%'");
                $r = $this->EntradasSalidas->query("SELECT count(e.`id`) as entradas FROM `entradas_salidas` e INNER JOIN `brazaletes` b ON b.id = e.`brazalete_id` WHERE  b.`tipo_brazalete_id`  = 4 AND e.`fecha` LIKE '$fecha%'");
                $fecha = date('Y-m-d', strtotime('+1 days', strtotime($fecha)));
                $datos ['pasaportes']['diamante' . $i] = $d[0][0]['entradas'];
                $datos ['pasaportes']['zafiro' . $i] = $z[0][0]['entradas'];
                $datos ['pasaportes']['ruby' . $i] = $r[0][0]['entradas'];
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

    public function bloqueo() {
        if ($this->request->is('post')) {
            $torniquetes = $this->request->data['Torniquetes'];
            $torniquetes2 = $this->request->data['Torniquetes2'];
            if ($torniquetes != array()) {
                for ($i = 1; $i <= count($torniquetes); $i++) {
                    $id = $torniquetes[$i];
                    if ($id != 0) {
                        $sql = "UPDATE torniquetes SET estado = 0 WHERE id = $id";
                        $this->Torniquete->query($sql);
                    } else {
                        $sql = "UPDATE torniquetes SET estado = 1 WHERE id = $i";
                        $this->Torniquete->query($sql);
                    }
                }
                $this->Session->setFlash(__('Operación exitosa'));
                return $this->redirect(array('action' => 'bloqueo'));
            } else {
                for ($i = 1; $i <= count($torniquetes2); $i++) {
                    $id = $torniquetes2[$i];
                    if ($id != 0) {
                        $sql = "UPDATE torniquetes SET reset = 1 WHERE id = $id";
                        $this->Torniquete->query($sql);
                    }
                }
                $this->Session->setFlash(__('Contadores en ceros.'));
                return $this->redirect(array('action' => 'bloqueo'));
            }
        }
        $blo = "SELECT estado FROM torniquetes WHERE  locacione_id = 1 AND grupo_id = 1";
        $bloqueados = $this->Torniquete->query($blo);
        foreach ($bloqueados as $key => $value) {
            $bl[$key] = $value['torniquetes']['estado'];
        }
        $blo = "SELECT estado FROM torniquetes WHERE locacione_id = 1 AND grupo_id = 2";
        $bloqueados = $this->Torniquete->query($blo);
        foreach ($bloqueados as $key => $value) {
            $bl2[$key] = $value['torniquetes']['estado'];
        }
        $blo = "SELECT estado FROM torniquetes WHERE locacione_id = 2 AND grupo_id = 1";
        $bloqueados = $this->Torniquete->query($blo);
        foreach ($bloqueados as $key => $value) {
            $bl3[$key] = $value['torniquetes']['estado'];
        }
        $blo = "SELECT estado FROM torniquetes WHERE locacione_id = 2 AND grupo_id = 2";
        $bloqueados = $this->Torniquete->query($blo);
        foreach ($bloqueados as $key => $value) {
            $bl4[$key] = $value['torniquetes']['estado'];
        }
        $sql1 = "SELECT id FROM torniquetes WHERE locacione_id = 1 AND grupo_id = 1";
        $entrada1_derecha = $this->Torniquete->query($sql1);
        foreach ($entrada1_derecha as $key => $value) {
            $ent[$key] = $value['torniquetes']['id'];
        }
        $sql2 = "SELECT id FROM torniquetes WHERE locacione_id = 1 AND grupo_id = 2";
        $entrada1_izquierda = $this->Torniquete->query($sql2);
        foreach ($entrada1_izquierda as $key => $value) {
            $entr[$key] = $value['torniquetes']['id'];
        }
        $sql3 = "SELECT id FROM torniquetes WHERE locacione_id = 2 AND grupo_id = 1";
        $entrada2_derecha = $this->Torniquete->query($sql3);
        foreach ($entrada2_derecha as $key => $value) {
            $entra[$key] = $value['torniquetes']['id'];
        }
        $sql4 = "SELECT id FROM torniquetes WHERE locacione_id = 2 AND grupo_id = 2";
        $entrada2_izquierda = $this->Torniquete->query($sql4);
        foreach ($entrada2_izquierda as $key => $value) {
            $entrad[$key] = $value['torniquetes']['id'];
        }
        $this->set(compact('ent', 'entr', 'entra', 'entrad', 'bl', 'bl2', 'bl3', 'bl4'));
    }

    public function ingreso() {
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

    public function input() {
        $this->layout = "webservices";
        $locacione_id = $this->request->data['locacion'];
        //debug($state_id);
        $options = array(
            "conditions" => array(
                "Torniquete.locacione_id" => $locacione_id,
            ),
            "fields" => array(
                "Torniquete.id"
            ),
            "recursive" => 0
        );
        $datos = $this->Torniquete->find('all', $options);
        $log = $this->Torniquete->getDataSource()->getLog(false, false);
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }

    public function acceso() {
        
    }

    public function pasaporte() {
        $this->Entrada->virtualFields['Cantidad'] = 0;
        $this->Entrada->virtualFields['Aux'] = 0;
        $this->Entrada->virtualFields['Fecha'] = 0;

        $sql = "SELECT 
                    *
                FROM 
                    inputs input
                LEFT JOIN 
                    people person 
                ON 
                    person.id = input.person_id
                WHERE
                    person.id IS NOT null AND input.event_id = $event_id;
                ";

        $datos = $this->Entrada->query($sql);
//          debug($datos);
//        debug($datos); die;
        $pos = 0;
        $i = 0;
        $person_id_ant = "";

//DIAS DEL EVENTO
        $this->loadModel('Event');
        $sql = "SELECT datediff(`even_fechFinal`, `even_fechInicio`) AS cantidad FROM `events` e WHERE `id` = $event_id";
        $cantidad = $this->Event->query($sql);
        $total = $cantidad[0][0]['cantidad'] + 1;
        $sql2 = "SELECT even_fechInicio FROM events WHERE id = $event_id";
        $fecha = $this->Event->query($sql2);
        if ($fecha != array()) {
            $date = $fecha[0]['events']['even_fechInicio'];
            $f = date('Y-m-d', strtotime($date));
        }
//       debug($date ." asdasdasd   ".$f);die;
        $dias = array();

//        for ($i = 0; $i < $total; $i++) {
//            $datos[$i]['g']['id'] = [$f];
//            $datos[$i]['g']['name'] = [$f];
//            $f = date('Y-m-d', strtotime('+1 days', strtotime($f)));

        if ($total > 0) {
            for ($i = 0; $i < $total; $i++) {
                $dias[$i]['g']['id'] = $f;
                $dias[$i]['g']['name'] = $f;
                $f = date('Y-m-d', strtotime('+1 days', strtotime($f)));
            }
        }
//        debug($total);
//        debug($event_id);
//        debug($dias);
//        die;
        $datos2 = array();
        foreach ($datos as $dato) {
//            debug($dato);
//            die;
//            //Busco el nombre de la persona
//            $options = array(
//                "fields" => array(
//                    "descripcion"
//                ),
//                "conditions" => array(
//                    "Data.person_id" => $dato["person"]["id"],
//                    "Data.forms_personal_datum_id" => 16
//                ),
//                "recursive" => -1
//            );
//            $this->loadModel("Data");
//            $nombre = $this->Data->find("all", $options);
////            debug($nombre);
//            //El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
//            if (empty($nombre)) {
//                $nombre = $dato["person"]["pers_primNombre"];
//            } else {
//                $nombre = $nombre[0];
//                $nombre = $nombre["Data"]["descripcion"];
//            }
//
//            //Busco el apellido de la persona
//            $options = array(
//                "fields" => array(
//                    "descripcion"
//                ),
//                "conditions" => array(
//                    "Data.person_id" => $dato["person"]["id"],
//                    "Data.forms_personal_datum_id" => 15
//                ),
//                "recursive" => -1
//            );
//            $this->loadModel("Data");
//            $apellido = $this->Data->find("all", $options);
////            debug($apellido);
//            //El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
//            if (empty($apellido)) {
//                $apellido = $dato["person"]["pers_primApellido"];
//            } else {
//                $apellido = $apellido[0];
//                $apellido = $apellido["Data"]["descripcion"];
//            }
//
//            //Busco la empresa de la persona
//            $options = array(
//                "fields" => array(
//                    "descripcion"
//                ),
//                "conditions" => array(
//                    "Data.person_id" => $dato["person"]["id"],
//                    "Data.forms_personal_datum_id" => 14
//                ),
//                "recursive" => -1
//            );
//            $this->loadModel("Data");
//            $empresa = $this->Data->find("all", $options);
//
//            //El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
//            if (empty($empresa)) {
//                $empresa = $dato["person"]["pers_primApellido"];
//            } else {
//                $empresa = $empresa[0];
//                $empresa = $empresa["Data"]["descripcion"];
//            }
//
//
//            $datetimearray = explode(" ", $dato["EntradaInput"]["fecha"]);
//            $time = $datetimearray[1];
//Busco los ingresos del primer dia

            $fecha1 = "0";
//            debug($dias);die;
            if ($dias[0]['g']['name'] != NULL || $dias[0]['g']['name'] != '') {

                $options = array(
                    "fields" => array(
                        "EntradasInput.ingresos"
                    ),
                    "conditions" => array(
                        "EntradasInput.fecha" => '' . $dias[0]['g']['name'] . ' 00:00:00',
                        "EntradasInput.input_id" => $dato["input"]["id"]
                    ),
                    "recursive" => -1
                );
                $this->loadModel("EntradasInput");
                $fecha1 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                if (empty($fecha1)) {
                    $fecha1 = 0;
                } else {
                    $fecha1 = $fecha1[0];
                    $fecha1 = $fecha1["EntradasInput"]["ingresos"];
                }
            }
//
//
//Busco los ingresos del segundo dia
//            debug($fecha2)
            $fecha2 = '0';
            if ($total >= 2) {
                if ($dias[1]['g']['name'] != NULL || $dias[1]['g']['name'] != '') {

                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[1]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha2 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha2)) {
                        $fecha2 = 0;
                    } else {
                        $fecha2 = $fecha2[0];
                        $fecha2 = $fecha2["EntradasInput"]["ingresos"];
                    }
                }
            }
//
//
//Busco los ingresos del tercer dia dia
            $fecha3 = "0";
            if ($total >= 3) {
                if ($dias[2]['g']['name'] != NULL || $dias[2]['g']['name'] != '') {

                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[2]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha3 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha3)) {
                        $fecha3 = 0;
                    } else {
                        $fecha3 = $fecha3[0];
                        $fecha3 = $fecha3["EntradasInput"]["ingresos"];
                    }
                }
            }
//
//            //Busco los ingresos del cuarto dia dia

            $fecha4 = "0";
            if ($total >= 4) {
                if ($dias[3]['g']['name'] != NULL || $dias[3]['g']['name'] != '') {

                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[3]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha4 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha4)) {
                        $fecha4 = 0;
                    } else {
                        $fecha4 = $fecha4[0];
                        $fecha4 = $fecha4["EntradasInput"]["ingresos"];
                    }
                }
            }
//                //Busco los ingresos del quinto dia dia
            $fecha5 = "0";
            if ($total >= 5) {
                if ($dias[4]['g']['name'] != NULL || $dias[4]['g']['name'] != '') {
                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[4]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha5 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha5)) {
                        $fecha5 = 0;
                    } else {
                        $fecha5 = $fecha5[0];
                        $fecha5 = $fecha5["EntradasInput"]["ingresos"];
                    }
                }
            }
//Busco los ingresos del sexto dia dia
            $fecha6 = "0";
            if ($total >= 6) {
                if ($dias[5]['g']['name'] != NULL || $dias[5]['g']['name'] != '') {
                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[5]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha6 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha6)) {
                        $fecha6 = 0;
                    } else {
                        $fecha6 = $fecha6[0];
                        $fecha6 = $fecha6["EntradasInput"]["ingresos"];
                    }
                }
            }

//Busco los ingresos del septimo dia dia
            $fecha7 = "0";
            if ($total >= 7) {
                if ($dias[6]['g']['name'] != NULL || $dias[6]['g']['name'] != '') {

                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[6]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha7 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha7)) {
                        $fecha7 = 0;
                    } else {
                        $fecha7 = $fecha7[0];
                        $fecha7 = $fecha7["EntradasInput"]["ingresos"];
                    }
                }
            }
//            }
//Busco los ingresos del octavo dia dia
            $fecha8 = "0";
            if ($total >= 8) {
                if ($dias[7]['g']['name'] != NULL || $dias[7]['g']['name'] != '') {

                    $options = array(
                        "fields" => array(
                            "EntradasInput.ingresos"
                        ),
                        "conditions" => array(
                            "EntradasInput.fecha" => '' . $dias[7]['g']['name'] . ' 00:00:00',
                            "EntradasInput.input_id" => $dato["input"]["id"]
                        ),
                        "recursive" => -1
                    );
                    $this->loadModel("EntradasInput");
                    $fecha8 = $this->EntradasInput->find("all", $options);

//El if es para saber si encontro algo en la tabla Data o se debe sacar de la tabla input
                    if (empty($fecha8)) {
                        $fecha8 = 0;
                    } else {
                        $fecha8 = $fecha8[0];
                        $fecha8 = $fecha8["EntradasInput"]["ingresos"];
                    }
                }
            }
//            $aux = array(
//                "Cedula" => $dato["person"]["pers_documento"],
//                "Nombre" => $nombre,
//                "Apellido" => $apellido,
//                "Empresa" => $empresa,
//                "Manilla" => $dato["input"]["entr_identificador"],
//                "Chip" => $dato["input"]["entr_codigo"],
//                "Agosto-1" => $fecha1,
//                "Agosto-2" => $fecha2,
//                "Agosto-3" => $fecha3
//            );
//            $datos2[$i] = $aux;
//            $i++;
//            $pos++;
//        }
            $this->loadModel("Input");
            $this->loadModel("User");
            $id = $dato["input"]["categoria_id"];
            $id2 = $dato["input"]["usuarioescarapela"];
            $id3 = $dato["input"]["usuariocertificate"];
            $t = $dato['person']['document_type_id'];
            $tido = "";
            if ($t != null) {
                $this->loadModel("Person");
                $r = $this->Person->query("SELECT tido_descripcion FROM document_types WHERE id =$t");
                if ($r != array()) {
                    $tido = $r[0]['document_types']['tido_descripcion'];
                }
            }
            $usuario = "";
            if ($id2 != null) {
                $sql2 = "SELECT username FROM users WHERE id = $id2";
                $res2 = $this->User->query($sql2);
                if ($res2 != array()) {
                    $usuario = $res2[0]['users']['username'];
                }
            }
            $usuario2 = "";
            if ($id3 != null) {
                $sql2 = "SELECT username FROM users WHERE id = $id3";
                $res2 = $this->User->query($sql2);
                if ($res2 != array()) {
                    $usuario2 = $res2[0]['users']['username'];
                }
            }
            $sql = "SELECT descripcion FROM categorias WHERE id= $id ";
            $res = $this->Input->query($sql);


//            debug($dato["person"]["diligenciamiento"]);
//            die;

            $categoria = '';
            if ($res != array()) {
                $categoria = $res[0]['categorias']['descripcion'];
            }
            $aux = array(
                "Fecha" => $dato["person"]["diligenciamiento"],
                "Tipo2" => $tido,
                "Documento" => $dato["person"]["pers_documento"],
                "Nombre" => $dato["person"]["pers_primNombre"],
                "Apellido" => $dato["person"]["pers_primApellido"],
                "Empresa" => $dato["person"]["pers_empresa"],
                "Cargo" => $dato["person"]["cargo"],
                "Telefono" => $dato["person"]["pers_telefono"],
                "Celular" => $dato["person"]["pers_celular"],
                "Email" => $dato["person"]["pers_mail"],
                "Ciudad" => $dato["person"]["ciudad"],
                "Pais" => $dato["person"]["pais"],
                "Sector" => $dato["person"]["sector"],
                "Tipo" => $categoria,
                "Stand" => $dato["person"]["stan"],
                "Impreso" => $usuario,
                "Fecha2" => $dato["input"]["fechaescarapela"],
                "Impreso2" => $usuario2,
                "Fecha3" => $dato["input"]["fechacertificate"],
                "Codigo" => $dato['input']['entr_codigo'],
                "Observaciones" => $dato["person"]["observaciones"],
                "Agosto-1" => $fecha1,
                "Agosto-2" => $fecha2,
                "Agosto-3" => $fecha3,
                "Agosto-4" => $fecha4,
                "Agosto-5" => $fecha5,
                "Agosto-6" => $fecha6,
                "Agosto-7" => $fecha7,
                "Agosto-8" => $fecha8,
            );
            $datos2[$i] = $aux;
            $i++;
            $pos++;
        }
//        debug($datos2);


        $this->set("datos", $datos2);
    }

}
