<div class="item-new-product">
	<?php
		 $image = wp_get_attachment_image_src(get_post_thumbnail_id($the_query->ID),'single-post-thumbnail'); ?>
	<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">

	<div class="name-new-product">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
	</div>
</div>