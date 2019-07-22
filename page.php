<?php get_header();?>
<?php if(have_posts()) : while(have_posts()) : the_post() ?>
    <div class="body-content">
        <div class="container">
            <div class="row" style="margin-top: 30px;">
                <div class="blog-page">
                    <div class="col-md-9">
        <?php get_template_part('template-part/content/content','content')?>                
                    </div>
        <?php get_template_part('template-part/sidebar/right-sidebar','right-sidebar')?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile ;?>
<?php endif ;?>
<?php get_footer();?>

