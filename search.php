<?php get_header(); ?>

    <main>

        <section class="section postbox search">
            <div class="postbox_inner inner">
                <div class="search_result">
                    <h2 class="section_title"><span>検索結果：<?php the_search_query(); ?></span></h2>
                </div>
                <?php
                    if (have_posts() && get_search_query()) :
                ?>
                <div class="cards">
                    <?php 
                        while (have_posts()) : the_post();
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

                <div class="post_search">
                    <form action="#" method="post">
                        <?php get_search_form(); ?>
                    </form>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
