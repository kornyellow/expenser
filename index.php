<?php

use libraries\korn\KornConfig;
use libraries\korn\client\KornHeader;
use libraries\korn\utils\KornNetwork;

// Make errors visible
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set timezone
date_default_timezone_set('Asia/Bangkok');

// Libraries for autoload classes
include('vendor/autoload.php');

// Config header
KornConfig::$websiteName        = 'Expenser';
KornConfig::$defaultDescription = 'Expense management';
KornConfig::$defaultAbstract    = 'Expense management';
KornConfig::$defaultKeywords    = 'expense,account';

// Start Sessions
session_start();

// Find requested path
$currentDomainURL = KornNetwork::getCurrentDomainURL();

$requestPath  = KornNetwork::getRequestPath();
$absolutePath = KornNetwork::getAbsolutePath($requestPath);
if ($requestPath != $absolutePath) {
	KornNetwork::redirectPage($currentDomainURL.'/'.$absolutePath);
}

// Preventing user from accessing direct index.php
if (str_ends_with($absolutePath, '.php')) {
	$absolutePath = substr($absolutePath, 0, -9);
	KornNetwork::redirectPage($currentDomainURL.'/'.$absolutePath);
}

// Set Canonical URL
KornHeader::setCanonical($absolutePath);

// Find a requested file
$requestFile = KornNetwork::getDocumentRoot().'/contents/';

if (empty($absolutePath)) {
	$requestFile .= 'home.php';
}
else if (!file_exists($requestFile.$absolutePath.'.php')) {
	$requestFile .= $absolutePath.'/index.php';
}
else {
	$requestFile .= $absolutePath.'.php';
}

// Check login
$isLogin      = false;
$isFileExists = file_exists($requestFile);
$isApi        = str_starts_with(KornNetwork::getRequestPath(), 'api');

// TODO: working on an APIs

// Construct an entire page
if ($isApi) {
	if (KornNetwork::getRequestMethod() == "GET") {
		if ($isLogin) {
			http_response_code(404);
			include('templates/cores/404.php');
		}
		else {
			KornNetwork::redirectPage();
		}
	}
	else {
		include($requestFile);
	}
}
else {
	if ($isLogin) {
		if ($isFileExists) {
			include($requestFile);
		}
		else {
			http_response_code(404);
			include('templates/cores/404.php');
		}
	}
	else {
		if (KornNetwork::getRequestPath() === '') {
			include('templates/authentication/signin.php');
		}
		else {
			KornNetwork::redirectPage();
		}
	}
	include('templates/footer.php');
}
