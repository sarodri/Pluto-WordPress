<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script> 
<?php wp_head() ?>
</head>
<body>    
<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-2" id="logo">
                <img src="<?php echo get_template_directory_uri()?>/assets/img/logo.png" alt="logo">
            </div>
            
            <div class="col-10"> 
                 <nav>
                    <?php wp_nav_menu( array(
                        'theme_location' => 'top_menu', 
                        'menu_class' => 'menu-principal', 
                        'container_class' => 'container-menu') );
                    ?>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- <lord-icon        src="https://cdn.lordicon.com/xwdnglcb.json"     trigger="hover"     colors="outline:#121331,primary:#646e78"     stroke="55"     style="width:100px;height:100px"> </lord-icon> -->