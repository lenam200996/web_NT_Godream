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
		<div class="container">

		
		<?php
		$s=get_search_query();
		$args = array(
		                's' =>$s
		            );
		    // The Query
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
		        _e("<h2 style='font-weight:bold;color:#000'>Tìm kiếm với: ".get_query_var('s')."</h2>");
		        _e("<div class='row'>");
		        while ( $the_query->have_posts() ) {
		           $the_query->the_post();
	 		?>
	               <?php get_template_part('content_search',get_post_format());
		        }
		        _e("</div>");
		    }else{
				?>
		        <h2 style='font-weight:bold;color:#000'>Không tìm thấy</h2>
		        <div class="alert alert-info">
		          <p>Không tìm thấy kết quả phù hợp. Vui lòng tìm kiếm với từ khóa khác</p>
		        </div>
			<?php } ?>
		</div>	
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
			<div class="col-md-6 col-lg-3 col-sm-12 ">
				<div class="bottom-title">
					Giới thiệu
				</div>
				<div class="bottom-text">
					<?php  echo $aboutcontext; ?>
				</div>
			</div>
			<!--column 2-->
			<div class="col-md-6 col-lg-2 col-sm-12">
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
			<div class="col-md-6 col-lg-2 col-sm-12">
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
			<div class="col-md-6 col-lg-2 col-sm-12">
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
			<div class="col-md-6 col-lg-3 col-sm-12">
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
	</main>
</div>

<?php get_footer(); ?>