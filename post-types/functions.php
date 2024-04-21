<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__ . '/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin', 'blocks', 'post-types', 'wp-json-endpoints']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__) . '/config/assets.php',
            'theme' => require dirname(__DIR__) . '/config/theme.php',
            'view' => require dirname(__DIR__) . '/config/view.php',
        ]);
    }, true);

// shove YOAST settings panel in editor to bottom
add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );

/**
 * Handle Nav Walker
 */
class BRC_Nav_Walker extends Walker_Nav_Menu {

    /**
     * Handle the start of each element
     */
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {

        /**
         * Get link details
         */
        $object = $item->object;  // Page, Post, etc
    	$type = $item->type;      // post_Type, etc
    	$title = $item->title;
    	$permalink = $item->url;
        $parent = $item->menu_item_parent;
        $alpine = '';

        /**
         * If this it not a parent
         */
        if ( !$parent ) {
            $alpine = 'x-data="{ open: false }" @mouseover="open = true" @mouseover.away="open = false"';
        }

        /**
         * If it has no children it is full width
         */
        $col_span = '';
        if ( !in_array( 'menu-item-has-children', $item->classes ) && $depth === 1 ) {
            $col_span = 'col-span-full px-6';
        }

        // Start the link
        $output .= "<li class='" .  implode(" ", $item->classes) . " " . $col_span . "' " . $alpine . ">";

        /**
         * If the <a> should be a button
         */
        $btn_class = '';
        if ( in_array( 'make-button', $item->classes ) ) {
            // Get the background colour
            $colour = array_filter($item->classes, function($value) {
                return strpos($value, 'btn-type') === 0;
            });
            $colour = array_values( $colour );

            // If it is an array, something found
            if ( count( $colour ) ) {
                $btn_class = str_replace( 'btn-type', 'table-cell btn btn', $colour[ 0 ] );
            }
        }

        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
            $output .= '<a href="' . $permalink . '" class="flex items-center ' . $btn_class . '">';
        } else {
            $output .= '<span class="text-sm text-purple">';
        }

        // Add the title
        $output .= $title;

        /**
         * If it has the class dropdown, add the down arrow
         */
        if ( in_array( 'dropdown', $item->classes ) ) {
            $output .= "
                <svg class='w-5 h-5 ml-2 -mr-1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                    <path fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd' />
                </svg>
            ";
        }

        // Close off the link
        if( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
    }

    /**
     * Hadle the start of each level
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {

        // Default class.
        $classes = array( 'sub-menu', 'list-none' );
        $alpine = '';

        /**
         * If the depth is not 0, add the class hidden
         */
        if ( $depth === 0 ) {
            // show contents of the following variable in the WP error log: 'eh'
            $alpine =  'x-show="open" x-cloak @click.away="open = false"';
            array_push( $classes, 'absolute', 'mt-2', 'bg-primary', 'shadow-lg', '-mt-1', 'grid', 'grid-flow-col', 'gap-x-5', 'py-2' );
        } else {
            array_push( $classes, 'flex', 'flex-col' );
        }

        /**
         * Filters the CSS class(es) applied to a menu list element.
         *
         * @since 4.8.0
         *
         * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
         * @param stdClass $args    An object of `wp_nav_menu()` arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        // Set the output
        $output .= "<ul $class_names $alpine>";
    }
}

/**
 * Handle Nav Walker
 */
class BRC_Nav_Walker_Mobile extends Walker_Nav_Menu {

    /**
     * Handle the start of each element
     */
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {

        /**
         * Get link details
         */
        $object = $item->object;  // Page, Post, etc
    	$type = $item->type;      // post_Type, etc
    	$title = $item->title;
    	$permalink = $item->url;
        $parent = $item->menu_item_parent;
        $alpine = '';

        /**
         * If this it not a parent
         */
        if ( !$parent ) {
            $alpine = 'x-data="{ open: false }" @click="open = true"';
        }

        /**
         * If it has no children it is full width
         */
        $col_span = '';
        if ( !in_array( 'menu-item-has-children', $item->classes ) && $depth === 1 ) {
            $col_span = 'col-span-full px-6';
        }

        // Start the link
        $output .= "<li class='" .  implode(" ", $item->classes) . " " . $col_span . "' " . $alpine . ">";

        /**
         * If the <a> should be a button
         */
        $btn_class = '';
        if ( in_array( 'make-button', $item->classes ) ) {
            // Get the background colour
            $colour = array_filter($item->classes, function($value) {
                return strpos($value, 'btn-type') === 0;
            });
            $colour = array_values( $colour );

            // If it is an array, something found
            if ( count( $colour ) ) {
                $btn_class = str_replace( 'btn-type', 'table-cell btn btn', $colour[ 0 ] );
            }
        }

        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
            $output .= '<a href="' . $permalink . '" class="flex items-center ' . $btn_class . '">';
        } else {
            $output .= '<span class="flex mb-2 text-xl text-primary">';
        }

        // Add the title
        $output .= $title;

        /**
         * If it has the class dropdown, ad dthe down arrow
         */
        if ( in_array( 'dropdown', $item->classes ) ) {
            $output .= "
                <svg class='w-5 h-5 mt-1 ml-2 -mr-1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                    <path fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd' />
                </svg>
            ";
        }

        // Close off the link
        if( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
    }

    /**
     * Hadle the start of each level
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {

        // Default class.
        $classes = array( 'sub-menu', 'list-none', 'relative', 'text-lg', 'mb-4');
        $alpine = '';

        /**
         * If the depth is not 0, add the class hidden
         */
        if ( $depth === 0 ) {
            // show contents of the following variable in the WP error log: 'eh'
            $alpine =  'x-show="open" x-cloak @click.away="open = false"';
            array_push( $classes, 'absolute', 'mt-2', 'shadow-lg', '-mt-1', 'grid', 'grid-flow-row', 'gap-x-5', 'py-2' );
        } else {
            array_push( $classes, 'flex', 'flex-col' );
        }

        /**
         * Filters the CSS class(es) applied to a menu list element.
         *
         * @since 4.8.0
         *
         * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
         * @param stdClass $args    An object of `wp_nav_menu()` arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        // Set the output
        $output .= "<ul $class_names $alpine>";
    }
}

/* Remove Yoast SEO Prev/Next URL from all pages */
add_filter( 'wpseo_next_rel_link', '__return_false' );
add_filter( 'wpseo_prev_rel_link', '__return_false' );

/** Remove dashicons and global styles **/
function brc_remove_dashicons() {
    if ( ! is_user_logged_in() ) {
        wp_dequeue_style( 'dashicons' );
        wp_dequeue_style( 'global-styles' );
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
    }
}
add_action( 'wp_enqueue_scripts', 'brc_remove_dashicons' );

/**
 * Deregisters jQuery Migrate by removing the dependency.
 */    
add_filter( 'wp_default_scripts', function( $scripts ) {
    if( ! empty($scripts->registered['jquery']) ) {
        $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) );
    }
} );

/**
 * Limits the comment reply JS to the places where it's needed
 */
add_action('wp_print_scripts', function() {
    if(is_singular() && (get_option('thread_comments') == 1) && comments_open() && get_comments_number() ) {
        wp_enqueue_script('comment-reply');     
    } else {
        wp_dequeue_script('comment-reply');
    }           
}, 100);
