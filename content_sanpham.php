
<div class="col-md-4 col-lg-3 col-sm-6 div-product-item">
	<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail',360,260);?></a>
		</div>
		<div class="details-product-item">
			<span class="details-product-item-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</span><br>
			<span class="details-product-item-price">
				<?php global $product; ?>
				Giá thành: <span class="price">
					<?php echo wc_price( wc_get_price_including_tax( $product ) ); ?>
				</span>
			</span>
		</div>
	</article>
	
</div>


