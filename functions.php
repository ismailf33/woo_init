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
    wp_enqueue_style('woocommerce' , get_template_directory_uri().'/assets/css/woocommerce.css');
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
/**
 * Showing post per row
 *  
*/
if(!function_exists('loop_columns_3')){
  function loop_columns_3(){
      return 3;
    }
  }
  add_filter('loop_shop_columns','loop_columns_3');
/**
 * Remove bradcams
 *  
*/
function woo_remove_breadcramb(){
  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 ,0);
}
add_action('init' , 'woo_remove_breadcramb');

/**
 * Change all things bradcams
 *  
*/
function ecom_woocommerce_breadcum(){
return array(
  'delimiter' => '&#47',
  'wrap_before' => '<div class="breadcrumb-inner"><ul class="list-inline list-unstyled">', 
  'wrap_after' => '</ul></div>',
  'before' => ' ', 
  'after' => ' ', 
  'home' => _x( 'Home', 'breadcrumb', 'woocommerce')
);
}
add_filter('woocommerce_breadcrumb_defaults'  , 'ecom_woocommerce_breadcum');

/**
 * Remove result_counter
 *  
*/
function woo_remove_result_counter(){
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ,0);
}
add_action('init' , 'woo_remove_result_counter');

/**
 * Remove result_counter
 *  
*/
function woo_remove_catelog(){
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 ,0);
}
add_action('init' , 'woo_remove_catelog');
/**
 * Remove pagination
 *  
*/
function woo_remove_pagination(){
  remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 ,0);
}
add_action('init' , 'woo_remove_pagination');

/**
 * Custom pagination
 *  
*/

function ecom_pagination() {
  global $wp_query;

  if ($wp_query->max_num_pages <= 1 ) return;
  $big = 999999999; // need to unlikely integer
  $pages = paginate_links( array (
  'base' => str_replace($big, '%#%', esc_url( get_pagenum_Link($big ))), 
  'format' => '?paged=%#%', 
  'current' => max( 1, get_query_var('paged') ), 
  'total' => $wp_query->max_num_pages, 
  'type' => 'array', 
  'prev_next' => true, 
  'prev_text' => ('<i class="fa fa-angle-left" aria-hidden="true"></i>'),
  'next_text' => _('<i class="fa fa-angle-right" aria-hidden="true"></i>'), 
));
  if( is_array($pages ) ) {
  $paged = ( get_query_var('paged') == 0 )? 1 : get_query_var('paged'); 
  echo '<div class="pagination-container"><ul class="list-inline list-unstyled">'; 
  foreach ($pages as $page ) {
  echo "<li>$page</li>";
  }
  echo '</ul></div>';
  }
}
/**
 * Custom Catelog
 *  
*/
function ecom_woocommerce_catalog_page_ordering() {
  ?>
  <?php echo '<div class="lbl-cnt"> <span class="lbl">Show' ?>
      <form action="" method="POST" name="results" class="woocommerce-ordering">
      <select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="sortby" onchange="this.form.submit()">
  <?php
   
  //Get products on page reload
  if  (isset($_POST['woocommerce-sort-by-columns']) && (($_COOKIE['shop_pageResults'] <> $_POST['woocommerce-sort-by-columns']))) {
          $numberOfProductsPerPage = $_POST['woocommerce-sort-by-columns'];
            } else {
          $numberOfProductsPerPage = $_COOKIE['shop_pageResults'];
            }
   
  //  This is where you can change the amounts per page that the user will use  feel free to change the numbers and text as you want, in my case we had 4 products per row so I chose to have multiples of four for the user to select.
        $shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
        //Add as many of these as you like, -1 shows all products per page
          //  ''       => __('Results per page', 'woocommerce'),
          '20' 		=> __('20', 'woocommerce'),
          '-1' 		=> __('All', 'woocommerce'),
        ));
  
      foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
        echo '<option value="' . $sort_id . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . $sort_name . '</option>';
  ?>
  </select>
  </form>
  
  <?php echo ' </span></div>' ?>
  <?php
  }
   
  // now we set our cookie if we need to
  function dl_sort_by_page($count) {
    if (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
       $count = $_COOKIE['shop_pageResults'];
    }
    if (isset($_POST['woocommerce-sort-by-columns'])) { //if form submitted
      setcookie('shop_pageResults', $_POST['woocommerce-sort-by-columns'], time()+1209600, '/', 'www.your-domain-goes-here.com', false); //this will fail if any part of page has been output- hope this works!
      $count = $_POST['woocommerce-sort-by-columns'];
    }
    // else normal page load and no cookie
    return $count;
  }
   
  add_filter('loop_shop_per_page','dl_sort_by_page');
  
  
  /**
   * woocommerce cutom ordering
   */
  function ecom_custom_woocommerce_catalog_orderby( $sortby ) {
    $sortby['random_list'] = 'position';
    $sortby['price-desc'] = 'Price:Lowest first';
    $sortby['price'] = 'Price:HIghest first';
    $sortby['menu_order'] = 'Product Name:A to Z';
    unset($sortby['popularity']);
    unset($sortby['rating']);
    unset($sortby['date']);
    return $sortby;
  }
  add_filter( 'woocommerce_catalog_orderby', 'ecom_custom_woocommerce_catalog_orderby' );