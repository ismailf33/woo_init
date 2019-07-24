<?php
add_action('after_setup_theme' , 'wp_car_action');
function wp_car_action(){
add_theme_support('title-tag');
add_theme_support('post-formats',array('video','audio','aside','gallery'));
add_theme_support('post-thumbnails', array('post' , 'page'));
set_post_thumbnail_size( 300, 200, true);
add_image_size( 'myFeatureImage',1300, 700, true);
}

function wp_woo_enqueue(){
    wp_enqueue_style('font-awesome' , get_template_directory_uri().'/assets/css/font-awesome.css');
    wp_enqueue_style('bootstrap' , get_template_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_style('main' , get_template_directory_uri().'/assets/css/main.css');
    wp_enqueue_style('blue' , get_template_directory_uri().'/assets/css/blue.css ');
    wp_enqueue_style('carousel' , get_template_directory_uri().'/assets/css/owl.carousel.css');
    wp_enqueue_style('transitions' , get_template_directory_uri().'/assets/css/owl.transitions.css');
    wp_enqueue_style('animate' , get_template_directory_uri().'/assets/css/animate.min.css');
    wp_enqueue_style('rateit' , get_template_directory_uri().'/assets/css/rateit.css');
    wp_enqueue_style('bootstrap-select' , get_template_directory_uri().'/assets/css/bootstrap-select.min.css');
    wp_enqueue_style('font-roboto' , '//fonts.googleapis.com/css?family=Roboto:300,400,500,700');
    wp_enqueue_style('font-open-sans' , '//fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800');
    wp_enqueue_style('font-Montserrat' , '//fonts.googleapis.com/css?family=Montserrat:400,700');
   
    wp_enqueue_style('core' , get_stylesheet_uri() );

    wp_enqueue_script('jquery' , get_theme_file_uri().'/assets/js/jquery-1.11.1.min.js' , array( ) , 2.0,true);
    wp_enqueue_script('bootstrap' , get_template_directory_uri().'/assets/js/bootstrap.min.js' , array('jquery') , 2.0,true);
    wp_enqueue_script('bootstrap-hover-dropdown' , get_template_directory_uri().'/assets/js/bootstrap-hover-dropdown.min.js' , array('jquery') , 2.0,true);
    wp_enqueue_script('carousel' , get_template_directory_uri().'/assets/js/owl.carousel.min.js' , array('jquery') , 2.0,true);
    wp_enqueue_script('echo' , get_template_directory_uri().'/assets/js/echo.min.js' , array('jquery') , 2.0,true);
    wp_enqueue_script('jquery-easing' , get_template_directory_uri().'/assets/js/jquery.easing-1.3.min.js' , array('jquery') , 2.0,true);
    wp_enqueue_script('bootstrap-slider' , get_template_directory_uri().'/assets/js/bootstrap-slider.min.js' , array('jquery') , 2.0,true);
    wp_enqueue_script('rateit' , get_template_directory_uri().'/assets/js/jquery.rateit.min.js' , array('jquery') , 2.0,true);
    wp_enqueue_script('bootstrap-select' , get_template_directory_uri().'/assets/js/bootstrap-select.min.js' , array('jquery') , 2.0,true);
    wp_enqueue_script('wow' , get_template_directory_uri().'/assets/js/wow.min.js' , array('jquery') , 2.0,true);
    wp_enqueue_script('scripts' , get_template_directory_uri().'/assets/js/scripts.js' , array('jquery') , 2.0,true);
    wp_enqueue_script('lightbox' , get_template_directory_uri().'/assets/js/lightbox.min.js' , array('jquery') , 2.0,true);
    }
add_action('wp_enqueue_scripts' , 'wp_woo_enqueue');

//Register Menu

function ecomMenu(){
if(function_exists('register_nav_menu')){
register_nav_menu('main_menu' , __('Main menu' , 'ecom'));
register_nav_menu('top_menu' , __('Top menu' , 'ecom'));
    }
}
add_action('init', 'ecomMenu');

function ceom_woocommerce_support(){
add_theme_support('woocommerce');
}
add_action('after_setup_theme' , 'ceom_woocommerce_support');

if ( ! function_exists( 'woocommerce_get_sidebar' ) ) { 
 
    /** 
     * Get the shop sidebar template. 
     * 
     */ 
    function woocommerce_get_sidebar() { 
        wc_get_template( 'template-part/sidebar/sidebar.php' ); 
    } 
  } 

function woocommerce_get_banner() {
    wc_get_template( 'template-part/content/banner.php' );   
  }
add_filter('woocommerce_banner' ,'woocommerce_get_banner');

if(!is_home()){
  //remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 ,0);
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ,0);
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 ,0);
  }