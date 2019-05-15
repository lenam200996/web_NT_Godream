<div class="col-md-6 col-lg-4 col-sm-12 col-item-news wow zoomInUp">
	<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail('thumbnail'); ?>
		</div>
			<div class="details-news-item">
				<span class="details-news-item-title">
					<?php the_title(); ?>
				</span><br>
				<p class="details-news-item-context">
					<?php $readmor = get_the_content(); echo wp_trim_words($readmor,28,''); ?>
				 </p>
				 <span class="read-more-text"><a href="<?php the_permalink();?>">Xem thêm</a></span>
			</div>
	</article>
</div>