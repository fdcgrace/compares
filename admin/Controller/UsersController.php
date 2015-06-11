<?php
class UsersController extends AppController {
 
    public $uses = array('User');

    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
        'order' => array('User.username' => 'asc' ) 
    );
     
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_login', 'admin_add', 'add'); 
    }
     
 
    public function login() {
         
        //if already logged-in, redirect
        if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'index'));      
        }
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $role = $this->Auth->user('role');
                $this->Session->write('sessionRole',$role);
                if ($role != 0){
                    $this->redirect(array('controller'=>'instructors','action'=>'index'));
                }
                $this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')), 'successflash');
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('Invalid username or password'),'failflash');
            }
        } 
    }
 
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
 
    public function index() {
        $conditions = "";

        //search code
        if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            $filter_url['page'] = 1;
            foreach($this->data['Filter'] as $name => $value){
                if($value){
                    $filter_url[$name] = urlencode($value);
                }
            }
            return $this->redirect($filter_url);

        } else {
            foreach($this->params['named'] as $param_name => $value){
                if(!in_array($param_name, array('page','sort','direction','limit'))){
                    if($param_name == "Search"){
                        $conditions = array(
                            'OR' => array(
                                array('User.username LIKE' => '%' . $value . '%'),
                                array('User.email LIKE' => '%' . $value . '%')
                                ),
                            'AND' => array('User.status' => 1)
                        );
                    } else {
                        $conditions['Site.'.$param_name] = $value; 
                    }                   
                    $this->request->data['Filter'][$param_name] = $value;
                }
            }
        }
        if(empty($conditions))  $conditions = array('User.status'=> 1);
        $this->User->recursive = 0;

        $this->paginate = array(
            'limit' => 25,
            'conditions' => $conditions,
            'order' => array('User.created' => 'asc' )
        );

        $users = $this->paginate('User');
        $this->set(compact('users'));
    }
 
 
    public function add() {
        if ($this->request->is('post')) {
                 
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been created'),'successflash');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be created. Please, try again.'),'failflash');
            }   
        }
        $role = $this->role;
        $this->set(compact('role', $role));
    }
 
    public function edit($id = null) {
 
            if (!$id) {
                $this->Session->setFlash(_('Invalid user id'),'infoflash');
                $this->redirect(array('action'=>'index'));
            }
 
            $user = $this->User->findById($id);
            if (!$user) {
                $this->Session->setFlash(_('Invalid User ID Provided'),'infoflash');
                $this->redirect(array('action'=>'index'));
            }
 
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->User->id = $id;
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been updated'),'successflash');
                    $this->redirect(array('action' => 'edit', $id));
                }else{
                    $this->Session->setFlash(__('Unable to update your user.'),'failflash');
                }
            }
 
            if (!$this->request->data) {
                $this->request->data = $user;
            }

            $getrole = $this->request->data['User']['role'];
            $this->set(compact('getrole', $getrole));
            $role = $this->role;
            $this->set(compact('role', $role));
    }
 
    public function delete($id = null) {
         
        if (!$id) {
            $this->Session->setFlash(_('Please provide a user id'),'infoflash');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(_('Invalid user id provided'),'failflash');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'),'successflash');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'),'failflash');
        $this->redirect(array('action' => 'index'));
    }
     
    public function activate($id = null) {
         
        if (!$id) {
            $this->Session->setFlash(_('Please provide a user id'),'infoflash');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(_('Invalid user id provided'),'infoflash');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'),'successflash');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'),'failflash');
        $this->redirect(array('action' => 'index'));
    }
}
?>