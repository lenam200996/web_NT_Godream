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
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?> >
	<div id="container-fluid">
		<!--top header-->
		<?php require_once('top_header.php');?>
		<!--end top header-->
		<!--main menu-->
		<?php require_once('main_menu.php');?>
		<!--end main menu-->
		
		
