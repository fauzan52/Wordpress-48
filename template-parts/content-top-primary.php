<?php
$PrimaryPost = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 1,
));
?>
<?php if ($PrimaryPost->have_posts()) : ?>
<?php while ($PrimaryPost->have_posts()) :
$PrimaryPost->the_post(); ?>
<div class="col-md-12">
    <div class="app-card-primary">
        <div class="app-card-primary__container">
            <div class="app-card-primary__images">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?= get_the_post_thumbnail_url(); ?>">
                </a>
                <div class="app-card-primary__background">
                    <h3>
                        <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 15, ' ...'); ?></a>
                    </h3>
                </div>
            </div>
        </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
        <?php endif; ?>
    </div>
</div>