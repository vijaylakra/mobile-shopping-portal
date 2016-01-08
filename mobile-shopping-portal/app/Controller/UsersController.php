<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {

////////////////////////////////////////////////////////////

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login');
    }

////////////////////////////////////////////////////////////

    public function login() {

        if ($this->request->is('post')) {
            if($this->Auth->login()) {

                if ($this->Auth->User('role') == 'customer') {
                    return $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'dashboard',
                        'customer' => true,
                        'admin' => false
                    ));
                } elseif ($this->Auth->User('role') == 'admin') {
                    $uploadURL = Router::url('/') . 'app/webroot/upload';
                    $_SESSION['KCFINDER'] = array(
                        'disabled' => false,
                        'uploadURL' => $uploadURL,
                        'uploadDir' => ''
                    );
                    return $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'dashboard',
                        'manager' => false,
                        'admin' => true
                    ));
                } else {
                    $this->Session->setFlash('Login is incorrect');
                }
            } else {
                $this->Session->setFlash('Login is incorrect');
            }
        }
    }

////////////////////////////////////////////////////////////

    public function logout() {
        $this->Session->setFlash('Good-Bye');
        $_SESSION['KCEDITOR']['disabled'] = true;
        unset($_SESSION['KCEDITOR']);
        return $this->redirect($this->Auth->logout());
    }

////////////////////////////////////////////////////////////

    public function signup() {
        if ($this->request->is('post')) {
            $this->request->data['User']['role']='customer';
            $this->request->data['User']['active']=1;
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Signed up successfully');
                return $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash('Data could not be saved. Please, try again.');
            }
        }
    }

////////////////////////////////////////////////////////////

    public function customer_dashboard() {
    }

////////////////////////////////////////////////////////////

    public function admin_dashboard() {
    }

////////////////////////////////////////////////////////////

    public function admin_index() {

        $this->Paginator = $this->Components->load('Paginator');

        $this->Paginator->settings = array(
            'User' => array(
                'recursive' => -1,
                'contain' => array(
                ),
                'conditions' => array(
                ),
                'order' => array(
                    'Users.name' => 'ASC'
                ),
                'limit' => 20,
                'paramType' => 'querystring',
            )
        );
        $users = $this->Paginator->paginate();
        $this->set(compact('users'));
    }

////////////////////////////////////////////////////////////

    public function admin_view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Invalid user');
        }
        $this->set('user', $this->User->read(null, $id));
    }

////////////////////////////////////////////////////////////

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('The user has been saved');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The user could not be saved. Please, try again.');
            }
        }
    }

////////////////////////////////////////////////////////////

    public function admin_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Invalid user');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('The user has been saved');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The user could not be saved. Please, try again.');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
    }

////////////////////////////////////////////////////////////

    public function admin_password($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Invalid user');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('The user has been saved');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The user could not be saved. Please, try again.');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
    }

////////////////////////////////////////////////////////////

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Invalid user');
        }
        if ($this->User->delete()) {
            $this->Session->setFlash('User deleted');
            return $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash('User was not deleted');
        return $this->redirect(array('action' => 'index'));
    }

////////////////////////////////////////////////////////////

}
