<?php
extract($image);
if (!isset($size)) {
	$size = 's';
}
echo sprintf(
	'http://farm%s.static.flickr.com/%s/%s_%s_%s.jpg',
	$farm,
	$server,
	$id,
	$secret,
	$size);
	