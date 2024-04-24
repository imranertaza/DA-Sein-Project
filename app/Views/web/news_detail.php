<main class="site-content" role="main" data-content-field="main-content">
    <section class="project-slideshow swiper-container" data-collection-id="627d19337eed7503b7c340f3">
        <div class="swiper-wrapper">
            <?php foreach ($newsGallery as $val) { ?>

                <div class="slide swiper-slide">
                    <div class="img-wrap cover p-ratio">
                        <?php echo image_view('uploads/news_img', $val->news_id, $val->image, 'no_img.jpg', 'swiper-lazy'); ?>
                        <div class="slide-meta"></div>
                    </div>
                </div>
            <?php } ?>

            <div class="slick-arrow prev hide">
                <svg viewBox="0 0 50 71" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                        <path id="b" d="M34.90463 6.48785L28.417 0 .907 27.51l27.51 27.51 6.48763-6.48785L13.88248 27.51z" />
                        <filter x="-39.7%" y="-20.9%" width="173.5%" height="145.4%" filterUnits="objectBoundingBox" id="a">
                            <feMorphology radius=".5" operator="dilate" in="SourceAlpha" result="shadowSpreadOuter1" />
                            <feOffset dy="2" in="shadowSpreadOuter1" result="shadowOffsetOuter1" />
                            <feGaussianBlur stdDeviation="3.5" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                            <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.603091033 0" in="shadowBlurOuter1" />
                        </filter>
                    </defs>
                    <g transform="translate(8 7)" fill-rule="nonzero" fill="none">
                        <use fill="#000" filter="url(#a)" xlink:href="#b" />
                        <use fill="#FFF" fill-rule="evenodd" xlink:href="#b" />
                    </g>
                </svg>
            </div>
            <div class="slick-arrow next">
                <svg viewBox="0 0 50 71" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                        <path id="d" d="M7.39763 0L.91 6.48785 21.93215 27.51.91 48.53215 7.39763 55.02l27.51-27.51z" />
                        <filter x="-38.2%" y="-20%" width="176.5%" height="147.3%" filterUnits="objectBoundingBox" id="c">
                            <feMorphology radius=".5" operator="dilate" in="SourceAlpha" result="shadowSpreadOuter1" />
                            <feOffset dy="2" in="shadowSpreadOuter1" result="shadowOffsetOuter1" />
                            <feGaussianBlur stdDeviation="3.5" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                            <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.5 0" in="shadowBlurOuter1" />
                        </filter>
                    </defs>
                    <g transform="translate(7 6)" fill-rule="nonzero" fill="none">
                        <use fill="#000" filter="url(#c)" xlink:href="#d" />
                        <use fill="#FFF" fill-rule="evenodd" xlink:href="#d" />
                    </g>
                </svg>
            </div>
        </div>
        <div class="detail-menu">
            <div class="counter">
                <div class="counter-wrap">
                    <span class="current">1</span>/<?php echo count($newsGallery) ?>
                </div>
            </div>
            <div class="title"></div>
            <div class="controls">

                <a class="detail-btn tooltip" title="Project Description" href="#block-da4990f764e7dd7e5485">
                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <g stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                            <path d="M1 1h18M1 7h18M1 13h18M1 19h11" />
                        </g>
                    </svg>
                </a>
                <button class="list-btn tooltip" title="Thumbnails">
                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <g fill-rule="evenodd">
                            <path d="M0 0h4v4H0zM0 8h4v4H0zM0 16h4v4H0zM8 0h4v4H8zM8 8h4v4H8zM8 16h4v4H8zM16 0h4v4h-4zM16 8h4v4h-4zM16 16h4v4h-4z" />
                        </g>
                    </svg>
                </button>
                <button class="fullscreen-btn tooltip" title="Fullscreen">
                    <svg class="icon-open" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <g stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                            <path d="M1 1h5M1 1v5M2 2l4.5962 4.5962M19 1v5M19 1h-5M18 2l-4.5962 4.5962M19 19h-5M19 19v-5M18 18l-4.5962-4.5962M1 19v-5M1 19h5M2 18l4.5962-4.5962" />
                        </g>
                    </svg>
                    <svg class="icon-close" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                        <g stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                            <path d="M7 7H2M7 7V2M6 6L1.4038 1.4038M15 7V2M15 7h5M16 6l4.5962-4.5962" />
                            <g>
                                <path d="M15 15h5M15 15v5M16 16l4.5962 4.5962" />
                            </g>
                            <g>
                                <path d="M7 15v5M7 15H2M6 16l-4.5962 4.5962" />
                            </g>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
    </section>
    <section class="project-list delay">
        <div class="project-inner">
            <div class="project-list-menu">
                <button class="close-btn">
                    <svg width="28" height="28" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" ratio="1.4">
                        <path fill="none" stroke="#000" stroke-width="1.06" d="M16,16 L4,4"></path>
                        <path fill="none" stroke="#000" stroke-width="1.06" d="M16,4 L4,16"></path>
                    </svg>
                </button>
            </div>
            <div class="project-list-items">
                <?php foreach ($newsGallery as $val) { ?>
                    <div class="project-item">
                        <div class="project-image img-wrap cover p-ratio">
                            <?php echo image_view('uploads/news_img', $val->news_id, 'thum_' . $val->image, 'thum_no_img.jpg', 'lazyload'); ?>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <article class="blog-post" data-item-id="6377c1725a25321759a98c39">

        <div class="post-content has-banner">
            <!--            <div class="post-banner">-->
            <!--                <div class="img-wrap cover p-ratio">-->
            <!--                    --><?php //echo image_view('uploads/news_img',$news->news_id,$news->image,'no_img.jpg','lazyload'); 
                                        ?>
            <!--                </div>-->
            <!---->
            <!--            </div>-->



            <div class="post-header">
                <div class="post-meta">
                    <div class="publish-date"><?php echo globalDateFormat($news->publish_date); ?></div>
                    <div class="share-buttons">
                        <span class="share-title">Share:</span>
                        <a href="https://www.facebook.com/sharer.php?u=<?php echo base_url() ?>/Home/news_view/<?php echo $news->news_id; ?>" target="_blank"> Facebook </a>

                        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo base_url() ?>/Home/news_view/<?php echo $news->news_id; ?>" target="_blank">
                            LinkedIn
                        </a>
                    </div>
                </div>
                <div class="post-title"><?php echo $news->news_title; ?></div>
            </div>
            <div class="sqs-layout sqs-grid-12 columns-12" data-layout-label="Post Body" data-type="item" data-updated-on="1668793934105" id="item-6377c1725a25321759a98c39">
                <div class="row sqs-row">
                    <div class="col sqs-col-12 span-12">
                        <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-da4990f764e7dd7e5485">
                            <div class="sqs-block-content">
                                <p><?php echo $news->news_description; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="pagination">
                <?php
                $arraynews = [];
                foreach ($newsArray as $val) {
                    array_push($arraynews, $val->news_id);
                }
                $current_array_val = array_search($news->news_id, $arraynews);
                $next_array_val = $arraynews[$current_array_val + 1];
                $prev_array_val = $arraynews[$current_array_val - 1];
                ?>
                <?php if (!empty($prev_array_val)) { ?>
                    <a class="prev" href="<?php echo base_url() ?>/Home/news_view/<?php echo $prev_array_val; ?>" title="Previous"><svg viewBox="0 0 17 10" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" fill-rule="evenodd">
                                <path class="fill" d="M.93135 5.13574L5.4216.4728V9.7987"></path>
                                <path class="stroke" d="M16 5H3.48078" stroke-width="2" stroke-linecap="square"></path>
                            </g>
                        </svg></a>
                <?php } ?>
                <?php if (!empty($next_array_val)) { ?>
                    <a class="next" href="<?php echo base_url() ?>/Home/news_view/<?php echo $next_array_val; ?>" title="Next"><svg viewBox="0 0 17 10" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" fill-rule="evenodd">
                                <path class="fill" d="M16.06865 4.86426L11.5784 9.5272V.2013"></path>
                                <path class="stroke" d="M1 5h12.51922" stroke-width="2" stroke-linecap="square"></path>
                            </g>
                        </svg></a>
                <?php } ?>
            </div>
        </div>
    </article>
</main>