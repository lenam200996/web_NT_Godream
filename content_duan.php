
	<div class="col-md-6 col-lg-4 col-sm-12 item-project wow zoomInDown">
	<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
		<div class="div-item-project entry-thumbnail">
			<div class="btn-items-project">
				<span class="btn-item-project" id="title-item-project"><?php the_title(); ?></span>
				<a class="btn-item-project"  href="<?php the_permalink(); ?>"><i class="fas fa-arrow-right  btn-i-pr"></i></a>
			</div>
			
			<?php the_post_thumbnail('thumbnail',260,260);?>
		</div>
		
	</article>
	</div>
<!-- 	<div class="entry-header">
		<?php// mytheme_entry_header();?>
	</div> -->


