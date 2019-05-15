<div class="row row-feedback">
	<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
		<div class="row-context-feedback-slide">
				<?php the_content(); ?>
			</div>
			<div class="row-user-feedback-slide">
				<span class="feedback-name-user"><?php the_title(); ?></span><br>
				<span class="feedback-excerpt-user"><?php the_excerpt(); ?></span>
		</div>
	</article>
</div>