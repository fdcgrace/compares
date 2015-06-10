<?php
App::uses('AppController', 'Controller');
/**
 * Instructors Controller
 *
 * @property Instructor $Instructor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InstructorsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $uses = array('Instructor', 'Site');
 

/**
 * index method
 *
 * @return void
 */

	
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
								array('Instructor.e_name LIKE' => '%' . $value . '%'),
								array('Instructor.k_name LIKE' => '%' . $value . '%'),
								array('Instructor.speak_japanese LIKE' => '%' . $value . '%')
								),
							'AND' => array('Instructor.del_flag' => 1)
						);
					} else {
						$conditions['Instructor.'.$param_name] = $value; 
					}					
					$this->request->data['Filter'][$param_name] = $value;
				}
			}
		}
		
		if(empty($conditions))  $conditions = array('Instructor.del_flag'=> 1);
		$this->Instructor->recursive = 0;

		$this->paginate = array(
            'limit' => 10,
            'order' => array('Instructor.id' => 'asc' ),
            'conditions' => $conditions
        );

        $instructors = $this->paginate('Instructor');

		$this->set('instructors', $instructors);

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Instructor->exists($id)) {
			throw new NotFoundException(__('Invalid instructor'));
		}
		$options = array('conditions' => array('Instructor.' . $this->Instructor->primaryKey => $id));
		$this->set('instructor', $this->Instructor->find('first', $options));

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set('age','');
		$this->set('birthdate','');
		if ($this->request->is('post')) {
			$this->Instructor->create();
			if ($this->Instructor->save($this->request->data)) {
				$this->Session->setFlash(__('The instructor has been saved.'),'successflash');
				return $this->redirect(array('action' => 'index'));
			} else {
				$birthdate = $this->request->data['Instructor']['birthdate'];
				$this->set(compact('birthdate', $birthdate));
				$age = $this->request->data['Instructor']['age'];
				$this->set(compact('age', $age));
				$this->Session->setFlash(__('The instructor could not be saved. Please, try again.'),'failflash');
			}
		}
		$sites = $this->Instructor->Site->find('list', array(
			'fields' => array(
				'site_name'
				)
			)
		);
		$this->set(compact('sites'));
		// gender
		$gender = $this->gender;
		$this->set(compact('gender', $gender));
		// speak_japanese
		$speak_japanese = $this->speak_japanese;
		$this->set(compact('speak_japanese', $speak_japanese));
		// evaluation
		$evaluation = $this->evaluation;
		$this->set(compact('evaluation', $evaluation));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		
		if (!$this->Instructor->exists($id)) {
			throw new NotFoundException(__('Invalid instructor'),'infoflash');
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Instructor->save($this->request->data)) {
				$this->Session->setFlash(__('The instructor has been saved.'),'successflash');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instructor could not be saved. Please, try again.'),'failflash');
			}
		} else {
			$options = array('conditions' => array('Instructor.' . $this->Instructor->primaryKey => $id));
			$this->request->data = $this->Instructor->find('first', $options);
		}
		//affiliated site
		$sites = $this->Instructor->Site->find('list', array(
			'fields' => array(
				'site_name'
				)
			)
		);
		$this->set(compact('sites'));
		// gender
		$getgender = $this->data['Instructor']['gender'];
		$this->set(compact('getgender', $getgender));
		$gender = $this->gender;
		$this->set(compact('gender', $gender));
		// speak_japanese
		$get_speak_japanese = $this->data['Instructor']['speak_japanese'];
		$this->set(compact('get_speak_japanese', $get_speak_japanese));
		$speak_japanese = $this->speak_japanese;
		$this->set(compact('speak_japanese', $speak_japanese));
		// evaluation
		$get_evaluation = $this->data['Instructor']['evaluation'];
		$this->set(compact('get_evaluation', $get_evaluation));
		$evaluation = $this->evaluation;
		$this->set(compact('evaluation', $evaluation));
		// evaluation
		$get_birthdate = $this->data['Instructor']['birthdate'];
		$this->set(compact('get_birthdate', $get_birthdate));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Instructor->id = $id;
		if (!$this->Instructor->exists()) {
			throw new NotFoundException(__('Invalid instructor'),'failflash');
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Instructor->delete()) {
			$this->Session->setFlash(__('The instructor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The instructor could not be deleted. Please, try again.'),'failflash');
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Instructor->recursive = 0;
		$this->set('instructors', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Instructor->exists($id)) {
			throw new NotFoundException(__('Invalid instructor'));
		}
		$options = array('conditions' => array('Instructor.' . $this->Instructor->primaryKey => $id));
		$this->set('instructor', $this->Instructor->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Instructor->create();
			if ($this->Instructor->save($this->request->data)) {
				$this->Session->setFlash(__('The instructor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instructor could not be saved. Please, try again.'));
			}
		}
		$sites = $this->Instructor->Site->find('list', array(
			'fields' => array(
				'site_name'
				)
			)
		);
		$this->set(compact('sites'));
		// gender
		$gender = $this->gender;
		$this->set(compact('gender', $gender));
		// speak_japanese
		$speak_japanese = $this->speak_japanese;
		$this->set(compact('speak_japanese', $speak_japanese));
		// evaluation
		$evaluation = $this->evaluation;
		$this->set(compact('evaluation', $evaluation));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Instructor->exists($id)) {
			throw new NotFoundException(__('Invalid instructor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Instructor->save($this->request->data)) {
				$this->Session->setFlash(__('The instructor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instructor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Instructor.' . $this->Instructor->primaryKey => $id));
			$this->request->data = $this->Instructor->find('first', $options);
		}
		//affiliated site
		$sites = $this->Instructor->Site->find('list', array(
			'fields' => array(
				'site_name'
				)
			)
		);
		$this->set(compact('sites'));
		// gender
		$getgender = $this->data['Instructor']['gender'];
		$this->set(compact('getgender', $getgender));
		$gender = $this->gender;
		$this->set(compact('gender', $gender));
		// speak_japanese
		$get_speak_japanese = $this->data['Instructor']['speak_japanese'];
		$this->set(compact('get_speak_japanese', $get_speak_japanese));
		$speak_japanese = $this->speak_japanese;
		$this->set(compact('speak_japanese', $speak_japanese));
		// evaluation
		$get_evaluation = $this->data['Instructor']['evaluation'];
		$this->set(compact('get_evaluation', $get_evaluation));
		$evaluation = $this->evaluation;
		$this->set(compact('evaluation', $evaluation));
		// evaluation
		$get_birthdate = $this->data['Instructor']['birthdate'];
		$this->set(compact('get_birthdate', $get_birthdate));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Instructor->id = $id;
		if (!$this->Instructor->exists()) {
			throw new NotFoundException(__('Invalid instructor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Instructor->delete()) {
			$this->Session->setFlash(__('The instructor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The instructor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
