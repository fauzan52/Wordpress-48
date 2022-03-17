<?php

//load script
function load_file()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'load_file');

function get_excerpt_length()
{
    return 5;
}


function return_excerpt_text()
{
    return '';
}

add_filter('excerpt_more', 'return_excerpt_text');
add_filter('excerpt_length', 'get_excerpt_length');

function init_setup()
{
    register_nav_menus(array(
        'main_menu'   => 'Menu Utama',
        'footer_menu' => 'Menu Footer'
    ));
    // Add featured image
    add_theme_support('post-thumbnails');

    add_image_size('small_thumbnail', '804', '453', 'true');
    add_image_size('big_thumbnail', '1800', '400');

    // Add Post Format Wordpress
    add_theme_support('post-formats', array('aside', 'gallery'));
}

add_action('after_setup_theme', 'init_setup');

//OFFSET WITH PAGINATION

//GET CATEGORY


// Add Widget
function themename_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'theme_name'),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Secondary Sidebar', 'theme_name'),
        'id'            => 'sidebar-2',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}

add_action('widgets_init', 'themename_widgets_init');

// Redux Framework
require_once(get_template_directory() . "/library/redux-core/framework.php");
require_once(get_template_directory() . "/library/sample/config.php");

//REDUX OPTIONS
if (!function_exists('fauzanoptions')) {
    function fauzanoptions($opt_name = null)
    {
        global $fauzanclone;
        if (!empty($opt_name)) {
            return !empty($fauzanclone[$opt_name]) ? $fauzanclone[$opt_name] : null;
        } else {
            return !empty($fauzanclone[$opt_name]) ? $fauzanclone[$opt_name] : null;
        }
    }

    require_once get_template_directory() . '/includes/helpers/comment.php';
}

//PAGINATION
function fauzan_pagination()
{
    $allowed_tags = [
        'span' => [
            'class' => []
        ],
        'a'    => [
            'class' => [],
            'href'  => [],
        ]
    ];

    $args = [
        'before_page_number' => '<span class="btn border border-secondary mr-2 mb-2">',
        'after_page_number'  => '</span>',
    ];

    printf('<nav class="fauzan_pagination clearfix">%s</nav>', wp_kses(paginate_links($args), $allowed_tags));
}

//POST COUNT


//MEMBUAT POST TYPE PRODUCT => ALL PRODUCTS & ADD NEW
function my_custom_post_product()
{
    $labels = array(
        'name'               => _x('Products', 'post type general name'),
        'singular_name'      => _x('Product', 'post type singular name'),
        'add_new'            => _x('Add New', 'book'),
        'add_new_item'       => __('Add New Product'),
        'edit_item'          => __('Edit Product'),
        'new_item'           => __('New Product'),
        'all_items'          => __('All Products'),
        'view_item'          => __('View Product'),
        'search_items'       => __('Search Products'),
        'not_found'          => __('No products found'),
        'not_found_in_trash' => __('No products found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Products'
    );
    $args   = array(
        'labels'        => $labels,
        'description'   => 'Holds our products and product specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive'   => true,
    );
    register_post_type('product', $args);
}

add_action('init', 'my_custom_post_product');

//CUSTOM MESSAGE
function my_updated_messages($messages)
{
    global $post, $post_ID;
    $messages['product'] = array(
        0  => '',
        1  => sprintf(__('Product updated. <a href="%s">View product</a>'), esc_url(get_permalink($post_ID))),
        2  => __('Custom field updated.'),
        3  => __('Custom field deleted.'),
        4  => __('Product updated.'),
        5  => isset($_GET['revision']) ? sprintf(__('Product restored to revision from %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6  => sprintf(__('Product published. <a href="%s">View product</a>'), esc_url(get_permalink($post_ID))),
        7  => __('Product saved.'),
        8  => sprintf(__('Product submitted. <a target="_blank" href="%s">Preview product</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9  => sprintf(__('Product scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview product</a>'), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('Product draft updated. <a target="_blank" href="%s">Preview product</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );
    return $messages;
}

add_filter('post_updated_messages', 'my_updated_messages');

//META BOX
add_action('add_meta_boxes', 'product_price_box');
function product_price_box()
{
    add_meta_box(
        'product_price_box',
        __('Product Price', 'myplugin_textdomain'),
        'product_price_box_content',
        'product',
        'side',
        'high'
    );
}

function product_price_box_content($post)
{
    wp_nonce_field(plugin_basename(__FILE__), 'product_price_box_content_nonce');
    echo '<label for="product_price"></label>';
    echo '<input type="text" id="product_price" name="product_price" placeholder="enter a price" />';
}

add_action('save_post', 'product_price_box_save');
function product_price_box_save($post_id)
{

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!wp_verify_nonce($_POST['product_price_box_content_nonce'], plugin_basename(__FILE__)))
        return;

    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return;
    } else {
        if (!current_user_can('edit_post', $post_id))
            return;
    }
    $product_price = $_POST['product_price'];
    update_post_meta($post_id, 'product_price', $product_price);
}

//TAXONOMY => PRODUCT CATEGORY
function my_taxonomies_product()
{
    $labels = array(
        'name'              => _x('Product Categories', 'taxonomy general name'),
        'singular_name'     => _x('Product Category', 'taxonomy singular name'),
        'search_items'      => __('Search Product Categories'),
        'all_items'         => __('All Product Categories'),
        'parent_item'       => __('Parent Product Category'),
        'parent_item_colon' => __('Parent Product Category:'),
        'edit_item'         => __('Edit Product Category'),
        'update_item'       => __('Update Product Category'),
        'add_new_item'      => __('Add New Product Category'),
        'new_item_name'     => __('New Product Category'),
        'menu_name'         => __('Product Categories'),
    );
    $args   = array(
        'labels'       => $labels,
        'hierarchical' => true,
    );
    register_taxonomy('product_category', 'product', $args);
}

add_action('init', 'my_taxonomies_product', 0);

// CUSTOM
// The custom function MUST be hooked to the init action hook
add_action('init', 'lc_register_movie_post_type');
// A custom function that calls register_post_type
function lc_register_movie_post_type()
{
    // Set various pieces of text, $labels is used inside the $args array
    $labels = array(
        'name'          => _x('Movies', 'post type general name'),
        'singular_name' => _x('Movie', 'post type singular name'),

    );
    // Set various pieces of information about the post type
    $args = array(
        'labels'      => $labels,
        'description' => 'My custom post type',
        'public'      => true,

    );
    // Register the movie post type with all the information contained in the $arguments array
    register_post_type('movie', $args);
}

function getPostCustom($post_type = "post", $paged = 1, $per_page = 10, $s = '', $meta_query = [], $tax_query = [], $is_search = false, $is_single = false, $post_in = [], $post__not_in = [], $orderby = 'date', $order = 'ASC')
{

    if ($is_search) {
        $arg = [
            'post_type'      => $post_type,
            'posts_per_page' => $per_page,
            'paged'          => $paged,
            's'              => $s,
            'order'          => $order,
            'orderby'        => $orderby
        ];

        return new \WP_Query($arg);

    } else if ($is_single) {
        $arg = [
            'post_type'      => $post_type,
            'posts_per_page' => $per_page,
            'post__not_in'   => $post__not_in,
            'post__in'       => $post_in,
            'paged'          => $paged,
            'order'          => $order,
            'orderby'        => $orderby,
            'meta_query'     => $meta_query,
            'tax_query'      => $tax_query
        ];

        return new \WP_Query($arg);
    } else {
        $arg = [
            'post_type'      => $post_type,
            'posts_per_page' => $per_page,
            'paged'          => $paged,
            'meta_query'     => $meta_query,
            'tax_query'      => $tax_query
        ];

        return new \WP_Query($arg);
    }
}


if (!function_exists('fauzan_layout')) {
    function fauzan_layout($type)
    {
//        var_dump($type);
//        die;
        if (!empty($type)) {
            if ($type === "search"):
                get_template_part('template-parts/views/content', $type);
            elseif ($type === "portofolio"):
                get_template_part('template-parts/views/archive/archive', $type);
            else:
                get_template_part('template-parts/views/layout', $type);
            endif;

        } else {
            get_template_part('template-parts/views/layout', 'default');
        }
    }

    add_action('fauzan_layout', 'fauzan_layout', 10, 1);
}


?>