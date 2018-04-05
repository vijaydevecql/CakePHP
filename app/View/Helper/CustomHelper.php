<?php

class CustomHelper extends AppHelper {

	function load_image($image, $gender = 0) {
		$return = '';
		if (trim($image) != '' && file_exists(APP . DS . 'webroot' . DS . 'img' . DS . 'users' . DS . $image)) {
			$return = $this->webroot . 'img/users/' . $image;
		} else {
			switch ($gender) {
				case 1:
					$return = $this->webroot . 'img/male_blank.png';
					break;
				case 1:
					$return = $this->webroot . 'img/female_blank.png';
					break;
				default:
					$return = $this->webroot . 'img/male_blank.png';
					break;
			}
		}
		return $return;
	}

	function hide_phone($phone) {
		$_stars = '****';
		if (trim($phone) != '' && strlen($phone) > 4) {
			$_number_of_stars = strlen($phone) - 4;
			$_stars = '';
			for ($i = 1; $i <= $_number_of_stars; $i++) {
				$_stars .= '*';
			}
		}
		return (strlen($phone) > 4 ? substr($phone, 0, 4) . $_stars : '');
	}

	function random_color() {
		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
		$color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];
		return $color;
	}

}
