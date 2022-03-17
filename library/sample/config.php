<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'redux_demo';  // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
/* Redux::disable_demo(); */  // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url  = Redux_Core::$url . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) {
    $sample_patterns_dir = opendir( $sample_patterns_path );

    if ( $sample_patterns_dir ) {

        // phpcs:ignore WordPress.CodeAnalysis.AssignmentInCondition
        while ( false !== ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) ) {
            if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                $name              = explode( '.', $sample_patterns_file );
                $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file,
                );
            }
        }
    }
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
    'a'      => array(
        'href' => array(),
    ),
    'strong' => array(),
    'br'     => array(),
    'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
    // This is where your data is stored in the database and also becomes your global variable name.
    'opt_name'                  => $opt_name,

    // Name that appears at the top of your panel.
    'display_name'              => $theme->get( 'Name' ),

    // Version that appears at the top of your panel.
    'display_version'           => $theme->get( 'Version' ),

    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
    'menu_type'                 => 'menu',

    // Show the sections below the admin menu item or not.
    'allow_sub_menu'            => true,

    // The text to appear in the admin menu.
    'menu_title'                => esc_html__( 'Theme Options', 'your-textdomain-here' ),

    // The text to appear on the page title.
    'page_title'                => esc_html__( 'My Theme Options', 'your-textdomain-here' ),

    // Disable to create your own Google fonts loader.
    'disable_google_fonts_link' => false,

    // Show the panel pages on the admin bar.
    'admin_bar'                 => true,

    // Icon for the admin bar menu.
    'admin_bar_icon'            => 'dashicons dashicons-menu',

    // Priority for the admin bar menu.
    'admin_bar_priority'        => 50,

    // Sets a different name for your global variable other than the opt_name.
    'global_variable'           => 'fauzanredux',

    // Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
    'dev_mode'                  => true,

    // Enable basic customizer support.
    'customizer'                => true,

    // Allow the panel to open expanded.
    'open_expanded'             => false,

    // Disable the save warning when a user changes a field.
    'disable_save_warn'         => false,

    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_priority'             => 3,

    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
    'page_parent'               => 'themes.php',

    // Permissions needed to access the options panel.
    'page_permissions'          => 'manage_options',

    // Specify a custom URL to an icon.
    'menu_icon'                 => '',

    // Force your panel to always open to a specific tab (by id).
    'last_tab'                  => '',

    // Icon displayed in the admin panel next to your menu_title.
    'page_icon'                 => 'icon-themes',

    // Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
    'page_slug'                 => $opt_name,

    // On load save the defaults to DB before user clicks save.
    'save_defaults'             => true,

    // Display the default value next to each field when not set to the default value.
    'default_show'              => false,

    // What to print by the field's title if the value shown is default.
    'default_mark'              => '*',

    // Shows the Import/Export panel when not used as a field.
    'show_import_export'        => true,

    // The time transients will expire when the 'database' arg is set.
    'transient_time'            => 60 * MINUTE_IN_SECONDS,

    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
    'output'                    => true,

    // Allows dynamic CSS to be generated for customizer and google fonts,
    // but stops the dynamic CSS from going to the page head.
    'output_tag'                => true,

    // Disable the footer credit of Redux. Please leave if you can help it.
    'footer_credit'             => '',

    // If you prefer not to use the CDN for ACE Editor.
    // You may download the Redux Vendor Support plugin to run locally or embed it in your code.
    'use_cdn'                   => true,

    // Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
    'admin_theme'               => 'wp',

    // Enable or disable flyout menus when hovering over a menu with submenus.
    'flyout_submenus'           => true,

    // Mode to display fonts (auto|block|swap|fallback|optional)
    // See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
    'font_display'              => 'swap',

    // HINTS.
    'hints'                     => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'database'                  => '',
    'network_admin'             => true,
    'search'                    => true,
);


// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
// PLEASE CHANGE THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['admin_bar_links'][] = array(
    'id'    => 'redux-docs',
    'href'  => '//devs.redux.io/',
    'title' => __( 'Documentation', 'your-textdomain-here' ),
);

$args['admin_bar_links'][] = array(
    'id'    => 'redux-support',
    'href'  => '//github.com/ReduxFramework/redux-framework/issues',
    'title' => __( 'Support', 'your-textdomain-here' ),
);

$args['admin_bar_links'][] = array(
    'id'    => 'redux-extensions',
    'href'  => 'redux.io/extensions',
    'title' => __( 'Extensions', 'your-textdomain-here' ),
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
// PLEASE CHANGE THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['share_icons'][] = array(
    'url'   => '//github.com/ReduxFramework/ReduxFramework',
    'title' => 'Visit us on GitHub',
    'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
    'url'   => '//www.facebook.com/pages/Redux-Framework/243141545850368',
    'title' => 'Like us on Facebook',
    'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
    'url'   => '//twitter.com/reduxframework',
    'title' => 'Follow us on Twitter',
    'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
    'url'   => '//www.linkedin.com/company/redux-framework',
    'title' => 'Find us on LinkedIn',
    'icon'  => 'el el-linkedin',
);

// Panel Intro text -> before the form.
if ( ! isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
    if ( ! empty( $args['global_variable'] ) ) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace( '-', '_', $args['opt_name'] );
    }

    // translators:  Panel opt_name.
    $args['intro_text'] = '<p>' . sprintf( esc_html__( 'F A U Z A N A L G H I F A R I', 'your-textdomain-here' ), '<strong>' . $v . '</strong>' ) . '<p>';
} else {
    $args['intro_text'] = '<p>' . esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'your-textdomain-here' ) . '</p>';
}

// Add content after the form.
$args['footer_text'] = '<p>' . esc_html__( 'Email: blogfauzanalghifari@gmail.com', 'your-textdomain-here' ) . '</p>';

Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */
$help_tabs = array(
    array(
        'id'      => 'redux-help-tab-1',
        'title'   => esc_html__( 'Theme Information 1', 'your-textdomain-here' ),
        'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'your-textdomain-here' ) . '</p>',
    ),
    array(
        'id'      => 'redux-help-tab-2',
        'title'   => esc_html__( 'Theme Information 2', 'your-textdomain-here' ),
        'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'your-textdomain-here' ) . '</p>',
    ),
);
Redux::set_help_tab( $opt_name, $help_tabs );

// Set the help sidebar.
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'your-textdomain-here' ) . '</p>';

Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

/*
 * ---> START SECTIONS
 */

// -> START Basic Fields

// MENU : TITLE
Redux::set_section($opt_name, array(
    'title' => __('Title', 'FA'),
    'id' => 'title',
    'desc' => __('This is title area', 'FA'),
    'icon' => __('dashicons dashicons-media-document', 'FA')
));

Redux::set_section($opt_name, array (
    'title' => __('Favicon', 'FA'),
    'id' => 'media-favicon',
    'subsection' => true,
    'desc' => __('This is favicon area', 'FA'),
    'icon' => __('el el-cloud', 'FA'),
    'fields' => array(
        array(
            'id' => 'favicon',
            'type' => 'media',
            'title' => __('Enter your favicon', 'FA'),
            'subtitle' => __('You can upload any kinds of favicon', 'FA'),
            'desc' => __('This is favicon area', 'FA')
        ),
    )
));

// MENU : HEADER
Redux::set_section($opt_name, array(
    'title' => __('Header', 'FA'),
    'id' => 'header',
    'desc' => __('This is header section area', 'FA'),
    'icon' => __('dashicons dashicons-heading', 'FA')
));



Redux::set_section($opt_name, array (
    'title' => __('Logo', 'FA'),
    'id' => 'media-logo',
    'subsection' => true,
    'desc' => __('This is logo area', 'FA'),
    'icon' => 'dashicons dashicons-admin-multisite',
    'fields' => array(
        array(
            'id' => 'logo-switch-button',
            'type' => 'switch',
            'title' => __('Enter your logo', 'FA'),
            'subtitle' => __('You can logo any kinds', 'FA'),
            'desc' => __('This is logo area', 'FA'),
            'default' => true
        ),
        array(
            'id' => 'logo',
            'type' => 'media',
            'title' => __('Enter your logo', 'FA'),
            'subtitle' => __('You can upload any kinds of logo', 'FA'),
            'desc' => __('Size: 200x200', 'FA'),
            'compiler' => true,
            'default' => array(
                'url' => get_template_directory_uri().'/images/logo.png'
            )
        ),
    )
));
//
//Redux::set_section($opt_name, array (
//    'title' => __('Card', 'FA'),
//    'id' => 'card',
//    'subsection' => true,
//    'desc' => __('This is card component', 'FA'),
//    'icon' => 'dashicons dashicons-admin-multisite',
//    'fields' => array(
//        array(
//            'id' => 'card-type',
//            'type' => 'select',
//            'title' => __('Card Type', 'FA'),
//            'options' => array(
//                'default'       => __( 'default', 'aniclone' ),
//                'card-left' => __( 'card-left', 'aniclone' ),
//                'card-right' => __( 'card-right', 'aniclone' )
//            ),
//            'default' => 'default',
//        )
//    )
//));

//KHUSUS ADVERTISEMENT ATAU IKLAN
Redux::set_section($opt_name, array(
    'title' => __('Advertisement', 'FA'),
    'id'    => 'advertisement',
    'desc'  => __('This is advertisement section area' ,'FA'),
    'icon'  => __('dashicons dashicons-wordpress', 'FA')
));

Redux::set_section($opt_name, array (
    'title' => __('Advertisement Top', 'FA'),
    'id' => 'adv-top',
    'subsection' => true,
    'desc' => __('This is advertisement top area', 'FA'),
    'icon' => __('dashicons dashicons-wordpress', 'FA'),
    'fields' => array(
        array(
            'id' => 'advtop-switchbutton',
            'type' => 'switch',
            'title' => __('Enter your switch button advertisement top url', 'FA'),
            'subtitle' => __('You can switch button  advertisement top url any kinds', 'FA'),
            'desc' => __('This is switch button advertisement top url area', 'FA'),
            'default' => true
        ),
        array(
            'id' => 'advtop-url',
            'type' => 'text',
            'title' => __('Enter your advertisement top url', 'FA'),
            'subtitle' => __('You can advertisement top url any kinds', 'FA'),
            'desc' => __('This is advertisement top url area', 'FA')
        ),
        array(
            'id' => 'advtop-image',
            'type' => 'media',
            'title' => __('Enter your advertisement top banner', 'FA'),
            'subtitle' => __('You can upload advertisement top banner any kinds', 'FA'),
            'desc' => __('Size : unknown', 'FA'),
            'compiler' => true,
            'default' => array(
                'url' => get_template_directory_uri().'/images/advertisement-top.png'
            )
        )
    )
));

Redux::set_section($opt_name, array (
    'title' => __('Advertisement Middle', 'FA'),
    'id' => 'adv-midle',
    'subsection' => true,
    'desc' => __('This is advertisement middle area', 'FA'),
    'icon' => __('dashicons dashicons-wordpress', 'FA'),
    'fields' => array(
        array(
            'id' => 'advmiddle-switchbutton',
            'type' => 'switch',
            'title' => __('Enter your switch button advertisement middle url', 'FA'),
            'subtitle' => __('You can switch button  advertisement middle url any kinds', 'FA'),
            'desc' => __('This is switch button advertisement middle url area', 'FA'),
            'default' => true
        ),
        array(
            'id' => 'advmiddle-url',
            'type' => 'text',
            'title' => __('Enter your advertisement middle url', 'FA'),
            'subtitle' => __('You can advertisement middle url any kinds', 'FA'),
            'desc' => __('This is advertisement middle url area', 'FA')
        ),
        array(
            'id' => 'advmiddle-image',
            'type' => 'media',
            'title' => __('Enter your advertisement middle banner', 'FA'),
            'subtitle' => __('You can upload advertisement middle banner any kinds', 'FA'),
            'desc' => __('Size : unknown', 'FA'),
            'customizer_width' => '1280px',
            'compiler' => true,
            'default' => array(
                'url' => get_template_directory_uri().'/images/advertisement-middle.png'
            )
        )
    )
));

Redux::set_section($opt_name, array (
    'title' => __('Advertisement Right', 'FA'),
    'id' => 'adv-right',
    'subsection' => true,
    'desc' => __('This is advertisement right area', 'FA'),
    'icon' => __('dashicons dashicons-wordpress', 'FA'),
    'fields' => array(
        array(
            'id' => 'advright1-switchbutton',
            'type' => 'switch',
            'title' => __('Enter your switch button advertisement right first url', 'FA'),
            'subtitle' => __('You can switch button  advertisement right first url any kinds', 'FA'),
            'desc' => __('This is switch button advertisement right first url area', 'FA'),
            'default' => true
        ),
        array(
            'id' => 'advright1-url',
            'type' => 'text',
            'title' => __('Enter your advertisement right first url', 'FA'),
            'subtitle' => __('You can advertisement right first url any kinds', 'FA'),
            'desc' => __('This is advertisement right first url area', 'FA')
        ),
        array(
            'id' => 'advright1-image',
            'type' => 'media',
            'title' => __('Enter your advertisement right first banner', 'FA'),
            'subtitle' => __('You can upload advertisement right first banner any kinds', 'FA'),
            'desc' => __('Size : unknown', 'FA'),
            'compiler' => true,
            'default' => array(
                'url' => get_template_directory_uri().'/images/advertisement-top.png'
            )
        ),
        array(
            'id' => 'advright2-switchbutton',
            'type' => 'switch',
            'title' => __('Enter your switch button advertisement right secondary url', 'FA'),
            'subtitle' => __('You can switch button  advertisement right secondary url any kinds', 'FA'),
            'desc' => __('This is switch button advertisement right secondary url area', 'FA'),
            'default' => true
        ),
        array(
            'id' => 'advright2-url',
            'type' => 'text',
            'title' => __('Enter your advertisement right secondary url', 'FA'),
            'subtitle' => __('You can advertisement right secondary url any kinds', 'FA'),
            'desc' => __('This is advertisement right secondary url area', 'FA')
        ),
        array(
            'id' => 'advright2-image',
            'type' => 'media',
            'title' => __('Enter your advertisement right secondary banner', 'FA'),
            'subtitle' => __('You can upload advertisement right secondary banner any kinds', 'FA'),
            'desc' => __('Size : unknown', 'FA'),
            'compiler' => true,
            'default' => array(
                'url' => get_template_directory_uri().'/images/advertisement-top.png'
            )
        )
    )
));


// MENU : FOOTER
Redux::set_section($opt_name, array(
    'title' => __('Footer', 'FA'),
    'id' => 'footer',
    'desc' => __('This is footer section area', 'FA'),
    'icon' => __('dashicons dashicons-menu', 'FA')
));

Redux::set_section($opt_name, array (
    'title' => __('Title', 'FA'),
    'id' => 'title-footer',
    'subsection' => true,
    'desc' => __('This is title footer area', 'FA'),
    'icon' => __('dashicons dashicons-editor-code', 'FA'),
    'fields' => array(
        array(
            'id' => 'footer-title',
            'type' => 'text',
            'title' => __('Enter your footer title text', 'FA'),
            'subtitle' => __('You can footer title text any kinds', 'FA'),
            'desc' => __('This is footer title text area', 'FA')
        ),
    )
));

Redux::set_section($opt_name, array (
    'title' => __('Address Office', 'FA'),
    'id' => 'office',
    'subsection' => true,
    'desc' => __('This is address office area', 'FA'),
    'icon' => __('dashicons dashicons-arrow-right-alt', 'FA'),
    'fields' => array(
        array(
            'id' => 'address-office',
            'type' => 'text',
            'title' => __('Enter your address office', 'FA'),
            'subtitle' => __('You can address office any kinds', 'FA'),
            'desc' => __('This is address office area', 'FA')
        ),
    )
));

Redux::set_section($opt_name, array (
    'title' => __('Copyright', 'FA'),
    'id' => 'text-copyright',
    'subsection' => true,
    'desc' => __('This is copyright area', 'FA'),
    'icon' => __('dashicons dashicons-editor-code', 'FA'),
    'fields' => array(
        array(
            'id' => 'copyright-text',
            'type' => 'text',
            'title' => __('Enter your footer title text', 'FA'),
            'subtitle' => __('You can footer title text any kinds', 'FA'),
            'desc' => __('This is copyright text area', 'FA')
        ),
    )
));

Redux::set_section($opt_name, array (
    'title' => __('Developer Name', 'FA'),
    'id' => 'text-developer-name',
    'subsection' => true,
    'desc' => __('This is developer name area', 'FA'),
    'icon' => __('dashicons dashicons-editor-code', 'FA'),
    'fields' => array(
        array(
            'id' => 'developer-name',
            'type' => 'text',
            'title' => __('Enter your developer name', 'FA'),
            'subtitle' => __('You can developer name any kinds', 'FA'),
            'desc' => __('This is developer name area', 'FA')
        ),
    )
));

Redux::set_section($opt_name, array (
    'title' => __('Developer URL', 'FA'),
    'id' => 'text-developer',
    'subsection' => true,
    'desc' => __('This is developer area', 'FA'),
    'icon' => __('dashicons dashicons-star-filled', 'FA'),
    'fields' => array(
        array(
            'id' => 'developer-url',
            'type' => 'text',
            'title' => __('Enter your developer name', 'FA'),
            'subtitle' => __('You can developer any kinds', 'FA'),
            'desc' => __('This is developer area', 'FA')
        ),
    )
));

Redux::set_section($opt_name, array (
    'title' => __('Footer Social Network', 'FA'),
    'id' => 'social-network',
    'subsection' => true,
    'desc' => __('This is social network footer area', 'FA'),
    'icon' => __('dashicons dashicons-google', 'FA'),
    'fields' => array(
        array(
            'id' => 'social-network-url',
            'type' => 'sortable',
            'title' => __('Enter your social network url', 'FA'),
            'subtitle' => __('You can social network url', 'FA'),
            'desc' => __('This is social network url area', 'FA'),
            'label' => true,
            'options' => array(
                'Facebook' => 'Enter your facebook url',
                'Twitter' => 'Enter your twitter url',
                'Google Plus' => 'Enter your google plus url',
                'Youtube' => 'Enter your youtube url',
                'Linkedin' => 'Enter your linkedin url',
                'Whatsapp' => 'Enter your whatsapp number',
                'Instagram' => 'Enter your instagram url',
            )
        ),
    )
));
