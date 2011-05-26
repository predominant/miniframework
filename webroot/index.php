<?php
require '../autoload.php';

require BASEPATH . '/session.php';

$view = new View();
$view->element('header', array('title' => 'Yahoo!7 Technical Assessment'));
if (!empty($_SESSION['_page_error'])) {
	$view->element('error', array('message' => $_SESSION['_page_error']));
	unset($_SESSION['_page_error']);
}
$view->render('form');
$view->element('footer');
