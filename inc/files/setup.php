<?php

if (!function_exists('estudio86_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function estudio86_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on estudio86, use a find and replace
		 * to change 'estudio86' to the name of your theme in all the template files.
		 */
        load_theme_textdomain('estudio86', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('estudio86_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        $logo_height = get_field('logo_altura', 'option');
        $logo_width = get_field('logo_largura', 'option');
        add_theme_support('custom-logo', array(
            'height'      => $logo_height,
            'width'       => $logo_width,
        ));
    }
endif;

add_action('after_setup_theme', 'estudio86_setup');

//Remove o nome de Categorias e Arquives antes do titulo do Archive e Taxonomy
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});


//Apenas posts na busca
function SearchFilter($query)
{
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts', 'SearchFilter');


//custom wp-login
function my_custom_login()
{
    $tela_registro = "";
    $msg_register_sucess = "";

    if (isset($_GET["checkemail"])) {
        $checkemail = "";
        $checkemail = $_GET["checkemail"];
        if ($checkemail == "registered") {
            $tela_registro = '<script>(function ($) { $(document).ready(function(){ $("#login_error").remove(); }); })(jQuery)</script>';
            $msg_register_sucess = '<script>(function ($) { $(document).ready(function(){ $("p.message").addClass("msg__sucesso"); $("p.message").append("<strong>Cadastrado com Sucesso!</strong>");  }); })(jQuery)</script>';
        } else {
            $tela_registro = "";
        }
    };
    echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/inc/custom-wp-admin-css/custom-login.css" />';
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />';
    echo '<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>';
    echo '<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>';
    echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>';
    echo '<script> (function ($) { $(document).ready(function(){ $("#login_error br").remove(); }); })(jQuery)</script>';
    echo $tela_registro;
    echo $msg_register_sucess;
}
add_action('login_head', 'my_custom_login');


// Remove Comments Feed
add_filter('feed_links_show_comments_feed', '__return_false');

// Remove Shortlinks
remove_action('wp_head', 'wp_shortlink_wp_head');


// HIDE DUPLICATOR NOTIFICATIONS
add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts()
{
    echo '<style>
  	.update-nag.dpro-admin-notice {
      display: none;
    } 
  </style>';
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function estudio86_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('estudio86_content_width', 640);
}
add_action('after_setup_theme', 'estudio86_content_width', 0);


//Limitar o Numero de palavras excerpt - Disabilitado
function new_excerpt_more($more)
{
    return '...';
}

//add_filter('excerpt_more', 'new_excerpt_more', 21); - Remova o comentario para habilitar


function wpdocs_custom_excerpt_length($length)
{
    return 15;
}
//add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999); - Remova o comentario para habilitar



// Changing Add to Cart button text to custom text in individual product pages
function woo_custom_cart_button_text()
{
    return __('Comprar', 'woocommerce');
}
//add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text'); - Remova o comentario para habilitar

// Changing Add to Cart button text to custom text in product archive/listing pages
function woo_custom_product_add_to_cart_text()
{
    return __('', 'woocommerce');
}
//add_filter('woocommerce_product_add_to_cart_text', 'woo_custom_product_add_to_cart_text'); - Remova o comentario para habilitar


//Definir Numerode Colunas na loja do woocommerce
//add_filter('loop_shop_columns', 'loop_columns', 999); - Remova o comentario para habilitar
if (!function_exists('loop_columns')) {
    function loop_columns()
    {
        return 3; // 3 products per row
    }
}

//Forçar envio de email html no WP_mail
function wpse27856_set_content_type()
{
    return "text/html";
}
//add_filter( 'wp_mail_content_type','wpse27856_set_content_type' ); - Remova o comentario para habilitar

//Alterar titulo da pagina home ou a escolha, basta trocar a logica

//add_filter('wp_title', 'wpdocs_hack_wp_title_for_home'); - Remova o comentario para habilitar
function wpdocs_hack_wp_title_for_home($title)
{
    if (empty($title) && (is_home() || is_front_page())) {
        $title = get_bloginfo('name') . ' ' . get_bloginfo('description');
    }
    return $title;
}

// Enable the option show in rest - habilitar a opção de api rest do ACF OBS: É necessário instalar o plugin

//Documentação - https://github.com/airesvsg/acf-to-rest-api/
//Plugin - https://br.wordpress.org/plugins/acf-to-rest-api/

//add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' ); - Remova o comentario para habilitar

// Enable the option edit in rest
//add_filter( 'acf/rest_api/field_settings/edit_in_rest', '__return_true' ); - Remova o comentario para habilitar
