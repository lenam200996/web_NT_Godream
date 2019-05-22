<?php
/*
	Template Name: contact
*/
?>
<!--header-->
<?php $id =1386; ?>
<?php $slogan = get_field('slogan',$id); ?>
<div class="row top-header" id="home">
	<div class="container">
				<div class="row">
			<div class="col-lg-5 col-md-6 col-sm-12 left-top-header">
				<span class="slogan"><?php echo $slogan; ?></span>
			</div>
			<?php 
				if(get_field('contact',$id)){
					$i = 1;
					while(have_rows('contact',$id)):the_row();
						$icon = get_sub_field('icon');
						$title = get_sub_field('title');
						if($i == 1){
			 ?>

			<div class="col-lg-4 col-md-6 col-sm-12 right-top-header transf-right">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<?php echo $icon; ?>
						<span class="title-top-header  title-white"><?php echo $title; ?></span>
				</div>
			</div>
			<?php }else{ ?>
				<div class="col-lg-3 col-md-6 col-sm-12 right-top-header">
					<div class="col-lg-12 col-md-12 col-sm-12">
					<?php echo $icon; ?>
						<span class="title-top-header"><?php echo $title; ?></span>
					</div>
				</div>
			<?php } ?>
			<?php $i++; endwhile; } ?>
		</div>
	</div>
</div>
<?php get_header();?>
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

			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-contact-inf">
							<h2>LIÊN HỆ</h2>
							<?php 
								$id_this = get_the_ID();
								$address = get_field('address',$id_this);
								$phone = get_field('phone',$id_this);
								$gmail = get_field('gmail',$id_this);
							 ?>
							<ul>
								<li>
									<p>
										<span class="fas fa-map-marker-alt"></span>
										<span class="span-info"><?php echo $address; ?></span>
									</p>
								</li>
								<li>
									<p>
										<span class="fas fa-phone"></span>
										<span class="span-info"><?php echo $phone; ?></span>
									</p>
								</li>
								<li>
									<p>
										<span class="fas fa-envelope"></span>
										<span class="span-info"><?php echo $gmail; ?></span>
									</p>
								</li>
							</ul>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-contact-field">
							<h2>TIN NHẮN</h2>
							<?php echo do_shortcode('[contact-form-7 id="1598" title="contact"]'); ?>
						</div>
					</div>
					<div class="row row-iframe">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.12246982983!2d105.69140671409433!3d18.658499487328854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cc2b7b9e3181%3A0xff439c7cb495053!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gQ8O0bmcgTmdo4buHIE5hbSBUaMSDbmc!5e0!3m2!1svi!2s!4v1557721701571!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
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
			<div class="col-md-6 col-lg-4 col-sm-6 col-xl-2">
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
			<div class="col-md-6 col-lg-4 col-sm-6 col-xl-2">
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
			<div class="col-md-6 col-lg-4 col-sm-6 col-xl-2">
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
			<div class="col-md-6 col-lg-4 col-sm-12 col-xl-3">
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
<div class="scroll-to-top">
	<i class="fas fa-caret-up"></i>
</div>
</div>
<?php get_footer(); ?>