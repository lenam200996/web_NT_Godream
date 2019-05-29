<?php
/*
* Khai bao hang gia tri
 @ THEME_URL  duong dan thu muc theme
 @ CORE lay duong dan thu muc core
*/

 define('THEME_URL',get_stylesheet_directory());
 define('CORE', THEME_URL."/core");

 /**
 @ nhung file init.php
 */
 require_once(CORE."/init.php");

 /*
	@ thiet lap chieu rong noi dung
 */

if ( !isset($content_width)) {
	# set gia tri
	$content_width = 620;
}

/* nhung file style.css*/
function smart_house_add_style(){
	wp_register_style('main-style',get_template_directory_uri()."/style.css",'all');
	wp_enqueue_style('main-style');
}


add_action('wp_enqueue_scripts','smart_house_add_style');


/*
* Cac chuc nang cua theme 
*/

if (!function_exists('mytheme_setup')) {
	function mytheme_setup(){
		/*thiet lap textdomain*/
		$languages_folder = THEME_URL.'/languages';
		load_theme_textdomain('mytheme',$languages_folder);
		/*tu dong them link len <head>*/
		add_theme_support('automatic-feed-links');
		/*them post thumbnail*/
		add_theme_support('post-thumbnails');
		/* post format*/
		add_theme_support('post-formats',array(
		'image','video','gallery','quote','link'
		));
		/*them title-tag*/
		add_theme_support('title-tag');
		/*custom logo*/
		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 160,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
		/* custom background*/
		$default_background = array('default-color'=> '#ffffff');
		add_theme_support('custom-background',$default_background);
		/*them vi tri hien thi menu*/
		register_nav_menu('primary-menu',__('Primary Menu','mytheme'));
		/*tao sidebar*/
		$sidebar = array(
			'name'=>__('Main sidebar','mytheme'),
			'id' =>'main-sidebar',
			'description'=>__('Main sidebar des..'),
			'class'=>'main-sidebar',
			'before_title'=> '<h3 class="widgettitle">',
			'after_title'=>'</h3>'
		);
		register_sidebar($sidebar);
	}
	add_action('init','mytheme_setup');
}

/*TEMPLATE FUCNTIONS*/

/*THIET LAP MENU*/

if (!function_exists("mytheme_menu")) {
	function mytheme_menu($menu){
		$menu = array(
			'theme_location'=> $menu,
			'container'=>'div',
			'container_class'=>"collapse navbar-collapse",
			'container_id'=>"collapsibleNavbar"
		);
		wp_nav_menu($menu);
	}
}

/*THIET LAP MENU REPONSIVE*/

if (!function_exists("mytheme_menu_res")) {
	function mytheme_menu_res($menu){
		$menu = array(
			'theme_location'=> $menu,
			'container'=>'div',
			'container_class'=>"content-menu-responsive",
		);
		wp_nav_menu($menu);
	}
}
/*ham tao phan trang*/
if (!function_exists('mytheme_phantrang')) {
	function mytheme_phantrang(){
		if($GLOBALS['wp_query']->max_num_pages < 2){
			return '';
		} ?>
		<nav class="pagination" role="navigation">
			<?php if(get_next_posts_link()) : ?>
				<div class="prev">
					<?php next_posts_link(__('older posts','mytheme'));?>
				</div>
			<?php endif; ?>
			<?php if(get_previous_posts_link()): ?>
				<div class="next">
					<?php previous_posts_link(__('newest post','mytheme'));?>
				</div>
			<?php endif;?>
		</nav>
	<?php }
	}

/*Ham Hien thi thumbnail*/

/*ham hien thi title, meta*/
if(!function_exists('mytheme_entry_header')){
	function mytheme_entry_header(){?>
		<?php if(!is_home()): ?>
			<h1 class="entry-title"><a  href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h1>
		<?php else:?>
			<h2 class="entry-title"><a  href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
		<?php endif;?>
	<?php }
}

if(!function_exists('mytheme_entry_meta')){
	function mytheme_entry_meta(){?>
		<?php if(!is_page()) :?>
			<div class="entry-meta">
				<?php printf(__('<span class="author">Posted by %1$s</span>','mytheme'),get_the_author() ); ?>
				<?php printf(__('<span class="date-published">at %1$s</span>','mytheme'),get_the_date() ); ?>
				
				<?php printf(__('<span class="category">in %1$s</span>','mytheme'),get_the_category_list() ); ?>
			</div>
		<?php endif;?>
	<?php }
}

if(!function_exists('mytheme_entry_content')){
	function mytheme_entry_content(){?>
		<?php if(!is_single())
			{ 
				the_excerpt(); 
			} else 
			{ 
				the_content(); 
			}
			/*phan trang trong single*/
			$link_pages = array(
				'before'=>__('<p>Page: ','mytheme'),
				'after'=>'</p>',
				'nextpagelink'=>__('next page','mytheme'),
				'previouspagelink'=>__('previous page','mytheme')
			);
			wp_link_pages($link_pages);
		?>

	<?php }
}

function mytheme_read_more(){
	return '<a class="read-more" href="'.get_permalink(get_the_ID()).'">'.__('[Read more...]','mytheme').'</a>';
}

add_filter('excerpt_more','mytheme_read_more');

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }else{
			$title = post_type_archive_title( '', false );
        }

    return $title;

});
add_theme_support( 'woocommerce' );

function override_page_title() {
return false;
}
add_filter('woocommerce_show_page_title', 'override_page_title');