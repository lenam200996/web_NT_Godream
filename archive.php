<?php
/*
Template Name: contact
*/
get_header(); ?>

<div id="container">
	<div class="content" role="main">
		<main id="main-content">
			<div class="container-fluid">
				<div class="row row-title-single">
					<img src="<?php echo get_template_directory_uri();?>/assets/images/smart_house.jpg" alt="" width="100%" height="100%">
					<div class="title-single">
						<?php the_archive_title(); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<?php if(have_posts()):while(have_posts()):the_post(); ?>
				<?php get_template_part('content_dichvu',get_post_format());
				endwhile;endif; ?>
			</div>
		</main>
	</div><!-- #content -->
</div><!-- #container -->
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
					<div class="col-md-6 col-lg-6 col-sm-6 col-xl-3 ">
						<div class="bottom-title">
							Giới thiệu
						</div>
						<div class="bottom-text">
							<?php  echo $aboutcontext; ?>
						</div>
					</div>
					<!--column 2-->
					<div class="col-md-6 col-lg-6 col-sm-6 col-xl-2">
						<div class="bottom-title">
							Dịch vụ
						</div>
						<div class="bottom-text">
								<?php $args = array(
						                   'post_type' =>'dichvu',
						                   'posts_per_page' =>-1,
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
					<div class="col-md-6 col-lg-6 col-sm-6 col-xl-2">
						<div class="bottom-title">
							Chính sách
						</div>
						<div class="bottom-text">
							<?php if(get_field('chinh_sach',1386)){
								while(have_rows('chinh_sach',1386)):the_row();
									$titleChinhSach = get_sub_field('ten_chinh_sach');
									$linkChinhSach = get_sub_field('link_chinh_sach');
									?>
									<p><a href="<?php echo $linkChinhSach; ?>"><?php echo $titleChinhSach; ?></a></p>
							<?php endwhile;} ?>

						</div>
					</div>
					<!--column 4-->
					<div class="col-md-6 col-lg-6 col-sm-6 col-xl-2">
						<div class="bottom-title">
							Hỗ trợ
						</div>
						<div class="bottom-text">
							<?php if(get_field('ho_tro',1386)){
								while(have_rows('ho_tro',1386)):the_row();
									$titleHoTro = get_sub_field('title_support');
									$linkHoTro = get_sub_field('link_support');
									?>
									<p><a href="<?php echo $linkHoTro; ?>"><?php echo $titleHoTro  ?></a></p>
							<?php endwhile;} ?>
						</div>
					</div>
					<!--column 5-->
					<div class="col-md-6 col-lg-6 col-sm-12 col-xl-3">
						<div class="bottom-title">
							Facebook
						</div>
						<div class="bottom-text">
							<div class="media-bottom">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--end bottom-->
<?php get_footer(); ?>