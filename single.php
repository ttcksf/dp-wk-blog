<?php get_header(); ?>
<?php
    $category;
    $post_id;
?>

    <main>
        <section class="section postbox single">
            <div class="postbox_inner inner">
                <?php
                    if (have_posts()) : 
                        $category = get_the_category();
                        $post_id = get_the_ID();
                        the_post();
                ?>
                        <div class="single_time">
                            <h3><time datetime="<?php the_time('c');?>"><?php the_time('Y/m/d');?></time></h3>
                        </div>
                        <div class="single_title">
                            <h2><?php the_title();?></h2>
                        </div>
                        <?php
                            if(has_post_thumbnail()) {
                                echo '<div class="single_eyecatching" style="background-image: url('.esc_url(get_the_post_thumbnail_url()).');">';
                            }else {
                                echo '<div class="single_eyecatching" style="background-image: url('.esc_url(get_template_directory_uri()).'/img/no_image.jpg);">';
                            }
                        ?>
                        </div>
                        <div class="single_content">
                            <?php the_content();?>
                        </div>
                <?php
                    endif;
                ?>
            </div>
        </section>

        <section class="section postbox movie">
            <div class="postbox_inner inner">
                <div class="movie_cards">
                <?php 
                    $meta_values = get_post_meta($post_id, "smartslider3", true); 
                    if ($meta_values != "") : 
                        echo do_shortcode($meta_values);
                    endif;
                ?>
                </div>
            </div>
        </section>

        <section class="section postbox related">
            <div class="postbox_inner inner">
                <h2 class="section_title"><span>関連記事</span></h2>
                <?php
                    if($category[0]) :
                        $args = array("post_type" => "post", "paged" => $paged, "category_name" => $category[0]->slug, "post__not_in" =>  array( $post_id ));
                        // $args = array("post_type" => "post", "posts_per_page" => 6, "paged" => $paged, "category_name" => $category->slug);
                        $the_query = new WP_Query($args);
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
        </section>
    </main>

<?php get_footer(); ?>
