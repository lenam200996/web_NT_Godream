<?php
/*
	Template Name: landing page
*/
 get_header();
?>
<div class="content">
	<main id="main-content"> 
		<div class="row container-head">
			<div class="container swrap-contain-head">
				<div class="title-contain-head wow fadeInDown">
					<?php $id = get_the_ID(); ?>
					<span><?php $page_title = get_field('page_title',$id); echo $page_title; ?></span>
				</div>
				<div class="sub-title-contain-head wow fadeInLeft">
					<span><?php the_field('introduce',$id); ?> </span>
				</div>
				<div class="button-contain-head">
					<?php 
						if(get_field('about_page',$id)){ 
						$i = 1;
                        while(have_rows('about_page',$id)):the_row();
                         	$title = get_sub_field('title');
                         	$link = get_sub_field('link');
					?>
					<?php if($i == 1){?>
						<a  href="<?php echo $link; ?>" ><button class="btn-no-background wow slideInLeft">
						<?php echo $title; ?></button>
						</a>
					<?php }else{?>
						<a href="<?php echo $link; ?>"  ><button class="btn-background wow slideInRight">
						<?php echo $title; ?></button>
						</a>
					<?php } ?>	
					<?php 
                 		$i++;
					endwhile;} ?>
				</div>
			</div>
		</div>
		<!--ss service-->
		<section id="ss_service" class="service wow zoomIn">
			<div class="container service-div">
				
				<div class="row ">
					<span class="title">Dịch vụ</span>
				</div>
				<div class="row">
		           <?php 
		                $args = array(
		                   'post_type' =>'dichvu',
		                   'posts_per_page' =>3,
		                );
		                $the_query = new WP_Query( $args );
						// The Loop
						if ( $the_query->have_posts() ) {
						    while ( $the_query->have_posts() ) {
						        $the_query->the_post();
					?>
					<?php get_template_part('content_dichvu',get_post_format());?>
					<?php }
						}else{
							get_template_part('content','none');
					}?>
				</div>
			</div>
		</section>
		<!--end ss service-->
		<!--ss about-->
		<?php $id_page = get_query_var('page_id'); ?>
		<section id="ss_about" class="row session-about-us">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-6 col-sm-12 col-img-ss-about wow slideInLeft">
						<?php $image = get_field('image',$id_page);?>
						<img src="<?php echo $image; ?>" alt="" width="100%">
					</div>
					<div class="col-md-12 col-lg-6 col-sm-12 text-about-us wow slideInRight">
						<div class="row text-about">
							<span class="title title-about">Giới thiệu</span>
						</div>
						<div class="row content-about">
							<?php $introduce = get_field('gioi_thieu',$id_page);?>
							<?php echo $introduce; ?>
						<?php $link_read_more_about = get_field('link_readmore_about',$id_page);?>
						<span class="read-more-text"><a href="<?php echo $link_read_more_about; ?>">Đọc thêm &rarr;</a></span>
						</div>
					</div>
				</div>
				<div class="row row-t">
					<?php if(get_field('sub_about',$id_page)){?>
					<?php  while(have_rows('sub_about',$id_page)):the_row(); 
								$icon_sub_about = get_sub_field('icon_sub_about');
								$title_sub_about = get_sub_field('title_sub_about');
								$context_sub_about = get_sub_field('context_sub_about');
					?>
						<div class="col-md-6 col-lg-4 col-sm-12 item-about-footer wow flipInX">
							<div class="row">
								<div class="col-md-3 col-sm-12">
									<img src="<?php echo $icon_sub_about; ?>" class="icon-about-us-employer">
								</div>
								<div class="col-md-9 col-sm-12 context-about-footer">
									<div class="row title-about-us-footer"><?php echo $title_sub_about; ?></div>
									<div class="row content-about-us-footer">
										<?php echo $context_sub_about; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile;} ?>
				</div>
			</div>
		</section>
		<!--end ss about-->
		<!--ss project-->
		<section id="ss_project" class="row project-list-session">
			<div class="container">
				
				<div class="row ">
					<span class="title title-white">Dự án nổi bật</span>
				</div>
				<div class="row">
					<?php 
		                $args = array(
		                   'post_type' =>'duan',
		                   'posts_per_page' =>6,
		                );
		                $the_query = new WP_Query( $args );
						// The Loop
						if ( $the_query->have_posts() ) {
						    while ( $the_query->have_posts() ) {
						        $the_query->the_post();?>
					<?php get_template_part('content_duan',get_post_format());?>
					<?php }}else{
							get_template_part('content','none');
					}?>
				</div>
				<!-- <div class="row">
					<div class="button-contain-head">
						<button class="btn-white-background">
							tất cả các Dự án
						</button>
					</div>
				</div> -->
			</div>
		</section>
		<!--end project-->
		<!--ss product-->
		<section id="ss_product" class="row session-product-list">
			<div class="container">
				<div class="row">
					<span class="rectangle"></span>
				</div>
				<div class="row">
					<span class="title">Sản phẩm nổi bật</span>
				</div>
				<div class="row category-list-tab wow bounceInLeft">
					<div class="list-btn-category">
						<ul class="nav nav-tabs" role="tablist">
						    <li class="nav-item">
						      <a class="nav-link active" data-toggle="tab" href="#hometab">Tất cả</a>
						    </li>
						    <?php
						    $arrayCategoryID = array();
			                $category = get_terms('sanpham_category');//custom category name 
							foreach ($category as $catVal) {?>
							    <li class="nav-item">
							   		<a class="nav-link" data-toggle="tab" href="#menu<?php echo $catVal->term_id;?>">
										<?php echo $catVal->name;?>
									</a>
								</li>
		 					<?php 
		 					$arrayCategoryID[] =  $catVal->term_id;
		 					}?>
						 </ul>
					</div>
				</div>
					<div class="tab-content  wow fadeIn">
					    <div id="hometab" class="container tab-pane active"><br>
					    	<?php 
				    			$args = array(
				                   'post_type' =>'sanpham',
				                   'posts_per_page' =>8,
				                );
					    	?>
					    	<div class="row">
					    		<!--item -->
						    	<?php $the_query = new WP_Query( $args );
								// The Loop
								if ( $the_query->have_posts() ) {
								    while ( $the_query->have_posts() ) {
								        $the_query->the_post();?>
									<?php get_template_part('content_sanpham',get_post_format());?>
								<?php }}else{
									get_template_part('content','none');
								}?>
							    <!--end item-->
						    </div>
					    </div>
					    <?php foreach ($arrayCategoryID as  $value) {?>
				    	 <div id="menu<?php echo $value; ?>" class="container tab-pane fade"><br>
				    	 	<div class="row">
				    	 		<?php 
									$args = array(
									'post_type'		=>'sanpham',
				                   	'posts_per_page' =>8,
				                   'tax_query'  	=> array(
								    	array(
								        'taxonomy'		=> 'sanpham_category',
								        'field' 		=> 'term_id',
									    'terms'         => $value,
									    'operator'      => 'IN' 
								   	)
									)
				                );
								$the_query = new WP_Query( $args );
									// The Loop
								if ( $the_query->have_posts() ) {
								    while ( $the_query->have_posts() ) {
								        $the_query->the_post();?>
									<?php get_template_part('content_sanpham',get_post_format());?>
								<?php }
								}else{
									get_template_part('content','none');
								}
				    	 		 ?>
						    </div>
					    </div>
					    <?php }?>
				<!-- <div class="row">
					<div class="button-contain-head">
						<button class="btn-background">
							Tất cả sản phẩm
						</button>
					</div>
				</div> -->
			</div>
		</section>
		<!--end produc-->
		<!--feelback---->
		<section id="ss_feedback" class="row session-slide-feelback wow zoomIn">
			<div class="container">
				<div class="row">
					<span class="title title-white title-feedback">Ý kiến đánh giá khách hàng</span>
				</div>
				<div class="row">
					<span class="icon-feelback">
						<img src="<?php echo get_template_directory_uri();?>/assets/icon-feedback.png" alt="" width="31" height="24">
					</span>
				</div>
				<div class="row">
					<!--slick-->
					<div class="column small-11 small-centered">
						<div class="slider slider-single slider-for">
							<!--item feedback-->
							<?php 
				    			$args = array(
				                   'post_type' =>'phanhoi',
				                   'posts_per_page' =>4,
				                );
					    	?>
					    	<?php $the_query = new WP_Query( $args );
								// The Loop
								if ( $the_query->have_posts() ) {
								    while ( $the_query->have_posts() ) {
								        $the_query->the_post();?>
									<?php get_template_part('content_feedback',get_post_format());?>
								<?php }}else{
									get_template_part('content','none');
								}?>
							<!--end item feedback-->
							
						</div>
						<div class="slider slider-nav">
							<!--item user feedback-->
							<?php 
				    			$args = array(
				                   'post_type' =>'phanhoi',
				                   'posts_per_page' =>4,
				                );
					    	?>
					    	<?php $the_query = new WP_Query( $args );
								// The Loop
								if ( $the_query->have_posts() ) {
								    while ( $the_query->have_posts() ) {
								        $the_query->the_post();?>
									<?php get_template_part('content_user_feedback',get_post_format());?>
								<?php }}else{
									get_template_part('content','none');
								}?>
							<!--end item user feedback-->
						</div>
					</div>
					<!--end slick-->
				</div>
			</div>
		</section>
		<!--end feelback-->

		<!--ss news-->
		<section id="ss_news" class="row session-news">
			<div class="container">
				<div class="row">
					<span class="title">TIn tức - bài viết</span>
				</div>
				<div class="row item-news">
					<?php 
						$args = array(
					                   'post_type' 		=>'post',
					                   'posts_per_page' =>3,
					                );
						$the_query = new WP_Query( $args );
							// The Loop
						if ( $the_query->have_posts() ) {
						    while ( $the_query->have_posts() ) {
						        $the_query->the_post();?>
						<?php get_template_part('content_news',get_post_format());?>
						<?php }
						}else{
							get_template_part('content','none');
						}
					?>
				</div>
				<!-- <div class="row row-buttom-news">
					<div class="button-contain-head">
						<button class="btn-background">
							tất cả các Dự án
						</button>
					</div>
				</div> -->
			</div>
		</section>
		<!--end news-->

		<!--bottom-->
		<?php 
			$logobottom = get_field('logo_bottom',$id_page);
			$aboutcontext = get_field('gioi_thieu_ngan',$id_page);
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
					<div class="col-md-6 col-lg-4 col-sm-6 col-xl-2">
						<div class="bottom-title">
							Chính sách
						</div>
						<div class="bottom-text">
							<?php if(get_field('chinh_sach',$id_page)){
								while(have_rows('chinh_sach',$id_page)):the_row();
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
							<?php if(get_field('ho_tro',$id_page)){
								while(have_rows('ho_tro',$id_page)):the_row();
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
	</main>
</div>
<?php get_footer();?>