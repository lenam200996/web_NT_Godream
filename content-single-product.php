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
		<div class="call-order"> 
      <img src="<?php echo get_template_directory_uri();?>/assets/call-phone.png" alt=""> 
      <a href="tel:0966098098">Đặt mua qua điện thoại:<br> 
        <span>0966.098098</span>
      </a>
    </div>
    <div class="social-share-buttons">
      <div class="fb-like-button">
         <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FNamThangCompany%2F&width=77&layout=button_count&action=like&size=small&show_faces=false&share=false&height=21&appId=540881106345174"  height="21" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
      </div>     
      <?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox_3xz0"]'); ?>
    </div>
	</div>
</div>
<?php $tabs = apply_filters( 'woocommerce_product_tabs', array() );
if ( ! empty( $tabs ) ) : ?>
  <div class="woocommerce-tabs wc-tabs-wrapper">
    <ul class="tabs wc-tabs" role="tablist">
      <?php foreach ( $tabs as $key => $tab ) : ?>
        <li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
          <a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
     <div class="clear-div-float"></div>
    <?php foreach ( $tabs as $key => $tab ) : ?>
      <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
        <?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
<!-- <div class="row row-tab-details-product"> -->
	<!-- Nav tabs -->
	  <!-- <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item  details-tab">
      <a class="nav-link active details-tab" data-toggle="tab" href="#details-product">Mô tả</a>
    </li>
    <li class="nav-item  details-tab">
      <a class="nav-link details-tab" data-toggle="tab" href="#about-product">Giới thiệu</a>
    </li>
   
  </ul> -->

  <!-- Tab panes -->
  <!-- <div class="tab-content">
    <div id="details-product" class="container tab-pane active"><br>
      <p><?php //echo $product->get_description(); ?></p>
    </div>
    <div id="about-product" class="container tab-pane fade"><br>
     <p><?php //echo $product->get_short_description(); ?></p>
    </div>
   
  </div> -->
<!-- </div>
 -->