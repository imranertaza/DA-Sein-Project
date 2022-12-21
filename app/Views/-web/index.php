

<main id="main">
    <div class="swiper banner">
        <div class="swiper-wrapper">
            <?php foreach ($slider as $row){ ?>
            <div class="swiper-slide">
                <div class="item">
                    <?php echo slider_image('uploads/slider_img',$row->image,'no_img.jpg','img-fluid w-100');?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="overlay"></div>
    </div>
</main>