<?php
class CommentsController extends AppController {
 
    public $uses = array('Comment');
 
    public function index() {
        $this->paginate = array(
            'limit' => 25,
            'conditions' => array('Site.del_flag' => 1),
            'group' => array('Comment.site_id')
        );
        $comments = $this->paginate('Comment');
        $this->set(compact('comments'));

    }

    public function comment_list($id = null) {
        $this->paginate = array(
            'limit' => 25,
            'conditions' => array('Comment.site_id' => $id, 'Site.del_flag' => 1), 
            'order' => array('Comment.approval' => 'ASC', 'Comment.created' => 'desc')
        );
        $comments = $this->paginate('Comment');
        $this->set(compact('comments'));

    }

    public function view($id = null) {
        if (!$this->Comment->exists($id)) {
            throw new NotFoundException(__('Invalid instructor'));
        }
        $options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
        $this->set('comment', $this->Comment->find('first', $options));
    }
 
 
    public function delete($id = null) {

        if (!$id) {
            $this->Session->setFlash(_('Invalid Comment Id.'),'failflash');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->Comment->id = $id;
        if (!$this->Comment->exists()) {
            $this->Session->setFlash(_('Invalid Comment Id provided'),'failflash');
            $this->redirect(array('action'=>'index'));
        }

        if ($this->Comment->delete($id)) {
            $this->Session->setFlash(__('Comment deleted'),'successflash');
            $this->redirect(array('action' => 'index'));
        }

        $this->Session->setFlash(__('Comment was not deleted'),'failflash');
        $this->redirect(array('action' => 'index'));
    }
     
    public function activate($id = null, $listId = null) {
         
        if (!$id) {
            $this->Session->setFlash(_('Comment was not found.'),'infoflash');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->Comment->id = $id;
        if (!$this->Comment->exists()) {
            $this->Session->setFlash(_('Comment was not found.'),'infoflash');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Comment->saveField('approval', 1)) {
            $this->Session->setFlash(__('Comment Approved.'),'successflash');
            $this->redirect(array('action' => 'comment_list', $listId));
        }
        $this->Session->setFlash(__('Comment was not approved.'),'failflash');
        $this->redirect(array('action' => 'index'));
    }
}
?>