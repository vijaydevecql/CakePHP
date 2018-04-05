<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *

     * @var array
     */
    //
    public $components = array('Paginator', 'Flash');

    function beforeRender() {
        parent::beforeRender();

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
                'admin_edit',
                'admin_update_status',
            ),
            'user' => array(
                'account',
                'my_order',
                'my_address',

            ),
        );
        $this->_deny_url($this->_deny);
    }

    /**
     * index method
     *
     * @return void
     */
    //Admin Listing
    function admin_index() {

        $_conditions = [];
        $_params = [];
        if (isset($this->request->query['data']['email']) && !empty($this->request->query['data'])){
            $_conditions['OR']["User.email LIKE"] = "%".$this->request->query['data']['email']."%";
        }elseif (isset($type) && !empty($type)) {
            $_conditions["User.group_id"] = [$type];
        }
        $_params['conditions'] = $_conditions;

        //prx($this->Paginator->settings);
        $users = $this->Paginator->paginate('User');

        $this->set(array('users' => $users));

        //$this->set('_admin_data', @$this->request->query['data']);

    }
    //user add form
    function admin_add() {

        if ($this->request->is('post')) {
            $form_empty = false;
            foreach ($this->request->data['User'] as $k => $v) {

                if (trim($v) == '' && $v == 'email' && $v == 'password') {
                    $form_empty = true;
                    break;
                }
            }
            if ($form_empty) {
                $this->f('Please enter all form fields', 'd');
            } else {

                $can_save = false;
                if($this->_is_email_exists($this->request->data['User']['email'])) {
                    $this->f('Email already exists', 'd');
                }else {

                    $can_save = true;
                }
                if ($can_save) {

                    $user = array(
                        'User' => array(
                            'first_name' => @$this->request->data['User']['first_name'],
                           // 'last_name' => @$this->request->data['User']['last_name'],
                            'mobile' => @$this->request->data['User']['mobile'],
                            'email' => @$this->request->data['User']['email'],
                            'gender' => @$this->request->data['User']['gender'],
                            'group_id' => 2,
                            'status' => 1,
                            'area' =>  @$this->request->data['User']['area'],
                            'Latitude' => @$this->request->data['User']['latitude'],
                            'Longitude' => @$this->request->data['User']['longitude'],
                        )
                    );
                    $user['User']['authorization_key'] = @$this->_generate_random_number();
                    //$this->predefined_redirect = '/admin/users';
                    $password = rand(99999,1000000);
                    $user['User']['password'] = sha1($password);
                    if ($this->User->save($user, ['validate' => false])) {
                     $id = $this->User->getLastInsertID();
                     if(isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] == 0){
                        $photo = $this->_upload_file($_FILES['profile_photo'], '', 'users');
                        $user['User']['profile_photo'] = $photo;
                        $user['User']['id'] = $id;
                        $this->User->save($user);
                    }
                    $data = array();
                    $data['to'] = $user['User']['email'];
                    $data['subject'] = APP_NAME . " Registration";
                    $data['first_name'] = $user['User']['first_name'];
                    //$data['last_name'] = $user['User']['last_name'];
                    $data['email'] = $user['User']['email'];
                    $data['password'] = $password;
                    $data['email_template'] = 'register by admin';
                 
                        //FUNCTION TO SEND MAIL
                    $this->_send_email($data);
                    $this->f("User has been add successfully",'s');
                    $this->redirect('/admin/users');
                }
            }
        }
    }

}
public function admin_view($id = null) {
    $this->layout = 'admin_dashboard';
    if (!$this->User->exists($id)) {
        throw new NotFoundException(__('Invalid user'));
    }
    $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
    $this->set('user', $this->User->find('first', $options));
}
public function admin_add_addresses($id = null) {
 $this->layout = 'admin_dashboard';
 if($this->request->is('post')){
    $this->loadModel('UserAddress');
    $data = $this->request->data['UserAddress'];
    if(empty($data['latitude']) || empty($data['longitude']) || empty($data['locality']) || empty($data['zip'])){
        $this->f("Plaese enter correct information there is some with address information.");
    }else{
        $user_address = [
            'UserAddress' => [
                'user_id' => $id,
                'title' => trim($data['title']),
                'address' =>   trim($data['address']),
                'latitude' =>   trim($data['latitude']),
                'longitude' =>  trim($data['longitude']),
                'locality' => trim($data['locality']),
                'state' => trim($data['state']),
                'zip' => trim($data['zip']),
                'country' => trim($data['country']),
                'status' => 1,
            ]
        ];
        if($this->UserAddress->save($user_address,['validate' => false])){
           $id = $this->UserAddress->getLastInsertId();
           $this->f("User Address Add successfully");
           $this->redirect("/admin/users/view_addresses/$id");
       }else{
        $this->f("User Address could not Add");
    }
}
}
}
public function admin_view_addresses($id = null,$user_id = null) {
 $this->layout = 'admin_dashboard';
 $this->loadModel('UserAddress');
 $user_address_data = $this->UserAddress->find('all',
    [
        'conditions' => [
            'UserAddress.user_id' => !empty($user_id)?$user_id:$id,
            'UserAddress.status' => 1
        ]
    ]
);
       //prx($user_address_data);
 $this->set('UserAddress1', $user_address_data);
}
public function admin_edit_addresses($id = null) {
    $this->layout = 'admin_dashboard';
    $this->loadModel('UserAddress');
    if (!$this->UserAddress->exists($id)) {
        throw new NotFoundException(__('Invalid user'));
    }
    if ($this->request->is(array('post', 'put'))) {
        $this->loadModel('UserAddress');
        $data = $this->request->data['UserAddress'];

        if(empty($data['latitude']) || empty($data['longitude']) || empty($data['locality']) || empty($data['zip'])){
            $this->f("Plaese enter correct information there is some with address information.");
        }else{
            $user_address_data = $this->UserAddress->findById($id);

            $user_address = [
                'UserAddress' => [
                    'id' => $id,
                    'title' => trim($data['title']),
                    'address' =>   trim($data['address']),
                    'latitude' =>   trim($data['latitude']),
                    'longitude' =>  trim($data['longitude']),
                    'locality' => trim($data['locality']),
                    'state' => trim($data['state']),
                    'zip' => trim($data['zip']),
                    'country' => trim($data['country']),
                    'status' => 1,
                ]
            ];
            if($this->UserAddress->save($user_address,['validate' => false])){
                $id = $this->UserAddress->getLastInsertId();
                $this->f("User Address Add successfully");
                $this->redirect("/admin/users/view_addresses/".$user_address_data['UserAddress']['user_id']);
            }else{
                $this->f("User Address could not Add");
            }
        }

    }else{
        $options = array('conditions' => array('UserAddress.' . $this->UserAddress->primaryKey => $id));
        $data = $this->UserAddress->find('first', $options);
        $this->set('address_data',$data);
    }
}

public function account() {
   $this->layout = 'web';
   $video = 0;
   $about = 1;
   $this->loadModel('Content');
   $about2 = $this->Content->find('first',['conditions' => ['Content.position' => 'Home Section 3']]);

   $this->set('about2',$about2);
   $this->set('about',$about);
   $this->set('video',$video);

}
public function my_order() {
    $this->layout = 'web';
    $video = 0;
    $about = 1;
    $this->loadModel('Content');
    $about2 = $this->Content->find('first',['conditions' => ['Content.position' => 'Home Section 3']]);
    $this->set('about2',$about2);
    $this->set('about',$about);
    $this->set('video',$video);

    $this->loadModel('Order');


    $this->loadModel('Order');

    $deliverd_order = $this->Order->find('all', [
            'conditions' => [
                'Order.user_id' => $this->_user_data['id'],
                'Order.status' => 1,
                'Order.delivery_status' => 2,
            ]

    ]);


   //prx($deliverd_order);
    $open_order = $this->Order->find('all', [
            'conditions' => [
                'Order.user_id' => $this->_user_data['id'],
                'Order.status' => 1,
                'Order.delivery_status' => 1,
            ]

        ]);
  //  prx($open_order);
    $canceled_order = $this->Order->find('all', [
            'conditions' => [
                'Order.user_id' => $this->_user_data['id'],
                'Order.status' => 1,
                'Order.delivery_status' => 3,
            ]

        ]);


    $product = [];
    if(count($deliverd_order)){
        foreach ($deliverd_order as $key => $value) {
            if(count($value['OrderItem'])){
                foreach ($value['OrderItem'] as $key => $value) {
                    $product[] = $value['product_id'];
                }
            }

        }
    }

    if(count($open_order)){
        foreach ($open_order as $key => $value) {
            if(count($value['OrderItem'])){
                foreach ($value['OrderItem'] as $key => $value) {
                    $product[] = $value['product_id'];
                }
            }

        }
    }
    if(count($canceled_order)){
        foreach ($canceled_order as $key => $value) {
            if(count($value['OrderItem'])){
                foreach ($value['OrderItem'] as $key => $value) {
                    $product[] = $value['product_id'];
                }
            }

        }
    }
    $Media = [];
    $Price = [];
    $title = [];
    if(count($product)){

        $this->loadModel('Product');
        $product_data = $this->Product->findAllById($product);
        if(count($product_data)){
            foreach ($product_data as $key => $value) {
                $image = '';
                if(count($value['Media'])){
                    foreach ($value['Media'] as $key1 => $value1) {
                        if($value1['default'] == 1){
                            $_PATH = APP.'webroot'.DS.'files'.DS.'item_other_photo'.DS.$value1['image'];
                            if(file_exists($_PATH)){

                                $image = $value1['image'];
                            }

                        }
                    }
                    if(strlen(trim($image)) == 0){
                        $image = $value['Media'][0]['image'];
                    }

                }else{
                    $image = 'default.png';
                }
                $Media[$value['Product']['id']] = $image;

                if($value['Product']['discount'] > 0){
                        $amount = $value['Product']['discount'];
                }else{
                        $amount = $value['Product']['price'];
                }
                $Price[$value['Product']['id']] = $amount;
                $title[$value['Product']['id']] = $value['Product']['title'];

             }
        }

    }
    // pr($Media);
    // pr($Price);
    // prx($title);


    $this->set(compact('deliverd_order','open_order','canceled_order', 'Media','Price','title'));



}
public function my_address() {
    $this->layout = 'web';
    $video = 0;
    $about = 1;
    $this->loadModel('Content');
    $about2 = $this->Content->find('first',['conditions' => ['Content.position' => 'Home Section 3']]);
    $this->set('about2',$about2);
    $this->set('about',$about);
    $this->set('video',$video);

    $this->loadModel('Address');
    $Address = [];
    $Address = $this->Address->findAllByUserIdAndStatus($this->_user_data['id'],1);



    if($this->request->is('post')){

            $data = $this->request->data;

            $address = [
                'Address' =>  [

                'user_id' =>  $this->_user_data['id'],
                'fullname' => $data['Address']['fullname'],
                'phone' => $data['Address']['phone'],
                'zip' => $data['Address']['zip'],
                'address' => $data['Address']['address'],
                'Landmark' => strlen(trim($data['Address']['Landmark']))?$data['Address']['Landmark']:'',
                'city' => $data['Address']['city'],
                'state' => $data['Address']['state'],
                'latitude' => strlen(trim($data['Address']['latitude']))?$data['Address']['latitude']:'',
                'longitude' => strlen(trim($data['Address']['longitude']))?$data['Address']['longitude']:'',
                'status' => 1

                ]
            ];

            $this->loadModel('Address');
            if($this->Address->save($address,['validate'])){
                $Address = $this->Address->findAllByUserIdAndStatus($this->_user_data['id'],1);
                $this->f('Address Add successfully','s',0);

            }else{
                $this->f('There is some problem, Please try again later ','d',0);
            }
    }
    $this->set('Address',$Address);
}
public function sequrity() {
    $this->layout = 'web';
    $video = 0;
    $about = 1;
    $this->loadModel('Content');
   $about2 = $this->Content->find('first',['conditions' => ['Content.position' => 'Home Section 3']]);
    $this->set('about2',$about2);
    $this->set('about',$about);
    $this->set('video',$video);
    if($this->request->is('post')){
            $user_data = $this->User->findByIdAndStatus($this->_user_data['id'],1);
            $data = $this->request->data;

            if($user_data){
                $error = 1;
                if (trim(sha1($data['User']['password'])) != trim($user_data['User']['password'])) {

                    $error = 0;
                   $this->f("Old Password Does not match","d",0);
                }elseif(trim($data['User']['new_password']) != trim($data['User']['confirm_password'])){
                    $error = 0;
                     $this->f("New Password and confirm Password should be match","d",0);
                }

                if($error != 0){
                    $user_data['User']['password'] = trim(sha1($data['User']['new_password']));
                    if($this->User->save($user_data,['validate' =>false])){
                        $this->f("Password changed successfully","s",0);
                    }else{
                      $this->f("There is some problem , Please try again later","d",0);
                    }

                }

            }else{
                $this->f("User not found", "d", 0);
            }

        }
    }
public function edit_address($id = null) {
        $this->layout = "web";
        $video = 0;
        $about = 1;
        $this->loadModel('Content');
        $about2 = $this->Content->find('first',['conditions' => ['Content.position' => 'Home Section 3']]);
        $this->set('about2',$about2);
        $this->set('about',$about);
        $this->set('video',$video);
        $this->loadModel("Address");

        if (!$this->Address->exists($id)) {
            throw new NotFoundException(__('Invalid Address'));
        }
        if ($this->request->is(array('post', 'put'))) {

            $address_data = $this->Address->findById($id);

            $data = $this->request->data;

           $city =  isset($data['Address']['city']) ? $data['Address']['city'] : $address_data['Address']['city'];

            $state = (isset($data['Address']['state'])) ? $data['Address']['state']: $address_data['Address']['state'];
             $zip = (isset($data['Address']['zip'])) ?$data['Address']['zip']:$address_data['Address']['zip'];

            $address_data = [

                'Address' =>  [
                    'id' => $id,
                    'user_id' =>  $this->_user_data['id'],
                    'fullname' => $data['Address']['fullname'],
                    'phone' => $data['Address']['phone'],
                    'zip' => $zip,
                    'address' => $data['Address']['address'],
                    'Landmark' => strlen(trim($data['Address']['Landmark']))?$data['Address']['Landmark']:'',
                    'city' => $city,
                    'state' => $state,
                    'latitude' => strlen(trim($data['Address']['latitude']))?$data['Address']['latitude']:'',
                    'longitude' => strlen(trim($data['Address']['longitude']))?$data['Address']['longitude']:'',
                ]
            ];
            // prx($address_data);
            if($this->Address->save($address_data,['validate' => false])){
                $this->f("update Address successfully","s", 0);
            }else{
                 $this->f("could not update Address","d", 0);
            }
        } else {
            $options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
            $this->request->data = $this->Address->find('first', $options);
        }
    }
    public function my_payment_option() {
        $this->layout = 'web';
        $video = 0;
        $about = 1;
        $this->loadModel('Content');
        $about2 = $this->Content->find('first',['conditions' => ['Content.position' => 'Home Section 3']]);
        $this->set('about2',$about2);
        $this->set('about',$about);
        $this->set('video',$video);

        $this->loadModel('PaymentOption');
        $my_payment_options = [];
        $my_payment_options = $this->PaymentOption->findAllByUserIdAndStatus($this->_user_data['id'],1);

        if($this->request->is('post')){
            $data = $this->request->data;

            $p_data = $this->PaymentOption->find('first',[
                    'conditions' => [
                        'PaymentOption.user_id' => 'user_id',
                        'PaymentOption.card_number' => trim($data['PaymentOption']['card_number']),
                        'PaymentOption.status' => 1,
                   ]
            ]);

            if(!count($p_data)){
                    $PaymentOption = [
                    'PaymentOption' => [
                        'user_id' => $this->_user_data['id'],
                        'card_name' => $data['PaymentOption']['card_name'],
                        'card_number' => $data['PaymentOption']['card_number'],
                        'expire_year' => $data['PaymentOption']['expiry_year'],
                        'expire_month' => $data['PaymentOption']['expiry_month'],
                        'type' => $data['PaymentOption']['type'],
                        'status' => 1,

                    ]
                    ];

                    if($this->PaymentOption->save($PaymentOption)){
                    $my_payment_options = $this->PaymentOption->findAllByUserIdAndStatus($this->_user_data['id'],1);
                    $this->f("Payment Option save successfully", 's', 0);
                    }else{
                    $this->f("Payment Option could not save", 'd', 0);
                    }
            }else{
                $this->f("Card Number already exists", 'd', 0);
            }


        }
    $this->set('my_payment_options',$my_payment_options);
    }
    public function select_payment($id) {
        $this->layout = 'ajax';

        $this->loadModel('PaymentOption');
        $my_payment_options = [];
        $my_payment_options = $this->PaymentOption->findByIdAndStatus($id,1);

        echo json_encode($my_payment_options);
        die;

    }
    public function my_payment_option_delete($id) {
        $this->layout = "ajax";
        $this->loadModel('PaymentOption');
        $this->PaymentOption->id = $id;
        //prx($this->Address);
        if (!$this->PaymentOption->exists()) {
            throw new NotFoundException(__('Invalid Payment Option'));
        }
        //$this->request->allowMethod('post', 'delete');
        $return = 0;
        if ($this->PaymentOption->delete()) {
            echo $return = $id;
            die;
           // $this->f('The Address has been deleted.', 's');
            //$this->Flash->success(__('The user has been deleted.'));
        } else {
           echo $return;
           die;
        }
}
public function edit_payment_option($id) {
        $this->layout = "web";
        $video = 0;
        $about = 1;
        $this->loadModel('Content');
        $about2 = $this->Content->find('first',['conditions' => ['Content.position' => 'Home Section 3']]);
        $this->set('about2',$about2);
        $this->set('about',$about);
        $this->set('video',$video);
        $this->loadModel("PaymentOption");

        if (!$this->PaymentOption->exists($id)) {
            throw new NotFoundException(__('Invalid Payment Option'));
        }
        if ($this->request->is(array('post', 'put'))) {

            $Payment_option_data = $this->PaymentOption->findById($id);

            $data = $this->request->data;

            $p_data = $this->PaymentOption->find('first',[
                    'conditions' => [
                        'PaymentOption.id != ' => $id,
                        'PaymentOption.user_id' => 'user_id',
                        'PaymentOption.card_number' => trim($data['PaymentOption']['card_number']),
                        'PaymentOption.status' => 1,
                   ]
            ]);

            if(!count($p_data)){
                    $Payment_option_data = [
                        'PaymentOption' => [
                            'id' => $id,
                            'user_id' => $this->_user_data['id'],
                            'card_name' => $data['PaymentOption']['card_name'],
                            'card_number' => $data['PaymentOption']['card_number'],
                            'expire_year' => $data['PaymentOption']['expire_year'],
                            'expire_month' => $data['PaymentOption']['expire_month'],
                            'type' => $data['PaymentOption']['type'],
                            'status' => 1,

                        ]
                    ];
                    //prx($Payment_option_data);
                    if($this->PaymentOption->save($Payment_option_data)){
                        $my_payment_options = $this->PaymentOption->findAllByUserIdAndStatus($this->_user_data['id'],1);
                        $this->f("Payment Option update successfully", 's', 0);
                    }else{
                        $this->f("Payment Option could not update", 'd', 0);
                    }
            }else{
                $this->f("Card Number already exists", 'd', 0);
            }
        } else {
            $options = array('conditions' => array('PaymentOption.' . $this->PaymentOption->primaryKey => $id));
            $this->request->data = $this->PaymentOption->find('first', $options);
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */

    /**
     * add method
     *
     * @return void
     */
    // public function add() {
    //     if ($this->request->is('post')) {
    //         $this->User->create();
    //         if ($this->User->save($this->request->data)) {
    //             $this->Flash->success(__('The user has been saved.'));
    //             return $this->redirect(array('action' => 'index'));
    //         } else {
    //             $this->Flash->error(__('The user could not be saved. Please, try again.'));
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
    public function admin_edit($id = null) {
        $this->layout = "admin_dashboard";
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
           // prx($_FILES);
            $user_email = $this->User->find('first',
                [
                    'conditions'=>
                    [
                        'User.email' => $this->request->data['User']['email'],
                        'User.id != ' => $id

                    ]
                ]);
            if(count($user_email)){
                $this->f('Email already exists', 'd');
            }else{
                $user = $this->User->find('first',
                    [
                        'conditions'=>
                        [
                            'User.id' => $id
                        ]
                    ]);
                $old_photo = $user['User']['profile_photo'];
                if(isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] == 0){
                    $photo = $this->_upload_file($_FILES['profile_photo'], '', 'users',$old_photo);
                }
                $user = array(
                    'User' => array(
                        'id' => $id,
                        'first_name' => @$this->request->data['User']['first_name'],
                        'last_name' => @$this->request->data['User']['last_name'],
                        'mobile' => @$this->request->data['User']['mobile'],
                        'email' => @$this->request->data['User']['email'],
                        'gender' => @$this->request->data['User']['gender'],
                        'city' => @$this->request->data['User']['city'],
                        'area' => @$this->request->data['User']['area'],
                        'latitude' => @$this->request->data['User']['latitude'],
                        'longitude' => @$this->request->data['User']['longitude'],
                        'country' => @$this->request->data['User']['country'],
                        'profile_photo' => !empty($photo)?$photo:$old_photo
                    )
                );
                if ($this->User->save($user,['validate'=>false])) {
                    $this->f('The user has been saved.', 's');
                    //$this->Flash->success(__('The user has been saved.'));
                    return $this->redirect('/admin/users');
                } else {
                    $this->f('The user could not be saved. Please, try again.', 'd');
                    //$this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
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
        $this->layout = "admin_dashboard";
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->f('The user has been deleted.', 's');
            //$this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->f('The user could not be deleted. Please, try again.', 'd');
            //$this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect('/admin/users');
    }
    public function address_delete($id = null) {
       // echo $id;
        //die;
        $this->layout = "ajax";
        $this->loadModel('Address');
        $this->Address->id = $id;
        //prx($this->Address);
        if (!$this->Address->exists()) {
            throw new NotFoundException(__('Invalid Address'));
        }
        //$this->request->allowMethod('post', 'delete');
        $return = 0;
        if ($this->Address->delete()) {
            echo $return = $id;
            die;
           // $this->f('The Address has been deleted.', 's');
            //$this->Flash->success(__('The user has been deleted.'));
        } else {
           echo $return;
           die;
        }
        //return $this->redirect('/admin/users');
    }
    public function resetpassword($token) {


        $this->loadModel('User');
        $user_data = [];

        $_saved = false;
        $_msg = "";
        $link = 0;
        if (!empty($token)) {
            $user_data = $this->User->findByPasswordResetToken($token);
            if (!count($user_data)) {
                $link = 1;
            }
            $this->set('user_data', $user_data);
        }
        if ($this->request->is('post')) {
            $user = $this->User->findByPasswordResetToken($this->request->data['User']['password_reset_token']);
            if (count($user)) {
                if ($this->request->data['User']['password'] != $this->request->data['User']['confirm_password']) {
                    $_msg = 'Password and confirm password do not match. Please try again.';
                } else {
                    $user['User']['password'] = sha1($this->request->data['User']['password']);
                    $user['User']['password_reset_token'] = '';
                    if ($this->User->save($user, ['validate' => false])) {
                        $_saved = true;
                        $link = 1;
                        $_msg = 'Password have been reset. You may now login.';
                    } else {
                        $_msg = 'The system encountered an error while resetting the password. Please try again later';
                    }
                }
            } else {
                $_msg = 'Invalid URL, please try resetting the password again';
            }
        } else {
            $user_data = $this->User->findByPasswordResetToken($token);
            if(!$user_data) {
                $_msg = 'Invalid URL, please try resetting the password again';
            }
        }
        $this->set('link', $link);
        $this->set('_saved', $_saved);
        $this->set('_msg', $_msg);
    }

    public function api_login() {
        try {
            if (!$this->request->is(array('POST'))) {
                throw new Exception('Only POST  supported');
            }
            $required = array(
                'email' => @$this->request->data['email'],
                'password' => @$this->request->data['password'],
                'checking_exits' => 0
            );
            $notrequired = array(
                'device_type' => @($this->request->data['device_type'] == '') ? 0 : $this->request->data['device_type'],
                'device_token' => @($this->request->data['device_token'] == '') ? '' : $this->request->data['device_token'],
                //'image' => @$this->_upload_file($_FILES['image']),
                'authorization_key' => @$this->_generate_random_number(),
            );

            $requestdata = $this->validarray($required, $notrequired);

            $options = ['conditions' => ['User.email' => $requestdata['email'], 'User.password' => $requestdata['password']]];
            $user = $this->User->find('first', $options);

            if ($user) {
                if ($user['User']['status'] == 0) {
                    throw new Exception('User Account is not activated, Please visit your email to activate your account.');
                } else {
                    $user['User']['authorization_key'] = $requestdata['authorization_key'];
                    $user_id = $user['User']['id'];
                    if ($this->User->save($user, ['validate' => false])) {
                        $loogged_in_user_data = $this->User->find('first', [
                            'conditions' => ['User.id' => $user_id],
                            'fields' => [
                                'User.id',
                                'User.first_name',
                                'User.group_id',
                                'User.last_name',
                                'User.dob',
                                'User.mobile',
                                'User.email',
                                'User.cover_photo',
                                'User.profile_photo',
                                'User.gender',
                                'User.type',
                                'User.city',
                                'User.unique_id',
                                'User.country',
                                'User.photo_facebook',
                                'User.photo_twitter',
                                'User.photo_instagram',
                                'User.email_verified', 'User.phone_verified', 'User.authorization_key', 'User.status', 'User.created', 'User.modified']
                            ]);
                        //prx($loogged_in_user_data);
                        $status = SUCCESS_CODE;
                        $body = $loogged_in_user_data['User'];

                        $this->json($status, $body);
                    } else {
                        throw new Exception('Error in upadting Authorization');
                    }
                }
            } else {
                throw new Exception('Wrong Email or password');
            }
        } catch (Exception $e) {
            $status = FAILURE_CODE;
            $body = $e->getMessage();
            $this->json($status, $body);
        }
    }

    public function register() {
        if ($this->request->is('post')) {
            //prx($this->request->data);
            $form_empty = false;
            if ($this->request->data['User']['pro_group_id'] == 2) {
                foreach ($this->request->data['User'] as $k => $v) {
                    if (is_array($v)) {
                        continue;
                    }
                    if (trim($v) == '') {
                        $form_empty = true;
                        break;
                    }
                }
                if ($form_empty) {
                    $this->f('Please enter all form fields', 'd', 0);
                } else {
                    $can_save = false;
                    if ($this->_is_email_exists($this->request->data['User']['email_2'], USER_GROUP_ID)) {
                        $this->f('Email already exists', 'd', 0);
                    } else {
                        $can_save = true;
                    }
                    if ($can_save) {
                        $user = array(
                            'User' => array(
                                'name' => $this->request->data['User']['name_2'],
                                'email' => $this->request->data['User']['email_2'],
                                'group_id' => $this->request->data['User']['pro_group_id'],
                                'send_newsletter' => @$this->request->data['User']['send_newsletter_2'],
                                'status' => 1,
                                'password' => sha1($this->request->data['User']['password_2'])
                            )
                        );
                        $this->predefined_redirect = '/login';
                        $this->_register($user);
                    }
                }
            }
        }
    }

    public function api_signup() {
        $this->_is_api = true;

        try {
            if (!$this->request->is(array('POST'))) {
                throw new Exception('Only POST  supported');
            }
            $required = array(
                'mobile' => @$this->request->data['mobile'],
                'username' => @$this->request->data['username'],
                'email' => @$this->request->data['email'],
                'password' => @$this->request->data['password'],
                'status' => 1,
                'checking_exits' => 1
            );
            $notrequired = array(
                'device_type' => @($this->request->data['device_type'] == '') ? 0 : $this->request->data['device_type'],
                'device_token' => @($this->request->data['device_token'] == '') ? '' : $this->request->data['device_token'],
                //'image' => @$this->_upload_file($_FILES['image']),
                'authorization_key' => $this->_generate_random_number(),
            );

            $requestdata = $this->validarray($required, $notrequired);
            $requestdata['group_id'] = 2;

            $_user = $this->User->find('first', ['conditions' => ['User.email' => $this->request->data['email']]]);
            if ($_user) {
                throw new Exception('User already exists');
            }
            $_user_mobile = $this->User->find('first', ['conditions' => ['User.mobile' => $this->request->data['mobile']]]);
            //prx($_user_mobile);

            if ($this->User->save($requestdata, ['validate' => false])) {
                $user_id = $this->User->getLastInsertId();
                $_user = $this->User->read(null, $user_id);
                $url = $this->_abs_url("verify_account/" . $_user['User']['authorization_key']);
                //$url = Router::url(array("controller" => "users", "action" => "verify", ), true);
                $data = array();
                $data['to'] = $_user['User']['email'];
                $data['subject'] = APP_NAME . " Signup verification";
                $data['first_name'] = $_user['User']['first_name'];
                $data['last_name'] = $_user['User']['last_name'];
                $data['email'] = $_user['User']['email'];
                $data['url'] = $url;
                $data['for'] = 'signup_verification';
                //FUNCTION TO SEND MAIL
                $this->_send_email($data);
                //prx($_user);

                $unique_id = sha1($_user['User']['id']);
                $__user = [
                    'unique_id' => $unique_id,
                    'message' => 'Please check your email for verification link.',
                    'show_otp_screen' => 0
                ];
                if (!empty($requestdata['mobile'])) {
                    //$otp = $this->_random_number();
                    $otp = '1111';
                    $_user['User']['otp'] = $otp;
                    $_user['User']['unique_id'] = $unique_id;

                    if ($this->User->save($_user, ['validate' => false])) {
                        $_user = $this->User->find('first', ['conditions' => ['User.unique_id' => $unique_id]]);
                        $msg = 'MB OTP : ' . $_user['User']['otp'];
                        $number = $requestdata['mobile'];
                        //$mobile = $this->twilio($number, $msg);
                        $__user['message'] = 'Please enter the OTP recieved on your registered mobile number.';
                        $__user['show_otp_screen'] = 1;
                    }
                }
                // $data_user = $this->User->find('first',['conditions'=>['User.unique_id'=>$unique_id]]);
                $status = SUCCESS_CODE;
                $body = $__user;
                $this->json($status, $body);
            } else {
                throw new Exception('Unable to save user');
            }
        } catch (Exception $e) {
            $status = FAILURE_CODE;
            $body = $e->getMessage();
            $this->json($status, $body);
        }
    }

//    public function signup() {
//        $return = [];
//        $return['code'] = FAILURE_CODE;
//        $return['message'] = '';
//        $return['body'] = [];
//        $error = FALSE;
//        if (!$this->request->is(array('post'))) {
//            $return['message'] = 'GET,PUT method is not supported';
//            $error = TRUE;
//        }
//        if (!$error && (
//                !isset($this->request->data['countrycode']) ||
//                !isset($this->request->data['mobileno']) ||
//                !strlen(trim($this->request->data['countrycode'])) ||
//                !strlen(trim($this->request->data['mobileno']))
//                )
//        ) {
//            $return['message'] = 'countrycode and mobileno are required';
//            $error = TRUE;
//        }
//        if (!$error) {
//            $options = ['conditions' => [
//                    'User.mobileno' => $this->request->data['mobileno'],
//                    'User.countrycode' => $this->request->data['countrycode'],
//                ]
//            ];
//            $User = $this->User->find('first', $options);
//
//            //    print_r($User);
//            if (!$User) {
//                $user = ['User'];
//                $user['User']['is_verified'] = 0;
//                $user['User']['status'] = 1;
//                $user['User']['countrycode'] = $this->request->data['countrycode'];
//                $user['User']['mobileno'] = $this->request->data['mobileno'];
//
//                $user['User']['otp'] = '1111';
//                $user['User']['authorization_key'] = sha1(rand() . time() . microtime() . rand() . sha1(time()));
//                $no = $this->request->data['countrycode'] . $this->request->data['mobileno'];
//                // $this->twilio($complete, $rand);
//                if ($this->User->save($user)) {
//                    $mobile = $this->twilio($no, $user['User']['otp']);
//                    // if($mobile)
//                    // {
//                    //    print_r($mobile);
//                    // }
//                    // else
//                    // {
//                    //    echo "0";
//                    // }
//
//                    $return['code'] = SUCCESS_CODE;
//                    $return['message'] = 'User registered';
//                    $return['body']['id'] = $this->User->getLastInsertId();
//                    $return['body']['authorization_key'] = $user['User']['authorization_key'];
//                    $return['body']['is_verified'] = $user['User']['is_verified'];
//                    $return['body']['status'] = $user['User']['status'];
//                    // $return['body']['numbertype'] =  $user['User']['numbertype'];
//                } else {
//                    $return['message'] = 'User could not be registered';
//                    $return['body'] = [];
//                }
//            } else {
//                $return['message'] = 'This phone number is already registerd';
//
//                $return['code'] = SUCCESS_CODE;
//                $return['body']['is_verified'] = $User['User']['is_verified'];
//                $return['body']['status'] = $User['User']['status'];
//                $return['body']['authorization_key'] = $User['User']['authorization_key'];
//                $return['body']['numbertype'] = $User['User']['numbertype'];
//                $return['body']['id'] = $User['User']['id'];
//            }
//        }
//        $this->api_return = $return;
//    }

    public function resend_otp() {
        $return = [];
        $return['code'] = FAILURE_CODE;
        $return['message'] = '';
        $return['body'] = [];
        $error = FALSE;
        if (!$this->request->is(array('post'))) {
            $return['message'] = 'GET,PUT method is not supported';
            $error = TRUE;
        }
        if (!$error && (
            !isset($this->request->data['authorization_key'])
        )
    ) {
            $return['message'] = 'authorization_key is required';
            $error = TRUE;
        }
        if (!$error) {
            $options = ['conditions' => ['User.authorization_key' => $this->request->data['authorization_key']]];
            $User = $this->User->find('first', $options);
            $otp = '1111';
            $no = $User['User']['countrycode'] . $User['User']['mobileno'];
            $mobile = $this->twilio($no, $otp);
            if ($mobile) {
                $return['code'] = SUCCESS_CODE;
                $return['message'] = 'Otp Send';
            } else {
                $return['message'] = 'Error ';
            }
            // $return['message'] = 'This phone number is already registerd';

            $return['body'] = '';
        }
        $this->api_return = $return;
    }

    public function verification() {
        $return = [];
        $return['code'] = FAILURE_CODE;
        $return['message'] = '';
        $return['body'] = [];
        $error = FALSE;
        if (!$this->request->is(array('post'))) {
            $return['message'] = 'Only POST method is supported';
            $error = TRUE;
        }
        if (!$error && (
            !isset($this->request->data['authorization_key'])
        )
    ) {
            $return['message'] = 'authorization_key is required';
            $error = TRUE;
        }

        if (!$error && (
            !isset($this->request->data['otp']) ||
            !strlen(trim($this->request->data['otp']))
        )
    ) {
            $return['message'] = 'OTP is required';
            $error = TRUE;
        }

        if (!$error) {
            $options = ['conditions' => ['User.authorization_key' => $this->request->data['authorization_key']]];
            $User = $this->User->find('first', $options);
            if ($User) {
                $update = false;
                if ($this->request->data['otp'] == $User['User']['otp']) {
                    $User['User']['status'] = 1;
                    if ($this->User->save($User)) {
                        $return['code'] = SUCCESS_CODE;
                        $return['message'] = 'User verified';
                        $return['body'] = true;
                    } else {
                        $return['message'] = 'User Not verified';
                        $return['body'] = [];
                    }
                } else {
                    $return['message'] = 'Invalid OTP';
                    $return['body'] = [];
                }
            } else {
                $return['message'] = 'Invalid authorization_key';
                $return['body'] = [];
            }
        }
        $this->api_return = $return;
    }

    function _send_sms($complete, $rand) {
        //return $this->twilio($complete, $rand);
    }

    public function _send_email($params = []) {
        $to = $params['to'];
        $from = APP_NAME;
        // To send HTML mail, the Content-type header must be set
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        $this->loadModel('EmailTemplate');
        $email_template = $this->EmailTemplate->findByTitleAndStatus($params['email_template'], 1);
        $message = " ";
        
        $subject = "Registration on ".APP_NAME;
         
        if(count($email_template) && strlen(trim($email_template['EmailTemplate']['description'])) > 0){
                $description  = $email_template['EmailTemplate']['description'];
               
            if(trim($email_template['EmailTemplate']['title']) == "register by user" ){
                $original = ["{{firstname}}"];
                $replace   = [$params['first_name']];
            }elseif (trim($email_template['EmailTemplate']['title']) == "register by admin" ){
                $original = ["{{firstname}}","{{username}}","{{password}}"];
                $replace   = [$params['first_name'],$params['email'],$params['password']];
            }

            // Provides: You should eat pizza, beer, and ice cream every day
            

            $message = str_replace($original, $replace, $description);
            $subject = (strlen(trim($email_template['EmailTemplate']['subject']))>0) ? $email_template['EmailTemplate']['subject'] : "Registration on ".APP_NAME;
        }
        //prx($message);
        $mail_params = [];
        $mail_params['to'] = $to;
        $mail_params['subject'] = $subject;
        $mail_params['body'] = $message;
        $this->mg_mail($mail_params);
    }

    function _content_for_signup($first) {

        $message = '<div style="text-align: center; height: 200px; background-color: #abc; border: 1px solid #456;
        border-radius: 3px; padding: 10px;">
        <h2>Hello ' . $first .'</h2>
        <br/>
        This email from '.APP_NAME.'.
        <br/>
        Your Registration have successfully.
        <br/>
        <br/>
        <br/>
        Thanks
        '.APP_NAME.' Team
        </div>';
        return $message;
    }
    function _content_for_signup_from_admin($first,$email,$password) {

        $message = '<div style="text-align: center; height: 200px; background-color: #abc; border: 1px solid #456;
        border-radius: 3px; padding: 10px;">
        <h2>Hello ' . $first .'</h2>
        <br/>
        This email from '.APP_NAME.' admin regarding to inform you that you are register by admin.
        <br/>
        Username : ' . $email . '<br/>
        Password : ' . $password . '<br/>

        <br/>
        <br/>
        <br/>
        Thanks
        '.APP_NAME.' Team
        </div>';
        return $message;
    }

    function _content_for_forgot($first, $last, $url) {

        $message = '<div style="text-align: center; height: 200px; background-color: #abc; border: 1px solid #456;
        border-radius: 3px; padding: 10px;">
        <h2>Hello ' . $first . ' ' . $last . '</h2>

        <br/>
        <strong>Please click the following link to set your password.</strong> <br /><br />
        <a href="' . $url . '">Click</a></div>';
        return $message;
    }

    function _random_number() {
        $random_number = rand("00000", "99999");
        $this->User->recursive = -1;
        $data_rand = $this->User->find(
            'first', [
                'conditions' => [
                    'User.otp' => $random_number,
                ]]);

        if (count($data_rand) > 0) {
            //random number exits.
            $this->random_number();
        } else {
            //unique random number.
            return $random_number;
        }
    }

    public function verify_otp() {
        $return = [];
        $return['code'] = FAILURE_CODE;
        $return['message'] = '';
        $return['body'] = [];
        $error = FALSE;
        if (!$this->request->is(array('post', 'put'))) {
            $return['message'] = 'GET method is not supported';
            $error = TRUE;
        }
        if (!$error && (
            !isset($this->request->data['authorization_key'])
        )
    ) {
            $return['message'] = 'authorization_key is required';
            $error = TRUE;
        }
        if (!$error && (
            !isset($this->request->data['device_type'])
        )
    ) {
            $return['message'] = 'device_type is required';
            $error = TRUE;
        }
        if (!$error && (
            !isset($this->request->data['device_token'])
        )
    ) {
            $return['message'] = 'device_token is required';
            $error = TRUE;
        }



        if (!$error && (
            !isset($this->request->data['otp']) ||
            !strlen(trim($this->request->data['otp']))
        )
    ) {
            $return['message'] = 'otp  is required';
            $error = TRUE;
        }
        if (!$error) {
            $options = ['conditions' => ['User.authorization_key' => $this->request->data['authorization_key']]];
            $user = $this->User->find('first', $options);
            if ($user['User']['image'] != '' && $user['User']['gender'] != 0 && $user['User']['name'] != '' && $user['User']['dob'] != '' && $user['User']['countrycode'] != '' && $user['User']['mobileno'] != '' && !empty($user['User']['image']) && !empty($user['User']['gender']) && !empty($user['User']['name']) && !empty($user['User']['dob']) && !empty($user['User']['countrycode']) && !empty($user['User']['mobileno'])) {
                $return['profile_status'] = 'Updated';
            } else { {
                $return['profile_status'] = 'Not Updated';
            }
        }
        if ($user) {
            if ($user['User']['otp'] == $this->request->data['otp']) {
                $device_type = isset($this->request->data['device_type']) && strlen(trim($this->request->data['device_type'])) ? $this->request->data['device_type'] : 0;
                $user['User']['device_type'] = $device_type;
                $user['User']['device_token'] = isset($this->request->data['device_token']) && strlen(trim($this->request->data['device_token'])) ? $this->request->data['device_token'] : '';
                $user['User']['status'] = 1;
                $user['User']['is_verified'] = 1;
                if ($this->User->save($user)) {
                    $return['code'] = SUCCESS_CODE;
                    $return['message'] = 'User verified successfully';
                        // unset($user['User']['password']);
                    $return['body'] = $user['User'];
                } else {
                        //pr($this->User->validationErrors);
                    $return['message'] = 'Verification failed';
                    $return['body'] = [];
                }
            } else {
                $return['message'] = 'OTP is incorrect';
                $return['body'] = [];
            }
        } else {
            $return['message'] = 'User not found';
            $return['body'] = [];
        }
    }
    $this->api_return = $return;
}

public function update() {
    $return = [];
    $return['code'] = FAILURE_CODE;
    $return['message'] = '';
    $return['body'] = [];
    $error = FALSE;
    if (!$this->request->is(array('post', 'put'))) {
        $return['message'] = 'GET method is not supported';
        $error = TRUE;
    }
    if (!$error && (
        !isset($this->request->data['authorization_key'])
    )
) {
        $return['message'] = 'authorization_key is required';
        $error = TRUE;
    }

    if (!$error && (
        !isset($this->request->data['otp']) ||
        !strlen(trim($this->request->data['otp']))
    )
) {
        $return['message'] = 'otp  is required';
        $error = TRUE;
    }
    if (!$error) {
        $options = ['conditions' => ['User.authorization_key' => $this->request->data['authorization_key']]];
        $user = $this->User->find('first', $options);
        if ($user) {

            $device_type = isset($this->request->data['device_type']) && strlen(trim($this->request->data['device_type'])) ? $this->request->data['device_type'] : 0;
            $user['User']['device_type'] = $device_type;
            $user['User']['device_token'] = @$this->request->data['device_token'];
            $user['User']['status'] = 1;
            if ($this->User->save($user)) {
                $return['code'] = SUCCESS_CODE;
                $return['message'] = 'User logged in';
                unset($user['User']['password']);
                $return['body'] = $user['User'];
            } else {
                    //pr($this->User->validationErrors);
                $return['message'] = 'Verification failed';
                $return['body'] = [];
            }
        } else {
            $return['message'] = 'User not found';
            $return['body'] = [];
        }
    }
    $this->api_return = $return;
}
public function sign_up() {

   $this->layout = 'web';
   $video = 0;
   $about = 0;

   $this->set('about',$about);
   $this->set('video',$video);
     //prx($this->request->data);
    if ($this->request->is('post')) {
        $form_empty = false;
        foreach ($this->request->data['User'] as $k => $v) {

            if (trim($v) == '' && $v == 'email' && $v == 'password') {
                $form_empty = true;
                break;
            }
        }
        if ($form_empty) {
            $this->f('Please enter all form fields', 'd');
        } else {

            $can_save = false;
            if($this->_is_email_exists($this->request->data['User']['email'])) {
                $this->f('Email already exists', 'd');
            }else {

                $can_save = true;
            }
            if ($can_save) {

                $user = array(
                    'User' => array(
                        'first_name' => @$this->request->data['User']['first_name'],
                        'mobile' => @$this->request->data['User']['mobile'],
                        'email' => @$this->request->data['User']['email'],
                        'password' => sha1(@$this->request->data['User']['password']),
                        'status' => 1,

                    )
                );
                $user['User']['authorization_key'] = @$this->_generate_random_number();
                    //$this->predefined_redirect = '/admin/users';
               // prx($user);
                unset($this->request->data['User']['last_name']);
                $this->loadModel('User');
                if ($this->User->save($user, ['validate' => false])) {
                    $data = array();
                    $data['to'] = $user['User']['email'];
                    $data['subject'] = APP_NAME . " Registration";
                    $data['first_name'] = $user['User']['first_name'];
                    $data['email_template'] = 'register by user';
                   

                        //FUNCTION TO SEND MAIL
                    $this->_send_email($data);
                    $this->f("User has been sign_up successfully",'s',0);
                    $this->redirect('sign_up');

                }

            }else{
               $this->f("User has been not sign_up successfully",'d',0);
           }
       }
   }
}


public function sign_in() {

  $this->layout = 'web';
   $video = 0;
   $about = 0;

   $this->set('about',$about);
   $this->set('video',$video);
   App::uses('User', 'Model');
   $this->User = new User();


   if ($this->request->is('post')) {

    $_user = $this->User->find('first', ['conditions' => ['User.email' => $this->request->data['User']['email']]]);

    if ($_user) {
        if ($_user['User']['password'] != sha1($this->request->data['User']['password'])) {
            //die('here');
            $this->f('Incorrect Password', 'd', 0);
        } else {
            unset($_user['User']['password']);

            $this->loadModel('MyCart');
            $s_id = session_id();

            $this->MyCart->updateAll(
                ['MyCart.user_id' => $_user['User']['id']],
                ['MyCart.sessionid' => $s_id ]
            );

            $this->Session->write('royalty_rug_user', $_user);
            $this->f('You are now logged in!', 's',0);

            // echo '-';
            // echo $this->Session->id();

            // die();
            return $this->redirect('/');
        }
    } else {
       // die('here');
        $this->f('User not found', 'd', 0);
    }
}

}



public function soical_login() {
    $return = [];
    $return['code'] = FAILURE_CODE;
    $return['message'] = '';
    $return['body'] = [];
    $error = FALSE;
    if (!$this->request->is(array('post', 'put'))) {
        $return['message'] = 'GET method is not supported';
        $error = TRUE;
    }
    if (!$error && (
        !isset($this->request->data['soical_id']) ||
        !isset($this->request->data['login_type']) ||
        !strlen(trim($this->request->data['soical_id'])) ||
        !strlen(trim($this->request->data['login_type']))
    )
) {
        $return['message'] = 'soical_id or login_type are blank';
        $error = TRUE;
    }
    if (!$error) {
        $options = ['conditions' => ['User.soical_id' => $this->request->data['soical_id']]];
        $user = $this->User->find('first', $options);
        if ($user) {
            $device_type = isset($this->request->data['device_type']) && strlen(trim($this->request->data['device_type'])) ? $this->request->data['device_type'] : 0;
            $device_token = isset($this->request->data['device_token']) && strlen(trim($this->request->data['device_token'])) ? $this->request->data['device_type'] : '';
            $user['User']['device_type'] = $device_type;
            $user['User']['device_token'] = $device_token;
            $user['User']['email'] = @$this->request->data['email'];
            $user['User']['firstname'] = @$this->request->data['firstname'];
            $user['User']['lastname'] = '';
            $user['User']['mobile'] = '';
            $user['User']['code'] = '';
            $user['User']['login_type'] = @$this->request->data['login_type'];
            $user['User']['fid'] = @(!isset($this->request->data['fid'])) ? '' : $this->request->data['fid'];
            $user['User']['gid'] = @(!isset($this->request->data['gid'])) ? '' : $this->request->data['gid'];
            $user['User']['user_image'] = @(!isset($this->request->data['user_image'])) ? '' : $this->request->data['user_image'];
            $user['User']['authorization_key'] = $this->_generate_random_number();
            $user['User']['status'] = 1;
            if ($this->User->save($user)) {
                $return['code'] = SUCCESS_CODE;
                $return['message'] = 'User logged in';
                unset($user['User']['password']);
                    // $return['body'] = $user['User'];
                $return['body'] = $this->userinfo($user['User']['id']);
            } else {
                    // pr($this->User->validationErrors);
                $return['message'] = 'Error to login';
                $return['body'] = [];
            }
        } else {
            $device_token = isset($this->request->data['device_token']) && strlen(trim($this->request->data['device_token'])) ? $this->request->data['device_type'] : '';
            $user['User']['device_token'] = $device_token;
            $device_type = isset($this->request->data['device_type']) && strlen(trim($this->request->data['device_type'])) ? $this->request->data['device_type'] : 0;
            $user['User']['soical_id'] = @$this->request->data['soical_id'];
            $user['User']['device_type'] = $device_type;
            $user['User']['email'] = @$this->request->data['email'];
            $user['User']['firstname'] = @$this->request->data['firstname'];
            $user['User']['login_type'] = @$this->request->data['login_type'];
            $user['User']['fid'] = @(!isset($this->request->data['fid'])) ? '' : $this->request->data['fid'];
            $user['User']['gid'] = @(!isset($this->request->data['gid'])) ? '' : $this->request->data['gid'];
            $user['User']['user_image'] = @(!isset($this->request->data['user_image'])) ? '' : $this->request->data['user_image'];
            $user['User']['authorization_key'] = $this->_generate_random_number();
            $user['User']['status'] = 1;
            if ($this->User->save($user)) {
                $return['code'] = SUCCESS_CODE;
                $return['message'] = 'User logged in';
                unset($user['User']['password']);
                $user['User']['id'] = $this->User->getInsertID();
                $return['body'] = $this->userinfo($this->User->getInsertID());
            } else {
                    //pr($this->User->validationErrors);
                $return['message'] = 'Error to login';
                $return['body'] = [];
            }
        }
    }
    $this->api_return = $return;
}

public function api_forgotpassword() {

    try {
        if (!$this->request->is(array('POST'))) {
            throw new Exception('Only POST  supported');
        }

        $required = array(
            'type' => @$this->request->data['type'],
            'value' => @$this->request->data['value'],
            'checking_exits' => 0
        );
        $notrequired = array(
            'country_code' => $this->send_value(@$this->request->data['country_code'], ''),
        );

        $requestdata = $this->validarray($required, $notrequired);



        if ($requestdata['type'] == 'email') {
                //forgot password via email

            $this->User->recursive = -1;
            $_user = $this->User->find(
                'first', [
                    'conditions' => [
                        'User.email' => $this->request->data['value'],
                        'User.status' => 1,
                    ]]);

                //if email exits.
            if (count($_user) > 0) {
                    //if account activate then update unique token and send link to user in email.
                if ($_user['User']['status'] == 1) {
                    $_user['User']['password_reset_token'] = $this->_generate_random_number();
                    if ($this->User->save($_user, ['validate' => false])) {
                        $__user_info = $this->User->find('first', ['conditions' => ['User.email' => $this->request->data['value']]]);

                            //token save and send email to user with  reset password link.
                            // $url = Router::url(array("controller" => "users", "action" => "resetpassword", $__user_info['User']['password_reset_token']), true);
                        $url = $this->_abs_url("resetpassword/" . $__user_info['User']['unique_id']);

                        $data = array();
                        $data['to'] = $__user_info['User']['email'];
                        $data['subject'] = APP_NAME . " forgot password";
                        $data['url'] = $url;
                        $data['first_name'] = $__user_info['User']['first_name'];
                        $data['last_name'] = $__user_info['User']['last_name'];
                        $data['for'] = 'forgot_password';

                            //FUNCTION TO SEND MAIL
                        $this->_send_email($data);
                        $status = SUCCESS_CODE;
                        $body['message'] = 'Forgot password link has been sent to your email!';
                        $body['type'] = $this->request->data['type'];
                        $body['code'] = $status;
                        $this->_json($body);
                            //prx($_user);
                    } else {
                        throw new Exception('Error in updating token');
                    }
                } else {
                    throw new Exception('Account is not activated');
                }
            } else {
                throw new Exception('Email Does not exists');
            }
        } elseif ($requestdata['type'] == 'phone') {
            if (substr(trim($this->request->data['value']), 0, 1) != '+' && substr(trim($this->request->data['value']), 0, 2) != '00') {
                $this->request->data['value'] = '+' . $this->request->data['value'];
            }


            $this->User->recursive = -1;
            $_user = $this->User->find(
                'first', [
                    'conditions' => [
                        'User.mobile' => $this->request->data['value'],
                    ]]);

            if (count($_user) > 0) {
                    //$otp = $this->_random_number();
                $otp = '1111';
                $unique_id = sha1($_user['User']['id']);
                $_user['User']['otp'] = $otp;
                $_user['User']['unique_id'] = $unique_id;

                if ($this->User->save($_user, ['validate' => false])) {

                    $_user_info = $this->User->find(
                        'first', [
                            'conditions' => [
                                'User.otp' => $otp,
                                'User.unique_id' => $unique_id
                            ]]);


                    $msg = 'MB OTP : ' . $_user_info['User']['otp'];
                    $number = $requestdata['country_code'] . $requestdata['value'];
                    $mobile = $this->twilio($number, $msg);
                        //prx($mobile);
                    unset($_user_info['User']['password']);

                    $status = SUCCESS_CODE;
                    $body['unique_id'] = $unique_id;
                    $body['message'] = 'OTP has been sent to your registered mobile number';
                    $body['type'] = $this->request->data['type'];
                    $body['code'] = $status;
                    $this->_json($body);
                } else {
                    throw new Exception('Mobile number Does not register');
                }
            } else {
                throw new Exception('Error in update otp');
            }


                //  	$msg='invite';
                // $s=$cnt.$no;
                // $mobile = $this->twilio($s,$msg);
        }
    } catch (Exception $e) {
        $status = FAILURE_CODE;
        $body = $e->getMessage();
        $this->json($status, $body);
    }
}

private function userinfo($user_id) {
    $options = ['conditions' => ['User.id' => $user_id]];
    $user = $this->User->find('first', $options);
    unset($user['User']['password']);
    unset($user['User']['otp']);
    return $user['User'];
}

public function User_id() {

    $return = [];

    $return['body'] = [];
    $error = FALSE;


    if (!$error && (
        !isset($this->request->data['authorization_key'])
    )
) {
        $return['message'] = 'authorization_key is required';
        $error = TRUE;
    }
    $options = ['conditions' => ['User.authorization_key' => $this->request->data['authorization_key']]];
    $User = $this->User->find('first', $options);
    $return['body'] = $User['User']['id'];
    $this->api_return = $return;
}

public function user_status() {
    $return = [];
    $return['code'] = FAILURE_CODE;
    $return['message'] = '';
    $return['body'] = [];
    $error = FALSE;
    if (!$this->request->is(array('post', 'put'))) {
        $return['message'] = 'GET method is not supported';
        $error = TRUE;
    }
    if (!$error && (
        !isset($this->request->data['authorization_key'])
    )
) {
        $return['message'] = 'authorization_key is required';
        $error = TRUE;
    }
    if (!$error && (
        !isset($this->request->data['statusmessage'])
    )
) {
        $return['message'] = 'statusmessage is required';
        $error = TRUE;
    }
    if (!$error) {
        $options = ['conditions' => ['User.authorization_key' => $this->request->data['authorization_key']]];
        $user = $this->User->find('first', $options);
        if ($user) {
            $user['User']['statusmessage'] = $this->request->data['statusmessage'];
            if ($this->User->save($user)) {
                $return['code'] = SUCCESS_CODE;
                $return['message'] = 'Status Uploaded';
                $return['body']['statusmessage'] = $user['User']['statusmessage'];
            } else {
                $return['message'] = 'Try again';
                $return['body'] = [];
            }
        } else {
            $return['message'] = 'User not exist ';
            $return['body'] = [];
        }
    }
    $this->api_return = $return;
}

public function profile_setting() {
    $return = [];
    $return['code'] = FAILURE_CODE;
    $return['message'] = '';
    $return['body'] = [];
    $error = FALSE;
    if (!$this->request->is(array('post', 'put'))) {
        $return['message'] = 'GET method is not supported';
        $error = TRUE;
    }
    if (!$error && (
        !isset($this->request->data['authorization_key'])
    )
) {
        $return['message'] = 'authorization_key is required';
        $error = TRUE;
    }
    if (!$error) {
        $options = ['conditions' => ['User.authorization_key' => $this->request->data['authorization_key']]];
        $user = $this->User->find('first', $options);

            // print_r($user1);
            //  die;
        if ($user) {
            $error_mob = 0;
            if (isset($this->request->data['name'])) {
                $user['User']['name'] = $this->request->data['name'];
            }
            if (isset($this->request->data['gender'])) {
                $user['User']['gender'] = intval($this->request->data['gender']);
            }
            if (isset($this->request->data['dob'])) {
                $user['User']['dob'] = $this->request->data['dob'];
            }

            $_imgs = $this->_make_images_array('users', 'image');
            if ($_imgs) {
                $user['User']['image'] = $_imgs[0]['name'];
            }


            if ($this->User->save($user)) {
                $return['code'] = SUCCESS_CODE;
                $return['message'] = 'Profile Updated ';
                $return['body']['name'] = $user['User'];
            } else {
                $return['message'] = 'Try again';
                $return['body'] = [];
            }
        } else {
            $return['message'] = 'User not exist ';
            $return['body'] = [];
        }
    }
    $this->api_return = $return;
}

public function view_profile() {
    $return = [];
    $return['code'] = FAILURE_CODE;
    $return['message'] = '';
    $return['body'] = [];
    $error = FALSE;
    if (!$this->request->is(array('post', 'put'))) {
        $return['message'] = 'GET method is not supported';
        $error = TRUE;
    }
    if (!$error && (
        !isset($this->request->data['authorization_key'])
    )
) {
        $return['message'] = 'authorization_key is required';
        $error = TRUE;
    }
    if (!$error) {
        $options = ['conditions' => ['User.authorization_key' => $this->request->data['authorization_key']]];
        $user = $this->User->find('first', $options);
        if ($user) {
            $return['code'] = SUCCESS_CODE;
            $return['message'] = 'User Detail';
            $return['body'] = $user;
        } else {
            $return['message'] = 'Invaild';
        }
    }
    $this->api_return = $return;
}

    // start here
/* All function related to admin Panel */

// function admin_login() {
//     App::uses('Admin', 'Model');
//     $this->Admin = new Admin();
//     $this->layout = 'admin_login';

//     if ($this->request->is('post')) {

//         $_user = $this->Admin->find('first', ['conditions' => ['Admin.email' => $this->request->data['User']['email'], 'Admin.role' => 'admin']]);

//         if ($_user) {
//             if ($_user['Admin']['password'] != sha1($this->request->data['User']['password'])) {
//                 $this->f('Incorrect Password', 'd');
//             } else {
//                 unset($_user['Admin']['password']);
//                 $this->Session->write('dstash', $_user);
//                 $this->f('You are now logged in!', 's');
//                 return $this->redirect('/admin/dashboard');
//             }
//         } else {
//             $this->f('User not found', 'd');
//         }
//     }
// }
    //user lisiting



    /**
     * Return FALSE if email does not exists already
     * TRUE otherwise
     *
     * @param type $email
     * @return boolean
     */
    function _is_email_exists($email = '') {
        if (trim($email) == '') {
            return true;
        }
        $count = $this->User->find('count', array('conditions' => array('User.email' => $email)));
        if ($count) {
            return true;
        } else {
            return false;
        }
    }
    function _is_username_exists($username = '') {
        if (trim($username) == '') {
            return true;
        }
        $count = $this->User->find('count', array('conditions' => array('User.username' => $username)));
        if ($count) {
            return true;
        } else {
            return false;
        }
    }



    function admin_dashboard() {


        //  load user mode  for active user listing in dashboard
        App::uses('User', 'Model');
        $this->User = new User();
        $users = $this->User->find('count', array(
            'conditions' => array('User.status' => '1')
        ));

        $this->set(compact('users'));
    }
    function admin_profile() {

        $this->layout = "admin_dashboard";
        //  load user mode  for active user listing in dashboard
        $admin = $this->_admin_data['id'];
        $this->loadModel('Admin');

        if($this->request->is('post','put'))
        {
          $options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $admin));

          $_data = $this->Admin->find('first', $options);

          $data =$this->request->data;

          if(isset($data['old_password'])  && $data['old_password'] != "" )
          {
            if(sha1($data['old_password']) != $_data['Admin']['password'] )
            {
                $this->f('Please enter right password', 'd');
            }
            else
            {
                if(isset($data['new_password']) &&  isset($data['confirm_password']) && $data['new_password'] != ""  &&  $data['confirm_password'] != "")
                {
                    if($data['new_password'] != $data['confirm_password'] )
                    {
                        $this->f('Your new password not match with your new password', 'd');
                    }
                    else
                    {
                        $data['Admin']['password'] = sha1($data['new_password']);
                    }
                }
            }

        }
        unset($data['old_password'],$data['new_password'],$data['confirm_password']);

        $this->Admin->id = $admin;

        if ($this->Admin->save($data))
        {
            $seession = $this->Admin->findById($id);
            $this->Session->write('dstash', $seession);
            $this->f('The Admin has been update successfully.', 's');

            return $this->redirect('/admin/profile/');
        } else {
            $this->f('The Admin could not be saved. Please, try again.', 'd');

        }
    }
    else{
     $this->request->data = $this->Admin->find('first',
        [
            'conditions' => [
             'Admin.id' => $admin
         ]
     ]);
 }


}

function admin_all_det() {
    $this->redirect('/admin/users');
    $this->_is_api = false;
    $this->layout = 'admin_dashboard';
    $options = ['conditions' => ['User.numbertype' => 0]];
    $simpal = $this->User->find('all', $options);
    $this->set(array('simpal' => $simpal));

    $options = ['conditions' => ['User.numbertype' => 1]];
    $company = $this->User->find('all', $options);
    $this->set(array('company' => $company));

    App::uses('Category', 'Model');
    $this->Category = new Category();
    $Category = $this->Category->find('all');
    $this->set(array('Category' => $Category));

    App::uses('Business', 'Model');
    $this->Business = new Business();
    $all_Business = $this->Business->find('all');
    $this->set(array('all_Business' => $all_Business));

    App::uses('BroadcastMessage', 'Model');
    $this->BroadcastMessage = new BroadcastMessage();
    $BroadcastMessage = $this->BroadcastMessage->find('all');
    $this->set(array('BroadcastMessage' => $BroadcastMessage));
}

function admin_change_password() {
    $this->_is_api = false;
    $this->layout = 'admin_dashboard';
    $this->_validate_and_change_password(true);
}

// function admin_logout() {
//         // Delete Admin Cookie
//     $this->Session->delete('tarrago_admin');
//         // Reset Session ID
//     $this->Session->renew();
//         // Add flash message
//     $this->f('You are now logged out.', 's');
//         // Redirect to admin login
//     $this->redirect('/admin/login');
// }

function admin_settings() {
    $this->_is_api = false;
    $this->layout = 'admin_dashboard';
    $this->_settings(true);
}

function admin_update_status($id = null) {
    $this->layout = 'ajax';
    $return = 0;
    $this->User->id = $id;
    if ($this->User->exists()) {
        $user = $this->User->read(null, $id);
        if ($user['User']['status'] == 0) {
            $return = 1;
            $user['User']['status'] = 1;
        } else {
            $return = 2;
            $user['User']['status'] = 0;
        }
        if (!$this->User->save($user)) {
            $return = 0;
        }
    }
    $this->set('return', $return);
}

function admin_assign_business() {
    if ($this->request->is('post')) {
            // prx($this->request->data);
        $this->_is_api = false;
        $this->layout = 'ajax';
        $return = 0;
        $id = $this->request->data('user_id');
        $this->User->id = $id;
        if ($this->User->exists()) {
            $user = $this->User->read(null, $id);
            $user['User']['numbertype'] = 1;
            $user['User']['assigned_business'] = $this->request->data('business_id');
            if ($this->User->save($user)) {
                return $this->redirect("/admin/users/index/1");
            } else {
                echo "Not added";
            }
        }
            //  return $this->redirect("/admin/users/index/1");
            // $this->set('return', $return);
    }
}

function admin_search() {
    $this->_is_api = false;
    $this->layout = 'admin_dashboard';
}

function admin_remove_assign_business($id = 0) {

    $this->_is_api = false;
        // $this->layout = 'ajax';
    $return = 0;
        // $id= $this->request->data('user_id');
    debug($id);
    echo $id;
    $this->User->id = $id;
    if ($this->User->exists()) {
        $user = $this->User->read(null, $id);
        $user['User']['numbertype'] = 0;
        $user['User']['assigned_business'] = 0;
        if ($this->User->save($user)) {
            return $this->redirect("/admin/users/index/1");
        } else {
            echo "Not remove ";
        }
    }
}

function _settings($admin = false) {
    $this->_is_api = false;
    $_id = 0;
    $_dashboard_route = 'login';
    $_logout_route = 'logout';
    if ($admin) {
        $_id = $this->_admin_data['id'];
        $_dashboard_route = 'admin';
        $_logout_route = 'admin/logout';
    } else {
        $_id = $this->_user_data['id'];
    }

    $user = $this->User->find('first', array(
        'conditions' => array(
            'User.id' => $_id
        ),
        'fields' => array(
            'id',
            'sidebar_rollup',
        )
    ));
    if ($user) {
        if ($this->request->is(array('post', 'put'))) {
                //pr($user); pr($this->request->data); die;
            $this->User->id = $user['User']['id'];
            $user['User']['sidebar_rollup'] = $this->request->data['User']['sidebar_rollup'];
            if ($this->User->save($user)) {
                $this->Session->write('admin.User.sidebar_rollup', $user['User']['sidebar_rollup']);
                $this->Flash->success('Settings updated', [
                    'params' => array(
                        'class' => 'alert-success',
                    )
                ]);
                return $this->redirect("/$_dashboard_route");
            } else {
                $this->Flash->success('Settings could not be updated', [
                    'params' => array(
                        'class' => 'alert-danger',
                    )
                ]);
            }
        } else {
            $this->request->data = $user;
        }
    } else {
        $this->Flash->success('Invalid User', [
            'params' => array(
                'class' => 'alert-danger',
            )
        ]);
        return $this->redirect("/$_logout_route");
    }
}

function _validate_and_change_password($admin = false) {
    $this->_is_api = false;
    $_id = 0;
    $_dashboard_route = 'login';
    $_logout_route = 'logout';

    if ($admin) {
        $_id = $this->_admin_data['id'];
        $_dashboard_route = 'admin';
        $_logout_route = 'admin/logout';
    } else {
        $_id = $this->_user_data['id'];
    }

    $user = $this->User->find('first', array(
        'conditions' => array(
            'User.id' => $_id
        ),
        'fields' => array(
            'id',
            'password',
        )
    ));
    if ($user) {
        if ($this->request->is('post')) {
                // If current password is NOT same as the one entered, stop processing, notify user
            if (trim(sha1($this->request->data['User']['password'])) != $user['User']['password']) {
                $this->Flash->success('Current password is incorrect', [
                    'params' => array(
                        'class' => 'alert-danger',
                    )
                ]);
            } else if (trim($this->request->data['User']['password']) == '' || trim($this->request->data['User']['new_password']) == '' || trim($this->request->data['User']['repeat_new_password']) == ''
        ) {
                    // If password, new password, and repeat new password fields are blank, notify user
                $this->Flash->success('Please fill all fields', [
                    'params' => array(
                        'class' => 'alert-danger',
                    )
                ]);
            } else if ($this->request->data['User']['new_password'] != $this->request->data['User']['repeat_new_password']) {
                    // If new password and repeat new password do not match, notify user
                $this->Flash->success('PASSWORDS_DONT_MATCH', [
                    'params' => array(
                        'class' => 'alert-danger',
                    )
                ]);
            } else {
                    // If all good, then set the new_password field as the new password in DB
                $user['User']['password'] = sha1($this->request->data['User']['new_password']);
                $user['User']['forgot_password_hash'] = '';
                $this->User->id = $user['User']['id'];
                if ($this->User->save($user)) {
                    $this->Flash->success('PASSWORD_UPDATED', [
                        'params' => array(
                            'class' => 'alert-success',
                        )
                    ]);
                    return $this->redirect("/$_dashboard_route");
                } else {
                    $this->Flash->success('PASSWORD_NOT_UPDATED', [
                        'params' => array(
                            'class' => 'alert-danger',
                        )
                    ]);
                }
            }
        }
    } else {
        $this->Flash->success('Invalid User', [
            'params' => array(
                'class' => 'alert-danger',
            )
        ]);
        return $this->redirect("/$_logout_route");
    }
}

/* end */



function blog() {
    App::uses('Article', 'Model');
    $this->Article = new Article();
    $this->Article->recursive = -1;
    $blogs = $this->Article->find('all', [
        'conditions' =>
        [
            'Article.status' => 1
        ],
        'limit' => '20',
        'order' => 'id desc'
    ]
);
    $this->set('blogs', $blogs);
}

function blog_detail($id) {

    App::uses('Article', 'Model');
    $this->Article = new Article();

    $blog = $this->Article->find('first', [
        'conditions' =>
        [
            'Article.status' => 1,
            'Article.id' => $id,
        ],
    ]
);

        // get article comments
    App::uses('ArticleComment', 'Model');
    $this->ArticleComment = new ArticleComment();

    $blogComments = $this->ArticleComment->find('all', [
        'conditions' =>
        [
            'ArticleComment.status' => 1,
            'ArticleComment.article_id' => $id,
        ],
    ]
);

    $this->set(compact('blog', 'blogComments', 'id'));
}

function login() {

    if ($this->request->is('post')) {

        $_email = $this->request->data['User']['pro_group_id'] == 2 ? $this->request->data['User']['email_2'] : $this->request->data['User']['email_3'];
        $_password = $this->request->data['User']['pro_group_id'] == 2 ? $this->request->data['User']['password_2'] : $this->request->data['User']['password_3'];
        $_group_id = $this->request->data['User']['pro_group_id'] == 2 ? USER_GROUP_ID : PRO_GROUP_ID;

        $_user = $this->User->find(
            'first', [
                'conditions' =>
                [
                    'User.email' => $_email,
                    'User.status' => 1,
                    'User.group_id' => $_group_id,
                ]
            ]
        );
        if ($_user) {
            if ($_user['User']['password'] != sha1($_password)) {
                $this->f('Incorrect Password', 'd', 0);
            } else {
                unset($_user['User']['password']);
                $this->Session->write('user', $_user);
                $this->f('You are now logged in!', 's', 0);
                $_status = 1;
                $_redirect = @$this->Session->read('redirect');
                if (trim($_redirect) != '') {
                    $this->Session->delete('redirect');
                    $_redirect_url = "$_redirect";
                } else {
                    $_redirect_url = '/';
                }
            }
        } else {
            $this->f('No active user found with this account. Please try again.', 'd', 0);
        }

        if (isset($ajax) && $ajax) {
            return $_status;
        } else {
            return $this->redirect("$_redirect_url");
        }
    }
}

    //===============================End========================================
    //===========================User Logout=====================================
public function logout() {
        // Delete Admin Cookie
    $this->Session->delete('royalty_rug_user');
        // Reset Session ID
    //$this->Session->renew();
        // Add flash message
    $this->f('You are now logged out.', 's');
        // Redirect to admin login

    return $this->redirect('/');
}

    //===============================End========================================
    //===========================forgot password sending email=====================================
public function forgot() {
    $this->layout = 'ajax';
    if ($this->request->is('post')) {
        $_user = $this->User->find(
            'first', [
                'conditions' => [
                    'User.email' => $this->request->data['email'],
                    'User.status' => 1,
                ]
            ]);
            //check user record email register or not.
        if ($_user) {
            $_user = $_user['User'];
            if ($_user['status'] == 1) {
                $_user['forgot_password_hash'] = md5(microtime());
                if ($this->User->save($_user, ['validate' => false])) {
                    $__user_info = $this->User->find('first', ['conditions' => ['User.email' => $this->request->data['email']]]);
                    $_user_info = $__user_info['User'];
                    $url = Router::url(array("controller" => "users", "action" => "forgot_password_verify", $_user_info['forgot_password_hash']), true);
                        //VERFICATION MAIL SEND TO USER
                    $data = array();
                    $data['to'] = $_user_info['email'];
                    $data['subject'] = "Gigchimp forgot password";
                    $data['url'] = $url;
                    $data['first_name'] = $_user_info['first_name'];
                    $data['last_name'] = $_user_info['last_name'];
                    $data['for'] = 'forgot_password';
                        //FUNCTION TO SEND MAIL
                    $this->_send_email($data);
                        //END
                        //VERFICATION MAIL END
                    $this->set('message', "Please check your email for the link to reset your password.");
                } else {
                        //pr($this->User->validationErrors);
                    $this->set('message', "User info could not be updated");
                }
            } else {
                $this->set('message', "Account is not verified.");
            }
        } else {
            $this->set('message', "No active user found with this account. Please try again.");
        }
    }
}

    //===============================End========================================
    //===========================forgot password sending email=====================================
public function forgot_password_verify($token) {

    if (isset($token) && !empty($token)) {
        $this->User->recursive = -1;
        $__user_info = $this->User->find('first', ['conditions' => ['User.forgot_password_hash' => $token]]);

        if (count($__user_info) > 0) {
            $this->set('Token', "valid");
        } else {
            $this->set('Token', "notvalid");
        }
        if ($this->request->is('post')) {

            $__user_info['User']['forgot_password_hash'] = md5(microtime());
            $__user_info['User']['password'] = sha1($this->request->data['password']);

            $this->User->id = $__user_info['User']['id'];
            if ($this->User->save($__user_info, ['validate' => false])) {
                echo 'yes';
                die;
                    //$this->set('message', "New Password is updated.");
                    //return 1;
            } else {
                echo 'no';
                die;
                    //$this->set('message', "Oops! there is some error, Please try again later.");
                    //return 0;
            }
        } else {
                //$this->set('message', "Oops! there is some error, Please try again later.");
                //return 0;
        }
    } else {
        $this->set('Token', "notvalid");
    }
}

//    30 aug 2017
function api_confirmotp() {
    try {
        if (!$this->request->is(array('POST'))) {
            throw new Exception('Only POST  supported');
        }

        $required = array(
            'otp' => @$this->request->data['otp'],
            'unique_id' => @$this->request->data['unique_id'],
            'checking_exits' => 0
        );
        $notrequired = array();

        $requestdata = $this->validarray($required, $notrequired);
        $__user_info = $this->User->find('first', ['conditions' => ['User.unique_id' => $requestdata['unique_id'], 'User.otp' => $requestdata['otp']]]);
            //prx($__user_info);
        if (count($__user_info) > 0) {
            $__user_info['User']['otp'] = 0;
            $__user_info['User']['status'] = 1;
            if ($this->User->save($__user_info, ['validate' => false])) {
                $__user_info = $this->User->find('first', ['conditions' => ['User.unique_id' => $requestdata['unique_id']]]);

                $status = SUCCESS_CODE;
                $body = $__user_info['User'];
                $body['code'] = $status;
                $this->json($status, $body);
            } else {
                throw new Exception('Error in update otp');
            }
        } else {
            throw new Exception('Wrong otp');
        }
    } catch (Exception $e) {
        $status = FAILURE_CODE;
        $body = $e->getMessage();
        $this->json($status, $body);
    }
}

public function api_reset_password() {
    try {
        if (!$this->request->is(array('POST'))) {
            throw new Exception('Only POST  supported');
        }

        $required = array(
            'password' => @$this->request->data['password'],
            'unique_id' => @$this->request->data['unique_id'],
            'checking_exits' => 0
        );
        $notrequired = array();

        $requestdata = $this->validarray($required, $notrequired);
        $__user_info = $this->User->find('first', ['conditions' => ['User.unique_id' => $requestdata['unique_id']]]);
            //prx($__user_info);
        if (count($__user_info) > 0) {
            $__user_info['User']['otp'] = 0;
            $__user_info['User']['status'] = 1;
            $__user_info['User']['password'] = sha1($this->request->data['password']);
                //$__user_info['User']['unique_id'] = sha1($this->request->data['password']);

            if ($this->User->save($__user_info, ['validate' => false])) {
                $__user_info = $this->User->find('first', ['conditions' => ['User.unique_id' => $requestdata['unique_id']]]);

                $status = SUCCESS_CODE;
                unset($__user_info['User']['password']);
                $body = ['unique_id' => $__user_info['User']['unique_id']];
                $this->json($status, $body);
            } else {
                throw new Exception('Error in resetting the password');
            }
        } else {
            throw new Exception('Invalid user');
        }
    } catch (Exception $e) {
        $status = FAILURE_CODE;
        $body = $e->getMessage();
        $this->json($status, $body);
    }
}

}
