<?php
namespace Model;

/**
 * Flickr Model
 *
 * @package Model
 * @author Graham Weldon
 */
class Flickr extends Generic {

/**
 * Flickr API Options
 *
 * @var array
 */
	protected $_options = array(
		'uri' => 'http://api.flickr.com/services/rest/',
		'method' => array(
			'search' => 'flickr.photos.search',
		),
		'params' => array(
			'format' => 'php_serial',
			'text' => null,
			'per_page' => 5,
			'api_key' => '', // Enter your Flickr API Key here
		),
	);

/**
 * Find images based on the input string
 *
 * @param string $query Query string
 * @return void
 * @author Graham Weldon
 */
	public function find($query, $page = 1) {
		$result = $this->_queryFlickr($query, $page);
		if ($this->_isFlickrError($result)) {
			return false;
		}
		return $result['photos'];
	}

/**
 * Determine if the returned result is an error
 *
 * @param Object $result Unserialized result from Flickr
 * @return boolean
 * @author Graham Weldon
 */
	protected function _isFlickrError($result) {
		return $result['stat'] === 'fail';
	}
	
/**
 * Send query to Flickr service for results
 *
 * @param string $query 
 * @return void
 * @author Graham Weldon
 */
	protected function _queryFlickr($query, $page) {
		extract($this->_options);
		$params = http_build_query(array_merge($params, array(
			'text' => urlencode($query),
			'page' => $page)));
		$uri = sprintf('%s?method=%s&%s', $uri, $method['search'], $params);
		return unserialize(file_get_contents($uri));
	}
}
