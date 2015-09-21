<?php

/*
	Plugin Name: Back To Top
	Plugin URI: http://brunovandekerkhove.com
	Plugin Description: Add a 'back to top' button. 
	Plugin Version: 1.0
	Plugin Date: 2015-01-27
	Plugin Author: Bruno Vandekerkhove
	Plugin Author URI: http://brunovandekerkhove.com
	Plugin License: none
	Plugin Minimum Question2Answer Version: 1.6
*/

if ( !defined('QA_VERSION') ) {
	header('Location: ../../');
	exit;
}

qa_register_plugin_layer('qa-btt-layer.php', 'Back To Top Layer');
qa_register_plugin_module('module', 'qa-btt-admin.php', 'qa_btt_admin', 'Back To Top Admin');