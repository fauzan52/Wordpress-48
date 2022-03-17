<div class="col-md-8">
    <div class="flex">
        <?php
        $SecondaryPost = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'offset'         => 1,
        ));
        ?>
        <?php if ($SecondaryPost->have_posts()) : ?>
            <?php while ($SecondaryPost->have_posts()) : $SecondaryPost->the_post(); ?>
                <div class="app-card-secondary">
                    <div class="app-card-secondary__container">
                        <div class="app-card-secondary__images">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                            </a>
                        </div>
                        <div class="app-card-secondary__box">
                            <h3>
                                <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10, ' ...'); ?></a>
                            </h3>
                            <p class="card-text"><?php echo wp_trim_words(get_the_content(), 25, ' ...'); ?></p>
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