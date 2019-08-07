<?php
/*
	(c) Copyright 2019, Pongsakorn Ritrugsa <poundxi@protonmail.com>
	This project is licensed under the terms of the MIT license.
*/

function make_bad_request($msg) {
	http_response_code(400);
	echo json_encode(['message' => $msg]);
}

function get_idcard_lastdigit($idcard) {
	// if too long or too short
	if(strlen($idcard) > 13 || strlen($idcard) < 12) return -1;

	// calculate for check digit
	$sum = 0;
	for($i = 0; $i < 12; $i++) {
		$sum += (int)$idcard[$i] * (13 - $i);
	}
	$mod = $sum % 11;
	$check_digit = (11 - $mod) % 10;

	return $check_digit;
}

function get_generated_idcard() {
	// start with 9 is invalid in the real world.
	$idcard = "9";

	// append with the 11-digit random numbers
	for ($i=1; $i <= 11; $i++) {
		$idcard .= (string)rand(0, 9);
	}

	// append with the last digit
	$idcard .= (string)get_idcard_lastdigit($idcard);

	return $idcard;
}

function is_idcard_valid($idcard) {
	if (!is_13digits($idcard)) return false;

	return (get_idcard_lastdigit($idcard) == $idcard[12]);
}

function is_13digits($str) {
	preg_match('/^\d{13,13}$/', $str, $regex_matches);
	if (empty($regex_matches))
		return false;

	return true;
}
