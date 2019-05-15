<div class="col-md-6 col-sm-12 col-lg-4 col-item-service wow flipInX" >
	<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<div class="service-item-container">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail',360,260);?></a>
					<div class="title-service-item">
						<a href="<?php the_permalink(); ?>"><span><?php the_title();?></span></a>
					</div>
				</div>
			</div>
	</article>
</div>