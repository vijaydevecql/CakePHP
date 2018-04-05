<?php

App::uses('AppController', 'Controller');

/**
 * ContentMagemnets Controller
 *
 * @property ContentMagemnet $ContentMagemnet
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {

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

		$this->set('products', $this->Paginator->paginate());
		$this->loadModel('Product');
		$product_datas = $this->Product->find('all',['order' => ['Product.id desc']]);
		$this->set('product_datas',$product_datas);

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
			//prx($this->request->data);

			$success = true;
			foreach ($this->request->data['price'] as $key => $value) {
					
				$diff = abs($value) - abs($this->request->data['discount'][$key]);

				if($diff < 0){
					$success = false;
				}
			}	

			//$diff = abs($this->request->data['Product']['price']) - abs($this->request->data['Product']['discount']);
			if(!$success){
				$this->f('Discount price should be lesser or equal to price.', 'd');
			}
			else{
//prx($this->request->data);
				$product = [
					'Product' => [
						'title' => $this->request->data['Product']['title'],
						'category_id' => $this->request->data['Product']['category_id'],
						'collection_id' => $this->request->data['Product']['collection_id'],
						//'color_id' => $this->request->data['Product']['color_id'],
						'brand_id' => $this->request->data['Product']['brand_id'],
						'weave_id' => $this->request->data['Product']['weave_id'],
						'pattern_id' => $this->request->data['Product']['pattern_id'],
						//'size' => $this->request->data['Product']['size'],
						//'quantity' => $this->request->data['Product']['quantity'],
						//'price' => abs($this->request->data['Product']['price']),
						//'discount' => abs($this->request->data['Product']['discount']),
						'description' => $this->request->data['Product']['description'],
						'status' =>  1,
					]
				];
				$this->loadModel('Product');
				$_filename = '';
				if (!empty($_FILES['video']) && $_FILES['video']['size'] > 0)
                {	
                	if($_FILES['video']['size'] > 20971520){

                		$this->f('Max upload file size is 20MB.', 'd');
                		$this->redirect('/admin/products/add');
                	}
                    $_filename = $this->_upload_file($_FILES['video'],'','video');
                }

                $product['Product']['video'] = $_filename;

				if ($this->Product->save($product, ['validate' => false])) {
					$item_id = $this->Product->getLastInsertId();

					$this->loadModel('ProductVariant');

					foreach ($this->request->data['price'] as $key => $value) {
						
						$product_varient = [];

						$product_varient['product_id'] = $item_id;
						$product_varient['color_id'] 	= $this->request->data['color_id'][$key];
						$product_varient['size'] 		= $this->request->data['size'][$key];
						$product_varient['quantity'] 	= $this->request->data['quantity'][$key];
						$product_varient['discount'] 	= (@$this->request->data['discount'][$key]) ? $this->request->data['discount'][$key] : 0;
						$product_varient['price'] 		= $value;
						$product_varient['status'] 		= 1;

						$this->ProductVariant->save($product_varient);
						$this->ProductVariant->create();
					}

					$this->f('The Product has been saved.', 's');
					$this->redirect('/admin/products/edit/'.$item_id);
				}else{
					$this->f('The Product could not saved.', 'd');
				}
			}
		}
	}
	public function admin_edit($id = null){
		

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
		if($this->request->is(['post','put'])){
			//prx($_POST);
			$_save = true;
			$_filename = '';
			if (!empty($_FILES['video']) && $_FILES['video']['size'] > 0)
            {	
            	/*if($_FILES['video']['size'] > 20971520){

            		$this->f('Max upload file size is 20MB.', 'd');
            		//$this->redirect('/admin/products/add');
            		$_save = false;
            	}*/
                $_filename = $this->_upload_file($_FILES['video'],'','video');
            }

			$product = [
				'Product' => [
					'id' => $id,
					'title' => $this->request->data['Product']['title'],
					'category_id' => $this->request->data['Product']['category_id'],
					'collection_id' => $this->request->data['Product']['collection_id'],
					//'color_id' => isset($this->request->data['Product']['color_id'])?$this->request->data['Product']['color_id']:0,
					'brand_id' => isset($this->request->data['Product']['brand_id'])?$this->request->data['Product']['brand_id']:0,
					'weave_id' => isset($this->request->data['Product']['weave_id'])?$this->request->data['Product']['weave_id']:0,
					'pattern_id' => isset($this->request->data['Product']['pattern_id'])?$this->request->data['Product']['pattern_id']:0,
					//'video' => $_filename,
					//'price' => $this->request->data['Product']['price'],
					//'discount' => $this->request->data['Product']['discount'],
					'description' => $this->request->data['Product']['description'],
					'status' =>  1,
				]
			];

			if(!empty($_filename)){

				$product['Product']['video'] = $_filename;
			}

			$this->loadModel('Product');
			//if($_save){
				if ($this->Product->save($product, ['validate' => false])) {

					$this->loadModel('ProductVariant');
					if(!empty($this->request->data['price']) && is_array($this->request->data['price']) && count($this->request->data['price']) > 0 ){
						foreach ($this->request->data['price'] as $key => $value) {
											
											$product_varient = [];

											$product_varient['id'] 			= $this->request->data['variant_id'][$key];
											$product_varient['color_id'] 	= $this->request->data['color_id'][$key];
											$product_varient['size'] 		= $this->request->data['size'][$key];
											$product_varient['quantity'] 	= $this->request->data['quantity'][$key];
											$product_varient['discount'] 	= (@$this->request->data['discount'][$key]) ? $this->request->data['discount'][$key] : 0;
											$product_varient['price'] 		= $value;

											$this->ProductVariant->save($product_varient);
											$this->ProductVariant->create();
										}
					}
										

					if(!empty($this->request->data['new_price']) && is_array($this->request->data['new_price']) && count($this->request->data['new_price']) > 0 ){
						foreach ($this->request->data['new_price'] as $key => $value) {
							
							$product_varient = [];

							$product_varient['product_id'] 	= $id;
							$product_varient['color_id'] 	= $this->request->data['new_color_id'][$key];
							$product_varient['size'] 		= $this->request->data['new_size'][$key];
							$product_varient['quantity'] 	= $this->request->data['new_quantity'][$key];
							$product_varient['discount'] 	= (@$this->request->data['new_discount'][$key]) ? $this->request->data['new_discount'][$key] : 0;
							$product_varient['price'] 		= $value;
							$product_varient['status'] 		= 1;

							$this->ProductVariant->save($product_varient);
							$this->ProductVariant->create();
						}
					}
					
					$this->f('The Product has been updated.', 's');
					$this->loadModel('Product');
					$this->request->data = $this->Product->find('first', ['conditions' => ['Product.id' => $id]]);
					
				}else{
					$this->f('The Product could not updated.', 'd');
				}

			//}
		}else{
			$this->loadModel('Product');
			$this->request->data = $this->Product->find('first', ['conditions' => ['Product.id' => $id]]);
			//prx($this->request->data);
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
							'Media.product_id' => $id,
							'Media.default' => 1
						]
					]);
					if($count){
						$default = 0;
					}
					$item_media_data = [
						'Media' => [
							'product_id' => $id,
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

		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid content magemnet'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		//prx($this->Item->find('first', $options));
		$this->set('items', $this->Product->find('first', $options));
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
		$this->Product->id = $id;
		if ($this->Product->exists()) {
			$Product = $this->Product->read(null, $id);
			if ($Product['Product']['status'] == 0) {
				$return = 1;
				$Product['Product']['status'] = 1;
			} else {
				$return = 2;
				$Product['Product']['status'] = 0;
			}
			if (!$this->Product->save($Product)) {
				$return = 0;
			}
		}
		$this->set('return', $return);
	}


	function admin_updateOrder($ids = null){
		$error = 0;
		if(strlen(trim($ids))){
			$id = explode(',', $ids);
			if(count($id)){
				$this->loadModel('Media');
				$media = $this->Media->find('all',['conditions' => [
						'Media.id' => $id,
						'Media.status' => 1
					],
					'fields' => ['Media.id','Media.order']
				]);
				//$media = $this->Media->findAllByIdAndStatus($id,1);
				if(count($media)){

					$media_arrange = [];
					foreach ($media as $key => $value) {
						$media_arrange[$value['Media']['id']] = $value['Media'];
					}

					$final_data = [];
					$i = 1;
					foreach ($id as $key => $value) {
						$media_arrange[$value]['order'] = $i;
						unset($media_arrange[$value]['created']);
						unset($media_arrange[$value]['modified']);
						$final_data[]['Media'] =  $media_arrange[$value];
						$i++;
					}
					if(count($final_data)){
						
						if(!$this->Media->saveMany($final_data))
						{
							$error = 1;
						}
					}else{
						$error = 1;
					}
				}else{
					$error = 1;
				}
				
			}
		}else{
			$error = 1;
		}
		echo $error;
		die;
	}

}
