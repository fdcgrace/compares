<?php
App::uses('AppController', 'Controller');
/**
 * Ratings Controller
 *
 * @property Rating $Rating
 * @property PaginatorComponent $Paginator
 */
class RatingsController extends AppController {
	public $uses = array('Instructor', 'Rating', 'User');
	var $helpers = array('Js' => array('Jquery'), 'Html', 'Ajax');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function index() {
		var_dump($this->Rating->find('all'));
	}

	public function good($id = null) {
		$getUser = $this->Auth->user();

		$cond = array('user_id' => $getUser['id']);
		$output = $this->Rating->find('first', array('conditions' => $cond));
		
		if ($id) {
			
			$result = array(
				'instructor_id' => $id,
				'good' => 1,
				'user_id' => $getUser['id']
				);
		
			if ($this->Auth->user()) {
				$this->Rating->create();
				if ($this->Rating->save($result)) {
					return $this->redirect(array('controller' => 'instructors', 'action' => 'index'));
				} 
			}
		}
	}

	public function bad($id = null) {
		if ($id) {
			$getUser = $this->Auth->user();
	
			$result = array(
				'instructor_id' => $id,
				'bad' => 1,
				'user_id' => $getUser['id']
				);
		
			if ($this->Auth->user()) {
				$this->Rating->create();
				if ($this->Rating->save($result)) {
					return $this->redirect(array('controller' => 'instructors', 'action' => 'index'));
				}
			}
		}
	}

}
