<main class="site-content" role="main" data-content-field="main-content">
    <section class="index-gallery swiper-container full-height" data-collection-id="59f10dd59f8dced90e4fa72f">
        <div class="swiper-wrapper">
            <?php foreach ($slider as $row){ ?>
            <div class="slide swiper-slide --link">
                    <div class="img-wrap cover">
                        <?php echo slider_image('uploads/slider_img',$row->image,'no_img.jpg','swiper-lazy');?>
                    </div>
            </div>
            <?php } ?>

        </div>
        <div class="overlay"></div>
        <div class="swiper-pagination"></div>
    </section>
</main>