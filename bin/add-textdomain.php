#!/usr/bin/env php
<?php
namespace WordPress\L18N;
error_reporting(E_ALL);
ini_set('display_errors', 1);

$adddomain = new AddTextDomain;

if (!isset($argv[1]) || !isset($argv[2])) {
	$adddomain->usage();
}

$inplace = false;
if ('-i' == $argv[1]) {
	$inplace = true;
	if (!isset($argv[3])) $adddomain->usage();
	array_shift($argv);	
}

$adddomain->process_file($argv[1], $argv[2], $inplace);