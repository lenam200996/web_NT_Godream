<!-- <div class="col-sidebar-contact">
	<h5>Bạn cần hỗ trợ?</h5>
	<p>Mua sản phẩm</p>
	<h4><a href="tel:0966098098">0966.098098</a></h4>
	<a href="<?php //echo get_home_url().'/lien-he'; ?>">Liên hệ</a>
</div>
 -->
<div class="col-sidebar-contact">
	<p><span>Danh mục</span></p>
	<ul>
	    
	   <?php 
		$category = get_terms('product_cat');//custom category name 
		foreach ($category as $catVal) { ?>
			<li><i class="fas fa-arrow-circle-right"></i><a href="<?php echo get_term_link( $catVal->term_id, 'product_cat' ); ?>"><?php echo $catVal->name; ?></a></li>
		<?php }  ?>
	
	</ul>
</div>

<div class="col-sidebar-new-product">
	<p><span>Sản phẩm mới</span></p>
	<?php 
		$args = array(
           'post_type' =>'product',
           'posts_per_page' =>3,
        );
	?>
		<!--item -->
    	<?php $the_query = new WP_Query( $args );
		// The Loop
		if ( $the_query->have_posts() ) {
		    while ( $the_query->have_posts() ) {
		        $the_query->the_post();?>
			<?php get_template_part('content-newproduct',get_post_format());?>
		<?php }}else{
			get_template_part('content','none');
		}?>
	    <!--end item-->
</div>