<?php get_header(); ?>
<div class="container">
    <div class="row">
        <?php get_template_part('template-parts/content', 'adv-top'); ?>
        <div class="col-md-8">
            <div class="flex">
                <div class="singlepage">
                    <div class="singlepage__images">
                        <?php echo the_post_thumbnail(); ?>
                    </div>
                    <div class="singlepage__text">
                        <h1><b><?php echo get_the_title(); ?></b></h1>
                        <p><i>Created on <?php echo get_the_date(); ?>
                                | <?php echo 'Category : ' . get_the_category($id)[0]->name . ' '; ?></i></p>
                        <h3><?php echo the_content(); ?></h3>
                        <br>
                        <a href="/wordpress" class="btn btn-success">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>

            <?php get_template_part('template-parts/content', 'right'); ?>
        </div>
    </div>
</div>


<div class="clear">
    <?php get_footer(); ?>
</div>