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
                    <div class="publish-date"><?php echo globalDateFormat($news->publish_date);?></div>
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


            <div class="pagination">
                <?php
                    $arraynews = [];
                    foreach ($newsArray as $val){ array_push($arraynews,$val->news_id); }
                    $current_array_val = array_search($news->news_id, $arraynews);
                    $next_array_val = $arraynews[$current_array_val+1];
                    $prev_array_val = $arraynews[$current_array_val-1];
                ?>
                <?php if (!empty($prev_array_val)){ ?>
                <a class="prev" href="<?php echo base_url()?>/Home/news_view/<?php echo $prev_array_val;?>" title="Previous"><svg viewBox="0 0 17 10" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path class="fill" d="M.93135 5.13574L5.4216.4728V9.7987"></path><path class="stroke" d="M16 5H3.48078" stroke-width="2" stroke-linecap="square"></path></g></svg></a>
                <?php } ?>
                <?php if (!empty($next_array_val)){ ?>
                <a class="next" href="<?php echo base_url()?>/Home/news_view/<?php echo $next_array_val;?>" title="Next"><svg viewBox="0 0 17 10" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path class="fill" d="M16.06865 4.86426L11.5784 9.5272V.2013"></path><path class="stroke" d="M1 5h12.51922" stroke-width="2" stroke-linecap="square"></path></g></svg></a>
                <?php } ?>
            </div>
        </div>
    </article>
</main>