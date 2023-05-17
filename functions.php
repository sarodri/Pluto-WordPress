<?php

function init_template(){
    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag');
    register_nav_menus( array('top_menu' => 'Menu principal') );
};
add_action('after_setup_theme', 'init_template');
function my_theme_styles() {
    wp_enqueue_style( 'dashicons' );
    }

function assets(){

    wp_register_style( 'bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css', '', '5.3.0', 'all');

    wp_register_style( 'josefine', "https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap", '' , '1.0', 'all' );
    wp_register_style( 'indie', "https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap", '' , '1.0', 'all' );
    wp_register_style( 'kalam', "https://fonts.googleapis.com/css2?family=Kalam&display=swap", '' , '1.0', 'all' );

    wp_enqueue_style( 'estilos', get_stylesheet_uri(), array('bootstrap', 'josefine', 'indie','kalam'), '1.0', 'all');
    
    wp_register_script( 'popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', '', '2.11.6', true );

    wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array('popper'), '5.2.3', true);
    
    wp_enqueue_script('custom',get_template_directory_uri().'/assets/js/custom.js','','1.0.0',true);

    wp_enqueue_script('jquery');

    wp_localize_script('custom','blog', array(
        'apiurl' => home_url('/wp-json/blog/v1/')
    ));
};
add_action( 'wp_enqueue_scripts', 'assets');
function sidebar(){

    register_sidebar( array(
        'name' => 'Pie de pagina',
        'id' => 'footer',
        'descrption' => 'Zona de widgets para pie de pagina',
        'before_title' => '<p>',
        'after_title' => '</p>',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</di>'
    ) );
};
add_action( 'widgets_init','sidebar');
add_action( 'wp_enqueue_scripts', 'dcms_load_dashicons_front_end' );
function dcms_load_dashicons_front_end() {
	wp_enqueue_style( 'dashicons' );
}
add_action('rest_api_init', function(){
    register_rest_route(
        'blog/v1', 
        'novedades', 
        array(
            'methods' => 'GET',
            'callback' => 'novedadesBlog',
        )
    );
});
function novedadesBlog(){
    $args= array(
            'post_type'=> 'post',
            'post_per_page'=> 10,
            'order'=> 'DESC',
            'orderby'   => 'fecha'
        );
              
        $novedades = new WP_Query($args);

        if ($novedades->have_posts()){
            $return = array();
            while($novedades->have_posts()){
                $novedades->the_post();
                $return[] = array(
                    'fecha' => get_the_date(),
                    'titulo' => get_the_title(),
                    'contenido' => get_the_content()
                );
            }
        }
            else {
                return null;
            }
           
            return $return;
}

