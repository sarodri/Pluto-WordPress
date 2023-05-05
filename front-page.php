<?php get_header(); ?>

<main class="container my-5">
    <div class="row my-5 nosotros d-flex">
        <div class="col-6 d-flex justify-content-flex-start">
            <h2>Sobre nosotros</h2>
             <?php if(have_posts(  )){
             while(have_posts(  )){
                the_post(  ); ?>
                <?php the_content( ); ?>
        <?php   }
            }?>
        </div>
        <div class="col-6">
        <img src="<?php echo get_template_directory_uri()?>/assets/img/fachada.jpeg" alt="sobre-nosotros">
        </div>

    </div>

   
    <div class="tratamientos">
        <h2>Nuestros servicios</h2>
    
        <div class="row my-3" id="tratamientos">
        <?php 
        $args = array(
            'post_type' => 'tratamiento',
            'post_per_page' => -1,  
            'order' => 'ASC',
            'order_by' => 'title'  
        );
        $tratamientos = new WP_Query($args);
        
        if($tratamientos->have_posts()){
            while($tratamientos ->have_posts()){
                $tratamientos-> the_post();
        ?>
                <div class="col-md-4 col-12 my-3 text-center" id="img-tratamiento">
                    <figure>
                        <?php the_post_thumbnail('medium'); ?>
                    </figure>
                    <h6 class="my-3 text-center">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h6>
                </div>
        <?php } 
        } ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>