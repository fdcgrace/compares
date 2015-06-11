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
	public $uses = array('Instructor', 'Site', 'Attribute', 'Comment', 'Rating', 'Inscomment');
 

/**
 * index method
 *
 * @return void
 */

	
	public function index() {

		//initialize variable

		$attrib = $this->Rating->find('all');

		$result = array();
		$uID = '';
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
		if(empty($conditions))  $conditions = array('Instructor.del_flag' => 1);
		$this->Instructor->recursive = 0;

		$this->paginate = array(
            'limit' => 10,
            'order' => array('Instructor.id' => 'asc' ),
            'conditions' => $conditions
        );

        $instructors = $this->paginate('Instructor');

        $getUser = $this->Auth->user();
		if ($getUser) {
			$getUserID = $getUser['id'];
			if ($getUserID) {
				$this->set('userID', $getUserID);
				$uID = $getUserID;
			} else {
				$this->set('userID', '');
				$uID = '';
			}
		}

		$cond = array(
                'approval' => 1
        );

	  	$comments = $this->Inscomment->find('all', array('conditions' => $cond));
        
		//good and bad process code
		$good = $ratedGood = $ratedBad = $bad = '';
		foreach ($instructors as $key => $instructor) {
				$result[$key] = $instructor;

			foreach ($attrib as $vkey => $val) {
				$siteID = $instructor['Instructor']['id'];
		  		$attriSID = $val['Rating']['instructor_id'];
		  		$attriUID = $val['Rating']['user_id'];
		  		$attriGood = $val['Rating']['good'];
		  		$attriBad = $val['Rating']['bad'];
		  		$result[$key]['ratedBad'] = "";
		  		$result[$key]['ratedGood'] = "";
		  		$result[$key]['good'] = "";
		  		$result[$key]['bad'] = "";
		  		$result[$key]['reviews'] = "";
		  		$commnetcnt = 0;

				if ($attriSID == $siteID) {
					$result[$key][] = $val;

					if ($attriSID == $siteID) {
						$result[$key]['good'] = $good + $attriGood;
						$result[$key]['bad'] = $bad + $attriBad;
						/*$result[$key]['ratedBad'] = "";
						$result[$key]['ratedGood'] = "";*/
		  				$good = $good + $attriGood;
			  			$bad = $bad + $attriBad;
			  		}
				  		if ($attriSID == $siteID && $attriGood > 0 && $attriBad == 0 && $uID <> '') {
				  			$result[$key]['ratedGood'] = "You rate this";
				  			$result[$key]['ratedBad'] = "";
				  			$ratedGood = "You rate this";
					  	} elseif ($attriSID == $siteID && $attriBad > 0 && $attriGood == 0 && $uID <> '') {
					  		$result[$key]['ratedBad'] = "You rate this";
					  		$result[$key]['ratedGood'] = "";
				  			$ratedBad = "You rate this";
					  	}
				}
		  	}

		  	foreach($comments as $comment) {
				if ($comment['Inscomment']['instructor_id'] == $siteID) {
					$commnetcnt++;
					$result[$key]['reviews'] = $commnetcnt;
				}
		  		
		  	}
	  	}

	  	$this->set('ratings', $attrib);
		$this->set('instructors', $result);
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
		$user = $this->Auth->user();
        $commentSes = "";
        $condSes = "";
        $getRate = array();

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

        //get rate for comment
        for ($i=0; $i <= 1; $i++) {
        	$getRate[] = $this->Inscomment->find('count', 
        			array('conditions' => 
    					array(
    						'Inscomment.rate' => $i, 
    						'Inscomment.instructor_id' => $id, 
    						'Inscomment.approval' => 1
    					)
        			)
       			);
        }

        $this->set('bad', $getRate[0]);
        $this->set('good', $getRate[1]);
        $this->set('comments', $commentByID);
        $this->set('commentSes', $commentSes);
        $this->set('users', $user);
        $this->set('instructor', $siteByID);
        $this->set('sessionCheck', $sessionComment);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Instructor->create();
			if ($this->Instructor->save($this->request->data)) {
				$this->Session->setFlash(__('The instructor has been saved.'), 'successflash');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instructor could not be saved. Please, try again.'), 'failflash');
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
			throw new NotFoundException(__('Invalid instructor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Instructor->save($this->request->data)) {
				$this->Session->setFlash(__('The instructor has been saved.'), 'successflash');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instructor could not be saved. Please, try again.'), 'failflash');
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
			throw new NotFoundException(__('Invalid instructor'), 'failflash');
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Instructor->delete()) {
			$this->Session->setFlash(__('The instructor has been deleted.'), 'successflash');
		} else {
			$this->Session->setFlash(__('The instructor could not be deleted. Please, try again.'), 'failflash');
		}
		return $this->redirect(array('action' => 'index'));
	}

}
