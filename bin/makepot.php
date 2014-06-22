#!/usr/bin/env php
<?php
namespace WordPress\L18N;
error_reporting(E_ALL);
ini_set('display_errors', 1);

$makepot = new MakePOT;

if ((3 == count($argv) || 4 == count($argv)) && in_array($method = str_replace('-', '_', $argv[1]), get_class_methods($makepot))) {
	$res = call_user_func(array($makepot, $method), realpath($argv[2]), isset($argv[3])? $argv[3] : null);
	if (false === $res) {
		fwrite(STDERR, "Couldn't generate POT file!\n");
	}
} else {
	$usage  = "Usage: php makepot.php PROJECT DIRECTORY [OUTPUT]\n\n";
	$usage .= "Generate POT file from the files in DIRECTORY [OUTPUT]\n";
	$usage .= "Available projects: ".implode(', ', $makepot->projects)."\n";
	fwrite(STDERR, $usage);
	exit(1);
}