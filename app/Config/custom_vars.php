<?php

/**
 * Custom variables
 */

$user_statuses = array('0' => 'Inactive', '1' => 'Active', '2' => 'Pending Activation', '3' => 'Banned');
Configure::write('user_statuses', $user_statuses);


$article_statuses = array('0' => 'Inactive', '1' => 'Active');
Configure::write('article_statuses', $article_statuses);

$card_type = array('VISA' => 'VISA', 'MASTERCARD' => 'MASTERCARD', 'DISCOVER'=>'DISCOVER', 'AMERCIAN EXPRESS'=>'AMERCIAN EXPRESS');
Configure::write('card_type', $card_type);
//
$stripe = array('secret_key'  => 'sk_test_2oPS58YakuC0fDozPEV5qwg2', 'publishable_key' => 'pk_test_jJY6nvdbUmjzAsCmbc66UbnB');
//$stripe = array('secret_key'  => 'sk_test_4N9y8OQ934OPbV3qhbMsz0En', 'publishable_key' => 'pk_test_YdfMfNNVChmps3iUtSpNv7Di');
Configure::write('stripe', $stripe);
/*$stripe = array('secret_key'  => 'sk_live_GgIE9uFPMlyvBhf30f7QmQqM', 'publishable_key' => 'pk_live_I0DunDE5vUw6U1KQB8WaOFVb');
Configure::write('stripe', $stripe);*/

//$sizes = array('1'  => '5*8.2', '2' => '6.5*10', '3' =>'8.2*11.5', '4' =>'10*14', '5' => '5*6.6', '6' => '3.3*5 ');
$sizes = array('1'  => '5*8.2', '2' => '6.5*10', '3' =>'8.2*11.5', '4' =>'10*14');
Configure::write('sizes', $sizes);
