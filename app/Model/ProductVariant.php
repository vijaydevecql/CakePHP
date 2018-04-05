<?php
App::uses('AppModel', 'Model');
/**
 * Booking Model
 *
 * @property Event $Event
 * @property User $User
 * @property TicketCategory $TicketCategory
 * @property Coupon $Coupon
 */
class ProductVariant extends AppModel {

/**
 * belongsTo associations
 *
 * @var array
 */	
	
	public $belongsTo = array(
		
		'Color' => array(
			'className' => 'Color',
			'foreignKey' => 'color_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		
	);
}
