<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'RequestHandler', 'Session'); //'Auth', 

    public function beforeFilter() {
        parent::beforeFilter();

        // For CakePHP 2.0
//        $this->Auth->allow('*');
//
//        // For CakePHP 2.1 and up
//        $this->Auth->allow();
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }            
        }
        $group_id = $this->User->Group->find('list', array(
                "fields" => array(
                    "group.descripcion"
            )));
        debug($group_id);die;
           $this->set(compact('group_id'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function login() {

        $this->Session->destroy();
        if ($this->request->is('post')) {
            //debug($this->request->data);
//            debug($this->Auth->login());
//            debug($this->request->data);
            if ($this->Auth->login() == true) {
                $this->Session->write('User.username', $this->request->data["User"]["username"]);
                $this->Session->write('User.password', $this->request->data["User"]["password"]);
//                debug($this->Auth->user());
                $options = array(
                    'conditions' => array(
                        "User.id" => $this->Auth->user('id')
                    ),
                    'fields' => array(
                        "User.id",
                        "User.group_id"
                    ),
                    'recursive' => -2
                );
//                debug($options);
                $this->Session->setFlash(__('Bienvenido ' . $this->request->data["User"]["username"]));
                $datos = $this->User->find('first', $options);
//                debug($datos);
                if ($datos === null) {
                    $this->Session->setFlash(__('El usuario no está registrado, intenta nuevamente'));
                } else {
                    $this->Session->write('User.id', $datos['User']['id']);
                    $this->Session->write('User.type_user_id', $datos['User']['type_user_id']);

                    $user_id = $this->Session->read('User.id');


                    return $this->redirect($this->Auth->redirect());
                }
            }
            $this->Session->setFlash(__('el usuario o la clave son incorrectas, intente otra vez'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}
