<?php
class InscommentsController extends AppController {
  
    public $uses = array('User', 'Site', 'Comment', 'Attribute', 'Instructor', 'Rating', 'Inscomment');

    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
        'order' => array('User.username' => 'asc' ) 
    );
     
    public function beforeFilter() {
        parent::beforeFilter();
    }
     
    public function conversation($id = null) {
        $user = $this->Auth->user();
        $commentSes = "";
        $condSes = "";

        $siteByID = $this->Instructor->findById($id);

        $sessionComment = $this->Session->read('latestComment');

        if ($sessionComment && isset($sessionComment['Inscomment']['instructor_id'])) {
            $condSes = array(
                'instructor_id' => $sessionComment['Inscomment']['instructor_id'],
                'Inscomment.message' => $sessionComment['Inscomment']['message'],
                'approval' => 0
            );
            $commentSes = $this->Inscomment->find('first', array('conditions' => $condSes, 'order' => array('Inscomment.created' => 'desc')));
        }

        if (!$commentSes) {
            $sessionComment = null;
            $this->Session->delete('latestComment');
        }

        $cond1 = array(
                'instructor_id' => $id,
                'good' => 1
        );

        $cond2 = array(
                'instructor_id' => $id,
                'bad' => 1
        );

        $conditions = array(
            'instructor_id' => $id,
            'approval' => 1
        );
        $commentByID = $this->Inscomment->find('all', array('conditions' => $conditions, 'order' => array('Inscomment.created' => 'desc')));

        $this->set('comments', $commentByID);
        $this->set('commentSes', $commentSes);
        $this->set('good', $this->Rating->find('count', array('conditions' => $cond1)));
        $this->set('bad', $this->Rating->find('count', array('conditions' => $cond2)));
        $this->set('users', $user);
        $this->set('instructor', $siteByID);
        $this->set('sessionCheck', $sessionComment);

    }
    
    public function sendmessage() {
        $redirect = "";
        if ($this->request->is('post')) {
                
            if (!$this->request->data['Inscomment']['user_id']) {
                $this->request->data['Inscomment']['user_id'] = 0;
            }

            if (isset($this->request->data['Inscomment']['instructor_id'])) {
                $redirect = array('controller' => 'instructors', 'action' => 'view', $this->request->data['Inscomment']['instructor_id']);
            }

            $this->Inscomment->create();
            if ($this->Inscomment->save($this->request->data)) {
                $this->Session->write('latestComment', $this->request->data);
                $this->Session->setFlash(__('The comment has been send to admin and waiting for approval'), 'successflash');
                $this->redirect($redirect);
            } else {
                $this->Session->setFlash(__('Cannot send comment'), 'failflash');
            } 
        }
    }
}
?>