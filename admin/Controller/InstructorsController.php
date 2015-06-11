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
	public $components = array('Paginator', 'Session', 'Image');
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
					if($param_name == "Search" || $param_name == "gender" || $param_name == "address"){
						$conditions2 = $conditions3 = array();
						if($param_name == "gender"){
							$conditions1 = array('Instructor.gender ' => $value);
						}
						if($param_name == "address"){
							$conditions2 =   array('Instructor.address ' => $value);
						}
						$conditions3 = array('Instructor.del_flag ' => 1);
						
						if(!empty($conditions1) || (!empty($conditions2)) )
						$conditions['AND'] = array_merge($conditions1, $conditions2, $conditions3);
						if($param_name == "Search"){
							$conditions['OR'] = array(
								array('Instructor.e_name LIKE' => '%' . $value . '%'),
								array('Instructor.k_name LIKE' => '%' . $value . '%'),
								array('Site.site_name LIKE' => '%' . $value . '%')
							);
						}
					} else {
						$conditions['Instructor.'.$param_name] = $value; 
					}					
					$this->request->data['Filter'][$param_name] = $value;
				}
			}
		}
		$address = $this->Instructor->find('list', array(
            'fields' => array('address'),
            'conditions' => array('not' => array('address' => null), 'Instructor.del_flag' => 1)
			)
		);
		$this->set(compact('address', $address));
		
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
			$result = array();
			$file = $this->request->data['Instructor']['image'];
			$filename = $file['name'];

			$ext = substr(strtolower(strrchr($filename, '.')), 1); //get the extension
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
            $rand = time();
            $newFilename = $rand.'_'.$filename;

            //only process if the extension is valid
            if(in_array($ext, $arr_ext)){
            	if((move_uploaded_file($file['tmp_name'],$this->insPath.$newFilename))){

            		//resize image
            		$imageCom = new ImageComponent(new ComponentCollection());
                    $imageCom->prepare($this->insPath.$newFilename);
                    $imageCom->resize(100,100);//width,height
                    $imageCom->save($this->insPathThumb.$newFilename); //savethumbnail image

					$farray = $this->request->data['Instructor'];
					$getImage = array('image' => $rand.'_'.$farray['image']['name']);
					unset($farray['image']);  
					$result = array_merge($result, $farray, $getImage);

					if ($this->Instructor->save($result)) {
						$this->Session->setFlash(__('The instructor has been saved.'),'successflash');
						return $this->redirect(array('action' => 'index'));
					} else {
						$birthdate = $this->request->data['Instructor']['birthdate'];
						$this->set(compact('birthdate', $birthdate));
						$age = $this->request->data['Instructor']['age'];
						$this->set(compact('age', $age));
						$this->Session->setFlash(__('Instructor could not be saved. Please, try again.'),'failflash');
					}
				}
            }else{
            	$birthdate = $this->request->data['Instructor']['birthdate'];
				$this->set(compact('birthdate', $birthdate));
				$age = $this->request->data['Instructor']['age'];
				$this->set(compact('age', $age));
            	$this->Session->setFlash(__('Instructor could not be saved. Only jpg, png, gif extension is allowed. Please, try again.'),'failflash');
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
			throw new NotFoundException(__('Invalid instructor information'),'infoflash');
		}
			
		if ($this->request->is(array('post', 'put'))) {
			$result = array();
			$file = $this->request->data['Instructor']['image'];
			$filename = $file['name'];

			if(empty($filename)){
				$farray = $this->request->data['Instructor'];
				$getImage = array('image' => $this->request->data['Instructor']['getimage']);
				$result = array_merge($result, $farray, $getImage);
				if ($this->Instructor->save($result)) {
					$this->Session->setFlash(__('The instructor has been saved.'),'successflash');
					return $this->redirect(array('action' => 'index'));
				} else {
					$img = $this->request->data['Instructor']['getimage'];
					$this->set(compact('img',$img));
					$this->Session->setFlash(__('The instructor could not be saved. Please, try again.'),'failflash');
				}
			} else {

				$result = array();
				$file = $this->request->data['Instructor']['image'];
				$filename = $file['name'];

				$ext = substr(strtolower(strrchr($filename, '.')), 1); //get the extension
	            $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
	            $rand = time();
            	$newFilename = $rand.'_'.$filename;

            	//only process if the extension is valid
	            if(in_array($ext, $arr_ext)){
	            	if((move_uploaded_file($file['tmp_name'],$this->insPath.$newFilename))){
	            		//resize image
	            		$imageCom = new ImageComponent(new ComponentCollection());
	                    $imageCom->prepare($this->insPath.$newFilename);
	                    $imageCom->resize(100,100);//width,height
	                    $imageCom->save($this->insPathThumb.$newFilename);

						$farray = $this->request->data['Instructor'];
						$getImage = array('image' => $rand.'_'.$farray['image']['name']);
						unset($farray['image']); 
						$result = array_merge($result, $farray, $getImage);

						if ($this->Instructor->save($result)) {
							if(!empty($farray['getimage'])){
								if(file_exists($this->insPath.$farray['getimage'])){
									unlink($this->insPath.$farray['getimage']);	
									unlink($this->insPathThumb.$farray['getimage']);	
								}	
							}
							
							$this->Session->setFlash(__('The instructor has been saved.'),'successflash');
							return $this->redirect(array('action' => 'index'));
						} else {
							unlink($this->insPath.$newFilename);	
							unlink($this->insPathThumb.$newFilename);
							$img = $this->request->data['Instructor']['getimage'];
							$this->set(compact('img',$img));
							$this->Session->setFlash(__('The site could not be saved. Please, try again.'),'failflash');
						}
					}
	            }else{
	            	$img = $this->request->data['Instructor']['getimage'];
					$this->set(compact('img',$img));

	            	$this->Session->setFlash(__('Instructor could not be saved. Only jpg, png, gif extension is allowed. Please, try again.'),'failflash');
	            }

			}

		} else {
			$options = array('conditions' => array('Instructor.' . $this->Instructor->primaryKey => $id));
			$this->request->data = $this->Instructor->find('first', $options);

			$img = $this->data['Instructor']['image'];
			$this->set(compact('img',$img));
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
			throw new NotFoundException(__('Invalid instructor information'),'failflash');
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Instructor->delete()) {
			$this->Session->setFlash(__('The instructor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The instructor could not be deleted. Please, try again.'),'failflash');
		}
		return $this->redirect(array('action' => 'index'));
	}

}
