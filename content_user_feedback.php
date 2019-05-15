
	<div>	
			<?php 
				$post_thumbnail_id = get_post_thumbnail_id();
        		$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); 
        	?>
			<img src="<?php echo $post_thumbnail_url; ?>" width="50" height="50">
	</div>

