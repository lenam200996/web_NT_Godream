<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */

?>
<div class="row row-redir">
	<span><a id="home-url" href="<?php echo get_home_url(); ?>">Trang chủ</a>  <?php echo $product->get_categories(); ?> <a id="product-url"><?php echo  $product->get_slug(); ?></a></span>
</div>
<div class="row">
	<div class="col-md-12 col-xs-5 col-lg-5 col-sm-12 img-view-product">
		<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($loop->post->ID),'single-post-thumbnail'); ?>
		<div class="img-show-product-swrap">
			<img  src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" id="img-show-product">
		</div>
		<div id="sld-product"  class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php 
					$att_ids = $product->get_gallery_attachment_ids(); 
					$i = 0;
					$active = "active";
					foreach ($att_ids as $att_id) {
						$i++;
						$img_link = wp_get_attachment_url($att_id);
						if($i==1){
							echo '<div class="carousel-item '.$active.'"> ';
						}
							echo '<img class="img-btn-carousel-product" src="'.$img_link.'" style="max-width:85px;" >';
						if($i==3){
							echo "</div>";
							$i = 0;
						}
						$active = "";
					}
					if($i<3 && $i>0){
						echo "</div>"; $i=0;
					}
				?>
			</div>
			<!-- <a class="left item-control" href="#sld-product" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="right item-control" href="#sld-product" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a> -->
		</div>
	</div>
	<div class="col-md-12 col-xs-7 col-lg-7 col-sm-12 details-view-product">
		<p class="title-product"><?php the_title(); ?></p>
		<p>Loại sản phẩm: <?php echo $product->get_categories(); ?></p>
		<p>Trạng thái: <span class="stock-status-product"><?php $stock = $product->get_stock_status();
			if($stock == "instock") echo "<i class='fas fa-check'></i>Còn hàng";
			elseif($stock == "outofstock") echo "<i class='fas fa-times'></i>Hết hàng";
			elseif($stock == "onbackorder") echo "<i class='fas fa-exclamation-circle'></i>Chờ hàng";
		?></span></p>
		<p class="price-product"><?php echo wc_price( wc_get_price_including_tax( $product ) ); ?></p>
		<div class="row-quatity-product">
			<form method="post" accept-charset="utf-8">
				<div class="quantity-title">
					<label>Số lượng: </label>
				</div>
				<div class="form-add-to-cart">
					<label class="change-quantity-product" id="subqua">-</label>
					<input id="input-quantity" type="text" name="quantity" value="1"/>
					<label id="plusqua" class="change-quantity-product">+</label>
					<button id="btn-add-to-cart" type="submit" name="add-to-cart" value="<?php echo get_the_id(); ?>" class="btn btn-primary cart">
						<i class="fa fa-shopping-cart"></i>
						Thêm giỏ hàng
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="row row-tab-details-product">
	<!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item  details-tab">
      <a class="nav-link active details-tab" data-toggle="tab" href="#details-product">Mô tả</a>
    </li>
    <li class="nav-item  details-tab">
      <a class="nav-link details-tab" data-toggle="tab" href="#about-product">Giới thiệu</a>
    </li>
   
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="details-product" class="container tab-pane active"><br>
      <p><?php echo $product->get_short_description(); ?></p>
    </div>
    <div id="about-product" class="container tab-pane fade"><br>
     <p><?php echo $product->get_description(); ?></p>
    </div>
   
  </div>
</div>
