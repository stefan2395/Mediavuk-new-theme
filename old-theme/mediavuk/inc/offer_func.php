<?php 

function offer_cpt() {
  $labels = array(
    'name' => 'Offer',
    'singular_name' => 'Offer',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Offer',
    'edit_item' => 'Edit Offer',
    'new_item' => 'New Offer',
    'all_items' => 'All Offers',
    'view_item' => 'View Offer',
    'search_items' => 'Search Offer',
    'not_found' =>  'No Offers found',
    'not_found_in_trash' => 'No Offers found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Offers'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'offer' ),
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false,
    'menu_position' => 10,
    'supports' => array( 'title', 'editor', 'thumbnail' ),
    'capability_type'     => array('offer_post','offer_posts'),
  ); 

  register_post_type( 'offer', $args );

}
add_action( 'init', 'offer_cpt' );

add_action( 'init', 'addStrahinjaOffers');
function addStrahinjaOffers(){
    remove_role('strahinja_direktor');
    add_role('strahinja_direktor',
        'The Director',
        array(
            'read' => true,
            'edit_pages' => true,
            'edit_published_pages' => true,
            'edit_others_pages' => true,
            'delete_posts' => false,
            'publish_posts' => false,
            'upload_files' => true,
            'edit_jobs_pages'=>true,
            'read_offer_post' => true,
            'read_private_offer_posts' => true,
            'edit_offer_post' => true,
            'edit_offer_posts' => true,
            'edit_others_offer_posts'=> true,
            'edit_published_offer_posts' => true,
            'publish_offer_posts' => true,
            'delete_offer_post' => true,
            'delete_others_offer_posts' => true,
            'delete_private_offer_posts' => true,
            'delete_published_offer_posts' => true,
        )
    );
}   

//Hook to insert stuff when we're on the post edit page
add_action('admin_footer-post-new.php', 'add_offer_js');
add_action('admin_footer-post.php', 'add_offer_js');

function add_offer_js()
{
    global $post_type;
    //we only want to load this JS file if we're creating/editing an offer
    if($post_type == 'offer'):
    ?>
    <script src="<?php bloginfo('template_directory'); ?>/js/offer_dashboard.js"></script>
    <?php
    endif;
    
}

function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );

    $text = "To view this offer, enter the password below:";

    $o = '<form class="post-password-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    
    <p>' . $text . '</p>
    <p class="error-message" style="display:none; color:red;">You must enter the password below!</p>
    <p><label for="' . $label . '">' . __( "Password: " ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" /> </p>
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );