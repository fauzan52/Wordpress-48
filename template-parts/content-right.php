<div class="col-md-4">
    <div class="flex">
        <div class="rightcontent-app">
            <div class="rightcontent-app-right">
                <h1><?php echo get_cat_name($category_id = 2); ?></h1>
                <?php
                $CategoryBasket = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                    'cat' => 2,
                ));
                ?>
                <?php
                while ($CategoryBasket->have_posts()) : $CategoryBasket->the_post();
                    ?>
                    <div class="flexing-column">
                        <div class="rightcontent-app-right-card">
                            <div class="rightcontent-app-right-card__images">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                </a>
                            </div>
                            <div class="rightcontent-app-right-card__box">
                                <h3>
                                    <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10, ' ...'); ?></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
                <h1><?php echo get_cat_name($category_id = 3); ?></h1>
                <?php
                $CategoryBasket = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                    'cat' => 3,
                ));
                ?>
                <?php
                while ($CategoryBasket->have_posts()) : $CategoryBasket->the_post();
                    ?>
                    <div class="flexing-column">
                        <div class="rightcontent-app-right-card">
                            <div class="rightcontent-app-right-card__images">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                </a>
                            </div>
                            <div class="rightcontent-app-right-card__box">
                                <h3>
                                    <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10, ' ...'); ?></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>