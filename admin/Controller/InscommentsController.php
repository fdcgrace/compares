<?php
class InscommentsController extends AppController {
 
    public $uses = array('Inscomment');
 
    public function index() {
        $this->paginate = array(
            'limit' => 25,
            'conditions' => array('Instructor.del_flag' => 1),
            'group' => array('Inscomment.instructor_id'),
            'order' => array('Inscomment.created')
        );
        $inscomments = $this->paginate('Inscomment');
        $this->set(compact('inscomments'));
    }

    public function inscomment_list($id = null) {
        $this->paginate = array(
            'limit' => 25,
            'conditions' => array('Inscomment.instructor_id' => $id), 
            'order' => array('Inscomment.approval' => 'ASC', 'Inscomment.created' => 'desc')
        );
        $inscomments = $this->paginate('Inscomment');
        $this->set(compact('inscomments'));
    }

    public function view($id = null) {
        if (!$this->Inscomment->exists($id)) {
            throw new NotFoundException(__('Invalid comment information'),'failflash');
        }
        $options = array('conditions' => array('Inscomment.' . $this->Inscomment->primaryKey => $id));
        $this->set('inscomments', $this->Inscomment->find('first', $options));
    }
 
 
    public function delete($id = null, $insId = null) {

        if (!$id) {
            $this->Session->setFlash(_('Invalid comment Id'),'failflash');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->Inscomment->id = $id;
        if (!$this->Inscomment->exists()) {
            $this->Session->setFlash(_('Invalid comment Id'),'failflash');
            $this->redirect(array('action'=>'index'));
        }

        if ($this->Inscomment->delete($id)) {
            $this->Session->setFlash(__('Comment deleted'),'successflash');
            $this->redirect(array('action' => 'inscomment_list', $insId));
        }

        $this->Session->setFlash(__('Comment was not deleted'),'failflash');
        $this->redirect(array('action' => 'index'));
    }
     
    public function activate($id = null, $listId = null) {
         
        if (!$id) {
            $this->Session->setFlash(_('Comment was not found.'),'failflash');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->Inscomment->id = $id;
        if (!$this->Inscomment->exists()) {
            $this->Session->setFlash(_('Comment was not found.'),'failflash');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Inscomment->saveField('approval', 1)) {
            $this->Session->setFlash(__('Comment Approved.'),'successflash');
            $this->redirect(array('action' => 'Inscomment_list', $listId));
        }
        $this->Session->setFlash(__('Comment was not approved.'),'failflash');
        $this->redirect(array('action' => 'index'));
    }
}
?>