<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class AboutsController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */

	function beforeFilter() {
		parent::beforeFilter();
	}

	function beforeRender() {
		parent::beforeRender();
		
	}
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->layout = "web";
		$video = 0;
		$about = 1;

		
		$this->loadModel('About');
		$abour_content = $this->About->findAllByStatus(1);

		
		
		
		
		 $this->set('about',$abour_content);
		 $this->set('video',$video);
		
		
		
		
/*		$this->loadModel('Content');
		$data = $this->Content->find('all',['conditions' => ['Content.page_type' => 1]]);
		

		$this->set('data',$data);*/
		
		//prx($about);



	}
}
