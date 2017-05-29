<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('table','pagination','session','database','form_validation','encrypt');


$autoload['drivers'] = array();

$autoload['helper'] = array('url','form','file','xml','string');


$autoload['config'] = array();


$autoload['language'] = array();

$autoload['model'] = array('M_admin','M_movie','M_TSaldo','M_other');
