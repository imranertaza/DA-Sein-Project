<main class="site-content" role="main" data-content-field="main-content">
    <article class="blog-post" data-item-id="6377c1725a25321759a98c39">
        <div class="post-content has-banner">
            <div class="post-banner">
                <div class="img-wrap cover p-ratio">
                    <?php echo image_view('uploads/news_img',$news->slug,$news->image,'no_img.jpg','lazyload'); ?>
                </div>
            </div>
            <div class="post-header">
                <div class="post-meta">
                    <div class="publish-date"><?php echo globalDateFormat($news->createdDtm);?></div>
                    <div class="share-buttons">
                        <span class="share-title">Share:</span>
                        <a href="https://www.facebook.com/sharer.php?u=<?php echo base_url()?>/Home/news_view/<?php echo $news->news_id;?>" target="_blank"> Facebook </a>

                        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo base_url()?>/Home/news_view/<?php echo $news->news_id;?>"
                           target="_blank">
                            LinkedIn
                        </a>
                    </div>
                </div>
                <div class="post-title"><?php echo $news->news_title;?></div>
            </div>
            <div class="sqs-layout sqs-grid-12 columns-12" data-layout-label="Post Body" data-type="item"
                 data-updated-on="1668793934105" id="item-6377c1725a25321759a98c39">
                <div class="row sqs-row">
                    <div class="col sqs-col-12 span-12">
                        <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                             id="block-da4990f764e7dd7e5485">
                            <div class="sqs-block-content">
                                <p><?php echo $news->news_description;?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="pagination">-->
<!--                <a class="next" href="news/2022/11/14/hamaren-activity-park-update.html" title="Next">-->
<!--                    <svg viewBox="0 0 17 10" xmlns="http://www.w3.org/2000/svg">-->
<!--                        <g fill="none" fill-rule="evenodd">-->
<!--                            <path class="fill" d="M16.06865 4.86426L11.5784 9.5272V.2013"/>-->
<!--                            <path class="stroke" d="M1 5h12.51922" stroke-width="2" stroke-linecap="square"/>-->
<!--                        </g>-->
<!--                    </svg>-->
<!--                </a>-->
<!--            </div>-->
        </div>
    </article>
</main>