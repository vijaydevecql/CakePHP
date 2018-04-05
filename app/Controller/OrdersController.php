<?php

App::uses('AppController', 'Controller');

/**
 * ContentMagemnets Controller
 *
 * @property ContentMagemnet $ContentMagemnet
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

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

	public $components = array('Paginator', 'Flash');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->set('orders', $this->Paginator->paginate());
		$this->loadModel('Order');
		$Order_datas = $this->Order->find('all',['order' => ['Order.id desc']]);
		// prx($Order_datas);
		$this->set('Order_datas',$Order_datas);

	}
	public function admin_add(){
		//get all categories
		$this->loadModel('Category');
		$categories = $this->Category->find('all', ['conditions' => ['Category.status' => 1]]);
		$this->loadModel('Color');
		$colors = $this->Color->find('all', ['conditions' => ['Color.status' => 1]]);
		$this->loadModel('Brand');
		$brands = $this->Brand->find('all', ['conditions' => ['Brand.status' => 1]]);
		$this->loadModel('Weave');
		$weaves = $this->Weave->find('all', ['conditions' => ['Weave.status' => 1]]);
		$this->loadModel('Pattern');
		$patterns = $this->Pattern->find('all', ['conditions' => ['Pattern.status' => 1]]);
       	//get all Collection
		$this->loadModel('Collection');
		$collections = $this->Collection->find('all', ['conditions' => ['Collection.status' => 1]]);

		$this->set(array('categories' => $categories, 'collections' => $collections,'colors' => $colors,'brands' => $brands,'weaves' => $weaves,'patterns' => $patterns ));

		if ($this->request->is('post')) {
			//prx($_POST);
			$diff = abs($this->request->data['Order']['price']) - abs($this->request->data['Order']['discount']);

			if($diff < 0){
				$this->f('Discount price should be lesser or equal to price.', 'd');
			}else{
//prx($this->request->data);
				$Order = [
					'Order' => [
						'title' => $this->request->data['Order']['title'],
						'category_id' => $this->request->data['Order']['category_id'],
						'collection_id' => $this->request->data['Order']['collection_id'],
						'color_id' => $this->request->data['Order']['color_id'],
						'brand_id' => $this->request->data['Order']['brand_id'],
						'weave_id' => $this->request->data['Order']['weave_id'],
						'pattern_id' => $this->request->data['Order']['pattern_id'],
						'size' => $this->request->data['Order']['size'],
						'quantity' => $this->request->data['Order']['quantity'],
						'price' => abs($this->request->data['Order']['price']),
						'discount' => abs($this->request->data['Order']['discount']),
						'description' => $this->request->data['Order']['description'],
						'status' =>  1,
					]
				];
				$this->loadModel('Order');
				if ($this->Order->save($Order, ['validate' => false])) {
					$item_id = $this->Order->getLastInsertId();
					$this->f('The Order has been saved.', 's');
					$this->redirect('/admin/orders');
				}else{
					$this->f('The Order could not saved.', 'd');
				}
			}
		}
	}
	public function admin_edit($id = null){



		//get all categories
		$this->loadModel('Category');
		$categories = $this->Category->find('all', ['conditions' => ['Category.status' => 1]]);

       	//get all Collection
		$this->loadModel('Collection');
		$collections = $this->Collection->find('all', ['conditions' => ['Collection.status' => 1]]);

		$this->set(array('categories' => $categories, 'collections' => $collections));
		if($this->request->is(['post','put'])){

			$Order = [
				'Order' => [
					'title' => $this->request->data['Order']['title'],
					'category_id' => $this->request->data['Order']['category_id'],
					'collection_id' => $this->request->data['Order']['collection_id'],
					'color_id' => isset($this->request->data['Order']['color_id'])?$this->request->data['Order']['color_id']:0,
					'brand_id' => isset($this->request->data['Order']['brand_id'])?$this->request->data['Order']['brand_id']:0,
					'weave_id' => isset($this->request->data['Order']['weave_id'])?$this->request->data['Order']['weave_id']:0,
					'pattern_id' => isset($this->request->data['Order']['pattern_id'])?$this->request->data['Order']['pattern_id']:0,
					'quantity' => $this->request->data['Order']['quantity'],
					'price' => $this->request->data['Order']['price'],
					'discount' => $this->request->data['Order']['discount'],
					'description' => $this->request->data['Order']['description'],
					'status' =>  1,
				]
			];

			$this->loadModel('Order');
			if ($this->Order->save($Order, ['validate' => false])) {
				$this->f('The Order has been updated.', 's');
			}else{
				$this->f('The Order could not updated.', 'd');
			}
		}else{
			$this->loadModel('Order');
			$this->request->data = $this->Order->find('first', ['conditions' => ['Order.id' => $id]]);
		}

	}
	function admin_item_media($id = null) {
		$media_data = [];

		if (isset($id) && !empty($id)) {

			if ($_FILES['files']['error'] == 0) {
				$image_info = $this->_upload_file($_FILES['files'], '', 'item_other_photo');
				if (isset($image_info) && !empty($image_info)) {
					$this->loadModel('Media');
					$default = 1;
					$count = $this->Media->find('count',[
						'conditions' => [
							'Media.Order_id' => $id,
							'Media.default' => 1
						]
					]);
					if($count){
						$default = 0;
					}
					$item_media_data = [
						'Media' => [
							'Order_id' => $id,
							'image' => $image_info,
							'status' => 1,
							'default' => $default
						]
					];
                    //$this->loadModel('Media');
					if ($this->Media->save($item_media_data, ['validate' => false])) {
						$media_id = $this->Media->getLastInsertId();
						$media_data = $this->Media->find('first', ['conditions' => ['Media.id' => $media_id]]);
					//prx($media_data);
					} else {
						$media_data = [];
					}
				}
			}
		}
		$this->set('media_data', $media_data);
	}
	function admin_delete_media($id = null) {
		$mes = '';
		if (isset($id) && !empty($id)) {
			$this->loadModel("Media");
			$this->Media->id = $id;
            // App::uses('Media', 'Model');
            // $event_media = new Media();
            // $event_media->id = $id;

			if ($this->Media->delete()) {
				$mes = $id;
			} else {
				$mes = 0;
			}
		}
		$this->set('message', $mes);
	}

	// function _get_item($userid){
	// 	$conditions = [];
	// 	if(!empty($userid)){


	// 	}else{
	// 		$conditions = [
 //             'Item.status' => 1,
 //            ];

	// 	}

 //     	$this->Item->recursive = 2;

 //     	$this->set('items', $this->Paginator->paginate());
 //    }
	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid content magemnet'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		//prx($this->Item->find('first', $options));
		$this->set('items', $this->Order->find('first', $options));
	}

	// public function slug_view($slug = null) {
	//     $this->layout = 'cms_page';
	//     if (!empty($slug)) {
	//         $slug = strtolower(trim($slug));
	//          $cms = $this->ContentManagement->find('first', ['conditions' => ['ContentManagement.slug' => $slug, 'ContentManagement.status' => 1]
	//         ]);
	//         $this->set('cms', $cms);
	//     }
	// }

	/**
	 * add method
	 *
	 * @return void
	 */
	// public function admin_add() {
	//     $this->layout = "admin_dashboard";
	//     if ($this->request->is('post')) {
	//         // prx($this->request->data);
	//         $slug_name = preg_replace('/\s+/', '-', trim($this->request->data['ContentManagement']['key']));
	//         $ContentManagements = ['ContentManagement' => [
	//                 'slug' => $slug_name,
	//                 'key' => strtolower(trim($this->request->data['ContentManagement']['key'])),
	//                 'value' => trim($this->request->data['ContentManagement']['value']),
	//                 'status' => 1,
	//         ]];
	//         if ($this->ContentManagement->save($ContentManagements, ['validate' => false])) {
	//             $this->f('The content magemnet has been saved.', 's');
	//             return $this->redirect('/admin/cms');
	//         } else {
	//             $this->f('The content magemnet could not be saved. Please, try again.', 'd');
	//         }
	//     }
	// }

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	// public function admin_edit($id = null) {
	//     $this->layout = "admin_dashboard";
	//     if (!$this->ContentManagement->exists($id)) {
	//         throw new NotFoundException(__('Invalid content magemnet'));
	//     }
	//     if ($this->request->is(array('post', 'put'))) {
	//         $ContentManagements = ['ContentManagement' => [
	//                 'id' => $id,
	//                 'key' => trim($this->request->data['ContentManagement']['key']),
	//                 'value' => trim($this->request->data['ContentManagement']['value']),
	//         ]];
	//         if ($this->ContentManagement->save($ContentManagements, ['validate' => false])) {
	//             $this->f('The content magemnet has been saved.', 's');
	//             return $this->redirect('/admin/cms');
	//         } else {
	//             $this->f('The content magemnet could not be saved. Please, try again.', 'd');
	//         }
	//     } else {
	//         $options = array('conditions' => array('ContentManagement.' . $this->ContentManagement->primaryKey => $id));
	//         $this->request->data = $this->ContentManagement->find('first', $options);
	//     }
	// }

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	// public function delete($id = null) {
	//     $this->ContentManagement->id = $id;
	//     if (!$this->ContentManagement->exists()) {
	//         throw new NotFoundException(__('Invalid content magemnet'));
	//     }
	//     //$this->request->allowMethod('post', 'delete');
	//     if ($this->ContentManagement->delete()) {
	//         $this->f('The content magemnet has been deleted.', 's');
	//     } else {
	//         $this->f('The content magemnet could not be deleted. Please, try again.', 'd');
	//     }
	//     return $this->redirect('/admin/cms');
	// }

	function admin_update_status($id = null) {
		$this->layout = 'ajax';
		$return = 0;
		$this->Order->id = $id;
		if ($this->Order->exists()) {
			$Order = $this->Order->read(null, $id);
			if ($Order['Order']['status'] == 0) {
				$return = 1;
				$Order['Order']['status'] = 1;
			} else {
				$return = 2;
				$Order['Order']['status'] = 0;
			}
			if (!$this->Order->save($Order)) {
				$return = 0;
			}
		}
		$this->set('return', $return);
	}

}
