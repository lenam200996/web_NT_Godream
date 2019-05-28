<!--header-->
<?php get_header('sub'); ?>
<!--end header-->
<div class="content">
	<main id="main-content">

		<div class="container-fluid">
			<div class="row row-title-single">
				<img src="<?php echo get_template_directory_uri();?>/assets/images/smart_house.jpg" alt="" width="100%" height="100%">
				<div class="title-single">
					<?php the_title(); ?>
				</div>
			</div>
		</div>
		<div class="container">
			<?php if (have_posts()) :while (have_posts()) : the_post();?>
			<?php get_template_part('content',get_post_format());?>
			<?php endwhile;?>
			<?php mytheme_phantrang();?> <!---ham phan trang-->
			<?php else: get_template_part('content','none');?>
			<?php endif;?>
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
			<div class="col-md-6 col-lg-4 col-sm-12 col-xl-3">
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
<div class="scroll-to-top">
	<i class="fas fa-caret-up"></i>
</div>
</div>
<?php get_footer();?>