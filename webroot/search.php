<?php
require '../autoload.php';

require BASEPATH . '/session.php';

$controller = new \Controller\Flickr($_GET);
$controller->search();

$view = new View($controller);
$view->element('header', array('title' => 'Yahoo!7 Technical Assessment'));
$view->render('search');
$view->element('footer');
