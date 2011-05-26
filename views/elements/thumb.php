<?php
/**
 * hMedia Microformat for images
 *
 * @see http://microformats.org/wiki/hmedia
 * @author Graham Weldon
 */
$showOptions = array_intersect_key($image, array_flip(array('id', 'secret', 'farm', 'server')));
$showUrl = 'show.php?' . http_build_query($showOptions);
?>
<div class="hmedia">
	
	<a rel="enclosure" type="image/jpeg" href="<?php echo $showUrl; ?>">
		<img class="photo" src="<?php echo $this->element('flickr_url', array('image' => $image)); ?>" />
	</a>
</div>