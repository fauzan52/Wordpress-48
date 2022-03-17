<?php get_header(); ?>
<body>
<main>
    <h1 class="text-center">
        <?php _e('Search Results Found For', 'locale'); ?> : <b><?php the_search_query(); ?></b>
    </h1>
    <br>
    <?php if (have_posts()) { ?>
        <?php while (have_posts()) {
            the_post(); ?>
            <div class="primary-column">
                <div class="app-card">
                    <div class="app-card__container">
                        <div class="card-body text-center">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?= get_the_post_thumbnail_url() ?>" alt="image-post">
                            </a>
                        </div>
                        <div class="app-card__box">
                            <h3>
                                <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words($post->post_title, 10, ' ...'); ?></a>
                            </h3>
                            <p class="card-text"><?php echo wp_trim_words(get_the_content(), 60, ' ...'); ?></p>
                        </div>
                    </div>
                </div>

            </div>
        <?php } ?>
        </div>
        <div class="clear text-center">
            <br>
            <?php
            echo fauzan_pagination();
            ?>
            <br>
        </div>
    <?php } else {

    } ?>
    <div class="clear">
        <?php get_footer(); ?>
    </div>
</main>
</body>
