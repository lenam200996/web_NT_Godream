
<div class="col-md-4 col-lg-3 col-sm-6 div-product-item">
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
		<div class="details-product-item">
			<span class="details-product-item-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</span><br>
			<span class="details-product-item-price">
				<a href="<?php the_permalink(); ?>">Chi tiết</a>
			</span>
		</div>
	</article>
</div>


