<main class="site-content" role="main" data-content-field="main-content">
    <section class="project-slideshow swiper-container" data-collection-id="627d19337eed7503b7c340f3">
        <div class="swiper-wrapper">
            <?php $allImg = work_all_image($works->work_id); foreach ($allImg as $val) { ?>

            <div class="slide swiper-slide">
                <div class="img-wrap cover p-ratio">
                    <?php echo image_view('uploads/work_img', $works->slug, $val->image, 'no_img.jpg', 'swiper-lazy'); ?>
                    <div class="slide-meta"></div>
                </div>
            </div>
            <?php } ?>

            <div class="slick-arrow prev hide">
                <svg viewBox="0 0 50 71" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                        <path id="b"
                              d="M34.90463 6.48785L28.417 0 .907 27.51l27.51 27.51 6.48763-6.48785L13.88248 27.51z"/>
                        <filter x="-39.7%" y="-20.9%" width="173.5%" height="145.4%" filterUnits="objectBoundingBox"
                                id="a">
                            <feMorphology radius=".5" operator="dilate" in="SourceAlpha" result="shadowSpreadOuter1"/>
                            <feOffset dy="2" in="shadowSpreadOuter1" result="shadowOffsetOuter1"/>
                            <feGaussianBlur stdDeviation="3.5" in="shadowOffsetOuter1" result="shadowBlurOuter1"/>
                            <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.603091033 0"
                                           in="shadowBlurOuter1"/>
                        </filter>
                    </defs>
                    <g transform="translate(8 7)" fill-rule="nonzero" fill="none">
                        <use fill="#000" filter="url(#a)" xlink:href="#b"/>
                        <use fill="#FFF" fill-rule="evenodd" xlink:href="#b"/>
                    </g>
                </svg>
            </div>
            <div class="slick-arrow next">
                <svg viewBox="0 0 50 71" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                        <path id="d" d="M7.39763 0L.91 6.48785 21.93215 27.51.91 48.53215 7.39763 55.02l27.51-27.51z"/>
                        <filter x="-38.2%" y="-20%" width="176.5%" height="147.3%" filterUnits="objectBoundingBox"
                                id="c">
                            <feMorphology radius=".5" operator="dilate" in="SourceAlpha" result="shadowSpreadOuter1"/>
                            <feOffset dy="2" in="shadowSpreadOuter1" result="shadowOffsetOuter1"/>
                            <feGaussianBlur stdDeviation="3.5" in="shadowOffsetOuter1" result="shadowBlurOuter1"/>
                            <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.5 0" in="shadowBlurOuter1"/>
                        </filter>
                    </defs>
                    <g transform="translate(7 6)" fill-rule="nonzero" fill="none">
                        <use fill="#000" filter="url(#c)" xlink:href="#d"/>
                        <use fill="#FFF" fill-rule="evenodd" xlink:href="#d"/>
                    </g>
                </svg>
            </div>
        </div>
        <div class="detail-menu">
            <div class="counter">
                <div class="counter-wrap">
                    <span class="current">1</span>/<?php echo count($allImg) ?>
                </div>
            </div>
            <div class="title"></div>
            <div class="controls">

                <a class="detail-btn tooltip" title="Project Description" href="#info">
                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <g stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                            <path d="M1 1h18M1 7h18M1 13h18M1 19h11"/>
                        </g>
                    </svg>
                </a>
                <button class="list-btn tooltip" title="Thumbnails">
                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <g fill-rule="evenodd">
                            <path d="M0 0h4v4H0zM0 8h4v4H0zM0 16h4v4H0zM8 0h4v4H8zM8 8h4v4H8zM8 16h4v4H8zM16 0h4v4h-4zM16 8h4v4h-4zM16 16h4v4h-4z"/>
                        </g>
                    </svg>
                </button>
                <button class="fullscreen-btn tooltip" title="Fullscreen">
                    <svg class="icon-open" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <g stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                            <path d="M1 1h5M1 1v5M2 2l4.5962 4.5962M19 1v5M19 1h-5M18 2l-4.5962 4.5962M19 19h-5M19 19v-5M18 18l-4.5962-4.5962M1 19v-5M1 19h5M2 18l4.5962-4.5962"/>
                        </g>
                    </svg>
                    <svg class="icon-close" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                        <g stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                            <path d="M7 7H2M7 7V2M6 6L1.4038 1.4038M15 7V2M15 7h5M16 6l4.5962-4.5962"/>
                            <g>
                                <path d="M15 15h5M15 15v5M16 16l4.5962 4.5962"/>
                            </g>
                            <g>
                                <path d="M7 15v5M7 15H2M6 16l-4.5962 4.5962"/>
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
                <?php foreach ($allImg as $val) { ?>
                <div class="project-item">
                    <div class="project-image img-wrap cover p-ratio">
                        <?php echo image_view('uploads/work_img', $works->slug, 'thum_'.$val->image, 'thum_no_img.jpg', 'lazyload'); ?>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <section id="info" class="project-detail" data-collection-id="627d203d4c9bff0601b89673">
        <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1652884143529"
             id="page-627d203d4c9bff0601b89673">
            <div class="row sqs-row">
                <div class="col sqs-col-3 span-3">
                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-a749ed27d8eed0565dcb">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>
                </div>
                <div class="col sqs-col-6 span-6">
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                         id="block-yui_3_17_2_1_1652367460205_14175">
                        <div class="sqs-block-content">
                            <h1 style="white-space:pre-wrap;"><?php echo $works->project_name; ?></h1>
                        </div>
                    </div>
                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-3391e5b0b2f96415b878">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                         id="block-7e3b640063ee6b6777b0">
                        <div class="sqs-block-content">
                            <p class="" style="white-space:pre-wrap;"><?php echo $works->news_description; ?></p>
                        </div>
                    </div>
                    <div class="sqs-block markdown-block sqs-block-markdown" data-block-type="44"
                         id="block-75fe88ca4f8d266ed04b">
                        <div class="sqs-block-content">
                            <hr>

                            <h3 id="project-name">Project name</h3>
                            <p><?php echo $works->project_name; ?></p>

                            <hr>
                            <?php if (!empty($works->typology)){ ?>
                            <h3 id="typology">Typology</h3>
                            <p><?php echo $works->typology;?></p>
                            <hr>
                            <?php } ?>

                            <?php if (!empty($works->location)){ ?>
                            <h3 id="location">Location</h3>
                            <p><?php echo $works->location;?></p>
                            <hr>
                            <?php } ?>

                            <?php if (!empty($works->year)){ ?>
                            <h3 id="year">Year</h3>
                            <p><?php echo $works->year;?></p>
                            <hr>
                            <?php } ?>

                            <?php if (!empty($works->project_status)){ ?>
                            <h3 id="status">Status</h3>
                            <p><?php echo $works->project_status;?></p>
                            <hr>
                            <?php } ?>

                            <?php if (!empty($works->size)){ ?>
                            <h3 id="size">Size</h3>
                            <p><?php echo $works->size;?></p>
                            <hr>
                            <?php } ?>

                            <?php if (!empty($works->client)){ ?>
                            <h3 id="client">Client</h3>
                            <p><?php echo $works->client;?></p>
                            <hr>
                            <?php } ?>

                            <?php if (!empty($works->design_team)){ ?>
                            <h3 id="design-team">Design team</h3>
                            <p><?php echo $works->design_team;?></p>
                            <hr>
                            <?php } ?>

                            <?php if (!empty($works->collaborators)){ ?>
                            <h3 id="collaborators">Collaborators</h3>
                            <p><?php echo $works->collaborators;?></p>
                            <hr>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col sqs-col-3 span-3">
                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                         id="block-88cc4bb967ce5adea1c1">
                        <div class="sqs-block-content">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>