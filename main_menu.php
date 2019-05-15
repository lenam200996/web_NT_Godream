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

