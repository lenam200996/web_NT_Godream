<!DOCTYPE html>
<html "<?php language_attributes(); ?>">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmgp.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/assets/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/lib/slick_carousel/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/lib/slick_carousel/slick-theme.css">
	<script
    type="text/javascript"
    async defer
    src="//assets.pinterest.com/js/pinit.js"
	></script>
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?> >
	<div id="container-fluid">
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
						<span class="title-top-header  title-white"><a href="mailto:<?php echo $title; ?>"><?php echo $title; ?></a></span>
				</div>
			</div>
			<?php }else{ ?>
				<div class="col-lg-3 col-md-6 col-sm-12 right-top-header">
					<div class="col-lg-12 col-md-12 col-sm-12">
					<?php echo $icon; ?>
						<span class="title-top-header"><a href="tel:<?php echo $title; ?>"><?php echo $title; ?></a></span>
					</div>
				</div>
			<?php } ?>
			<?php $i++; endwhile; } ?>
		</div>
	</div>
</div>
<div class="row main-menu-div">
	<div class="container">
		<div class="row">
			<!-- Brand -->
			<div class="col-lg-3 col-md-3 col-sm-3 col-3 site-brand ">
				<a class="navbar-brand" href="<?php echo get_site_url();?>">
					<?php 
						$custom_logo_id = get_theme_mod( 'custom_logo' );
					   	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					?>
					<img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('name')?>" title="<?php bloginfo('description')?>">
				</a>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-9 main-menu">
					<button id="toggle-menu-id" class="toggle-menu" value="on"><i class="fas fa-bars"></i></button>
					<!-- Navbar links -->
					<nav class="navbar navbar-expand-md bg-dark navbar-dark">
						<?php mytheme_menu('primary-menu');?>
							<!--search form-->
							<div class="search-form">
							   	<button class="btnTogSearchForm"><i class="fas fa-search"></i></button>
							   	<form id="main-search" action="<?php echo home_url( '/' ); ?>" class="mainsearch">
									<input class="topinput" id="topinput" type="text" value="<?php echo get_search_query() ?>" maxlength="100" placeholder="Bạn tìm gì..." id="skw" name="s"> 
									<button class="btntop" type="submit"><i class="fa fa-search"></i></button>
									<div id="search-result"></div>
								</form>
							</div>
							<!--end search form--->
					</nav>
				</div>
			</div>
		</div>
</div>


		
