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
            'order' => array('Site.created' => 'asc' ),
            'conditions' => $conditions
        );

        $sites = $this->paginate('Site');

		$this->set('sites', $sites);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Site->exists($id)) {
			throw new NotFoundException(__('Invalid site'),'failflash');
		}
		$options = array('conditions' => array('Site.' . $this->Site->primaryKey => $id));
		$this->set('site', $this->Site->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Site->create();
			$result = array();
			$file = $this->request->data['Site']['site_image'];
			$filename = $file['name'];

			$ext = substr(strtolower(strrchr($filename, '.')), 1); //get the extension
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
            $rand = time();
            $newFilename = $rand.'_'.$filename;

            //only process if the extension is valid
            if(in_array($ext, $arr_ext)){
            	if((move_uploaded_file($file['tmp_name'],$this->sitePath.$newFilename))){

            		//resize image
            		$imageCom = new ImageComponent(new ComponentCollection());
                    $imageCom->prepare($this->sitePath.$newFilename);
                    $imageCom->resize(100,100);//width,height
                    $imageCom->save($this->sitePathThumb.$newFilename); //savethumbnail image

					$farray = $this->request->data['Site'];
					$getImage = array('site_image' => $rand.'_'.$farray['site_image']['name']);
					unset($farray['site_image']);  
					$result = array_merge($result, $farray, $getImage);

					if ($this->Site->save($result)) {
						$this->Session->setFlash(__('The site has been saved.'),'successflash');
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The site could not be saved. Please, try again.'),'failflash');
					}
				}
            }else{
            	$this->Session->setFlash(__('The site could not be saved. Only jpg, png, gif extension is allowed. Please, try again.'),'failflash');
            }
		    
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Site->exists($id)) {
			throw new NotFoundException(__('Invalid site'),'failflash');
		}
		if ($this->request->is(array('post', 'put'))) {
			$result = array();
			$file = $this->request->data['Site']['site_image'];
			$filename = $file['name'];


			if(empty($filename)){
				$farray = $this->request->data['Site'];
				$getImage = array('site_image' => $this->request->data['Site']['getimage']);
				$result = array_merge($result, $farray, $getImage);
				if ($this->Site->save($result)) {
					$this->Session->setFlash(__('The site has been saved.'),'successflash');
					return $this->redirect(array('action' => 'index'));
				} else {
					$img = $this->request->data['Site']['getimage'];
					$this->set(compact('img',$img));
					$this->Session->setFlash(__('The site could not be saved. Please, try again.'),'failflash');
				}
			}else{
				$result = array();
				$file = $this->request->data['Site']['site_image'];
				$filename = $file['name'];

				$ext = substr(strtolower(strrchr($filename, '.')), 1); //get the extension
	            $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
	            $rand = time();
            	$newFilename = $rand.'_'.$filename;

	            //only process if the extension is valid
	            if(in_array($ext, $arr_ext)){
	            	if((move_uploaded_file($file['tmp_name'],$this->sitePath.$newFilename))){
	            		//resize image
	            		$imageCom = new ImageComponent(new ComponentCollection());
	                    $imageCom->prepare($this->sitePath.$newFilename);
	                    $imageCom->resize(100,100);//width,height
	                    $imageCom->save($this->sitePathThumb.$newFilename);

						$farray = $this->request->data['Site'];
						$getImage = array('site_image' => $rand.'_'.$farray['site_image']['name']);
						unset($farray['site_image']); 
						$result = array_merge($result, $farray, $getImage);

						if ($this->Site->save($result)) {
							if(file_exists($this->sitePath.$farray['getimage'])){
								unlink($this->sitePath.$farray['getimage']);	
								unlink($this->sitePathThumb.$farray['getimage']);	
							}
							$this->Session->setFlash(__('The site has been saved.'),'successflash');
							return $this->redirect(array('action' => 'index'));
						} else {
							$img = $this->request->data['Site']['getimage'];
							$this->set(compact('img',$img));
							$this->Session->setFlash(__('The site could not be saved. Please, try again.'),'failflash');
						}
					}
	            }else{
	            	$img = $this->request->data['Site']['getimage'];
					$this->set(compact('img',$img));

	            	$this->Session->setFlash(__('The site could not be saved. Only jpg, png, gif extension is allowed. Please, try again.'),'failflash');
	            }
			}

		} else {
			$options = array('conditions' => array('Site.' . $this->Site->primaryKey => $id));
			$this->request->data = $this->Site->find('first', $options);

			$img = $this->data['Site']['site_image'];
			$this->set(compact('img',$img));
		}
		
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Site->id = $id;

		$getdata = $this->Site->find('first', array(
			'fields' => array('Site.site_image'),
			'conditions' => array('Site.id' => $id)
		));
		$getimg = $getdata['Site']['site_image'];
		if (!$this->Site->exists()) {
			throw new NotFoundException(__('Invalid site'),'failflash');
		}
		
		$this->request->allowMethod('post', 'delete');

		//if ($this->Site->delete()) {
		if ($this->Site->saveField('del_flag', 0)) {
			$this->Instructor->updateAll(
			    array('Instructor.del_flag' => 0),
			    array('Instructor.site_id' => $id)
			);
			// if(file_exists($this->sitePath.$getimg)){
			// 	unlink($this->sitePath.$getimg);	
			// 	unlink($this->sitePathThumb.$getimg);	
			// }
			$this->Session->setFlash(__('The site has been deleted.'),'infoflash');
		} else {
			$this->Session->setFlash(__('The site could not be deleted. Please, try again.'),'failflash');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
