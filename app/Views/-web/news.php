

<main id="main">
    <div class="container-fluid">
        <div class="news-list">
            <?php foreach ($news as $row){ ?>
            <section id="section-<?php echo $row->years; ?>">
                <h2 class="section-title"><?php echo $row->years; ?></h2>
                <div class="news-section">
                    <?php
                        $table = DB()->table('news');
                        $allnews = $table->where('years',$row->years)->get()->getResult();
                        foreach ($allnews as $val){
                    ?>
                    <div class="news-item">
                        <a href="<?php echo base_url()?>/Home/news_view/<?php echo $val->news_id;?>" title="Title">
                            <div class="news-image">
                                <?php echo image_view('uploads/news_img',$val->slug,'thum_'.$val->image,'thum_no_img.jpg','img-fluid w-100'); ?>
                            </div>
                        </a>
                        <div class="item-meta">
                            <date class="publish-date"><?php echo globalDateFormat($val->createdDtm);?></date>
                            <h3 class="item-title"><?php echo $val->news_title;?></h3>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </section>
            <?php } ?>

<!--            <section id="section-2021">-->
<!--                <h2 class="section-title">2021</h2>-->
<!--                <div class="news-section">-->
<!--                    <div class="news-item">-->
<!--                        <a href="#" title="Title">-->
<!--                            <div class="news-image">-->
<!--                                <img src="https://images.squarespace-cdn.com/content/v1/51819b9fe4b03000ce6f03ea/1667488414035-5W9AG29TKID0BECD7VZ5/899_MH027801_credit_Martin+H%C3%B8yer_Building+Green.jpg" class="img-fluid w-100">-->
<!--                            </div>-->
<!--                        </a>-->
<!--                        <div class="item-meta">-->
<!--                            <date class="publish-date">03 November, 2022</date>-->
<!--                            <h3 class="item-title">Reduction Roadmap wins The Sustainable Element Collaboration Award</h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="news-item">-->
<!--                        <a href="#" title="Title">-->
<!--                            <div class="news-image">-->
<!--                                <img src="https://images.squarespace-cdn.com/content/v1/51819b9fe4b03000ce6f03ea/1667488414035-5W9AG29TKID0BECD7VZ5/899_MH027801_credit_Martin+H%C3%B8yer_Building+Green.jpg" class="img-fluid w-100">-->
<!--                            </div>-->
<!--                        </a>-->
<!--                        <div class="item-meta">-->
<!--                            <date class="publish-date">03 November, 2022</date>-->
<!--                            <h3 class="item-title">Reduction Roadmap wins The Sustainable Element Collaboration Award</h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="news-item">-->
<!--                        <a href="#" title="Title">-->
<!--                            <div class="news-image">-->
<!--                                <img src="https://images.squarespace-cdn.com/content/v1/51819b9fe4b03000ce6f03ea/1667488414035-5W9AG29TKID0BECD7VZ5/899_MH027801_credit_Martin+H%C3%B8yer_Building+Green.jpg" class="img-fluid w-100">-->
<!--                            </div>-->
<!--                        </a>-->
<!--                        <div class="item-meta">-->
<!--                            <date class="publish-date">03 November, 2022</date>-->
<!--                            <h3 class="item-title">Reduction Roadmap wins The Sustainable Element Collaboration Award</h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="news-item">-->
<!--                        <a href="#" title="Title">-->
<!--                            <div class="news-image">-->
<!--                                <img src="https://images.squarespace-cdn.com/content/v1/51819b9fe4b03000ce6f03ea/1667488414035-5W9AG29TKID0BECD7VZ5/899_MH027801_credit_Martin+H%C3%B8yer_Building+Green.jpg" class="img-fluid w-100">-->
<!--                            </div>-->
<!--                        </a>-->
<!--                        <div class="item-meta">-->
<!--                            <date class="publish-date">03 November, 2022</date>-->
<!--                            <h3 class="item-title">Reduction Roadmap wins The Sustainable Element Collaboration Award</h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="news-item">-->
<!--                        <a href="#" title="Title">-->
<!--                            <div class="news-image">-->
<!--                                <img src="https://images.squarespace-cdn.com/content/v1/51819b9fe4b03000ce6f03ea/1667488414035-5W9AG29TKID0BECD7VZ5/899_MH027801_credit_Martin+H%C3%B8yer_Building+Green.jpg" class="img-fluid w-100">-->
<!--                            </div>-->
<!--                        </a>-->
<!--                        <div class="item-meta">-->
<!--                            <date class="publish-date">03 November, 2022</date>-->
<!--                            <h3 class="item-title">Reduction Roadmap wins The Sustainable Element Collaboration Award</h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="news-item">-->
<!--                        <a href="#" title="Title">-->
<!--                            <div class="news-image">-->
<!--                                <img src="https://images.squarespace-cdn.com/content/v1/51819b9fe4b03000ce6f03ea/1667488414035-5W9AG29TKID0BECD7VZ5/899_MH027801_credit_Martin+H%C3%B8yer_Building+Green.jpg" class="img-fluid w-100">-->
<!--                            </div>-->
<!--                        </a>-->
<!--                        <div class="item-meta">-->
<!--                            <date class="publish-date">03 November, 2022</date>-->
<!--                            <h3 class="item-title">Reduction Roadmap wins The Sustainable Element Collaboration Award</h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="news-item">-->
<!--                        <a href="#" title="Title">-->
<!--                            <div class="news-image">-->
<!--                                <img src="https://images.squarespace-cdn.com/content/v1/51819b9fe4b03000ce6f03ea/1667488414035-5W9AG29TKID0BECD7VZ5/899_MH027801_credit_Martin+H%C3%B8yer_Building+Green.jpg" class="img-fluid w-100">-->
<!--                            </div>-->
<!--                        </a>-->
<!--                        <div class="item-meta">-->
<!--                            <date class="publish-date">03 November, 2022</date>-->
<!--                            <h3 class="item-title">Reduction Roadmap wins The Sustainable Element Collaboration Award</h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="news-item">-->
<!--                        <a href="#" title="Title">-->
<!--                            <div class="news-image">-->
<!--                                <img src="https://images.squarespace-cdn.com/content/v1/51819b9fe4b03000ce6f03ea/1667488414035-5W9AG29TKID0BECD7VZ5/899_MH027801_credit_Martin+H%C3%B8yer_Building+Green.jpg" class="img-fluid w-100">-->
<!--                            </div>-->
<!--                        </a>-->
<!--                        <div class="item-meta">-->
<!--                            <date class="publish-date">03 November, 2022</date>-->
<!--                            <h3 class="item-title">Reduction Roadmap wins The Sustainable Element Collaboration Award</h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </section>-->

        </div>
    </div>
</main>