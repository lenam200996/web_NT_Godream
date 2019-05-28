<?php get_header('sub'); ?>


	<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="content">
	<main id="main-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-9 col-xs-9">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; // end of the loop. ?>
				</div>
				<div class="col-md-12 col-sm-12 col-lg-3 col-xs-2 col-sidebar-single-product">
					<?php get_sidebar('product'); ?>
				</div>
			</div>
			<div class="row row-related-product">
				<h1>SẢN PHẨM CÙNG LOẠI</h1>
				<div class="row list-slider-related-product">
					<?php
					global $product;
					$query_related_product = new WP_Query(array(
					'post_type'=>'product',
					'post_status'=>'publish',
					'tax_query' => array(
					      array(
					          'taxonomy' => 'product_cat',
					          'field' => 'id',
					          'terms' => $product->get_category_ids()
					      )
					  ),
					'orderby' => 'ID',
					'order' => 'DESC',
					'posts_per_page'=> '4'));
					?>
					<?php while ($query_related_product->have_posts()) : $query_related_product->the_post(); ?>
						<div class="item-related-product col-xs-2 col-lg-2 col-md-3 col-sm-6">
							<div class="img-item-related-product">
								<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($loop->post->ID),'single-post-thumbnail'); ?>
								<a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"></a>
							</div>
							<div class="name-related-item-product">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</div>
							<p><?php echo wc_price( wc_get_price_including_tax( $product ) ); ?></p>
						</div>
					<?php endwhile ; wp_reset_query() ;?>
					
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
					<div class="col-md-6 col-lg-3 col-sm-12 col-xs-3">
						<div class="bottom-title">
							Giới thiệu
						</div>
						<div class="bottom-text">
							<?php  echo $aboutcontext; ?>
						</div>
					</div>
					<!--column 2-->
					<div class="col-md-6 col-lg-2 col-sm-12 col-xs-2">
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
					<div class="col-md-6 col-lg-3 col-sm-12 col-xs-3">
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


