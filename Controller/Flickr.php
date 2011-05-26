<?php
namespace Controller;

/**
 * Flickr Controller
 *
 * @package Controller
 * @author Graham Weldon
 */
class Flickr extends Generic {

/**
 * Search Flickr for images based on input
 *
 * @return array Images found
 * @author Graham Weldon
 */
	public function search() {
		$search = trim($this->_data['search']);
		if (isset($this->_data['page'])) {
			$page = trim($this->_data['page']);
		} else {
			$page = 1;
		}
		if (empty($search)) {
			$this->_setError('Empty search string.');
			header('Location: index.php');
			die();
		}

		$this->set('query', htmlentities($search));
		$this->set('images', $this->{$this->name}->find($search, $page));
	}

/**
 * Fetch and display a single photo
 *
 * @return array Image data
 * @author Graham Weldon
 */
	public function show() {
		$this->set('image', $this->_data);
	}
}