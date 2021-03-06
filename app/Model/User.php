<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property UserAllergy $UserAllergy
 * @property UserPrefer $UserPrefer
 */
class User extends AppModel {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			/*
			  'first_name' => array(
			  'notBlank' => array(
			  'rule' => array('notBlank'),
			  //'message' => 'Your custom message here',
			  //'allowEmpty' => false,
			  //'required' => false,
			  //'last' => false, // Stop validation after this rule
			  //'on' => 'create', // Limit validation to 'create' or 'update' operations
			  ),
			  ),
			  'last_name' => array(
			  'notBlank' => array(
			  'rule' => array('notBlank'),
			  //'message' => 'Your custom message here',
			  //'allowEmpty' => false,
			  //'required' => false,
			  //'last' => false, // Stop validation after this rule
			  //'on' => 'create', // Limit validation to 'create' or 'update' operations
			  ),
			  ),
			  'email' => array(
			  'email' => array(
			  'rule' => array('email'),
			  //'message' => 'Your custom message here',
			  //'allowEmpty' => false,
			  //'required' => false,
			  //'last' => false, // Stop validation after this rule
			  //'on' => 'create', // Limit validation to 'create' or 'update' operations
			  ),
			  ),
			  'password' => array(
			  'notBlank' => array(
			  'rule' => array('notBlank'),
			  //'message' => 'Your custom message here',
			  //'allowEmpty' => false,
			  //'required' => false,
			  //'last' => false, // Stop validation after this rule
			  //'on' => 'create', // Limit validation to 'create' or 'update' operations
			  ),
			  ),
			  'mobile' => array(
			  'notBlank' => array(
			  'rule' => array('notBlank'),
			  //'message' => 'Your custom message here',
			  //'allowEmpty' => false,
			  //'required' => false,
			  //'last' => false, // Stop validation after this rule
			  //'on' => 'create', // Limit validation to 'create' or 'update' operations
			  ),
			  ),
			  'image' => array(
			  'notBlank' => array(
			  'rule' => array('notBlank'),
			  //'message' => 'Your custom message here',
			  //'allowEmpty' => false,
			  //'required' => false,
			  //'last' => false, // Stop validation after this rule
			  //'on' => 'create', // Limit validation to 'create' or 'update' operations
			  ),
			  ),
			  'device_type' => array(
			  'numeric' => array(
			  'rule' => array('numeric'),
			  //'message' => 'Your custom message here',
			  //'allowEmpty' => false,
			  //'required' => false,
			  //'last' => false, // Stop validation after this rule
			  //'on' => 'create', // Limit validation to 'create' or 'update' operations
			  ),
			  ),
			  'device_token' => array(
			  'notBlank' => array(
			  'rule' => array('notBlank'),
			  //'message' => 'Your custom message here',
			  //'allowEmpty' => false,
			  //'required' => false,
			  //'last' => false, // Stop validation after this rule
			  //'on' => 'create', // Limit validation to 'create' or 'update' operations
			  ),
			  ),
			  'stattus' => array(
			  'numeric' => array(
			  'rule' => array('numeric'),
			  //'message' => 'Your custom message here',
			  //'allowEmpty' => false,
			  //'required' => false,
			  //'last' => false, // Stop validation after this rule
			  //'on' => 'create', // Limit validation to 'create' or 'update' operations
			  ),
			  ),
			  'authorization_key' => array(
			  'notBlank' => array(
			  'rule' => array('notBlank'),
			  //'message' => 'Your custom message here',
			  //'allowEmpty' => false,
			  //'required' => false,
			  //'last' => false, // Stop validation after this rule
			  //'on' => 'create', // Limit validation to 'create' or 'update' operations
			  ),
			  ),
			 */
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	
	  // public $hasMany = array(
		 //  'Item' => array(
			//   'className' => 'Item',
			//   'foreignKey' => 'user_id',
			//   'dependent' => false,
			//   'conditions' => '',
			//   'fields' => '',
			//   'order' => '',
			//   'limit' => '',
			//   'offset' => '',
			//   'exclusive' => '',
			//   'finderQuery' => '',
			//   'counterQuery' => ''
		 //  ),
		  
		 //  'MyCart' => array(
			//   'className' => 'MyCart',
			//   'foreignKey' => 'user_id',
			//   'dependent' => false,
			//   'conditions' => '',
			//   'fields' => '',
			//   'order' => '',
			//   'limit' => '',
			//   'offset' => '',
			//   'exclusive' => '',
			//   'finderQuery' => '',
			//   'counterQuery' => ''
		 //  ),
		 //  'Order' => array(
			//   'className' => 'Order',
			//   'foreignKey' => 'user_id',
			//   'dependent' => false,
			//   'conditions' => '',
			//   'fields' => '',
			//   'order' => '',
			//   'limit' => '',
			//   'offset' => '',
			//   'exclusive' => '',
			//   'finderQuery' => '',
			//   'counterQuery' => ''
		 //  ), 
		 //  'Follower' => array(
			//   'className' => 'Follow',
			//   'foreignKey' => 'user2id',
			//   'dependent' => false,
			//   'conditions' => '',
			//   'fields' => '',
			//   'order' => '',
			//   'limit' => '',
			//   'offset' => '',
			//   'exclusive' => '',
			//   'finderQuery' => '',
			//   'counterQuery' => ''
		 //  ),
		 //  'Comment' => array(
			//   'className' => 'Comment',
			//   'foreignKey' => 'user_id',
			//   'dependent' => false,
			//   'conditions' => '',
			//   'fields' => '',
			//   'order' => '',
			//   'limit' => '',
			//   'offset' => '',
			//   'exclusive' => '',
			//   'finderQuery' => '',
			//   'counterQuery' => ''
		 //  ),
		 //  'Favourite' => array(
			//   'className' => 'Favourite',
			//   'foreignKey' => 'user_id',
			//   'dependent' => false,
			//   'conditions' => '',
			//   'fields' => '',
			//   'order' => '',
			//   'limit' => '',
			//   'offset' => '',
			//   'exclusive' => '',
			//   'finderQuery' => '',
			//   'counterQuery' => ''
		 //  ),
		 //   'Send_Message' => array(
			//   'className' => 'ChatMessage',
			//   'foreignKey' => 'user_id',
			//   'dependent' => false,
			//   'conditions' => '',
			//   'fields' => '',
			//   'order' => '',
			//   'limit' => '',
			//   'offset' => '',
			//   'exclusive' => '',
			//   'finderQuery' => '',
			//   'counterQuery' => ''
		 //  ),
		 //  'Receive_Message' => array(
			//   'className' => 'ChatMessage',
			//   'foreignKey' => 'user2id',
			//   'dependent' => false,
			//   'conditions' => '',
			//   'fields' => '',
			//   'order' => '',
			//   'limit' => '',
			//   'offset' => '',
			//   'exclusive' => '',
			//   'finderQuery' => '',
			//   'counterQuery' => ''
		 //  ),
		 //  'Notification' => array(
			//   'className' => 'Notification',
			//   'foreignKey' => 'user2id',
			//   'dependent' => false,
			//   'conditions' => '',
			//   'fields' => '',
			//   'order' => '',
			//   'limit' => '',
			//   'offset' => '',
			//   'exclusive' => '',
			//   'finderQuery' => '',
			//   'counterQuery' => ''
		 //  ),
		 
	
	  // );
	 

	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
