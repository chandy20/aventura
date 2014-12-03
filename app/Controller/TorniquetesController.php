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
    
    public function pasaporte($fecha = null){
        $this->Torniquete->virtualFields['Cantidad'] = 0;
        $this->Torniquete->virtualFields['Aux'] = 0;
        $this->Torniquete->virtualFields['Fecha'] = 0;
        $sql = "SELECT 
                    brazalete.*
                FROM 
                    brazaletes brazalete
                LEFT JOIN 
                    entradas_salidas ensa 
                ON 
                    brazalete.id = ensa.brazalete_id
                WHERE
                    brazalete.tipo_brazalete_id <> 1 AND brazalete.fecha IS NOT NULL AND ensa.fecha LIKE '$fecha%'
                GROUP BY 
                	brazalete.id
                ORDER BY
                        brazalete.tipo_brazalete_id
                ";

        $datos = $this->Torniquete->query($sql);
//          debug($datos);
//        debug($datos); die;
        $this->loadModel("EntradasSalida");
        $i = 0;
        $datos2 = array();
        foreach ($datos as $dato) {
            $id = $dato["brazalete"]["id"];
            $fechaA = $dato["brazalete"]["fecha"];
            $cod_barras = $dato["brazalete"]["cod_barras"];
            $t = $dato['brazalete']['tipo_brazalete_id'];
            $tido = "";
            if ($t != null) {
                $this->loadModel("TipoBrazalete");
                $r = $this->TipoBrazalete->query("SELECT nombre FROM tipo_brazalete WHERE id =$t");
                if ($r != array()) {
                    $tido = $r[0]['tipo_brazalete']['nombre'];
                }
            }
            $Centradas = $this->EntradasSalida->query("SELECT count(*) AS cantidad FROM `entradas_salidas` WHERE `brazalete_id` = $id AND `tipo` LIKE 'I'");
            $cantidad = $Centradas[0][0]["cantidad"];
            $aux = array(
                "Codigo" => $cod_barras,
                "Tipo" => $tido,
                "Cantidad" => $cantidad,
            );
            $datos2[$i] = $aux;
            $i++;
        }
//        debug($datos2);
        $this->set(compact('datos2', 'fecha'));
    }

}
