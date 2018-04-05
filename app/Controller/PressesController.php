<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class PressesController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */

	function beforeRender() {
		parent::beforeRender();
		$this->_all_info();
	}

	function beforeFilter() {
		parent::beforeFilter();
		/**
		 * Stores array of deniable methods, without logging in.
		 */
		$this->_deny = array(
			'admin' => array(
				'admin_index',
				'admin_add',
				'admin_logout',
				'admin_edit',
				'admin_view',
				'admin_update_status',
				'admin_settings',
			),
			'user' => array(
				
			),
		);
		$this->_deny_url($this->_deny);
	}
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {


		$this->layout = "web";
		$video = 0;
		$about = 0;
		$this->set('video',$video);
		$this->set('about',$about);
		$press = $this->Press->find('all',[
				'conditions' => [
					'Press.status' => 1,

				],
				'Order' => ['Press.id DESC']
			]);
		
		$this->set('press',$press);
		
	}
	public function admin_index(){
		//$this->layout = 'admin_dashborad';
		
		$press = $this->Press->find('all',['order' => ['Press.id desc']]);
		//prx($press);
		$this->set('press',$press);

	}
	public function admin_view($id = null) {

		if (!$this->Press->exists($id)) {
			throw new NotFoundException(__('Invalid content magemnet'));
		}
		$options = array('conditions' => array('Press.' . $this->Press->primaryKey => $id));
		//prx($this->Item->find('first', $options));
		$this->set('press', $this->Press->find('first', $options));
	}
	public function admin_add(){

		//get all categories
		if ($this->request->is('post')) {
			//prx($_FILES);
				$image_info = '';
				if (isset($_FILES) && $_FILES['files']['error'] == 0) {
					$image_info = $this->_upload_file($_FILES['image'], '', 'press_photo');
				}
				$press = [
					'Press' => [
						'image' => $image_info,
						'title' => $this->request->data['Press']['title'],
						'description' => $this->request->data['Press']['description'],
						'status' => 1
						
					]
				];
				
				if ($this->Press->save($press, ['validate' => false])) {
					
					$this->f('The Press has been saved.', 's');
					$this->redirect('/admin/presses');
				}else{
					$this->f('The Press could not saved.', 'd');
				}
			}
		}
		public function admin_edit($id = nulll){

		//get all categories
		if (!$this->Press->exists($id)) {
            throw new NotFoundException(__('Invalid Press'));
        }
		if ($this->request->is(['post','put'])) {
				$data = $this->Press->find('first',[
	                'conditions' => [
		               'Press.id' => $id,
	                ]
                ]);
			
				if (isset($_FILES) && $_FILES['image']) {


                    ECHO $_fileName = $this->_upload_file($_FILES['image'], '', 'press_photo');

                    if ($_fileName) {
                        @unlink(APP . 'webroot' . DS . 'files' . DS . 'press_photo' . DS . $_fileName);
                         $data['Press']['image'] = $_fileName;
                    }
                    
                }
               
                $data['Press']['title'] = $this->request->data['Press']['title'];
                $data['Press']['description'] = $this->request->data['Press']['description'];
               // $data['Press']['status'] = $this->request->data['Press']['status'];
                //prx($data);
				
				if ($this->Press->save($data, ['validate' => false])) {
					
					$this->f('The Press has been Updated.', 's');
					$this->redirect('/admin/presses');
				}else{
					$this->f('The Press could not Updated.', 'd');
				}
			} else {
            	$options = array('conditions' => array('Press.' . $this->Press->primaryKey => $id));
            	$this->request->data = $this->Press->find('first', $options);
            // prx($this->request->data);
        	}
		}

	function admin_update_status($id = null) {
		$this->layout = 'ajax';
		$return = 0;
		$this->Press->id = $id;
		if ($this->Press->exists()) {
			$Press = $this->Press->read(null, $id);
			if ($Press['Press']['status'] == 0) {
				$return = 1;
				$Press['Press']['status'] = 1;
			} else {
				$return = 2;
				$Press['Press']['status'] = 0;
			}
			if (!$this->Press->save($Press)) {
				$return = 0;
			}
		}
		$this->set('return', $return);
	}
	
}
