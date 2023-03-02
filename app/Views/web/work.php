<main class="site-content" role="main" data-content-field="main-content">

    <div id="gallery_list">
        <div class="gallery-list iso-grid" id="data-gall">
            <?php foreach ($works as $val) { ?>
                <div class="gallery-item iso-item hentry tag-masterplan tag-residential author-lucrezia-biasutti post-type-image article-index-1 featured">
                    <a href="<?php echo base_url() ?>/Home/work_view/<?php echo $val->work_id; ?>"
                       title="<?php echo $val->project_name; ?>">
                        <div class="iso-image img-wrap cover">
                            <?php $img = get_data_by_id('image', 'work_gallary', 'work_id', $val->work_id); ?>
                            <?php echo image_view('uploads/work_img', $val->work_id, 'thum_' . $img, 'thum_no_img.jpg', 'lazyload'); ?>
                        </div>
                        <div class="item-meta-wrapper">
                            <div class="item-meta">
                                <div class="item-title"><?php echo $val->project_name; ?></div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="map-area" style="display: none;" id="map_area">
        <iframe src="https://www.google.com/maps/d/embed?mid=1iFV_ylvs1_Ay7z9LJRii7-7IcAtKgS8&ehbc=2E312F"
                width="100%" height="650" style="border:0; " allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

<!--    --><?php //if (!isset(newSession()->image_protect)) { ?>
<!--        <div class="form-protect-image" style="border-top: 1px sloid !important; ">-->
<!--            <form class="example" action="--><?php //echo base_url() ?><!--/Home/image_protect"-->
<!--                  method="post">-->
<!--                <div class="form-group protect-image">-->
<!--                    <input type="text" class="form-code-inp" name="code" placeholder="Code"-->
<!--                           required>-->
<!--                    <button class="next" type="submit"><img-->
<!--                                src="--><?php //echo base_url() ?><!--/uploads/arr.png" alt=""></button>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    --><?php //} ?>

</main>