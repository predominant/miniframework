<div class="pagination">
	<span class="prev">
		<?php if ($current > 1): ?>
			<a href="search.php?search=<?php echo $query; ?>&amp;page=<?php echo $current - 1; ?>">&laquo; Previous</a>
		<?php else: ?>
			&laquo; Previous
		<?php endif; ?>
	</span>
	|
	<span class="current">
		Page <?php echo $current; ?>
	</span>
	|
	<span class="next">
		<?php if ($current < $total): ?>
			<a href="search.php?search=<?php echo $query; ?>&amp;page=<?php echo $current + 1; ?>">Next &raquo;</a>
		<?php else: ?>
			Next &raquo;
		<?php endif; ?>
	</span>
</div>