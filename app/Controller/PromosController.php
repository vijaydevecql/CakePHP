<?php
App::uses('AppController', 'Controller');
/**
 * RequestMethods Controller
 *
 * @property RequestMethod $RequestMethod
 * @property PaginatorComponent $Paginator
 */
class PromosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Flash');

/**
 * index method
 *
 * @return void
 */
	// public function index() {
	// 	$this->RequestMethod->recursive = 0;
	// 	$this->set('categories', $this->Paginator->paginate());
	// }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->layout = 'admin_dashboard';
		if (!$this->Promo->exists($id)) {
			throw new NotFoundException(__('Invalid RequestMethod'));
		}
		$options = array('conditions' => array('Promo.' . $this->Promo->primaryKey => $id));
		$this->set('Promo', $this->Promo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'admin_dashboard';
		$this->set('promo_data', $this->Paginator->paginate());
	}
	public function admin_add() {
			$this->layout = 'admin_dashboard';
		if ($this->request->is('post')) {
			$check_name= $this->Promo->findByName(trim($this->request->data['Promo']['name']));
			if(count($check_name) == 0){
				$this->Promo->create();
				$request = [
					'Promo' => [
						'name' => trim($this->request->data['Promo']['name']),
						'value' => trim($this->request->data['Promo']['value']),
						'type' => trim($this->request->data['Promo']['type']),
						'end_date' => strtotime(trim($this->request->data['Promo']['end_date'])),
						'status' => 1
					]
				];
				if ($this->Promo->save($request,['validate'=>false])) {
					$this->f('The Promo has been saved.', 's');
					return $this->redirect('/admin/promos');
				} else {
					$this->f('The Promo could not be saved. Please, try again.', 'd');
				}
			}else{
				$this->f('The Promo name already exists.', 'd');
			}
			
			
		}
	}
	function admin_update_status($id = null) {
		$this->layout = 'ajax';
		$return = 0;

		$this->Promo->id = $id;
		if ($this->Promo->exists()) {
			$Promo = $this->Promo->read(null, $id);

			if ($Promo['Promo']['status'] == 0) {
				$return = 1;
				$Promo['Promo']['status'] = 1;
			} else {
				$return = 2;
				$Promo['Promo']['status'] = 0;
			}
			if (!$this->Promo->save($Promo,['validate'=>false])) {
				$return = 0;
			}
		}
		$this->set('return', $return);
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->layout = 'admin_dashboard';
		if (!$this->Promo->exists($id)) {
			throw new NotFoundException(__('Invalid Promo'));
		}
		if ($this->request->is(array('post', 'put'))) {
				$request_data = $this->Promo->find('first',[
					'conditions' => [
						'Promo.name' => trim($this->request->data['Promo']['name']),
						'Promo.id !=' => $id
					]
				]);
				if(count($request_data) == 0){

					$request = [
						'Promo' => [
						'id' => trim($this->request->data['Promo']['id']),
						'name' => trim($this->request->data['Promo']['name']),
						'value' => trim($this->request->data['Promo']['value']),
						'type' => trim($this->request->data['Promo']['type']),
						'end_date' => strtotime(trim($this->request->data['Promo']['end_date'])),
						'status' => 1
					]
				];
					if ($this->Promo->save($request,['validate'=>false])) {
						$this->f('The Promo has been saved.', 's');
						return $this->redirect('/admin/promos');
					} else {
						$this->f('The Promo could not be saved. Please, try again.', 'd');
					}
				}else{
					$this->f('The Promo Method name already exists.', 'd');
				}
			
		} else {
			$options = array('conditions' => array('Promo.' . $this->Promo->primaryKey => $id));
			$this->request->data = $this->Promo->find('first', $options);
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
		$this->RequestMethod->id = $id;
		if (!$this->RequestMethod->exists()) {
			throw new NotFoundException(__('Invalid RequestMethod'));
		}
		//$this->request->allowMethod('post', 'delete');
		if ($this->RequestMethod->delete()) {
			$this->f('The RequestMethod has been deleted.', 's');
			
		} else {
			$this->f('The RequestMethod could not be deleted. Please, try again.', 'd');
			
		}
		return $this->redirect('/admin/Categories');
	}

	//function related to admin pannel
	public function admin_login($id = null) {

	}


}
