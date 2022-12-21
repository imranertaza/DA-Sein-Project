<main class="site-content" role="main" data-content-field="main-content">

    <div id="gallery_list">
        <div class="gallery-list iso-grid" id="data-gall" >
            <?php foreach ($works as $val) { ?>
                <div class="gallery-item iso-item hentry tag-masterplan tag-residential author-lucrezia-biasutti post-type-image article-index-1 featured">
                    <a href="<?php echo base_url() ?>/Home/work_view/<?php echo $val->work_id; ?>"
                       title="<?php echo $val->project_name; ?>">
                        <div class="iso-image img-wrap cover">
                            <?php $img = get_data_by_id('image', 'work_gallary', 'work_id', $val->work_id); ?>
                            <?php echo image_view('uploads/work_img', $val->slug, 'thum_' . $img, 'thum_no_img.jpg', 'lazyload'); ?>
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
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14686.686350652086!2d89.4079881!3d23.03582755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1669435616562!5m2!1sen!2sbd"
                width="100%" height="450" style="border:0; " allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <?php  if (!isset(newSession()->image_protect)) { ?>
    <div class="form-protect-image"style="border-top: 1px sloid !important;" >
        <form action="<?php echo base_url()?>/Home/image_protect" method="post" >
            <div class="form-group protect-image">
                <label style="font-weight: 600;">Image protected code</label><br>
                <input class="input-pro" name="code" placeholder="Code" required>
                <button class="btn btn-pro" style="">Submit</button>
            </div>
        </form>
    </div>
    <?php } ?>

</main>