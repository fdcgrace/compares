<?php
class CommentsController extends AppController {
 
    public $uses = array('User', 'Site', 'Comment', 'Attribute');

    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
        'order' => array('User.username' => 'asc' ) 
    );
     
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('admin_login', 'admin_add', 'add'); 
    }
     
 
    public function conversation($id = null) {
        $user = $this->Auth->user();
        $commentSes = "";

        $siteByID = $this->Site->findById($id);

        $sessionComment = $this->Session->read('latestComment');

        if ($sessionComment) {
            $condSes = array(
                'site_id' => $sessionComment['Comment']['site_id'],
                'message' => $sessionComment['Comment']['message'],
                'approval' => 0
            );
            $commentSes = $this->Comment->find('first', array('conditions' => $condSes, 'order' => array('Comment.created' => 'desc')));
        }

        if (!$commentSes) {
            $sessionComment = null;
            $this->Session->delete('latestComment');
        }

        $cond1 = array(
                'site_id' => $id,
                'good' => 1
        );

        $cond2 = array(
                'site_id' => $id,
                'bad' => 1
        );

        $conditions = array(
                    'site_id' => $id,
                    'approval' => 1
            );
        $commentByID = $this->Comment->find('all', array('conditions' => $conditions, 'order' => array('Comment.created' => 'desc')));

        $this->set('comments', $commentByID);
        $this->set('commentSes', $commentSes);
        $this->set('good', $this->Attribute->find('count', array('conditions' => $cond1)));
        $this->set('bad', $this->Attribute->find('count', array('conditions' => $cond2)));
        $this->set('users', $user);
        $this->set('sites', $siteByID);
        $this->set('sessionCheck', $sessionComment);

    }
    
    public function sendmessage() {
        if ($this->request->is('post')) {
                
            if (!$this->request->data['Comment']['user_id']) {
                $this->request->data['Comment']['user_id'] = 0;
            }

            $this->Comment->create();
            if ($this->Comment->save($this->request->data)) {
                $this->Session->write('latestComment', $this->request->data);
                $this->Session->setFlash(__('The comment has been send to admin and waiting for approval'), 'successflash');
                $this->redirect(array('action' => 'conversation', $this->request->data['Comment']['site_id']));
            } else {
                $this->Session->setFlash(__('Cannot send comment'), 'failflash');
            } 
        }
    }

    public function comment($id = null) {
        $user = $this->Auth->user();
        $commentSes = "";

        $siteByID = $this->Instructor->findById($id);

        $sessionComment = $this->Session->read('latestComment');

        if ($sessionComment) {
            $condSes = array(
                'site_id' => $sessionComment['Comment']['site_id'],
                'message' => $sessionComment['Comment']['message'],
                'approval' => 0
            );
            $commentSes = $this->Comment->find('first', array('conditions' => $condSes, 'order' => array('Comment.created' => 'desc')));
        }

        if (!$commentSes) {
            $sessionComment = null;
            $this->Session->delete('latestComment');
        }

        $cond1 = array(
                'site_id' => $id,
                'good' => 1
        );

        $cond2 = array(
                'site_id' => $id,
                'bad' => 1
        );

        $conditions = array(
                    'site_id' => $id,
                    'approval' => 1
            );
        $commentByID = $this->Comment->find('all', array('conditions' => $conditions, 'order' => array('Comment.created' => 'desc')));

        $this->set('comments', $commentByID);
        $this->set('commentSes', $commentSes);
        $this->set('good', $this->Attribute->find('count', array('conditions' => $cond1)));
        $this->set('bad', $this->Attribute->find('count', array('conditions' => $cond2)));
        $this->set('users', $user);
        $this->set('instructor', $siteByID);
        $this->set('sessionCheck', $sessionComment);
    }
}
?>