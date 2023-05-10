<?php get_header(); ?>

<main class="container my-5">
    <div class="nosotros d-flex">
        <div class="nosotros-desc">
            <h2>Sobre nosotros</h2>
            <p>
                <?php if(have_posts(  )){
                while(have_posts(  )){
                the_post(  ); ?>
                <?php the_content( ); ?>
                <?php   }
                }?>
            </p>
             
        </div>
        <div class="nosotros-img">
            <img src="<?php echo get_template_directory_uri()?>/assets/img/fachada.jpeg" alt="sobre-nosotros">
        </div>

    </div>
    <div class="tratamientos d-flex">
        <div class="tratamientos-carrusel">
            <?php masterslider(1); ?>
        </div>
        <div class="tratamientos-desc">
            <h2>Nuestros servicios</h2>
            <ul>
                <li>Máquina</li>
                <li>Tijera</li>
                <li>Stripping</li>
                <li>Deslanado</li>
                <li>Baños terapeúticos</li>
                <li>Ozonoterapia</li>
                <li>Spa</li>
                <li>Arcilloterapia</li>
                <li>Y más...</li>
            </ul>
        </div>
     
        
    
        <!-- <div class="row my-3" id="tratamientos">
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
        </div> -->
    </div>
</main>

<?php get_footer(); ?>