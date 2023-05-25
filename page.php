<?php get_header(); ?>

<main class='container my-3'>
    <?php if (have_posts()) {
        while(have_posts(  )){
            the_post(); ?>
            <h1 class="my-5 contacta"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        <?php }
    }?>
    <div class="contacto">
        <p>O si lo prefieres, puedes llamar al télefono 662 27 96 89. Si no respondo es que estoy ocupada con algún perrito.</p>
    </div>
</main>

<?php get_footer(); ?>