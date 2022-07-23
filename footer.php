	<footer class="footer">
    <?php
        if (has_nav_menu('footer_1') || has_nav_menu('footer_2')) :
    ?>
        <div class="footer_top">
            <div class="footer_nav">
			<?php
                if (has_nav_menu('footer_1')) {
                    wp_nav_menu(
                        array(
                            'depth' => 1,
                            'theme_location' => 'footer_1',
                            'container' => 'div',
                            'container_class' => 'footer_nav-1',
                            'menu_class' => '',
                        )
                    );
                }
                if (has_nav_menu('footer_2')) {
                    wp_nav_menu(
                        array(
                            'depth' => 1,
                            'theme_location' => 'footer_2',
                            'container' => 'div',
                            'container_class' => 'footer_nav-2',
                            'menu_class' => '',
                        )
                    );
                }
			?>
            </div>
            <div class="footer_twitter">
            <?php if ( is_active_sidebar( 'widget_twitter_timeline' ) ) : ?>
                    <?php dynamic_sidebar( 'widget_twitter_timeline' ); ?>
            <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
        <div class="footer_bottom">
            <div class="footer_inner inner">
                <small>Copyright - depression-worker 2022 All Rights Reserved</small>
            </div>
        </div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
