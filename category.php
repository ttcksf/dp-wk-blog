<?php get_header(); ?>

    <main>

        <section class="section postbox category">
            <div class="postbox_inner inner">
                <?php
                    $category = get_category($cat);
                    $args = array("post_type" => "post", "paged" => $paged, "category_name" => $category->slug);
                    // $args = array("post_type" => "post", "posts_per_page" => 6, "paged" => $paged, "category_name" => $category->slug);
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
                <?php
                    if(paginate_links()):
                ?>
                        <div class="pagenation">
                            <?php 
                            echo paginate_links(
                                array(
                                    'end-size' => 1,
                                    'mid_size' => 5,
                                    'prev-next' => true,
                                    'prev_text' => '<i class="fas fa-arrow-left"></i>',
                                    'next_text' => '<i class="fas fa-arrow-right"></i>'
                                )
                            );
                            ?>
                        </div>
                <?php 
                    endif;
                ?>
                </div>

                <div class="post_search">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
