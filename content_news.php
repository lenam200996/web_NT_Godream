<div class="col-md-6 col-lg-4 col-sm-12 col-item-news">
	<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink();?>">
				<?php 
				if(has_post_thumbnail()){
					the_post_thumbnail('thumbnail');
				}else{?>
					<img src="<?php echo get_template_directory_uri();?>/assets/images/thumbnail-default.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" width="360" height="260">
				<?php }
				 ?>
			</a>
		</div>
			<div class="details-news-item">
				<span class="details-news-item-title">
					<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
				</span><br>
				<p class="details-news-item-context">
					<?php $readmor = get_the_content(); echo wp_trim_words($readmor,25,''); ?>
				 </p>
				 <span class="read-more-text"><a href="<?php the_permalink();?>">Xem thêm</a></span>
			</div>
	</article>
</div>