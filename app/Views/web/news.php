<main class="site-content" role="main" data-content-field="main-content">
    <div class="blog-list">
        <?php $i=1; foreach ($news as $val){?>
        <article class="blog-item hentry author-lucrezia-biasutti post-type-text article-index-<?php echo $i++?>" data-ao="<?php echo $val->years; ?>">
            <a href="<?php echo base_url()?>/Home/news_view/<?php echo $val->news_id;?>" title="<?php echo $val->news_title;?>">
                <div class="blog-image img-wrap cover">
                    <?php
                    $img = get_data_by_id('image', 'news_gallary', 'news_id', $val->news_id);
                    echo image_view('uploads/news_img',$val->news_id,'thum_'.$img,'thum_no_img.jpg','lazyload');
                    ?>
                </div>
            </a>
            <div class="item-meta-wrapper">
                <div class="item-meta">
                    <date class="publish-date"><?php echo globalDateFormat($val->publish_date);?></date>
                    <div class="item-title"><?php echo $val->news_title;?></div>
                </div>
            </div>
        </article>
        <?php } ?>
    </div>
</main>