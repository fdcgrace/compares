<?php
App::uses('AppController', 'Controller');
/**
 * Sites Controller
 *
 * @property Site $Site
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SitesController extends AppController {
	public $uses = array('Attribute', 'Site', 'User', 'Comment', 'Instructor');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->user();
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//initialize variable
		$attrib = $this->Attribute->find('all');
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
						$conditions['OR'] = array(
							array('Site.site_name LIKE' => '%' . $value . '%'),
							array('Site.company_name LIKE' => '%' . $value . '%'),
							array('Site.site_url_display LIKE' => '%' . $value . '%'),
							array('Site.site_url_link LIKE' => '%' . $value . '%'),
							array('Site.del_flag'=> 1)
						);
					} else {
						$conditions['Site.'.$param_name] = $value; 
					}					
					$this->request->data['Filter'][$param_name] = $value;
				}
			}
			$conditions = array('Site.del_flag'=> 1);
		}

		$this->Site->recursive = 0;

		$this->paginate = array(
            'limit' => 10,
            'order' => array('Site.id' => 'asc' ),
            'conditions' => $conditions
        );

        $sites = $this->paginate('Site');

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

	  	$comments = $this->Comment->find('all', array('conditions' => $cond));
        
		//good and bad process code
		$good = $ratedGood = $ratedBad = $bad = '';
		foreach ($sites as $key => $site) {
				$result[$key] = $site;
			foreach ($attrib as $vkey => $val) {
				$siteID = $site['Site']['id'];
		  		$attriSID = $val['Attribute']['site_id'];
		  		$attriUID = $val['Attribute']['user_id'];
		  		$attriGood = $val['Attribute']['good'];
		  		$attriBad = $val['Attribute']['bad'];
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
			  			//var_dump($attriUID." - ".$uID);
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
				if ($comment['Comment']['site_id'] == $siteID) {
					$commnetcnt++;
					$result[$key]['reviews'] = $commnetcnt;
				}
		  		
		  	}
	  	}

	  	$this->set('attributes', $attrib);
		$this->set('sites', $result);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$conditions = $join = "";
		if (!$this->Site->exists($id)) {
			//throw new NotFoundException(__('Invalid site'));
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
				$id = $this->params['named']['site_id']; 
				foreach($this->params['named'] as $param_name => $value){
					if(!in_array($param_name, array('page','sort','direction','limit'))){
						if($param_name == "Search"){
							$conditions['AND'] = array(
								array('Instructor.e_name LIKE' => '%' . $value . '%'),
								array('Instructor.site_id' => $id),
								array('Site.id' => $id)
							);
							break;
						} else {
							$conditions['AND'] = array(
								array('Instructor.site_id' => $id),
								array('Site.id' => $id)
							);
						}				
						$this->request->data['Filter'][$param_name] = $value;
					}
				}
			}
		} else {
			$conditions['AND'] = array(
				array('Instructor.site_id' => $id),
				array('Site.id' => $id)
			);
		}

		//$this->Site->recursive = 0;

		/*$this->paginate = array(
            'limit' => 10,
            //'order' => array('Site.id' => 'asc' ),
            'contain' => $conditions
        );

        $sites = $this->paginate('Site');

		$default = array('conditions' => array('Site.' . $this->Site->primaryKey => $id));*/
		$options = array('conditions' => $conditions);
		$result = $this->Instructor->find('all', $options);
		
		if ($result) {
			$this->set('site', $result);
		} else {
			$options = array('conditions' => array('Site.' . $this->Site->primaryKey => $id));
			//$result = $this->Site->find('first', $options);
			$this->set('sites', $this->Site->find('first', $options));
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Site->create();
			if ($this->Site->save($this->request->data)) {
				$this->Session->setFlash(__('The site has been saved.'), 'successflash');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site could not be saved. Please, try again.'), 'failflash');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Site->exists($id)) {
			throw new NotFoundException(__('Invalid site'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Site->save($this->request->data)) {
				$this->Session->setFlash(__('The site has been saved.'), 'successflash');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site could not be saved. Please, try again.'), 'failflash');
			}
		} else {
			$options = array('conditions' => array('Site.' . $this->Site->primaryKey => $id));
			$this->request->data = $this->Site->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Site->id = $id;
		if (!$this->Site->exists()) {
			throw new NotFoundException(__('Invalid site'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Site->delete()) {
			$this->Session->setFlash(__('The site has been deleted.'), 'successflash');
		} else {
			$this->Session->setFlash(__('The site could not be deleted. Please, try again.'), 'failflash');
		}
		return $this->redirect(array('action' => 'index'));
	}

}
