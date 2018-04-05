<?php

App::uses('AppController', 'Controller');

/**
 * ContentMagemnets Controller
 *
 * @property ContentMagemnet $ContentMagemnet
 * @property PaginatorComponent $Paginator
 */
class SettingsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash');

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        $this->layout = "admin_dashboard";
        //$this->ContentMagements->recursive = 0;
        $this->set('Settings', $this->Paginator->paginate());
        //prx($this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Setting->exists($id)) {
            throw new NotFoundException(__('Invalid content magemnet'));
        }
        $options = array('conditions' => array('Setting' . $this->Setting->primaryKey => $id));
        $this->set('Settings', $this->Setting->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        $this->layout = "admin_dashboard";
        if ($this->request->is('post')) {
           // prx($this->request->data);
            $ContentMagements = ['ContentMagement' => [
                    'key' => trim($this->request->data['ContentMagement']['key']),
                    'value' => trim($this->request->data['ContentMagement']['value']),
                    'status' => 1,
            ]];
            if ($this->ContentMagement->save($Setting, ['validate' => false])) {

                $this->f('The content magemnet has been saved.', 's');
                return $this->redirect('/admin/ContentMagements/index');
            } else {
                $this->f('The content magemnet could not be saved. Please, try again.', 'd');
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
    public function admin_edit($id = null) {
        $this->layout = "admin_dashboard";
        if (!$this->ContentMagement->exists($id)) {
            throw new NotFoundException(__('Invalid content magemnet'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $ContentMagements = ['ContentMagement' => [
                    'key' => trim($this->request->data['ContentMagement']['key']),
                    'value' => trim($this->request->data['ContentMagement']['value']),
            ]];
            if ($this->ContentMagement->save($ContentMagements, ['validate' => false])) {
                $this->f('The content magemnet has been saved.', 's');
                return $this->redirect('/admin/ContentMagements/index');
            } else {
                $this->f('The content magemnet could not be saved. Please, try again.', 'd');
            }
        } else {
            $options = array('conditions' => array('ContentMagement.' . $this->ContentMagement->primaryKey => $id));
            $this->request->data = $this->ContentMagement->find('first', $options);
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
        $this->ContentMagement->id = $id;
        if (!$this->ContentMagement->exists()) {
            throw new NotFoundException(__('Invalid content magemnet'));
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->ContentMagement->delete()) {
            $this->f('The content magemnet has been deleted.', 's');
        } else {
            $this->f('The content magemnet could not be deleted. Please, try again.', 'd');
        }
        return $this->redirect('/admin/ContentMagements/index');
    }

    function admin_update_status($id = null) {
        $this->layout = 'ajax';
        $return = 0;
        $this->ContentMagement->id = $id;
        if ($this->ContentMagement->exists()) {
            $ContentMagement = $this->ContentMagement->read(null, $id);
            if ($ContentMagement['ContentMagement']['status'] == 0) {
                $return = 1;
                $ContentMagement['ContentMagement']['status'] = 1;
            } else {
                $return = 2;
                $ContentMagement['ContentMagement']['status'] = 0;
            }
            if (!$this->ContentMagement->save($ContentMagement)) {
                $return = 0;
            }
        }
        $this->set('return', $return);
    }

    // Test / Sample code
    function admin_ui_xedit() {
        $this->layout = "admin_dashboard";
		$settings = $this->Paginator->paginate();
        $this->set('settings', $settings);
		//prx($settings);
    }
    function admin_setting(){
        $this->layout = "admin_dashboard";
         $mes = '';
         if ($this->request->is('post')) {
           
            $this->layout = "ajax";
            $setting = [
            'Setting' => [
                'id' => $this->request->data['pk'],
                'key'=> $this->request->data['name'],
                'value'=> $this->request->data['value'],
            ]
            ];
           
            if($this->Setting->save($setting,['validate'=>false])){
                 $mes = "The Setting has been updated";
            }else{
                $mes = "The Setting could not be deleted. Please, try again.";
            }
           
        }
         $this->set('message',$mes);
    }

}
