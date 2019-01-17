<?php
// Additions by Stefan 4/1/19
// disable Gutenberg for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);



// Additions by Strahinja 10/10/17

add_theme_support( 'post-thumbnails' ); 


/*update_option( 'siteurl', 'http://mediavuk.com' );
update_option( 'home', 'http://mediavuk.com' );*/

include __DIR__ . "/inc/offer_func.php";

// Enqueue scripts and styles

function my_custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
    echo '<script src="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-script.js"></script>';
}

add_action('login_head', 'my_custom_login');

// Remove info from header
remove_action( 'wp_head', 'rsd_link' ) ;
remove_action( 'wp_head', 'wp_generator' ) ;
remove_action( 'wp_head', 'wlwmanifest_link' ) ;


function mediavuk_scripts() {


    //added by strahinja 20/04/17
     wp_enqueue_script('responsiveslider', get_template_directory_uri() . '/js/responsiveslides.min.js', array(), '', true);
     wp_enqueue_script('accordion-mediavuk', get_template_directory_uri() . '/js/mediavuk-accordion.js', array(), '', true);
     wp_enqueue_style( 'mediavuk-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
     wp_enqueue_style('unslider', get_template_directory_uri() . '/css/unslider.css');
     wp_deregister_script('jQuery');
     wp_enqueue_script('unslider', get_template_directory_uri() . '/js/unslider-min.js', array(), '', true);
     wp_enqueue_script('hamburgers', get_template_directory_uri() . '/js/hamburgers.js', array(), '', true);

    // wp_enqueue_script('mediavuk-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'mediavuk_scripts');

// 2017.03 Remove emoji adn wp-embed

function crunchify_stop_loading_wp_embed() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
    }
}
add_action('init', 'crunchify_stop_loading_wp_embed');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


// Register Menus
register_nav_menus(array(
    'mainMenu' => 'Main Navigation',
    'footer-menu'     => 'Footer Navigation',
    'newMenu' => 'New Navigation',
));

if ( !function_exists('trim_title')) {
    function trim_title($title, $length) {
        if (strlen($title) > $length) {

            $pos = strpos($title, ' ');
            $r = substr($title, 0, $length);
            if ($pos === true ) {
                $r = substr($r, 0, strripos($r, ' '));
            }

            $r .= '...';

        }

        else {

            $r = $title;

        }
        return $r;
    }
}

if ( ! function_exists('dd')) {
    function dd() {
        echo '<pre>';
        $vars = func_get_args();
        call_user_func_array('var_dump', $vars);
        echo '</pre>';
        die;
    }
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ));
}

function my_admin_menu() {
    add_menu_page('Contact Data', 'All Contact Data', 'manage_options', 'example.php', 'myplguin_admin_page', 'dashicons-tickets', 60);
}

add_action('admin_menu', 'my_admin_menu');

function myplguin_admin_page() {
    $args = array(
        'post_type'      => 'contactbaba',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()):
        echo '<span style="margin-top:30px; display:block;margin-bottom:20px;">';
        echo '<ul class="contactList">';
        while ($query->have_posts()): $query->the_post();
            $content = get_the_content();
            echo '<li>';
            echo $content;
            echo '</li>';
        endwhile;
        echo '</ul>';
        echo '</span>';
    endif;
    wp_reset_query();
}

function wpse28782_remove_menu_items() {
    remove_menu_page('edit.php?post_type=contactbaba');
}

add_action('admin_menu', 'wpse28782_remove_menu_items');

function add_svg_to_upload_mimes( $upload_mimes ) { 
    $upload_mimes['svg'] = 'image/svg+xml'; 
    $upload_mimes['svgz'] = 'image/svg+xml'; 
    return $upload_mimes; 
} 
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );


function removeProtectedFromTitle($title){
    return str_replace("Protected: ", "", $title);
}
add_filter('protected_title_format', 'removeProtectedFromTitle');

if ( ! function_exists('mediavuk_setup')) :
    function mediavuk_setup() {
        load_theme_textdomain('mediavuk', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        add_theme_support('custom-background', apply_filters('mediavuk_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }
endif;

add_action('after_setup_theme', 'mediavuk_setup');

function mediavuk_content_width() {
    $GLOBALS['content_width'] = apply_filters('mediavuk_content_width', 640);
}

add_action('after_setup_theme', 'mediavuk_content_width', 0);

function mediavuk_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'mediavuk'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'mediavuk'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}

add_action('widgets_init', 'mediavuk_widgets_init');

// Create custom posts
function my_custom_post_jobs() {
    $labels = array(
        'name'               => _x('Job Offers', 'post type general name'),
        'singular_name'      => _x('Job Offer', 'post type singular name'),
        'add_new'            => _x('Add New Job Offer', 'ansprechpartner'),
        'add_new_item'       => __('Add New Job Offer'),
        'edit_item'          => __('Edit Job Offer'),
        'new_item'           => __('New Job Offer'),
        'all_items'          => __('All Job Offers'),
        'view_item'          => __('View Job Offer'),
        'search_items'       => __('Search Job Offers'),
        'not_found'          => __('No Job Offers found'),
        'not_found_in_trash' => __('No Job Offers found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Job Offers'
    );
    $args = array(
        'labels'          => $labels,
        'description'     => 'Holds Job Offers',
        'public'          => true,
        'menu_position'   => 5,
        'capability_type' => 'page',
        'hierarchical'    => true,
        'menu_position'   => 4,
        'rewrite'         => true,
        'supports'        => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'has_archive'     => true,
        'menu_icon'       => 'dashicons-thumbs-up'

    );
    register_post_type('job', $args);
}

add_action('init', 'my_custom_post_jobs');
function contact_form_data() {
    $labels = array(
        'name'               => _x('Contact form data', 'post type general name'),
        'singular_name'      => _x('Contact form data', 'post type singular name'),
        'add_new'            => _x('Add New Contact form data', 'ansprechpartner'),
        'add_new_item'       => __('Add New Contact form data'),
        'edit_item'          => __('Edit Contact form data'),
        'new_item'           => __('New Contact form data'),
        'all_items'          => __('All Contact form data'),
        'view_item'          => __('View Contact form data'),
        'search_items'       => __('Search Contact form data'),
        'not_found'          => __('No Contact form data found'),
        'not_found_in_trash' => __('No Contact form data found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Contact form data'
    );
    $args = array(
        'labels'          => $labels,
        'description'     => 'Contact form data',
        'public'          => true,
        'menu_position'   => 5,
        'capability_type' => 'page',
        'hierarchical'    => true,
        'menu_position'   => 4,
        'rewrite'         => true,
        'supports'        => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'has_archive'     => true,
        'menu_icon'       => 'dashicons-thumbs-up'

    );
    register_post_type('contactbaba', $args);
}

add_action('init', 'contact_form_data');

//  REVISION 06.01.2017

//function my_custom_post_branding() {
//    $labels = array(
//        'name'               => _x('Brandings project', 'post type general name'),
//        'singular_name'      => _x('Branding project', 'post type singular name'),
//        'add_new'            => _x('Add New Branding project', 'ansprechpartner'),
//        'add_new_item'       => __('Add New Branding Project'),
//        'edit_item'          => __('Edit Branding Project'),
//        'new_item'           => __('New Branding Project'),
//        'all_items'          => __('All Branding Projects'),
//        'view_item'          => __('View Branding Project'),
//        'search_items'       => __('Search Branding Projects'),
//        'not_found'          => __('No Branding Projects found'),
//        'not_found_in_trash' => __('No Branding Projects found in the Trash'),
//        'parent_item_colon'  => '',
//        'menu_name'          => '|| Branding'
//    );
//    $args = array(
//        'labels'          => $labels,
//        'description'     => 'Holds Branding projects',
//        'public'          => true,
//        'menu_position'   => 5,
//        'capability_type' => 'page',
//        'hierarchical'    => true,
//        'menu_position'   => 4,
//        'rewrite'         => true,
//        'supports'        => array('title', 'editor', 'thumbnail', 'page-attributes'),
//        'has_archive'     => true,
//        'menu_icon'       => 'dashicons-thumbs-up'
//
//    );
//    register_post_type('branding', $args);
//}
//
//add_action('init', 'my_custom_post_branding');
//
//function my_custom_post_print_design() {
//    $labels = array(
//        'name'               => _x('Print Design', 'post type general name'),
//        'singular_name'      => _x('Print Design', 'post type singular name'),
//        'add_new'            => _x('Add New Print Design', 'ansprechpartner'),
//        'add_new_item'       => __('Add New Print Design'),
//        'edit_item'          => __('Edit Print Design'),
//        'new_item'           => __('New Print Design'),
//        'all_items'          => __('All Print Designs'),
//        'view_item'          => __('View Print Design'),
//        'search_items'       => __('Search Print Designs'),
//        'not_found'          => __('No Print Designs found'),
//        'not_found_in_trash' => __('No Print Designs found in the Trash'),
//        'parent_item_colon'  => '',
//        'menu_name'          => '|| Print Design'
//    );
//    $args = array(
//        'labels'          => $labels,
//        'description'     => 'Holds Print Designs',
//        'public'          => true,
//        'menu_position'   => 5,
//        'capability_type' => 'page',
//        'hierarchical'    => true,
//        'menu_position'   => 4,
//        'rewrite'         => true,
//        'supports'        => array('title', 'editor', 'thumbnail', 'page-attributes'),
//        'has_archive'     => true,
//        'menu_icon'       => 'dashicons-art'
//    );
//    register_post_type('print_design', $args);
//}
//
//add_action('init', 'my_custom_post_print_design');
//
//function my_custom_post_gui() {
//    $labels = array(
//        'name'               => _x('GUI', 'post type general name'),
//        'singular_name'      => _x('GUI', 'post type singular name'),
//        'add_new'            => _x('Add GUI Project', 'ansprechpartner'),
//        'add_new_item'       => __('Add New GUI Project'),
//        'edit_item'          => __('Edit GUI Project'),
//        'new_item'           => __('New GUI Project'),
//        'all_items'          => __('All GUI Projects'),
//        'view_item'          => __('View GUI Project'),
//        'search_items'       => __('Search GUI Projects'),
//        'not_found'          => __('No PGUI Projects found'),
//        'not_found_in_trash' => __('No GUI Projects found in the Trash'),
//        'parent_item_colon'  => '',
//        'menu_name'          => '|| GUI'
//    );
//    $args = array(
//        'labels'          => $labels,
//        'description'     => 'Holds GUI Projects',
//        'public'          => true,
//        'menu_position'   => 5,
//        'capability_type' => 'page',
//        'hierarchical'    => true,
//        'menu_position'   => 4,
//        'rewrite'         => true,
//        'supports'        => array('title', 'editor', 'thumbnail', 'page-attributes'),
//        'has_archive'     => true,
//        'menu_icon'       => 'dashicons-laptop',
//    );
//    register_post_type('gui', $args);
//}
//
//add_action('init', 'my_custom_post_gui');
//

//  REVISION 06.01.2017 end

/****** REGISTER Project CUSTOM POST & TAX*******/
function my_custom_post_project() {
    $labels = array(
        'name'               => _x('Project', 'post type general name'),
        'singular_name'      => _x('Project', 'post type singular name'),
        'add_new'            => _x('Add New Project', 'ansprechpartner'),
        'add_new_item'       => __('Add New Project'),
        'edit_item'          => __('Edit Project'),
        'new_item'           => __('New Project'),
        'all_items'          => __('All Project'),
        'view_item'          => __('View Project'),
        'search_items'       => __('Search Project'),
        'not_found'          => __('No Project found'),
        'not_found_in_trash' => __('No Project found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Project'
    );
    $args = array(
        'labels'          => $labels,
        'description'     => 'Holds Project models',
        'public'          => true,
        'menu_position'   => 5,
        'capability_type' => 'page',
        'hierarchical'    => true,
        'menu_position'   => 4,
        'rewrite'         => true,
        'supports'        => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'has_archive'     => true,

    );
    register_post_type('project', $args);
}

add_action('init', 'my_custom_post_project');

function my_taxonomies_project() {
    $labels = array(
        'name'              => _x('Project Category', 'taxonomy general name'),
        'singular_name'     => _x('Project Category', 'taxonomy singular name'),
        'search_items'      => __('Search Project Category'),
        'all_items'         => __('All Project Category'),
        'parent_item'       => __('Parent Project Category'),
        'parent_item_colon' => __('Parent Project Category'),
        'edit_item'         => __('Edit Project Category'),
        'update_item'       => __('Update Project Category'),
        'add_new_item'      => __('Add New Project Category'),
        'new_item_name'     => __('New Project Category'),
        'menu_name'         => __('Project Category'),
    );
    $args = array(
        'labels'       => $labels,
        'hierarchical' => true,
    );
    register_taxonomy('project_taxonomy', 'project', $args);
}

add_action('init', 'my_taxonomies_project', 0);

/****** REGISTER Archive CUSTOM POST & TAX*******/
function my_custom_post_archive() {
    $labels = array(
        'name'               => _x('Archive', 'post type general name'),
        'singular_name'      => _x('Archive', 'post type singular name'),
        'add_new'            => _x('Add New Archive', 'ansprechpartner'),
        'add_new_item'       => __('Add New Archive'),
        'edit_item'          => __('Edit Archive'),
        'new_item'           => __('New Archive'),
        'all_items'          => __('All Archive'),
        'view_item'          => __('View Archive'),
        'search_items'       => __('Search Archive'),
        'not_found'          => __('No Archive found'),
        'not_found_in_trash' => __('No Archive found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Archive'
    );
    $args = array(
        'labels'          => $labels,
        'description'     => 'Holds Archive models',
        'public'          => true,
        'menu_position'   => 5,
        'capability_type' => 'page',
        'hierarchical'    => true,
        'menu_position'   => 4,
        'rewrite'         => true,
        'supports'        => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'has_archive'     => true,

    );
    register_post_type('archive', $args);
}

add_action('init', 'my_custom_post_archive');

function my_taxonomies_archive() {
    $labels = array(
        'name'              => _x('Archive Category', 'taxonomy general name'),
        'singular_name'     => _x('Archive Category', 'taxonomy singular name'),
        'search_items'      => __('Search Archive Category'),
        'all_items'         => __('All Archive Category'),
        'parent_item'       => __('Parent Archive Category'),
        'parent_item_colon' => __('Parent Archive Category'),
        'edit_item'         => __('Edit Archive Category'),
        'update_item'       => __('Update Archive Category'),
        'add_new_item'      => __('Add New Archive Category'),
        'new_item_name'     => __('New Archive Category'),
        'menu_name'         => __('Archive Category'),
    );
    $args = array(
        'labels'       => $labels,
        'hierarchical' => true,
    );
    register_taxonomy('archive_taxonomy', 'archive', $args);
}

add_action('init', 'my_taxonomies_archive', 0);



function my_custom_post_product() {
  $labels = array(
    'name'               => _x( 'Products', 'post type general name' ),
    'singular_name'      => _x( 'Product', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Product' ),
    'edit_item'          => __( 'Edit Product' ),
    'new_item'           => __( 'New Product' ),
    'all_items'          => __( 'All Products' ),
    'view_item'          => __( 'View Product' ),
    'search_items'       => __( 'Search Products' ),
    'not_found'          => __( 'No products found' ),
    'not_found_in_trash' => __( 'No products found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Products'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'product', $args ); 
}
add_action( 'init', 'my_custom_post_product' );


function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input class="search-field" placeholder = "Arama terimi" type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" class="search-submit" value="'. esc_attr__( 'Arama' ) .'" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );

function theme_slug_blog_setup() {

  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

}
add_action( 'after_setup_theme', 'theme_slug_blog_setup' );

function theme_slug_blog_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Blog Sidebar', 'theme_slug_blog' ),
    'id'            => 'blog-sidebar',
    'description'   => esc_html__( 'Add widgets here.', 'theme_slug_blog' ),
    'before_widget' => '<div class="mediavukWidget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

    register_sidebar( array(
    'name'          => esc_html__( 'Social Media Sharing Sidebar', 'theme_slug_blog' ),
    'id'            => 'social-media',
    'description'   => esc_html__( 'Add widgets here.', 'theme_slug_blog' ),
    'before_widget' => '<div class="socialMediaSharing">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

   register_sidebar( array(
    'name'          => esc_html__( 'Tags Colud Sidebar', 'theme_slug_blog' ),
    'id'            => 'tags-sidebar',
    'description'   => esc_html__( 'Add widgets here.', 'theme_slug_blog' ),
    'before_widget' => '<div class="tagsCloud">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );


}
add_action( 'widgets_init', 'theme_slug_blog_widgets_init' );

/**
 * END BLOG Settings
 *
 */


/* ========================================================================
    ADD CUSTOM Thumbnail SIZES
=========================================================================*/

function add_image_sizes()
{
     if ( function_exists( 'add_image_size' ) ) { 
           add_theme_support( 'post-thumbnails' ); // This feature enables post-thumbnail support for a theme
           add_image_size( 'blog_image', 1280, 855.04, true);
           add_image_size( 'slider_front_page', 1024, 600, true);
     }
}
add_action('after_setup_theme', 'add_image_sizes');

/* ========================================================================
    END: ADD CUSTOM Thumbnail SIZES
=========================================================================*/






// Added by Stefan 10/1/19 
function new_template_styles() {
    if ( is_page_template( 'services-new_tpl.php' ) || is_page_template('front-page_tpl.php') || is_page_template('neutral-page_tpl.php') || is_page_template('privacy-policy_tpl-New.php') ) {
        // CSS
        wp_enqueue_style( 'style-new', get_template_directory_uri() . '/css-new-theme/style-new.css' );
        wp_enqueue_style( 'owl-main', get_template_directory_uri() . '/css-new-theme/owl.carousel.css' );
        wp_enqueue_style( 'owl-def', get_template_directory_uri() . '/css-new-theme/owl.theme.default.css' );

        // JS
        wp_enqueue_script( 'owl-main-js', get_template_directory_uri() . '/js-new-theme/owl.carousel.min.js', array(), '', true );
        wp_enqueue_script( 'owl-def-js', get_template_directory_uri() . '/js-new-theme/owl-slider.js', array(), '', true );
        wp_enqueue_script('dots-front', get_template_directory_uri() . '/js-new-theme/front-page-dots.js', array(), '', true);
        wp_enqueue_script('dots-service', get_template_directory_uri() . '/js-new-theme/service-page-dots.js', array(), '', true);
        wp_enqueue_script('footer-image', get_template_directory_uri() . '/js-new-theme/random-image-footer.js', array(), '', true);
        wp_enqueue_script('accordion-menu', get_template_directory_uri() . '/js-new-theme/accordion-menu.js', array(), '', true);
        
    } else {
        wp_enqueue_style( 'style-new', get_template_directory_uri() . '/css-new-theme/style-new.css' );

        wp_enqueue_script('footer-image', get_template_directory_uri() . '/js-new-theme/random-image-footer.js', array(), '', true);
        wp_enqueue_script('accordion-menu', get_template_directory_uri() . '/js-new-theme/accordion-menu.js', array(), '', true);
    }
}
add_action( 'wp_enqueue_scripts', 'new_template_styles' );
// END: Added by Stefan 10/1/19 



function wpb_list_child_pages() { 
 
global $post; 
 
if ( is_page() && $post->post_parent )
 
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
 
if ( $childpages ) {
 
    $string = '<ul>' . $childpages . '</ul>';
}
 
return $string;
 
}
 
add_shortcode('wpb_childpages', 'wpb_list_child_pages');
// <?php echo wpb_list_child_pages(); ?>