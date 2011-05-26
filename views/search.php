<p><a href="index.php">&laquo; Back to form</a></p>
<h2><?php echo $images['total']; ?> results found for '<?php echo $query; ?>'</h2>
<?php
foreach ($images['photo'] as $image) {
	$this->element('thumb', array('image' => $image));
}
$this->element('pagination', array(
	'current' => $images['page'],
	'total' => $images['pages'],
));