<?php get_header();?>

    <main>

        <section class="section postbox">
            <div class="postbox_inner inner">
                <?php 
                    $args = array("post_type" => "post", "paged" => $paged);
                    // $args = array("post_type" => "post", "posts_per_page" => 6, "paged" => $paged);
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) :
                ?>
                <div class="cards">
                    <?php 
                        while ($the_query->have_posts()) : $the_query->the_post();
                    ?>
                            <div class="card">
                                <a href="<?php the_permalink();?>">
                                    <?php
                                        if(has_post_thumbnail()) {
                                            echo '<div class="card_img" style="background-image: url('.esc_url(get_the_post_thumbnail_url()).');">';
                                        }else {
                                            echo '<div class="card_img" style="background-image: url('.esc_url(get_template_directory_uri()).'/img/no_image.jpg);">';
                                        }
                                        $category=get_the_category();
                                        if($category[0]){
                                            echo '<span>'.$category[0]->cat_name.'</span>';
                                        }
                                    ?>
                                    </div>
                                    <div class="card_text">
                                        <h2><?php the_title();?></h2>
                                        <?php the_excerpt();?>
                                    </div>
                                </a>
                            </div>
                    <?php 
                        endwhile;
                    ?>
                </div>
            <?php 
                endif;
                wp_reset_postdata();
            ?>
            </div>
        </section>

        <section class="section profile">
            <div class="profile_inner inner">
                <div class="card">
                    <div class="card_img">
                    </div>
                    <div class="card_text">
                        <div class="name">
                            <h2>山田太郎</h2>
                            <h3>IT系フリーランス</h3>
                        </div>
                        <div class="detail">
                            <p>
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
