<?php $id = get_the_ID(); ?>
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