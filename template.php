<?php if (have_posts()) { ?>

	<?php while (have_posts()) : the_post(); ?>

		<li>
			<h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
			<div class="text"><?php the_excerpt('(continue reading...)'); ?></div>
			<div class="metainfo"><span><?php the_time(get_option('date_format')); ?></span> <span><?php the_category(', '); ?></span></div>
			<div class="clear"> </div>
		</li>

	<?php endwhile; ?>
	
		<li class="pagenum">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			<div class="clear"> </div>
		</li>

<?php } else {
		_e( !empty($empty_message) ? $empty_message : _('Sorry, no results were found for your query'));
	}
?>