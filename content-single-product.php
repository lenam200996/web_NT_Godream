<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */

?>
<div class="row row-redir">
	<span>
    <a id="home-url" href="<?php echo get_home_url(); ?>">Trang chủ</a> 
    <i class="fas fa-caret-right"></i> 
    <?php echo trim($product->get_categories()); ?> 
    <i class="fas fa-caret-right"></i> 
    <a id="product-url"><?php echo  trim($product->get_slug()); ?></a>
  </span>
</div>
<div class="row" id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="col-md-12 col-xs-5 col-lg-5 col-sm-12 img-view-product">
		<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($loop->post->ID),'single-post-thumbnail'); ?>


			<?php 
				do_action( 'woocommerce_before_single_product_summary' );
			?>
			
	</div>
	<div class="col-md-12 col-xs-7 col-lg-7 col-sm-12 details-view-product">
		<?php do_action( 'woocommerce_single_product_summary' );  ?>
		
	</div>
</div>

<div class="row row-tab-details-product">
	<!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item  details-tab">
      <a class="nav-link active details-tab" data-toggle="tab" href="#details-product">Mô tả</a>
    </li>
    <li class="nav-item  details-tab">
      <a class="nav-link details-tab" data-toggle="tab" href="#about-product">Giới thiệu</a>
    </li>
   
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="details-product" class="container tab-pane active"><br>
      <p><?php echo $product->get_description(); ?></p>
    </div>
    <div id="about-product" class="container tab-pane fade"><br>
     <p><?php echo $product->get_short_description(); ?></p>
    </div>
   
  </div>
</div>
