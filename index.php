<?php get_header();?>
		<!--container head-->
		<?php require_once('container_head.php');?>
		<!--end container head-->
		<!--about us-->
		<?php require_once('service_part.php');?>
		<!--end about us-->
		<!--project list-->
		<?php require_once('project-list.php');?>
		<!--end project list-->
		<!--product list-->
		<?php require_once('product-list.php');?>
		<!--end product list-->
		<!--feelback-->
		<?php require_once('slide-feelback.php');?>
		<!--end feelback-->
		<!--news-->
		<?php require_once('news.php');?>
		<!--end news-->
		<!--bottom-->
		<?php require_once('bottom.php');?>
		<!--end bottom-->
<div class="content">
	<div id="main-content">
		 
		<?php if (have_posts()) :while (have_posts()) : the_post();?>
			<?php get_template_part('content',get_post_format());?>
		<?php endwhile;?>
		<?php mytheme_phantrang();?> <!---ham phan trang-->

		<?php else: get_template_part('content','none');?>
		<?php endif;?>
	</div>
	<div id="sidebar">
		<?php get_sidebar();?>
	</div>
</div>
<?php get_footer();?>