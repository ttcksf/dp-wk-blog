<?php get_header(); ?>

    <main>

        <section class="section notfound">
            <div class="notfound_inner inner">
                <h2 class="section_title"><span>404 Not Found</span></h2>
                <div class="content">
                    <p>お探しのページが<br class="sp_br">見つかりませんでした。</p>
                    <p>申し訳ありませんが、お探しのページが存在しないか、アクセスできません。<br>入力されたURLが正しいかご確認ください。</p>
                    <div class="notfound_btn">
                        <a href="<?php echo esc_url(home_url('/'));?>">トップページに戻る</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
