<?php
/*
	(c) Copyright 2019, Pongsakorn Ritrugsa <poundxi@protonmail.com>
	This project is licensed under the terms of the MIT license.
*/

// Tell browser this content is in JSON format with UTF-8 encoding.
header('Content-Type: application/json; charset=utf-8');

// Tell browser this API is allow access from any origins (CORS)
header('Access-Control-Allow-Origin: *');

require_once('functions.php');

function do_generate_command() {
	// Generate success
	echo json_encode([
		'idcard' => get_generated_idcard()
	]);
}

function do_verify_command() {
	// Check idcard request is set & not empty
	if ( !empty($_REQUEST['idcard']) ) {
		$idcard = $_REQUEST['idcard'];

		if (is_13digits($idcard)) {
			// Verify success
			echo json_encode([
				'idcard' => $idcard,
				'valid' => is_idcard_valid($idcard)
			]);
		} else {
			make_bad_request("Invalid idcard format (Please specify the idcard that contains 13 digits).");
		}
	} else {
		// No idcard specified.
		make_bad_request("No idcard specified.");
	}
}

// Check command request is set & not empty
if ( !empty($_REQUEST['command']) ) {
	$command = $_REQUEST['command'];

	switch ($command) {
		case "generate":
			do_generate_command();
			break;
		case "verify":
			do_verify_command();
			break;
		default:
			// Unknown command
			make_bad_request( sprintf("Unknown command '%s'. Avaliable commands are 'generate' & 'verify'.", $command) );
	}
} else {
	// No command specified.
	make_bad_request("No command specified. Avaliable commands are 'generate' & 'verify'.");
}
