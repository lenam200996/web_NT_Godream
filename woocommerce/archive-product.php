<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'sub' );


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );

?>
<!-- <header class="woocommerce-products-header">
	<?php //if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php //woocommerce_page_title(); ?></h1>
	<?php// endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	//do_action( 'woocommerce_archive_description' );
	?>
</header> -->

<div class="content" role="main">
		<main id="main-content">
			<div class="container-fluid">
				<div class="row row-title-single">
					<img src="<?php echo get_template_directory_uri();?>/assets/images/smart_house.jpg" alt="" width="100%" height="100%">
					<div class="title-single">
						<?php woocommerce_page_title(); ?>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-lg-3 col-xs-3 col-sidebar-single-product">
						<?php get_sidebar('product'); ?>
					</div>
					<div class="col-md-12 col-sm-12 col-lg-9 col-xs-9">
						<div class="row row_list_category">

							<?php
							if ( woocommerce_product_loop() ) {

								if ( wc_get_loop_prop( 'total' ) ) {
									while ( have_posts() ) {
										the_post();
										do_action( 'woocommerce_shop_loop' );

										wc_get_template_part( 'content', 'product' );
									}
								}

								do_action( 'woocommerce_after_shop_loop' );
							} else {

								do_action( 'woocommerce_no_products_found' );
							}


							?>
				</div>
			</div>
		</div>
	</div>	
</main>
<!--bottom-->
<?php 
	$logobottom = get_field('logo_bottom',1386);
	$aboutcontext = get_field('gioi_thieu_ngan',1386);
?>
<section id="" class="row session-bottom">
	<div class="container">
		<div class="row row-logo-bottom">
			<a class="navbar-brand" href="#">
				<img src="<?php echo $logobottom; ?>" alt="<?php bloginfo('name')?>" title="<?php bloginfo('description')?>" width="157" height="70">
			</a>
		</div>
		<div class="row row-bottom-context">
			<!--column 1-->
			<div class="col-md-6 col-lg-4 col-sm-6 col-xl-3 ">
				<div class="bottom-title">
					Giới thiệu
				</div>
				<div class="bottom-text">
					<?php  echo $aboutcontext; ?>
				</div>
			</div>
			<!--column 2-->
			<div class="col-md-6 col-lg-4 col-sm-12 col-xl-2">
				<div class="bottom-title">
					Dịch vụ
				</div>
				<div class="bottom-text">
						<?php $args = array(
				                   'post_type' =>'dichvu',
				                   'posts_per_page' =>3,
				                );
						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) {
						    while ( $the_query->have_posts() ) {
						        $the_query->the_post();?>
							<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
						<?php }}?>
				</div>
			</div>
			<!--column 3-->
			<div class="col-md-6 col-lg-8 col-sm-6 col-xl-4">
				<div class="bottom-title">
					Map
				</div>
				<div class="bottom-text">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.12246982983!2d105.69140671409433!3d18.658499487328854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cc2b7b9e3181%3A0xff439c7cb495053!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gQ8O0bmcgTmdo4buHIE5hbSBUaMSDbmc!5e0!3m2!1svi!2s!4v1557721701571!5m2!1svi!2s" width="100%" height="165" frameborder="0" style="border:0" allowfullscreen=""></iframe>
				</div>
			</div> 
			<!--column 5-->
			<div class="col-md-6 col-lg-4 col-sm-12 col-xl-3">
				<div class="bottom-title">
					Facebook
				</div>
				<div class="bottom-text">
					<div class="media-bottom">
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FNamThangCompany%2F&tabs=timeline&width=340&height=165&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=540881106345174" width="320" height="165" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--end bottom-->
</div>
<?php get_footer();?>
