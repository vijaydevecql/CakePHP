<?php

/**
 * Custom methods
 */
function encode_data($data) {
	return base64_encode(convert_uuencode($data));
}

function decode_data($data) {
	return convert_uudecode(base64_decode($data));
}

function url_custom_encode($input = '') {
	$t = substr(rand(), 0, 6);
	return base64_encode(base64_encode((($t + $input) * 1000) + 9876) . '|' . base64_encode($t * 50));
}

function url_custom_decode($input = '') {
	$data = explode('|', base64_decode($input));
	$t = base64_decode($data[1]) / 50;
	return ((base64_decode($data[0]) - 9876 ) / 1000) - $t;
}

/*
function encode_numeric_val($number, $salt1 = '', $salt2 = '') {
	$n = url_custom_encode($number);
	$n2 = base64_encode(base64_encode($salt1).'|'.  base64_encode($salt2));
	return base64_encode(base64_encode($n).'|'.base64_encode($n2));
}

function decode_numeric_val($string) {
	$n = explode('|', base64_decode($string));
	$n2 = url_custom_decode(base64_decode($n[0]));
	return $n2;
}
*/
function encode_numeric_val($number, $salt1 = '', $salt2 = '') {
	$n = base64_encode($number);
	$n2 = base64_encode(base64_encode($salt1).'|'.  base64_encode($salt2));
	return base64_encode(base64_encode($n).'|'.base64_encode($n2));
}

function decode_numeric_val($string) {
	$n = explode('|', base64_decode($string));
	$n2 = base64_decode(base64_decode($n[0]));
	return $n2;
}


function prx($data) {
	pr($data);
	die;
}

/* checking the required fiels */
function Required( $requiredArray){
	$field = array();
	foreach($requiredArray as $key=>$value){
		if(trim($requiredArray[$key]) == ""){
		   $field[]= $key." field is required";
		}
	}
	if(!empty($field)){
		$return = [];
		$return['code'] = FAILURE_CODE;
		$return['message'] = implode(' , ' , $field);
		$return['body'] = [];
	}
}