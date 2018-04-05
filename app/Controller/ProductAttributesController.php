<?php

App::uses('AppController', 'Controller');

/**
 * Categorys Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class ProductAttributesController extends AppController {

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
    public function index() {
        $this->Category->recursive = 0;
        $this->set('categories', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//    public function admin_view($id = null) {
//        $this->layout = 'admin_dashboard';
//        if (!$this->Category->exists($id)) {
//            throw new NotFoundException(__('Invalid Category'));
//        }
//        $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
//        $this->set('Category', $this->Category->find('first', $options));
//    }

    /**
     * add method
     *
     * @return void
     */
    

    public function admin_colors() {

        $this->layout = 'admin_dashboard';
        $this->loadModel('Color');
        /* $this->Color->recursive = 0;*/
        // prx($this->Paginator->paginate());
        $colors = $this->Color->find('all',['order' =>['Color.id desc']]);
        $this->set('colors',$colors);
       /*$this->set('colors', $this->Paginator->paginate());
*/


   }


   public function admin_color_add() {
    $this->layout = 'admin_dashboard';
    $this->loadModel('Color');
    if ($this->request->is('post')) {
        $title_exits = $this->Color->findByName(trim($this->request->data['Color']['name']));
        if(count($title_exits)){
            $this->f('Color Name Already exists', 'd');
        }else{
           // prx($this->request->data);
            $Colors = [
                'Color' => [
                    'name' => strtoupper($this->request->data['Color']['name']),
                    'color_code' =>$this->request->data['Color']['color_code'], 
                    'status' => 1,
                ]
            ];
            //prx($Colors);
            if ($this->Color->save($Colors, ['validate' => false])) {

                $this->f('The Color has been saved.', 's');
                $this->redirect('/admin/colors');
            } else {
                $this->f('The Color has not been saved.', 'd');
            }
        }


    }
}



function admin_update_status($id = null) {
    $this->layout = 'ajax';
    $return = 0;
    $this->loadModel('Color');
    $this->Color->id = $id;
    if ($this->Color->exists()) {
        $Color = $this->Color->read(null, $id);

        if ($Color['Color']['status'] == 0) {
            $return = 1;
            $Color['Color']['status'] = 1;
        } else {
            $return = 2;
            $Color['Color']['status'] = 0;
        }
        if (!$this->Color->save($Color, ['validate' => false])) {
            $return = 0;
        }
    }
    $this->set('return', $return);
}
function brand_update_status($id = null) {
    $this->layout = 'ajax';
    $return = 0;
    $this->loadModel('Brand');
    $this->Brand->id = $id;
    if ($this->Brand->exists()) {
        $Brand = $this->Brand->read(null, $id);

        if ($Brand['Brand']['status'] == 0) {
            $return = 1;
            $Brand['Brand']['status'] = 1;
        } else {
            $return = 2;
            $Brand['Brand']['status'] = 0;
        }
        if (!$this->Brand->save($Brand, ['validate' => false])) {
            $return = 0;
        }
    }
    $this->set('return', $return);
}
public function admin_color_view($id = null) {
    $this->layout = 'admin_dashboard';
    $this->loadModel('Color');
    if (!$this->Color->exists($id)) {
        throw new NotFoundException(__('Invalid Color id'));
    }
    $options = array('conditions' => array('Color.' . $this->Color->primaryKey => $id));
        //prx($this->Item->find('first', $options));
    $this->set('colors', $this->Color->find('first', $options));
}
    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_color_edit($id = null) {
        $this->layout = 'admin_dashboard';
        $this->loadModel('Color');
        if (!$this->Color->exists($id)) {
            throw new NotFoundException(__('Invalid Add'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $col_data = $this->Color->find('first', ['conditions' => ['id' => $id]]);

            $col_data['Color']['id'] = $id;
            $col_data['Color']['name'] = $this->request->data['Color']['name'];
            $col_data['Color']['color_code'] = strtoupper($this->request->data['Color']['color_code']);
            $col_data['Color']['status'] = 1;


            
            //prx($col_data);
            if ($this->Color->save($col_data, ['validate' => false])) {
                $this->f('The Color has been updated.', 's');
                //$this->Flash->success(__('The Category has been saved.'));
                return $this->redirect('/admin/colors');
            } else {
                $this->f('The Color could not be updated. Please, try again.', 'd');
                //$this->Flash->error(__('The Category could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Color.' . $this->Color->primaryKey => $id));
            $this->request->data = $this->Color->find('first', $options);
            //  prx($this->request->data);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
   /* public function admin_delete($id = null) {
        $this->Color->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid Category'));
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->Category->delete()) {
            $this->f('The Category has been deleted.', 's');
        } else {
            $this->f('The Category could not be deleted. Please, try again.', 'd');
        }
        return $this->redirect('/admin/categories');
    }*/
    /* brand  methods control  */

    public function admin_brands() {

        $this->layout = 'admin_dashboard';
        $this->loadModel('Brand');
        /* $this->Color->recursive = 0;*/
        // prx($this->Paginator->paginate());
        $brands = $this->Brand->find('all',['order' =>['Brand.id desc']]);
        $this->set('brands',$brands);
    }

    public function admin_brand_add() {
        $this->layout = 'admin_dashboard';
        $this->loadModel('Brand');
        if ($this->request->is('post')) {
            $title_exits = $this->Brand->findByName(trim($this->request->data['Brand']['name']));
            if(count($title_exits)){
                $this->f('Brand Name Already exists', 'd');
            }else{

               $_fileName = $this->_upload_file($this->request->data['Brand']['image'],'','brands');

               $Brands = [
                'Brand' => [
                    'name' => strtoupper($this->request->data['Brand']['name']),
                    'image' => $_fileName ,
                    'status' => 1,
                ]
            ];

            if ($this->Brand->save($Brands, ['validate' => false])) {

                $this->f('The Brand has been saved.', 's');
                $this->redirect('/admin/brands');
            } else {
                $this->f('The Brand has not been saved.', 'd');
            }
        }

        

    }
}


public function admin_brand_view($id = null) {
    $this->layout = 'admin_dashboard';
    $this->loadModel('Brand');
    if (!$this->Brand->exists($id)) {
        throw new NotFoundException(__('Invalid Brand id'));
    }
    $options = array('conditions' => array('Brand.' . $this->Brand->primaryKey => $id));
        //prx($this->Item->find('first', $options));
    $this->set('brands', $this->Brand->find('first', $options));
}
public function admin_brand_edit($id = null) {
   $this->layout = 'admin_dashboard';
   $this->loadModel('Brand');
   if (!$this->Brand->exists($id)) {
    throw new NotFoundException(__('Invalid Add'));
}
$brand_data = $this->Brand->find('first', ['conditions' => ['id' => $id]]);
$this->set('brands',$brand_data);
if ($this->request->is(array('post', 'put'))) {
    $brand_data = $this->Brand->find('first', ['conditions' => ['id' => $id]]);


    $brand_data['Brand']['id'] = $id;
    $brand_data['Brand']['name'] = strtoupper($this->request->data['Brand']['name']);
    $brand_data['Brand']['status'] = 1;
    if (!empty($this->request->data['Brand']['image']['error']==0) && $this->request->data['Brand']['image']['size'] > 0) {


        $_fileName = $this->_upload_file($this->request->data['Brand']['image'], '', 'brands');

        if ($_fileName) {
            @unlink(APP . 'webroot' . DS . 'files' . DS . 'brands' . DS . $title_exits['Brand']['image']);
            $brand_data['Brand']['image'] = $_fileName;
        }

    }else{
        unset($this->request->data['Brand']['image']);
    }


            //prx($col_data);
    if ($this->Brand->save($brand_data, ['validate' => false])) {
        $this->f('The Brand has been updated.', 's');
                //$this->Flash->success(__('The Category has been saved.'));
        return $this->redirect('/admin/brands');
    } else {
        $this->f('The Brand could not be updated. Please, try again.', 'd');
                //$this->Flash->error(__('The Category could not be saved. Please, try again.'));

    }
} else {
    $options = array('conditions' => array('Brand.' . $this->Brand->primaryKey => $id));
    $this->request->data = $this->Brand->find('first', $options);
            //  prx($this->request->data);
}
}


/*weaves management */ 
public function admin_weaves() {
    $this->layout = 'admin_dashboard';
    $this->loadModel('Weave');
    /* $this->Color->recursive = 0;*/
        // prx($this->Paginator->paginate());
    $weaves = $this->Weave->find('all',['order' =>['Weave.id desc']]);
    $this->set('weaves',$weaves);
}

public function admin_weave_add() {
  $this->layout = 'admin_dashboard';
  $this->loadModel('Weave');
  if ($this->request->is('post')) {
    $title_exits = $this->Weave->findByName(trim($this->request->data['Weave']['name']));

    if(count($title_exits)){
        $this->f('Weave Name Already exists', 'd');
    }else{
        $Weaves = [
            'Weave' => [
                'name' => strtoupper($this->request->data['Weave']['name']),
                'status' => 1,
            ]
        ];
            //prx($Colors);
        if ($this->Weave->save($Weaves, ['validate' => false])) {

            $this->f('The Weave has been saved.', 's');
            $this->redirect('/admin/weaves');
        } else {
            $this->f('The Weave has not been saved.', 'd');
        }
    }


}
}
function weave_update_status($id = null) {
    $this->layout = 'ajax';
    $return = 0;
    $this->loadModel('Weave');
    $this->Weave->id = $id;
    if ($this->Weave->exists()) {
        $Weave = $this->Weave->read(null, $id);

        if ($Weave['Weave']['status'] == 0) {
            $return = 1;
            $Weave['Weave']['status'] = 1;
        } else {
            $return = 2;
            $Weave['Weave']['status'] = 0;
        }
        if (!$this->Weave->save($Weave, ['validate' => false])) {
            $return = 0;
        }
    }
    $this->set('return', $return);
}
  public function admin_weave_edit($id = null) {
        $this->layout = 'admin_dashboard';
        $this->loadModel('Weave');
        if (!$this->Weave->exists($id)) {
            throw new NotFoundException(__('Invalid Add'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $weave_data = $this->Weave->find('first', ['conditions' => ['id' => $id]]);

            $weave_data['Weave']['id'] = $id;
            $weave_data['Weave']['name'] = strtoupper($this->request->data['Weave']['name']);
            $weave_data['Weave']['status'] = 1;


            
            //prx($col_data);
            if ($this->Weave->save($weave_data, ['validate' => false])) {
                $this->f('The Weave has been updated.', 's');
                //$this->Flash->success(__('The Category has been saved.'));
                return $this->redirect('/admin/weaves');
            } else {
                $this->f('The Weave could not be updated. Please, try again.', 'd');
                //$this->Flash->error(__('The Category could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Weave.' . $this->Weave->primaryKey => $id));
            $this->request->data = $this->Weave->find('first', $options);
            //  prx($this->request->data);
        }
    }
    public function admin_weave_view($id = null) {
    $this->layout = 'admin_dashboard';
    $this->loadModel('Weave');
    if (!$this->Weave->exists($id)) {
        throw new NotFoundException(__('Invalid Weave id'));
    }
    $options = array('conditions' => array('Weave.' . $this->Weave->primaryKey => $id));
        //prx($this->Item->find('first', $options));
    $this->set('weaves', $this->Weave->find('first', $options));
}
/*patterns management*/

public function admin_patterns() {
    $this->layout = 'admin_dashboard';
    $this->loadModel('Pattern');
    /* $this->Color->recursive = 0;*/
        // prx($this->Paginator->paginate());
    $patterns = $this->Pattern->find('all',['order' =>['Pattern.id desc']]);
    $this->set('patterns',$patterns);
    }

    public function admin_pattern_add() {
  $this->layout = 'admin_dashboard';
  $this->loadModel('Pattern');
  if ($this->request->is('post')) {
    $title_exits = $this->Pattern->findByName(trim($this->request->data['Pattern']['name']));

    if(count($title_exits)){
        $this->f('Pattern Name Already exists', 'd');
    }else{
        $_fileName = $this->_upload_file($this->request->data['Pattern']['image'],'','patterns');

       
        $Patterns = [
            'Pattern' => [
                'name' => strtoupper($this->request->data['Pattern']['name']),
                'image' => $_fileName,
                'status' => 1,
            ]
        ];
            //prx($Colors);
        if ($this->Pattern->save($Patterns, ['validate' => false])) {

            $this->f('The Pattern has been saved.', 's');
            $this->redirect('/admin/patterns');
        } else {
            $this->f('The Pattern has not been saved.', 'd');
        }
    }


}
}
public function admin_pattern_edit($id = null) {
        $this->layout = 'admin_dashboard';
        $this->loadModel('Pattern');
        if (!$this->Pattern->exists($id)) {
            throw new NotFoundException(__('Invalid Add'));
        }
        if ($this->request->is(array('post', 'put'))) {
           // prx($_FILES);
            $pattern_data = $this->Pattern->find('first', ['conditions' => ['id' => $id]]);

             $old_photo = $pattern_data['Pattern']['image'];
                if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
                    $photo = $this->_upload_file($_FILES['image'], '', 'patterns',$old_photo);
                }

            $pattern_data['Pattern']['id'] = $id;
            $pattern_data['Pattern']['name'] = strtoupper($this->request->data['Pattern']['name']);
            $pattern_data['Pattern']['status'] = 1;
           $pattern_data['Pattern']['image'] = !empty($photo)?$photo:$old_photo;


            
            //prx($col_data);
            if ($this->Pattern->save($pattern_data, ['validate' => false])) {
                $this->f('The Pattern has been updated.', 's');
                //$this->Flash->success(__('The Category has been saved.'));
                return $this->redirect('/admin/patterns');
            } else {
                $this->f('The Pattern could not be updated. Please, try again.', 'd');
                //$this->Flash->error(__('The Category could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Pattern.' . $this->Pattern->primaryKey => $id));
            $this->request->data = $this->Pattern->find('first', $options);
            //  prx($this->request->data);
        }
    }
      public function admin_pattern_view($id = null) {
    $this->layout = 'admin_dashboard';
    $this->loadModel('Pattern');
    if (!$this->Pattern->exists($id)) {
        throw new NotFoundException(__('Invalid Pattern id'));
    }
    $options = array('conditions' => array('Pattern.' . $this->Pattern->primaryKey => $id));
        //prx($this->Item->find('first', $options));
    $this->set('patterns', $this->Pattern->find('first', $options));
}
   function pattern_update_status($id = null) {
    $this->layout = 'ajax';
    $return = 0;
    $this->loadModel('Pattern');
    $this->Pattern->id = $id;
    if ($this->Pattern->exists()) {
        $Pattern = $this->Pattern->read(null, $id);

        if ($Pattern['Pattern']['status'] == 0) {
            $return = 1;
            $Pattern['Pattern']['status'] = 1;
        } else {
            $return = 2;
            $Pattern['Pattern']['status'] = 0;
        }
        if (!$this->Pattern->save($Pattern, ['validate' => false])) {
            $return = 0;
        }
    }
    $this->set('return', $return);
}
    //function related to admin pannel
public function admin_login($id = null) {

}

}
