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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Site->recursive = 0;
		$this->set('sites', $this->Paginator->paginate());
		$dir = $this->retrieveSite;
		$this->set(compact('dir',$dir));
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
		$dir = $this->retrieveSite;
		$this->set(compact('dir',$dir));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function add() {
		$folderToSaveFiles = $this->sitePath;

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
            	if((move_uploaded_file($file['tmp_name'],$folderToSaveFiles.$newFilename))){

            		//resize image
            		$imageCom = new ImageComponent(new ComponentCollection());
                    $imageCom->prepare($folderToSaveFiles.$newFilename);
                    $imageCom->resize(100,100);//width,height,Red,Green,Blue
                    $imageCom->save($this->sitePathThumb.$newFilename);

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
		$folderToSaveFiles = $this->sitePath;
		$dir = $this->retrieveSite;
		$this->set(compact('dir',$dir));

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
	            $newFilename = time().'_'.$filename;

	            //only process if the extension is valid
	            if(in_array($ext, $arr_ext)){

	            	if((move_uploaded_file($file['tmp_name'],$folderToSaveFiles.$newFilename))){

	            		//resize image
	            		$imageCom = new ImageComponent(new ComponentCollection());
	                    $imageCom->prepare($folderToSaveFiles.$newFilename);
	                    $imageCom->resize(100,100);//width,height,Red,Green,Blue
	                    $imageCom->save($this->sitePathThumb.$newFilename);

						$farray = $this->request->data['Site'];
						$getImage = array('site_image' => time().'_'.$farray['site_image']['name']);
						unset($farray['site_image']); 

						$result = array_merge($result, $farray, $getImage);

						//var_dump($result); die();
						if ($this->Site->save($result)) {
							if(file_exists($folderToSaveFiles.$farray['getimage'])){
								unlink($folderToSaveFiles.$farray['getimage']);	
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

	            	$this->Session->setFlash(__('The site could not be saved. Only jpg, png, gif extension is allowed. Please, try again. 123'),'failflash');
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

		if ($this->Site->delete()) {
			if(file_exists($this->sitePath.$getimg)){
				unlink($this->sitePath.$getimg);	
				unlink($this->sitePathThumb.$getimg);	
			}
			$this->Session->setFlash(__('The site has been deleted.'),'infoflash');
		} else {
			$this->Session->setFlash(__('The site could not be deleted. Please, try again.'),'failflash');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
