<main class="site-content" role="main" data-content-field="main-content">
    <section class="index-gallery swiper-container full-height" data-collection-id="59f10dd59f8dced90e4fa72f">
        <div class="swiper-wrapper">
            <?php foreach ($slider as $row) { ?>
                <div class="slide swiper-slide --link">
                    <div class="img-wrap cover">
                        <?php echo slider_image('uploads/slider_img', $row->image, 'no_img.jpg', 'swiper-lazy'); ?>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class="overlay"></div>
        <div class="swiper-pagination"></div>


    </section>
</main>
<?php if (!isset(newSession()->subscribe)){ ?>
<div class="home-modal">
    <a href="#" onclick="hide_modal()"><img src="<?php echo base_url() ?>/uploads/crose.png" alt="" class="sub-img"></a>
    <h1 style="font-size: 20px;">Join our<br> mailing list.</h1>
    <p class="sub-text">Be the first to know about projects, exhibitions, publications, job openings, and other updates
        from our studio in Dhaka</p>
    <form class="sub_form" action="<?php echo base_url('Home/subscribe_action')?>" method="post">
        <input style="font-size: 12px;" type="email" class="email-input" name="email" placeholder="Email Address" required>
        <button type="submit" class="btn-sub" style="font-size: 15px;">Subscribe</button>
    </form>
    <center><p class="sub-text" style="margin-top: 10px;" >We respect your privacy</p></center>
</div>
<?php } ?>