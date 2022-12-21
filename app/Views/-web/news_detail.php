

<main id="main">
    <div class="container-fluid">
        <div class="news-details">
            <div class="page-banner">
                <?php echo image_view('uploads/news_img',$news->slug,$news->image,'no_img.jpg','img-fluid w-100'); ?>
            </div>
            <div class="post-meta">
                <div class="publish-date"><?php echo globalDateFormat($news->createdDtm);?></div>
                <div class="share-buttons">
                    <span class="share-title">Share:</span>
                    <a href="https://www.facebook.com/sharer.php?u=<?php echo base_url()?>/Home/news_view/<?php echo $news->news_id;?>" target="_blank">
                        Facebook
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo base_url()?>/Home/news_view/<?php echo $news->news_id;?>" target="_blank">
                        LinkedIn
                    </a>
                </div>
            </div>

            <h1 class="post-title"><?php echo $news->news_title;?></h1>
            <p><?php echo $news->news_description;?></p>
<!--            <p class="mt-5"><a href="#">More about the award...</a></p>-->

        </div>
    </div>
</main>