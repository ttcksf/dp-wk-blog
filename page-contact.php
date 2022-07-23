<?php get_header(); ?>

    <main>

        <section class="section contact">
            <div class="contact_inner inner">
                <?php
                    if (have_posts()) : the_post();
                ?>
                        <h2 class="section_title"><span><?php the_title();?></span></h2>
                        <?php the_content();?>
                <?php
                    endif;
                ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
