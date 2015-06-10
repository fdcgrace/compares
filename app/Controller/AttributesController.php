<?php
App::uses('AppController', 'Controller');
/**
 * Attributes Controller
 *
 * @property Attribute $Attribute
 * @property PaginatorComponent $Paginator
 */
class AttributesController extends AppController {
	public $uses = array('Site', 'Attribute', 'User');
	var $helpers = array('Js' => array('Jquery'), 'Html', 'Ajax');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function index() {
		var_dump($this->Attribute->find('all'));
	}

	public function good($id = null) {
		$getUser = $this->Auth->user();

		$cond = array('user_id' => $getUser['id']);
		$output = $this->Attribute->find('first', array('conditions' => $cond));
		//var_dump($output); die();
		
		if ($id) {
			
			$result = array(
				'site_id' => $id,
				'good' => 1,
				'user_id' => $getUser['id']
				);
		
			if ($this->Auth->user()) {
				$this->Attribute->create();
				if ($this->Attribute->save($result)) {
					return $this->redirect(array('controller' => 'sites', 'action' => 'index'));
				} 
			}
		}
	}

	public function bad($id = null) {
		if ($id) {
			$getUser = $this->Auth->user();
	
			$result = array(
				'site_id' => $id,
				'bad' => 1,
				'user_id' => $getUser['id']
				);
		
			if ($this->Auth->user()) {
				$this->Attribute->create();
				if ($this->Attribute->save($result)) {
					return $this->redirect(array('controller' => 'sites', 'action' => 'index'));
				}
			}
		}
	}
}
